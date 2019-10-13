<?php
/**
 * Simple product add to cart
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product; global $post;

if ( ! $product->is_purchasable() ) {
	return;
}

?>

<?php
	// Availability
	$is_checkout_by_form    = get_post_meta( $product->get_id(), 'is-checkout-by-form', true );
	$checkout_by_form_slug  = get_post_meta( $product->get_id(), 'checkout-by-form-slug', true);
	$availability      = $product->get_availability();
	$availability_html = empty( $availability['availability'] ) ? '' : '<p class="stock ' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</p>';

	echo apply_filters( 'woocommerce_stock_html', $availability_html, $availability['availability'], $product );
?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>
<div class="add-to-box">
	<form class="cart" method="post" enctype='multipart/form-data'>
	 	<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

		 <?php
		 	if ($is_checkout_by_form != '1' || $checkout_by_form_slug == '') {
				if ( ! $product->is_sold_individually() )
					woocommerce_quantity_input( array(
						'min_value' => apply_filters( 'woocommerce_quantity_input_min', 1, $product ),
						'max_value' => apply_filters( 'woocommerce_quantity_input_max', $product->backorders_allowed() ? '' : $product->get_stock_quantity(), $product )
					) );
			}
	 	?>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" />
		<?php
			if ($is_checkout_by_form == '1' && $checkout_by_form_slug != '') {
				echo  '<a class="single_add_to_cart_button button alt btn-cart theme-bg"';
				echo 	'href="/' . add_query_arg(array(
					'page_id' 		=> $checkout_by_form_slug,
					'product_id'	=> $product->get_id()
				), null) . '"';
				echo 	'>' . esc_html($product->single_add_to_cart_text())  . '</a>';
			} else {
				echo '<button type="submit" class="single_add_to_cart_button button alt btn-cart theme-bg">';
				echo esc_html($product->single_add_to_cart_text());
				echo '</button>';
			}
		?>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>
    <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>
	<div class="clear"></div>
</div>


<?php endif; ?>
