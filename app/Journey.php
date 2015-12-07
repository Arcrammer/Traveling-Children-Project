<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journey extends Model
{
  use SoftDeletes;

  /**
   * Mass-assignable properties
   *
   * @var array
   */
  protected $fillable = [
    'traveler',
    'title',
    'date',
    'description_filename',
    'header_image_filename',
    'created_at',
    'updated_at'
  ];

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at'
  ];

  /**
   * Each journey belongs to a traveler
   *
   * @return Illuminate\Database\Eloquent\Relations\hasOne
   */
  protected function creator() {
    return $this->hasOne('TravelingChildrenProject\Traveler', 'id', 'traveler');
  }

  /**
   * Each journey has many tags
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  protected function tags() {
    return $this->belongsToMany('TravelingChildrenProject\Tag', 'journey_tags', 'journey', 'tag');
  }
}
