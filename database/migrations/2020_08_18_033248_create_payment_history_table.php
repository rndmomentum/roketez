<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_history', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('stripe_id');
            $table->string('user_id');
            $table->string('course_id');
            $table->string('membership_id');
            $table->string('invoice_id');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('purchased_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_history');
    }
}
