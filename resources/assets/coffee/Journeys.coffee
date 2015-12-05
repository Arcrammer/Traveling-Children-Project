$(document).ready ->
  # Get the edit form input elements
  journeys = $('.journeyPost')
  buttons = $('.journeyEditButton')
  submitButton = $('input[type="submit"]')[0]
  titleField = $('input[name="title"]')[0]
  dateField = $('input[name="date"]')[0]
  bodyField = $('textarea[name="body"]')[0]
  htagsField = $('input[name="htags"]')[0]
  journeyID = null

  buttons.click ->
    # The 'Edit' button was clicked
    button = this
    journeyPost = journeys[$(buttons).index(button)]
    journeyID = $(journeyPost).data('journey-id')

    # Ask the server for journey data as JSON
    $.get '/journeys/show/' + journeyID, (travelerPost) ->
      # The server has sent the JSON; Fill
      # the edit forms' fields with it
      travelerPost = JSON.parse(travelerPost)[0]
      titleField.value = travelerPost['title']
      dateField.value = travelerPost['date']
      bodyField.value = travelerPost['body']
      htagsField.value = travelerPost['htags']

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
  createJourneyButton = $('.journeyCreateButton')[0]
  $(createJourneyButton).click ->
    submitButton.value = 'Create'
    return
  return
