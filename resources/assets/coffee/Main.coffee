(($) ->
  # The DOM has loaded
  $('[data-toggle="tooltip"]').tooltip()

  # The 'View Passport Profile'
  # button has been clicked
  $('.editProfileButton').click ->
    # Get the travelers' information
    $.ajax '/traveler/show',
      success: (travelerData) ->
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

        # Send the form data to
        # the appropriate method
        $('#signup-form').attr 'action', '/traveler/update'

    # Change the header text
    # of the sign-up modal
    $('.modal-header h4').text 'Edit Passport'

    # Change the submission button title
    $('#submission-button').val 'Update'

    # Hide the first modal
    $('#profileModal').modal 'hide'

    # Show the sign-up modal
    $('#signupModal').modal 'show'

    # Show the profile passport modal when
    # the user dismisses the sign-up modal
    $('#signupModal').on 'hide.bs.modal', ->
      $('#profileModal').modal 'show'
) jQuery
