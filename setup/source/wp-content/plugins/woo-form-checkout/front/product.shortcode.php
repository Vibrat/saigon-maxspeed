<?php

function reg_product_checkout_by_form($atts= [], $content = null, $tag = '') {

  // Buffer our contents
  // normalize attribute keys, lowercase
  $atts = array_change_key_case((array)$atts, CASE_LOWER);

  // override default attributes with user attributes
  $wporg_atts = shortcode_atts(
    ['product_id' => isset($_GET['product_id']) ? $_GET['product_id'] : '' ],
    $atts,
    $tag);

  $product = wc_get_product($wporg_atts['product_id']);
  
  if ($product) {
    ob_start();
    return get_the_post_thumbnail($product->get_id(), 'img-product');
  }

  return false;
}

add_shortcode( 'checkout_product', 'reg_product_checkout_by_form' );
