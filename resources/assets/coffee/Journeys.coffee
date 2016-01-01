$(document).ready ->
  # Grid
  $('.grid').masonry ->
    itemSelector: '.grid-item',
    columnWidth: 200

  # Send likes to the server
  $('.like-button').click((event) ->
    journey_uuid = $(event.target).parents('.journeyPost').data('journey-uuid')
    $.ajax '/journeys/like/' + journey_uuid,
      method: 'post'
      success: (response) ->
        response = JSON.parse(response)
        if response.status == 200
          # The post was successfully
          # liked; Make the heart red
          $(event.target).addClass 'liked'
        else if response.status == 204
          # The post was successfully
          # unliked; Don't make
          # the heart red
          $(event.target).removeClass 'liked'

        # Update the like count in the
        # 'My Passport' dropdown
        $('#like-count').text response.likeCount
  )

  # Sharing pop-up window preferences
  popupPreferences = 'height=440'
  popupPreferences += ','
  popupPreferences += 'width=560'
  popupPreferences += ','
  popupPreferences += 'top=' + ((screen.height / 2) - (600 / 2))
  popupPreferences += ','
  popupPreferences += 'left=' + ((screen.width / 2) - (560 / 2))

  # Sharing through Facebook
  $.ajaxSetup cache: true
  $.getScript 'http://connect.facebook.net/en_US/sdk.js', ->
    FB.init
      appId: '1660831194160373'
      version: 'v2.5'
    $('#loginbutton,#feedbutton').removeAttr 'disabled'
    FB.getLoginStatus (response) ->
      # Now everything has been initialised
      $('.share-with-facebook').click ->
        # Fetch the data for the journey
        # they want to share on Facebook
        journey_uuid = $(this)
          .parents('.journeyPost')
          .data 'journey-uuid'
        title = $(this)
          .parents('.journeyPost')
          .children(':first-of-type')
          .children('.jp_title')
          .children('span')
          .text()
        creator = $(this)
          .parents('.journeyPost')
          .children(':last-of-type')
          .children('.jp_fname_date')
          .children('em')
          .children('a')
          .text()
          .trim()
        header_image = $(this)
          .parents('.journeyPost')
          .children('.jp_img')
          .children('img')
          .attr 'src'
        description = $(this)
          .parents('.journeyPost')
          .children(':last-of-type')
          .children('.jp_body')
          .text()
          .trim()

        # Let them share the journey on Facebook
        FB.ui
          method: 'feed'
          link: 'travelingchildrenproject.com/journeys#' + journey_uuid
          name: creator + '\'s Journey to ' + title
          description: description
          picture: 'http://travelingchildrenproject.com' + header_image

  # Sharing through Twitter
  $('.share-with-twitter').click ->
    sharingUrl = $(this).data 'sharing-url'
    window.open sharingUrl, 'Tweet About This Journey', popupPreferences

  # Sharing through Pinterest
  $.getScript '//assets.pinterest.com/js/pinit.js', ->
    # The script has loaded; Attach
    # the 'click' event listener
    $('.share-with-pinterest').click ->
      # Fetch the data for the journey
      # they want to share on Pinterest
      #
      # This data comes from the DOM
      # because pop-ups are blocked
      # when they are triggered by
      # asynchronous requests
      #
      journey_uuid = $(this)
        .parents('.journeyPost')
        .data 'journey-uuid'
      header_image = $(this)
        .parents('.journeyPost')
        .children('.jp_img')
        .children('img')
        .attr 'src'
      description = $(this)
        .parents('.journeyPost')
        .children(':last-of-type')
        .children('.jp_body')
        .text()
        .trim()

      # The user clicked the 'Pinterest' button
      PinUtils.pinOne
        media: 'http://travelingchildrenproject.com' + header_image
        url: 'http://travelingchildrenproject.com/journeys#' + journey_uuid
        description: description

    $('.share-with-tumblr').click ->
      postLink = 'https://www.tumblr.com/share?'
      postLink += 'shareSource=legacy'
      postLink += '&'
      postLink += 'cononicalUrl=' + encodeURIComponent('http://travelingchildrenproject.com/journeys')
      postLink += '&'
      postLink += 'posttype=link'
      postLink += '&'
      postLink += 'tags=TravelingChildrenProject,TCPJourneys'
      postLink += '&'
      postLink += 'content='+encodeURIComponent('http://beta.travelingchildrenproject.com/')
      postLink += '&'
      postLink += 'caption=TCPJourneyBySomeone'
      postLink += '&'
      postLink += 'show-via=travelingchildrenproject'
      window.open postLink, 'Post This Journey to Tumblr', popupPreferences

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
    # the 'UUID' for the
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
