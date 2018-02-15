(function ($) {
  Drupal.behaviors.mcbrideCustomPayment = {
    attach: function (context, settings) {

        $('form#payment-form', context).once('payment', function(i, el){

          //jQuery('input[name="x_recurring_billing_start_date"]').datepicker({ dateFormat: 'yy-mm-dd' });

          var $form = $(this)
              ,$type_radios = $form.find('input[name="x_recurring_billing_id"]')
              ,$dates_wrap = $form.find('.dates-wrap')
              ,$dates = $dates_wrap.find('input')
              ,$start_date = $dates.filter('#x_recurring_billing_start_date')
              ,$end_date = $dates.filter('#x_recurring_billing_end_date')
              ,$rec_amount_wrap = $form.find('.rec-amount-wrap')
              ,$amount_wrap = $form.find('.amount-wrap')
              ,$rec_amount = $rec_amount_wrap.find('input')
              ,$amount = $amount_wrap.find('input')
              ,$rec_total_holder = $form.find('.total-recur-amount-placeholder');

            function fieldsVisibility() {
                if(!$(this).val()) {
                    $dates_wrap.hide();
                    $rec_amount_wrap.hide();
                    $rec_amount.val('');
                    $amount_wrap.show();
                } else {
                    $dates_wrap.show();
                    $rec_amount_wrap.show();
                    $amount_wrap.hide();
                    $amount.val('');
                }
            }
            function getType() {
                return $type_radios.filter(':checked').data('type');
            }

            function countTotal() {
                var type = getType()
                    ,start = $start_date.val()
                    ,end = $end_date.val()
                    ,amount = parseFloat($rec_amount.val().replace(',', ''))
                    ,startObj = new Date(Date.parse(start))
                    ,endObj = new Date(Date.parse(end));

                var total = 0;
                if(type == 'week') {
                    total = amount * (weekDiff(startObj, endObj));
                } else if (type == 'bi-week') {
                    total = amount * biweekDiff(startObj, endObj);
                } else if (type == 'month') {
                    total = amount * monthDiff(startObj, endObj);
                }

                if(total) {
                    $rec_total_holder.html('(Total: $' + total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + ')');
                } else {
                    $rec_total_holder.html('');
                }
            }


            $type_radios.on('change', countTotal);
            $rec_amount.on('keyup', countTotal);
            $dates.on('change', countTotal);

            $type_radios.on('change', fieldsVisibility);
            $type_radios.filter(':checked').trigger('change');

            // $amount.maskMoney({thousands:''});
            // $rec_amount.maskMoney({thousands:''});
            $amount.mask("#0.00", {reverse: true});
            $rec_amount.mask("#0.00", {reverse: true});

            // if ( $dates[0].type != 'date' ) {

                $dates.each(function() {
                    $(this).datepicker({ dateFormat: 'yy-mm-dd' });
                });
            // }

            $.validator.addMethod("validDateFormat",
                function (value, element) {
                    return moment(value, 'YYYY-MM-DD',true).isValid();
                },
                "Invalid date format: valid example 2018-01-18"
            );

            $.validator.addMethod("greaterThenToday",
                function (value, element) {


                    if(!value || $type_radios.filter(':checked').data('type') === '') {
                        return true;
                    }

                    var d1 = new Date();
                    d1.setHours(0,0,0,0);
                    var d2 = new Date(Date.parse(value));

                    return d2.getTime() >= d1.getTime();
                },
                "Should be greater or equal then today date"
            );

            $.validator.addMethod("greaterThen",
                function (value, element, param) {

                    var $otherElement = $(param);
                    if(!value) {
                        return true;
                    }

                    var d1 = new Date(Date.parse($otherElement.val()));
                    var d2 = new Date(Date.parse(value));


                    return d2.getTime() >= d1.getTime();
                },
                "Should be greater or equal then 'From' date"
                );


                $form.validate({
                    rules: {
                        x_recurring_billing_start_date : {
                            required: function(element){
                                return !!$type_radios.filter(':checked').val();
                            },
                           // date: true,
                          validDateFormat: true,
                          greaterThenToday: ''
                        },
                        x_recurring_billing_end_date : {
                            required: function(element) {
                                return !!$type_radios.filter(':checked').val();
                            },
                             // date: true,
                            validDateFormat: true,
                            greaterThen: '#x_recurring_billing_start_date',
                            greaterThenToday: ''
                        },
                        x_recurring_billing_amount : {
                            required: function(element){
                                return !!$type_radios.filter(':checked').val();
                            },
                            min: 1
                        },
                        x_amount : {
                            required: function(element){
                                return !$type_radios.filter(':checked').val();
                            },
                            min: 1
                        },
                    }
                });

        });
    }
  };

    function monthDiff(d1, d2) {
        var full_months = d2.getMonth() - d1.getMonth() + (12 * (d2.getFullYear() - d1.getFullYear()));

        if(d1.getDate() > d2.getDate()) {
            return Math.abs(full_months);
        } else {
            return Math.abs(full_months + 1);
        }
    }

    function weekDiff(first, second) {
        return Math.abs(Math.ceil((second-first + 1)/(1000*60*60*24*7)));
    }
    function biweekDiff(first, second) {
        return Math.abs(Math.ceil((second-first + 1)/(1000*60*60*24*14)));
    }


})(jQuery);