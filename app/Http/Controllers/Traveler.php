<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use Auth;

class Traveler extends Controller
{
  /**
   * Return traveler data as JSON
   *
   * @return Illuminate\Http\Response
   */
  protected function show() {
    return \TravelingChildrenProject\Traveler::with('address.get_state')
      ->where('passport_id', '=', Auth::user()->passport_id)
      ->firstOrFail();
  }

  /**
   * Delete a travelers' passport profile
   *
   * @return Illuminate\Http\Response
   */
  protected function delete($uuid) {
    $traveler = $this->travelerWithUUID($uuid);
    if (Auth::id() == $traveler->id) {
      // The user has authenticated and
      // they're the same traveler as the
      // traveler they're trying to delete
      //
      $traveler->delete();
      return redirect('/');
    }
  }

  /**
   * Get a traveler object by their UUID
   *
   * @return \TravelingChildrenProject\Traveler
   */
  protected function travelerWithUUID($passport_id) {
    $passport = \TravelingChildrenProject\Traveler::where('passport_id', '=', $passport_id)->firstOrFail();
    if (Auth::id() == $passport->id) {
      // The user has authenticated and
      // they're the same traveler as the
      // traveler they're trying to delete
      //
      return $passport;
    }
  }
}
