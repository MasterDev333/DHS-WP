<?php

/**
 * Custom Content Image Alt Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'content-image-alt-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-image-alt';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> a-up">
    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h3' ) ); ?>
    <div class="img-c-grid i-mb-l-0">
        <?php if( $image = get_field( 'image' ) ): ?>
        <div>
            <figure class="wp-caption">
                <div class="bg-str _sm-3-2 _3-2 bg-over _bg-gray _l-b _bg-xs">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'caption', 'o' => 'f', 't' => 'figcaption' ) ); ?>
            </figure>
        </div>
        <?php endif; ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'w' => 'div', 'wc' => 'pb-4 pb-md-0' ) ); ?>
    </div>
</section>