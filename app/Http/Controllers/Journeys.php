<?php

namespace TravelingChildrenProject\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Input;

use TravelingChildrenProject\Http\Requests;
use TravelingChildrenProject\Http\Controllers\Controller;
use TravelingChildrenProject\Journey;
use TravelingChildrenProject\JourneyTag;
use TravelingChildrenProject\Tag;

/**
 * TODO: Allow deletion of tags on both
 * journey creation and deletion
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
  protected function show($uuid) {
    if (Auth::check()) {
      $journey = Journey::where('uuid', '=', $uuid)->first();
      $journeyBodyFilename = base_path().'/public/assets/journeys/descriptions/'.$journey->description_filename;
      $journeyHeaderImageFilename = '/assets/journeys/header_images/'.$journey->header_image_filename;
      $journeyData = [
        'uuid' => $journey->uuid,
        'title' => $journey->title,
        'date' => $journey->date,
        'body' => strip_tags(file_get_contents($journeyBodyFilename)),
        'image' => $journeyHeaderImageFilename,
        'tags' => ''
      ];
      foreach ($journey->tags->all() as $tag) {
        $journeyData['tags'] .= ' #'.$tag->tag;
      }
      return $journeyData;
    } else {
      return 'Log in first.';
    }
  }

  /**
   * Remove a journey post
   *
   * @return Illuminate\Http\Response
   */
  protected function delete($uuid) {
    $journey = Journey::where('uuid', '=', $uuid)->first();
    if ($journey->creator->id == Auth::id()) {
      // The user currently authenticated user
      // is the creator of the post they're
      // trying to delete; Soft delete it
      Journey::destroy($journey->id);
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
    fwrite($bodyFile, htmlspecialchars(Input::get('body')));
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

    // Set the 'header_image_filename' to
    // NULL if the user hasn't uploaded
    // a header image with the post
    //
    $headerImageFilename = (Input::hasFile('header_image')) ? $headerImageFilename : NULL;

    // Send it to the database
    $journeyData += [
      'header_image_filename' => $headerImageFilename
    ];

    // Persist the record to the database
    $created = Journey::create($journeyData);

    if ($created) {
      // Save the tag associations
      $this->persistTagsToJourneyWithID(Input::get('tags'), $created->id);
    }
    return redirect('/journeys');
  }

  /**
   * Update a journey post
   *
   * @return Illuminate\Http\Response
   */
  protected function update() {
    $journey = Journey::where('uuid', '=', Input::get('post-uuid'))->first();
    $journey->title = Input::get('title');
    $journey->date = Input::get('date');

    // Rewrite the contents of
    // the journeys' description
    $bodyFile = fopen(base_path().'/public/assets/journeys/descriptions/'.$journey->description_filename, 'w+');
    fwrite($bodyFile, htmlspecialchars(Input::get('body')));
    fclose($bodyFile);

    // Rename the old image to indicate
    // it was deleted and save the new
    // one if there was a new image
    // uploaded
    if (Input::hasFile('header_image') && Input::file('header_image')->isValid()) {
      // There was a new image uploaded
      $oldHeaderImageFilename = $journey->header_image_filename;
      $headerImagePath = base_path().'/public/assets/journeys/header_images/';
      rename($headerImagePath.$oldHeaderImageFilename, '!'.$oldHeaderImageFilename);
      Input::file('header_image')->move($headerImagePath, $oldHeaderImageFilename);
    }

    // Remember the tags for it
    $this->persistTagsToJourneyWithID(Input::get('tags'), $journey->id);

    $journey->save();
    return redirect('/journeys');
  }

  protected function persistTagsToJourneyWithID($tags, $journeyID) {
    // Delete all of the tag associations
    // currently stored in the database
    JourneyTag::where('journey', '=', $journeyID)->delete();

    // Strip spaces
    $formattedTags = preg_replace('/\s+/', '', $tags);

    // Split them to an array
    $formattedTags = preg_split('/#/', $formattedTags, NULL, PREG_SPLIT_NO_EMPTY);

    foreach ($formattedTags as $tag) {
      // Add the tag to 'journey_tags'
      // if it isn't there already
      $itExists = Tag::where(['tag' => $tag])->first();
      if ($itExists) {
        // Remember the name for later
        $tag_id = $itExists->id;
      } else {
        // It doesn't exist, so
        // we'll create it now
        $tag_id = Tag::create(['tag' => $tag])->id;
      }

      // Make sure it isn't already
      // marked in the 'journey_tags'
      // table before adding it
      //
      $associatedTag = JourneyTag::where([
        'tag' => $tag_id,
        'journey' => $journeyID
      ])->first();
      if ($associatedTag == NULL) {
        // The tag hasn't been associated
        // with this post yet; Save it to
        // the 'journey_tags' join table
        //
        JourneyTag::create([
          'journey' => $journeyID,
          'tag' => $tag_id
        ]);
      }
    }
  }
}
