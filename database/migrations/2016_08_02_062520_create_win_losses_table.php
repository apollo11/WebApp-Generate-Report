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
          $table->string('member', 50);
          $table->string('bet_reference', 11);
          $table->dateTime('bet_time');
          $table->dateTime('datetime');
          $table->integer('table_number');
          $table->string('game', 50);
          $table->integer('effective_bet_amount');
          $table->integer('win_loss');
          $table->integer('casino_win_loss');
          $table->float('balance');
          $table->string('ip', 45);
          $table->string('dealer', 50);
          $table->string('month', 9);
          $table->string('shuffling_method', 50);
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
