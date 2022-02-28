<?php $cpost = $args['post']; ?>
<a href="<?php echo get_the_permalink( $cpost ); ?>">
    <div class="article-inner">
        <?php if( $categories = get_the_category( $cpost ) ): ?> 
        <ul class="article-tag-list">
            <?php foreach( $categories as $category ): ?>
                <li><?php echo $category->name; ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <div class="bg-str">
            <?php 
            $img_url = get_the_post_thumbnail_url( $cpost, 'blog-card' );
            $img_url_2x = get_the_post_thumbnail_url( $cpost, 'blog-card-2x' ); ?>
            <img src="<?php echo $img_url; ?>" alt="img" srcset="<?php echo $img_url_2x; ?> 2x">
        </div>
        <div class="article-info">
            <h6><?php echo get_the_date( 'l F, d', $cpost ); ?></h6>
            <h3><?php echo get_the_title( $cpost ); ?></h3>
            <?php if( has_excerpt( $cpost ) ): ?>
                <p><?php echo get_the_excerpt( $cpost ); ?></p>
            <?php endif; ?>
        </div>
    </div>
</a>