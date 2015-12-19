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
      FB.getLoginStatus(function(response) {
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
      return window.twttr = (function(d, s, id) {
        var fjs, js, t;
        js = void 0;
        fjs = d.getElementsByTagName(s)[0];
        t = window.twttr || {};
        if (d.getElementById(id)) {
          return t;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js, fjs);
        t._e = [];
        t.ready = function(f) {
          t._e.push(f);
        };
        return t;
      })(document, 'script', 'twitter-wjs');
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
