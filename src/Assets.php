<?php

namespace WCL;

use function PHPSTORM_META\map;

class Assets {
    public function register() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ], 1000 );
        add_action( 'enqueue_block_editor_styles', [ $this, 'enqueue_frontend_assets' ], 1000 );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
    }

    public function enqueue_frontend_assets() {
        
        wp_enqueue_style(
            'wcl-base-styles',
            WCL_PLUGIN_URL . 'assets/css/base.css',
            [],
            WCL_VERSION
        );        

        wp_enqueue_script(
            'wcl-frontend',
            WCL_PLUGIN_URL . 'assets/js/frontend.js',
            ['jquery'],
            WCL_VERSION,
            true
        );

        wp_localize_script( 'wcl-frontend', 'wcl_ajax', [
            'ajax_url'  => admin_url('admin-ajax.php'),
            'nonce'     => wp_create_nonce('wcl_nonce'),
        ] );

        wp_localize_script( 'wcl-frontend', 'wcl_settings', [
            'per_page'  => 6,
        ] );
    }

    public function enqueue_admin_assets($hook_suffix) {

        if ($hook_suffix !== 'toplevel_page_wcl-main') {
            return;
        }

        wp_enqueue_style(
            'wcl-admin',
            WCL_PLUGIN_URL . 'assets/css/admin.css',
            [],
            WCL_VERSION
        );

        wp_enqueue_script(
            'wcl-admin',
            WCL_PLUGIN_URL . 'assets/js/admin.js',
            ['jquery'],
            WCL_VERSION,
            true
        );
    }
}