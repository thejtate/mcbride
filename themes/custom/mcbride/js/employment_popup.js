(function($) {
  $(document).ready(function() {
    if (Drupal.settings.mcbride_custom != undefined
      &&
      Drupal.settings.mcbride_custom.show_success_employment_popup != undefined
      &&
      Drupal.settings.mcbride_custom.show_success_employment_popup) {
      $('#employment-success-message').dialog({
        autoOpen: true,
        title: Drupal.t(''),
        resizable: false,
        minWidth: 320,
        modal: true,
        show: "slide",
        hide: "explode"
      });
    }
    if (Drupal.settings.mcbride_custom != undefined
      &&
      Drupal.settings.mcbride_custom.show_success_mailing_popup != undefined
      &&
      Drupal.settings.mcbride_custom.show_success_mailing_popup) {
      var my_dialog = $('#employment-success-message').dialog({
        autoOpen: true,
        title: Drupal.t('Thank You'),
        resizable: false,
        minWidth: 340,
        modal: true,
        show: "slide",
        hide: "explode"
      });
      $('#employment-success-message .return_news').click(function () {
        $('#employment-success-message').dialog('close');
         return false;
      });
    }
    
    $('body.page-node-46 .messages.status').addClass('hidden');
    
  });
})(jQuery);