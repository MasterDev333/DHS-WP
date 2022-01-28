<?php
add_image_size('media-content-image', 479, 0, true);
add_image_size('media-content-image-2x', 958, 0, true);
add_image_size('testimonial', 1180, 360, true);
add_image_size('testimonial-2x', 2360, 720, true);
add_image_size('blog-card', 380, 270, true);
add_image_size('blog-card-2x', 760, 540, true);
add_image_size('program-image', 210, 140, true);
add_image_size('program-image-2x', 420, 280, true);

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
		);
}

add_action( 'wp_head', 'my_wp_ajaxurl' );
function my_wp_ajaxurl() {
	$url = parse_url( home_url( ) );
	if( $url['scheme'] == 'https' ){
	   $protocol = 'https';
	}
	else{
	    $protocol = 'http';
	}
    ?>
    <script type="text/javascript">
        var ajaxurl = '<?php echo admin_url( 'admin-ajax.php', $protocol ); ?>';
    </script>
    <?php
}


/**
 * Like get_template_part() put lets you pass args to the template file
 * Args are available in the tempalte as $template_args array
 * @param string filepart
 * @param mixed wp_args style argument list
 * https://wordpress.stackexchange.com/questions/176804/passing-a-variable-to-get-template-part
 */
function get_template_part_args( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}

/*
 * name: var_dump_pre
 * description: formated var_dump
 * 
 * */
function var_dump_pre( $var, $title='', $color = 'white', $dump = FALSE ){
    ?>

    <?php
    $style = 'clear:both;overflow:auto;border:1px solid #BFBFBF; margin-top:10px; padding-left:3px;padding-bottom:3px;background-color:'.$color;
    echo '<div class="debug" style="'. $style .'" >';
    $db = debug_backtrace();
    //echo 'function: '.$db[0]['file'].' @ line:['.$db[0]['line'].']';
    $file  = strrev(implode(strrev(' /<span style="color:black">'), explode("/", strrev($db[0]['file']), 2)));
    $file .= '</span>'; 
    echo '<div style="width:100%; margin-left:-3px; color:#969696;background-color:#F0F0F0;padding:3px 0px 3px 3px"><small><span style="color:black">file: </span>'.$file.' <br />@<br /><span style="color:black">line:['.$db[0]['line'].']</span></small></div>';
    echo '<pre>';

    if( $title !='' )
        echo '<div style="width:100%; margin-left:-3px; background-color:#E5E5F8;padding:3px 0px 3px 3px"><strong>'.$title.':</strong></div><br />';
    
    if( $dump || is_bool( $var )){
        if( is_bool( $var )){
                    
            switch ( $var ){
                case TRUE:
                    echo '<span style="color:green">'; var_dump( $var ); echo '</span>';
                break;
                
                case FALSE:
                    echo '<span style="color:red">'; var_dump( $var );echo '</span>';
                break;
            }
        }
        else
            var_dump( $var );
    }
    else
        print_r( $var );
    echo '</pre>';
    echo '</div>';
    echo '<div style="clear:both"></div>';
}


/**
 * Returns all child nav_menu_items under a specific parent
 *
 * @param int the parent nav_menu_item ID
 * @param array nav_menu_items
 * @param bool gives all children or direct children only
 * @return array returns filtered array of nav_menu_items
 */
function get_nav_menu_item_children($parent_id, $nav_menu_items, $depth = true) {
    $nav_menu_item_list = array();
    foreach ((array) $nav_menu_items as $nav_menu_item) {
        if ($nav_menu_item->menu_item_parent == $parent_id) {
            $nav_menu_item_list[] = $nav_menu_item;
            if ($depth) {
                if ($children = get_nav_menu_item_children($nav_menu_item->ID, $nav_menu_items)) {
                    $nav_menu_item_list = array_merge($nav_menu_item_list, $children);
                }
            }
        }
    }
    return $nav_menu_item_list;
}

