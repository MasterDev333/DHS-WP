		<footer class="page-footer text-white">
			<div class="footer-top bg-metal">
				<div class="container">
					<div class="footer-logo">
						<a href="<?php echo home_url( ); ?>">
							<?php $site_logo = get_field( 'logo', 'options' ) ?: get_template_directory_uri(  ) . '/assets/img/logo-new.svg'; ?>
							<img src="<?php echo $site_logo; ?>" alt="">
						</a>
					</div>
					<?php if( $phone = get_field( 'phone', 'options' ) ): ?>
					<div class="footer-info">
						<a href="<?php echo $phone['url']; ?>"><i class="icon-m-phone"></i><?php echo $phone['title']; ?></a>
					</div>
					<?php endif; ?>
					<?php if( $location = get_field( 'location', 'options' ) ): ?>
					<div class="footer-info">
						<a href="<?php echo $location['url']; ?>" target="<?php echo $location['target'] ?: '_blank'; ?>">
							<i class="icon-m-map"></i><?php echo $location['title']; ?>
						</a>
					</div>
					<?php endif; ?>
					<div class="online">
						<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'news_heading', 'o' => 'o', 't' => 'span', 'tc' => 'online-tittle' ) ); ?>
						<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'news_tag', 'o' => 'o', 't' => 'span', 'tc' => 'online-count' ) ); ?>
					</div>
					<div class="footer-btns">
						<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'news_apply_cta', 'o' => 'o', 'c' => 'btn _out _t-white' ) ); ?>
						<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'news_give_cta', 'o' => 'o', 'c' => 'btn _t-black' ) ); ?>
					</div>
				</div>
			</div>
			<div class="footer-bottom bg-black">
				<div class="container">
					<?php if( have_rows( 'social', 'options' ) ): ?>
					<div class="d-none d-md-block pt-3">
						<ul class="footer-social">
							<?php while( have_rows( 'social', 'options' ) ): the_row();
								if( $link = get_sub_field( 'link' ) ): ?>
								<li>
									<a href="<?php echo $link['url']; ?>" target="_blank">
										<i class="icon-<?php echo $link['title']; ?>"></i>
									</a>
								</li>
							<?php endif;
							endwhile; ?>
						</ul>
					</div>
					<?php endif; ?>
					<div class="footer-bottom-grid">
						<?php clean_footer_menu( 'footermenu' ); ?>
					</div>
					<div class="footer-bottom-b">
						<?php $copy = get_field( 'copy_text', 'options' ) ?: 'Dominican House of Studies. All rights reserved.'; ?>
						<span>&copy; <?php echo date( 'Y' ); ?> <?php echo $copy; ?></span>
						<?php if( have_rows( 'social', 'options' ) ): ?>
						<ul class="footer-social d-md-none">
							<?php while( have_rows( 'social', 'options' ) ): the_row();
								if( $link = get_sub_field( 'link' ) ): ?>
								<li>
									<a href="<?php echo $link['url']; ?>" target="_blank">
										<i class="icon-<?php echo $link['title']; ?>"></i>
									</a>
								</li>
								<?php endif;
							endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</footer>
	</div>
	<?php wp_footer(); ?>	
</body>
</html>