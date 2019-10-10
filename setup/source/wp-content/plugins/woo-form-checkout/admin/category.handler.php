<?php
add_action('edited_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);
add_action('create_product_cat', 'wh_save_taxonomy_custom_meta', 10, 1);

// Save extra taxonomy fields callback function.
function wh_save_taxonomy_custom_meta($term_id) {
    $wh_is_custom_checkout = filter_input(INPUT_POST, 'is_custom_checkout');
    $wh_custom_checkout_page = filter_input(INPUT_POST, 'custom_checkout_page');
    update_term_meta($term_id, 'is_custom_checkout', $wh_is_custom_checkout);
    update_term_meta($term_id, 'custom_checkout_page', $wh_custom_checkout_page);
}