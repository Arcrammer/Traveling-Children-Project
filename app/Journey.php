<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class Journey extends Model
{
  /**
   * Each journey belongs to a traveler
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function traveler() {
    return $this->belongsTo('TravelingChildrenProject\Traveler');
  }

  /**
   * Each journey has many tags
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  protected function tags() {
    return $this->hasMany('TravelingChildrenProject\JourneyTag');
  }
}
