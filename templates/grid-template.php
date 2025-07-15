<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Grid Layout Template
 * @var array $shortcode_atts
 */
?>

<div id="pcl-category-grid pcl-categories" 
            class="pcl-categories pcl-grid columns-<?php echo esc_attr( $atts['columns'] ) ?>" 
            data-per-page="<?php echo esc_attr( $atts['per_page'] ) ?>" 
            data-page="1"
            data-orderby="<?php echo esc_attr( $atts['orderby'] ) ?>"
            data-order="<?php echo esc_attr( $atts['order'] ) ?>"
            data-hide_empty="<?php echo $atts['hide_empty'] ? 'true' : 'false' ?>"
            data-layout="<?php echo esc_attr( $atts['layout'] ) ?>"
            >
            <!-- Categories will load here via JS -->
    </div>

     <div class="pcl-button-container">
    <button id="pcl-load-more" class="pcl-load-more">Load More...</button>
</div>