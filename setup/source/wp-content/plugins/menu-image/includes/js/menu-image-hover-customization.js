(function ($) {
	$(document).ready(function () {
		var img_hover = $('.hovered-image').each(function(index) {
			var closest_sub_menu = $(this).closest('ul.sub-menu');
			closest_sub_menu.hover(() => {
				$(this).css({
					display: 'block',
					position: 'absolute',
					left: '100%',
					top: '0',
					height: closest_sub_menu.height(),
					width: 'auto',
					border: '1px solid #333'
				});
			});
		});
	});
})(jQuery);
