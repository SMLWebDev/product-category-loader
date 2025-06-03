<?php

namespace WCGL;

class Ajax {
    public function register() {
        add_action( 'wp_ajax_load_product_categories', [ $this, 'load_product_categories' ] );
        add_action( 'wp_ajax_nopriv_load_product_categories', [ $this, 'load_product_categories' ]  );
    }

    public function load_product_categories() {
        if ( ! function_exists( 'check_ajax_referer' ) ) {
            require_once ABSPATH . 'wp-includes/pluggable.php';
        }
        check_ajax_referer( 'wcgl_nonce', 'nonce' );

        $page = isset($_POST['page']) ? absint($_POST['page']) : 1;
        $per_page = isset($_POST['per_page']) ? absint($_POST['per_page']) : 6;
        $orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : 'name';
        $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'ASC';
        $layout = isset($_POST['layout']) ? sanitize_file_name($_POST['layout']) : 'grid';

        $args = [
            'taxonomy'      => 'product_cat',
            'orderby'       => $orderby,
            'order'         => $order,
            'hide_empty'    => false,
            'number'        => $per_page,
            'offset'        => ($page - 1) * $per_page,
            'layout'        => $layout,
        ];

        $categories = get_terms( $args );

        if ( is_wp_error($categories) || empty( $categories ) ) {
            wp_send_json_error();
        }

        ob_start();

        foreach ( $categories as $category ) :
            
            include WCGL_PLUGIN_DIR . '../templates/partials/category-item.php';

        endforeach;

        $html = ob_get_clean();

        $total_categories = wp_count_terms('product_cat', ['hide_empty' => false]);
        $has_more = ($page * $per_page) < $total_categories;

        wp_send_json_success([
            'html' => $html,
            'has_more' => $has_more,
        ]);
    }
}