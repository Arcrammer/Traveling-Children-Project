<?php

use Illuminate\Database\Seeder;

class JourneysSeeder extends Seeder
{
  /**
   * Get the 'id' of a traveler
   * by their email address
   *
   * @return integer
   */
  private function idByEmail($email) {
    return DB::table('travelers')
      ->select('id')
      ->from('travelers')
      ->where('email', '=' , $email)
      ->first()
      ->id;
  }

  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $alexandersID = $this->idByEmail('alexander2475914@gmail.com');
    $christinasID = $this->idByEmail('chris@cdtdesign.com');
    $christiansID = $this->idByEmail('chris@christianpatrick.me');
    $patricksID = $this->idByEmail('pat@cdtdesign.com');
    $johnnysID = $this->idByEmail('johnny@me.com');

    DB::table('journeys')->insert([[
      'traveler' => $christinasID,
      'title' => 'Pumpkin Patch Farm',
      'date' => '2015-10-24 00:00:00',
      'description_filename' => '54ccde28defe22d5957e9e4b5396ca95.html',
      'header_image_filename' => '3aa39decc5a01363489991f174176f31.jpg',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'traveler' => $alexandersID,
      'title' => 'a Fun Amusement Park',
      'date' => '2015-10-30 00:00:00',
      'description_filename' => 'd8729bab3cf051b24dc885078328bf14.html',
      'header_image_filename' => 'a69bf6fe0634f36f89eb67cb9799b9d3.jpg',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'traveler' => $christiansID,
      'title' => 'the World of Harry Potter',
      'date' => '2015-11-07 00:00:00',
      'description_filename' => 'a95dfd10fd868e1a3bc0866bcae2af0e.html',
      'header_image_filename' => '1d9951fd4d1670b79cdc11baad6287a5.jpg',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'traveler' => $patricksID,
      'title' => 'Orlando Science Center',
      'date' => '2015-11-08 00:00:00',
      'description_filename' => 'd6885d80cba10c5e7bc0243f58593698.html',
      'header_image_filename' => '7bea2690b6bac3b753dfb390564cfecf.jpg',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ], [
      'traveler' => $johnnysID,
      'title' => 'ZOOmAir Zipline',
      'date' => '2015-11-09 00:00:00',
      'description_filename' => '03249c153cde5133960d0fa3338cb975.html',
      'header_image_filename' => '67df8deca3d117e681ae5ca4e7fca747.jpg',
      'created_at' => date('Y-m-d H:i:s', time()),
      'updated_at' => date('Y-m-d H:i:s', time())
    ]]);
  }
}
