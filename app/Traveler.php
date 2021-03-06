<?php

namespace TravelingChildrenProject;

use Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\SoftDeletes;

class Traveler
  extends Model
  implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
    {
  use Authenticatable,
      Authorizable,
      CanResetPassword,
      SoftDeletes;

  /**
   * We're using the 'travelers' table
   * rather than the default 'users'.
   *
   * @var string
   */
  public $table = 'travelers';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'email',
    'password',
    'first_name',
    'last_name',
    'gender',
    'birthday',
    'selfie_filename',
    'created_at',
    'updated_at'
  ];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token'
  ];

  /**
   * Each traveler has many journeys
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function journeys() {
    return $this->hasMany('TravelingChildrenProject\Journey', 'id');
  }

  /**
   * Each traveler has one address
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function address() {
    return $this->hasOne('TravelingChildrenProject\TravelerAddress', 'traveler', 'id');
  }

  /**
   * Travelers can like multiple journeys
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function likes() {
    return $this->hasMany('TravelingChildrenProject\Like', 'traveler');
  }

  /**
   * Travelers can like multiple journeys
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function likes_journey($with_id) {
    if (Like::where('traveler', '=', Auth::id())->where('likes_journey', '=', $with_id)->first()) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}
