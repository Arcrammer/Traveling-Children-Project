<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\Journey;

/**
 * TODO: Disallow spaces in tags
 * TODO: Allow CRUD for journeys
 */

class Journeys extends Controller
{
  /**
   * All journey posts
   *
   * @return Illuminate\Http\Response
   */
  protected function blog() {
    $journeys = Journey::orderBy('created_at', 'DESC')->paginate(15);
    return view('journeys.blog', ['journeys' => $journeys]);
  }

  /**
   * Persist a journey post
   *
   * @return Illuminate\Http\Response
   */
  protected function persist() {
    $journey = \Input::all();
    return redirect('/journeys');
  }
}
