//document ready handler
(function($){
    Drupal.behaviors.mcbrideForm = {
        attach: function(context, settings) {

                init_watermark();


        }
    };

   function init_watermark() {
  setTimeout( function() {
    var $input = $('input.watermarkit');
    $input.not('.watermark-processed').watermark({
      watermarkCssClass: 'form-text'
    }).addClass('watermark-processed');
  }, 50);
}


    function init_comboboxes($context) {
        setTimeout(function(){
            $selects = $('select', $context).not('.skip-js').each(function(){
                var $select = $(this),
                options = {
                    btnWidth: 35,
                    hoverEnabled: true,
                    listMaxHeight: 190,
                    forceScroll: true,
                    adjustWidth: 10
                };

                if (!$select.is(':visible')) {
                    options = $.extend({}, options, {
                        width: 316,
                        height: 25
                    });
                }
                $select.bind('combo_init', function(){
                    //do something here
                    }).combobox(options);
            });

            if (ie_lessthan(8)) {
                $selects.each(function() {
                    try {
                        process_pseudo(this.combobox.button);
                    } catch(e) {}
                });
            }
        }, 50);
    }



    function init_checkboxes($context) {
        conditional_contact = $('fieldset#webform-component-if-so-please-leave-your-name-phone-number-and-e-mail-address-below');
        $(conditional_contact).hide();
        
        $('input:checkbox', $context).checkbox($.extend(defaultCheckboxOptions, {
            cls: 'checkbox',
            empty: '/sites/all/themes/custom/mcbride/images/empty.png'
        }));

        $('input:radio', $context).checkbox($.extend(defaultCheckboxOptions, {
            cls: 'radiobox',
            empty: '/sites/all/themes/custom/mcbride/images/empty.png'
        })).click(function(){
            if($(this).attr('value') == 'yes'){
                $(conditional_contact).show();
            } else{
                $(conditional_contact).hide();
            }

        }).bind('check', function() {
            $(this).change();
        });
    }


})(jQuery);




