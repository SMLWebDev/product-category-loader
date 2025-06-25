<?php

namespace PCL;

use function PHPSTORM_META\map;

class Assets {
    public function register() {
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_frontend_assets' ], 1000 );
        add_action( 'enqueue_block_editor_styles', [ $this, 'enqueue_frontend_assets' ], 1000 );
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ] );
    }

    public function enqueue_frontend_assets() {
        
        wp_enqueue_style(
            'pcl-base-styles',
            PCL_PLUGIN_URL . 'assets/css/base.css',
            [],
            PCL_VERSION
        );        

        wp_enqueue_script(
            'pcl-frontend',
            PCL_PLUGIN_URL . 'assets/js/frontend.js',
            ['jquery'],
            PCL_VERSION,
            true
        );

        wp_localize_script( 'pcl-frontend', 'pcl_ajax', [
            'ajax_url'  => admin_url('admin-ajax.php'),
            'nonce'     => wp_create_nonce('pcl_nonce'),
        ] );

        wp_localize_script( 'pcl-frontend', 'pcl_settings', [
            'per_page'  => 6,
        ] );
    }

    public function enqueue_admin_assets($hook_suffix) {

        if ($hook_suffix !== 'toplevel_page_pcl-main') {
            return;
        }

        wp_enqueue_style(
            'pcl-admin',
            PCL_PLUGIN_URL . 'assets/css/admin.css',
            [],
            PCL_VERSION
        );

        wp_enqueue_script(
            'pcl-admin',
            PCL_PLUGIN_URL . 'assets/js/admin.js',
            ['jquery'],
            PCL_VERSION,
            true
        );
    }
}