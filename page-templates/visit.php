<?php
/*
Template Name: Visit
Template Post Type: page
*/
get_header(); 
global $post; ?>

<section class="py-5 pt-lg-7 pb-lg-12 p-r text-white a-center mh-50 hero-wrapper">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <div class="container">
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'mw-700' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
    </div>
</section>
<?php get_template_part( 'templates/content', 'form' ); ?>

<?php echo breadcrumb_trail(); ?>

<?php if( have_rows( 'module' ) ): 
    while( have_rows( 'module' ) ): the_row(); ?>
    <?php if( get_row_layout() == 'visit_info' ): ?>
        <section class="py-9 py-md-5 ov-v<?php echo get_sub_field( 'enable_background' ) ? ' bgs-img' : ''; ?>">
            <div class="container">
                <div class="mw-for-form">
                    <div class="mw-600 pl-10 pl-lg-0">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                        <div class="img-txt-btns">
                            <?php if( $phone = get_sub_field( 'phone' ) ): ?>
                            <a href="<?php echo $phone['url']; ?>" target="<?php echo $phone['target'] ?: '_blank'; ?>">
                                <i class="icon-m-phone"></i><?php echo $phone['title']; ?>
                            </a>
                            <?php endif; ?>
                            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'map_cta', 'c' => 'btn _arrow' ) ); ?>
                        </div>
                    </div>
                </div>
                <?php if( $images = get_sub_field( 'gallery' ) ): ?>
                <div class="mbn-13 mbn-md-7 pt-md-10">
                    <div class="img-grid _v2">
                        <?php $classNames = ['_7-3', 'a-r _3-5']; ?>
                        <?php foreach( $images as $key => $image ): ?>
                        <div>
                            <div class="bg-str <?php echo $classNames[$key]; ?>">
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'three_columns_content' ): ?>
        <section class="pt-20 pb-7 bg-l-gray p-r">
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                <div class="txt-btn-grid">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p', 'w' => 'div' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'list_content', 't' => 'div', 'tc' => 'list-content' ) ); ?>
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow', 'w' => 'p' ) ); ?>
                    </div>
                </div>
            </div>
        </section>
    
    <?php elseif( get_row_layout() == 'tour' ): ?>
        <section class="pt-12 pb-5 py-md-5">
            <div class="container">
                <div class="text-img-grid">
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                    </div>
                    <div>
                        <div class="a-r _8-5 bg-gray br-3"></div>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'map'): ?>
        <section class="pt-7 pb-5 py-md-5">
            <div class="container px-md-0">
                <div class="map-grid text-white br-lg-none">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'map', 't' => 'div', 'tc' => 'map-grid-map' ) ); ?>
                    <div class="map-grid-info">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'location', 't' => 'div', 'tc' => 'map-adress' ) ); ?>
                        <?php if( have_rows( 'map_time' ) ): ?>
                            <ul class="map-time">
                                <?php while( have_rows( 'map_time' ) ): the_row(); ?>
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'title', 't' => 'h5', 'w' => 'li' ) ); ?>
                                    <?php if( have_rows( 'times' ) ): ?>
                                    <li>
                                        <ul class="map-time-table">
                                            <?php while( have_rows( 'times' ) ): the_row(); ?>
                                            <li>
                                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'day', 't' => 'h6' ) ); ?>
                                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'time', 't' => 'span' ) ); ?>
                                            </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    </li>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    
    <?php elseif( get_row_layout() == 'media_content' ): ?>
        <section class="pt-7 pb-14 py-md-5">
            <div class="container">
                <div class="img-txt-grid">
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'is' => 'media-content-image', 'v2x' => false, 'w' => 'div', 'wc' => 'bg-str bg-over _l-b _bg-gray' ) ); ?>
                    </div>
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif( get_row_layout() == 'three_columns_text' ): ?>
        <section class="pt-10 pb-14 py-md-5 bg-l-gray">
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div', 'tc' => 'd-grid text-grid _col-3 _gg-4' ) ); ?>
            </div>
        </section>
    <?php endif; ?>
    <?php endwhile;
endif; ?>


<?php get_footer(); ?>
