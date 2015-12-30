<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::dropIfExists('likes');
    Schema::create('likes', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('traveler')->unsigned();
      $table->integer('likes_journey')->unsigned();
      $table->timestamps();

      // Foreign Keys
      $table->foreign('traveler')
        ->references('id')
        ->on('travelers');
      $table->foreign('likes_journey')
        ->references('id')
        ->on('journeys');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('likes');
  }
}
