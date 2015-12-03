<?php

use Illuminate\Database\Seeder;

class JourneyTagsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('journey_tags')->insert([[
      'tag' => 1,
      'journey' => 1
    ], [
      'tag' => 1,
      'journey' => 2
    ], [
      'tag' => 1,
      'journey' => 3
    ], [
      'tag' => 1,
      'journey' => 4
    ], [
      'tag' => 1,
      'journey' => 5
    ], [
      'tag' => 2,
      'journey' => 1
    ], [
      'tag' => 2,
      'journey' => 2
    ], [
      'tag' => 2,
      'journey' => 3
    ], [
      'tag' => 2,
      'journey' => 4
    ], [
      'tag' => 2,
      'journey' => 5
    ], [
      'tag' => 3,
      'journey' => 1
    ], [
      'tag' => 4,
      'journey' => 1
    ], [
      'tag' => 5,
      'journey' => 2
    ], [
      'tag' => 6,
      'journey' => 3
    ], [
      'tag' => 7,
      'journey' => 3
    ], [
      'tag' => 8,
      'journey' => 4
    ], [
      'tag' => 9,
      'journey' => 4
    ], [
      'tag' => 10,
      'journey' => 5
    ]]);
  }
}
