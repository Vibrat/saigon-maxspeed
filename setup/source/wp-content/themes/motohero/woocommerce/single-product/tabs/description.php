<?php
/**
 * Description tab
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

$heading = '';// esc_html( apply_filters( 'woocommerce_product_description_heading', esc_html__( 'Product Description', 'motohero' ) ) );

?>

<?php if ( $heading ): ?>
  <h2><?php echo esc_html($heading); ?></h2>
<?php endif; ?>

<?php the_content(); ?>
