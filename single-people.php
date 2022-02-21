<?php
// Single People
get_header(); 
global $post; 
$name = get_field( 'name' ); ?>

<section class="bg-l-gray d-md-none">
    <div class="container">
        <ul class="pagination-list">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url( 'people' ); ?>">People</a></li>
            <li><a href="<?php echo get_permalink( $post ); ?>"><?php echo get_the_title( $post ); ?></a></li>
        </ul>
    </div>
</section>
<section class="pt-9 pb-5 pt-md-4 bgs-img _bgs-v2 ov-v">
    <div class="container">
        <div class="d-none d-md-block pb-md-3">
            <a href="<?php echo home_url( 'people' ); ?>" class="link-back"><i class="icon-keyboard_arrow_left"></i><strong>BACK</strong></a>
        </div>
        <div class="peoples-grid">
            <div>
                <div class="bg-str _2-4 bg-over _bg-xs _bg-gray _l-b mw-md-22">
                    <img src="<?php echo get_the_post_thumbnail_url( $post ); ?>" 
                        alt="<?php echo get_the_title( $post ); ?>">
                </div>
            </div>
            <div>
                <h1 class="h2"><?php echo get_the_title( $post ); ?></h1>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'position', 'o' => 'f', 't' => 'strong', 'w' => 'div' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'study', 'o' => 'f', 't' => 'p' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'degree', 'o' => 'f', 't' => 'p' ) ); ?>
                <h6 class="pt-2">Ways to contact</h6>
                <div class="indent">
                    <?php $contact = get_field( 'contact' );
                    if( $contact['twitter'] ): ?>
                        <a href="<?php echo $contact['twitter']['url']; ?>" class="btn _out _lg"><i class="icon-twitter text-brand pr-2"></i><?php echo $contact['twitter']['title']; ?></a>
                    <?php endif; ?>
                    <?php if( $contact['email'] ): ?>
                        <a href="mailto:<?php echo $contact['email']; ?>" class="btn _out _lg"><i class="icon-envelope text-brand pr-2"></i>Email <?php the_field( 'name' ); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pt-7 pb-5 py-md-5">
    <div class="container">
        <div class="peoples-grid">
            <div>
                <h3 class="h-over">About <?php echo $name; ?></h3>
            </div>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'bio', 'o' => 'f', 't' => 'div' ) ); ?>
        </div>
    </div>
</section>
<?php if( $posts = get_field( 'related_posts' ) ): ?>
<section class="pt-5 pb-5 py-md-5">
    <div class="container">
        <div class="peoples-grid">
            <div>
                <h3 class="h-over">Recent Articles From the Preacher’s Corner</h3>
            </div>
            <div>
                <div class="d-grid text-white">
                    <?php foreach( $posts as $rpost ): ?>
                    <div>
                        <a href="<?php echo get_the_permalink( $rpost ); ?>">
                            <div class="article-inner">
                                <?php if( $categories = get_the_category( $rpost ) ): ?> 
                                    <ul class="article-tag-list">
                                        <?php foreach( $categories as $category ): ?>
                                            <li><?php echo $category->name; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <div class="bg-str">
                                    <?php 
                                    $img_url = get_the_post_thumbnail_url( $rpost, 'blog-card' );
                                    $img_url_2x = get_the_post_thumbnail_url( $rpost, 'blog-card-2x' ); ?>
                                    <img src="<?php echo $img_url; ?>" alt="img" srcset="<?php echo $img_url_2x; ?> 2x">
                                </div>
                                <div class="article-info">
                                    <h6><?php echo get_the_date( 'l F, d', $rpost ); ?></h6>
                                        <h3><?php echo get_the_title( $rpost ); ?></h3>
                                    <?php if( has_excerpt( $rpost ) ): ?>
                                        <p><?php echo get_the_excerpt( $rpost ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php if( $contact = get_field( 'contact_form' ) ): ?>
<section class="pt-7 pb-12">
    <div class="container">
        <div class="peoples-grid">
            <div>
                <h3 class="h-over">Contact <?php echo $name; ?></h3>
            </div>
            <div>
                <div class="peoples-form bg-l-gray">
                    <?php echo do_shortcode( $contact ); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>