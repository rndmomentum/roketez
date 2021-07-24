<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe;
use App\User;
use App\Subscription;
use App\StripeApi;
use App\PaymentHistory;

class UserStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user status after make a payment, is it active or incomplete, if past_due changed to past_due';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $subscriptions = Subscription::all();
        $users = User::all();

        // Define api key
        $apikey = StripeApi::orderBy('id','Desc')->first();
        Stripe\Stripe::setApiKey($apikey->secret_api_key);
        $date = date('d-m-Y');

        // Check each subscription after
        foreach($subscriptions as $subscription) {

            foreach($users as $user) {

                if($subscription->user_id == $user->user_id)
                {
                    $subscription_stripe = Stripe\Subscription::retrieve(
                        $subscription->subscription_id,
                        []
                    );
        
                    $invoice_stripe = Stripe\Invoice::retrieve(
                        $subscription_stripe->latest_invoice,
                        []
                    );

                    // Active 
                    if ($subscription_stripe->status == 'active' && $invoice_stripe->paid == true) 
                    {

                        $user = User::where('user_id', $user->user_id)->first();
        
                        $user->status = 'active';
        
                        $user->save();

                        $payment_history = PaymentHistory::where('user_id', $user->user_id)->orderBy('id','Desc')->limit(1)->get();
        
                        foreach ($payment_history as $value) 
                        {
                            $value->status = 'paid';
        
                            $value->save();
                        }
        
                    }

                    // Incomplete 
                    if ($subscription_stripe->status == 'incomplete' && $invoice_stripe->paid == false) 
                    {

                        $user = User::where('user_id', $user->user_id)->first();
        
                        $user->status = 'incomplete';
        
                        $user->save();

                        $payment_history = PaymentHistory::where('user_id', $user->user_id)->orderBy('id','Desc')->limit(1)->get();
        
                        foreach ($payment_history as $value) 
                        {
                            $value->status = 'unpaid';
        
                            $value->save();
                        }
        
                    }

                    // Incomplete Expired
                    if ($subscription_stripe->status == 'incomplete_expired' && $invoice_stripe->paid == false) 
                    {

                        $user = User::where('user_id', $user->user_id)->first();
        
                        $user->status = 'incomplete_expired';
        
                        $user->save();

                        $payment_history = PaymentHistory::where('user_id', $user->user_id);
        
                        $payment_history->delete();
        
                    }

                    // Incomplete 
                    if ($subscription_stripe->status == 'past_due' && $invoice_stripe->paid == false) 
                    {

                        $user = User::where('user_id', $user->user_id)->first();
        
                        $user->status = 'past_due';
        
                        $user->save();

                        $payment_history = PaymentHistory::where('user_id', $user->user_id)->orderBy('id','Desc')->limit(1)->get();
        
                        foreach ($payment_history as $value) 
                        {
                            $value->status = 'unpaid';
        
                            $value->save();
                        }
        
                    }

                    // Canceled
                    if ($subscription_stripe->status == 'canceled' && date('d-m-Y', $subscription_stripe->current_period_end) == $date) 
                    {

                        $user = User::where('user_id', $user->user_id)->first();
        
                        $user->status = 'canceled';
        
                        $user->save();
        
                    }
                    
                    if ($subscription_stripe->status == 'trialing' && $invoice_stripe->paid == true) {
                        
                        $user = User::where('user_id', $subscription->user_id)->first();

                        $user->status = 'trialing';

                        $user->save();

                        $payment_history = PaymentHistory::where('user_id', $user->user_id)->orderBy('id','Desc')->limit(1)->get();
        
                        foreach ($payment_history as $value) 
                        {
                            $value->status = 'trial';
        
                            $value->save();
                        }

                    }
                }

            }
        }
        //return 0;
    }
}
