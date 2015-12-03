@if (Auth::check())
<?php
  /**
   * The user has authenticated
   */
?>
<!-- Profile (Settings?) -->
<div class="modal-dialog">
  <div class="modal-content travelerProfile">
    <div class="modal-header"  data-traveler-id="<?//= $traveler->id ?>">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      <h2 class="pp_title">My Passport Profile</h2>
    </div> <!-- .modal-header -->

    <div class="modal-body">
      <?php if($traveler->pic != NULL): ?>
        <div class="pp_pic">
          <img src="/assets/uploads/<?//= $traveler->pic ?>">
        </div>
      <?php endif ?>
      <p><b>First Name:</b> <?//= $traveler->first_name ?></p>
      <p><b>Last Name:</b> <?//= $traveler->last_name ?></p>
      <p><b>Email:</b> <?//= $traveler->email ?></p>
      <p><b>Street Address:</b> <?//= $traveler->street ?></p>
      <p><b>City:</b> <?//= $traveler->city ?></p>
      <p><b>State:</b> <?//= $traveler->state ?> <b>Zip:</b> <?//= $traveler->zip ?></p>
      <p><b>Birthday:</b> <?//= $traveler->birthday ?></p>
    </div> <!-- .modal-body -->

    <div class="modal-footer">
      <button
        class="btn btn-primary btn-lg editProfileButton"
        data-toggle="modal"
        data-target="#signupModal">Edit</button>
      <a
        href="/travelers/delete/<?//= $traveler->id ?>"
        class="btn btn-warning btn-lg deleteProfileButton"
        data-dismiss="modal"
        role="button">Delete Passport</a>
    </div> <!-- .modal-footer -->
  </div> <!-- .modal-content travelerProfile -->
</div> <!-- .modal-dialog -->

@else
<?php
  /**
   * The user hasn't yet authenticated
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
        <h4>Traveler Passport Sign Up</h4>
      </div> <!-- .modal-header -->

      <div class="modal-body">
        <form
          action="home/register"
          class="form-inline signup-form"
          id="signup-form"
          method="POST"
          enctype="multipart/form-data">
        </form>
        <input
          form="signup-form"
          class="form-control journeyPostTitle"
          type="text"
          name="first_name"
          placeholder="Traveler's First Name"
          autocomplete="on"
          required>
        <br />
        <input
          form="signup-form"
          class="form-control"
          type="text"
          name="last_name"
          placeholder="Traveler's Last Name"
          autocomplete="on"
          required>
        <br />
        <input
          form="signup-form"
          class="form-control"
          type="email"
          name="email"
          placeholder="Email Address"
          required>
        <br />
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
          type="text"
          name="street"
          placeholder="Street Address, Apt #"
          autocomplete="on"
          required>
        <br />
        <input
          form="signup-form"
          class="form-control"
          type="text"
          name="city"
          placeholder="City"
          autocomplete="on"
          required>
        <br />
        <div>
          <input
            form="signup-form"
            class="form-control"
            type="text"
            style="display:inline;width:30%;margin-right:5%;"
            name="state"
            placeholder="ST"
            autocomplete="on"
            required>
          <input
            form="signup-form"
            class="form-control"
            style="display:inline;float:right;width:65%;"
            type="text"
            name="zip"
            placeholder="Zip Code"
            autocomplete="on"
            required>
        </div>
        <br />
        <input
          form="signup-form"
          class="form-control"
          type="date"
          name="birthday"
          autocomplete="on"
          required >
        <div style="margin-top:15px;margin-bottom:15px;">
          <input
            form="signup-form"
            type="radio"
            name="gender"
            value="1"
            checked>Male
          <input
            form="signup-form"
            type="radio"
            name="gender"
            value="2"
            style="margin:5px;">Female
          <input
            form="signup-form"
            type="radio"
            name="gender"
            value="3"
            style="margin:5px;">Decline
          <br />
        </div>
        <input
          form="signup-form"
          class="input-group"
          type="file"
          name="pic"
          accept="image/*">
        <br />
      </div> <!-- .modal-body -->

      <div class="modal-footer">
        <input
          style="font-size:1.5em;border-radius:6px;"
          type="submit"
          class="btn btn-warning signupButton"
          value="Sign Up!">
      </div> <!-- .modal-footer -->
    </div> <!-- .modal-content -->
  </div> <!-- .modal-dialog .modal-sm -->
</div> <!-- .modal .fade .bs-example-modal-sm -->

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
        <form
          action="/auth/login"
          class="form-inline signin-form"
          id="signin-form"
          method="POST"
          enctype="multipart/form-data">
        </form>
      </div> <!-- .modal-header -->
      <div class="modal-body">
        <input
          form="signin-form"
          type="text"
          name="identity"
          class="form-control"
          placeholder="Enter User ID"
          autocomplete="on"
          required>
        <br />
        <input
          form="signin-form"
          type="password"
          name="password"
          class="form-control"
          placeholder="Enter Password"
          required>
        <br />
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
        <a href="home">
          <img
            src="/assets/images/Wordmark.svg"
            lowsrc="/assets/images/Wordmark.png"
            alt="Traveling Children Project Passport"
            class="wordmark hvr-grow">
        </a>
      </div> <!-- .navbar-header -->

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <button class="btn aboutModalButton" data-toggle="modal" data-target="#aboutModal">
              <a href="#">About</a>
            </button>
          </li>
          <li class="disabled" data-toggle="tooltip" data-placement="bottom" title="Sign In to view Journey Blog">
            <a href="#">Journey Blog</a>
          </li>
          <li data-toggle="modal" data-target="#signinModal">
            <a href="#signinModal">Sign In</a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sign Up<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li id="facebook-signup">
                <a href="#">Sign In with Facebook!</a></li>
              </li>
              <li role="separator" class="divider"></li>
              <li id="email-signup" data-toggle="modal" data-target="#signupModal">
                <a href="#signupModal">Sign Up with Your Email</a>
              </li>
            </ul> <!-- .dropdown-menu -->
          </li> <!-- .dropdown -->
        </ul> <!-- .nav .navbar-nav .navbar-right -->
      </div> <!-- .collapse .navbar-collapse -->
    </div> <!-- .container-fluid -->
 </nav> <!-- .navbar .navbar-inverse -->
</div> <!-- .container -->
