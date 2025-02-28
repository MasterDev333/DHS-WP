<?php get_header(); 
global $post;
$post_slug = $post->post_name;
?>
<?php if( has_post_thumbnail( $post ) ): ?>
<section class="a-r _14-5 _sm-1-1">
    <div class="bg-str-f">
        <img src="<?php echo get_the_post_thumbnail_url( $post ); ?>" alt="<?php echo get_the_title( $post ); ?>">
    </div>
</section>
<?php endif; ?>
<section class="bg-l-gray d-md-none">
    <div class="container">
        <ul class="pagination-list">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url('/blog'); ?>">Preacher’s Corner</a></li>
            <li><?php echo get_the_title( $post ); ?></li>
        </ul>
    </div>
</section>
<section class="py-10 pt-md-6 pb-md-10 bgs-img">
    <div class="container">
        <div class="content-grid">
            <div class="content-grid-sidebar br-lg-none">
                <p><i class="icon-m-church"></i></p>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sidebar_heading', 'o' => 'o', 't' => 'h3' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sidebar_content', 'o' => 'o', 't' => 'p' ) ); ?>
                <hr>
                <?php if( $form = get_field( 'sidebar_form', 'options' ) ): ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sidebar_form_heading', 'o' => 'o', 't' => 'h6' ) ); ?>
                    <?php echo do_shortcode( $form ); ?>
                <?php else: ?>
                    <h6>Get content directly in <br> your inbox</h6>
                    <form>
                        <label>
                            <input type="email" placeholder="Your Email Address">
                        </label>
                        <input type="submit" value="Subscribe">
                    </form>
                <?php endif; ?>
                <hr>
                <h6>Share this Article</h6>
                <ul class="content-social-list">
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink( $post ); ?>" target="_blank"><i class="icon-facebook"></i></a></li>
                    <li><a href="#" target="_blank"><i class="icon-instagram"></i></a></li>
                    <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_the_permalink( $post ); ?>&text=" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_the_permalink( $post ); ?>" target="_blank"><i class="icon-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="content-grid-text">
                <h1 class="h2"><?php echo get_the_title( $post ); ?></h1>
                <p><?php echo get_the_excerpt( $post ); ?></p>
                <div class="content-info bg-l-gray">
                    <?php
                    $type = get_field( 'type' );  
                    if( $type == 'People'): 
                        if( $peoples = get_field( 'people' ) ): 
                            foreach( $peoples as $people ): 
                                $img_url = get_the_post_thumbnail_url( $people );
                                $name = get_the_title( $people );
                            endforeach; 
                        endif;
                        wp_reset_postdata(  );
                    elseif( $type == 'Custom' ): 
                        $name = get_field( 'author_name' );
                        $img_url = get_field( 'author_avatar' );
                    endif; ?>
                    <?php if( $type != 'None' ): ?>
                    <div class="content-info-img">
                        <div class="bg-str _1-1 br-50p">
                            <img src="<?php echo $img_url; ?>" alt="">
                        </div>
                    </div>
                    <div>
                        <h5>by</h5>
                        <p><?php echo $name; ?></p>
                    </div>
                    <?php endif; ?>
                    <div>
                        <h5>on</h5>
                        <p><?php echo get_the_date( 'F d, Y' ); ?></p>
                    </div>
                    <div>
                        <h5>in</h5>
                        <?php if( $categories = get_the_category( $post ) ): ?>
                        <p>
                            <?php foreach( $categories as $category ): ?>
                                <?php echo $category->name . ' '; ?>
                            <?php endforeach; ?>
                        </p>
                        <?php endif; ?>
                        <?php if( $tags = get_the_tags( $post ) ): ?>
                        <h6>
                            <?php foreach( $tags as $tag ):
                                echo $tag->name . ' '; 
                            endforeach; ?>
                        </h6>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if( have_posts( ) ): 
                    while( have_posts( ) ): the_post(); 
                        the_content( );
                    endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<?php 
