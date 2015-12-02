<?php

use Illuminate\Database\Seeder;

class TravelerAddressSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $alexandersID = DB::table('traveler_addresses')
      ->select('id')
      ->from('travelers')
      ->where('email', '=' , 'Alexander2475914@gmail.com')
      ->first()
      ->id;
    DB::table('traveler_addresses')->insert([[
      'traveler' => $alexandersID,
      'street' => '8 Spruce Street',
      'city' => 'New York',
      'state' => 34, // New York, obvi
      'zip' => '10038',
      'phone' => (int) preg_replace('/[^0-9]+/i', '', '+1 (631) 552 - 8189')
    ]]);
  }
}
