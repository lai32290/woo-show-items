<?php

if ( ! defined( 'ABSPATH' ) ) exit;

require_once __DIR__ . "/class-plugin-base.php";

class WooShowItemAdminPanel extends PluginBase {
    private static $menu_id = 'woo_show_item_config';
    private static $fields = [
        "show_single_product_price"
    ];
    public $slug;

    public function __construct($slug = '')
    {
        $this->slug = $slug;
        add_action('admin_menu', [$this, 'menu']);
    }

    public function menu() {
        add_menu_page('WooShowItem', 'WooShowItem', 'manage_options', self::$menu_id);
        add_submenu_page(
            self::$menu_id,
            'WooShowItem',
            'WooShowItem',
            'manage_options',
            self::$menu_id,
            [$this, 'load_page']
            );
    }

    public function load_page()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->update();
        }

        $this->page();
    }

    public function update() {
        $values = array_reduce(self::$fields, function ($curr, $next) {
            if (isset($_POST[$next])) {
                $curr[$next] = $_POST[$next];
            }
            return $curr;
        }, []);

        $values["show_single_product_price"] = isset($_POST["show_single_product_price"]);

        foreach ($values as $key => $value) {
            $this->update_option($key, $value);
        }
    }

    public function page() {
        $values = $this->get_values();

        $this->renderView(__DIR__ . "/../template/settings_page.php", $values);
    }

    public function get_values() {
        return array_reduce(self::$fields, function ($curr, $next) {
            $curr[$next] = $this->get_option($next);
            return $curr;
        }, []);
    }
}