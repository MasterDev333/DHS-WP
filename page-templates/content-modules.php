<?php
/*
Template Name: Content Modules
Template Post Type: page
*/

get_header(); ?>

<?php if( have_rows( 'modules' ) ): 
    while( have_rows( 'modules' ) ): the_row(); ?>
        <?php if( get_row_layout() == 'content_image_block' ): ?>
            <?php 
            $direction = get_sub_field( 'content_direction' );
            $is_intro = get_sub_field( 'is_intro' ); 
            $is_advice = get_sub_field( 'enable_advice_block' );
            $is_revert = get_sub_field( 'revert_h1' );
            $id = get_sub_field( 'id' ) ? get_sub_field( 'id' ) : 'content-image-block-' . get_row_index(); 
            if( $direction == 'top' ) : ?>
                <section class="section section-info <?php echo get_module_spacing(); ?>"
                        id="<?php echo $id ?>">
                    <div class="container">
                        <div class="main-heading _md">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h3', 'tc' => 'sub-tag') ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1') ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'div') ); ?>
                        </div>
                        <?php if( $image = get_sub_field( 'image' ) ): ?>
                        <div class="img-full">
                            <img src="<?php echo $image['url']; ?>" width="1219" height="588" alt="">
                        </div>
                        <?php endif; ?>
                    </div>
                </section>
            <?php elseif( $direction == 'bottom' ): ?>
                <section class="section section-tools bg-gray-color <?php echo get_module_spacing(); ?> pt-10 pt-md-15 pb-10 pb-md-15"
                        id="<?php echo $id; ?>">
                    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'v2x' => false, 'w' => 'div', 'wc' => 'section-tools__img' ) ); ?>
                    <div class="container">
                        <div class="section-tools__content">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h3', 'tc' => 'sub-tag') ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1') ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'div') ); ?>
                        </div>
                    </div>
                </section>

            <?php else: ?>
                <section class="section section-two-tile <?php echo get_module_spacing(); ?>" 
                        id="<?php echo $id; ?>">
                    <div class="container">
                        <div class="two-tile <?php echo ($direction == 'left') ? '_right' : ''; ?> <?php echo $is_intro ? '_intro' : ''; ?>">
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'v2x' => false, 'w' => 'div', 'wc' => 'two-tile_img' ) ); ?>
                            <div class="two-tile_content"> 
                                <div class="two-tile_txt">
                                    <div class="heading">
                                        <?php 
                                        if( $is_intro ) {
                                            if( $is_revert ) {
                                                $subheading_tag = 'h2';
                                                $heading_tag = 'h1';
                                            } else {
                                                $subheading_tag = 'h1';
                                                $heading_tag = 'h2';
                                            }
                                        } else {
                                            $heading_tag = 'h2';
                                            $subheading_tag = 'h3';
                                        }
                                        ?>
                                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => $subheading_tag, 'tc' => 'sub-tag') ); ?>
                                        <?php if( $is_intro ): ?> 
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => $heading_tag, 'tc' => 'h1-lg') ); ?>
                                        <?php else: ?>
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => $heading_tag, 'tc' => 'h1') ); ?>
                                        <?php endif; ?>
                                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'div' ) ); ?>
                                        <?php if( $is_advice ):
                                            $advice = get_sub_field( 'advice_block' ); ?>
                                        <div class="block-advices">
                                            <?php if( $advice['image'] ): ?> 
                                            <div class="block-advices_img">
                                                <img src="<?php echo $advice['image']; ?>" width="32" height="32" alt="">
                                            </div>
                                            <?php endif; ?>
                                            <?php if( $advice['content'] ) : ?>
                                            <div class="block-advices_content">
                                                <p><?php echo $advice['content']; ?></p>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="btn-block pt-3">
                                            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' =>'btn btn-lg' ) ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <style>
                #<?php echo $id; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                }
            </style>
        <?php elseif( get_row_layout() == 'logos' ): ?>
            <section class="section section-companies bg-gray-color py-7 <?php echo get_module_spacing(); ?>"
                    <?php echo get_sub_field( 'id' ) ? 'id="' . get_sub_field( 'id' ) . '"' : ''; ?>>
                <div class="container">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'w' => 'div', 'wc' => 'main-heading _md') ); ?>
                    <?php if( have_rows( 'logos' ) ): ?>
                    <ul class="list-companies">
                        <?php while( have_rows( 'logos' ) ): the_row(); ?> 
                        <li>
                            <a href="<?php the_sub_field( 'link' ); ?>">
                                <img src="<?php the_sub_field( 'image' ); ?>" alt="">
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                    <div class="btn-block text-center">
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' =>'btn btn-lg' ) ); ?>
                    </div>
                </div>
            </section>
        <?php elseif( get_row_layout() == 'posts' ): ?>
            <section class="section section-post <?php echo get_module_spacing(); ?>"
                    <?php echo get_sub_field( 'id' ) ? 'id="' . get_sub_field( 'id' ) . '"' : ''; ?>>
                <div class="container _sm">
                    <div class="main-heading">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1') ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p') ); ?>
                    </div>
                    <?php if( $related_posts = get_sub_field( 'posts' ) ): ?>
                    <div class="swiper swiper-post-mobile">
                        <div class="swiper-wrapper">
                            <?php foreach( $related_posts as $related_post ): ?>
                            <div class="swiper-slide">
                                <div class="box-post">
                                    <div class="box-post_img">
                                        <a href="<?php echo get_the_permalink( $related_post ); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url( $related_post, 'related-post-thumbnail' ); ?>" 
                                                width="314" height="154" 
                                                srcset="<?php echo get_the_post_thumbnail_url( $related_post, 'related-post-thumbnail-2x' ); ?> 2x"
                                                alt="">
                                        </a>
                                    </div>
                                    <h3 class="box-post_ttl">
                                        <a href="<?php echo get_the_permalink( $related_post ); ?>"><?php echo get_the_title( $related_post ); ?></a>
                                    </h3>
                                    <p>
                                        <?php echo get_the_excerpt( $related_post ); ?>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="btn-block pt-4 text-center">
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' =>'btn btn-lg' ) ); ?>
                    </div>
                </div>
            </section>
        
        <?php elseif( get_row_layout() == 'supercharge' ): ?>
            <section class="section section-supercharge bg-secondary-color py-7 py-md-12 <?php echo get_module_spacing(); ?>"
                    <?php echo get_sub_field( 'id' ) ? 'id="' . get_sub_field( 'id' ) . '"' : ''; ?>>
                <div class="container">
                    <?php if( $images = get_field( 's_images', 'options' ) ): ?>
                    <ul class="list-charge">
                        <?php foreach( $images as $image ): ?> 
                        <li>
                            <img src="<?php echo $image['url']; ?>" width="103" height="103" alt="">
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 's_heading', 'o' => 'o', 't' => 'h2', 'tc' => 'h1') ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 's_description', 'o' => 'o', 't' => 'p' ) ); ?>
                    <div class="btn-block pt-1">
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 's_cta', 'o' => 'o', 'c' =>'btn btn-lg' ) ); ?>
                    </div>
                </div>
            </section>

        <?php elseif( get_row_layout() == 'heading_content' ): ?>
            <?php $id = get_sub_field( 'id' ) ?: 'section-almost-' . get_row_index(); ?>
			<section class="section bg-main-color text-white py-10 <?php echo get_module_spacing(); ?>" id="<?php echo $id; ?>">
				<div class="container">
					<div class="almost-block">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h3', 'tc' => 'h5') ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1') ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' =>'btn btn-lg mt-3' ) ); ?>
					</div>
				</div>
			</section>
            <style>
                #<?php echo $id; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                }
            </style>

        <?php elseif( get_row_layout() == 'about_gallery' ): ?>
            <?php $id = get_sub_field( 'id' ) ?: 'section-about-gallery-' . get_row_index(); ?>
			<section class="section <?php echo get_module_spacing(); ?>"
                    id="<?php echo $id; ?>">
				<div class="container">
					<div class="heading text-center">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h1', 'tc' => 'h1-lg') ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
					</div>
                    <?php if( $images = get_sub_field( 'gallery' ) ): ?>
                        <div class="grid-about">
                            <?php foreach( $images as $image ): ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
				</div>
			</section>
            <style>
                #<?php echo $id; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                }
            </style>

        <?php elseif( get_row_layout() == 'blue_banner' ): ?>
            <?php $id = get_sub_field( 'id' ) ?: 'section-blue-banner-' . get_row_index(); ?>
            <section class="section bg-main-color text-white py-10 <?php echo get_module_spacing(); ?>"
                    id="<?php echo $id; ?>">
				<div class="container">
					<div class="block-slogan">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1-md') ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p') ); ?>
                        <?php if( $images = get_sub_field( 'images' ) ): ?>
						<ul class="list-charge pt-4">
                            <?php foreach( $images as $image ): ?>
                                <li>
                                    <img src="<?php echo $image['url']; ?>" width="103" height="103" alt="">
                                </li>
                            <?php endforeach; ?>
						</ul>
                        <?php endif; ?>
					</div>
				</div>
			</section>
            <style>
                #<?php echo $id; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                    <?php if( get_sub_field( 'mark_type' ) == 'exclaimation_mark' ): ?>
                        background-position: center;
                        background-repeat: no-repeat;
                    <?php endif; ?>
                }
            </style>

        <?php elseif( get_row_layout() == 'two_columns_content' ): ?>
			<section class="section <?php echo get_module_spacing(); ?>" id="<?php the_sub_field( 'id' ); ?>">
				<div class="container">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1-md mb-0') ); ?>
					<div class="grid _row pb-5">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'left_column', 't' => 'div', 'tc' => 'col-12 col-md-6') ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'right_column', 't' => 'div', 'tc' => 'col-12 col-md-6') ); ?>
					</div>
                    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'is' => 'two-column-image', 'w' => 'div', 'wc'=> 'blog-img' ) ); ?>
				</div>
			</section>

        <?php elseif( get_row_layout() == 'newsletter' ): ?>
			<section class="section py-12 <?php echo get_module_spacing(); ?> <?php the_sub_field( 'background_color' ); ?>"
                    id="<?php the_sub_field( 'id' ); ?>">
                    <?php if( get_sub_field( 'style' ) == 'contact' ): ?>
                        <div class="container">
                            <div class="main-heading _md">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_c_sub_heading', 'o' => 'o', 't' => 'span', 'tc' => 'tag', 'w' => 'div', 'wc' => 'tag-block' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_c_heading', 'o' => 'o', 't' => 'h2' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_c_description', 'o' => 'o', 't' => 'p', 'w' => 'div', 'wc' => 'text-gray txt-size-md' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'n_c_cta', 'o' => 'o', 'c' => 'btn btn-lg', 'w' => 'div', 'wc' => 'btn-block' ) ); ?>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="container">
                            <div class="block-search">
                                <div class="main-heading _md">
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_f_sub_heading', 'o' => 'o', 't' => 'span', 'tc' => 'tag', 'w' => 'div', 'wc' => 'tag-block' ) ); ?>
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_f_heading', 'o' => 'o', 't' => 'h2' ) ); ?>
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_f_description', 'o' => 'o', 't' => 'p', 'w' => 'div', 'wc' => 'text-gray txt-size-md' ) ); ?>
                                </div>
                                <?php if( $form = get_field( 'n_form', 'options' ) ): ?>
                                    <div class="box-search">
                                        <?php echo $form; ?>
                                    </div>
                                <?php endif; ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_f_form_description', 'o' => 'o', 't' => 'div', 'tc' => 'text-gray txt-size-md text-center' ) ); ?>
                            </div>
                        </div>
                    <?php endif; ?>
			</section>

        <?php elseif( get_row_layout() == 'integrations' ): ?>
            <?php $sId = get_sub_field( 'id' ) ?: 'section-integrations-' . get_row_index(); ?>
			<section class="section <?php echo get_module_spacing(); ?>"
                    id="<?php echo $sId; ?>">
				<div class="container">
					<div class="heading text-center">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h1', 'tc' => 'h1-lg' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
					</div>
                    <?php $args = array(
                        'post_type' => 'integration',
                        'post_status' => 'publish',
                        'posts_per_page' => -1
                    ); 
                    $integrations = new WP_Query( $args ); 
                    if( $integrations->have_posts() ): ?> 
					<div class="grid _row">
                        <?php while( $integrations->have_posts() ): $integrations->the_post(); 
                        $pid = get_the_ID( ); ?>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="box-tools">
								<div class="box-tools_img">
									<a href="<?php echo get_the_permalink( $pid ); ?>">
										<img src="<?php echo get_the_post_thumbnail_url( $pid ); ?>" alt="">
									</a>
								</div>
								<div class="box-tools_content">
									<h3><a href="<?php echo get_the_permalink( $pid ); ?>"><?php echo get_the_title( $pid ); ?></a></h3>
									<?php if( $excerpt = get_the_excerpt( $pid ) ): ?>
                                        <p><?php echo $excerpt; ?></p>
                                    <?php endif; ?>
									<div class="btn-block">
										<a class="btn-link" href="<?php echo get_the_permalink( $pid ); ?>">Learn More →</a>
									</div>
								</div>
							</div>
						</div>
                        <?php endwhile; ?>
					</div>
                    <?php endif; 
                    wp_reset_query(  ); ?>
				</div>
			</section>
            <style>
                #<?php echo $sId; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                }
            </style>

        <?php elseif( get_row_layout() == 'blockquote' ): ?>
            <section class="section bg-gray-color py-8 <?php echo get_module_spacing(); ?>">
				<div class="container">
					<div class="block-testiminials">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'text', 't' => 'p', 'w' => 'blockquote' ) ); ?>
						<div class="testimonials-item _row _big">
                            <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'avatar', 't' => 'div', 'tc' => 'testimonials-item_img', 'v2x' => false ) ); ?>
							<div class="testimonials-item_content">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'name', 't' => 'span', 'tc' => 'testimonials-item_name' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'role', 't' => 'p' ) ); ?>
							</div>
						</div>
					</div>
				</div>
			</section>

        <?php elseif( get_row_layout() == 'customers' ): ?>
            <?php $sId = get_sub_field( 'id' ) ?: 'section-customers-' . get_row_index(); ?>
			<section class="section <?php echo get_module_spacing(); ?>"
                    id="<?php echo $sId; ?>">
				<div class="container">
					<div class="heading text-center">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h1', 'tc' => 'h1-lg' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
					</div>
                    <?php if( have_rows( 'images' ) ): ?>
					<ul class="list-companies list-companies-add pt-5">
                        <?php while( have_rows( 'images' ) ): the_row(); ?>
						<li>
							<a href="<?php the_sub_field( 'link' ); ?>">
                                <img src="<?php the_sub_field( 'image' ); ?>" alt="">
                            </a>
						</li>
                        <?php endwhile; ?>
					</ul>
                    <?php endif; ?>
				</div>
			</section>
            <style>
                #<?php echo $sId; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                }
            </style>

        <?php elseif( get_row_layout() == 'video_customers' ): ?>
			<section class="section py-8">
				<div class="container _sm">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'h1', 'w' => 'div', 'wc' => 'main-heading _lg' ) ); ?>
                    <?php if( have_rows( 'videos' ) ): ?>
					<div class="grid _row">
                        <?php while( have_rows( 'videos' ) ): the_row( ); ?>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="box-post">
								<div class="box-post_img">
									<a href="#">
                                        <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'is' => 'video-post' ) ); ?>
									</a>
								</div>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'tag', 't' => 'span', 'tc' => 'sub-tag' ) ); ?>
								<h3 class="box-post_ttl"><a href="#"><?php the_sub_field( 'title' ); ?></a></h3>
							</div>
						</div>
                        <?php endwhile; ?>
					</div>
                    <?php endif; ?>
				</div>
			</section> 
        
        <?php elseif( get_row_layout() == 'timer_slider' ): ?>
            <?php $sId = get_sub_field( 'id' ) ?: 'timer-slider-' . get_row_index(); ?>
            <section class="section timer-slider bg-main-color <?php echo get_module_spacing(); ?>" id="<?php echo $sId; ?>">
                <div class="container">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'timer-slider__heading' ) ); ?>
                    <?php if( have_rows( 'slides' ) ): ?>
                    <div class="timer-slider__inner">
                        <div class="timer-slider__titles">
                            <?php 
                            while( have_rows( 'slides' ) ): the_row( ); 
                                get_template_part_args( 'templates/content-modules-text', array( 'v' => 'title', 't' => 'div', 'tc' => 'timer-slider__title' ) ); 
                            endwhile; ?>
                        </div>
                        <div class="timer-slider__images swiper">
                            <div class="swiper-wrapper">
                                <?php while( have_rows( 'slides' ) ): the_row( ); 
                                    get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'c' => 'timer-slider__image', 'w' => 'div', 'wc' => 'swiper-slide bg-main-color', 'v2x' => false ) );
                                endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
            <?php $sId = get_sub_field( 'id' ) ?: 'timer-slider-' . get_row_index(); ?>
            <section class="section timer-slider bg-main-color <?php echo get_module_spacing(); ?>" id="<?php echo $sId; ?>">
                <div class="container">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'timer-slider__heading' ) ); ?>
                    <?php if( have_rows( 'slides' ) ): ?>
                    <div class="timer-slider__inner">
                        <div class="timer-slider__titles">
                            <?php 
                            while( have_rows( 'slides' ) ): the_row( ); 
                                get_template_part_args( 'templates/content-modules-text', array( 'v' => 'title', 't' => 'div', 'tc' => 'timer-slider__title' ) ); 
                            endwhile; ?>
                        </div>
                        <div class="timer-slider__images swiper">
                            <div class="swiper-wrapper">
                                <?php while( have_rows( 'slides' ) ): the_row( ); 
                                    get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'c' => 'timer-slider__image', 'w' => 'div', 'wc' => 'swiper-slide bg-main-color', 'v2x' => false ) );
                                endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
            
        <?php elseif( get_row_layout() == 'content_form'): ?>
            <?php $sId = get_sub_field( 'id' ) ?: 'content-form-' . get_row_index(); ?>
            <section class="section content-form <?php echo get_module_spacing(); ?>" id="<?php echo $sId; ?>">
                <div class="container">
                    <div class="content-form__inner">
                        <div class="content-form__content">
                            <div class="tag-block">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'tag', 't' => 'span', 'tc' => 'tag' ) ); ?>
                            </div>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h1', 'tc' => 'h1 contact-heading' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'div', 'tc' => 'contact-desc' ) ); ?>
                        </div>
                        <div class="content-form__form">
                            <div class="box-contact">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'form_heading', 't' => 'h2', 'tc' => 'box-contact__title' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'form_description', 't' => 'p', 'tc' => 'box-contact__desc' ) ); ?> 
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'form', 't' => 'div', 'tc' => 'box-contact__form' ) ); ?> 
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <style>
                #<?php echo $sId; ?> mark {
                    background-image: url("<?php echo get_mark_image(); ?>");
                }
            </style>

        <?php elseif( get_row_layout() == 'progress_items' ): ?>
            <?php $sId = get_sub_field( 'id' ) ?: 'progress-items-' . get_row_index(); ?>
            <section class="progress-items__section py-12 bg-main-color <?php echo get_module_spacing(); ?>" id="<?php echo $sId; ?>">
                <div class="container">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'progress-items__heading' ) ); ?>
                    <?php if( have_rows( 'items' ) ): ?>
                    <div class="progress-items">
                        <?php while( have_rows( 'items' ) ): the_row( ); ?>
                            <div class="progress-item">
                                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'c' => 'progress-item__img', 'v2x' => false ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'text', 't' => 'p', 'tc' => 'progress-item__text' ) ); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif( get_row_layout() == 'feedbacks' ): ?>
            <?php $sId = get_sub_field( 'id' ) ?: 'feedbacks-' . get_row_index(); ?>
            <section class="feedbacks bg-gray-color py-12 <?php echo get_module_spacing(); ?>" id="<?php echo $sId; ?>">
                <div class="container">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2', 'tc' => 'feedbacks-heading' ) ); ?>
                    <?php if( have_rows( 'items' ) ): ?>
                        <div class="feedback-items">
                            <?php while( have_rows( 'items' ) ): the_row( ); ?>
                            <div class="feedback-item">
                                <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'logo', 'c' => 'feedback-item__logo', 'v2x' => false ) ); ?>
                                <div class="feedback-item__rating">
                                    <img src="<?php echo get_template_directory_uri(  ); ?>/assets/img/rating-stars.svg" alt="">
                                    <div class="feedback-item__rating--mask" style="width: <?php echo (100 - get_sub_field( 'rating' ) * 20); ?>%;"></div>
                                </div>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'title', 't' => 'h3', 'tc' => 'feedback-item__title' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div', 'tc' => 'feedback-item__content' ) ); ?>
                                <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'link', 'c' => 'feedback-item__cta' ) ); ?>
                            </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>
<?php endwhile;
endif; ?>
<?php get_footer(); ?>