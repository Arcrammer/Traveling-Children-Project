<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDestinationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('destinations', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('city')->unsigned();
      $table->integer('state')->unsigned();
      $table->integer('type')->unsigned();

      // Foreign Keys
      $table->foreign('city')
        ->references('id')
        ->on('cities');
      $table->foreign('state')
        ->references('id')
        ->on('states');
      $table->foreign('type')
        ->references('id')
        ->on('destination_types');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('destinations');
  }
}
