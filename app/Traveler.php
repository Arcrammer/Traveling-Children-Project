<?php

namespace TravelingChildrenProject;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Traveler
  extends Model
  implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
    {
  use Authenticatable,
    Authorizable,
    CanResetPassword;

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
  protected function journeys() {
    return $this->hasMany('TravelingChildrenProject\Journey', 'id');
  }

  /**
   * Each traveler has one address
   *
   * @return Illuminate\Database\Eloquent\Relations\HasOne
   */
  protected function address() {
    return $this->hasOne('TravelingChildrenProject\TravelerAddress', 'id');
  }
}
