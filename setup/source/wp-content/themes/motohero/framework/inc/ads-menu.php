<?php
/**
 * Register Action for Ad Menu
 * 
 */
function reg_ad_menu() {
    register_nav_menu('ad-menu', __('Advertisement Menu'));
    wp_enqueue_style( 'ad-menu', get_template_directory_uri() . '/assets/css/ad-menu.css', false, '1.0','all');
    wp_enqueue_script('ad-menu', get_template_directory_uri() . '/assets/js/ad-menu.js', false, '1.0', 'all');
}

add_action('init', 'reg_ad_menu');