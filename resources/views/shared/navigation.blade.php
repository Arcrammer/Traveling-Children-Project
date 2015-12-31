@if (Auth::check())
<?php
  /**
   * The user has authenticated
   */
?>
<!-- Profile -->
<div class="modal fade" id="profileModal">
  <div class="modal-dialog">
    <div class="modal-content travelerProfile">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="pp_title">My Passport Profile</h2>
      </div> <!-- .modal-header -->

      <div class="modal-body">
        <?php $traveler = Auth::user() ?>
        {!! isset($traveler->selfie_filename) ? '<div class="left">' :  '' !!}
          <p><b>First Name:</b> {{ $traveler->first_name }}</p>
          <p><b>Last Name:</b> {{ $traveler->last_name }}</p>
          <p><b>Email:</b> {{ $traveler->email }}</p>
          @if ($traveler->address)
            <p><b>Street Address:</b> {{ $traveler->address->street }}</p>
            <p><b>City:</b> {{ $traveler->address->city }}</p>
            <p><b>State:</b> {{ $traveler->address->get_state->name }} <b>Zip:</b> {{ $traveler->address->zip }}</p>
          @endif
          <p><b>Birthday:</b> {{ date('l, F d, Y', strtotime($traveler->birthday)) }}</p>
        {!! isset($traveler->selfie_filename) ? '</div> <!-- .left -->' :  '' !!}
        {!! isset($traveler->selfie_filename) ? '<div class="right">' :  '' !!}
        @if ($traveler->selfie_filename != NULL)
          <div class="pp_pic">
            <img src="/assets/selfies/{{ $traveler->selfie_filename }}" alt="{{ $traveler->selfie_filename }}">
          </div>
        @endif
        {!! isset($traveler->selfie_filename) ? '</div> <!-- .right -->' :  '' !!}
      </div> <!-- .modal-body -->

      <div class="modal-footer">
        <button
          class="btn btn-primary btn-lg editProfileButton"
          data-target="#signupModal">Edit</button>
        <a
          href="/traveler/delete/{{ $traveler->passport_id }}"
          class="btn btn-warning btn-lg deleteProfileButton"
          role="button">Delete Passport</a>
      </div> <!-- .modal-footer -->
    </div> <!-- .modal-content travelerProfile -->
  </div> <!-- .modal-dialog -->
</div> <!-- .modal .fade #profileModal -->
@else
<?php
  /**
   * The user hasn't yet authenticated
   */
?>
<!-- Sign-in Modal -->
<div class="modal fade bs-example-modal-sm" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button
          type="button"
          class="close"
          data-dismiss="modal"
          aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Traveler Sign In</h4>
      </div> <!-- .modal-header -->
      <div class="modal-body">
        @if (count($errors) > 0)
          <div class="probs">
            @foreach ($errors->all() as $error)
              <p class="prob">{{ $error }}</p>
            @endforeach
          </div> <!-- .probs -->
        @endif
        <form
          action="/auth/login"
          class="form-inline signin-form"
          id="signin-form"
          method="POST"
          enctype="multipart/form-data">
        </form>
        <input
          form="signin-form"
          type="hidden"
          name="_token"
          value="{{ csrf_token() }}">
        <input
          form="signin-form"
          type="text"
          name="email"
          class="form-control"
          placeholder="Enter User ID"
          autocomplete="off"
          required>
        <br />
        <input
          form="signin-form"
          type="password"
          name="password"
          class="form-control"
          placeholder="Enter Password"
          required>
      </div> <!-- .modal-body -->
      <div class="modal-footer">
        <input
          form="signin-form"
          style="font-size:1.5em;border-radius:6px;"
          id="signinButton"
          type="submit"
          class="btn btn-warning signinButton"
          value="Sign In!">
      </div> <!-- .modal-footer -->
    </div> <!-- .modal-content -->
  </div> <!-- .modal-dialog .modal-sm -->
</div> <!-- .modal .fade .bs-example-modal-sm -->
@endif
<?php
  /**
   * This stuff will be rendered regardless as
   * to whether the user has authenticated
   */
