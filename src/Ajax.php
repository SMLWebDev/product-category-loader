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

        $args = [
            'taxonomy'      => 'product_cat',
            'orderby'       => 'name',
            'order'         => 'ASC',
            'hide_empty'    => false,
            'number'        => $per_page,
            'offset'        => ($page - 1) * $per_page,
        ];

        $categories = get_terms( $args );

        if ( is_wp_error($categories) || empty( $categories ) ) {
            wp_send_json_error();
        }

        ob_start();

        foreach ( $categories as $category ) :
            $thumb_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
            $image = $thumb_id ? wp_get_attachment_url( $thumb_id ) : ( function_exists( 'wc_placeholder_img_src' ) ? wc_placeholder_img_src() : '' );
            $link = get_term_link($category);
            ?>

            <div class="wcgl-category">
                <a href="<?= esc_url( $link ) ?>">
                    <img src="<?= esc_url( $image ) ?>" alt="<?= esc_attr( $category->name ) ?>">
                    <h3><?= esc_html( $category->name ) ?></h3>
                </a>
            </div>

            <?php
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