<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.7.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_image_ids();

if ($attachment_ids) {
    $loop = 0;
    $columns = apply_filters('woocommerce_product_thumbnails_columns', 3);
    ?>
    <div class="more-views">
        <div class="owl-carousel owl-theme" id="owl-demo">
            <?php
            if ($attachment_ids && $product->get_image_id()) {
                foreach ($attachment_ids as $attachment_id) {
                    echo '<div class="item">';
                    echo apply_filters('woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html($attachment_id), $attachment_id); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
                    echo '</div>';
                }
            }
            ?>
        </div>
    </div>
    <?php
}
