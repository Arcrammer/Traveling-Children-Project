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
              link: 'travelingchildrenproject.com/journeys',
              name: journey.creator + '\'s Journey to ' + journey.title,
              description: journey.body,
              picture: 'http://travelingchildrenproject.com' + journey.image
            });
          });
        });
      });
    });
    $.getScript('//assets.pinterest.com/js/pinit.js', function() {
      $('.share-with-pinterest').click(function() {
        var journeyUUID;
        journeyUUID = $(this).parents('.journeyPost').data('journey-uuid');
        return $.get('/journeys/show/' + journeyUUID, function(journey) {
          return PinUtils.pinOne({
            media: 'http://travelingchildrenproject.com' + journey.image,
            url: 'http://travelingchildrenproject.com/journeys/' + journey.id,
            description: journey.body
          });
        });
      });
      return $('.share-with-tumblr').click(function() {
        var postLink;
        postLink = 'https://www.tumblr.com/share?';
        postLink += 'shareSource=legacy';
        postLink += '&';
        postLink += 'cononicalUrl=' + encodeURIComponent('http://travelingchildrenproject.com/journeys');
        postLink += '&';
        postLink += 'posttype=link';
        postLink += '&';
        postLink += 'tags=TravelingChildrenProject,TCPJourneys';
        postLink += '&';
        postLink += 'content=' + encodeURIComponent('http://beta.travelingchildrenproject.com/');
        postLink += '&';
        postLink += 'caption=TCPJourneyBySomeone';
        postLink += '&';
        postLink += 'show-via=travelingchildrenproject';
        return window.open(postLink, null, 'height=540,width=600');
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
