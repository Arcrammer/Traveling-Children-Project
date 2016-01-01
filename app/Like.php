<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Like extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'traveler',
    'likes_journey'
  ];

  /**
   * Travelers can like multiple journeys
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function journey() {
    return $this->hasOne('TravelingChildrenProject\Journey', 'id', 'likes_journey');
  }
}
