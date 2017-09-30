<?php
/*
Plugin Name: WooShowItems
Plugin URI:
Author: LXuancheng
Version: 0.0.1
License: GPL2
Text Domain: woo_show_items
Description: You can disable some WooCommerce's item using this plugin
*/

if ( ! defined( 'ABSPATH' ) ) exit;

require __DIR__ . "/classes/class-woo-show-item.php";

add_action('init', 'customizing_fields');

function customizing_fields()
{
//    remove_action( 'storefront_header', 'storefront_header_cart', 60);
//    remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
//    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
//    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
//    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
}