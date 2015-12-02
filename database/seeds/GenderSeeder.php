<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $genders = ['Male', 'Female', 'Unspecified'];

    foreach ($genders as $gender) {
      DB::table('genders')->insert(['gender' => $gender]);
    }
  }
}
