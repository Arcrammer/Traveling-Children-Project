(function() {
  (function($) {
    return $('[data-toggle="tooltip"]').tooltip();
  })(jQuery);

}).call(this);

(function() {
  (function($) {
    return $('#destSearchBtn').click(function() {
      var local, type;
      type = $($('#type')[0]).val();
      local = $($('#location')[0]).val();
      $.ajax('/destinations', {
        'method': 'post',
        'data': {
          'type': type,
          'location': local
        },
        'success': function(response) {
          $.each(response, function(index, destination) {
            var dest;
            dest = '<div class="modal-body journeyDestSearch">';
            dest += '<p class="dname">' + destination.dname + '</p>';
            dest += '<p><b>Destination Type: </b>' + destination.type + '</p>';
            dest += '<p><b>Description: </b>' + destination.dscrptn + '</p>';
            dest += '<p><b>Venue Address: </b>' + destination.dstreet + ', ' + destination.cities + ' ' + destination.dzip + '</p>';
            dest += '<p><b>Adult Cost: </b> $' + destination.adult_cost + ' <b>Child Cost: </b> $' + destination.child_cost + ' <b>Discount Amount: </b>' + destination.discount + '</p>';
            dest += '<br /><hr class="jp_divider"></hr></div>';
            $('#destination').after(dest);
          });
        }
      });
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=Home.js.map
