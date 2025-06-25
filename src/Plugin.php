<?php
namespace PCL;

class Plugin {
    public function run() {
        $this->define_constants();
        $this->load_dependencies();
        $this->init_hooks();
    }

    // Add this new method
    private function define_constants() {
        if (!defined('PCL_VERSION')) {
            define('PCL_VERSION', '1.0.0');
        }
    }

    private function load_dependencies() {
        require_once PCL_PLUGIN_DIR . 'src/Shortcode.php';
        require_once PCL_PLUGIN_DIR . 'src/Assets.php';
        require_once PCL_PLUGIN_DIR . 'src/Ajax.php';
        require_once PCL_PLUGIN_DIR . 'src/Admin.php';
    }

    private function init_hooks() {
        $assets = new Assets();
        $assets->register();

        $shortcode = new Shortcode();
        $shortcode->register();

        $ajax = new Ajax();
        $ajax->register();

        if (is_admin()) {
            new Admin();
        }
    }
}