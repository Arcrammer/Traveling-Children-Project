<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Everything Else
Route::get('/', 'welcome@home');
Route::get('/journeys', 'journeys@blog');
Route::get('/journeys/delete/{id}', 'journeys@delete');
Route::post('/journeys', 'journeys@persist');

// Controllers
Route::controllers([
  'auth' => '\TravelingChildrenProject\Http\Controllers\Auth\AuthController',
  'password' => '\TravelingChildrenProject\Http\Controllers\Auth\PasswordController'
]);

// Redirections
Route::get('/ChromeAdvert', function () {
  /**
   * These are primarily to prevent the
   * excessivly long links in our HTML
   */
  return redirect('https://www.google.com/intl/en/chrome/browser/desktop/index.html#brand=CHMB&utm_campaign=en&utm_source=en-ha-na-us-sk&utm_medium=ha');
});
