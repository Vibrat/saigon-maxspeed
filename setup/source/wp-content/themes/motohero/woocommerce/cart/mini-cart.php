<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.7.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_before_mini_cart' ); ?>

<ul class="widget_products <?php echo esc_attr($args['list_class']); ?>">

    <?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					$thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					?>
					<li>
                        <div class="product-image">
                            <a href="<?php echo esc_url( get_permalink( $_product->get_id() ) ); ?>"><?php echo wp_kses_post($_product->get_image()); ?></a>
                            <?php if ( ! empty( $show_rating ) ) echo wp_kses_post($_product->get_rating_html()); ?>
                        </div>
                        <div class="info-products">
                            <a class="product-name" href="<?php echo esc_url( get_permalink( $_product->get_id() ) ); ?>"><?php echo esc_html($_product->get_title()); ?></a>
                            <div class="price-box">
                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="amount">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                            </div>
                        </div>
					</li>
					<?php
				}
			}
		?>

	<?php else : ?>

		<li class="empty"><?php esc_html_e( 'No products in the cart.', 'motohero' ); ?></li>
	<?php endif; ?>
</ul><!-- end product list -->
<p class="total pull-right"><?php esc_html_e( 'Subtotal', 'motohero' ); ?>:&nbsp; <?php echo WC()->cart->get_cart_subtotal(); ?></p>
<div class="clearfix"></div>
<p class="buttons">
    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="button wc-forward"><?php esc_html_e( 'View Cart', 'motohero' ); ?></a>
    <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="button checkout wc-forward"><?php esc_html_e( 'Checkout', 'motohero' ); ?></a>
</p>
<?php do_action( 'woocommerce_after_mini_cart' ); ?>
