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
          $('#birthday').val(travelerData.birthday);
          $('#street').val(travelerData.address.street);
          $('#city').val(travelerData.address.city);
          $('#state').val(travelerData.address.get_state.abbreviation);
          $('#zip').val(travelerData.address.zip);
          switch (travelerData.gender) {
            case 1:
              $('#gender-male').attr('checked', 'checked');
              break;
            case 2:
              $('#gender-female').attr('checked', 'checked');
              break;
            case 3:
              $('#gender-private').attr('checked', 'checked');
          }
          return $('#signup-form').attr('action', '/traveler/update');
        }
      });
      $('.modal-header h4').text('Edit Passport');
      $('#submission-button').val('Update');
      $('#profileModal').modal('hide');
      $('#signupModal').modal('show');
      return $('#signupModal').on('hide.bs.modal', function() {
        return $('#profileModal').modal('show');
      });
    });
  })(jQuery);

}).call(this);

//# sourceMappingURL=Main.js.map
