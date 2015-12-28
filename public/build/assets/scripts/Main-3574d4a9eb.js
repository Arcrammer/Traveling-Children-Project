(function() {
  (function($) {
    $('[data-toggle="tooltip"]').tooltip();
    return $('.editProfileButton').click(function() {
      $.ajax('/traveler/show', {
        success: function(travelerData) {
          console.log(travelerData);
          $('#first-name').val(travelerData.first_name);
          $('#last-name').val(travelerData.last_name);
          $('#email').val(travelerData.email);
          $('#street').val(travelerData.address.street);
          $('#city').val(travelerData.address.city);
          $('#state').val(travelerData.address.get_state.abbreviation);
          $('#zip').val(travelerData.address.zip);
          $('#birthday').val(travelerData.birthday);
          switch (travelerData.gender) {
            case 1:
              return $('#gender-male').attr('checked', 'checked');
            case 2:
              return $('#gender-female').attr('checked', 'checked');
            case 3:
              return $('#gender-private').attr('checked', 'checked');
          }
        }
      });
      return $('.modal-header h4').text('Edit Passport');
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=Main.js.map
