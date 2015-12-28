(($) ->
  # The DOM has loaded
  $('[data-toggle="tooltip"]').tooltip()

  # The 'View Passport Profile'
  # button has been clicked
  $('.editProfileButton').click ->
    # Get the travelers' information
    $.ajax '/traveler/show',
      success: (travelerData) ->
        console.log travelerData
        # Populate the sign-up form fields
        # with the returned traveler data
        $('#first-name').val travelerData.first_name
        $('#last-name').val travelerData.last_name
        $('#email').val travelerData.email
        $('#street').val travelerData.address.street
        $('#city').val travelerData.address.city
        $('#state').val travelerData.address.get_state.abbreviation
        $('#zip').val travelerData.address.zip
        $('#birthday').val travelerData.birthday
        switch travelerData.gender
          when 1 then $('#gender-male').attr 'checked', 'checked'
          when 2 then $('#gender-female').attr 'checked', 'checked'
          when 3 then $('#gender-private').attr 'checked', 'checked'

    # Change the header text
    # of the sign-up modal
    $('.modal-header h4').text 'Edit Passport'

    # Hide the first modal
    # $('#profileModal').modal 'hide'

    # Show the sign-up modal
    # $('#signupModal').modal 'show'
) jQuery
