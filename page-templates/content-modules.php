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
                    <div class="slider-right-row">
                        <div class="swiper swiper-article">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="article-inner">
                                        <ul class="article-tag-list">
                                            <li>New</li>
                                        </ul>
                                        <div class="bg-str">
                                            <img src="img/img2.jpg" alt="img" srcset="img/img2@2x.jpg 2x">
                                        </div>
                                        <div class="article-info">
                                            <h6>Friday October 22</h6>
                                            <h3>Article Title</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="article-inner">
                                        <div class="bg-str">
                                            <img src="img/img2.jpg" alt="img" srcset="img/img2@2x.jpg 2x">
                                        </div>
                                        <div class="article-info">
                                            <h6>Friday October 22</h6>
                                            <h3>Article Title Malesuada Fringilla Vulputate Tellus</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="article-inner">
                                        <div class="bg-str">
                                            <img src="img/img2.jpg" alt="img" srcset="img/img2@2x.jpg 2x">
                                        </div>
                                        <div class="article-info">
                                            <h6>Friday October 22</h6>
                                            <h3>Article Title</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="article-inner">
                                        <div class="bg-str">
                                            <img src="img/img2.jpg" alt="img" srcset="img/img2@2x.jpg 2x">
                                        </div>
                                        <div class="article-info">
                                            <h6>Friday October 22</h6>
                                            <h3>Article Title</h3>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="article-inner">
                                        <div class="bg-str">
                                            <img src="img/img2.jpg" alt="img" srcset="img/img2@2x.jpg 2x">
                                        </div>
                                        <div class="article-info">
                                            <h6>Friday October 22</h6>
                                            <h2>Other Title</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor ut labore et.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <?php elseif( get_row_layout() == 'media-content' ): ?>
        <?php if( get_sub_field( 'style' ) == 'general' ): ?>
			<section class="pt-7 pb-10 pt-md-10  pb-md-9 bg-l-gray">
				<div class="container">
					<div class="img-txt-grid ">
						<div>
							<div class="bg-str bg-over _l-b">
								<img src="img/img5.jpg" alt="img" srcset="img/img5@2x.jpg 2x">
							</div>
						</div>
						<div>
							<h5>our story</h5>
							<h2>Cursus Ligula Commodo Inceptos Mollis</h2>
							<p>The Dominican House of Studies is a school of theological formation for the Dominican friars of the Province of St. Joseph. For centuries, religious and laity have been formed in the sapiential wisdom of St. Thomas Aquinas.</p>
							<p>The life in which contemplation overflows into action images the diffusion of God’s communication of goodness to all creatures.</p>
							<div class="img-txt-btns _a-md-end">
								<a href="#" class="btn _arrow">Learn more</a>
							</div>
						</div>
					</div>
				</div>
			</section>
        <?php else: ?>
			<section class="pt-3 pb-10 pt-md-7  pb-md-12 bgs-img ov-v">
				<div class="container">
					<div class="img-txt-grid _v2">
						<div>
							<div class="bg-str bg-over _bg-gray">
								<img src="img/img3.jpg" alt="img" srcset="img/img3@2x.jpg 2x">
							</div>
						</div>
						<div class="img-txt-grid-with-btns">
							<div class="mb-l-0">
								<h5>for students</h5>
								<h2>Explore Life at the Dominican House of Studies</h2>
								<p>Our faculty offers a rigorous theological education, always teaching our students to receive and interpret the Word of God within the scope of the theological tradition of Saint Thomas Aquinas and to preach in the power of the Spirit to turn hearts and minds to God.</p>
							</div>
							<div class="img-txt-grid-btns">
								<a href="#" class="btn _arrow">PLAN YOUR VISIT</a>
								<a href="#" class="btn _arrow">THE EXPERIENCE</a>
								<a href="#" class="btn _arrow">APPLY TODAY</a>
							</div>
						</div>
					</div>
				</div>
			</section>
        <?php endif; ?>
    <?php elseif( get_row_layout() == 'background_content' ): ?>
        <section class="pt-14 pb-12 pt-md-12  pb-md-10 bg-gray bg-img _v1 quote-wrapper">
            <div class="container">
                <div class="mw-750 mx-a">
                    <div class="mw-500">
                        <h3><em>The human heart is animated by Truth. </em>The human being is most perfected in acts of knowledge and love. </h3>
                    </div>
                    <blockquote class="quote">
                        <p>Convinced that the human heart is most fully alive when animated by the light of truth, our patron St. Dominic founded the Order of Preachers over 800 years ago to profess the truths of the Christian faith boldly for the salvation of souls.</p>
                    </blockquote>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'testimonial' ): ?>
        <section class="pt-8 pb-10 py-md-12">
            <div class="container">
                <div class="quote-block bg-over _bg-gray _bg-md-xs">
                    <blockquote>
                        <p>“This is the ultimate perfection of the contemplative life, namely that the Divine truth be not only seen but also loved.”</p>
                        <cite>STh II-II, q. 180, a. 7, ad. 1</cite>
                    </blockquote>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'programs' ): ?>
        <section class="pt-18 pb-5 pt-md-7 pb-md-12 p-r text-white">
            <div class="bg-str-f _h-36 _h-md-30 bg-dark-o">
                <img src="img/img4.jpg" alt="img" srcset="img/img4@2x.jpg 2x">
            </div>
            <div class="container-s">
                <div class="slider-wrapper">
                    <div class="slider-left-row">
                        <div class="slider-left-tittle">
                            <h5>academics</h5>
                            <h3>Our <br> Programes</h3>
                        </div>
                        <div class="slider-left-btn d-md-none">
                            <a href="#" class="btn _arrow">SEE ALL</a>
                        </div>
                    </div>
                    <div class="slider-right-row">
                        <div class="swiper swiper-programm">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="img/img22.png" alt="img" srcset="img/img22@2x.png 2x">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="img/img23.png" alt="img" srcset="img/img23@2x.png 2x">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="img/img24.png" alt="img" srcset="img/img24@2x.png 2x">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="img/img25.png" alt="img" srcset="img/img25@2x.png 2x">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="img/img26.png" alt="img" srcset="img/img26@2x.png 2x">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="swiper-programm-inner">
                                        <div class="swiper-programm-ico">
                                            <img src="img/img27.png" alt="img" srcset="img/img27@2x.png 2x">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="text-right d-none d-md-block pt-2">
                    <a href="#" class="btn _arrow">SEE ALL</a>
                </div>
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
                        <h5>facts &amp; figures</h5>
                        <h2>By the <br> Numbers</h2>
                    </div>
                    <div>
                        <h2>4:1</h2>
                        <p><i>Small faculty-to- <br> student ratio</i></p>
                    </div>
                    <div>
                        <h2>50</h2>
                        <p><i>Dominicans in <br> formation</i></p>
                    </div>
                    <div>
                        <h2>43</h2>
                        <p><i>Years lorem ipsum <br> dolor sit amet</i></p>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'full_banner' ): ?>
        <section class="py-3 py-md-10 p-r text-white mh-58 a-center">
            <div class="bg-str-f bg-dark-o">
                <img src="img/img6.jpg" alt="img" srcset="img/img6@2x.jpg 2x">
            </div>
            <div class="container">
                <div class="mw-550 mb-l-0">
                    <h5>donate</h5>
                    <h2>Support the Dominican House of Studies</h2>
                    <p>We equip our students with a plentitude of theological wisdom and apostolic fervor so that they might share the joyful Truth of the gospel for the rest of their lives of teaching and ministry.</p>
                    <p><a href="#" class="btn _arrow _btn-brand">Give</a></p>
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?php endwhile;
endif; ?>
<?php get_footer(); ?>