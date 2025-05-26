<?php

namespace WCGL;

class Admin {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_admin_page' ] );
    }

    public function add_admin_page() {
        add_menu_page(
            'Category Grid Loader',
            'Category Grid Loader',
            'manage options',
            'wcgl-main',
            [ $this, 'render_admin_page' ],
            'dashicons-grid-view',
            56
        );
    }

    public function render_admin_page() {
        ?>
        <div class="wrap">
            <h1>Woo Category Grid Loader</h1>
            <p>Welcome to the Category Grid Loader plugin settings page.</p>

            <h2>Shortcode Usage</h2>
            <code>[woo_category_grid per_page="6" columns="3"]</code>
            <p>
                <strong>Parameters:</strong>
                <code>per_page</code> - Number of categories to disaplay per page (default: 6)<br>
                <code>columns</code> - Number of columns to display (default: 3)
            </p>

            <p><a href="https://github.com/SMLWebDev/woo-category-grid-loader/blob/main/ROADMAP.md" target="_blank">View plugin roadmap</a></p>
        </div>
        <?php
    }
}