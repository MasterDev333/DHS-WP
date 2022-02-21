<?php
/*
Template Name: Content Modules
Template Post Type: page
*/

get_header(); ?>
<?php if( get_field( 'enable_section' ) ) : ?>
<section class="py-5 pt-lg-7 pb-lg-12 p-r text-white a-center mh-50 hero-wrapper">
    <?php if( get_sub_field( 'video' ) ): ?>
        <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <?php else: ?> 
        <?php get_template_part_args( 'templates/content-modules-video', array( 'v' => 'video', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <?php endif; ?>
    <div class="container">
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'mw-700' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
    </div>
</section>
<?php endif; ?>
<?php if( have_rows( 'modules' ) ): 
    while( have_rows( 'modules' ) ): the_row(); ?>
    <?php if( get_row_layout() == 'post_slider_banner' ): ?>
        <?php if( get_sub_field( 'style' ) == 'light' ): ?>
            <section class="pt-4 pb-25 pb-md-15 pt-lg-7 p-r text-white mh-74 mh-md-64 a-end a-lg-start hero-wrapper">
                <?php if( get_sub_field( 'video' ) ): ?>
                    <?php get_template_part_args( 'templates/content-modules-video', array( 'v' => 'video', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
                <?php else: ?>
                    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'is' => false, 'v2x' => false, 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
                <?php endif; ?>
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
                                    <?php if( $subheading = get_sub_field( 'post_banner_subheading', 'options' ) ): ?>
                                        <span class="d-md-block d-none h5"><?php echo $subheading; ?></span>
                                    <?php endif; ?>
                                    <?php if( $heading = get_sub_field( 'post_banner_heading', 'options' ) ): ?>
                                        <?php echo $heading; ?>
                                     <?php endif; ?>
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
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'all_cta', 'c' => 'btn _arrow', 'w' => 'div', 'wc' => 'text-right d-none d-md-block pt-2' ) ); ?>
                    <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
                        <div class="swiper-button-prev swiper-button-prev-s1"></div>
                        <div class="swiper-button-next swiper-button-next-s1"></div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="pt-16 pb-5 pt-md-12 p-r text-white bg-black">
                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'w' => 'div', 'wc' => 'bg-str-f _h-36 _h-md-30 bg-dark-o z-0' ) ); ?>
                <div class="container-s">
                    <div class="slider-wrapper">
                        <div class="slider-left-row">
                            <div class="slider-left-tittle">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'post_banner_subheading', 'o' => 'o', 't' => 'small', 'w' => 'h5', 'wc' => 'd-md-none' ) ); ?>
                                <h3 class="tittle-with-ico">
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'post_banner_subheading', 'o' => 'o', 't' => 'span', 'tc' => 'd-md-block d-none h5' ) ); ?>
                                    <?php 
                                    if( $heading = get_sub_field( 'post_banner_heading' ) ): 
                                        echo $heading;
                                    endif;
                                    ?>
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
                        <a href="#" class="btn _arrow">SEE ALL</a>
                    </div>
                    <div class="swiper-btn-v1 swiper-article-btn-block d-md-none">
                        <div class="swiper-button-prev swiper-button-prev-s1"></div>
                        <div class="swiper-button-next swiper-button-next-s1"></div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    <?php elseif( get_row_layout() == 'media_content' ): ?>
        <?php 
        $style = get_sub_field( 'color' ) ? 'color: ' . get_sub_field( 'color' ) . ';' : '';
        $style .= get_sub_field( 'background' ) ? 'background-color: ' . get_sub_field( 'background' ) . ';' : ''; ?>
        <?php if( get_sub_field( 'style' ) == 'general' ): ?>
			<section class="pt-7 pb-10 pt-md-10  pb-md-9 bg-l-gray" style="<?php echo $style; ?>">
				<div class="container">
					<div class="img-txt-grid ">
                        <?php if( get_sub_field( 'image' ) ): ?>
                            <div>
                                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'w' => 'div', 'wc' => 'bg-str bg-over _l-b' ) ); ?>
                            </div>
                        <?php endif; ?>
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
			<section class="pt-3 pb-10 pt-md-7  pb-md-12 bgs-img ov-v" style="<?php echo $style; ?>">
				<div class="container">
					<div class="img-txt-grid _v2">
                        <?php if( get_sub_field( 'image' ) ): ?>
                            <div>
                                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'w' => 'div', 'wc' => 'bg-str bg-over _bg-gray' ) ); ?>
                            </div>
                        <?php endif; ?>
						<div class="img-txt-grid-with-btns">
							<div class="mb-l-0 img-txt-grid-content">
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
            <?php get_template_part_args( 'templates/content-modules-video', array( 'v' => 'video', 'c' => 'background-content__video' ) ); ?>
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
                                    <a href="<?php echo get_the_permalink( $program ); ?>" class="swiper-programm-link">
                                        <div class="swiper-programm-inner">
                                            <div class="swiper-programm-ico">
                                                <img src="<?php echo get_template_directory_uri(  ) . '/assets/img/icon-book.svg'; ?>" alt="">
                                            </div>
                                            <h4><?php echo get_the_title( $program ); ?></h4>
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
            <?php if( get_sub_field( 'background' ) ): ?>
                <?php get_template_part_args( 'templates/content-modules-video', array( 'v' => 'video', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
            <?php else: ?>
                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o', 'is' => false, 'v2x' => false ) ); ?>
            <?php endif; ?>
            <div class="container">
                <div class="mw-550 mb-l-0">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow _btn-brand', 'w' => 'p' ) ); ?>
                </div>
            </div>
        </section>
    
    <?php elseif( get_row_layout() == 'donation_form' ): ?>
        <section class="section-submit">
            <div class="container">
                <div class="block-submit _donation">
                    <h3>Make a Donation</h3>
                    <div class="donation-wrapper">
                        <!-- <h4><span class="pr-2">With PayPal:</span> <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/none-btn_donateCC_LG.gif" alt="donate" width="100"></a></h4>
                        <hr class="my-3"> -->
                        <h4>With Credit Card:</h4>
                        <script src="https://donorbox.org/widget.js" ;="" paypalexpress="false"></script>
                        <iframe id="iframeName" loading="lazy" src="https://donorbox.org/embed/website-donations-201" ;="" name="donorbox" allowpaymentrequest="allowpaymentrequest" seamless="seamless" frameborder="0" scrolling="no" height="" width="100%"></iframe>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'info' ): ?>
        <section class="pt-9 pb-7 py-md-5">
            <div class="container">
                <div class="mw-for-form2">
                    <div class="mw-550 pl-10 pl-dmd-0">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                        <div class="img-txt-btns">
                            <?php if( $phone = get_sub_field( 'phone' ) ): ?>
                            <a href="<?php echo $phone['url']; ?>" target="<?php echo $phone['target']; ?>">
                                <i class="icon-m-phone"></i><?php echo $phone['title']; ?>
                            </a>
                            <?php endif; ?>
                            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'map', 'c' => 'btn _arrow' ) ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'cards_grid' ): ?>
        <section class="pt-7 pb-9 pt-md-8 pb-md-10 bg-l-gray">
            <div class="container">
                <div class="fact-grid _with-ico pt-2 br-lg-none">
                    <div class="fact-title as-center mb-l-0">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow _s', 'w' => 'p' ) ); ?>
                    </div>
                    <?php if( have_rows( 'cards' ) ): 
                        while( have_rows( 'cards' ) ): the_row( ); ?>
                        <div>
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'icon', 'w' => 'div', 'wc' => 'bg-str-f' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h4' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                        </div>
                        <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'tabs' ): ?>
        <section class="pt-9 pb-5 pt-md-12 pb-md-50">
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                <?php if( have_rows( 'tabs' ) ): ?>
                    <div class="responsiveTabs tabs-vert pt-2">
                        <ul>
                            <?php while( have_rows( 'tabs' ) ): the_row( ); ?>
                            <li><a href="#tab-<?php echo get_row_index(); ?>"><?php the_sub_field( 'tab' ); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                        <div class="r-tabs-tab-content">
                            <?php while( have_rows( 'tabs' ) ): the_row(); ?>
                            <div id="tab-<?php echo get_row_index(); ?>">
                                <?php $content = get_sub_field( 'content' ); ?>
                                <?php if( $content['heading'] ): ?>
                                    <h3><?php echo $content['heading']; ?></h3>
                                <?php endif; ?>
                                <?php if( $content['content'] ): ?>
                                <div class="d-grid _gg-3">
                                    <?php echo $content['content']; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        
    <?php elseif( get_row_layout() == 'donor_information' ): ?>
        <section class="pt-12 pb-6">
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h3-md-big' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h3', 'tc' => 'text-brand h3-md-small' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div', 'tc' => 'd-grid text-grid _col-3 _gg-2 p-md-small' ) ); ?>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'special_funds' ): ?>
        <section class="pt-6 pb-10 py-md-5">
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h3-md-big' ) ); ?>
                <div class="d-grid text-grid _col-3 _gg-2 p-md-small">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p', 'w' => 'div' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div', 'tc' => 'span-2 px-10 px-lg-0 list-ico' ) ); ?>
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?php endwhile;
endif; ?>

<?php get_footer(); ?>