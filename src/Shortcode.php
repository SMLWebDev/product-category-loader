<?php

namespace PCL;

if ( ! defined( 'ABSPATH' ) ) exit;

class Shortcode {
    public function register() {
        add_shortcode( 'pcl_category_loader', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $atts ) {
        $atts = shortcode_atts([
            'per_page'      => 6,
            'columns'       => 3,
            'orderby'       => 'name',
            'order'         => 'ASC',
            'hide_empty'    => true,
            'layout'        => 'grid'
        ], $atts);

        if (is_string($atts['hide_empty'])) {
            $atts['hide_empty'] = filter_var($atts['hide_empty'], FILTER_VALIDATE_BOOLEAN);
        }

        $layout = $atts['layout'];

        if ( $layout === 'card' ) {
            wp_enqueue_style(
                'pcl-card-style',
                PCL_PLUGIN_URL . 'assets/css/card-layout.css',
                [],
                PCL_VERSION
            );
        } else {
            wp_enqueue_style(
                'pcl-grid-style',
                PCL_PLUGIN_URL . 'assets/css/grid-layout.css',
                [],
                PCL_VERSION
            );
        }

        ob_start();
        echo wp_kses_post( $this->render_template( $atts ) );
        return ob_get_clean();
    }

    public function render_template( $atts ) {

        $layout = sanitize_file_name( $atts['layout'] );
        $template_path = PCL_PLUGIN_DIR . "templates/{$layout}-template.php";

        if ( file_exists( $template_path ) ) {
            include $template_path;
        } else {
            echo '<p class="pcl-error">Invalid layout specified.</p>';
        };
    }
}