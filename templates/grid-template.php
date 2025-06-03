<?php
/**
 * Grid Layout Template
 * @var array $shortcode_atts
 */
?>

<div id="wcgl-category-grid" 
            class="wcgl-grid wcgl-grid--columns-<?= esc_attr( $atts['columns'] ) ?>" 
            data-per-page="<?= esc_attr( $atts['per_page'] ) ?>" 
            data-page="1"
            data-orderby="<?= esc_attr( $atts['orderby'] ) ?>"
            data-order="<?= esc_attr( $atts['order'] ) ?>"
            data-layout="<?= esc_attr( $atts['layout'] ) ?>"
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