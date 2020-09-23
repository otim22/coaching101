<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subjects_id')->nullable();
            $table->string('student_learn');
            $table->string('class_requirement');
            $table->string('target_student');
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
        Schema::dropIfExists('target_students');
    }
}
