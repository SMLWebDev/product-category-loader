<?php
/**
 * Grid Layout Template
 * @var array $shortcode_atts
 */
?>

<div id="wcl-category-grid wcl-categories" 
            class="wcl-categories wcl-grid columns-<?= esc_attr( $atts['columns'] ) ?>" 
            data-per-page="<?= esc_attr( $atts['per_page'] ) ?>" 
            data-page="1"
            data-orderby="<?= esc_attr( $atts['orderby'] ) ?>"
            data-order="<?= esc_attr( $atts['order'] ) ?>"
            data-hide_empty="<?= $atts['hide_empty'] ? 'true' : 'false' ?>"
            data-layout="<?= esc_attr( $atts['layout'] ) ?>"
            >
            <!-- Categories will load here via JS -->
        </div>

        <div class="wcl-button-container">
            <button id="wcl-load-more" class="wcl-load-more">Load More...</button>
        </div>

        <script>
            window.WCL_DATA = {
                ajax_url: "<?= admin_url( 'admin-ajax.php' ); ?>",
                nonce: "<?= wp_create_nonce( 'wcl_nonce' ); ?>"
            };
        </script>