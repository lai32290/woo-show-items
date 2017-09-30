<?php

if ( ! defined('ABSPATH') ) exit;

class PluginBase {
    public function renderView($view, $values = [])
    {
        extract($values);
        require_once $view;
    }

    public function get_option($option)
    {
        $slug = isset($this->slug) ? $this->slug : '';
        return get_option($slug . $option);
    }

    public function update_option($option, $value)
    {
        $slug = isset($this->slug) ? $this->slug : '';
        update_option($slug . $option, $value);
    }
}