<?php

namespace WCGL;

class Shortcode {
    public function register() {
        add_shortcode( 'woo_category_grid', [ $this, 'render_grid' ] );
    }

    public function render_grid( $atts ) {
        $atts = shortcode_atts([
            'per_page'  => 6,
            'columns'   => 3,
            'orderby'   => 'name',
            'order'     => 'ASC',
            'layout'    => 'grid'
        ], $atts);

        ob_start();
        echo $this->render_template( $atts );
        return ob_get_clean();
    }

    public function render_template( $atts ) {
        $layout = sanitize_file_name( $atts['layout'] );
        $template_path = plugin_dir_path( __DIR__ ) . "templates/{$layout}-template.php";

        var_dump( $template_path );

        if ( file_exists( $template_path ) ) {
            include $template_path;
        } else {
            echo '<p class="wcgl-error">Invalid layout specified.</p>';
        };
    }
}