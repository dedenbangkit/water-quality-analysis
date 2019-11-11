<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->unsigned();
            $table->bigInteger('visitor_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->text('value');
            $table->timestamps();
        });

        Schema::table('answers', function (Blueprint $table) {
                $table->foreign('section_id')
                    ->references('id')
                    ->on('sections')
                    ->onDelete('cascade');
        });

        Schema::table('answers', function (Blueprint $table) {
                $table->foreign('question_id')
                    ->references('id')
                    ->on('questions')
                    ->onDelete('cascade');
        });

        Schema::table('answers', function (Blueprint $table) {
                $table->foreign('visitor_id')
                    ->references('id')
                    ->on('visitors')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
