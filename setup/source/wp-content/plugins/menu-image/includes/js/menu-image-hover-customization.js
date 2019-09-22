(function ($) {
	$(document).ready(function () {
		var img_hover = $('.hovered-image');
		var closest_sub_menu = img_hover.closest('ul.sub-menu');
		img_hover.css({
			display: 'none'
		});
	});
})(jQuery);
