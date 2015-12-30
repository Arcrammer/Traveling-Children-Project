(($) ->
  $('#destSearchBtn').click ->
    # The user has chosen a destination
    # type and location and clicked the
    # button to search for them, so we
    # will send an AJAX request to the
    # server in order to return the
    # results to them.
    #
    type = $('#type').val() # Selected type
    location = $('#location').val() # Selected location
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
          dest = '<p class="dname">' + destination.name + '</p>'
          dest += '<p><b>Destination Type: </b>' + destination.type.name + '</p>'
          dest += '<p><b>Description: </b>' + destination.description + '</p>'
          dest += '<p><b>Venue Address: </b>' + destination.street + ', ' + destination.city.name + ', ' + destination.state.name + ' ' + destination.zip + '</p>'
          dest += '<p><b>Adult Cost: </b> $' + destination.adult_cost + ' <b>Child Cost: </b> $' + destination.child_cost + ' <b>Discount Amount: </b>' + destination.discount + '</p>'
          dest += '<hr class="jp_divider">'
          $('.journeyDestSearch').append dest
          return
        return
    return
) jQuery
