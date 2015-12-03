<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTravelersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('travelers', function (Blueprint $table) {
      // Columns
      $table->increments('id');
      $table->string('passport_id');
      $table->string('email')->unique();
      $table->string('password', 128);
      $table->string('first_name')->nullable();
      $table->string('last_name')->nullable();
      $table->integer('gender')->unsigned();
      $table->timestamp('birthday')->nullable();
      $table->string('selfie_filename')->nullable();
      $table->boolean('suspended')
        ->default(0);
      $table->rememberToken();
      $table->timestamps();

      // Foreign Keys
      $table->foreign('gender')
        ->references('id')
        ->on('genders');
    });

    // Create the `generate_passport_id` trigger
    DB::unprepared('
      CREATE TRIGGER `generate_passport_id`
      BEFORE INSERT
      ON `travelers`
      FOR EACH ROW
      SET NEW.passport_id = UUID()
    ');
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::drop('travelers');
  }
}
