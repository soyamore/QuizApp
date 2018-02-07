<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('quiz_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->integer('answer_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('quiz_id')->references('id')->on('quizzes');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->foreign('answer_id')->references('id')->on('answers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('results');
    }
}
