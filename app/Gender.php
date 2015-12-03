<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
  /**
   * Each traveler has a gender
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function traveler() {
    return $this->belongsTo('TravelingChildrenProject\Traveler');
  }
}
