<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class DestinationType extends Model
{
  /**
   * Each destination has a state
   *
   * @return Illuminate\Database\Eloquent\Relations\belongsTo
   */
  protected function destination() {
    return $this->belongsTo('TravelingChildrenProject\Destination');
  }
}
