<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class TravelerAddress extends Model
{
  /**
   * Each address belongs to a traveler
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function traveler() {
    return $this->belongsTo('TravelingChildrenProject\Traveler');
  }

  /**
   * Each address has a state
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function get_state() {
    return $this->hasOne('TravelingChildrenProject\State', 'id');
  }
}
