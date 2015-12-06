(function() {
  $(document).ready(function() {
    var bodyField, buttons, createJourneyButton, dateField, htagsField, journeyID, journeys, submitButton, titleField;
    $('.grid').masonry(function() {
      return {
        itemSelector: '.grid-item',
        columnWidth: 200
      };
    });
    journeys = $('.journeyPost');
    buttons = $('.journeyEditButton');
    submitButton = $('input[type="submit"]')[0];
    titleField = $('input[name="title"]')[0];
    dateField = $('input[name="date"]')[0];
    bodyField = $('textarea[name="body"]')[0];
    htagsField = $('input[name="htags"]')[0];
    journeyID = null;
    buttons.click(function() {
      var button, journeyPost;
      button = this;
      journeyPost = journeys[$(buttons).index(button)];
      journeyID = $(journeyPost).data('journey-id');
      $.get('/journeys/show/' + journeyID, function(travelerPost) {
        travelerPost = JSON.parse(travelerPost)[0];
        titleField.value = travelerPost['title'];
        dateField.value = travelerPost['date'];
        bodyField.value = travelerPost['body'];
        htagsField.value = travelerPost['htags'];
        submitButton.value = 'Update';
        $('.journey-form')[0].setAttribute('action', '/journeys/edit/' + journeyID);
      });
    });
    createJourneyButton = $('.journeyCreateButton')[0];
    $(createJourneyButton).click(function() {
      submitButton.value = 'Create';
    });
  });

}).call(this);

//# sourceMappingURL=Journeys.js.map
