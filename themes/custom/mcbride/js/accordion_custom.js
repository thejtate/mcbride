(function($){
    Drupal.behaviors.mcbride_accordionTheme = {
        attach: function(context, settings) {

        
            /*FAQ accordeon*/
            $('#accordion').accordion({
                active: false, 
                header: 'h3', 
                alwaysOpen: false,
                autoHeight: false,
                collapsible: true
            });
        
        
        }
    };

})(jQuery);


