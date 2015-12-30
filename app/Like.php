<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'traveler',
    'likes_journey'
  ];
}
