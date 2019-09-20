<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $post, $product;
$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
$full_size_image   = wp_get_attachment_image_src( $post_thumbnail_id, 'full' );
$image_title       = get_post_field( 'post_excerpt', $post_thumbnail_id );
$placeholder       = has_post_thumbnail() ? 'with-images' : 'without-images';
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
    'woocommerce-product-gallery',
    'woocommerce-product-gallery--' . $placeholder,
    'woocommerce-product-gallery--columns-' . absint( $columns ),
    'images',
) );
?>

<div class="images <?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>">
    <?php do_action( 'woocommerce_showproduct_newlabel' ); ?>
    <?php
    if ( has_post_thumbnail() ) {
        $attachment_count = count( $product->get_gallery_image_ids() );
        $gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
        $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
        $attributes =  array(
            'title'	 => $props['title'],
            'alt'    => $props['alt'],
        );

        $image = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), $attributes);

        $html = '<div data-thumb="' . get_the_post_thumbnail_url( $post->ID, 'shop_thumbnail' ) . '" class="woocommerce-product-gallery__image">';
        $html .= sprintf(
                '<a rel="example_group" href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a>',
                esc_url( $props['url'] ),
                esc_attr( $props['caption'] ),
                $gallery,
                $image
            );
        $html .= '</div>';

    } else {
        $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
        $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Placeholder', 'motohero' ) );
        $html .= '</div>';
    }

    echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, get_post_thumbnail_id( $post->ID ) );
    ?>

    <?php do_action( 'woocommerce_product_thumbnails' ); ?>

</div>
