<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use TravelingChildrenProject\Http\Reqwuests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\DestinationType;
use TravelingChildrenProject\City;

class Welcome extends Controller
{
  /**
   * Home page
   *
   * @return Illuminate\Http\Response
   */
  protected function home() {
    $viewData = [
      'types' => DestinationType::all(),
      'cities' => City::all()
    ];
    return view('welcome.home', $viewData);
  }
}
