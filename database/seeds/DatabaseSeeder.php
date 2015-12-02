<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();

    $this->call(GenderSeeder::class);
    $this->call(TravelerSeeder::class);
    $this->call(StatesSeeder::class);
    $this->call(TravelerAddressSeeder::class);

    Model::reguard();
  }
}
