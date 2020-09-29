<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectOutlinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_outlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subjects_id')->nullable();
            $table->string('content_title');
            $table->string('content_file_path');
            $table->string('content_description');
            $table->json('resource_attachment_path')->nullable();
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
        Schema::dropIfExists('subject_outlines');
    }
}
