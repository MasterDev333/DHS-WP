		
			<footer class="footer">
				<div class="container">
					<div class="footer-holder">
						<div class="footer-row">
							<div class="footer-col _info">
								<div class="footer-col_info">
									<a class="footer-logo" href="<?php echo esc_url( home_url(  ) ); ?>">
										<?php if( $f_logo = get_field( 'f_logo', 'options' ) ): ?>
										<img src="<?php echo $f_logo['url']; ?>" width="112" height="27" alt="Hoopla by Raydiant">
										<?php else: ?>
											Hoopla by Raydiant
										<?php endif; ?>
									</a>
									<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'f_heading', 'o' => 'o', 't' => 'h2') ); ?>
									<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'f_description', 'o' => 'o', 't' => 'p') ); ?>
								</div>
							</div>
							<?php clean_footer_menu( 'footermenu' ); ?>
							<div class="footer-col">
								<span class="footer-col_title">Contact Us</span>
								<address>
									<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'address', 'o' => 'o', 't' => 'div') ); ?>
									<?php if( $phone = get_field( 'phone', 'options' ) ): ?>
									<span><a class="tel" href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></span>
									<?php endif; ?>
									<?php if( $email = get_field( 'email', 'options' ) ): ?> 
									<span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span>
									<?php endif; ?>
								</address>
							</div>
						</div>
					</div>
					<div class="footer-bottom">
						<span class="copyright">&copy;<?php echo date( 'Y' ); ?> Hoopla</span>
						<?php if( have_rows( 'footer_links', 'options' ) ): ?>
						<ul class="bottom-nav">
							<?php while( have_rows( 'footer_links', 'options' ) ): the_row(); ?>
								<li>
									<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'link' ) ); ?>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php endif; ?>
						<?php if( have_rows( 'social', 'options' ) ): ?>
						<ul class="social-list">
							<?php while( have_rows( 'social', 'options' ) ): the_row(); 
								if( $link = get_sub_field( 'link' ) ): ?>
								<li>
									<a target="<?php echo $link['target']; ?>" 
										href="<?php echo $link['url']; ?>">
										<i class="icon icon-<?php echo $link['title']; ?>"></i>
									</a>
								</li>
							<?php endif;
							endwhile; ?>
						</ul>
						<?php endif; ?>
					</div>
				</div>
			</footer>
		</div>
	<?php wp_footer(); ?>	
</body>
</html>