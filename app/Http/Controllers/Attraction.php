<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\Destination;
use TravelingChildrenProject\DestinationType;

class Attraction extends Controller
{
  /**
   * Return destination information as JSON
   *
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    // Determine the types' id
    $type_id = DestinationType::where('name', '=', Input::get('type'))->first()->id;

    // Fetch the appropriate destinations
    if (Input::has('location')) {
      $destinations = Destination::where('type', '=', $type_id)
        ->where('city', '=', Input::get('location'))
        ->with('city', 'state', 'type')
        ->get();
    } else {
      $destinations = Destination::where('type', '=', $type_id)
        ->with('city', 'state', 'type')
        ->get();
    }
    return $destinations;
  }
}
