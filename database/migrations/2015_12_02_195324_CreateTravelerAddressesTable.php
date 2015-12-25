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
      // Columns
      $table->increments('id');
      $table->integer('traveler')->unsigned();
      $table->string('street');
      $table->string('city')
        ->references('id')
        ->on('cities');
      $table->integer('state')
        ->references('id')
        ->on('states');
      $table->integer('zip');
      $table->bigInteger('phone')->nullable();
      $table->softDeletes();
      $table->timestamps();

      // Foreign Keys
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
