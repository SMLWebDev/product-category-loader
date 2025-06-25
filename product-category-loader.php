<?php
/**
 * Plugin Name: Product Category Loader
 * Description: Displays WooCommerce product categories. Includes a shortcode and admin settings.
 * Version: 1.0.0
 * Author: Simon Lowe
 * Author URI: https://smlwebdevelopment.co.uk
 * Plugin URI: https://github.com/SMLWebDev/woo-category-grid-loader
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: product-category-loader
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('PCL_VERSION', '1.0.0');
define('PCL_PLUGIN_FILE', __FILE__);
define('PCL_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('PCL_PLUGIN_URL', plugin_dir_url(__FILE__));

// Load the main plugin class
require_once PCL_PLUGIN_DIR . 'src/Plugin.php';

// Initialize the plugin
add_action('plugins_loaded', function() {
    // Check if WooCommerce is active
    if (!class_exists('WooCommerce')) {
        add_action('admin_notices', function() {
            echo '<div class="error"><p>' . esc_html__('Product Category Loader requires WooCommerce to be installed and activated.', 'product-category-loader') . '</p></div>';
        });
        return;
    }
    
    $plugin = new PCL\Plugin();
    $plugin->run();
}, 10);