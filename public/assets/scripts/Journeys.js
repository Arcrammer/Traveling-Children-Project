(function() {
  (function($) {
    $('[data-toggle="tooltip"]').tooltip();
    return $(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });
  })(jQuery);

}).call(this);

(function() {
  $(document).ready(function() {
    var bodyField, dateField, editButtons, journeys, submitButton, tagsField, titleField, uuidField;
    $('.grid').masonry(function() {
      return {
        itemSelector: '.grid-item',
        columnWidth: 200
      };
    });
    $.ajaxSetup({
      cache: true
    });
    $.getScript('http://connect.facebook.net/en_US/sdk.js', function() {
      FB.init({
        appId: '1660831194160373',
        version: 'v2.5'
      });
      $('#loginbutton,#feedbutton').removeAttr('disabled');
      return FB.getLoginStatus(function(response) {
        return $('.share-with-facebook').click(function() {
          var journeyUUID;
          journeyUUID = $(this).parents('.journeyPost').data('journey-uuid');
          return $.get('/journeys/show/' + journeyUUID, function(journey) {
            return FB.ui({
              method: 'feed',
              link: 'travelingchildrenproject.dev/journeys',
              name: journey.creator + '\'s Journey to ' + journey.title,
              description: journey.body,
              picture: 'https://github.com/Arcrammer/Traveling-Children-Project/blob/master/public/assets/journey_defaults/header_images/3aa39decc5a01363489991f174176f31.jpg?raw=true'
            });
          });
        });
      });
    });
    $.getScript('//assets.pinterest.com/js/pinit.js', function() {
      return $('.share-with-pinterest').click(function() {
        var journeyUUID;
        journeyUUID = $(this).parents('.journeyPost').data('journey-uuid');
        return $.get('/journeys/show/' + journeyUUID, function(journey) {
          return PinUtils.pinOne({
            media: 'https://github.com/Arcrammer/Traveling-Children-Project/blob/master/public/assets/journey_defaults/header_images/3aa39decc5a01363489991f174176f31.jpg?raw=true',
            url: 'http://travelingchildrenproject.dev/journeys/' + journey.id,
            description: journey.body
          });
        });
      });
    });
    journeys = $('.journeyPost');
    editButtons = $('.journeyEditButton');
    submitButton = $('input[type="submit"]');
    titleField = $('input[name="title"]');
    uuidField = $('input[name="post-uuid"]');
    dateField = $('input[name="date"]');
    bodyField = $('textarea[name="body"]');
    tagsField = $('input#tags');
    editButtons.click(function() {
      var journeyUUID;
      journeyUUID = $(this).parents('.journeyPost').data('journey-uuid');
      return $.get('/journeys/show/' + journeyUUID, function(journey) {
        titleField.val(journey.title);
        uuidField.val(journey.uuid);
        dateField.val(journey.date);
        bodyField.val(journey.body);
        tagsField.val(journey.tags.trim().replace(/\s+/g, ' '));
        submitButton.val('Update');
        return $('.journey-form')[0].setAttribute('action', '/journeys/edit');
      });
    });
    return $('#journeyModal').on('hidden.bs.modal', function() {
      $('.journey-form')[0].reset();
      return submitButton.val('Create');
    });
  });

}).call(this);

//# sourceMappingURL=Journeys.js.map
