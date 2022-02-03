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
                    <input type="text" placeholder="Search for Topics...">
                </label>
            </div>
            <div class="v2">
                <label class="filter-search-label">
                    <input type="text" placeholder="Search">
                    <input type="submit" value="">
                </label>
            </div>
            <div class="v1">
                <label class="filter-tags-label">
                    <span>Filter Results</span>
                    <select>
                        <option value="All">All Tags</option>
                        <option value="t1">Tag 1</option>
                        <option value="t2">Tag 2</option>
                        <option value="t3">Tag 3</option>
                        <option value="t4">Tag 4</option>
                    </select>
                </label>
            </div>
            <div class="v2">
                <label class="filter-filters-label">
                    <select>
                        <option value="Filter">Filter</option>
                        <option value="Filter1">Filter 1</option>
                        <option value="Filter2">Filter 2</option>
                        <option value="Filter3">Filter 3</option>
                        <option value="Filter4">Filter 4</option>
                    </select>
                </label>
            </div>
        </div>
        <?php 
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'post__not_in' => $featured_posts
        );
        $query = new WP_Query( $args ); 
        if( $query->have_posts(  ) ): ?> 
        <div class="d-grid _gg-2 _col-3">
            <?php while( $query->have_posts( ) ): $query->the_post(); 
                global $post; ?>
                <div class="article-inner">
                    <a href="<?php echo get_the_permalink( $post ); ?>">
                        <?php if( $categories = get_the_category( $post ) ): ?> 
                        <ul class="article-tag-list">
                            <?php foreach( $categories as $category ): ?>
                                <li><?php echo $category->name; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <div class="bg-str">
                            <?php 
                            $img_url = get_the_post_thumbnail_url( $post, 'blog-card' );
                            $img_url_2x = get_the_post_thumbnail_url( $post, 'blog-card-2x' ); ?>
                            <img src="<?php echo $img_url; ?>" alt="img" srcset="<?php echo $img_url_2x; ?> 2x">
                        </div>
                        <div class="article-info">
                            <h6><?php echo get_the_date( 'l F, d', $post ); ?></h6>
                            <h3><?php echo get_the_title( $post ); ?></h3>
                            <?php if( has_excerpt( $post ) ): ?>
                                <p><?php echo get_the_excerpt( $post ); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
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