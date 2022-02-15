<?php
/*
Template Name: Blog
Template Post Type: page
*/

get_header(); 
global $post;
$post_slug = $post->post_name;
?>
<?php if( $featured_posts = get_field( 'featured_post' ) ): 
    foreach( $featured_posts as $featured_post ): ?>
    <section class="py-4 p-r text-white mh-68 mh-md-54 a-center h1-md-small h6-md-big z-1">
        <div class="bg-str-f bg-dark-o">
            <img src="<?php echo get_the_post_thumbnail_url( $featured_post ); ?>"
                alt="<?php echo get_the_title( $featured_post ); ?>">
        </div>
        <div class="container">
            <h6><i class="icon-m-church pr-1 pr-md-2 fz-18"></i> Featured</h6>
            <h1 class="mw-550"><?php echo get_the_title( $featured_post ); ?></h1>
            <p class="mw-450"><?php echo get_the_excerpt( $featured_post ); ?></p>
            <p><a href="<?php echo get_the_permalink( $featured_post ); ?>" class="btn _arrow _t-white">Read More</a></p>
        </div>
    </section>
<?php endforeach;
endif; ?>
<section class="pt-10 pb-10 py-md-5 bg-black text-white p-md-big bgs-img">
    <div class="container _xs">
        <?php if( $c_header = get_field( 'c_header' ) ): ?>
        <h2 class="text-center text-md-left ico-left"><i class="icon-m-church"></i><?php echo $c_header; ?></h2>
        <?php endif; ?>
        <?php get_template_part_args('templates/content-modules-text', array( 'v' => 'c_description', 'o' => 'f', 't' => 'div' ) ); ?>
        <?php get_template_part_args('templates/content-modules-text', array( 'v' => 'c_content', 'o' => 'f', 't' => 'div' ) ); ?>
        <div class="d-grid _gg-2 a-center">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'c_button_description', 'o' => 'f', 't' => 'div', 'tc' => 'text-l-gray' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'c_cta', 'o' => 'f', 'c' => 'btn _arrow _full _xs-100p', 'w' => 'div', 'wc' => 'pl-8 pl-md-0' ) ); ?>
        </div>
    </div>
