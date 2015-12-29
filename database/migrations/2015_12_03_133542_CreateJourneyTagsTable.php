<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJourneyTagsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::dropIfExists('journey_tags');
    Schema::create('journey_tags', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->integer('tag')->unsigned();
      $table->integer('journey')->unsigned();

      // Foreign Keys
      $table->foreign('tag')
        ->references('id')
        ->on('tags');
      $table->foreign('journey')
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
    Schema::drop('journey_tags');
  }
}