// Header Menu
function clean_header_menu( $theme_location ) {
    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {
        $menu = get_term( $locations[$theme_location], 'nav_menu' );
        $menu_items = wp_get_nav_menu_items( $menu->term_id );

        $menu_list = '';

        $count = 0;
        $submenu = false;
        $post_id = get_the_ID();
        
        $last_menu_item = end( $menu_items );

        foreach( $menu_items as $menu_item ) {
            $link = $menu_item->url;
            $title = $menu_item->title;
            $id = get_post_meta( $menu_item->ID, '_menu_item_object_id', true );

            $menu_icon = get_field( 'icon', $id );
            $cols = get_field( 'column_count', $id );
            $is_wrapper = get_field( 'is_wrapper', $id );
            $is_heading = get_field( 'is_heading', $id );
            $is_text = get_field( 'is_text', $id );

            $menu_icon_url = $menu_icon['url'];
            $menu_icon_alt = $menu_icon['alt'];

            $class_names = $value = '';

            $classes = empty($menu_item->classes) ? array() : (array) $menu_item->classes;

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item));
            // If parent menu
            if (!$menu_item->menu_item_parent) {
                $parent_id = $menu_item->ID;
                if(get_nav_menu_item_children($parent_id, $menu_items)) {
                    $menu_list .= '<li class="has-mega-menu ' . join(' ', $menu_item->classes) . '">' . "\n";
                } else{
                    $menu_list .= '<li class="' . ( ( $id == $post_id ) ? 'current-menu-item' : '' ) . '">' . "\n";
                }
                $menu_list .= '<a href="' . $link . '">' . $title . '</a>' . "\n";
                
                if (get_nav_menu_item_children($parent_id, $menu_items)) {
                    $menu_list .= '<ul class="mega-menu"><li>' . "\n";
                    $submenu = true;
                }
            }
            // is child menu
            if ($parent_id == $menu_item->menu_item_parent) {
                $level_2_menu_id = $menu_item->ID;
                if( $is_wrapper ) {
                    $menu_list .= '<div class="col ' . join( ' ', $menu_item->classes ) . '">';
                    $level_2_childrens = get_nav_menu_item_children($level_2_menu_id, $menu_items);
                    $level_3_submenu = false;
                    if ( $level_2_childrens ) {
                        if( in_array( 'col-sub', $menu_item->classes ) ) {
                            $menu_list .= '<ul class="sub-menu">';
                        }
                        foreach ($level_2_childrens as $level_3_single_menu) {
                            if ( $level_2_menu_id == $level_3_single_menu->menu_item_parent ) {
                                // Is heading
                                if( get_field( 'is_heading', $level_3_single_menu->ID ) ) {
                                    $menu_list .= '<h3>' . $level_3_single_menu->title . '</h3>';
                                } 
                                // Is text
                                elseif( get_field( 'is_text', $level_3_single_menu->ID ) ) {
                                    $menu_list .= '<p>' . $level_3_single_menu->title . '</p>';
                                }
                                // Is button
                                elseif( get_field( 'is_button', $level_3_single_menu->ID ) ) {
                                    $menu_list .= '<div class="btn-block"><a href="' . $level_3_single_menu->url . '" class="' . join( ' ', $level_3_single_menu->classes ) . '">' . $level_3_single_menu->title . '</a></div>';
                                } 
                                else {
                                    $menu_list .= '<li><a href="' . $level_3_single_menu->url . '" class="' . join( ' ', $level_3_single_menu->classes ) . '">';
                                    if( $icon = get_field( 'icon', $level_3_single_menu->ID ) ) {
                                        $menu_list .= '<i class="ico"><img src="' . $icon['url'] . '" width="24" height="24" alt="' . $icon['alt'] . '"></i>';
                                    }
                                    $menu_list .= $level_3_single_menu->title . '</a>';

                                    $level_3_menu_id = $level_3_single_menu->ID;
                                    $level_3_childrens = get_nav_menu_item_children($level_3_menu_id, $menu_items);

                                    if ( $level_3_childrens ) {
                                        $menu_list .= '<ul>';
                                        foreach ($level_3_childrens as $level_4_single_menu) {
                                            $menu_list .= '<li><a href="' . $level_4_single_menu->url . '" class="' . join(' ', $level_4_single_menu->classes) . '">';
                                            if ($icon = get_field('icon', $level_4_single_menu->ID)) {
                                                $menu_list .= '<i class="ico"><img src="'. $icon['url'] .'" width="24" height="24" alt="'. $icon['alt'] .'" /></i>';
                                            }
                                            $menu_list .= $level_4_single_menu->title . '</a></li>';
                                        }
                                        $menu_list .= '</ul>';
                                    }
                                    $menu_list .= '</li>';
                                }
                            }
                        }
                        if( in_array( 'col-sub', $menu_item->classes ) ) {
                            $menu_list .= '</ul>';
                        }
                    } 
                    $menu_list .= '</div>';
                } else {
                    $menu_list .= '<li><a href="' . $link . '">';
                    if( $menu_icon ) {
                        $menu_list .= '<i class="icon"><img src="' . $menu_icon_url . '" alt="' . $menu_icon_alt . '" width="24" height="24" /></i>';
                    }
                    $menu_list .= '</a></li>';
                }
            } 

            if($last_menu_item->ID == $menu_items[$count]->ID){
                if($submenu){
                    $menu_list .= '</ul>' . "\n";
                }
            }

            if (isset($menu_items[$count + 1]) && ( 0 == $menu_items[$count + 1]->menu_item_parent )) {

                if($submenu){
                    $menu_list .= '</li></ul>' . "\n";
                }

                $menu_list .= '</li>' . "\n";

                $submenu = false;
            }

            $count++;
        }
    } else {
        $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
    }
    echo $menu_list;
}

