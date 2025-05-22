<?php

namespace WCGL;

class Admin {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_menu_page' ] );
    }

    public function add_menu_page() {
        add_submenu_page(
            'options-general.php',
            __('Woo Category Grid Loader', 'woo-category-grid-loader'),
            __('Category Grid Loader', 'woo-category-grid-loader'),
            'manage_options',
            'wcgl-settings',
            [ $this, 'render_settings_page' ]
        );
    }

    public function render_settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('Woo Category Grid Loader', 'woo-category-grid-loader'); ?></h1>
            <p><?php esc_html_e('Use the shortcode below to embed a grid of WooCommercer categories.', 'woo-category-grid-loader'); ?></p>

            <code>[woo_category_grid per_page="6" columns="3"]</code>

            <h3><?php esc_html_e('Shortcode Attributes', 'woo-category-grid-loader'); ?></h3>
            <ul>
                <li><strong>per_page</strong>: <?php esc_html_e('Number of categories to load per page. Default is 6.', 'woo-category-grid-loader'); ?></li>
                <li><strong>columns</strong>: <?php esc_html_e('Number of columns in the grid. Default is 3.', 'woo-category-grid-loader'); ?></li>
            </ul>
        </div>
        <?php
    }
}