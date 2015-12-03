<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class JourneyTag extends Model
{
  /**
   * Each journey tag belongs to a journey
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function journey() {
    return $this->belongsTo('TravelingChildrenProject\Journey');
  }
}
