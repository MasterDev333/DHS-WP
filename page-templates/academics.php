<?php
/*
Template Name: Academics
Template Post Type: page
*/

get_header(); 
global $post;
$post_slug = $post->post_name;
?>
<section class="pt-10 pb-10 pt-md-7 pb-md-6 p-r text-white">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <div class="container">
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'mw-550' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
    </div>
</section>
<!-- Breadcrumbs -->
<section class="bg-l-gray d-md-none">
    <div class="container">
        <ul class="pagination-list">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo get_permalink( $post ); ?>"><?php echo get_the_title( $post ) ?></a></li>
        </ul>
    </div>
</section>


<?php if( have_rows( 'modules' ) ): 
    while( have_rows( 'modules' ) ): the_row(); ?>
    <?php if( get_row_layout() == 'media_content' ): ?>
        <?php if( get_sub_field( 'style' ) == 'general' ): ?>
            <section class="pt-6 pb-12 pb-md-5 bgs-img">
                <div class="container">
                    <div class="img-txt-grid">
                        <div>
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'v2x' => false, 'is' => false, 'w' => 'div', 'wc' => 'bg-str bg-over _l-b' ) ); ?>
                        </div>
                        <div>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                            <?php if( have_rows( 'buttons' ) ): ?>
                                <div class="img-txt-btns">
                                    <?php while( have_rows( 'buttons' ) ): the_row(); 
                                        get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow' ) ); 
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
			<section class="pt-12 pb-14 py-md-12">
				<div class="container">
					<div class="img-txt-grid _v2">
						<div>
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'v2x' => false, 'is' => false, 'w' => 'div', 'wc' => 'bg-str bg-over _bg-gray' ) ); ?>
						</div>
						<div class="img-txt-grid-with-btns">
							<div class="mb-l-0">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
							</div>
                            <?php if( have_rows( 'buttons' ) ): ?>
                                <div class="img-txt-grid-btns">
                                    <?php while( have_rows( 'buttons' ) ): the_row(); 
                                        get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow' ) ); 
                                    endwhile; ?>
                                </div>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</section>
        <?php endif; ?>
    <?php elseif( get_row_layout() == 'gallery_content' ): ?>
        <section class="mt-16p mt-md-30p pt-0 pb-6 bg-l-gray p-r">
            <div class="container">
                <div class="tn-50p mbn-16p mbn-md-30p">
                    <?php if( $images = get_sub_field( 'images' ) ): ?>
                    <div class="img-grid">
                        <?php 
                        $classNames = ['a-r _1-1', '_5-3 _md-1-1', 'a-r _1-1'];
                        $i = 0;
                        foreach( $images as $image ): ?>
                        <div>
                            <div class="bg-str <?php echo $classNames[$i]; ?>">
                                <img src="<?php echo $image['url'] ;?>" alt="<?php echo $image['alt']; ?>">
                            </div>
                        </div>
                        <?php $i++;
                        endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="pt-3">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                    <div class="txt-btn-grid">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p', 'w' => 'div' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'list_content', 't' => 'div' ) ); ?>
                        <div>
                            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow', 'w' => 'p' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'side_content' ): ?>
        <section class="py-6 bg-l-gray">
            <div class="container">
                <div class="d-grid _col-3 _gg-10 _gg-md-0 p-small">
                    <div class="py-3 span-2 b-l-brand">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'left_heading', 't' => 'h3' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'left_content', 't' => 'div', 'tc' => 'd-grid _gg-2' ) ); ?>
                    </div>
                    <div class="py-3 mb-l-0">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'right_heading', 't' => 'h3' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'right_content', 't' => 'div' ) ); ?> 
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'programs' ): ?>
        <section class="py-12 py-md-5 bg-black text-white">
            <div class="container">
                <div class="programes-grid br-md-none">
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                        <?php if( $programs = get_sub_field( 'programs' ) ): ?>
                        <ul class="programes-list-nav">
                            <?php foreach( $programs as $key=>$program ): ?>
                            <li><a href="#program-item__<?php echo $key; ?>"><?php echo get_the_title( $program ); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <?php if( $programs ): ?>
                    <div>
                        <ul class="programes-list">
                            <?php foreach( $programs as $key=>$program ): ?>
                            <li id="program-item__<?php echo $key; ?>">
                                <div class="programes-list-img">
                                    <?php 
                                    $img_url = get_the_post_thumbnail_url( $program, 'program-image' );
                                    $img_url_2x = get_the_post_thumbnail_url( $program, 'program-image-2x' ); ?>
                                    <img src="<?php echo $img_url; ?>" alt="<?php echo get_the_title( $program ); ?>" srcset="<?php echo $img_url_2x; ?>">
                                </div>
                                <div class="programes-list-txt">
                                    <p><?php echo get_the_excerpt( $program ); ?></p>
                                </div>
                                <div class="programes-list-btn">
                                    <a href="<?php echo get_permalink( $program ); ?>" class="btn _arrow _s">Learn More</a>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'custom_content' ): ?>
        <section class="pt-12 pb-7 pb-md-10">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'w' => 'div', 'wc' => 'container _s' ) ); ?>
        </section>
    <?php elseif( get_row_layout() == 'post_slider_banner' ): ?>
        <section class="pt-16 pb-5 pt-md-12 p-r text-white bg-black">
            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'w' => 'div', 'wc' => 'bg-str-f _h-36 _h-md-30 bg-dark-o z-0' ) ); ?>
            <div class="container-s">
                <div class="slider-wrapper">
                    <div class="slider-left-row">
                        <div class="slider-left-tittle">
                            <h5 class="d-md-none"><small>from</small></h5>
                            <h3 class="tittle-with-ico">
                                <span class="d-md-block d-none h5">from</span> The <br> Preacher’s <br> Corner
                            </h3>
                        </div>
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'all_cta', 'c' => 'btn _arrow', 'w' => 'div', 'wc' => 'slider-left-btn d-md-none' ) ); ?>
                    </div>
                    <?php if( $posts = get_sub_field( 'posts' ) ): ?>
                    <div class="slider-right-row">
                        <div class="swiper swiper-article">
                            <div class="swiper-wrapper">
                                <?php foreach( $posts as $cpost ): ?>
                                <div class="swiper-slide">
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
                                            <a href="<?php echo get_the_title( $cpost ); ?>">
                                                <h3><?php echo get_the_title( $cpost ); ?></h3>
                                            </a>
                                            <?php if( has_excerpt( $cpost ) ): ?>
                                                <p><?php echo get_the_excerpt( $cpost ); ?></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
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
                    <a href="#" class="btn _arrow">SEE ALL</a>
                </div>
                <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
                    <div class="swiper-button-prev swiper-button-prev-s1"></div>
                    <div class="swiper-button-next swiper-button-next-s1"></div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'admissions' ): ?>
        <section class="pt-2 pb-12 pb-md-7 text-white bg-black">
            <div class="container _l">
                <div class="txt-btn-grid _v2 a-end i-mb-l-0">
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                    </div>
                    <?php if( have_rows( 'links' ) ): ?>
                    <div>
                        <ul class="list-arrow">
                            <?php while( have_rows( 'links' ) ): the_row();
                                get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'link', 'w' => 'li' ) );
                            endwhile; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow', 'w' => 'div' ) ); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>