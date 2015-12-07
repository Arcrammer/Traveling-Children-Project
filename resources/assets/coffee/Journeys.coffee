$(document).ready ->
  # Grid
  $('.grid').masonry ->
    itemSelector: '.grid-item',
    columnWidth: 200

  # Get the edit form input elements
  journeys = $('.journeyPost')
  editButtons = $('.journeyEditButton')
  submitButton = $('input[type="submit"]')
  titleField = $('input[name="title"]')
  dateField = $('input[name="date"]')
  bodyField = $('textarea[name="body"]')
  tagsField = $('input#tags')
  journeyID = null

  editButtons.click ->
    # The 'Edit' button was clicked
    button = this
    journeyPost = journeys[$(editButtons).index(button)]
    journeyID = $(journeyPost).data('journey-id')

    # Ask the server for journey data as JSON
    $.get '/journeys/show/' + journeyID, (travelerPost) ->
      # The server has sent the JSON; Fill
      # the edit forms' fields with it
      titleField.value = travelerPost['title']
      dateField.value = travelerPost['date']
      bodyField.value = travelerPost['body']
      tagsField.value = tags

      # Change the form submission button text
      submitButton.value = 'Update'

      # Set the forms' 'action' to the method that
      # persists the updated data to the database
      $('.journey-form')[0].setAttribute 'action', '/journeys/edit/' + journeyID
      return
    return

  # Because the 'edit' form reuses the 'create' forms'
  # nodes it changes the forms' submission button text
  # to say 'Update', but when the user has updated a
  # journey and they go to create a new one the button
  # still says 'Update', so we'll change it back to
  # 'Create' every time they switch between the two
  #
  createButton = $('.journeyCreateButton')[0]
  $(createButton).click ->
    submitButton.value = 'Create'
    return
  return
