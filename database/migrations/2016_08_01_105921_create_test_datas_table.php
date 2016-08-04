<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Member');
            $table->string('Reference');
            $table->integer('Table Number');
            $table->string('Game');
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
        Schema::drop('test_datas');
    }
}
