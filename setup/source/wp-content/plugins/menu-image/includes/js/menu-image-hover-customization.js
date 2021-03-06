(function($) {
  // Hover menu
  $(document).ready(function() {
    // Css for hovered-image
    var hovered_imgs = $(".hover-menu-item .hovered-image").each(function(index, img) {

      // Prepare elements
      var closest_sub_menu     = $(img).closest("ul.sub-menu");
      var current_menu_item    = $(img).closest("li.menu-item");
      var sub_menu_count       = $(img).parentsUntil(".iw-main-menu", ".sub-menu").length;
      var menu_container_width = $(img).closest(".iw-main-menu").width();
      var action_button        = $(img).siblings('.menu-hovered-image-button:first');

      // Reset display to prevent initial size inconsistent
      $(img).css({ display: "none" });

      // Sub-menu: Adding Animation
      closest_sub_menu.on(
        "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",
        () => {
          let is_active = false; // boolean activation
          current_menu_item.hover(() => {
            if (!is_active) {

              $(img).css({
                display: "block",
                position: "absolute",
                left: "100%",
                top: "0",
                height: closest_sub_menu.height(),
                width: `${menu_container_width - sub_menu_count * 250}px`,
                "max-width": "none",
                "z-index": 1,
                "object-fit": "cover",
                border: "1px solid #333"
              });

              action_button.css({
                display: "block",
                position: "absolute",
                left: `calc(100% + ${(menu_container_width - sub_menu_count * 250)/2 - action_button.width() /2}px`,
                bottom: '18px',
                'z-index': 1,
                "max-width": "none",
              })
              is_active = true;
            }
          });

          current_menu_item.mouseleave(() => {
            if (is_active) {

              // Reset image
              $(img).css({
                display: 'none',
                'z-index': 0
              });

              // Reset Action Button
              action_button.css({
                display: 'none',
                'z-index': 0
              });

              is_active = false;
            }
          });
        }
      );
    });

    // Styling for Cover Background and Sub-Menu Height
    var header =  $(".header");
    var menu_items = $(".iw-main-menu .iw-nav-menu")
      .children()
      .filter('.hover-menu-item')
      .each(function(index) {

        var cover_container        = $(this).find("li a span.menu-cover:first");
        var contain_width          = $(this).closest(".iw-main-menu").width();
        var sub_menu_level1        = $(this).find("ul.sub-menu").first();
        var cover_container_active = false;

        sub_menu_level1.css('min-height', `calc(100vh - ${header.height()}px - 20px)`);

        // Cover Background
        $(this).hover(() => {
          sub_menu_level1.on(
            "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",
            () => {

              if (!cover_container_active) {

                cover_container.css({
                  width: `${contain_width - sub_menu_level1.width()}px`,
                  height: sub_menu_level1.height(),
                  opacity: 1,
                });

                cover_container_active = true;
              }

            }
          );
        });

        // Cover Background
        $(this).mouseleave(() => {
          sub_menu_level1.on(
            "transitionend webkitTransitionEnd oTransitionEnd otransitionend MSTransitionEnd",
            () => {
              if (cover_container_active) {
                cover_container.css({
                  width: `0`,
                  opacity: 0,
                });

                cover_container_active = false;
              }
            }
          );
        });
      });
  });
})(jQuery);

(function($) {
  // Share menu image
  $(document).ready(function() {
    // Css for menu-image
    var menu_image = $(
      ".hover-menu-item .menu-image-hover-wrapper .menu-image, .hover-menu-item .menu-image"
    ).each(function(index) {

      $(this).css({ height: "0", width: "0" }); // reset dimension
      var image_title = $(this).closest("li").find(".menu-image-title");
      var is_height_not = image_title.height();

      $(this).css({
        "object-fit": "cover",
        height: is_height_not ? is_height_not : "28px",
        margin: is_height_not ? 0 : '6px',
        width: "auto",
        "vertical-align": 'middle'
      });
    });

  });
})(jQuery);

(function($) {
  // Menu Dropdowm
  $(document).ready(function() {
    const $dropdowns = $('.iw-main-menu .dropdown-menu-item');
    // set margin for sub-menu
    const $submenus = $dropdowns.find('> ul.sub-menu, > ul.sub-menu > li.menu-item > ul.sub-menu');
    $submenus.each((index, item) => {
      const $currentSubMenu = $(item);
      const $parent = $currentSubMenu.closest('li.menu-item');

      $currentSubMenu.css('margin-top', $parent.outerHeight(true));
      $parent.on('hover', () => {
        $currentSubMenu.css('margin-top', $parent.outerHeight(true));
      })
    });
  });
})(jQuery);
