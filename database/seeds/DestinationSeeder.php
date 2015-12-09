<?php

use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $possibleLocations = [
      'Pumpkin Patch Farm',
      'Orlando Science Center',
      'Random Amusement Park',
      'World of Harry Potter',
      'ZOOmAir Zipline'
    ];

    for ($i=0; $i <= 10; $i++) {
      DB::table('destinations')->insert([
        'name' => $possibleLocations[array_rand($possibleLocations)],
        'city' => rand(1, 6),
        'state' => rand(1, 51),
        'type' => rand(1, 9)
      ]);
    }
  }
}
