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
        $layout = get_option( 'wcgl_default_layout', 'grid' );

        if ( $layout === 'card' ) {
            wp_enqueue_style(
                'wcgl-card-style',
                plugin_dir_url('assets/css/card-layout.css', __FILE__ ),
                [],
                WCGL_VERSION
            );
        } else {
            wp_enqueue_style(
                'wcgl-grid-style',
                plugin_dir_url('assets/css/grid-layout.css', __FILE__ ),
                [],
                WCGL_VERSION
            );
        }

        wp_enqueue_style(
            'wcgl-base-styles',
            plugin_dir_url('assets/css/base.css', __FILE__ ),
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