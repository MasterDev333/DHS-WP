<?php
/*
Template Name: Apply
Template Post Type: page
*/
get_header( 'apply' ); 
global $post;
?>

<section class="pt-20 pb-5 pb-lg-8 pt-lg-15 p-r text-white mh-84 hero-wrapper">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <div class="container">
        <div class="mw-for-form">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'mw-700' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
        </div>
    </div>
</section>
<?php get_template_part( 'templates/content', 'form' ); ?>

<?php echo breadcrumb_trail(); ?>

<section class="pt-3 pb-6 py-md-2">
    <div class="container">
        <div class="block-nav-anchors sidebar-m-hidden">
            <span class="sub-ttl">on this page</span>
            <?php if( have_rows( 'page_navigation' ) ): ?>
            <ul class="nav-anchors">
                <?php while( have_rows( 'page_navigation' ) ): the_row(); 
                $link = get_sub_field( 'link' ); ?>
                <li><a class="anchor-link" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a></li>
                <?php endwhile; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="select-m-page">
            <div class="select-page mb-0">
                <select data-jcf="{&quot;wrapNative&quot;: false, &quot;wrapNativeOnMobile&quot; : false, &quot;fakeDropInBody&quot;: false}">
                    <option class="hideme">On this page</option>
                    <?php while( have_rows( 'page_navigation' ) ): the_row(); 
                    $link = get_sub_field( 'link' ); ?>
                    <option class="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
    </div>
</section>
<?php if( have_rows( 'modules' ) ): 
    while( have_rows( 'modules' ) ): the_row(); ?>
    <?php if( get_row_layout() == 'media_content' ): 
        $content_direction = get_sub_field( 'content_direction' );
        $backdrop_color = get_sub_field( 'backdrop_color' );
        $className = ( $backdrop_color == 'gray' ) ? 'bg-str bg-over _l-b _bg-gray' : 'bg-str bg-over _l-b'; ?>
        <section id="<?php the_sub_field( 'id' ); ?>" class="pt-3 pb-14 py-md-5">
            <div class="container">
                <div class="img-txt-grid <?php echo $content_direction == 'left' ? '_revert' : ''; ?>">
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'image', 'w' => 'div', 'wc' => $className ) ); ?>
                    </div>
                    <div>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                        <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow', 'w' => 'div', 'wc' => 'img-txt-btns' ) ); ?>
                    </div>
                </div>
            </div>
        </section>
    <?php elseif( get_row_layout() == 'inline_blocks' ):
        $style = get_sub_field( 'style' ); ?>
        <section id="<?php the_sub_field( 'id' ); ?>" class="py-8 py-md-5 bg-l-gray">
            <div class="container">
                <?php if( $style == 'inline_content' ): ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                <?php endif; ?>
                <div class="fact-grid<?php echo $style == 'inline-content' ? ' _v2 pt-2' : ''; ?>">
                    <div class="fact-title">
                        <?php if( $style == 'inline_all' ): ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h5' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                        <?php endif; ?> 
                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'description', 't' => 'p' ) ); ?>
                    </div>
                    <?php if( have_rows( 'blocks' ) ): 
                    while( have_rows( 'blocks' ) ): the_row( ); ?>
                    <div>
                        <?php if( $style == 'inline_content' ): ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'small', 'w' => 'p' ) ); ?>
                        <?php else: ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'i', 'w' => 'p' ) ); ?>
                        <?php endif; ?>

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

    <?php elseif( get_row_layout() == 'simple_content' ): ?>
        <?php 
        if( !get_sub_field( 'remove_margin_top' ) ) {
            $class[] = 'mt-10';
        }
        if( !get_sub_field( 'remove_margin_bottom' ) ) {
            $class[] = 'mb-10';
        } ?>
        <section class="<?php echo implode( ' ', $class ); ?>">
            <div class="container">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h2' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div' ) ); ?>
            </div>
        </section>
    <?php endif; ?>
<?php endwhile; 
endif; ?>
<?php get_footer(); ?>