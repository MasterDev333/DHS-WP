<?php get_header(); ?>
<section class="section py-5 py-lg-10">
    <div class="container">
        <div class="main-content">
            <aside class="aside">
                <div class="aside-block aside-block-top">
                    <?php if( get_the_post_thumbnail( ) ): ?>
                    <div class="block-item-company">
                        <img src="<?php echo get_the_post_thumbnail_url( ); ?>" width="171" height="171" alt="">
                    </div>
                    <?php endif; ?>
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'demo_link', 'o' => 'f', 'c' => 'btn btn-lg btn-full', 'w' => 'div', 'wc' => 'btn-block lg-hidden' ) ); ?>
                    <h1 class="lg-show"><?php the_title( ); ?></h1>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 'o' => 'f', 't' => 'p' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'demo_link', 'o' => 'f', 'c' => 'btn btn-lg btn-full', 'w' => 'div', 'wc' => 'btn-block lg-show' ) ); ?>
                </div>
                <div class="aside-block lg-hidden">
                    <div class="aside-info">
                        <h6>supported languages</h6>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'languages', 'o' => 'f', 't' => 'p' ) ); ?>
                    </div>
                    <div class="aside-info">
                        <h6>Additional information</h6>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'additional_information', 'o' => 'f', 't' => 'div' ) ); ?>
                    </div>
                </div>
            </aside>
            <div class="content">
                <h1 class="lg-hidden"><?php the_title(); ?></h1>
                <?php if( have_rows( 'tabs' ) ): ?> 
                <div class="tabset-block">
                    <ul class="tabset">
                        <?php while( have_rows( 'tabs' ) ): the_row(); ?>
                        <li>
                            <a href="#tab1-<?php echo get_row_index(); ?>"><?php the_sub_field( 'name'); ?></a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <div class="tab-content">
                    <?php while( have_rows( 'tabs' ) ): the_row(); ?>
                    <div id="tab1-<?php echo get_row_index(); ?>">
                        <?php if( have_rows( 'slider' ) ): ?>
                        <div class="swiper swiper-gallery">
                            <div class="swiper-wrapper">
                                <?php while( have_rows( 'slider' ) ): the_row(); ?>
                                <div class="swiper-slide">
                                    <div class="swiper-gallery_item">
                                        <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'is' => 'integration-slider', 'w' => 'div', 'wc' => 'swiper-gallery_img' ) ); ?>
                                        <div class="swiper-gallery_content">
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                        <?php endif; ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p', 'w' => 'div', 'wc' => 'tab-holder' ) ); ?>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
                <div class="aside-block lg-show">
                    <div class="aside-info">
                        <h6>supported languages</h6>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'languages', 'o' => 'f', 't' => 'p' ) ); ?>
                    </div>
                    <div class="aside-info">
                        <h6>Additional information</h6>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'additional_information', 'o' => 'f', 't' => 'div' ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>