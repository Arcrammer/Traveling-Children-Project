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
      'email' => 'chris@cdtdesign.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Christina',
      'last_name' => 'Thorpe-Rogers',
      'gender' => 2,
      'birthday' => '1990-01-01 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'alexander2475914@gmail.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Alexander',
      'last_name' => 'Crammer',
      'gender' => 1,
      'birthday' => '1995-12-27 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'chris@christianpatrick.me',
      'password' => bcrypt('secret'),
      'first_name' => 'Christian',
      'last_name' => 'Patrick',
      'gender' => 1,
      'birthday' => '2000-00-00 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'pat@cdtdesign.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Patrick',
      'last_name' => 'Rogers',
      'gender' => 1,
      'birthday' => '2000-00-00 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'johnny@me.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Johnny',
      'last_name' => 'Crawford',
      'gender' => 1,
      'birthday' => '2006-01-03 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'lucy@yahoo.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Lucy',
      'last_name' => 'Smith',
      'gender' => 1,
      'birthday' => '2006-05-09 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'mindy@me.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Mindy',
      'last_name' => 'Moore',
      'gender' => 1,
      'birthday' => '1974-08-31 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'email' => 'tom@me.com',
      'password' => bcrypt('secret'),
      'first_name' => 'Tommy',
      'last_name' => 'Thompson',
      'gender' => 1,
      'birthday' => '2006-01-03 00:00:00',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ]]);
  }
}
