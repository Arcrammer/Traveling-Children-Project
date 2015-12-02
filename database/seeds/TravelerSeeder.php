<?php

use Illuminate\Database\Seeder;

class TravelerSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('travelers')->insert([[
      'email' => 'Christina@cdtdesign.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Christina',
      'last_name' => 'Thorpe-Rogers',
      'gender' => 2,
      'birthday' => '1990-01-01 00:00:00'
    ], [
      'email' => 'Alexander2475914@gmail.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Alexander',
      'last_name' => 'Crammer',
      'gender' => 1,
      'birthday' => '1995-12-27 00:00:00'
    ]]);
  }
}
