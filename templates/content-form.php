<section class="section-submit">
    <div class="container">
        <div class="block-submit">
            <div class="block-submit-top">
                <div class="block-submit_title">
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'f_heading', 'o' => 'f', 't' => 'h3' ) ); ?>
                    <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'f_subheading', 'o' => 'f', 't' => 'p' ) ); ?>
                </div>
                <?php if( $date_string = get_field( 'f_date' ) ): ?>
                <div class="calendar-item">
                    <span class="calendar-item-title">Start Date</span>
                    <?php $date = DateTime::createFromFormat('Ymd', $date_string); ?>
                    <div class="calendar-item-content">
                        <span class="dates"><?php echo $date->format( 'm' ); ?></span>
                        <span class="dates num"><?php echo $date->format( 'd' ); ?></span>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="block-submit-content">
                <?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'f_description', 'o' => 'f', 't' => 'p', 'w' => 'div', 'wc' => 'block-submit_head' ) ); ?>
                <?php if( $form = get_field( 'form' ) ): ?>
                <div class="form-submit">
                    <?php echo do_shortcode( $form ); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>