<?php
/**
 * Custom taxonomies for use with this theme
 *
 *
 */
function custom_taxonomies() {
    // Resource Category category
    register_taxonomy(
        'people_role',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'people',             // post type name
        array(
            'hierarchical' => true,
            'label' => 'Role', // display name
            'query_var' => true,
		    'show_in_rest' => true
        )
    );
}
add_action( 'init', 'custom_taxonomies');
