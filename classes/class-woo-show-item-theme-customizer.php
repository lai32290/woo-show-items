<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require_once __DIR__ . "/class-plugin-base.php";

class WooShowItemThemeCustomizer extends PluginBase {
    public $slug;

    public function __construct($slug = '')
    {
        $this->slug = $slug;
        add_action('init', [$this, 'set_customizer']);
    }

    public function set_customizer() {
        if($this->get_option('show_single_product_price')) {
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
        }
    }
}
