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
    journeys = $('.journeyPost');
    editButtons = $('.journeyEditButton');
    submitButton = $('input[type="submit"]');
    titleField = $('input[name="title"]');
    uuidField = $('input[name="post-uuid"]');
    dateField = $('input[name="date"]');
    bodyField = $('textarea[name="body"]');
    tagsField = $('input#tags');
    editButtons.click(function() {
      var journeyID;
      journeyID = $(this).parents('.journeyPost').data('journey-uuid');
      console.log(journeyID);
      $.get('/journeys/show/' + journeyID, function(journey) {
        titleField.val(journey.title);
        uuidField.val(journey.uuid);
        dateField.val(journey.date);
        bodyField.val(journey.body);
        tagsField.val(journey.tags.trim().replace(/\s+/g, ' '));
        submitButton.val('Update');
        $('.journey-form')[0].setAttribute('action', '/journeys/edit');
      });
    });
    $('#journeyModal').on('hide.bs.modal', function() {
      return submitButton.val('Create');
    });
  });

}).call(this);

//# sourceMappingURL=Journeys.js.map
