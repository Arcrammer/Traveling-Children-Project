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
      'Traveling Christian',
      'Happy Travels',
      'Fall',
      'Pumpkin',
      'Amusement Park',
      'Harry Potter',
      'Reading Goals',
      'Science',
      'Orlando Science Center',
      'Zipline'
    ];

    foreach ($tags as $tag) {
      DB::table('tags')->insert([['tag' => $tag]]);
    }
  }
}
