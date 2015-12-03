<?php

use Illuminate\Database\Seeder;

class DestinationTypesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $types = [
      'Active',
    	'Creative',
    	'Fun',
    	'Learning',
    	'Outdoor',
    	'Performance',
    	'Reading',
    	'Tasty',
    	'Technology'
    ];
    foreach ($types as $type) {
      DB::table('destination_types')->insert(['type' => $type]);
    }
  }
}
