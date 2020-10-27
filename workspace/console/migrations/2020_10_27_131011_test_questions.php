<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TestQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        App::$db->schema->create('test_questions', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('test_id');
            $table->foreign('test_id')->references('id')->on('test')
                ->onUpdate('cascade')->onDelete('restrict');
            $table->unsignedInteger('question_id');
            $table->foreign('question_id')->references('id')->on('question')
                ->onUpdate('cascade')->onDelete('restrict');

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
        App::$db->schema->dropIfExists('test_questions');
    }
}
