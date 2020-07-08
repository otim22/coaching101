<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_title');
            $table->string('course_subtitle');
            $table->string('course_description');
            $table->string('default_subject');
            // $table->enum('subject', [
            //     'Mathematics', 'Science', 'English', 'Chemistry','Biology', 'Swahili', 'French', 'Agriculture',
            //     'Food & nutrition', 'Social Studies', 'CRE', 'IRE','Geography','Entreprenuership', 'Commerce',
            //     'Accounts', 'Economics', 'Divinity','History'
            // ]);
            $table->string('default_class');
            // $table->enum('class', ['Senior one', 'Senior two', 'Senior three', 'Senior four', 'Senior five', 'Senior six']);
            $table->string('default_level');
            // $table->enum('level', ['Term one', 'Term two', 'Term three']);
            $table->string('content_title');
            $table->string('main_content_files')->nullable();
            $table->string('content_description');
            $table->string('extra_resource_files')->nullable();
            $table->string('students_learn');
            $table->string('class_requirement');
            $table->string('target_student');
            $table->string('welcome_message');
            $table->string('congratulations_message');
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
        Schema::dropIfExists('courses');
    }
}
