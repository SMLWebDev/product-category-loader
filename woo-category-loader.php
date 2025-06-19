<?php
/**
 * Plugin Name: Woo Category Loader
 * Description: Displays WooCommerce product categories. Includes a shortcode and admin settings.
 * Version: 1.0.0-beta.2-beta.1-beta.0-beta-beta
 * Author: Simon Lowe
 * Author URI: https://smlwebdevelopment.co.uk
 * Plugin URI: https://github.com/SMLWebDev/woo-category-grid-loader
 * Licence: MIT
 * Licence URI: https://opensource.org/licences/MIT
 * Text Domain: woo-category-loader
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit;
 }

 define( 'WCL_VERSION', '0.1.0-beta' );
 define( 'WCL_PLUGIN_FILE', __FILE__ );
 define( 'WCL_PLUGIN_DIR', plugin_dir_path( __FILE__ )  );
 define( 'WCL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );


 require_once WCL_PLUGIN_DIR . 'vendor/autoload.php';

 $plugin = new WCL\Plugin();
 $plugin->run();