?>
<!-- Sign Up Modal -->
<div class="modal fade bs-example-modal-sm" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4>Sign-up</h4>
      </div> <!-- .modal-header -->

      <div class="modal-body">
        @if (count($errors) > 0)
          <div class="probs">
            @foreach ($errors->all() as $error)
              <p class="prob">{{ $error }}</p>
            @endforeach
          </div> <!-- .probs -->
        @endif
        <form
          action="/auth/register"
          class="form-inline signup-form"
          id="signup-form"
          method="POST"
          enctype="multipart/form-data">
        </form>
        <input
          form="signup-form"
          type="hidden"
          name="_token"
          value="{{ csrf_token() }}">
        <input
          id="first-name"
          form="signup-form"
          class="form-control journeyPostTitle"
          type="text"
          name="first_name"
          placeholder="Traveler's First Name"
          autocomplete="off"
          value="{{ old('first_name') }}"
          required>
        <br />
        <input
          id="last-name"
          form="signup-form"
          class="form-control"
          type="text"
          name="last_name"
          placeholder="Traveler's Last Name"
          autocomplete="off"
          value="{{ old('last_name') }}"
          required>
        <br />
        <input
          id="email"
          form="signup-form"
          class="form-control"
          type="email"
          name="email"
          placeholder="Email Address"
          value="{{ old('email') }}"
          required>
        <br />
        <span class="passwords">
          <input
            form="signup-form"
            class="form-control"
            type="password"
            name="password"
            placeholder="Password"
            required>
          <br />
          <input
            form="signup-form"
            class="form-control"
            type="password"
            name="password_confirmation"
            placeholder="Password"
            required>
          <br />
        </span> <!-- .passwords -->
        <input
          id="street"
          form="signup-form"
          class="form-control"
          type="text"
          name="street"
          placeholder="Street Address, Apt #"
          autocomplete="off"
          value="{{ old('street') }}"
          required>
        <br />
        <input
          id="city"
          form="signup-form"
          class="form-control"
          type="text"
          name="city"
          placeholder="City"
          autocomplete="off"
          value="{{ old('city') }}"
          required>
        <br />
        <div>
          <input
            id="state"
            form="signup-form"
            class="form-control"
            type="text"
            style="display:inline;width:30%;margin-right:5%"
            name="state"
            placeholder="ST"
            autocomplete="off"
            value="{{ old('state') }}"
            required>
          <input
            id="zip"
            form="signup-form"
            class="form-control"
            style="display:inline;float:right;width:65%;"
            type="text"
            name="zip"
            placeholder="Zip Code"
            autocomplete="off"
            value="{{ old('zip') }}"
            required>
        </div>
        <br />
        <input
          id="birthday"
          form="signup-form"
          class="form-control"
          type="date"
          name="birthday"
          autocomplete="off"
          value="{{ old('birthday') }}"
          required >
        <div class="gender-choice">
          <input
            id="gender-male"
            form="signup-form"
            type="radio"
            name="gender"
            @if (old('gender') == 1)
              checked="checked"
            @endif
            value="1">
          <label for="gender-male">Male</label>
          <input
            id="gender-female"
            form="signup-form"
            type="radio"
            name="gender"
            @if (old('gender') == 2)
              checked="checked"
            @endif
            value="2">
          <label for="gender-female">Female</label>
          <input
            id="gender-private"
            form="signup-form"
            type="radio"
            name="gender"
            @if (old('gender') == 3)
              checked="checked"
            @endif
            value="3">
          <label for="gender-private">Decline</label>
          <br />
        </div>
        <label for="selfie">Profile Photo:</label>
        <input
          id="selfie"
          form="signup-form"
          class="input-group"
          type="file"
          name="selfie"
          accept="image/*">
        <br />
      </div> <!-- .modal-body -->

      <div class="modal-footer">
        <input
          form="signup-form"
          id="submission-button"
          style="font-size:1.5em;border-radius:6px;"
          type="submit"
          class="btn btn-warning signupButton"
          value="Sign Up!">
      </div> <!-- .modal-footer -->
    </div> <!-- .modal-content -->
  </div> <!-- .modal-dialog .modal-sm -->
</div> <!-- .modal .fade .bs-example-modal-sm -->

<!-- About Modal -->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h2 class="lead a_title">About</h2>
      </div> <!-- .modal-header -->
      <div class="modal-body">
        <p>Traveling Children Project (TCP) is a fun activity that encourages children, who we like to refer to as our <b>Travelers,</b> and their families to explore a variety of destinations, creating memorable experiences and later recording those experiences in their Passport Journals. Follow travel guide, Traveling Christian (TC), either online or find your own path using the Journey Kit that includes: TC, Journey Compass and Passport. Find the link to our PIY (print-it-yourself) downloadables at the very bottom of the home page. <b>Remember, it's not JUST about the destination, but also enjoying the journey along the way! Wishing you many happy travels!!</p>
        <p style="text-align:right;"><em>—Your friends, at Traveling Children Project</em></b></p>
      </div> <!-- .modal-body -->
    </div> <!-- .modal-content -->
  </div> <!-- .modal-dialog -->
</div> <!-- .modal fade -->

<!-- Top Bar -->
<div class="container">
 <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a href="/" class="wordmark hvr-grow">
          <img id="tcpp"
            src="/assets/images/Wordmark.svg"
            lowsrc="/assets/images/Wordmark.png"
            alt="Traveling Children Project Passport">
        </a>
      </div> <!-- .navbar-header -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
          <a data-toggle="modal" data-target="#aboutModal">About</a>
        </li>
        @if (Auth::check())
          {{-- The user has authenticated --}}
          <li>
            <a href="/journeys">Journey Blog</a>
          </li>
          <li>
            <a
              class="dropdown-toggle"
              data-toggle="dropdown"
              role="button"
              aria-haspopup="true"
              aria-expanded="false">
                My Passport
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li data-toggle="modal" data-target="#profileModal">
                <a href="#profileModal">View Passport Profile</a>
              </li>
              <li class="center">My Likes<i class="fa fa-heart" id="likesHeart"></i>({{ Auth::user()->likes->count() }})</li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="/auth/logout" id="logoutLink">Sign Out</a>
              </li>
            </ul>
          </li>
        @else
          {{-- The user has not authenticated --}}
          <li class="disabled" data-toggle="tooltip" data-placement="bottom" title="Sign In to view Journey Blog">
            <a>Journey Blog</a>
          </li>
          <li data-toggle="modal" data-target="#signinModal">
            <a href="#signinModal">Sign In</a>
          </li>
          <li data-toggle="modal" data-target="#signupModal">
            <a
              role="button"
              aria-haspopup="true"
              aria-expanded="false">
              Sign Up
            </a>
          </li> <!-- .dropdown -->
        @endif
      </ul> <!-- .nav .navbar-nav .navbar-right -->
    </div> <!-- .collapse .navbar-collapse -->
  </div> <!-- .container-fluid -->
 </nav> <!-- .navbar .navbar-inverse -->
</div> <!-- .container -->

@if (Session::get('signin_needs_display'))
  <script>
    $('#signinModal').modal()
  </script>
@endif
@if (Session::get('signup_needs_display'))
  <script>
    $('#signupModal').modal()
  </script>
@endif
