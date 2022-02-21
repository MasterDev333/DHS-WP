<?php 
// Single Position
get_header(); 
global $post; 
?>
<?php if( get_field( 'enable_section' ) ) : ?>
<section class="pt-10 pb-10 py-md-5 p-r text-white">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <div class="container">
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 'o' => 'f', 't' => 'h1', 'tc' => 'mw-550' ) ); ?>
        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'o' => 'f', 't' => 'p', 'tc' => 'mw-450' ) ); ?>
    </div>
</section>
<?php endif; ?>
<section class="bg-l-gray d-md-none">
    <div class="container">
        <ul class="pagination-list">
            <li><a href="<?php echo home_url(); ?>">Home</a></li>
            <li><a href="<?php echo home_url( '/academics' ); ?>">Academics</a></li>
            <li><?php echo get_the_title( $post ); ?></li>
        </ul>
    </div>
</section>

<section class="pt-12 pb-12 pt-md-2 pb-md-6 bgs-img">
    <div class="container">
        <div class="main-column">
            <aside id="sidebar" class="fixed-block">
                <div class="fixed-item sidebar-m-hidden">
                    <em class="mark pb-6">on this page</em>
                    <?php if( have_rows( 'modules' ) ): ?>
                    <nav class="side">
                        <ul class="side-nav">
                            <?php while( have_rows( 'modules' ) ): the_row(); ?>
                                <li><a class="anchor-link" href="#section-<?php echo get_row_index(); ?>"><?php echo get_sub_field( 'heading' ); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </nav>
                    <?php endif; ?>
                    <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'sidebar_cta', 'o' => 'f', 'c' => 'btn _arrow _full', 'w' => 'div', 'wc' => 'btn-block' ) ); ?>
                </div>
                <?php if( have_rows( 'modules' ) ): ?>
                <div class="select-m-page">
                    <div class="select-page">
                        <select data-jcf="{&quot;wrapNative&quot;: false, &quot;wrapNativeOnMobile&quot; : false, &quot;fakeDropInBody&quot;: false}">
                            <option class="hideme">On this page</option>
                            <?php while( have_rows( 'modules' ) ): the_row(); ?>
                                <option class="#section-<?php echo get_row_index(); ?>"><?php echo get_sub_field( 'heading' ); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
            </aside>
            <div id="content">
                <div class="pb-5">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'modules_title', 'o' => 'f', 't' => 'h2' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'modules_description', 'o' => 'f', 't' => 'p' ) ); ?>
                </div>
                <?php if( have_rows( 'modules' ) ): 
                    while( have_rows( 'modules' ) ): the_row(); ?>
                    <?php if( get_row_layout() == 'facts' ): ?>
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor" data-index="<?php echo get_row_index(); ?> ">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h-over' ) ); ?>
                            <?php if( have_rows( 'items' ) ): ?>
                            <div class="quick-facts">
                                <?php while( have_rows( 'items' ) ): the_row(); ?>
                                    <div class="quick-facts-item">
                                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                                        <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'em', 'w' => 'p' ) ); ?>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                        </div>

                    <?php elseif( get_row_layout() == 'media_content' ): ?> 
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h-over' ) ); ?>
                            <div class="img-c-grid i-mb-l-0">
                                <?php if( $image = get_sub_field( 'image' ) ): ?>
                                <div>
                                    <figure class="wp-caption">
                                        <div class="bg-str _sm-3-2 _3-2 bg-over _bg-gray _l-b _bg-xs">
                                            <img src="<?php echo $image['url']; ?>" 
                                                alt="<?php echo $image['alt']; ?>">
                                        </div>
                                        <?php if( $caption = get_sub_field( 'caption' ) ): ?>
                                        <figcaption><?php echo $caption; ?></figcaption>
                                        <?php endif; ?>
                                    </figure>
                                </div>
                                <?php endif; ?>
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 'w' => 'div', 'wc' => 'pb-4 pb-md-0' ) ); ?>
                            </div>
                        </div>

                    <?php elseif( get_row_layout() == 'accordion' ): ?>
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h-over' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                            <div class="block-courses">
                                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'a_heading', 't' => 'h3' ) ); ?>
                                <?php if( have_rows( 'accordions' ) ): ?> 
                                <div class="accordion">
                                    <?php while( have_rows( 'accordions' ) ): the_row(); ?>
                                    <div class="accordion-holder">
                                        <div class="accordion-panel opener">
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3' ) ); ?>
                                        </div>
                                        <div class="accordion-content slide">
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                                            <?php if( $table = get_sub_field( 'table' ) ): ?>
                                            <table class="table-info _border">
                                                <?php if( !empty( $table['header'] ) ): ?>
                                                <thead>
                                                    <tr>
                                                        <?php foreach( $table['header'] as $th ): ?>
                                                        <th scope="col"><?php echo $th['c']; ?></th>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                </thead>
                                                <?php endif; ?>
                                                <tbody>
                                                    <?php foreach( $table['body'] as $tr ): ?>
                                                    <tr>
                                                        <?php foreach( $tr as $td ): ?>
                                                        <td><?php echo $td['c']; ?></td>
                                                        <?php endforeach; ?>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php elseif( get_row_layout() == 'table' ): ?>
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h-over' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                            <?php if( have_rows( 'tables' ) ): 
                                while( have_rows( 'tables' ) ): the_row(); 
                                $size = get_sub_field( 'table_size' ); 
                                $table = get_sub_field( 'table' ); ?>
                                <table class="table-info _add <?php echo '_' . $size; ?>">
                                    <?php if( !empty( $table['header'] ) ): ?>
                                    <thead>
                                        <tr>
                                            <?php foreach( $table['header'] as $th ): ?>
                                            <th scope="col"><?php echo $th['c']; ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <?php endif; ?>
                                    <tbody>
                                        <?php foreach( $table['body'] as $tr ): ?> 
                                        <tr>
                                            <?php foreach( $tr as $key=>$td ): ?>
                                            <td>
                                                <?php if( $key == 0 ): ?>
                                                    <p><strong><?php echo $td['c']; ?></strong></p>
                                                <?php else: ?> 
                                                    <p><?php echo $td['c']; ?></p>
                                                <?php endif; ?>
                                            </td>
                                            <?php endforeach; ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endwhile;
                            endif; ?>
                        </div>

                    <?php elseif( get_row_layout() == 'list_boxes' ): ?>
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h-over' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                            <?php if( have_rows( 'items' ) ): ?>
                                <ul class="block-info-list">
                                    <?php while( have_rows( 'items' ) ): the_row(); ?>
                                        <li>
                                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'text', 't' => 'p', 'w' => 'div', 'wc' => 'block-info' ) ); ?>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    
                    <?php elseif( get_row_layout() == 'learn_more' ): ?>
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor">
                            <div class="img-txt-grid-with-btns">
                                <div class="mb-l-0">
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h5' ) ); ?>
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'sub_heading', 't' => 'h3' ) ); ?>
                                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'p' ) ); ?>
                                </div>
                                <?php if( have_rows( 'buttons' ) ): ?> 
                                    <div class="img-txt-grid-btns">
                                        <?php while( have_rows( 'buttons' ) ): the_row();
                                            get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'cta', 'c' => 'btn _arrow _full' ) );
                                        endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php elseif( get_row_layout() == 'custom_content' ): ?>
                        <div id="section-<?php echo get_row_index(); ?>" class="section-anchor">
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'heading', 't' => 'h3', 'tc' => 'h-over' ) ); ?>
                            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'content', 't' => 'div' ) ); ?>
                        </div>
                    <?php endif; ?>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>

<?php if( get_field( 'bottom_enable_section' ) ) : ?>
<section class="py-3 py-md-5 p-r text-white mh-58 a-center">
    <?php get_template_part_args( 'templates/content-modules-image', array( 'v' => 'bottom_background', 'o' => 'f', 'w' => 'div', 'wc' => 'bg-str-f bg-dark-o' ) ); ?>
    <div class="container">
        <div class="mw-550 mb-l-0">
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'bottom_sub_heading', 'o' => 'f', 't' => 'h5' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'bottom_heading', 'o' => 'f', 't' => 'h2' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'bottom_content', 'o' => 'f', 't' => 'p' ) ); ?>
            <?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'bottom_cta', 'o' => 'f', 'c' => 'btn _arrow _btn-brand' ) ); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>