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
      $table->string('uuid');
      $table->integer('traveler')->unsigned();
      $table->string('title');
      $table->date('date');
      $table->string('description_filename');
      $table->string('header_image_filename')->nullable();
      $table->softDeletes();
      $table->timestamps();

      // Foreign Keys
      $table->foreign('traveler')
        ->references('id')
        ->on('travelers');
    });

    // Triggers
    DB::unprepared('
      CREATE TRIGGER `generate_uuid`
      BEFORE INSERT
      ON `journeys`
      FOR EACH ROW
      SET NEW.uuid = UUID()
    ');
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
