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
						<div>
							<h6>About</h6>
							<ul class="footer-list-link">
								<li><a href="#">Mission</a></li>
								<li><a href="#">Accreditation</a></li>
								<li><a href="#">History</a></li>
								<li><a href="#">Trustees and Overseers</a></li>
								<li><a href="#">Administration</a></li>
								<li><a href="#">Staff</a></li>
								<li><a href="#">Affiliated Institutions</a></li>
								<li><a href="#">Directions</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
						<div>
							<h6>Admission</h6>
							<ul class="footer-list-link">
								<li><a href="#">Visit</a></li>
								<li><a href="#">Requirements</a></li>
								<li><a href="#">Applying</a></li>
								<li><a href="#">Tuition and Fees</a></li>
								<li><a href="#">Financial Aid</a></li>
								<li><a href="#">Housing</a></li>
								<li><a href="#">Continuing Ed</a></li>
								<li><a href="#">Make a Payment</a></li>
							</ul>
						</div>
						<div>
							<h6>Academics</h6>
							<ul class="footer-list-link">
								<li><a href="#">Faculty</a></li>
								<li><a href="#">Academic Calendar</a></li>
								<li><a href="#">Academic Catalog</a></li>
								<li><a href="#">Degree Programs</a></li>
								<li><a href="#">Course Schedules</a></li>
								<li><a href="#">Course Descriptions</a></li>
								<li><a href="#">Course Learning Objectives</a></li>
								<li><a href="#">Book Lists</a></li>
								<li><a href="#">Grades and Honors</a></li>
								<li><a href="#">The Thomistic Institute</a></li>
							</ul>
						</div>
						<div>
							<h6>Students</h6>
							<ul class="footer-list-link">
								<li><a href="#">Student Life</a></li>
								<li><a href="#">Spiritual Life</a></li>
								<li><a href="#">Policies</a></li>
								<li><a href="#">Transcripts</a></li>
								<li><a href="#">Alumni Resources</a></li>
								<li><a href="#">Populi</a></li>
							</ul>
						</div>
						<div>
							<h6>Library</h6>
							<ul class="footer-list-link">
								<li><a href="#">Hours &amp; Notices</a></li>
								<li><a href="#">About the Library</a></li>
								<li><a href="#">Catalog</a></li>
								<li><a href="#">Online Resources</a></li>
								<li><a href="#">Library Payments</a></li>
								<li><a href="#">Policies</a></li>
								<li><a href="#">Staff</a></li>
								<li><a href="#">Library FAQ</a></li>
								<li><a href="#">Faculty Bookshelf</a></li>
							</ul>
						</div>
						<div>
							<h6>Support</h6>
							<ul class="footer-list-link">
								<li><a href="#">Make a Donation</a></li>
								<li><a href="#">Advancement Office Info</a></li>
								<li><a href="#">Donor Information</a></li>
								<li><a href="#">Newsletters</a></li>
								<li><a href="#">Planned Giving</a></li>
								<li><a href="#">Dominican Spring Social</a></li>
								<li><a href="#">Dominican Fall Gala</a></li>
							</ul>
						</div>
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