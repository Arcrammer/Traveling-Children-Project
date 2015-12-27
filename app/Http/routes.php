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

// Home
Route::get('/', 'Welcome@home');

// Passport Profiles
Route::get('/traveler/delete/{passport_id}', 'Traveler@delete');

// Journeys
Route::group(['middleware' => 'journeys'], function () {
  Route::get('/journeys', 'Journeys@blog');
  Route::post('/journeys/edit', 'Journeys@update');
  Route::get('/journeys/show/{uuid}', 'Journeys@show');
  Route::get('/journeys/delete/{uuid}', 'Journeys@delete');
  Route::post('/journeys', 'Journeys@persist');
});

// Controllers
Route::controllers([
  'auth' => '\TravelingChildrenProject\Http\Controllers\Auth\AuthController',
  'password' => '\TravelingChildrenProject\Http\Controllers\Auth\PasswordController'
]);

// Redirections
/**
 * These are primarily to prevent the
 * excessivly long links in our HTML
 */
Route::get('/ChromeAdvert', function () {
  return redirect('https://www.google.com/intl/en/chrome/browser/desktop/index.html#brand=CHMB&utm_campaign=en&utm_source=en-ha-na-us-sk&utm_medium=ha');
});
