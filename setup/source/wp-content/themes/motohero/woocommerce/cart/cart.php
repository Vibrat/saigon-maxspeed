<?php
/**
 * Cart Page
 *
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     3.7.0
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

wc_print_notices();

do_action('woocommerce_before_cart');
?>
<div class="product-cart">
    <div class="cart">
        <form action="<?php echo esc_url(WC()->cart->get_cart_url()); ?>" method="post" class="woocommerce-cart-form">

            <?php do_action('woocommerce_before_cart_table'); ?>

            <div class="cart-table shop_table shop_table_responsive cart woocommerce-cart-form__contents">
                <div class="cart-table-items">
                    <div class="cart-table-title">
                        <div class="row row-item">

                            <div class="col-md-5 col-sm-5 col-xs-12 item no-border"><div class="title-cart-table"><?php esc_html_e('Product', 'motohero'); ?></div></div>
                            <div class="col-md-2 col-sm-2 col-xs-12 item"><div class="title-cart-table"><?php esc_html_e('Price', 'motohero'); ?></div></div>
                            <div class="col-md-2 col-sm-2 col-xs-12 item"><div class="title-cart-table"><?php esc_html_e('Quantity', 'motohero'); ?></div></div>
                            <div class="col-md-2 col-sm-2 col-xs-12 item"><div class="title-cart-table"><?php esc_html_e('Total', 'motohero'); ?></div></div>
                            <div class="col-md-1 col-sm-1 col-xs-12 item"><div class="title-cart-table delete-item"><a href="#"><i class="fa fa-times-circle"></i></a></div></div>
                        </div>
                    </div>

                    <?php do_action('woocommerce_before_cart_contents'); ?>

                    <?php
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                        $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            ?>
                            <div
                                class="row row-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">

                                <div class="item no-border col-md-5 col-sm-5 col-xs-12">
                                    <div class="name-item ">
                                        <?php
                                        $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

                                        if (!$_product->is_visible())
                                            echo wp_kses_post($thumbnail);
                                        else
                                            printf('<a href="%s">%s</a>', $_product->get_permalink($cart_item), $thumbnail);
                                        ?>
                                        <div class="product-info">
                                            <?php
                                            if (!$_product->is_visible())
                                                echo apply_filters('woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key);
                                            else
                                                echo apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', $_product->get_permalink($cart_item), $_product->get_title()), $cart_item, $cart_item_key);

                                            // Meta data
                                            echo WC()->cart->get_item_data($cart_item);

                                            // Backorder notification
                                            if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity']))
                                                echo '<p class="backorder_notification">' . esc_html__('Available on backorder', 'motohero') . '</p>';
                                            ?>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                                <div class="item col-md-2 col-sm-2 col-xs-12">
                                    <div class="price-item">
                                        <span class="cart-price theme-color">
                                            <?php
                                            echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key);
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="item col-md-2 col-sm-2 col-xs-12">
                                    <div class="qty-item">
                                        <?php
                                        if ($_product->is_sold_individually()) {
                                            $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                        } else {
                                            $product_quantity = woocommerce_quantity_input(array(
                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value' => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                                'min_value' => '0'
                                                    ), $_product, false);
                                        }

                                        echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item);
                                        ?>
                                    </div>
                                </div>


                                <div class="item col-md-2 col-sm-2 col-xs-12">
                                    <div class="price-item">
                                        <span class="cart-price theme-color">
                                            <?php
                                            echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key);
                                            ?>
                                        </span>
                                    </div>
                                </div>


                                <div class="item col-md-1 col-sm-1 col-xs-12">
                                    <div class="delete-item">
                                        <?php
                                        echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>', esc_url(WC()->cart->get_remove_url($cart_item_key)), esc_html__('Remove this item', 'motohero'), esc_attr($product_id), esc_attr($_product->get_sku())
                                                ), $cart_item_key);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }

                    do_action('woocommerce_cart_contents');
                    ?>

                </div>
                <div class="actions update-cart"><button type="submit" class="button update_cart" name="update_cart" value="<?php esc_attr_e('Update Cart', 'motohero'); ?>">
                                                                <!--<em class="fa-icon"><i class="fa fa-refresh"></i></em> -->
                        <?php esc_html_e('Update Cart', 'motohero'); ?></button></div>
            </div>         
            <?php do_action('woocommerce_cart_actions'); ?>

            <?php wp_nonce_field('woocommerce-cart'); ?>
            <?php do_action('woocommerce_after_cart_contents'); ?>

            <?php do_action('woocommerce_after_cart_table'); ?>
            <div class="clearfix"></div>
            <div class="cart-collaterals row">
                <?php if (WC()->cart->coupons_enabled()) { ?>
                    <div class="col-md-6">
                        <div class="woo-cart-coupon">
                            <div class="row-title woo-coupon-row theme-bg">
                                <div class=""><span><?php esc_attr_e('Coupon', 'motohero'); ?></span></div>
                            </div>
                            <div class="row-item woo-coupon-row">
                                <div class="item actions">
                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value=""
                                           placeholder="<?php esc_attr_e('Coupon code', 'motohero'); ?>"/>
                                    <input type="submit"
                                           class="button"
                                           name="apply_coupon"
                                           value="<?php esc_attr_e('Apply Coupon', 'motohero'); ?>"/>
                                           <?php do_action('woocommerce_cart_coupon'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>	

                <?php do_action('woocommerce_cart_collaterals'); ?>
            </div>
        </form>
        <div class="clearfix"></div>
        <?php do_action('woocommerce_after_cart'); ?>
    </div>
</div>