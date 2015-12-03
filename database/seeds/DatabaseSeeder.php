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
    $this->call(CitiesSeeder::class);
    $this->call(TravelerAddressSeeder::class);
    $this->call(DestinationTypesSeeder::class);
    $this->call(DestinationSeeder::class);
    $this->call(JourneysSeeder::class);
    $this->call(TagsSeeder::class);
    $this->call(JourneyTagsSeeder::class);

    Model::reguard();
  }
}
