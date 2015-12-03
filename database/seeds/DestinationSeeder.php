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
    for ($i=0; $i <= 10; $i++) {
      DB::table('destinations')->insert([
        'city' => rand(1, 6),
        'state' => rand(1, 51)
      ]);
    }
  }
}
