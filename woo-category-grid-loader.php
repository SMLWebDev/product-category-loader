<?php
/**
 * Plugin Name: Woo Category Grid Loader
 * Description: Adds a shortcode [ajax_product_category] to display product categories with pagination.
 * Version: 1.0.0
 * Author: Simon Lowe
 * Author URI: https://smlwebdevelopment.co.uk
 * Plugin URI: https://github.com/SMLWebDev/woo-category-grid-loader
 * GitHub Plugin URI: https://github.com/SMLWebDev/woo-category-grid-loader
 * GitHub Issues: https://github.com/SMLWebDev/woo-category-grid-loader/issues
 * License: MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: woo-category-grid-loader
 */

 defined( 'ABSPATH' ) || exit;


 // Shortcode handler
 add_shortcode( 'ajax_product_categories', function($atts) {

    $atts = shortcode_atts([
        'columns'   => 3, // number per row
        'per_page'  => 6, // number of categories to load
        'class'     => '', // optional custom class for the wrapper
    ], $atts, 'ajax_product_categories');

    wp_localize_script('wcgl-script', 'wcgl_settings', [
        'columns'   => (int) $atts['columns'],
        'per_page'  => (int) $atts['per_page'],
    ]);

    ob_start();
    ?>
    <div id="category-grid class="category-grid <?= esc_attr($atts['class']) ?>"></div>
    <div class="" id="load-more-wrapper" style="text-align:center; margin-top:20px;">
        <button id="load-more-categories" data-page="1">Load More...</button>
    </div>
    <?php
        return ob_get_clean();
 });

 // Enqueue scripts and styles
 add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'wcgl-style', plugin_dir_url(__FILE__) . 'style.css' );
    wp_enqueue_script( 'wcgl-script', plugin_dir_url(__FILE__) . 'script.js', ['jquery'], false, true );
    wp_localize_script( 'wcgl-script', 'wcgl-ajax', [
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce' => wp_create_nonce( 'load_more_cats' )
    ] );
 } );

 // AJAX handler
 add_action( 'wp_ajax_load_product_categories', 'wcgl_load_product_categories' );
 add_action( 'wp_ajax_nopriv_load_product_categories', 'wcgl_load_product_categories' );
 function wcgl_load_product_categories() {
    check_ajax_referer( 'load_categories_nonce', 'nonce' );

    $paged = intval( $_POST['page'] );
    $per_page = intval( $_POST['per_page'] ) ? min(intval( $_POST['per_page'] ), 50) : 6;

    $args = [
        'taxonomy'      => 'product_cat',
        'orderby'       => 'name',
        'hide_empty'    => false,
        'number'        => $per_page,
        'offset'        => ($paged - 1) * $per_page,
    ];

    $categories = get_terms($args);

    if ( empty($categories) || is_wp_error( $categories ) ) {
        wp_send_json_error( 'No categories found' );
    }

    ob_start();
    foreach ( $categories as $category ) :
        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
        $image_url = wp_get_attachment_url($thumbnail_id);
        ?>
        <div class="category-card">
            <a href="<?= esc_url(get_term_link($category)) ?>">
                <img src="<?= esc_url($image_url) ?: wc_placeholder_img_src() ?>" alt="<?= esc_attr($category->name) ?>">
                <h3><?= esc_html($category->name) ?></h3>
            </a>
        </div>
    <?php endforeach;

    $html = ob_get_clean();

    wp_send_json_success($html);

 }
