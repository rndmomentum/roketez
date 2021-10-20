<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Auth;

use App\Memberships;
use App\Subscription;
use App\PaymentHistory;
use App\User;
use App\Courses;
use App\StripeApi;

class CheckoutController extends Controller
{   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware(['auth', 'verified']);
        $this->middleware('auth');
    }

    /**
     * Checkout for Membership
     * 
     */
    public function checkout_for_membership($id, Request $request)
    {

        $user = Auth::user();

        // Get Membership Details
        $membership = Memberships::where('membership_id', $id)->first();

        // Define api key
        $apikey = StripeApi::orderBy('id','Desc')->first();

        // Make Payment
        $stripe = Stripe\Stripe::setApiKey($apikey->secret_api_key);

        try {

            // Generate token
            $token = Stripe\Token::create(array(

                "card" => array(

                    "number"    => $request->cardnumber,
                    "exp_month" => $request->month,
                    "exp_year"  => $request->year,
                    "cvc"       => $request->cvc,
                    "name"      => $request->cardholder

                )

            ));

            // If not generate view error
            if (!isset($token['id'])) {

                return redirect()->back()->with('error','Token is not generate correct');

            }else{

                // Create a Customer:
                $customer = \Stripe\Customer::create([

                    'name' => $user->firstname . " " . $user->lastname,
                    'source' => $token['id'],
                    'email' => $user->email,

                ]);

                $subscription = Stripe\Subscription::create([

                    'customer' => $customer->id,
                    'items' => [

                        [
                          'price' => $membership->membership_id,
                        ],

                    ],
                    'trial_period_days' => $membership->trial_day,
                    // 'trial_from_plan' => true,

                ]);

                // Update User Status
                $update_user = User::where('user_id', $user->user_id)->first();
                $update_user->status = 'active';

                // Added to Subscription   
                Subscription::create(array(

                    'subscription_id' => $subscription->id,
                    'membership_id' => $membership->membership_id,
                    'stripe_id' => $customer->id,
                    'user_id' => $user->user_id,
                    'price' => $membership->sales_price,

                ));   
                           
                $get_payment_history = PaymentHistory::orderBy('id','Desc')->first();
                $total = $get_payment_history->id + 1;
                $order_id = "100" . $total;
                
                // Payment History
                PaymentHistory::create(array(

                    'order_id' => $order_id,
                    'stripe_id' => $customer->id,
                    'user_id' => $user->user_id,
                    'membership_id' => $membership->membership_id,
                    'invoice_id' => $subscription->latest_invoice,
                    // 'price' => $membership->sales_price,
                    'price' => 0,
                    'status' => 'pending'

                ));

                $update_user->save();

                // \Mail::to($user->email)->send(new \App\Mail\Subscription());        

            }

            // Redirect to Interest
            return redirect('choose-interest'); 

        } catch (\Exception $ex) {

            return redirect()->back()->with('error', $ex->getMessage());
        }

    }

    /**
     * Cancel subscription
     * 
     * 
     */
    public function cancel_subscription()
    {

        $user = Auth::User();

        // Define api key
        $apikey = StripeApi::orderBy('id','Desc')->first();

        // Define api key
        Stripe\Stripe::setApiKey($apikey->secret_api_key);

        $cancel = Subscription::where('user_id', $user->user_id)->first();
        $subscription = Stripe\Subscription::retrieve($cancel->subscription_id);

        $subscription->cancel();

        \Mail::to($user->email)->send(new \App\Mail\CancelSubscription());
        return redirect()->back()->with('success', 'Membership Canceled');

    }

}