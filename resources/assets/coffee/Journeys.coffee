$(document).ready ->
  # Get traveler profile form field values
  traveler = $('.travelerProfile')
  signupButton = $('input[type="submit"]')[0]
  editProfileBttn = $('.editProfileButton')[0]
  first_nameField = $('input[name="first_name"]')[0]
  last_nameField = $('input[name="last_name"]')[0]
  emailField = $('input[name="email"]')[0]
  streetField = $('input[name="street"]')[0]
  cityField = $('input[name="city"]')[0]
  stateField = $('input[name="state"]')[0]
  zipField = $('input[name="zip"]')[0]
  birthField = $('date[name="birth"]')[0]
  sexField = $('input[name="gender"]')[0]
  travelerID = null

  editProfileBttn.click ->
    # The 'Edit Profile' button was clicked so
    # we'll send an AJAX call to get the data
    # for the traveler who has signed in
    #
    button = this
    travelerProfile = traveler[$(editProfileBttn).index(button)]
    travelerID = $(travelerProfile).data('traveler-id')

    # Send a request to the server for the travelers' data
    $.get '/travelers/show/' + travelerID, (travelerProfile) ->
      travelerProfile = JSON.parse(travelerProfile)[0]
      first_nameField.value = travelerProfile['first_name']
      last_nameField.value = travelerProfile['last_name']
      emailField.value = travelerProfile['email']
      streetField.value = travelerProfile['street']
      cityField.value = travelerProfile['city']
      stateField.value = travelerProfile['state']
      zipField.value = travelerProfile['zip']
      birthField.value = travelerProfile['birthday']
      sexField.value = travelerProfile['gender']
      submitButton.value = 'Update'
      # imgField.value		= travelerProfile['img'];
      $('.signup-form')[0].setAttribute 'action', '/home/edit/' + travelerID
      return
    return
  # SignUp button click functionality
  signupButton = $('.signupButton')[0]
  editProfileButton = $('.editProfileButton')[0]
  $(signupButton).click ->
    submitButton.value = 'Sign Up!'
    return
  return
