<?php

use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $tags = [
      'TravelingChristian',
      'HappyTravels',
      'Fall',
      'Pumpkin',
      'AmusementPark',
      'HarryPotter',
      'ReadingGoals',
      'Science',
      'OrlandoScienceCenter',
      'Zipline'
    ];

    foreach ($tags as $tag) {
      DB::table('tags')->insert([['tag' => $tag]]);
    }
  }
}
