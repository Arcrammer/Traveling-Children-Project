<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;

class Welcome extends Controller
{
  /**
   * Home page
   *
   * @return Illuminate\Http\Response
   */
  protected function home() {
    return view('welcome.home');
  }
}
