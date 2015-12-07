<?php

namespace TravelingChildrenProject;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  /**
   * There's no use for timestamps
   *
   * @var boolean
   */
  public $timestamps = false;

  /**
   * Mass-assignable properties
   *
   * @var array
   */
  protected $fillable = [
    'tag'
  ];
}
