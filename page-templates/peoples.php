<?php
/*
Template Name: Peoples
Template Post Type: page
*/
get_header(); 
global $post; ?>

<section class="pt-5 pb-5 pt-md-8 pt-md-3 p-r text-white mh-50 a-center">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <div class="container">
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'mw-550' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
    </div>
</section>
<section class="bg-l-gray d-md-none">
    <div class="container">
        <ul class="pagination-list">
            <li><a href="<?php echo home_url( ); ?>">Home</a></li>
            <li><a href="<?php echo get_the_permalink( $post ); ?>"><?php echo get_the_title( $post ); ?></a></li>
        </ul>
    </div>
</section>

<?php $args = array( 
    'post_type' => 'people',
    'post_status' => 'publish',
);
$query = new WP_Query( $args ); 
if( $query->have_posts( ) ): ?> 
<section class="pt-9 pb-10 pt-md-5 bgs-img">
    <div class="container">
        <div class="people-grid">
            <div>
                <h4>Our People</h4>
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                <h6 class="d-md-none">By Role</h6>
                <ul class="people-grid-nav d-md-none">
                    <li><a href="#">Admininstration</a></li>
                    <li class="active"><a href="#">Faculty</a></li>
                    <li><a href="#">Staff</a></li>
                </ul>
                <div class="d-none d-md-block select-custom">
                    <select data-jcf="{&quot;wrapNative&quot;: false, &quot;wrapNativeOnMobile&quot; : false, &quot;fakeDropInBody&quot;: false}">
                        <option>Sort by role</option>
                        <option>Sort by other</option>
                        <option>Sort by other2</option>
                        <option>Sort by other3</option>
                    </select>
                </div>
            </div>
            <div>
                <ul class="people-grid-list">
                    <?php while( $query->have_posts() ): $query->the_post();
                        get_template_part( 'templates/loop', 'people' ); 
                    endwhile; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; 
wp_reset_query(); ?>
<?php get_footer(); ?>