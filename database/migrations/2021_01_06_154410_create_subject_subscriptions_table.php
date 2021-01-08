<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_subscriptions', function (Blueprint $table) {
            $table->id();
           $table->unsignedInteger('user_id');
           $table->unique(['user_id', 'subject_id']);
           $table->foreignId('subject_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('subject_subscriptions');
    }
}
