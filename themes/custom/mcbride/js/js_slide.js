jQuery(window).load(function () {
  
       jQuery('#gallery-slides').slides({
            preload: true,
          //  preloadImage: 'js/img/loading.gif',
            play: 4000,
            pause: 0,
            pagination: true,
            hoverPause: true,
            animationStart: function() {
                jQuery('.caption').animate({
                    bottom:-35
                }, 100);

            },
            animationComplete: function(current) {
                jQuery('.caption').animate({
                    bottom:0
                }, 200);
                if(jQuery.browser.msie && jQuery.browser.version==8){
                    jQuery('.caption').animate({
                        bottom:-1
                    }, 200);
                }
            }
        });

        jQuery('#gallery-slides-filiale').slides({
            preload: true,
          //  preloadImage: 'js/img/loading.gif',
            //play: 4000,
            pause: 0,
            hoverPause: true,
            animationStart: function() {
                jQuery('.caption').hide();
            },
            animationComplete: function(current) {
                jQuery('.caption').show();
            }
        });

        jQuery(".slides_control div:not(.slides_control div div)").each(function() {
            if (jQuery(this).css("display") != "none") {
                jQuery(".caption", this).show();
            }

        });

    jQuery('.paginator').each(function() {

      if(jQuery('li', this).length){
          if(jQuery.browser.mozilla ){
              var width_pag=0;
              jQuery('li.paginator-item').each(function(){
                    jQuery(this).children().each(function() {
                        width_pag+= jQuery(this).outerWidth();
                    });
                  jQuery(this).width(width_pag);
                  width_pag=0;
              })

          }
          var container = jQuery(this).outerWidth();
          var pag_items = 0;

          jQuery('li.paginator-item', this).each(function(){
              pag_items = pag_items + jQuery(this).outerWidth();
          });

          var mar_l = jQuery('li.prev-link', this).outerWidth() >= (container-pag_items)/2 ? jQuery('li.prev-link', this).outerWidth() : (container-pag_items)/2;
          jQuery('li.paginator-item:first', this).css('margin-left' , mar_l);
      }
    });
});
