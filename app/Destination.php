<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
  /**
   * Each destination has a city
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function city() {
    return $this->hasOne('TravelingChildrenProject\City', 'id', 'city');
  }

  /**
   * Each destination has a state
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function state() {
    return $this->hasOne('TravelingChildrenProject\State', 'id', 'state');
  }

  /**
   * Each destination has a type
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function type() {
    return $this->hasOne('TravelingChildrenProject\DestinationType', 'id', 'type');
  }
}
