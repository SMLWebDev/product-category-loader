<?php

namespace WCL;

class Plugin {
    public function run() {
        $this->load_dependencies();
        $this->init_hooks();
    }

    private function load_dependencies() {
        require_once WCL_PLUGIN_DIR . 'src/Shortcode.php';
        require_once WCL_PLUGIN_DIR . 'src/Assets.php';
        require_once WCL_PLUGIN_DIR . 'src/Ajax.php';
        require_once WCL_PLUGIN_DIR . 'src/Admin.php';
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