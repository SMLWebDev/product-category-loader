<?php
namespace PCL;

class Ajax {
    public function register() {
        add_action('wp_ajax_load_product_categories', [$this, 'load_product_categories']);
        add_action('wp_ajax_nopriv_load_product_categories', [$this, 'load_product_categories']);
    }

    public function load_product_categories() {
        check_ajax_referer('pcl_nonce', 'nonce');

        $args = [
            'taxonomy'   => 'product_cat',
            'orderby'    => sanitize_text_field(wp_unslash($_POST['orderby'] ?? 'name')),
            'order'      => sanitize_text_field(wp_unslash($_POST['order'] ?? 'ASC')),
            'hide_empty' => isset($_POST['hide_empty']) ? $_POST['hide_empty'] === '1' : false,
            'number'     => absint($_POST['per_page'] ?? 6),
            'offset'     => (absint($_POST['page'] ?? 1) - 1) * absint($_POST['per_page'] ?? 6)
        ];

        $categories = get_terms($args);
        if (empty($categories) || is_wp_error($categories)) {
            wp_send_json_error();
        }

        ob_start();
        foreach ($categories as $category) {
            include PCL_PLUGIN_DIR . 'templates/partials/category-item.php';
        }
        $html = ob_get_clean();

        wp_send_json_success([
            'html' => $html,
            'has_more' => $this->has_more_categories($args)
        ]);
    }

    private function has_more_categories($args) {
        $count_args = [
            'taxonomy' => 'product_cat',
            'hide_empty' => $args['hide_empty']
        ];
        $total = wp_count_terms($count_args);
        return ($args['offset'] + $args['number']) < $total;
    }
}