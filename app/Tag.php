<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * Each tag has many journeys
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  protected function journeys() {
    return $this->hasManyThrough('TravelingChildrenProject\Journey', 'TravelingChildrenProject\JourneyTag', 'journey');
  }
}
