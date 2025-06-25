<?php

namespace PCL;

class Admin {
    public function __construct() {
        add_action('admin_menu', [$this, 'add_admin_page']);
        add_action('admin_init', [$this, 'add_settings_fields']); // Moved settings initialization here
    }

    public function add_settings_fields() {
        // Register setting with sanitization callback
        register_setting(
            'pcl_settings', 
            'pcl_dummy_option',
            [
                'sanitize_callback' => [$this, 'sanitize_dummy_option'],
                'default' => ''
            ]
        );

        // Add a settings section for support
        add_settings_section(
            'pcl_section_support',
            __('Support', 'product-category-loader'),
            function() {
                // Optional: Section description
            },
            'pcl_settings'
        );

        // Add the support field to the section
        add_settings_field(
            'pcl_support',
            __('Need Help?', 'product-category-loader'),
            function() {
                echo '
                <div class="pcl-support-links">
                    <p><a href="https://wordpress.org/support/plugin/product-category-loader/" target="_blank">WordPress Support Forum</a></p>
                    <p><a href="https://github.com/SMLWebDev/product-category-loader/issues" target="_blank">GitHub Issue Templates</a></p>
                </div>
                <style>
                    .pcl-support-links {
                        background: #f8f9fa;
                        padding: 1em;
                        border-left: 4px solid #3858e9;
                    }
                </style>';
            },
            'pcl_settings',
            'pcl_section_support'
        );
    }

    /**
     * Sanitize the dummy option value
     * 
     * @param mixed $input The input value
     * @return string Sanitized value
     */
    public function sanitize_dummy_option($input) {
        // Basic text field sanitization
        return sanitize_text_field($input);
    }

    public function add_admin_page() {
        add_menu_page(
            'Category Loader',
            'Category Loader',
            'manage_options',
            'pcl-main',
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
        <div class="pcl-admin-page">
            <div class="pcl-admin-page__header">
                <h1 class="pcl-admin-page__title">Product Category Loader</h1>

                <div class="pcl-admin-page__shortcode-panel">
                    <div class="pcl-card">
                        <strong>Shortcode</strong>
                        <p>Copy and paste this shortcode into your page:</p>
                        <code>[product_category_loader]</code>
                    </div>
                    <div class="pcl-card">
                        <strong>Template Include</strong>
                        <p>Copy and paste this snippet into your theme template:</p>
                        <code>&lt;?php echo do_shortcode('[product_category_loader]'); ?&gt;</code>
                    </div>
                </div>
            </div>

            

            <div class="pcl-generator">
                <p class="pcl-generator__title">Create your own shortcode by using the options below:</p>
                <div class="pcl-generator__row">
                    <label for="pcl_per_page">Products per page:</label>
                    <input type="number" id="pcl_per_page" name="pcl_per_page" value="6" min="1" max="100" />
                </div>

                <div class="pcl-generator__row">
                    <label for="pcl_columns">Columns:</label>
                    <input type="number" id="pcl_columns" name="pcl_columns" value="3" min="1" max="6" />
                </div>

                <div class="pcl-generator__row">
                    <label for="pcl_order">Order:</label>
                    <select name="pcl_order" id="pcl_order">
                        <option value="ASC" selected>Ascending</option>
                        <option value="DESC">Descending</option>
                    </select>
                </div>

                <div class="pcl-generator__row">
                    <label for="pcl_orderby">Order by:</label>
                    <select id="pcl_orderby" name="pcl_orderby">
                        <?php 
                            foreach ($orderby_options as $value => $label) :
                                ?>
                                <option value="<?php echo esc_attr($value) ?>" <?php echo selected($value, 'none', false) ?>><?php echo esc_html($label) ?></option>
                                <?php
                            endforeach;
                        ?>
                    </select>
                </div>

                <div class="pcl-generator__row">
                    <label for="pcl_hide_empty">Hide Empty Categories</label>
                    <input type="checkbox" id="pcl_hide_empty" name="pcl_hide_empty" value="1" checked />
                </div>

                <div class="pcl-generator__row">
                    <label for="pcl_layout_option">Choose your layout:</label>
                    <select name="pcl_layout_option" id="pcl_layout_option">
                        <option value="grid">Grid</option>
                        <option value="card">Card</option>
                    </select>
                </div>
            </div>

            <div class="pcl-generator-output">
                <label for="pcl_shortcode">Generated Shortcode:</label>
                <input type="text" class="pcl-generator-output__input" id="pcl_shortcode" readonly value="" />
                <button class="pcl-generator-output__generate">Generate Shortcode</button>
                <button class="pcl-generator-output__copy">Copy Shortcode</button>
            </div>

            <p><a href="https://github.com/SMLWebDev/woo-category-grid-loader/blob/main/ROADMAP.md" target="_blank">View plugin roadmap</a></p>
            <p>See any issues or want to request a feature, you can do so by clicking <a href="https://github.com/SMLWebDev/woo-category-grid-loader/issues" target="_blank">here</a></p>
             <p>Join the <a href="https://github.com/SMLWebDev/product-category-loader/discussions" target="_blank">GitHub Discussions</a> for tips and showcases!</p>
            <p>Plugin built and maintained by <a href="https://smlwebdevelopment.co.uk" target="_blank">SML Web Development</a>.</p>
        </div>
        <?php
    }
}
