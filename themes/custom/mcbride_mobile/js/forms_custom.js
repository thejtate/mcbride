//document ready handler
(function($){
  Drupal.behaviors.mcbrideForm = {
    attach: function(context, settings) {
//      init_comboboxes();
    }
  };
  Drupal.behaviors.map_appear = {
    attach: function(context, settings) {
//      map_appear();
    }
  };
  function map_appear($context) {

    $('.node-locations .blue-text a').click(function() {
      if ($(this).parent().next().hasClass('current')) {
        $('.block-map-none.current').removeClass('current');
      }
      else {
        $('.block-map-none.current').removeClass('current');
        $(this).parent().next().addClass('current');
      }
      return false;
    });

  }
//  function init_comboboxes($context) {
//  setTimeout(function(){
//    $selects = $('select', $context).not('.skip-js').each(function(){
//      var $select = $(this),
//	  options = {
//	    btnWidth: 35,
//	    hoverEnabled: true,
//	    listMaxHeight: 190,
//	    forceScroll: true,
//	    adjustWidth: 10
//	  };
//      
//      if (!$select.is(':visible')) {
//	options = $.extend({}, options, {width: 316, height: 25});
//      }
//      $select.bind('combo_init', function(){
//      }).combobox(options);
//    });
//    
//    if (ie_lessthan(8)) {
//      $selects.each(function() {
//	try {
//	  process_pseudo(this.combobox.button);
//	} catch(e) {}
//      });
//    }
//  }, 50);
//}
})(jQuery);
