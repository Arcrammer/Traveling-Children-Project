<?php

namespace TravelingChildrenProject\Http\Controllers\Auth;

use TravelingChildrenProject\User;
use Session;
use Request;
use Validator;
use TravelingChildrenProject\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
  /*
  |--------------------------------------------------------------------------
  | Registration & Login Controller
  |--------------------------------------------------------------------------
  |
  | This controller handles the registration of new users, as well as the
  | authentication of existing users. By default, this controller uses
  | a simple trait to add these behaviors. Why don't you explore it?
  |
  */

  use AuthenticatesAndRegistersUsers, ThrottlesLogins;

  // We're not using the
  // default table name
  protected $table = 'travelers';

  // Where travelers are sent upon
  // successful passport creation
  protected $redirectPath = "/";

  // Where travelers are sent
  // upon login failure
  protected $loginPath = "/";

  /**
   * Create a new authentication controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest', ['except' => 'getLogout']);
  }

  /**
   * Get a validator for an incoming registration request.
   *
   * @param  array  $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    $validator = Validator::make($data, [
      'email' => 'required|email|max:255|unique:travelers',
      'password' => 'required|confirmed|min:6',
    ]);
    if ($validator->fails()) {
      // Check whether the sign-in modal or
      // sign-up modal need to display
      // with the problem messages
      if (Request::path() == 'auth/login') {
        Session::flash('signin_needs_display', true);
      }
      if (Request::path() == 'auth/register') {
        Session::flash('signup_needs_display', true);
      }
    }
    return $validator;
  }

  /**
   * Create a new user instance after a valid registration.
   *
   * @param  array  $data
   * @return User
   */
  protected function create(array $data)
  {
    return User::create([
      'email' => $data['email'],
      'password' => bcrypt($data['password']),
    ]);
  }
}
