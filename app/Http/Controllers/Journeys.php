<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\Journey;

/**
 * TODO: Disallow spaces in tags
 * TODO: Allow CRUD for journeys
 */

class Journeys extends Controller
{
  /**
   * All journey posts
   *
   * @return Illuminate\Http\Response
   */
  protected function blog() {
    $journeys = Journey::orderBy('created_at', 'DESC')->paginate(15);
    return view('journeys.blog', ['journeys' => $journeys]);
  }

  /**
   * Return joruney data as JSON
   *
   * @return Illuminate\Http\Response
   */
  protected function show($id) {
    $journey = Journey::find($id);
    $journey->body = file_get_contents(base_path().'/public/assets/journeys/descriptions/'.$journey->description_filename);
    $journey->tags = $journey->tags;
    return $journey;
  }

  /**
   * Remove a journey post
   *
   * @return Illuminate\Http\Response
   */
  protected function delete($id) {
    if (Journey::find($id)->creator->id == Auth::id()) {
      // The user currently authenticated user
      // is the creator of the post they're
      // trying to delete; Soft delete it
      Journey::destroy($id);
    }
    return redirect('/journeys');
  }

  /**
   * Persist a journey post
   *
   * @return Illuminate\Http\Response
   */
  protected function persist() {
    // Write the body to the filesystem
    $bodyFilename = md5(uniqid(rand(), true)) . '.html';
    $bodyPath = base_path().'/public/assets/journeys/descriptions/'.$bodyFilename;
    $bodyFile = fopen($bodyPath, 'w+');
    fwrite($bodyFile, Input::get('body'));
    fclose($bodyFile);

    // Save the uploaded header image to
    // the filesystem if there was one
    if (Input::hasFile('header_image')) {
      $headerImageFilename = md5(uniqid(rand(), true)) . '.jpg';
      $headerImagePath = base_path().'/public/assets/journeys/header_images/';
      Input::file('header_image')->move($headerImagePath, $headerImageFilename);
    }

    // Add the image path if
    // an image was uploaded
    $journeyData = [
      'traveler' => Auth::id(),
      'title' => Input::get('title'),
      'date' => Input::get('date'),
      'description_filename' => $bodyFilename,
      'created_at' => gmdate('Y-m-d H:i:s'),
      'updated_at' => gmdate('Y-m-d H:i:s')
    ];

    if (Input::hasFile('header_image')) {
      $journeyData += [
        'header_image_filename' => $headerImageFilename
      ];
    } else {
      $journeyData += [
        'header_image_filename' => NULL
      ];
    }

    // Persist the record to the database
    Journey::create($journeyData);
    return redirect('/journeys');
  }
}
