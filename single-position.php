<?php 
// Single Position
get_header(); ?>
<?php 
$has_banner = get_field( 'has_banner' );
if( $has_banner ): ?>
<section class="section bg-primary text-white py-5 py-md-6">
    <div class="container">
        <div class="heading">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'location', 'o' => 'f', 't' => 'span', 'tc' => 'tag tag-dark', 'w' => 'div', 'wc' => 'tag-block' ) ); ?>
            <h1 class="h1-lg"><?php the_title(); ?></h1>
            <?php if( get_the_excerpt( ) ): ?>
                <p class="mb-0"><?php the_excerpt(  ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>
<section class="section py-7">
    <div class="container">
        <div class="main-column pb-0">
            <aside class="col-content">
                <div class="entry">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'div', 'tc' => 'content' ) ); ?>
                </div>
            </aside>
            <div class="col-content">
                <?php if( $form = get_field( 'form' ) ) :
                    echo do_shortcode( $form );
                endif; ?>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<section class="section py-5 py-lg-8">
    <div class="container">
        <div class="main-column pb-0">
            <aside class="col-content">
                <div class="entry">
                    <div class="heading">
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'location', 'o' => 'f', 't' => 'span', 'tc' => 'tag', 'w' => 'div', 'wc' => 'tag-block' ) ); ?>
                        <h1 class="h1-lg"><?php the_title(); ?></h1>
                    </div>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'div', 'tc' => 'content' ) ); ?>
                </div>
            </aside>
            <div class="col-content">
                <?php if( $form = get_field( 'form' ) ) :
                        echo do_shortcode( $form );
                    endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<section class="section bg-gray-color py-12">
    <div class="container">
        <div class="main-heading _md">
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_c_sub_heading', 'o' => 'o', 't' => 'span', 'tc' => 'tag', 'w' => 'div', 'wc' => 'tag-block' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_c_heading', 'o' => 'o', 't' => 'h2' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'n_c_description', 'o' => 'o', 't' => 'p', 'w' => 'div', 'wc' => 'text-gray txt-size-md' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'n_c_cta', 'o' => 'o', 'c' => 'btn btn-lg', 'w' => 'div', 'wc' => 'btn-block' ) ); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>