</section> 
<section class="pt-5 pb-9 py-md-5 bg-black text-white">
    <div class="container">
        <div class="article-filter-inner">
            <div class="v1">
                <label class="filter-results-label">
                    <span>Search Results</span>
                    <input type="text" id="blog-search" placeholder="Search for Topics...">
                </label>
            </div>
            <div class="v2">
                <button class="filter-btn blog-search">
                    Search
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.8438 15.2563L11.4062 10.8501C12.4062 9.69385 12.9688 8.2251 12.9688 6.6001C12.9688 3.0376 10.0312 0.100098 6.46875 0.100098C2.875 0.100098 0 3.0376 0 6.6001C0 10.1938 2.90625 13.1001 6.46875 13.1001C8.0625 13.1001 9.53125 12.5376 10.6875 11.5376L15.0938 15.9751C15.2188 16.0688 15.3438 16.1001 15.5 16.1001C15.625 16.1001 15.75 16.0688 15.8438 15.9751C16.0312 15.7876 16.0312 15.4438 15.8438 15.2563ZM6.5 12.1001C3.4375 12.1001 1 9.63135 1 6.6001C1 3.56885 3.4375 1.1001 6.5 1.1001C9.53125 1.1001 12 3.56885 12 6.6001C12 9.6626 9.53125 12.1001 6.5 12.1001Z" fill="#E1AE2E"/>
                    </svg>
                </button>
            </div>
            
            <?php $tags = get_tags( array(
                'taxonomy' => 'post_tag',
                'orderby' => 'name',
                'hide_empty' => false
            ) ); 
            if( $tags ): ?>
            <div class="v1">
                <label class="filter-tags-label">
                    <span>Filter Results</span>
                    <select id="blog-tags">
                        <option value="">All Tags</option>
                        <?php foreach($tags as $tag): ?>
                        <option value="<?php echo $tag->slug; ?>"><?php echo $tag->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
            </div>
            <div class="v2">
                <button class="filter-btn blog-filter">
                    Filter
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.5 3.6001H4.28125C4.53125 4.6001 5.40625 5.3501 6.5 5.3501C7.5625 5.3501 8.4375 4.63135 8.6875 3.6001H15.5C15.75 3.6001 16 3.38135 16 3.1001C16 2.8501 15.75 2.6001 15.5 2.6001H8.6875C8.4375 1.6001 7.5625 0.850098 6.5 0.850098C5.40625 0.850098 4.53125 1.6001 4.28125 2.6001H0.5C0.21875 2.6001 0 2.8501 0 3.1001C0 3.38135 0.21875 3.6001 0.5 3.6001ZM6.5 1.8501C7.1875 1.8501 7.75 2.4126 7.75 3.1001C7.75 3.81885 7.1875 4.3501 6.5 4.3501C5.78125 4.3501 5.25 3.81885 5.25 3.1001C5.25 2.4126 5.78125 1.8501 6.5 1.8501ZM15.5 7.6001H12.6875C12.4375 6.6001 11.5625 5.8501 10.5 5.8501C9.40625 5.8501 8.53125 6.6001 8.28125 7.6001H0.5C0.21875 7.6001 0 7.8501 0 8.1001C0 8.38135 0.21875 8.6001 0.5 8.6001H8.28125C8.53125 9.6001 9.40625 10.3501 10.5 10.3501C11.5625 10.3501 12.4375 9.63135 12.6875 8.6001H15.5C15.75 8.6001 16 8.38135 16 8.1001C16 7.8501 15.75 7.6001 15.5 7.6001ZM10.5 9.3501C9.78125 9.3501 9.25 8.81885 9.25 8.1001C9.25 7.4126 9.78125 6.8501 10.5 6.8501C11.1875 6.8501 11.75 7.4126 11.75 8.1001C11.75 8.81885 11.1875 9.3501 10.5 9.3501ZM15.5 12.6001H7.6875C7.4375 11.6001 6.5625 10.8501 5.5 10.8501C4.40625 10.8501 3.53125 11.6001 3.28125 12.6001H0.5C0.21875 12.6001 0 12.8501 0 13.1001C0 13.3813 0.21875 13.6001 0.5 13.6001H3.28125C3.53125 14.6001 4.40625 15.3501 5.5 15.3501C6.5625 15.3501 7.4375 14.6313 7.6875 13.6001H15.5C15.75 13.6001 16 13.3813 16 13.1001C16 12.8501 15.75 12.6001 15.5 12.6001ZM5.5 14.3501C4.78125 14.3501 4.25 13.8188 4.25 13.1001C4.25 12.4126 4.78125 11.8501 5.5 11.8501C6.1875 11.8501 6.75 12.4126 6.75 13.1001C6.75 13.8188 6.1875 14.3501 5.5 14.3501Z" fill="#E1AE2E"/>
                    </svg>
                </button>
            </div>
            <?php endif; ?>
        </div>
        <?php 
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => $featured_posts
        );
        $query = new WP_Query( $args ); 
        if( $query->have_posts(  ) ): ?> 
        <div class="d-grid _gg-2 _col-3" id="blog-grid">
            <?php while( $query->have_posts( ) ): $query->the_post();
                get_template_part( 'templates/loop', 'post' );
            endwhile; ?>
        </div>
        <?php endif;
        wp_reset_query(  ); ?>
    </div>
</section>
<section class="pt-7 pb-9 pt-md-8 pb-md-10 bg-l-gray">
    <div class="container">
        <div class="fact-grid _with-ico pt-2 br-lg-none">
            <div class="fact-title as-center mb-l-0">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'd_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'd_content', 'o' => 'f', 't' => 'p' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'd_cta', 'o' => 'f', 'c' => 'btn _arrow _s' ) ); ?>
            </div>
            <?php if( have_rows( 'cards' ) ): 
            while( have_rows( 'cards' ) ): the_row( ); ?>
            <div>
                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'icon' , 'w' => 'div', 'wc' => 'bg-str-f' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h4' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
            </div>
            <?php endwhile;
            endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>