<?php


namespace workspace\console\migrations;


use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->string('name', 255);
            $table->integer('status');
            $table->integer('time');
            $table->string('photo', 255);

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
