(function() {
  (function($) {
    var fetch_journeys;
    $('#destSearchBtn').click(function() {
      return fetch_journeys($('#type').val(), $('#location').val());
    });
    $('#destButtons').click(function(event) {
      return fetch_journeys($(event.target).data('destination-type'));
    });
    $('#destModal').on('hidden.bs.modal', function() {
      return $('.destination').remove();
    });
    return fetch_journeys = function(type, location) {
      return $.ajax('/destinations', {
        method: 'post',
        data: {
          type: type,
          location: location
        },
        success: function(response) {
          console.log(response);
          return $.each(response, function(index, destination) {
            var dest;
            dest = '<div class="destination">';
            dest += '<p class="dname">' + destination.name + '</p>';
            dest += '<p><b>Destination Type: </b>' + destination.type.name + '</p>';
            dest += '<p><b>Description: </b>' + destination.description + '</p>';
            dest += '<p><b>Venue Address: </b>' + destination.street + ', ' + destination.city.name + ', ' + destination.state.name + ' ' + destination.zip + '</p>';
            dest += '<p><b>Adult Cost: </b> $' + destination.adult_cost + ' <b>Child Cost: </b> $' + destination.child_cost + ' <b>Discount: </b>' + destination.discount_percentage + '%</p>';
            dest += '<hr class="jp_divider">';
            dest += '</div> <!-- .destination -->';
            return $('.journeyDestSearch').append(dest);
          });
        }
      });
    };
  })(jQuery);

}).call(this);

//# sourceMappingURL=Home.js.map
