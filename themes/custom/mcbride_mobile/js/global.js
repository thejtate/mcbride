
var defaultCheckboxOptions = {
  empty: 'images/empty.png'
};

(function($){

function process_pseudo($elements) {
  if (typeof($elements) == 'undefined') {
    return;
  }
  $elements.each(function() {
    $.pseudo(this);
  });
}

})(jQuery);

function ie_lessthan(v) {
  if (v == 8) {
    return typeof(window.localStorage) == 'undefined';
  }
  return jQuery.browser.msie && jQuery.browser.version.match(/^\d+/)[0] < v;
}

function ie_equal(v) {
  if (!jQuery.browser.msie) {
    return false;
  }
  var current = jQuery.browser.version.match(/^\d+/)[0];
  
  if (current == 7) {
    if (v == 8) {
      return typeof(window.localStorage) == 'object';
    }
    else if (v == 7) {
      return typeof(window.localStorage) == 'undefined';
    }
  }
  return jQuery.browser.version.match(/^\d+/)[0] == v;
}

function init_tooltips(context) {
  var $fiwd = $('.form-info-wrapper').find('.description').each(function(){
    $(this).attr('title', this.innerHTML);
  }).tooltip({
    delay: 0,
    position: 'bottom right',
    tipClass: 'tooltip tooltip-info'
  });
}


