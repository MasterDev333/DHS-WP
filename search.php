<?php get_header(); 
global $wp_query; ?>

<section class="py-6 bg-metal text-center h1-small">
	<div class="container">
		<h3 class="text-l-gray h3-md-small">Search Results for </h3>
		<h1 class="text-brand-l"><em>Keyword Search Term</em></h1>
		<div class="search-wrapper">
			<form class="search-block" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<input type="text" name="s" placeholder="keyword search term">
				<input type="submit" value="">
			</form>
			<div class="search-result">Showing <?php echo $wp_query->found_posts; ?> results</div>
		</div>
	</div>
</section>
<section class="bg-l-gray d-md-none">
	<div class="container">
		<ul class="pagination-list">
			<li><a href="<?php echo home_url(); ?>">Home</a></li>
			<li><a href="#">Search Results</a></li>
		</ul>
	</div>
</section>

<section class="pt-10 pb-12 py-md-7 bgs-img">
	<div class="container _xs">
		<ul class="search-results-list">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
					<li>
						<h6><?php echo get_post_type( ); ?></h6>
						<h2><?php echo get_the_title( ); ?></h2>
						<p><?php echo get_the_excerpt( ); ?><a href="<?php echo get_the_permalink( ); ?>">Read More</a></p>
					</li>
				<?php get_template_part( 'templates/pagination', 'post' ); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php get_template_part( 'templates/content', 'none' ); ?>
			<?php endif; 
			wp_reset_query(  ); ?>
		</ul>
	</div>
</section>
<?php get_footer(); ?>