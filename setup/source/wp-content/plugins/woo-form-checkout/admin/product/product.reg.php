<?php

function reg_is_checkout_by_form () {
  $args_checkbox = array(
    'label'       => __('Is Checkout By Form', 'woocommerce'),
    'placeholder' => __('', 'woocommerce'),
    'id'          => 'is-checkout-by-form',
    'cbvalue'     => '1',
    'name'        => 'is-checkout-by-form'
  );

  $args_input = array(
    'label'         => __('Checkout Slug', 'woocommerce'),
    'placeholder'   => __('Enter slug to checkout page', 'woocommerce'),
    'id'            => 'checkout-by-form-slug',
    'name'          => 'checkout-by-form-slug'
  );

  echo '<div class="product_custom_field">';
  woocommerce_wp_checkbox($args_checkbox);
  woocommerce_wp_text_input($args_input);
  echo '</div>';
}


add_action('woocommerce_product_options_general_product_data', 'reg_is_checkout_by_form');
add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
