<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php /*<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">*/ ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div class="wrapper">
	<header class="page-header">
		<div class="header-top">
			<div class="container">
				<?php wp_nav_menu( array(
					'menu' => 'Top Menu',
					'menu_class' => 'header-top-list',
					'container' => false,
				) ); ?>
			</div>
		</div>
		<div class="header-menu-wrapper">
			<div class="container">
				<div class="header-menu-inner">
					<a href="<?php echo home_url(  ); ?>" class="logo">
						<?php $site_logo = get_field( 'logo', 'options' ) ?: get_template_directory_uri(  ) . '/assets/img/logo-new.svg'; ?>
						<img src="<?php echo $site_logo; ?>" alt="DHS">
					</a>
					<div class="header-nav">
						<div class="header-nav-holder header-mnav">
							<div class="nav-drop">
								<nav class="nav">
									<ul class="header-menu">
										<?php clean_header_menu('mainmenu'); ?>
									</ul>
								</nav>
							</div>
							<div class="header-search-block-mob nav-search">
								<button class="header-search-btn-mob">
									<i class="icon-m-search"></i>Search </button>
							</div>
							<div class="online bg-l-gray d-none d-md-block">
								<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'news_heading', 'o' => 'o', 't' => 'span', 'tc' => 'online-tittle' ) ); ?>
								<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'news_tag', 'o' => 'o', 't' => 'span', 'tc' => 'online-count' ) ); ?>
							</div>
							<div class="header-btn d-none d-md-flex">
								<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'news_apply_cta', 'o' => 'o', 'c' => 'btn _out' ) ); ?>
								<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'news_give_cta', 'o' => 'o', 'c' => 'btn' ) ); ?>
							</div>
							<?php if( have_rows( 'top_bar_links', 'options' ) ): ?>
								<ul class="header-top-list d-none d-md-flex">
									<?php while( have_rows( 'top_bar_links', 'options' ) ): the_row( ); 
										get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'link', 'w' => 'li' ) );
									endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>
						<div class="header-nav-holder header-sub-mob">
							<button class="header-search-btn-mob nav-search arrows-back"> Back </button>
							<div class="header-sub-content">
								<div class="header-search-btn-mob">
									<i class="icon-m-search"></i>Search
								</div>
								<form id="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
									<label class="filter-results-label">
										<input type="text" name="s" placeholder="Search the Site...">
									</label>
									<div class="header-btn">
										<button type="submit" class="btn">Search</button>
									</div>
								</form>
							</div>
						</div>
						<div class="header-mob-footer">
							<?php if( have_rows( 'social', 'options' ) ): ?>
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
							<?php endif; ?>
							<div class="footer-bottom-b">
								<?php $copy = get_field( 'copy_text', 'options' ) ?: 'Dominican House of Studies. All rights reserved.'; ?>
								<span>&copy; <?php echo date( 'Y' ); ?> <?php echo $copy; ?></span>
							</div>
						</div>
						<div class="header-search-block">
							<button class="header-search-btn"><i class="icon-m-search"></i>Search </button>
							<form class="header-search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<input class="search-field" type="text" name="s" placeholder="Search the Site...">
								<input type="submit" value="">
								<div class="result-search-block">
									<ul class="result-list">
										<li>
											<span class="result-title"><a href="#">Search <mark>Result</mark> Page Title</a></span>
											<p> Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
										</li>
										<li>
											<span class="result-title"><a href="#">Search <mark>Result</mark> Page Title</a></span>
											<p> Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
										</li>
										<li>
											<span class="result-title"><a href="#">Search <mark>Result</mark> Page Title</a></span>
											<p> Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
										</li>
										<li>
											<span class="result-title"><a href="#">Search <mark>Result</mark> Page Title</a></span>
											<p> Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. </p>
										</li>
									</ul>
								</div>
							</form>
						</div>
					</div>
					<div class="online bg-l-gray d-md-none">
						<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'news_heading', 'o' => 'o', 't' => 'span', 'tc' => 'online-tittle' ) ); ?>
						<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 'news_tag', 'o' => 'o', 't' => 'span', 'tc' => 'online-count' ) ); ?>
					</div>
					<div class="header-btn d-md-none">
						<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'news_apply_cta', 'o' => 'o', 'c' => 'btn _out' ) ); ?>
						<?php get_template_part_args( 'templates/content-modules-cta', array( 'v' => 'news_give_cta', 'o' => 'o', 'c' => 'btn' ) ); ?>
					</div>
					<button class="nav-opener">
						<span class="nav-opener-ico"><span></span></span><span>Menu</span>
					</button>
				</div>
			</div>
		</div>
	</header>
	<main class="main">