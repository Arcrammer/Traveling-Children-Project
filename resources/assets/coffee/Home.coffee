(($) ->
  if typeof signinNeedsDisplay != undefined
    $('#signinModal').modal()

  $('#destSearchBtn').click ->
    # The user has chosen a destination
    # type and location and clicked the
    # button to search for them, so we
    # will send an AJAX request to the
    # server in order to return the
    # results to them.
    #
    # Effectively this prevents another
    # request and  response cycle
    # meaning we don't strain the
    # server by requiring it to return
    # all of the destinations for
    # every single user upon every
    # single page load.
    #
    type = $($('#type')[0]).val() # Selected type
    local = $($('#location')[0]).val() # Selected location
    $.ajax '/destinations',
      'method': 'post'
      'data':
        'type': type
        'location': local
      'success': (response) ->
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
          dest = '<div class="modal-body journeyDestSearch">'
          dest += '<p class="dname">' + destination.dname + '</p>'
          dest += '<p><b>Destination Type: </b>' + destination.type + '</p>'
          dest += '<p><b>Description: </b>' + destination.dscrptn + '</p>'
          dest += '<p><b>Venue Address: </b>' + destination.dstreet + ', ' + destination.cities + ' ' + destination.dzip + '</p>'
          dest += '<p><b>Adult Cost: </b> $' + destination.adult_cost + ' <b>Child Cost: </b> $' + destination.child_cost + ' <b>Discount Amount: </b>' + destination.discount + '</p>'
          dest += '<br /><hr class="jp_divider"></hr></div>'
          $('#destination').after dest
          return
        return
    return
) jQuery
