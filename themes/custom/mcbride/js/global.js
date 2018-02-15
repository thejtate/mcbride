
var defaultCheckboxOptions = {
  empty: 'images/empty.png'
};

(function($){
  
  $(function() {
    page_pseudo();
    init_ie_pie();
  });

  function process_pseudo($elements) {
    if (typeof($elements) == 'undefined') {
      return;
    }
    $elements.each(function() {
      $.pseudo(this);
    });
  }

  function page_pseudo($context) {
    //apply pseudo fix
    if (ie_lessthan(8)) {
      var $pseudo_elements = $('.block-read_more', $context)
      .add($('.block-read_more', $context).find('.block-read_more-top'))			
      .add('.block-read_more', $context)
      .add($('.block-read_more', $context).find('.block-read_more-middle')) 
      .add('.block-read_more', $context)
      .add($('.block-read_more', $context).find('.block-read_more-bottom')) 
      .add('.left-nav-menu', $context)
      .add($('.left-nav-menu', $context).find('.first a')) 
      .add('.left-nav-menu', $context)
      .add($('.left-nav-menu', $context).find('.last a'))
      .add('.page-gallery div.pagination-wrapper', $context)
      .add($('.page-gallery div.pagination-wrapper', $context).find('ul.pagination'))
      .add('.navigation ul li', $context)
      .add($('.navigation ul li', $context).find('.active'))
      .add('.navigation', $context)
      .add($('.navigation', $context).find('ul li'))
      .add('.navigation ul li ul.sub_menu li ul', $context)
      .add($('.navigation ul li ul.sub_menu li ul', $context).find('li'))
      .add($('.block-content-item, .list_owned', $context))
      .add($('.block-content-item', $context).find("li"))
      
      .add($('.page-news.about-us .wrapper-block-content', $context).find("div.block-image-top"))
      .add($('.webform-client-form .webform-component-fieldset legend', $context).find('.fieldset-legend')) 
      .add($('.page-privacy .block-content-item', $context).find('li')) 
 	  .add($('.page-right .block-content-item', $context).find('li'))
 	  .add($('.page-careers-listings .more-info', $context).find('span')) 	  
      .add($('.wrapper-block-content', $context).find('.block-mailing'))

        .add($('.main-hor-select', $context))
        .add($('.sub-hor-select-span', $context))
        .add($('.sub-hor-select li.last span', $context))
        .add($('.sub-hor-select li.last a', $context))
      
      .add($('.block-map', $context).find(".view-map"));
      process_pseudo($pseudo_elements);
    }
  }
  
  var init_ie_pie = function() {
    if (ie_lessthan(9) && window.PIE) {
      setTimeout(function(){
        var $pie_elements = $('.block-rounded'); 
        $pie_elements.each(function() {
          PIE.attach(this);
        });
      }, 500);
    }
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

