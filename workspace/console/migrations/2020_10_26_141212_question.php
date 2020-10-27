<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Question extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        App::$db->schema->create('question', function (Blueprint $table) {
            $table->increments('id');

            $table->string('question', 255);
            $table->integer('status')->default(1);
            $table->string('type', 255);
            $table->string('weight', 255)->nullable();
            $table->string('point', 255)->nullable();
            $table->string('photo', 255)->nullable();

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
        App::$db->schema->dropIfExists('question');
    }
}
