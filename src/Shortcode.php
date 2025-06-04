<?php

namespace WCGL;

class Shortcode {
    public function register() {
        add_shortcode( 'woo_category_grid', [ $this, 'render_shortcode' ] );
    }

    public function render_shortcode( $atts ) {
        $atts = shortcode_atts([
            'per_page'  => 6,
            'columns'   => 3,
            'orderby'   => 'name',
            'order'     => 'ASC',
            'layout'    => 'grid'
        ], $atts);

        $layout = $atts['layout'];

        if ( $layout === 'card' ) {
            wp_enqueue_style(
                'wcgl-card-style',
                WCGL_PLUGIN_URL . 'assets/css/card-layout.css',
                [],
                WCGL_VERSION
            );
        } else {
            wp_enqueue_style(
                'wcgl-grid-style',
                WCGL_PLUGIN_URL . 'assets/css/grid-layout.css',
                [],
                WCGL_VERSION
            );
        }

        ob_start();
        echo $this->render_template( $atts );
        return ob_get_clean();
    }

    public function render_template( $atts ) {

        $layout = sanitize_file_name( $atts['layout'] );
        $template_path = WCGL_PLUGIN_DIR . "templates/{$layout}-template.php";

        if ( file_exists( $template_path ) ) {
            include $template_path;
        } else {
            echo '<p class="wcgl-error">Invalid layout specified.</p>';
        };
    }
}