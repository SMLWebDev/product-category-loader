<?php

namespace WCGL;

class Admin {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_admin_page' ] );
        add_action( 'admin_init', [ $this, 'register_settings' ] );
    }

    public function add_admin_page() {
        add_menu_page(
            'Category Grid Loader',
            'Category Grid Loader',
            'manage_options',
            'wcgl-main',
            [ $this, 'render_admin_page' ],
            'dashicons-grid-view',
            56
        );
    }

    public function register_settings() {
        register_setting( 'wcgl_settings_group', 'wcgl_default_layout' );
    }

    public function render_admin_page() {

        $orderby_options = [
            'name'        => 'Name',
            'slug'        => 'Slug',
            'count'       => 'Count',
            'term_id'     => 'Term ID',
            'description' => 'Description',
            'include'     => 'Include',
            'none'        => 'None',
        ];

        ?>
        <div class="wcgl-admin-page">
            <h1 class="wcgl-admin-page__title">Woo Category Grid Loader</h1>
            <p>Welcome to the Category Grid Loader plugin settings page.</p>

            <p>Use the options below to create your shortcode:</p>

            <div class="wcgl_shortcode_options">
                <form id="wcgl_generator" class="wcgl_generator" action="options.php">
                    <?php settings_fields('wcgl_settings_group'); ?>
                    <table class="form-table">
                        <tr>
                            <th><label for="wcgl_per_page">Products per page:</label></th>
                            <td><input type="number" id="wcgl_per_page" name="wcgl_per_page" value="6" min="1" max="100" /></td>
                        </tr>

                        <tr>
                            <th><label for="wcgl_columns">Columns:</label></th>
                            <td><input type="number" id="wcgl_columns" name="wcgl_columns" value="3" min="1" max="6" /></td>
                        </tr>

                        <tr>
                            <th><label for="wcgl_order">Order:</label></th>
                            <td><select name="wcgl_order" id="wcgl_order">
                                <option value="ASC" selected>Ascending</option>
                                <option value="DESC">Descending</option>
                            </select></td>
                        </tr>

                        <tr>
                            <th><label for="wcgl_orderby">Order by:</label></th>
                            <td><select id="wcgl_orderby" name="wcgl_orderby">
                                <?php 
                                    foreach ($orderby_options as $value => $label) :
                                        ?>
                                        <option value="<?= esc_attr($value) ?>" <?= selected($value, 'none', false) ?>><?= esc_html($label) ?></option>
                                        <?php
                                    endforeach;
                                ?>
                            </select></td>
                        </tr>
                        <tr>
                            <th><label for="wcgl_layout_option">Choose your layout:</label></th>
                            <td>
                                <select name="wcgl_layout_option" id="wcgl_layout_option">
                                    <option value="grid" <?php selected( get_option( 'wcgl_default_layout' ), 'grid' ) ?>>Grid</option>
                                    <option value="card" <?php selected( get_option( 'wcgl_default_layout' ), 'card' ) ?>>card</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

            <div class="wcgl_generate_shortcode">
                <table>
                    <tr>
                        <th>Shortcode:</th>
                        <td><input type="text" class="wcgl-admin-page__shortcode" id="wcgl_shortcode" readonly value="" >
                        <button class="wcgl_generate">Generate Shortcode</button>
                        <button class="btn wcgl_shortcode_copy">Copy Shortcode</button></td>
                    </tr>
                </table>
            </div>

            <p><a href="https://github.com/SMLWebDev/woo-category-grid-loader/blob/main/ROADMAP.md" target="_blank">View plugin roadmap</a></p>
            <p>Plugin built and maintained by <a href="https://smlwebdevelopment.co.uk" target="_blank">SML Web Development</a>.</p>
        </div>
        <?php
    }
}