$testimonial_content = get_field( 'testimonial_content' );
$testimonial_name = get_field( 'name' ); 
if( $testimonial_content || $testimonial_name ): ?>
<section class="pt-12 pb-9 py-md-5 bg-gray bg-img _v1 d-md-none">
    <div class="container">
        <?php if( $testimonial_content ): ?>
        <div class="d-grid _gg-2 font-acent p-big">
            <?php echo $testimonial_content; ?>
        </div>
        <?php endif; ?>
        <?php if( $testimonial_name ): ?>
        <div class="text-center">
            <p><span class="pr-2">|</span> <?php echo $testimonial_name; ?></p>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<section class="pt-10 pb-20 p-r text-white mh-94">
    <?php if( get_sub_field( 'post_banner_video' ) ): ?>
        <?php get_template_part_args( 'templates/content-modules-video', array( 'v' => 'post_banner_video', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o zn-1' ) ); ?>
    <?php else: ?>
        <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'post_banner_background', 'o' => 'f', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o zn-1' ) ); ?>
    <?php endif; ?>
    <div class="container">
        <div class="mw-550 mb-l-0">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'post_banner_sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'post_banner_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'post_banner_content', 'o' => 'f', 't' => 'p' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'post_banner_cta', 'o' => 'f', 'c' => 'btn   _arrow _btn-brand' ) ); ?>
        </div>
    </div>
</section>
<section class="pt-01 pb-10 pb-md-8 bg-black text-white">
    <div class="container-s mtn-22 mtn-md-15">
        <div class="slider-wrapper">
            <div class="slider-left-row">
                <div class="slider-left-tittle">
                    <?php if( $subheading = get_field( 'post_banner_slider_subheading', 'options' ) ): ?>
                    <h5 class="d-md-none"><small><?php echo $subheading; ?></small></h5>
                    <?php endif; ?>
                    <h3 class="tittle-with-ico">
                        <?php if( $subheading ): ?>
                        <span class="d-md-block d-none h5"><?php echo $subheading; ?></span>
                        <?php endif; ?>
                        <?php if( $heading = get_field( 'post_banner_slider_heading', 'options' ) ): 
                            echo $heading;
                        endif; ?>
                    </h3>
                </div>
                <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'post_banner_cta', 'o' => 'o', 'c' => 'btn _arrow', 'w' => 'div', 'wc' => 'slider-left-btn d-md-none' ) ); ?>
            </div>
            <?php if( get_field( 'post_banner_type', 'options' ) == 'Custom' ): ?>
                <?php if( $posts = get_field( 'post_banner_posts', 'options' ) ): ?>
                <div class="slider-right-row">
                    <div class="swiper swiper-article">
                        <div class="swiper-wrapper">
                            <?php foreach( $posts as $cpost ): ?>
                            <div class="swiper-slide">
                                <?php get_template_part( 'templates/loop-post', 'slide', array( 'post' => $cpost ) ); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php else: ?>
                <?php $args = array( 
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => '4',
                );
                $query = new WP_Query( $args ); 
                if( $query->have_posts(  ) ): ?>
                <div class="slider-right-row">
                    <div class="swiper swiper-article">
                        <div class="swiper-wrapper">
                            <?php while( $query->have_posts( ) ): $query->the_post( ); ?>
                                <div class="swiper-slide">
                                    <?php get_template_part( 'templates/loop-post', 'slide', array( 'post' => get_the_ID(  ) ) ); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
                <?php endif; 
                wp_reset_query(  ); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'post_banner_slider_cta', 'o' => 'o', 'c' => 'btn _arrow', 'w' => 'div', 'wc' => 'text-right d-none d-md-block pt-2' ) ); ?>
        <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
            <div class="swiper-button-prev swiper-button-prev-s1"></div>
            <div class="swiper-button-next swiper-button-next-s1"></div>
        </div>
    </div>
</section>
<?php get_footer(); ?>