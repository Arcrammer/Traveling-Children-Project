<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Input;
use Redirect;
use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\TravelerAddress;
use TravelingChildrenProject\State;

class Traveler extends Controller
{
  /**
   * Return traveler data as JSON
   *
   * @return Illuminate\Http\Response
   */
  protected function show() {
    return \TravelingChildrenProject\Traveler::where('id', '=', Auth::id())
      ->with('address', 'address.get_state')
      ->first();
  }

  /**
   * Update a travelers' data
   *
   * @return Illuminate\Http\Response
   */
  protected function update() {
    // Update the travelers' data
    $traveler = Auth::user();
    $traveler->first_name = Input::get('first_name');
    $traveler->last_name = Input::get('last_name');
    $traveler->email = Input::get('email');
    $traveler->birthday = Input::get('birthday');
    $traveler->gender = Input::get('gender');
    $traveler->save();

    // Update their address
    $address = TravelerAddress::where('traveler', '=', Auth::id())->first();
    if ($address) {
      // The traveler has an address, so
      // we can safely update it
      $address->street = Input::get('street');
      $address->city = Input::get('city');
      $address->state = State::where('abbreviation', '=', Input::get('state'))
        ->first()
        ->id;
      $address->zip = Input::get('zip');
      $address->save();
    }

    return Redirect::back();
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
      return Redirect::back();
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
