@extends('master')
@section('title', 'Journeys')
@section('extra_styles')
<link rel="stylesheet" href="{{ elixir('assets/css/Journeys.css') }}">
@endsection
@section('extra_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js"></script>
<script src="{{ elixir('assets/js/Journeys.js') }}"></script>
@endsection
@section('content')

<!-- Journey Creation Modal -->
<div class="modal fade" id="journeyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <form id="journey-form" class="form-inline journey-form" method="POST" enctype="multipart/form-data">
        </form>
        {{ csrf_field() }}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>TC Journey to...</h4>
        <input form="journey-form" class="journey-title" type="text" name="title" placeholder="Enter Journey Post Title…" autocomplete="off" required>
      </div> <!-- .modal-header -->
      <div class="modal-body">
        <label for="date">When did this journey happen?</label>
        <input form="journey-form" id="date" type="date" name="date" class="form-control" autocomplete="on" autocomplete="off" required>

        <label for="body">What did you do there?</label>
        <textarea id="body" rows="10" name="body" class="form-control" placeholder="Body..." autocomplete="off" required></textarea>

        <label for="tags">Choose some tags to help others easily find this journey.</label>
        <input form="journey-form" id="tags" type="text" name="tags" class="form-control" value="#HappyTravels #TravelingChristian" placeholder="#One #Two #Red #Blue" autocomplete="off" required>

        <label for="photo">Is there a photo you took while you were there??</label>
        <input form="journey-form" id="photo" type="file" name="header_image" class="input-group" accept="image/*">
      </div> <!-- .modal-body -->
      <div class="modal-footer">
        <input form="journey-form" style="font-size:1.5em;border-radius:6px;" type="submit" class="btn btn-warning journeyUpdateButton" value="Create">
      </div> <!-- .modal-footer -->
    </div> <!-- .modal-content -->
  </div> <!-- .modal-dialog -->
</div> <!-- .modal .fade -->

<!-- Crest & Welcome Text -->
<div class="center welcome">
  <img src="/assets/images/Crest-YellowShirt.svg" class="crest hvr-grow-rotate" />
  <p class="lead center"><span>Welcome Traveler!</span> You have arrived at Traveling Children Project's Journey Blog! Here you can share your journey with other Travelers and also see where their travels have led them. <em style="font-weight:500;">Where has TC taken you? Click the button below to share your latest journeys here!</em></p>
  <button type="button" style="margin:auto 0;padding:0;" class="btn btn-primary btn-lg journeyModalButton journeyCreateButton" data-toggle="modal" data-target="#journeyModal">
    <span class="hvr-icon-spin" style="color:#ef6831;text-align:center;vertical-align: top;font-size:1.125em;"></span>
  </button>
</div> <!-- .center .welcome -->

<!-- Journey Blog Posts -->
<div class="jp_wrapper grid">
  @foreach ($journeys->items() as $journey)
    <div class="journeyPost" data-journey-id="{{ $journey->id }}">
      <div class="jpPadding">
        <p class="jp_title">TC Journey to {{ $journey->title }}</p>
      </div> <!-- .jpPadding -->
      @if ($journey->header_image_filename !== NULL)
        <div class="jp_img">
          <img src="/assets/journeys/header_images/{{ $journey->header_image_filename }}">
        </div>
      @endif
      <div class="jpPadding">
        <p class="jp_fname_date">
          <em>
            <a href="#">
              <b>Traveling {{ $journey->creator->first_name }}</b>
            </a> / {{ $journey->created_at->diffForHumans() }}
          </em>
        </p>
        <p class="jp_body">
          {!! file_get_contents(base_path().'/public/assets/journeys/descriptions/'.$journey->description_filename) !!}
        </p>
        <p class="htags">
          @foreach ($journey->tags as $tag)
          <span class="tag">#{{ $tag->tag }}</span>
          @endforeach
        </p>
        @if ($journey->traveler == Auth::id())
          <hr class="jp_divider">
			  <div class="fa_JourneyPost">
				  <div class="dropup jp_dropup">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Share"><i class="fa fa-send"></i></a>
				    <ul class="dropdown-menu">
					  <a href="#" target="_blank"><li><i class="fa fa-facebook-square"></i> Facebook</li></a>
					  <a href="#" target="_blank"><li><i class="fa fa-twitter-square"></i> Twitter</li></a>
					  <a href="#" target="_blank"><li><i class="fa fa-instagram"></i> Instagram</li></a>
					  <a href="#" target="_blank"><li><i class="fa fa-tumblr-square"></i> Tumblr</li></a>
					  <a href="mailto:"><li><i class="fa fa-envelope-square"></i> Email</li></a>
				    </ul>
				  </div>
				  <a href="#" title="Like"><i class="fa fa-heart"></i></a>
				  <a href="#" title="Edit"><i class="fa fa-pencil" journeyEditButton" data-toggle="modal" data-target="#journeyModal"></i></a>
				  <a href="/journeys/delete/{{ $journey->id }}" title="Delete" class="journeyDeleteButton"><i class="fa fa-close"></i></a>
			  </div>
        @endif
      </div> <!-- .jpPadding -->
    </div> <!-- .journeyPost -->
  @endforeach
</div> <!-- .jp_wrapper -->

@endsection
