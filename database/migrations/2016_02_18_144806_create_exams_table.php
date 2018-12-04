<?php

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
            $table->increments('id');

            $table->integer('first_question_id')->unsigned();
            $table->text('first_question');
            $table->integer('first_answer')->unsigned()->nullable();

            $table->integer('second_question_id')->unsigned();
            $table->text('second_question');
            $table->integer('second_answer')->unsigned()->nullable();

            $table->integer('third_question_id')->unsigned();
            $table->text('third_question');
            $table->integer('third_answer')->unsigned()->nullable();

            $table->integer('fourth_question_id')->unsigned();
            $table->text('fourth_question');
            $table->integer('fourth_answer')->unsigned()->nullable();

            $table->integer('fifth_question_id')->unsigned();
            $table->text('fifth_question');
            $table->integer('fifth_answer')->unsigned()->nullable();

            $table->integer('score')->unsigned()->nullable()->default(0);
            $table->integer('answered')->unsigned()->nullable()->default(0);

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
        Schema::drop('exams');
    }
}
