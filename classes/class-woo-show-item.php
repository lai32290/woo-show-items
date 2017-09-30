<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require __DIR__ . "/class-woo-show-item-admin-panel.php";
require __DIR__ . "/class-woo-show-item-theme-customizer.php";

class Woo_Show_Item {
    public static $instance;
    public $slug = "woosi_";

    public static function getInstante()
    {
        if(self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        new WooShowItemAdminPanel($this->slug);
        new WooShowItemThemeCustomizer($this->slug);
    }
}

Woo_Show_Item::getInstante();