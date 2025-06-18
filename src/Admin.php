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
            'manage_options',
            'wcgl-main',
            [ $this, 'render_admin_page' ],
            'dashicons-grid-view',
            56
        );
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
            <div class="wcgl-admin-page__header">
                <h1 class="wcgl-admin-page__title">Woo Category Grid Loader</h1>

                <div class="wcgl-admin-page__shortcode-panel">
                    <div class="wcgl-card">
                        <strong>Shortcode</strong>
                        <p>Copy and paste this shortcode into your page:</p>
                        <code>[woo_category_grid]</code>
                    </div>
                    <div class="wcgl-card">
                        <strong>Template Include</strong>
                        <p>Copy and paste this snippet into your theme template:</p>
                        <code>&lt;?php echo do_shortcode('[woo_category_grid]'); ?&gt;</code>
                    </div>
                </div>
            </div>

            

            <div class="wcgl-generator">
                <p class="wcgl-generator__title">Create your own shortcode by using the options below:</p>
                <div class="wcgl-generator__row">
                    <label for="wcgl_per_page">Products per page:</label>
                    <input type="number" id="wcgl_per_page" name="wcgl_per_page" value="6" min="1" max="100" />
                </div>

                <div class="wcgl-generator__row">
                    <label for="wcgl_columns">Columns:</label>
                    <input type="number" id="wcgl_columns" name="wcgl_columns" value="3" min="1" max="6" />
                </div>

                <div class="wcgl-generator__row">
                    <label for="wcgl_order">Order:</label>
                    <select name="wcgl_order" id="wcgl_order">
                        <option value="ASC" selected>Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>

                <div class="wcgl-generator__row">
                    <label for="wcgl_orderby">Order by:</label>
                    <select id="wcgl_orderby" name="wcgl_orderby">
                        <?php 
                            foreach ($orderby_options as $value => $label) :
                                ?>
                                <option value="<?= esc_attr($value) ?>" <?= selected($value, 'none', false) ?>><?= esc_html($label) ?></option>
                                <?php
                            endforeach;
                        ?>
                    </select>
                </div>

                <div class="wcgl-generator__row">
                    <label for="wcgl_hide_empty">Hide Empty Categories</label>
                    <input type="checkbox" id="wcgl_hide_empty" name="wcgl_hide_empty" value="1" checked />
                </div>

                <div class="wcgl-generator__row">
                    <label for="wcgl_layout_option">Choose your layout:</label>
                    <select name="wcgl_layout_option" id="wcgl_layout_option">
                        <option value="grid">Grid</option>
                        <option value="card">Card</option>
                    </select>
                </div>
            </div>

            <div class="wcgl-generator-output">
                <label for="wcgl_shortcode">Generated Shortcode:</label>
                <input type="text" class="wcgl-generator-output__input" id="wcgl_shortcode" readonly value="" />
                <button class="wcgl-generator-output__generate">Generate Shortcode</button>
                <button class="wcgl-generator-output__copy">Copy Shortcode</button>
            </div>

            <p><a href="https://github.com/SMLWebDev/woo-category-grid-loader/blob/main/ROADMAP.md" target="_blank">View plugin roadmap</a></p>
            <p>See any issues or want to request a feature, you can do so by clicking <a href="https://github.com/SMLWebDev/woo-category-grid-loader/issues" target="_blank">here</a></p>
            <p>Plugin built and maintained by <a href="https://smlwebdevelopment.co.uk" target="_blank">SML Web Development</a>.</p>
        </div>
        <?php
    }
}
