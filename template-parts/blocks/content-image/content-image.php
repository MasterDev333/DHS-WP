<?php

/**
 * Custom Content Image Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = get_field('id') ? get_field('id') : 'content-image-' . $block['id'];

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> a-up">
    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h2', 'tc' => 'h-over' ) ); ?>
    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 'o' => 'f', 't' => 'p' ) ); ?>
    <?php if( $image = get_field( 'image' ) ): ?>
        <figure>
            <div class="bg-str _sm-3-2 _7-3 bg-over _bg-gray _l-b _bg-xs">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </div>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'caption', 'o' => 'f', 't' => 'figcaption', 'tc' => 'wp-caption' ) ); ?>
        </figure>
    <?php endif; ?>
</section>