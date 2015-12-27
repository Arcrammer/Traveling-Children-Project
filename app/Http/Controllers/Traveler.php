<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use Auth;

class Traveler extends Controller
{
  protected function delete($uuid) {
    $passport = \TravelingChildrenProject\Traveler::where('passport_id', '=', $uuid)->first();
    if (Auth::id() == $passport->id) {
      // The user has authenticated and
      // they're the same traveler as the
      // traveler they're trying to delete
      //
      $passport->delete();
      return redirect('/');
    }
  }
}
