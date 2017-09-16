<?php

class WooShowItemThemeCustomizer {
    public static $instance;

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new WooShowItemThemeCustomizer(); 
        }

        return self::$instance;
    }

    public function set_customizer(WooShowItems $wooShowItems) {
        if($wooShowItems->opt_show_single_product_price()) {
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price');
            remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
        }
    }
}
