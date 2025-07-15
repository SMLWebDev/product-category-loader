<?php

if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Category item partial
 * 
 * @var WP_Term $category
 * @var string $layout
 */

if (!isset($layout)) {
    $layout = 'grid';
}

$thumb_id = get_term_meta($category->term_id, 'thumbnail_id', true);
$link = get_term_link($category);
?>

<div class="pcl-category pcl-category--<?php echo esc_attr($layout); ?>">
    <a href="<?php echo esc_url($link); ?>">
        <div class="pcl-category__image-container">
            <?php if ($thumb_id) : ?>
                <?php 
                echo wp_get_attachment_image( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    $thumb_id,
                    'woocommerce_thumbnail',
                    false,
                    [
                        'class' => 'pcl-category__image',
                        'alt' => esc_attr($category->name),
                        'loading' => 'lazy'
                    ]
                ); 
                ?>
            <?php else : ?>
                <?php 
                if (function_exists('wc_placeholder_img')) {
                    // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                    echo wc_placeholder_img('woocommerce_thumbnail', [
                        'class' => 'pcl-category__image',
                        'alt' => esc_attr($category->name),
                        'loading' => 'lazy'
                    ]);
                } else {
                    echo '<div class="pcl-category__image pcl-category__image--placeholder"></div>';
                }
                ?>
            <?php endif; ?>
        </div>
        <h3 class="pcl-category__title"><?php echo esc_html($category->name); ?></h3>
    </a>
</div>