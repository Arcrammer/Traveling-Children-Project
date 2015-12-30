<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $cities = [
      'Kissimmee',
      'Orlando',
      'Sanford',
      'Tampa',
      'Winter Garden',
      'Daytona'
    ];

    foreach ($cities as $city) {
      DB::table('cities')->insert(['name' => $city]);
    }
  }
}
