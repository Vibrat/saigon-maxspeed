<?php
/**
 *  - Add two meta data for categories
 */
add_action('product_cat_add_form_fields', 'wh_taxonomy_add_new_meta_field', 10, 1);
add_action('product_cat_edit_form_fields', 'wh_taxonomy_edit_meta_field', 10, 1);

//Product Cat Create Page
function wh_taxonomy_add_new_meta_field() {
    ?>   
    <div class="form-field">
        <label for="is_custom_checkout"><?php _e('Allow Custom Checkout', 'wh'); ?></label>
        <input type="checkbox" name="is_custom_checkout" id="is_custom_checkout" value="1" />
    </div>
    <div class="form-field">
        <label for="custom_checkout_page"><?php _e('Checkout Page', 'wh'); ?></label>
        <input type="text" name="custom_checkout_page" />
    </div>
    <?php
}

//Product Cat Edit Page
function wh_taxonomy_edit_meta_field($term) {
    //getting term ID
    $term_id = $term->term_id;
    // retrieve the existing value(s) for this meta field.
    $wh_is_custom_checkout = get_term_meta($term_id, 'is_custom_checkout', true);
    $wh_custom_checkout_page = get_term_meta($term_id, 'custom_checkout_page', true);
    ?>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="is_custom_checkout"><?php _e('Allow Custom Checkout', 'wh'); ?></label></th>
        <td>
            <input type="checkbox" name="is_custom_checkout" id="is_custom_checkout" value="1" <?php checked(1, $wh_is_custom_checkout, true); ?> />
        </td>
    </tr>
    <tr class="form-field">
        <th scope="row" valign="top"><label for="custom_checkout_page"><?php _e('Custom Checkout Page', 'wh'); ?></label></th>
        <td>
            <input type="text" name="custom_checkout_page" id="custom_checkout_page" value="<?php _e( $wh_custom_checkout_page ? $wh_custom_checkout_page : "", 'wh'); ?>"/>
        </td>
    </tr>
    <?php
}