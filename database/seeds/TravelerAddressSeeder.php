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

    $christinasID = DB::table('traveler_addresses')
      ->select('id')
      ->from('travelers')
      ->where('email', '=' , 'chris@cdtdesign.com')
      ->first()
      ->id;

    DB::table('traveler_addresses')->insert([[
      'traveler' => $alexandersID,
      'street' => '8 Spruce Street',
      'city' => 'New York',
      'state' => 34, // New York, obvi
      'zip' => 10038,
      'phone' => (int) preg_replace('/[^0-9]+/i', '', '+1 (631) 552 - 8189'),
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'traveler' => $christinasID,
      'street' => '123 Deland Ave',
      'city' => 'DeLand',
      'state' => 10, // Florida
      'zip' => 32804,
      'phone' => NULL,
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ]]);
  }
}
