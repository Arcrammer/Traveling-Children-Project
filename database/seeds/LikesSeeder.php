<?php

use Illuminate\Database\Seeder;
use TravelingChildrenProject\Traveler;
use TravelingChildrenProject\Journey;

class LikesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    for ($i=0; $i <= 100; $i++) {
      DB::table('likes')->insert([[
        'traveler' => rand(1, Traveler::count()),
        'likes_journey' => rand(1, Journey::count()),
        'created_at' => date('Y-m-d H:i:s', time()),
        'updated_at' => date('Y-m-d H:i:s', time()),
      ]]);
    }
  }
}
