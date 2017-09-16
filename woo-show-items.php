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

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if (is_front_page()) {
    die("fjdajfidjid");
}

require __DIR__ . "/classes/class-woo-show-item-theme-customizer.php";

class WooShowItems {
    public static $instance;
    public static $slug;
    public static $fields;

    public static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new WooShowItems();
        }

        return self::$instance;
    }

    public function __construct() {
        self::$slug = 'woosi_';
        self::$fields = [
            'show_single_product_price' => [
                'name' => 'show_single_product_price',
                'type' => 'checkbox'
            ]
        ];

        add_action('admin_menu', [$this, 'createMenu']);
        add_action('admin_menu', [$this, 'createSubmenu']);
    }

    public function createMenu() {
        add_menu_page('WooShowItems', 'WooShowItems', 'manage_options', 'woo_show_items_config');
    }

    public function createSubmenu() {
        add_submenu_page('woo_show_items_config',
            'WooShowItems',
            'WooShowItems',
            'manage_options',
            'woo_show_items_config',
            [$this, 'createSettingsPage']
        );
    }

    public function createSettingsPage()
    {
        $this->saveSettings();
        require 'template/settings_page.php';
    }

    public function saveSettings() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            foreach(self::$fields as $field) {
                $value = $_POST[$field['name']];

                if($field['type'] === 'checkbox') {
                    $value = empty($value) ? 'false' : $value;
                }

                $this->update_option($field['name'], $value);
            }
        }
    }

    public function update_option($field, $value) {
        echo $field . ' = ' . $value;
        echo $this->get_option($field);
        $field = self::$slug . $field;
        update_option($field, $value);
    }

    private function get_option($field) {
        $field = self::$slug . $field;
        return get_option($field);
    }

    public function __call($name, $arguments) {
        $prop = preg_replace("/^opt_/", "", $name);

        if(preg_match("/^opt_.*$/", $name)) {
            return $this->get_option($prop);
        }
    }
}

WooShowItems::getInstance();
