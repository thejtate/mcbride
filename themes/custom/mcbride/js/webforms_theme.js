(function($){
    Drupal.behaviors.mcbrideFormsTheme = {
        attach: function(context, settings) {

            /*Input fields mask implementing*/
            var i = [1,2,3,4,5];
            /*Phones*/
            $("#edit-submitted-phone").mask("(999) 999-9999");
            $("#edit-submitted-alt-phone").mask("(999) 999-9999");
            $("#edit-submitted-applicant-information-telephone").mask("(999) 999-9999");
            $("#edit-submitted-applicant-information-mobile-pager").mask("(999) 999-9999");

            $("#edit-submitted-if-so-please-leave-your-name-phone-number-and-e-mail-address-below-survey-phone-number").mask("(999) 999-9999");


            for (var key in i){
                $("#edit-submitted-employment-history-employment-history-"+i[key]+"-employment-history-telephone").mask("(999) 999-9999");
            }

            /*Dates*/
            $("#edit-submitted-educational-history-high-school-school-date-granted").mask("99/99/9999");

            $("#edit-submitted-applicant-information-employed-in-mcbride-give-dates").mask("99/99/9999");


            $("#edit-submitted-educational-history-college-college-dates-of-attendance-college-from").mask("99/99/9999");
            $("#edit-submitted-educational-history-college-college-dates-of-attendance-college-to").mask("99/99/9999");

            $("#edit-submitted-educational-history-advanced-degree-advanced-degree-dates-of-attendance-advanced-degree-from").mask("99/99/9999");
            $("#edit-submitted-educational-history-advanced-degree-advanced-degree-dates-of-attendance-advanced-degree-to").mask("99/99/9999");

            $("#edit-submitted-educational-history-other-course-of-study-other-course-of-study-dates-of-attendance-other-course-of-study-from").mask("99/99/9999");
            $("#edit-submitted-educational-history-other-course-of-study-other-course-of-study-dates-of-attendance-other-course-of-study-to").mask("99/99/9999");

            for (var key in i){
                $("#edit-submitted-employment-history-employment-history-"+i[key]+"-employment-history-dates-of-employment-employment-history-from").mask("99/99/9999");
                $("#edit-submitted-employment-history-employment-history-"+i[key]+"-employment-history-dates-of-employment-employment-history-to").mask("99/99/9999");
            }
            /*--Input fields mask implementing*/


            /*Form validation*/
            validateMakeAppontmentForm();
            validatePaymentsForm();
            validateHospitalPaymentsForm()
            validateEmployerForm();

            init_comboboxes();
            

        }
    };

})(jQuery);

function init_comboboxes($context) {
    setTimeout(function(){
        $selects = jQuery('select', $context).not('.skip-js').each(function(){
            var $select = jQuery(this),
            options = {
                btnWidth: 35,
                hoverEnabled: true,
                listMaxHeight: 190,
                forceScroll: true,
                adjustWidth: 10
            };

            if (!$select.is(':visible')) {
                options = jQuery.extend({}, options, {
                    width: 316,
                    height: 25
                });
            }
            $select.bind('combo_init', function(){
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

function validateMakeAppontmentForm(){
    jQuery('#webform-client-form-92').validate({
        rules: {
            'submitted[full_name]': {
                minlength: 2
            }
        },
        messages: {
            'submitted[full_name]': {
                minlength: "Name too short"
            }
        }
    });
}
function validatePaymentsForm(){
    jQuery('#webform-client-form-96').validate({
        rules: {
            'submitted[account_number]': {
                required: true,
                digits: true
            },
            'submitted[amount]': {
                required: true,
                digits: true
            }
        },
        messages: {
            'submitted[account_number]': {
                required: "Please enter Account Number"
            },
            'submitted[amount]': {
                required: "Please enter Amount"
            }
        }
    });
}
function validateHospitalPaymentsForm(){
    jQuery('#webform-client-form-162').validate({
        rules: {
            'submitted[account_number]': {
                required: true,
                digits: true
            },
            'submitted[amount]': {
                required: true,
                digits: true
            }
        },
        messages: {
            'submitted[account_number]': {
                required: "Please enter Account Number"
            },
            'submitted[amount]': {
                required: "Please enter Amount"
            }
        }
    });
}
function validateEmployerForm(){
    jQuery('#webform-client-form-46').validate({
        rules: {
            'submitted[applicant_information][zip]': {
                digits: true
            }
        },
        messages: {

    }
    });
}
