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
                <h3>The Preacher’s Corner</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <hr>
                <h6>Get content directly in <br> your inbox</h6>
                <form>
                    <label>
                        <input type="email" placeholder="Your Email Address">
                    </label>
                    <input type="submit" value="Subscribe">
                </form>
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
                    <div class="content-info-img">
                        <div class="bg-str _1-1 br-50p">
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                        </div>
                    </div>
                    <div>
                        <h5>by</h5>
                        <p><?php echo get_the_author_meta( 'display_name'); ?></p>
                    </div>
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

<?php if( get_field( 'related_posts' ) ): ?>
<section class="pt-10 pb-20 p-r text-white mh-94">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'b_image', 'o' => 'f', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o zn-1' ) ); ?>
    <div class="container">
        <div class="mw-550 mb-l-0">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'b_sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'b_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'b_content', 'o' => 'f', 't' => 'p' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'b_cta', 'o' => 'f', 'c' => 'btn _arrow _btn-brand' ) ); ?>
        </div>
    </div>
</section>
<section class="pt-01 pb-10 pb-md-8 bg-black text-white">
    <div class="container-s mtn-22 mtn-md-15">
        <div class="slider-wrapper">
            <div class="slider-left-row">
                <div class="slider-left-tittle">
                    <h5 class="d-md-none"><small>from</small></h5>
                    <h3 class="tittle-with-ico">
                        <span class="d-md-block d-none h5">from</span> The <br> Preacher’s <br> Corner
                    </h3>
                </div>
                <div class="slider-left-btn d-md-none">
                    <a href="<?php echo home_url( 'blog' ); ?>" class="btn _arrow">SEE ALL</a>
                </div>
            </div>
            <?php if( $posts = get_field( 'related_posts' ) ): ?>
            <div class="slider-right-row">
                <div class="swiper swiper-article">
                    <div class="swiper-wrapper">
                        <?php foreach( $posts as $cpost ): ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_the_permalink( $cpost ); ?>">
                                <div class="article-inner">
                                    <?php if( $categories = get_the_category( $cpost ) ): ?> 
                                    <ul class="article-tag-list">
                                        <?php foreach( $categories as $category ): ?>
                                            <li><?php echo $category->name; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                    <div class="bg-str">
                                        <?php 
                                        $img_url = get_the_post_thumbnail_url( $cpost, 'blog-card' );
                                        $img_url_2x = get_the_post_thumbnail_url( $cpost, 'blog-card-2x' ); ?>
                                        <img src="<?php echo $img_url; ?>" alt="img" srcset="<?php echo $img_url_2x; ?> 2x">
                                    </div>
                                    <div class="article-info">
                                        <h6><?php echo get_the_date( 'l F, d', $cpost ); ?></h6>
                                        <h3><?php echo get_the_title( $cpost ); ?></h3>
                                        <?php if( has_excerpt( $cpost ) ): ?>
                                            <p><?php echo get_the_excerpt( $cpost ); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="container">
        <div class="text-right d-none d-md-block pt-2">
            <a href="<?php echo home_url( 'blog' ); ?>" class="btn _arrow">SEE ALL</a>
        </div>
        <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
            <div class="swiper-button-prev swiper-button-prev-s1"></div>
            <div class="swiper-button-next swiper-button-next-s1"></div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>