// Footer Menu
function clean_footer_menu($theme_location) {

    if (($theme_location) && ($locations = get_nav_menu_locations()) && isset($locations[$theme_location])) {

        $menu = get_term($locations[$theme_location], 'nav_menu');
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        $menu_list = '';

        $count = 0;
        $submenu = false;

        foreach ($menu_items as $menu_item) {
            $link = $menu_item->url;
            $title = $menu_item->title;

            $class_names = $value = '';

            $classes = empty($menu_item->classes) ? array() : (array) $menu_item->classes;

            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $menu_item));

            if (!$menu_item->menu_item_parent) {
                $parent_id = $menu_item->ID;

                $menu_list .= '<div class="footer-col">' . "\n";

                $menu_list .= '<span class="footer-col_title">' . $title . '</span>' . "\n";

            }

            if ($parent_id == $menu_item->menu_item_parent) {

                if (!$submenu) {
                    $submenu = true;

                    $menu_list .= '<ul class="footer-col_nav">' . "\n";
                }

                $menu_list .= '<li><a href="'. $link .'" class="' . $class_names . '">'. $title .'</a></li>' . "\n";

                if ($menu_items[$count + 1]->menu_item_parent != $parent_id && $submenu) {
                    $menu_list .= '</ul>' . "\n";
                    $submenu = false;
                }
            }

            if (isset($menu_items[$count + 1]) && ( 0 == $menu_items[$count + 1]->menu_item_parent )) {
                $menu_list .= '</div>' . "\n";
            }

            $count++;
        }

        $menu_list .= '</div>' ."\n";
    } else {
        $menu_list = '<!-- no menu defined in location "' . $theme_location . '" -->';
    }
    echo $menu_list;
}

/**
 * Returns the primary term for the chosen taxonomy set by Yoast SEO
 * or the first term selected.
 *
 * @link https://www.tannerrecord.com/how-to-get-yoasts-primary-category/
 * @param integer $post The post id.
 * @param string  $taxonomy The taxonomy to query. Defaults to category.
 * @return array The term with keys of 'title', 'slug', and 'url'.
 */
function get_primary_taxonomy_term($post = 0, $taxonomy = 'category') {
    if (!$post) {
        $post = get_the_ID();
    }

    $terms = get_the_terms($post, $taxonomy);
    $primary_term = array();

    if ($terms) {
        $term_display = '';
        $term_slug = '';
        $term_link = '';
        if (class_exists('WPSEO_Primary_Term')) {
            $wpseo_primary_term = new WPSEO_Primary_Term($taxonomy, $post);
            $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
            $term = get_term($wpseo_primary_term);
            if (is_wp_error($term)) {
                $term_display = $terms[0]->name;
                $term_slug = $terms[0]->slug;
                $term_link = get_term_link($terms[0]->term_id);
            } else {
                $term_display = $term->name;
                $term_slug = $term->slug;
                $term_link = get_term_link($term->term_id);
            }
        } else {
            $term_display = $terms[0]->name;
            $term_slug = $terms[0]->slug;
            $term_link = get_term_link($terms[0]->term_id);
        }
        $primary_term['url'] = $term_link;
        $primary_term['slug'] = $term_slug;
        $primary_term['title'] = $term_display;
    }
    return $primary_term;
}

function get_module_spacing() {
    $classes = [];
    if( !get_sub_field( 'remove_margin_top' ) ):
        $classes[] = 'mt-10 mt-md-15';
    endif;
    if( !get_sub_field( 'remove_margin_bottom' ) ): 
        $classes[] = 'mb-10 mb-md-15';
    endif;
    return implode( ' ', $classes );
}

function get_mark_image( $type = 'sub' ) {
    if( $type == 'sub' ): 
        $mark_type = get_sub_field( 'mark_type' );
    else:
        $mark_type = get_field( 'mark_type' );
    endif;
    if( $mark_type == 'line' ): 
        return get_template_directory_uri( ) . '/assets/img/decor-txt-engagement.svg';
    elseif( $mark_type == 'circle' ): 
        return get_template_directory_uri( ) . '/assets/img/decor-txt-culture.svg';
    elseif( $mark_type == 'wave' ):
        return get_template_directory_uri( ) . '/assets/img/decor-txt-whole-team.svg';
    elseif( $mark_type == 'exclaimation_mark' ): 
        return get_template_directory_uri( ) . '/assets/img/decor-txt-matter.svg';
    elseif( $mark_type == 'wavy' ):
        return get_template_directory_uri(  ) . '/assets/img/decor-txt-wavy.svg';
    endif;
}

// Button shortcode
function cta_link_func( $atts ) {
	$a = shortcode_atts( array(
		'href' => '#',
		'title' => '',
		'class' => '',
        'target'=> '',
        'download' => ''
	), $atts );
    if ($a['download']) : 
        $path_parts = pathinfo($a['href']);
        $download = 'download="' . $path_parts['basename'] . '"';
    endif; 
    $class = $a['class'] ?: 'btn _arrow';
	return '<a  href="' . $a['href'] . '" 
                    class="' . $class . '" 
                    target="' . $a['target'] . '" ' . $download . '>' . $a['title'] .'</a>';
}
add_shortcode( 'cta_link', 'cta_link_func' );