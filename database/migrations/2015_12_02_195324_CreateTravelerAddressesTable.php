<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelerAddressesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('traveler_addresses', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('traveler')->unsigned();
      $table->string('street');
      $table->string('city');
      $table->tinyInteger('state')
        ->references('state')
        ->on('states');
      $table->integer('zip');
      $table->bigInteger('phone')->nullable();
      $table->timestamps();

      $table->foreign('traveler')
        ->references('id')
        ->on('travelers');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('traveler_addresses');
  }
}
