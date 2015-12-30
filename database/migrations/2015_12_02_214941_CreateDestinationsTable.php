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
    Schema::dropIfExists('destinations');
    Schema::create('destinations', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->string('name');
      $table->integer('city')->unsigned();
      $table->integer('state')->unsigned();
      $table->integer('type')->unsigned();
      // Optional properties
      $table->string('description')->nullable();
      $table->string('street')->nullable();
      $table->integer('zip')->nullable();
      $table->double('adult_cost')->nullable();
      $table->double('child_cost')->nullable();
      $table->integer('discount_percentage')->nullable();

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
