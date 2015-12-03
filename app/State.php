<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  /**
   * Each state belongs to a destination
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  protected function destination() {
    return $this->belongsTo('TravelingChildrenProject\Destination');
  }
}
