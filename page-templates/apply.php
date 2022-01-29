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
<section class="section-submit">
    <div class="container">
        <div class="block-submit">
            <div class="block-submit-top">
                <div class="block-submit_title">
                    <h3>Apply for Next Semester</h3>
                    <p>Apply Before January 31, 2021</p>
                </div>
                <div class="calendar-item">
                    <span class="calendar-item-title">Start Date</span>
                    <div class="calendar-item-content">
                        <span class="dates">04</span>
                        <span class="dates num">21</span>
                    </div>
                </div>
            </div>
            <div class="block-submit-content">
                <div class="block-submit_head">
                    <p>Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. </p>
                </div>
                <form class="form-submit" action="#">
                    <div class="form-item form-item-black">
                        <label class="filter-results-label">
                            <span>Your Name</span>
                            <input type="text" placeholder="John Smith">
                        </label>
                    </div>
                    <div class="form-item form-item-black">
                        <label class="filter-results-label">
                            <span>Email</span>
                            <input type="email" placeholder="joohn.smith@gmail.com">
                        </label>
                    </div>
                    <div class="form-item form-item-black">
                        <label class="filter-results-label">
                            <span>Phone</span>
                            <input type="tel" placeholder="(555) 333-4445">
                        </label>
                    </div>
                    <div class="form-item form-item-black">
                        <label class="filter-tags-label">
                            <span>Program Choice</span>
                            <select>
                                <option>Select One</option>
                                <option>Select Two</option>
                            </select>
                        </label>
                    </div>
                    <div class="form-item text-center">
                        <button class="btn btn-md btn-yellow _arrow">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="bg-l-gray d-md-none">
    <div class="container">
        <ul class="pagination-list">
            <li><a href="<?php echo home_url( ); ?>">Home</a></li>
            <li><a href="<?php echo get_permalink( $post ); ?>"><?php echo get_the_title( $post ); ?></a></li>
        </ul>
    </div>
</section>
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
    <?php endif; ?>
<?php endwhile; 
endif; ?>
<?php get_footer(); ?>