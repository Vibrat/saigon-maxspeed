<?php
/**
 * Loop Add to Cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/add-to-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
$is_checkout_by_form    = get_post_meta( $product->get_id(), 'is-checkout-by-form', true );
$checkout_by_form_slug  = get_post_meta( $product->get_id(), 'checkout-by-form-slug', true);

echo apply_filters( 'woocommerce_loop_add_to_cart_link', revise_add_to_cart_loop(), $product, $args );

function revise_add_to_cart_loop() {

    if ($is_checkout_by_form == '1' && $checkout_by_form_slug != '') {

        printf( '<a as href="%s" class="%s" %s>%s</a>',
		esc_url( add_query_arg(array(
            'page_id' 		=> $checkout_by_form_slug,
            'product_id'	=> $product->get_id()))),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() ));
    } else {
        return sprintf( '<a sd href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() ));
    }
}
