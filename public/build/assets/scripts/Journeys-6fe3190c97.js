(function() {
  $(document).ready(function() {
    var bodyField, dateField, editButtons, journeys, popupPreferences, submitButton, tagsField, titleField, uuidField;
    $('.grid').masonry(function() {
      return {
        itemSelector: '.grid-item',
        columnWidth: 200
      };
    });
    $('.heart-icon').click(function() {
      var journey_uuid;
      journey_uuid = $(this).parents('.journeyPost').data('journey-uuid');
      return $.ajax('/journeys/like/' + journey_uuid, {
        success: function() {
          return console.log('liked?');
        }
      });
    });
    popupPreferences = 'height=440';
    popupPreferences += ',';
    popupPreferences += 'width=560';
    popupPreferences += ',';
    popupPreferences += 'top=' + ((screen.height / 2) - (600 / 2));
    popupPreferences += ',';
    popupPreferences += 'left=' + ((screen.width / 2) - (560 / 2));
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
          var creator, description, header_image, journey_uuid, title;
          journey_uuid = $(this).parents('.journeyPost').data('journey-uuid');
          title = $(this).parents('.journeyPost').children(':first-of-type').children('.jp_title').children('span').text();
          creator = $(this).parents('.journeyPost').children(':last-of-type').children('.jp_fname_date').children('em').children('a').text().trim();
          header_image = $(this).parents('.journeyPost').children('.jp_img').children('img').attr('src');
          description = $(this).parents('.journeyPost').children(':last-of-type').children('.jp_body').text().trim();
          return FB.ui({
            method: 'feed',
            link: 'travelingchildrenproject.com/journeys/' + journey_uuid,
            name: creator + '\'s Journey to ' + title,
            description: description,
            picture: 'http://travelingchildrenproject.com' + header_image
          });
        });
      });
    });
    $('.share-with-twitter').click(function() {
      var sharingUrl;
      sharingUrl = $(this).data('sharing-url');
      return window.open(sharingUrl, 'Tweet About This Journey', popupPreferences);
    });
    $.getScript('//assets.pinterest.com/js/pinit.js', function() {
      $('.share-with-pinterest').click(function() {
        var description, header_image, journey_uuid;
        window.that = this;
        journey_uuid = $(this).parents('.journeyPost').data('journey-uuid');
        header_image = $(this).parents('.journeyPost').children('.jp_img').children('img').attr('src');
        description = $(this).parents('.journeyPost').children(':last-of-type').children('.jp_body').text().trim();
        return PinUtils.pinOne({
          media: 'http://travelingchildrenproject.com' + header_image,
          url: 'http://travelingchildrenproject.com/journeys/' + journey_uuid,
          description: description
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
        return window.open(postLink, 'Post This Journey to Tumblr', popupPreferences);
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
