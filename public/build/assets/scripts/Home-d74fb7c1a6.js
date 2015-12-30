(function() {
  (function($) {
    return $('#destSearchBtn').click(function() {
      var location, type;
      type = $('#type').val();
      location = $('#location').val();
      $.ajax('/destinations', {
        method: 'post',
        data: {
          type: type,
          location: location
        },
        success: function(response) {
          $.each(response, function(index, destination) {
            var dest;
            dest = '<p class="dname">' + destination.name + '</p>';
            dest += '<p><b>Destination Type: </b>' + destination.type.name + '</p>';
            dest += '<p><b>Description: </b>' + destination.description + '</p>';
            dest += '<p><b>Venue Address: </b>' + destination.street + ', ' + destination.city.name + ', ' + destination.state.name + ' ' + destination.zip + '</p>';
            dest += '<p><b>Adult Cost: </b> $' + destination.adult_cost + ' <b>Child Cost: </b> $' + destination.child_cost + ' <b>Discount Amount: </b>' + destination.discount + '</p>';
            dest += '<hr class="jp_divider">';
            $('.journeyDestSearch').append(dest);
          });
        }
      });
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=Home.js.map
