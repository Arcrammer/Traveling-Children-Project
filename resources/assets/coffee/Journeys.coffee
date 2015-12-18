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
    button = this
    journeyPost = journeys[$(editButtons).index(button)]
    journeyID = $(journeyPost).data 'journey-id'

    # Ask the server for journey data as JSON
    $.get '/journeys/show/' + journeyID, (journey) ->
      # The server has sent the JSON; Fill
      # the edit forms' fields with it

      console.log journey

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
      return
    return

  $('#journeyModal').on 'hide.bs.modal', () ->
    # The modal is hiding, so we'll
    # replace the 'Create' text of
    # the other forms' button
    submitButton.val 'Create'
  return
