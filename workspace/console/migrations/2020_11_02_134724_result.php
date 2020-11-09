<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Result extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        App::$db->schema->create('result', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('min_score');
            $table->integer('max_score');
            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->string('photo', 255)->nullable();
            $table->unsignedInteger('test_id');
            $table->foreign('test_id')->references('id')->on('test')
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
        App::$db->schema->dropIfExists('result');
    }
}
