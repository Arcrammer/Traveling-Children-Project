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
  protected function city() {
    return $this->hasOne('TravelingChildrenProject\City');
  }

  /**
   * Each destination has a state
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  protected function state() {
    return $this->hasOne('TravelingChildrenProject\State');
  }

  /**
   * Each destination has a type
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  protected function type() {
    return $this->hasOne('TravelingChildrenProject\Type');
  }
}
