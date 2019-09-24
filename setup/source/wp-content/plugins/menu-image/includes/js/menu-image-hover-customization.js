(function($) {
  $(document).ready(function() {
    var img_hover = $(".hovered-image").each(function(index) {
      var closest_sub_menu = $(this).closest("ul.sub-menu");
      $(this).css({ display: 'none' });
      closest_sub_menu.on('transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd', () => {
        closest_sub_menu.hover(() => {
          $(this).css({
            display: "block",
            position: "absolute",
            left: "100%",
            top: "0",
            height: closest_sub_menu.height(),
            width: "auto",
            border: "1px solid #333"
          });
        });
      });
    });

    var menu_image = $(".menu-image-hover-wrapper .menu-image").each(function(index) {
		$(this).css({ height: '0', width: '0' });
		var closest_sub_menu = $(this).closest("ul.sub-menu");
		var image_title = closest_sub_menu.find('.menu-image-title');

		$(this).css ({
			height: image_title.height(),
			width: 'auto'
		});
    });
  });
})(jQuery);
