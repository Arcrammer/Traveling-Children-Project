@extends('master')

@section('title', 'Home')

@section('extra_styles')
<link rel="stylesheet" href="{{ elixir('assets/css/Home.css') }}">
@endsection

@section('extra_scripts')
<script src="{{ elixir('assets/scripts/Home.js') }}"></script>
@endsection

@section('content')
<!-- Destination Modal -->
<div class="modal fade" id="destModal" tabindex="-1" role="dialog" aria-labelledby="destModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title jd_title" id="destModalLabel">Journey Destinations</h3>
      </div> <!-- .modal-header -->
      <div class="modal-body journeyDestSearch">

      </div> <!-- .modal-body .journeyDestSearch -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div> <!-- .modal-footer -->
    </div> <!-- .modal-content -->
  </div> <!-- .modal-dialog -->
</div> <!-- .modal .fade -->

<!-- Crest & Welcome Text -->
<div class="center welcome">
  <img src="/assets/images/Crest-YellowShirt.svg" class="crest hvr-grow-rotate" />
  <p class="lead center">Welcome to the Traveling Children Project Passport! Your passport to fun experiences!<br />Search our destinations here:</p>
</div> <!-- .center .welcome -->

<!-- Search Form -->
<form style="" class="form-inline center" id="destSearch">
  <div class="form-group">
    <select id="type" class="form-control">
      <option name="all_types" value="">Choose destination type </option>
        <option name="active" value="active">Active</option>
        <option name="creative" value="creative">Creative</option>
        <option name="fun" value="fun">Fun</option>
        <option name="learning" value="learning">Learning</option>
        <option name="outdoor" value="outdoor">Outdoor</option>
        <option name="performance" value="performance">Performance</option>
        <option name="reading" value="reading">Reading</option>
        <option name="tasty" value="tasty">Tasty</option>
        <option name="technology" value="technology">Technology</option>
    </select>
    <select id="location" class="form-control">
      <option name="all_locations" value="">Choose destination location </option>
      <option name="daytona" value="5">Daytona</option>
      <option name="kissimmee" value="1">Kissimmee</option>
      <option name="orlando" value="2">Orlando</option>
      <option name="sanford" value="3">Sanford</option>
      <option name="tampa" value="4">Tampa</option>
      <option name="wintergarden" value="5">Winter Garden</option>
    </select>
    <a class="btn btn-warning btn-lg" id="destSearchBtn" data-toggle="modal" data-target="#destModal">Search</a>
  </div> <!-- .form-group -->
</form>

<!-- Buttons -->
<div class="center" id="destButtons">
  <div class="btn-group btn-group-lg center" role="group" aria-label="...">
    <button type="button" class="btn btn-info" data-destination-type="active" data-toggle="modal" data-target="#destModal"><a data-destination-type="active">Active</a></button>
    <button type="button" class="btn btn-info" data-destination-type="creative" data-toggle="modal" data-target="#destModal"><a data-destination-type="creative">Creative</a></button>
    <button type="button" class="btn btn-info" data-destination-type="fun" data-toggle="modal" data-target="#destModal"><a data-destination-type="fun">Fun</a></button>
    <button type="button" class="btn btn-info" data-destination-type="learning" data-toggle="modal" data-target="#destModal"><a data-destination-type="learning">Learning</a></button>
    <button type="button" class="btn btn-info" data-destination-type="outdoor" data-toggle="modal" data-target="#destModal"><a data-destination-type="outdoor">Outdoor</a></button>
    <button type="button" class="btn btn-info" data-destination-type="performance" data-toggle="modal" data-target="#destModal"><a data-destination-type="performance">Performance</a></button>
    <button type="button" class="btn btn-info" data-destination-type="reading" data-toggle="modal" data-target="#destModal"><a data-destination-type="reading">Reading</a></button>
    <button type="button" class="btn btn-info" data-destination-type="tasty" data-toggle="modal" data-target="#destModal"><a data-destination-type="tasty">Tasty</a></button>
    <button type="button" class="btn btn-info" data-destination-type="technology" data-toggle="modal" data-target="#destModal"><a data-destination-type="technology">Technology</a></button>
  </div> <!-- .btn-group .btn-group-lg .center -->
</div> <!-- .center -->
@endsection
