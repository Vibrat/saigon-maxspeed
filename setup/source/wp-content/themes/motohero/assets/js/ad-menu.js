/**
 * This script is meant to handle behavior
 * of floating menu
 */
(function($) {
  $(document).ready(function() {
    $(window).on("scroll", function() {
      this.isActivated = false;
      if (!this.isActivated && $(window).scrollTop() > 0) {
        this.isActivated = true;
        $(".ad-menu").addClass("active");
        return; // explicity is always better
      } else {
        if (!$(window).scrollTop()) {
          this.isActivated = false;
          $(".ad-menu").removeClass("active");
        }
      }
    });
  });
})(jQuery);
