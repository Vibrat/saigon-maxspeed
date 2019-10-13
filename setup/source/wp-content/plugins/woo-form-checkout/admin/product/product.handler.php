<?php
function save_checkout_by_form( $post_id ) {

  $is_checkout_by_form    = isset( $_POST[ 'is-checkout-by-form' ] ) ? sanitize_text_field( $_POST[ 'is-checkout-by-form' ] ) : '0';
  $checkout_by_form_slug  = isset( $_POST[ 'checkout-by-form-slug'] ) ? sanitize_text_field( $_POST[ 'checkout-by-form-slug' ] ) : '';

  // grab the product
  $product = wc_get_product( $post_id );

  // save using WooCommerce built-in functions
  $product->update_meta_data( 'is-checkout-by-form', $is_checkout_by_form );
  $product->update_meta_data ( 'checkout-by-form-slug', $checkout_by_form_slug);
  $product->save();
  }

  add_action( 'woocommerce_process_product_meta', 'save_checkout_by_form' );
