// JavaScript Document

/* Watermark solution */
(function ($) {
  function CreateDummyInput(jElement, options, tagName) {
    var watermarkText = (options.watermarkText) ? options.watermarkText : jElement.attr('title');
    var dummyType = (tagName == 'INPUT') ? '<input type="text">' : '<textarea>';
    var dummyInput = $(dummyType)
      .attr('id', jElement.attr('id') + '_watermark')
      .addClass(options.watermarkCssClass)
      .addClass('watermark')//workaround to fix some caching? problem in FF3. Used in window.unload hook to remove watermarks from the DOM
      .val(watermarkText)
      .css({
        overflowY:jElement.css('overflow-y'),
        overflowX:jElement.css('overflow-x')
      });

    dummyInput.hide();
    jElement.before(dummyInput);
    return dummyInput;
  }

  function MakeWatermark(element, options) {
    element.each(function () {
      var thisEl = jQuery(this);

      var dummyInput = CreateDummyInput(thisEl, options, thisEl.attr('tagName').toUpperCase());
      var dummyInputWidth = dummyInput.next("input").width();
      var dummyInputMargin = dummyInput.next("input").css("margin-left");
      var dummyInputFont = dummyInput.next("input").css("font-weight");
      dummyInput.css("width", dummyInputWidth).css("margin-left", dummyInputMargin).css("font-weight", dummyInputFont).css({"display":"inline"});
	
      dummyInput.focus(function (e) {
        $(this).hide();
        thisEl.show().focus();
      });

      thisEl.blur(function (e) {
        if (this.value == '') {
          $(this).hide();
          dummyInput.css({'display':'inline'});
        }
      });
	
      thisEl.blur();
    });
    return element;
  }

  $(window).unload(function () {
    $('.watermark').remove();
  });

  $.fn.watermark = function (options) {
    return MakeWatermark(this, options);
  }
})(jQuery);