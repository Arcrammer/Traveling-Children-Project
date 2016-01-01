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
      @foreach ($types as $type)
        <option value="{{ $type->id }}">{{ $type->name }}</option>
      @endforeach
    </select>
    <select id="location" class="form-control">
      <option name="all_locations" value="">Choose destination location </option>
      @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
      @endforeach
    </select>
    <a class="btn btn-warning btn-lg" id="destSearchBtn" data-toggle="modal" data-target="#destModal">Search</a>
  </div> <!-- .form-group -->
</form>

<!-- Buttons -->
<div class="center" id="destButtons">
  <div class="btn-group btn-group-lg center" role="group" aria-label="...">
    @foreach ($types as $type)
      <button type="button" class="btn btn-info" data-destination-type="{{ $type->id }}" data-toggle="modal" data-target="#destModal"><a data-destination-type="{{ $type->id }}">{{ $type->name }}</a></button>
    @endforeach
  </div> <!-- .btn-group .btn-group-lg .center -->
</div> <!-- .center -->
@endsection
