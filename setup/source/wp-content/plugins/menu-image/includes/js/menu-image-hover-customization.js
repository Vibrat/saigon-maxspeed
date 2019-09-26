(function($) {
  $(document).ready(function() {
    
    
    // Css for hovered-image
    var img_hover = $(".hovered-image").each(function(index) {
      
      var closest_sub_menu = $(this).closest("ul.sub-menu");
      var sub_menu_count = $(this).parentsUntil(".iw-main-menu", ".sub-menu").length;
      var menu_container_width = $(this).closest(".iw-main-menu").width();

      // reset container dimension
      $(this).css({ display: "none" });

      // Adding effect for sub menu
      closest_sub_menu.on(
        "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",
        () => {
          closest_sub_menu.hover(() => {
            $(this).css({
              display: "block",
              position: "absolute",
              left: "100%",
              top: "0",
              height: closest_sub_menu.height(),
              width: `${menu_container_width - sub_menu_count * 250}px`,
              "max-width": "none",
              "object-fit": "cover",
              "z-index": 1,
              border: "1px solid #333"
            });
          });
        }
      );
    });

    // Styling for cover menu bar
    var menu_items = $(".iw-main-menu .iw-nav-menu").children().each(function(index) {

        var cover_container = $(this).find('li a span.menu-cover:first');
        var contain_width   = $(this).closest('.iw-nav-menu').width();
        var sub_menu_level1 = $(this).find('ul.sub-menu:first'); 

        $(this).hover(() => {
           sub_menu_level1.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", () => {
            cover_container.css({
              width: `${contain_width - sub_menu_level1.width()}px`,
              height: sub_menu_level1.height(),
              opacity: 1
            });
          });
        }); 

        $(this).mouseleave(() => {
          sub_menu_level1.on("transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd", () => {
            cover_container.css({
              width: `0`,
              opacity: 0
            });
        });
      });
    });

    // Css for menu-image
    var menu_image = $(
      ".menu-image-hover-wrapper .menu-image, .menu-image"
    ).each(function(index) {
      $(this).css({ height: "0", width: "0" });
      var closest_sub_menu = $(this).closest("ul.sub-menu");
      var image_title = closest_sub_menu.find(".menu-image-title");

      $(this).css({
        "object-fit": "cover",
        height: image_title.height(),
        width: "auto"
      });
    });

    // Css for sub-menu
    var submenu = $("ul.sub-menu");
  });
})(jQuery);
