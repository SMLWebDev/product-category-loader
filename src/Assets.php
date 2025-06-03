<?php

namespace WCGL;

use function PHPSTORM_META\map;

class Assets {
    public function register() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ], 1000 );
        add_action( 'enqueue_block_editor_styles', [ $this, 'enqueue_frontend_assets' ], 1000 );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
    }

    public function enqueue_frontend_assets() {
        wp_enqueue_style(
            'wcgl-frontend',
            WCGL_PLUGIN_URL . 'assets/css/frontend.css',
            [],
            WCGL_VERSION
        );

        wp_enqueue_script(
            'wcgl-frontend',
            WCGL_PLUGIN_URL . 'assets/js/frontend.js',
            ['jquery'],
            WCGL_VERSION,
            true
        );

        wp_localize_script( 'wcgl-frontend', 'wcgl_ajax', [
            'ajax_url'  => admin_url('admin-ajax.php'),
            'nonce'     => wp_create_nonce('wcgl_nonce'),
        ] );

        wp_localize_script( 'wcgl-frontend', 'wcgl_settings', [
            'per_page'  => 6,
        ] );
    }

    public function enqueue_admin_assets($hook_suffix) {

        if ($hook_suffix !== 'toplevel_page_wcgl-main') {
            return;
        }

        wp_enqueue_style(
            'wcgl-admin',
            WCGL_PLUGIN_URL . 'assets/css/admin.css',
            [],
            WCGL_VERSION
        );

        wp_enqueue_script(
            'wcgl-admin',
            WCGL_PLUGIN_URL . 'assets/js/admin.js',
            ['jquery'],
            WCGL_VERSION,
            true
        );
    }
}