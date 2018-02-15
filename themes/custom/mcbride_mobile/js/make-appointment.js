//document ready handler
(function($){
  Drupal.behaviors.mcbrideForm = {
    attach: function(context, settings) {
      selet_to_ul();
    }
  };

function selet_to_ul($context) {
  $('.form-item-select-list ul li', '.form-item-select').click(function() {
    var $paretn = $(this).parents('.form-item-select-list');
    var $text = $(this).find('a').text();
    $paretn.find('h5').html($text) ;
    //$paretn.find('select').val($text);
    $paretn.find('select option').filter(function() {
    //may want to use $.trim in here
      return $(this).text() == $text; 
    }).attr('selected', true);
    
    $paretn.find('ul').toggle();
    $paretn.toggleClass('active');
  });
}

})(jQuery);