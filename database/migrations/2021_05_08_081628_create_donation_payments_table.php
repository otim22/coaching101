<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donation_payments', function (Blueprint $table) {
            $table->id();
            $table->string('interval');
            $table->string('duration')->nullable();
            $table->string('currency');
            $table->float('amount');
            $table->string('payment_plan_id');
            $table->foreignId('donation_user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('donation_payments');
    }
}
