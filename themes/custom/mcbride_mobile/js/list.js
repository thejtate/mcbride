(function($) {
	$(function() {

		$('.form-item-select-list h5.title-list').click(function() {
			$(this).parent('.form-item-select-list').toggleClass('active');
			$(this).next('ul').toggle();
		});
	});
})(jQuery);
