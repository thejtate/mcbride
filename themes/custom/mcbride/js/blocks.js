(function($){

$(function() {
  init_pagers();
  init_selection();
  init_accordion();
  init_AddPosition();
});


var init_AddPosition = function() {
  var $wrapper = $('.all-jobs');
  var i = 0;
  $wrapper.find('.jobs').each(function() {
    var $this = $(this);
    i++;
    if((i - 1)%10 !== 0) {
      $this.hide();
    }
    else {
      $this.addClass('active');
    }
  });
  $wrapper.find('.add-position').click(function(e) {
    e.preventDefault();
    var $this = $(this).parent().parent();
    $this.parent().find('.jobs').each(function() {
      var $this = $(this);
      if ($this.hasClass('active') && $this.next().hasClass('jobs')) {
        $this.removeClass('active').next().addClass('active').show();
        return false;
      }
    });
    if ($this.prev().hasClass('active')){
      $this.hide();
    }
  });
}

var init_accordion = function() {
  var $wrapper = jQuery('.block-content-item .more-info');
  $wrapper.find('span').live('click', function(){ 
    var $this = $(this).parent();
    if (!$this.hasClass('active')) {
      $this.addClass('active');
      $this.find('span').addClass('active');
    }
    else {
      $this.removeClass('active');
      $this.find('span').removeClass('active');
    }
  });
}

function init_pagers() {
  var $pw = $('.pager-wrapper-wt').not('.pager-wrapper-processed').addClass('pager-wrapper-processed');
  
  $pw.each(function() {
    var $pwi = $(this),
    $tooltip = $('<span class="pager-tooltip">0/0</span>');
    $links = $pwi.find('li').not('.last, .first').find('a'),
    links_length = $links.length;
    
    $('body').append($tooltip);
    
    if (ie_lessthan(8)) {
      process_pseudo($tooltip);
    }
    
    $links.each(function(i) {
      this.pager_index = i + 1;
    }).hover(function() {
      var $link = $(this),
      offset = $link.offset();
      
      $tooltip.html(this.pager_index + '/' + links_length).css({
        visibility: 'visible',
        top: parseInt(offset.top) - parseInt($link.height()),
        left: parseInt(offset.left) - parseInt($tooltip.width() / 2) + parseInt($link.width() /  2)
      });
    }, function() {
      $tooltip.css({
        visibility: 'hidden'
      });
    });
  });
}

function init_selection() {
  $('.struct-selection').not('.struct-selection-processed').each(function() {
    var $wrap = $(this),
    $more = $wrap.find('.more-options'),
    $link_close = $wrap.find('.link-close'),
    $link_open = $wrap.find('.link-open');
        
    if ($wrap.hasClass('struct-selection-closed')) {
      $more.css({
        visibility: 'visible'
      }).hide();
    }
    
    $link_close.click(function() {
      var $btn = $(this);
      $more.slideUp(function() {
        $wrap.addClass('.struct-selection-closed');
        $link_close.hide();
        $link_open.show();
      });
    });
    
    $link_open.click(function() {
      var $btn = $(this);
      $more.slideDown(function() {
        $wrap.removeClass('.struct-selection-closed');
        $link_close.show();
        $link_open.hide();
      });
    });
  });
}
})(jQuery);