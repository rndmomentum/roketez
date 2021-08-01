<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Stripe;
use App\User;
use App\Subscription;
use App\Memberships;
use App\PaymentHistory;
use App\StripeApi;

class UpdatePaymentHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:paymenthistory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new payment history';

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

        foreach ($subscriptions as $subscription) 
        {
            foreach($users as $user) {

                if($subscription->user_id == $user->user_id)
                {
                    $subscription_stripe = Stripe\Subscription::retrieve(
                        $subscription->subscription_id,
                        []
                    );
        
                    if(date('d-m-Y', $subscription_stripe->current_period_end) == $date)
                    {
        
                        $get_payment_history = PaymentHistory::orderBy('id','Desc')->first();
                        $total = $get_payment_history->id + 1;
                        $order_id = "100" . $total;
        
                        // Payment History
                        PaymentHistory::create(array(
        
                            'order_id' => $order_id,
                            'stripe_id' => $subscription->stripe_id,
                            'user_id' => $subscription->user_id,
                            'membership_id' => $subscription->membership_id,
                            'invoice_id' => $subscription_stripe->latest_invoice,
                            'price' => $subscription->price,
                            'status' => 'pending'
        
                        ));
        
                    }
                }

            }

        }
        //return 0;
    }
}
