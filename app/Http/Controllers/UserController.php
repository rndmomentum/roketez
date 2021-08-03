<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Subscription;
use App\PaymentHistory;
use App\Memberships;
use App\StripeApi;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Stripe;

class UserController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        
        $count = 1;
        $users = User::orderBy('id', 'Desc')->paginate(10);

        return view('admin.pages.users.list', compact('users','count'));

    }

    /**
     * Page for export data
     * 
     * 
     */
    public function export_data_page()
    {

        return view('admin.pages.users.export');

    }

    /**
     * Export user with status and date
     * 
     * 
     */
    public function export_user(Request $request)
    {

        $from = $request->from;
        $to = $request->to;
        $status = $request->status;

        return Excel::download(new UsersExport($from,$to,$status), $request->status . '_user.xlsx');

    }

    /**
     * Display user by status
     * 
     * 
     */
    public function user_status($status)
    {
        $count = 1;
        $users = User::where('status', $status)->orderBy('id', 'Desc')->paginate(10);

        return view('admin.pages.users.list', compact('users','count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function edit($id)
    {   
        $user = User::where('user_id', $id)->first();
        $subscription_check = Subscription::where('user_id', $id)->get();
        $subscription = Subscription::where('user_id', $id)->first();

        //Stripe API KEY
        $stripe_api_key = StripeApi::orderBy('id','Desc')->first();

        // Define API KEY
        Stripe\Stripe::setApiKey($stripe_api_key->secret_api_key);

        if($subscription_check->isEmpty()){

            // Display payment history
            $count = 1;
            $memberships = Memberships::all();
            $payment_history = PaymentHistory::where('user_id', $id)->orderBy('id','Desc')->get();

            return view('admin.pages.users.edit', compact('user','payment_history','count','subscription', 'subscription_check'));

        }else{

            $subscription_stripe = Stripe\Subscription::retrieve($subscription->subscription_id);

            // Display payment history
            $count = 1;
            $memberships = Memberships::all();
            $payment_history = PaymentHistory::where('user_id', $id)->orderBy('id','Desc')->get();

            return view('admin.pages.users.edit', compact('user','payment_history','count','subscription_stripe','subscription', 'subscription_check'));

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * 
     */
    public function update(Request $request, $id)
    {
        $user = User::where('user_id', $id)->first();

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone_number = $request->phonenumber;

        $user->save();

        return redirect()->back()->with('success', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * 
     */
    public function destroy($id)
    {
        
        $payment_history = PaymentHistory::where('user_id', $id);
        $subscription = Subscription::where('user_id', $id);
        $user = User::where('user_id', $id);

        $payment_history->delete();
        $subscription->delete();
        $user->delete();

        return redirect()->back()->with('success', 'User Deleted!');

    }

    /**
     * Remove payment history
     * 
     * 
     */
    public function destroy_payment($id)
    {
        $payment_history = PaymentHistory::where('order_id', $id);

        $payment_history->delete();

        return redirect()->back()->with('success', 'Payment History Deleted!');
    }


    /**
     * Cancel Subscription
     * 
     * 
     */
    public function cancel_subscription($id)
    {   
        $user = User::where('user_id', $id)->first();
        $subscriptions = Subscription::where('user_id', $id)->first();

        //Stripe API KEY
        $stripe_api_key = StripeApi::orderBy('id','Desc')->first();

        // Define API KEY
        Stripe\Stripe::setApiKey($stripe_api_key->secret_api_key);

        $subscription = Stripe\Subscription::retrieve($subscriptions->subscription_id);
        $subscription->cancel();

        // Sent mail
        \Mail::to($user->email)->send(new \App\Mail\CancelSubscription());

        return redirect()->back()->with('success', 'Your subscription has been canceled');
    }


    /**
     * Search user
     * 
     * 
     */
    public function search(Request $request)
    {   
        $count = 1;
        $users = User::where('firstname','LIKE','%'. $request->search.'%')->orWhere('lastname','LIKE','%'. $request->search.'%')->orWhere('user_id','LIKE','%'. $request->search .'%')->orWhere('email','LIKE','%'. $request->search .'%')->paginate(15);

        if(count($users) > 0)
        {

            return view('admin.pages.users.list', compact('users','count'));

        }else{

            // return view('admin.pages.users.list', compact('users','count'));
            return redirect()->back()->with('error', 'Sorry not found!');

        }
    }

    /**
     * Generate payment history
     * 
     * 
     */
    public function generate_payment($id)
    {

        // Get subscription
        $subscription = Subscription::where('user_id', $id)->first();

        // Get membership
        $membership = Memberships::orderBy('id','Desc')->first();

        $get_payment_history = PaymentHistory::orderBy('id','Desc')->first();
        $total = $get_payment_history->id + 1;
        $order_id = "100" . $total;

        // Payment History
        PaymentHistory::create(array(

            'order_id' => $order_id,
            'stripe_id' => $subscription->stripe_id,
            'user_id' => $id,
            'course_id' => 0,
            'membership_id' => $membership->membership_id,
            'invoice_id' => 0,
            'quantity' => 1,
            'price' => $subscription->price,
            'purchased_at' => date('d-m-Y'),
            'creator_id' => 'admin_5f3f1d5286ae7',

        ));

        return redirect()->back()->with('success', 'Payment History Generated!');
    }

    /**
     * Delete subscription
     * Change user status to PENDING
     * 
     */
    public function delete_subscription($id)
    {
        // Get subscription
        $subscription = Subscription::where('user_id', $id)->first();

        $user = User::where('user_id', $id)->first();

        $user->status = 'pending';

        $user->save();
        $subscription->delete();

    }

    /**
     * Sync payment status
     * 
     * 
     */
    public function sync_payment_status($id,$order_id)
    {
        //Stripe API KEY
        $stripe_api_key = StripeApi::orderBy('id','Desc')->first();

        // Define API KEY
        Stripe\Stripe::setApiKey($stripe_api_key->secret_api_key);

        $payment_history = PaymentHistory::where('order_id', $order_id)->first();
        $subscription = Subscription::where('user_id', $id)->first();

        $subscription_stripe = Stripe\Subscription::retrieve($subscription->subscription_id);
        $invoice_stripe = Stripe\Invoice::retrieve($subscription_stripe->latest_invoice);

        if($invoice_stripe->paid == true)
        {
            $payment_history->status = 'paid';

        }else if ($invoice_stripe->paid == false) 
        {

            $payment_history->status = 'unpaid';

        }else{

            $payment_history->status = 'pending';

        }

        $payment_history->save();


        return redirect()->back()->with('success', 'Update Payment History Status');
    }

    /**
     * Update created at
     * 
     * 
     */
    public function update_created_at(Request $request,$id)
    {
        $payment_history = PaymentHistory::where('order_id', $id)->first();

        $payment_history->created_at = $request->created_at;

        $payment_history->save();

        return redirect()->back()->with('success', 'Update Payment History Created At');
    }

    /**
     * Display date filter
     * 
     * 
     */
    public function date_filter()
    {
        $count = 1;
        $subscriptions = Subscription::orderBy('id', 'Desc')->get();
        $users = User::where('status','active')->orderBy('id', 'Desc')->get();

        return view('admin.pages.users.date-filter', compact('users','count','subscriptions'));
    }

    /**
     * Get list user who subscribe on same date
     * 
     * 
     */
    public function get_date_filter(Request $request)
    {
        $count = 1;
        $subscriptions = Subscription::whereRaw("(created_at >= ? AND created_at <= ?)", [$request->date . " 00:00:00", $request->date . " 23:59:59"])->orderBy('id', 'Desc')->get();
        $users = User::where('status', 'active')->orderBy('id', 'Desc')->get();

        return view('admin.pages.users.date_filter', compact('users','count','subscriptions'));
    }
}
