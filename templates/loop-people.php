<?php global $post; ?>
<li>
    <?php if( $primary_term = get_primary_taxonomy_term( $post, 'people_role' ) ): ?>
    <h5><?php echo $primary_term['title']; ?></h5>
    <?php endif; ?>
    <a href="<?php echo get_the_permalink( $post ); ?>">
        <h2><?php echo get_the_title( $post ); ?></h2>
    </a>
    <?php if( $position = get_field( 'position', $post ) ): ?>
    <h6><?php echo $position; ?></h6>
    <?php endif; ?>
    <div class="people-grid-btn">
        <?php if( $study = get_field( 'study', $post ) ): ?> 
            <span><?php echo $study; ?></span>
        <?php endif; ?>
        <a href="<?php echo get_the_permalink( $post ); ?>">Read Bio</a>
    </div>
</li>