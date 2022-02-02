<?php
// Custom ACF Blocks

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a content image block.
        acf_register_block_type(array(
            'name'              => 'content_image',
            'title'             => __('Content Image'),
            'description'       => __('A custom content image block.'),
            'render_template'   => 'template-parts/blocks/content-image/content-image.php',
            'category'          => 'dhs',
            'icon'              => 'cover-image',
            'keywords'          => array( 'content', 'image' ),
        ));
        
        // register a content image block.
        acf_register_block_type(array(
            'name'              => 'content_image_alt',
            'title'             => __('Content Image Alt'),
            'description'       => __('A custom content image alt block.'),
            'render_template'   => 'template-parts/blocks/content-image-alt/content-image-alt.php',
            'category'          => 'dhs',
            'icon'              => 'align-pull-left',
            'keywords'          => array( 'content', 'image' ),
        ));
    }
}

function custom_block_categories( $categories ) {
	return array_merge(
		$categories,
		[
			[
				'slug'  => 'dhs',
				'title' => 'DHS Blocks',
			],
		]
	);
}
add_action( 'block_categories', 'custom_block_categories', 10, 2 );