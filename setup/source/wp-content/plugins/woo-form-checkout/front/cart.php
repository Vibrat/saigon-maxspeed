<?php
add_filter( 'woocommerce_loop_add_to_cart_link', 'ts_replace_add_to_cart_button', 2000, 2 );
function ts_replace_add_to_cart_button( $button, $product ) {
    if (is_product_category() || is_shop()) {
    $button_text = __("View Product", "woocommerce");
    $button_link = $product->get_permalink();
    $button = '<a class="button" href="' . $button_link . '">' . $button_text . '</a>';
    return $button;
    }
}