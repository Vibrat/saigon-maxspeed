<?php
$inwave_post_option = Inwave_Helper::getConfig();
$inwave_theme_option = Inwave_Helper::getConfig('smof');

if(!isset($cartUrl)){
    $cartUrl = '';
}
if(function_exists('WC')) {
    $cartUrl = wc_get_cart_url();
}

?>
<div class="header header-default">
    <!-- the header -->

    <div class="header-top">
        <div class="container">
            <div class="header-address">
            <?php echo wp_kses($inwave_theme_option['header_top_content'],inwave_allow_tags()); ?>
            </div>
            <?php if ($inwave_theme_option['header_social_links']): ?>
                <?php get_template_part( 'blocks/social-links'); ?>
            <?php endif; ?>
        </div>
    </div>
    <div role="navigation" class="navbar navbar-default navbar-bg-light">
        <div class="container">
                <div class="logo-wrapper">
                    <div class="logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo get_option('blogname');?>">
                            <img class="main-logo" src="<?php echo esc_url($inwave_theme_option['logo']); ?>" alt="">
                            <img class="sticky-logo" src="<?php echo esc_url($inwave_theme_option['logo_sticky']); ?>" alt="">
                        </a>
                    </div>
                </div>
                <div class="iw-icon-search-cart">
                    <button class="off-canvas-open" type="button">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php if($inwave_post_option['show_search_form']):  ?>
                        <div class="search-form">
                                <form class="search-form-header" method="get" action="<?php echo esc_url( home_url( '/' ) )?>">
                                    <span class="search-wrap">
                                        <input type="search" title="<?php echo esc_attr_x( 'Search for:', 'label','motohero' ) ?>" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'Enter  key words...', 'placeholder','motohero' );?>" class="top-search">
                                        <span><i class="fa fa-search"></i></span>
                                    </span>
                                </form>
                            </div>
                    <?php endif; ?>
                    <?php if($inwave_theme_option['woocommerce_cart_top_nav'] && $cartUrl):  ?>
                        <a href="<?php echo esc_url($cartUrl); ?>" class="cart-icon">
                            <span class="inner-icon"><i class="fa fa-shopping-cart"></i></span>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="iw-menu-none-mobile">
                    <div class="iw-menu-default main-menu nav-collapse">
                        <?php get_template_part( 'blocks/menu'); ?>
                    </div>
                </div>
        </div>
    </div><!-- the menu -->
</div>
<!--End Header-->