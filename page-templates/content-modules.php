<?php
/*
Template Name: Content Modules
Template Post Type: page
*/

get_header(); ?>

<?php if( have_rows( 'modules' ) ): 
    while( have_rows( 'modules' ) ): the_row(); ?>
    <?php if( get_row_layout() == 'post_slider_banner' ): ?>
        <section class="pt-4 pb-25 pb-md-15 pt-lg-7 p-r text-white mh-74 mh-md-64 a-end a-lg-start hero-wrapper">
            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h1', 'tc' => 'mw-550' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
            </div>
        </section>
        <section class="pt-01 pb-2 pb-md-5 text-white">
            <div class="container-s mtn-22 mtn-md-15">
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
                                        <ul class="article-tag-list">
                                            <li>New</li>
                                        </ul>
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
                <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'all_cta', 'c' => 'btn _arrow', 'w' => 'div', 'wc' => 'text-right d-none d-md-block pt-2' ) ); ?>
                <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
                    <div class="swiper-button-prev swiper-button-prev-s1"></div>
                    <div class="swiper-button-next swiper-button-next-s1"></div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'media_content' ): ?>
        <?php if( get_sub_field( 'style' ) == 'general' ): ?>
			<section class="pt-7 pb-10 pt-md-10  pb-md-9 bg-l-gray">
				<div class="container">
					<div class="img-txt-grid ">
						<div>
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'w' => 'div', 'wc' => 'bg-str bg-over _l-b' ) ); ?>
						</div>
						<div>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div' ) ); ?>
                            <?php if( have_rows( 'buttons' ) ): ?>
							<div class="img-txt-btns _a-md-end">
                                <?php while( have_rows( 'buttons' ) ): the_row(); 
                                    if( $cta = get_sub_field( 'cta' ) ): ?>
								        <a href="<?php echo $cta['url']; ?>" 
                                            class="btn _arrow" 
                                            target="<?php echo $cta['target']; ?>">
                                            <?php echo $cta['title']; ?>    
                                        </a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
							</div>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</section>
        <?php else: ?>
			<section class="pt-3 pb-10 pt-md-7  pb-md-12 bgs-img ov-v">
				<div class="container">
					<div class="img-txt-grid _v2">
						<div>
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'w' => 'div', 'wc' => 'bg-str bg-over _bg-gray' ) ); ?>
						</div>
						<div class="img-txt-grid-with-btns">
							<div class="mb-l-0">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div' ) ); ?>
							</div>
                            <?php if( have_rows( 'buttons' ) ): ?>
							<div class="img-txt-grid-btns">
                                <?php while( have_rows( 'buttons' ) ): the_row(); 
                                    if( $cta = get_sub_field( 'cta' ) ): ?>
								        <a href="<?php echo $cta['url']; ?>" 
                                            class="btn _arrow" 
                                            target="<?php echo $cta['target']; ?>">
                                            <?php echo $cta['title']; ?>    
                                        </a>
                                    <?php endif; ?>
                                <?php endwhile; ?>
							</div>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</section>
        <?php endif; ?>
    <?php elseif( get_row_layout() == 'background_content' ): ?>
        <section class="pt-14 pb-12 pt-md-12  pb-md-10 bg-gray bg-img _v1 quote-wrapper">
            <div class="container">
                <div class="mw-750 mx-a">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'w' => 'div', 'wc' => 'mw-500', 't' => 'h3' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'w' => 'blockquote', 'wc' => 'quote', 't' => 'p' ) ); ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'testimonial' ): 
        $image = get_sub_field( 'background' ); ?>
        <section class="pt-8 pb-10 py-md-12">
            <div class="container">
                <div class="quote-block bg-over _bg-gray _bg-md-xs" style="background-image: url(<?php echo $image['sizes']['testimonial']; ?>)">
                    <blockquote>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'name', 't' => 'cite' ) ); ?>
                    </blockquote>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'programs' ): ?>
        <section class="pt-18 pb-5 pt-md-7 pb-md-12 p-r text-white">
            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'w' => 'div', 'wc' => 'bg-str-f _h-36 _h-md-30 bg-dark-o', 'is' => false, 'v2x' => false ) ); ?>
            <div class="container-s">
                <div class="slider-wrapper">
                    <div class="slider-left-row">
                        <div class="slider-left-tittle">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                        </div>
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'all_cta', 'w' => 'div', 'wc' => 'slider-left-btn d-md-none', 'c' => 'btn _arrow' ) ); ?>
                    </div>
                    <?php $programs = get_sub_field( 'programs' );
                    if( $programs ): ?>
                    <div class="slider-right-row">
                        <div class="swiper swiper-programm">
                            <div class="swiper-wrapper">
                                <?php foreach( $programs as $program): ?>
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="<?php echo get_template_directory_uri(  ) . '/assets/img/icon-book.svg'; ?>" alt="">
                                        </div>
                                        <a href="<?php echo get_permalink( $program ); ?>" class="swiper-programm-link">
                                            <h4><?php echo get_the_title( $program ); ?></h4>
                                        </a>
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
                <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'all_cta', 'w' => 'div', 'wc' => 'text-right d-none d-md-block pt-2', 'c' => 'btn _arrow' ) ); ?>
                <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
                    <div class="swiper-button-prev swiper-button-prev-s2"></div>
                    <div class="swiper-button-next swiper-button-next-s2"></div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'inline_blocks' ): ?>
        <section class="pt-17 pb-6 py-md-10 bg-l-gray">
            <div class="container">
                <div class="fact-grid">
                    <div class="fact-title">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                    </div>
                    <?php if( have_rows( 'blocks' ) ): 
                        while( have_rows( 'blocks' ) ): the_row(); ?>
                        <div>
                            <h2><?php the_sub_field( 'main' ); ?></h2>
                            <p><i><?php the_sub_field( 'description' ); ?></i></p>
                        </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'full_banner' ): ?>
        <section class="py-3 py-md-10 p-r text-white mh-58 a-center">
            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o', 'is' => false, 'v2x' => false ) ); ?>
            <div class="container">
                <div class="mw-550 mb-l-0">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow _btn-brand', 'w' => 'p' ) ); ?>
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?php endwhile;
endif; ?>
<?php get_footer(); ?>