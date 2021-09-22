<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('subject_id');
            $table->date('date');
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete("cascade");
            $table->foreign('group_id')->references('id')->on('groups')->onDelete("cascade");
            $table->foreign('class_id')->references('id')->on('grades')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
