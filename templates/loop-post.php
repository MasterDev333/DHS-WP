<?php global $post; ?>
<div class="article-inner">
    <a href="<?php echo get_the_permalink( $post ); ?>">
        <?php if( $categories = get_the_category( $post ) ): ?> 
        <ul class="article-tag-list">
            <?php foreach( $categories as $category ): ?>
                <li><?php echo $category->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="bg-str">
            <?php 
            $img_url = get_the_post_thumbnail_url( $post, 'blog-card' );
            $img_url_2x = get_the_post_thumbnail_url( $post, 'blog-card-2x' ); ?>
            <img src="<?php echo $img_url; ?>" alt="img" srcset="<?php echo $img_url_2x; ?> 2x">
        </div>
        <div class="article-info">
            <h6><?php echo get_the_date( 'l F, d', $post ); ?></h6>
            <h3><?php echo get_the_title( $post ); ?></h3>
            <?php if( has_excerpt( $post ) ): ?>
                <p><?php echo get_the_excerpt( $post ); ?></p>
            <?php endif; ?>
        </div>
    </a>
</div>