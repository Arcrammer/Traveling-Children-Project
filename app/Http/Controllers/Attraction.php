<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\Destination;
use Input;

class Attraction extends Controller
{
  /**
   * Return destination information as JSON
   *
   * @return \Illuminate\Http\Response
   */
  public function show()
  {
    return Destination::where('type', '=', Input::get('type'))
      ->where('city', '=', Input::get('location'))
      ->with('city', 'state', 'type')
      ->get();
  }
}
