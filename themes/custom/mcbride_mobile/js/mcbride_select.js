/* 
 * plugin for selectors
 */
(function($) {
    $(document).ready( function (){
      $('.physicians-find-a-physicians-collapsible').collapsibleSelector({childLeftOffset: 15});
    });
  
  $.fn.collapsibleSelector = function(option) {
   var collapsibleElements = this;
    option = $.extend({}, $.fn.collapsibleSelector.option, option);
    this.find('>span').bind('click', function(){
      clickAction(this, 'slide');//for first lvl element effect slide
    });
    this.find('>ul>li>span').bind('click', function(){
      clickAction(this, 'slide');//for second lvl element effect slide
    });
    this.find('ul ul span').bind('click', function(){
      clickAction(this, 'hide');//for 3d lvl element and more - effect hide
    });
    return this;
    function clickAction(element, effect) {
      var parent = $(element).parent();
        
      if (parent.hasClass('expanded')){
        parent.addClass('collapsed');
        parent.removeClass('expanded');
        switch(effect){
          case 'slide':
            //$(element).next('ul').slideUp();
            $(element).next('ul').hide();
            break;
          case 'hide':
            $(element).next('ul').hide();
            break;
        }
      } else {
        switch(effect){
          case 'slide':
            hideOtherExpandedElements(element);
            //$(element).next('ul').slideDown();
            $(element).next('ul').show();
            break;
          case 'hide':
            hideOtherExpandedElements(element);
            $(element).next('ul').show();
           // posLeft =  $(element).parent().position().left + $(element).parent().width() + option.childLeftOffset;
          //  posTop = 0;//$(element).parent().position().top;
        //    $(element).next('ul').css({
             // left: posLeft, 
              //top: posTop
        //    });
            break;
        }
        parent.addClass('expanded');
        parent.removeClass('collapsed');
      }
    }
    function hideOtherExpandedElements(element) {
      //collapse all expanded elements,except parents of current element (prevent elements overlap)
      $(element).parents('.expanded').addClass('current');
      $(collapsibleElements).parent().find('.expanded:not(.current)').addClass('collapsed').removeClass('expanded').find('>ul').hide();
      $(element).parents('.expanded').removeClass('current');
    }
  };
    $.fn.collapsibleSelector.option = {childLeftOffset:10};
})(jQuery);


