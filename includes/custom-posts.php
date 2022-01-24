<?php
/**
 * Custom posts for use with this theme
 *
 *
 */

// Register Custom Post Type
function custom_post_type() {
	// Register Resource Custom Post Type
	$labels = array(
		'name'                  => _x( 'Resources', 'resources', 'text_domain' ),
		'singular_name'         => _x( 'Resource', 'resource', 'text_domain' ),
		'menu_name'             => __( 'Resources', 'text_domain' ),
		'name_admin_bar'        => __( 'Resources', 'text_domain' ),
		'archives'              => __( 'Resources Archives', 'text_domain' ),
		'attributes'            => __( 'Resources Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Resources:', 'text_domain' ),
		'all_items'             => __( 'All Resources', 'text_domain' ),
		'add_new_item'          => __( 'Add Resource', 'text_domain' ),
		'add_new'               => __( 'Add Resource', 'text_domain' ),
		'new_item'              => __( 'New Resource', 'text_domain' ),
		'edit_item'             => __( 'Edit Resource', 'text_domain' ),
		'update_item'           => __( 'Update Resource', 'text_domain' ),
		'view_item'             => __( 'View Resource', 'text_domain' ),
		'view_items'            => __( 'View Resources', 'text_domain' ),
		'search_items'          => __( 'Search Resources', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Resource', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'text_domain' ),
		'items_list'            => __( 'Resources list', 'text_domain' ),
		'items_list_navigation' => __( 'Resources list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Resources list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Resources', 'text_domain' ),
		'description'           => __( 'Resources post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies'          => array( 'category' ),
		'rewrite' => array('slug' => 'resources', 'with_front' => false)
	);
	register_post_type( 'resources', $args );
	// Register Integration Custom Post Type
	$labels = array(
		'name'                  => _x( 'Integrations', 'integrations', 'text_domain' ),
		'singular_name'         => _x( 'Integration', 'integration', 'text_domain' ),
		'menu_name'             => __( 'Integrations', 'text_domain' ),
		'name_admin_bar'        => __( 'Integrations', 'text_domain' ),
		'archives'              => __( 'Integrations Archives', 'text_domain' ),
		'attributes'            => __( 'Integrations Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Integrations:', 'text_domain' ),
		'all_items'             => __( 'All Integrations', 'text_domain' ),
		'add_new_item'          => __( 'Add Integration', 'text_domain' ),
		'add_new'               => __( 'Add Integration', 'text_domain' ),
		'new_item'              => __( 'New Integration', 'text_domain' ),
		'edit_item'             => __( 'Edit Integration', 'text_domain' ),
		'update_item'           => __( 'Update Integration', 'text_domain' ),
		'view_item'             => __( 'View Integration', 'text_domain' ),
		'view_items'            => __( 'View Integrations', 'text_domain' ),
		'search_items'          => __( 'Search Integrations', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Integration', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Integration', 'text_domain' ),
		'items_list'            => __( 'Integrations list', 'text_domain' ),
		'items_list_navigation' => __( 'Integrations list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Integrations list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Integrations', 'text_domain' ),
		'description'           => __( 'Integrations post type', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields', 'page-attributes', 'thumbnail', 'excerpt' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'integration', $args );
}
add_action( 'init', 'custom_post_type', 0 );
