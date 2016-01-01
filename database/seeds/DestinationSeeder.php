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
    $possibleLocations = [
      'Pumpkin Patch Farm',
      'Orlando Science Center',
      'Random Amusement Park',
      'World of Harry Potter',
      'ZOOmAir Zipline'
    ];

    $possibleDescriptions = [
      'The Central Florida Zoo & Botanical Gardens is a 116-acre (47 ha) zoo and botanical garden located north of Orlando, Florida at the intersection of I-4 and Hwy 17-92 near the city of Sanford.',
      'The Orlando Science Center is a private science museum located in Orlando, Florida. Its purposes are to provide experience-based opportunities for learning about science and technology and to promote public understanding of science.',
      'Busch Gardens Tampa is a 335-acre 19th century African-themed animal theme park located in the city of Tampa, Florida.',
      'The Florida Aquarium is a 501(c)(3) non-profit organization whose mission is to entertain, educate and inspire stewardship about our natural environment.',
      'Petting zoo with farm animals such as cows, pigs & goats, plus pony, hay & train rides.',
      'If you\'re looking for your kids to have a fun and exciting time, then you need to give us a try "Lets Skate Orlando". We have a great facility, that not only offers roller skating but video games and exciting party rooms as well. In a high tech atmosphere with a blast of colors and music to fit the tempo, an energizing mood will make the fun times.',
      'Frozen yogurt parlor located in the heart of Winter Garden, that has an assorment of wonderful flavors to choose from.',
      'A fun-filled inflatable play center. Our wall-to-wall inflatable slides, jumps, and obstacle courses will keep your kids active, happy, and healthy.',
      'Creating "experiences that enlighten, entertain and enrich the lives of family and young audiences.',
      'The St. Johns Rivership Co. operates the most relaxing cruises on the St. Johns River aboard the Rivership Barbara-Lee, an authentic paddlewheeler. Leaving from Monroe Harbour Marina in downtown Sanford, Florida, the Barbara-Lee serves up food, entertainment and fun alongside the best views of wildlife along the storied St. Johns.',
      'Enjoy a treetop adventure at ZOOm Air Adventure Park Orlando, up in the trees of the Central Florida Zoo & Botanical Gardens! ZOOm Airâ€™s aerial adventure courses are deftly woven into the forest of the blackwater river floodplain swamp that is home to the Zoo.',
      'Enjoy a treetop adventure at ZOOm Air Adventure Park Daytona, up in the trees.',
      'Come out and “walk on water” with WOW Balls! WOW Balls are large flexible bubbles that make it possible to safely float, walk, run, roll, and jump on the surface of water without getting wet! While inside the transparent bubble you can clearly view everything around you and under water.'
    ];

    for ($i=0; $i <= 500; $i++) {
      DB::table('destinations')->insert([
        'name' => $possibleLocations[array_rand($possibleLocations)],
        'city' => rand(1, 6),
        'state' => rand(1, 51),
        'type' => rand(1, 9),
        'description' => $possibleDescriptions[array_rand($possibleDescriptions)],
        'street' => rand(0, 10000).' Random Street',
        'zip' => rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9),
        'adult_cost' => mt_rand(5 * 10, 1000 * 10) / 100,
        'child_cost' => mt_rand(5 * 10, 1000 * 10) / 100,
        'discount_percentage' => rand(0, 30)
      ]);
    }
  }
}
