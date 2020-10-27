<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Test extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        App::$db->schema->create('test', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title', 255);
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->integer('time')->nullable();
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
        App::$db->schema->dropIfExists('test');
    }
}
