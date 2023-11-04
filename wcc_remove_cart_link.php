<?php
/*
Plugin Name: Woocommerce Remove Cart Links
Plugin URI: https://bhavyasaggi.github.io/plugins/disable-bloat
Description: Remove Cart Links on default Woocommerce
Version: 0.1.0
Author: Bhavya Saggi
Author URI: https://bhavyasaggi.github.io/
License: MIT

------------------------------------------------------------------------

Copyright

*/

function wcc_remove_cart_link()
{
  // Woocommerce Remove Cart Hook
  remove_action('woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20);
  remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
  remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
  // Woocommerce Product Detail Page
  //
  remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
  //
  remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper');
  add_action('woocommerce_before_main_content', function () {
    $container = '<div id="container"><div id="content" role="main">';
    echo $container;
    ;
  });
  remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end');
  add_action('woocommerce_after_main_content', function () {
    $container = '</div></div>';
    echo $container;
  });
}

add_action('after_setup_theme', 'wcc_remove_cart_link');
?>