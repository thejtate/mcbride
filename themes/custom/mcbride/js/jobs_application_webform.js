(function($){
    Drupal.behaviors.attachPhoneMaskOnInputs = {
        attach : function(context, settings){
            $('#edit-submitted-applicant-information-telephone').mask('999-999-9999');
            $('#edit-submitted-applicant-information-mobile-pager').mask('999-999-9999');
            $('#edit-submitted-employment-history-employment-history-5-employment-history-telephone').mask('999-999-9999');
            $('#edit-submitted-employment-history-employment-history-2-employment-history-telephone').mask('999-999-9999');
            $('#edit-submitted-employment-history-employment-history-3-employment-history-telephone').mask('999-999-9999');
            $('#edit-submitted-employment-history-employment-history-4-employment-history-telephone').mask('999-999-9999');
        }
    }
})(jQuery);