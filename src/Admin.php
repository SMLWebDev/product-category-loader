<?php

namespace WCL;

class Admin {
    public function __construct() {
        add_action( 'admin_menu', [ $this, 'add_admin_page' ] );
        add_action( 'admin_init', [ $this, 'add_settings_fields' ] );
    }

    public function add_settings_fields() {
        add_settings_field(
            'wcl_support',
            __('Need Help?', 'woo-category-loader'),
            function() {
                echo '
                <div class="wcl-support-links">
                    <p><a href="https://wordpress.org/support/plugin/woo-category-loader/" target="_blank">WordPress Support Forum</a></p>
                    <p><a href="https://github.com/your-repo/issues/new/choose" target="_blank">GitHub Issue Templates</a></p>
                </div>
                <style>
                    .wcl-support-links {
                        background: #f8f9fa;
                        padding: 1em;
                        border-left: 4px solid #3858e9;
                    }
                </style>';
            },
            'wcl_settings',
            'wcl_section_support'
        )
    }

    public function add_admin_page() {
        add_menu_page(
            'Category Loader',
            'Category Loader',
            'manage_options',
            'wcl-main',
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
        <div class="wcl-admin-page">
            <div class="wcl-admin-page__header">
                <h1 class="wcl-admin-page__title">Woo Category Loader</h1>

                <div class="wcl-admin-page__shortcode-panel">
                    <div class="wcl-card">
                        <strong>Shortcode</strong>
                        <p>Copy and paste this shortcode into your page:</p>
                        <code>[woo_category_loader]</code>
                    </div>
                    <div class="wcl-card">
                        <strong>Template Include</strong>
                        <p>Copy and paste this snippet into your theme template:</p>
                        <code>&lt;?php echo do_shortcode('[woo_category_loader]'); ?&gt;</code>
                    </div>
                </div>
            </div>

            

            <div class="wcl-generator">
                <p class="wcl-generator__title">Create your own shortcode by using the options below:</p>
                <div class="wcl-generator__row">
                    <label for="wcl_per_page">Products per page:</label>
                    <input type="number" id="wcl_per_page" name="wcl_per_page" value="6" min="1" max="100" />
                </div>

                <div class="wcl-generator__row">
                    <label for="wcl_columns">Columns:</label>
                    <input type="number" id="wcl_columns" name="wcl_columns" value="3" min="1" max="6" />
                </div>

                <div class="wcl-generator__row">
                    <label for="wcl_order">Order:</label>
                    <select name="wcl_order" id="wcl_order">
                        <option value="ASC" selected>Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>

                <div class="wcl-generator__row">
                    <label for="wcl_orderby">Order by:</label>
                    <select id="wcl_orderby" name="wcl_orderby">
                        <?php 
                            foreach ($orderby_options as $value => $label) :
                                ?>
                                <option value="<?= esc_attr($value) ?>" <?= selected($value, 'none', false) ?>><?= esc_html($label) ?></option>
                                <?php
                            endforeach;
                        ?>
                    </select>
                </div>

                <div class="wcl-generator__row">
                    <label for="wcl_hide_empty">Hide Empty Categories</label>
                    <input type="checkbox" id="wcl_hide_empty" name="wcl_hide_empty" value="1" checked />
                </div>

                <div class="wcl-generator__row">
                    <label for="wcl_layout_option">Choose your layout:</label>
                    <select name="wcl_layout_option" id="wcl_layout_option">
                        <option value="grid">Grid</option>
                        <option value="card">Card</option>
                    </select>
                </div>
            </div>

            <div class="wcl-generator-output">
                <label for="wcl_shortcode">Generated Shortcode:</label>
                <input type="text" class="wcl-generator-output__input" id="wcl_shortcode" readonly value="" />
                <button class="wcl-generator-output__generate">Generate Shortcode</button>
                <button class="wcl-generator-output__copy">Copy Shortcode</button>
            </div>

            <p><a href="https://github.com/SMLWebDev/woo-category-grid-loader/blob/main/ROADMAP.md" target="_blank">View plugin roadmap</a></p>
            <p>See any issues or want to request a feature, you can do so by clicking <a href="https://github.com/SMLWebDev/woo-category-grid-loader/issues" target="_blank">here</a></p>
             <p>Join the <a href="https://github.com/SMLWebDev/woo-category-loader/discussions" target="_blank">GitHub Discussions</a> for tips and showcases!</p>
            <p>Plugin built and maintained by <a href="https://smlwebdevelopment.co.uk" target="_blank">SML Web Development</a>.</p>
        </div>
        <?php
    }
}
