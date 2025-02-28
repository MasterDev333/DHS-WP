<?php
global $am_option;

$am_option['shortname'] = "am";
$am_option['textdomain'] = "am";

// Functions
require get_parent_theme_file_path( '/includes/fn-core.php' );

//Load Custom Posts file
require get_parent_theme_file_path('/includes/custom-posts.php');

//Load Custom Taxonomies file
require get_parent_theme_file_path('/includes/custom-taxonomies.php');

//Load Custom ACF Blocks file
require get_parent_theme_file_path('/includes/custom-blocks.php');

require get_parent_theme_file_path( '/includes/fn-custom.php' );

// Extensions
require get_parent_theme_file_path( '/includes/extensions/breadcrumb-trail.php' );

/* Theme Init */
require get_parent_theme_file_path( '/includes/theme-widgets.php' );
require get_parent_theme_file_path( '/includes/theme-init.php' );

?>