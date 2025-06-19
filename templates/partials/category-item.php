<?php
/**
 * Category item partial
 * 
 * @var WP_Term $category
 * @var string $layout
 */

 if (!isset($layout)) {
    $layout = 'grid';
 }

 $thumb_id = get_term_meta( $category->term_id, 'thumbnail_id', true );
 $image = $thumb_id ? wp_get_attachment_url( $thumb_id ) : ( function_exists('wc_placeholder_img_src') ? wc_placeholder_img_src() : '');
 $link = get_term_link( $category );
 ?>

 <div class="wcl-category wcl-category--<?= esc_attr($layout) ?>">
    <a href="<?= esc_url($link) ?>">
        <div class="wcl-category__image-container">
            <img src="<?= esc_url($image) ?>" alt="<?= esc_attr($category->name) ?>" class="wcl-category__image" loading="lazy">
        </div>
        <h3 class="wcl-category__title"><?= esc_html($category->name) ?></h3>
    </a>
 </div>