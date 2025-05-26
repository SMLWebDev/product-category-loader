<?php
/**
 * Plugin Name: Woo Category Grid Loader
 * Description: Displays WooCommerce product categories in a grid with a Load More button. Includes a shortcode and admin settings.
 * Version: 1.1.5
 * Author: Simon Lowe
 * Author URI: https://smlwebdevelopment.co.uk
 * Plugin URI: https://github.com/SMLWebDev/woo-category-grid-loader
 * Licence: MIT
 * Licence URI: https://opensource.org/licences/MIT
 * Text Domain: woo-category-grid-loader
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
 }

 define( 'WCGL_VERSION', '1.1.5' );
 define( 'WCGL_PLUGIN_FILE', __FILE__ );
 define( 'WCGL_PLUGIN_DIR', plugin_dir_path( __FILE__ )  );
 define( 'WCGL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

 require_once WCGL_PLUGIN_DIR . 'vendor/autoload.php';

 $plugin = new WCGL\Plugin();
 $plugin->run();