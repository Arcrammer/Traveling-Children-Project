$(document).ready ->
  # Grid
  $('.grid').masonry ->
    itemSelector: '.grid-item',
    columnWidth: 200

  # Sharing through Facebook
  $.ajaxSetup cache: true
  $.getScript 'http://connect.facebook.net/en_US/sdk.js', ->
    FB.init
      appId: '1660831194160373'
      version: 'v2.5'
    $('#loginbutton,#feedbutton').removeAttr 'disabled'
    FB.getLoginStatus (response) ->
      # Now everything has been initialised
      $('.share-with-facebook').click () ->

        # Fetch the data for the journey
        # they want to share on Facebook
        journeyUUID = $(this).parents('.journeyPost').data 'journey-uuid'

        $.get '/journeys/show/' + journeyUUID, (journey) ->
          # Let them share it
          FB.ui {
            method: 'feed'
            link: 'travelingchildrenproject.dev/journeys'
            name: journey.creator + '\'s Journey to ' + journey.title
            description: journey.body
            picture: 'https://github.com/Arcrammer/Traveling-Children-Project/blob/master/public/assets/journey_defaults/header_images/3aa39decc5a01363489991f174176f31.jpg?raw=true'
          }

  # Handling journey post updates
  journeys = $('.journeyPost')
  editButtons = $('.journeyEditButton')
  submitButton = $('input[type="submit"]')
  titleField = $('input[name="title"]')
  uuidField = $('input[name="post-uuid"]')
  dateField = $('input[name="date"]')
  bodyField = $('textarea[name="body"]')
  tagsField = $('input#tags')

  editButtons.click ->
    # The 'Edit' button was
    # clicked, so we'll get
    # the 'ID' for the
    # relative journey
    #
    journeyUUID = $(this).parents('.journeyPost').data 'journey-uuid'

    # Ask the server for journey data as JSON
    $.get '/journeys/show/' + journeyUUID, (journey) ->
      # The server has sent the JSON; Fill
      # the edit forms' fields with it

      # Fill the fields
      titleField.val journey.title
      uuidField.val journey.uuid
      dateField.val journey.date
      bodyField.val journey.body
      tagsField.val journey.tags.trim().replace(/\s+/g, ' ')

      # Change the form submission button text
      submitButton.val 'Update'

      # Set the forms' 'action' to the method that
      # persists the updated data to the database
      $('.journey-form')[0].setAttribute 'action', '/journeys/edit'

  $('#journeyModal').on 'hidden.bs.modal', () ->
    # The modal is hiding, so we'll
    # replace the 'Create' text of
    # the other forms' button and
    # clear the form data
    #
    $('.journey-form')[0].reset()
    submitButton.val 'Create'
