(($) ->
  $('#destSearchBtn').click ->
    # The user has chosen a destination
    # type and location and clicked the
    # button to search for them, so we
    # will send an AJAX request to the
    # server in order to return the
    # results to them.
    #
    fetch_journeys($('#type').val(), $('#location').val())

  $('#destButtons ').click (event) ->
    # The user has clicked a destination button
    fetch_journeys($(event.target).data 'destination-type')

  $('#destModal').on 'hide.bs.modal', ->
    # Remove all of the results
    # when the modal is dismissed
    $('.journeyDestSearch').children().remove()

  # Functions
  fetch_journeys = (type, location) ->
    $.ajax '/destinations',
      method: 'post'
      data:
        type: type
        location: location
      success: (response) ->
        # The request has been sent asynchronously
        # and the server has given us a response.
        #
        # Now we will fill append modal nodes to
        # the results modal.
        #
        $.each response, (index, destination) ->
          # For each of the results returned we'll create
          # a new node for the DOM and insert it
          #
          dest = '<div class="destination">'
          dest += '<p class="dname">' + destination.name + '</p>'
          dest += '<p><b>Destination Type: </b>' + destination.type.name + '</p>'
          dest += '<p><b>Description: </b>' + destination.description + '</p>'
          dest += '<p><b>Venue Address: </b>' + destination.street + ', ' + destination.city.name + ', ' + destination.state.name + ' ' + destination.zip + '</p>'
          dest += '<p><b>Adult Cost: </b> $' + destination.adult_cost + ' <b>Child Cost: </b> $' + destination.child_cost + ' <b>Discount: </b>' + destination.discount_percentage + '%</p>'
          dest += '<hr class="jp_divider">'
          dest += '</div> <!-- .destination -->'
          $('.journeyDestSearch').append dest

) jQuery
