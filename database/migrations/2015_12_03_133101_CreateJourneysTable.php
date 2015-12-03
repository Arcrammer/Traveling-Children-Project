<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneysTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('journeys', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('traveler')->unsigned();
      $table->string('title');
      $table->timestamp('date');
      $table->string('description_filename');
      $table->string('header_image_filename')->nullable();
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
    Schema::drop('journeys');
  }
}
