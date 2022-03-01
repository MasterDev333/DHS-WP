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

<?php echo breadcrumb_trail(); ?>

<?php $args = array( 
    'post_type' => 'people',
    'post_status' => 'publish',
    'posts_per_page' => -1,
);
$query = new WP_Query( $args ); 
if( $query->have_posts( ) ): ?> 
<section class="pt-9 pb-10 pt-md-5 bgs-img">
    <div class="container">
        <div class="people-grid">
            <div>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sidebar_heading', 'o' => 'f', 't' => 'h4' ) ); ?>
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sidebar_content', 'o' => 'f', 't' => 'p' ) ); ?>
                <?php if( $roles = get_terms( 'people_role' ) ): ?>
                <h6 class="d-md-none">By Role</h6>
                <ul class="people-grid-nav d-md-none"> 
                    <?php foreach( $roles as $role ): ?>
                    <li><a href="#" data-role="<?php echo $role->slug; ?>"><?php echo $role->name; ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <div class="d-none d-md-block select-custom">
                    <select id="people-role-select" data-jcf="{&quot;wrapNative&quot;: false, &quot;wrapNativeOnMobile&quot; : false, &quot;fakeDropInBody&quot;: false}">
                        <option value="">All</option>
                        <?php foreach( $roles as $role ): ?>
                        <option value="<?php echo $role->slug; ?>"><?php echo $role->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php endif; ?>
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