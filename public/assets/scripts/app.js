(function() {
  (function($) {
    return console.log('It\'s working');
  })(jQuery);

}).call(this);

(function() {
  $(document).ready(function() {
    var bodyField, createButton, dateField, editButtons, journeyID, journeys, submitButton, tagsField, titleField;
    $('.grid').masonry(function() {
      return {
        itemSelector: '.grid-item',
        columnWidth: 200
      };
    });
    journeys = $('.journeyPost');
    editButtons = $('.journeyEditButton');
    submitButton = $('input[type="submit"]');
    titleField = $('input[name="title"]');
    dateField = $('input[name="date"]');
    bodyField = $('textarea[name="body"]');
    tagsField = $('input#tags');
    journeyID = null;
    editButtons.click(function() {
      var button, journeyPost;
      button = this;
      journeyPost = journeys[$(editButtons).index(button)];
      journeyID = $(journeyPost).data('journey-id');
      $.get('/journeys/show/' + journeyID, function(travelerPost) {
        var tags;
        tags = '';
        $.each(travelerPost.tags, function(tag) {
          return tags += tag;
        });
        titleField.value = travelerPost['title'];
        dateField.value = travelerPost['date'];
        bodyField.value = travelerPost['body'];
        tagsField.value = tags;
        submitButton.value = 'Update';
        $('.journey-form')[0].setAttribute('action', '/journeys/edit/' + journeyID);
      });
    });
    createButton = $('.journeyCreateButton')[0];
    $(createButton).click(function() {
      submitButton.value = 'Create';
    });
  });

}).call(this);

//# sourceMappingURL=app.js.map
