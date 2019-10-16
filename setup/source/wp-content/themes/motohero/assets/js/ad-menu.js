/**
 * This script is meant to handle behavior
 * of floating menu
 */
(function($) {
  $(document).ready(function() {

    // get data options' setting
    let $options = $('.ad-menu').find('[ad-menu-data]').first();

    $('.ad-menu').css({
      '-webkit-box-shadow': '0 6px 24px 0 ' + $options.attr('shadow'),
      'box-shadow': '0 6px 24px 0 ' + $options.attr('shadow')
    });

    $('.ad-menu > ul > li:last-child').css({
      '-webkit-box-shadow': '0 6px 24px 0 ' + $options.attr('shadow'),
      'box-shadow': '0 6px 24px 0 ' + $options.attr('shadow')
    });

    $('head').append(`
      <style>
        .ad-menu ul li:hover {
          border-left-color: ${$options.attr('shadow')};
        }
      </style>
    `);

    $('.ad-menu').hover(function() {
      if (!$('.ad-menu-cover').hasClass('active')) {
        $('.ad-menu-cover').addClass('active');
      }
    });

    $('.ad-menu').on('mouseleave', function () {
      if ($('.ad-menu-cover').hasClass('active')) {
        $('.ad-menu-cover').removeClass('active');
      }
    });

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
