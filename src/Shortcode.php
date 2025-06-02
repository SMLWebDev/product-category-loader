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
            'order'     => 'ASC'
        ], $atts);

        ob_start();
        ?>

        <div id="wcgl-category-grid" 
            class="wcgl-grid columns-<?= esc_attr( $atts['columns'] ) ?>" 
            data-per-page="<?= esc_attr( $atts['per_page'] ) ?>" 
            data-page="1"
            data-orderby="<?= esc_attr( $atts['orderby'] ) ?>"
            data-order="<?= esc_attr( $atts['order'] ) ?>"
            >
            <!-- Categories will load here via JS -->
        </div>

        <div class="wcgl-button-container">
            <button id="wcgl-load-more" class="wcgl-load-more">Load More...</button>
        </div>

        <script>
            window.WCGL_DATA = {
                ajax_url: "<?= admin_url( 'admin-ajax.php' ); ?>",
                nonce: "<?= wp_create_nonce( 'wcgl_nonce' ); ?>"
            };
        </script>
        <?php
        return ob_get_clean();
    }
}