<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinLossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('win_losses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('member');
          $table->integer('bet_reference');
          $table->dateTime('bet_time');
          $table->dateTime('datetime');
          $table->integer('table_number');
          $table->string('game');
          $table->integer('effective_bet_amount');
          $table->integer('win_loss');
          $table->integer('casino_win_loss');
          $table->float('balance');
          $table->integer('ip');
          $table->string('dealer');
          $table->string('month');
          $table->string('shuffling_method');
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
        Schema::drop('win_losses');
    }
}
