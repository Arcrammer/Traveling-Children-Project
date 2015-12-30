<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TravelerAddress extends Model
{
  use SoftDeletes;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'traveler',
    'street',
    'city',
    'state',
    'zip',
    'phone',
    'created_at',
    'updated_at'
  ];

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
  public function get_state() {
    return $this->hasOne('TravelingChildrenProject\State', 'id', 'state');
  }
}
