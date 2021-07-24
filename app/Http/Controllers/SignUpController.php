<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Memberships;
use App\Subscription;
use App\StripeApi;

use Auth;

class SignUpController extends Controller
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
     * After verify from email, user will redirect to signup for subscription.
     * 
     * 
     */
    public function afterverify()
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if($user->status == 'pending'){

            return view('pages.signup.afterverify');

        }elseif($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {
                
            return redirect('payment-failed');
            
        }elseif($user->status == 'canceled') {

            return redirect('account-inactive');

        }else{

            return redirect('explore');

        }

    }

    /**
     * Show pricing.
     * 
     * 
     */
    public function pricing()
    {

        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        if($user->status == 'pending'){
            
            $plan = Memberships::where('status', 'active')->first();

            return view('pages.signup.pricing', compact('plan'));
        
        }elseif($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {
                
            return redirect('payment-failed');
            
        }elseif($user->status == 'canceled') {

            return redirect('account-inactive');
            
        }else{

            return redirect('explore');

        }

    }

    /**
     * User will make a payment on this page.
     * 
     * 
     */
    public function payment($id)
    {
        $user = Auth::user();
        $subscription = Subscription::where('user_id', $user->user_id)->get();

        // Define api key
        $apikey = StripeApi::orderBy('id','Desc')->first();

        if($user->status == 'pending'){

            $membership = Memberships::where('membership_id', $id)->first();

            return view('pages.signup.payment', compact('membership','apikey'));

        }elseif($user->status == 'incomplete' || $user->status == 'incomplete_expired' || $user->status == 'past_due') {
                
            return redirect('payment-failed');
            
        }elseif($user->status == 'canceled') {

            return redirect('account-inactive');

        }else{

            return redirect('explore');

        }

    }

}
