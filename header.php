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
	<header class="header">
		<?php get_template_part_args( 'templates/content-modules-text', array( 'v' => 't_text', 'o' => 'o', 't' => 'div', 'tc' => 'top-panel') ); ?>
		<div class="header-menu-wrapper">
			<div class="container _lg">
				<div class="logo">
					<a href="<?php echo esc_url( home_url(  ) ); ?>">
						<?php if( $logo = get_field( 'h_logo', 'options' ) ): ?> 
							<img src="<?php echo $logo['url']; ?>" width="170" height="80" alt="Hoopla by Radiant">
						<?php else: ?>
							Hoopla by Raydiant
						<?php endif; ?>
					</a>
				</div>
				<div class="nav-drop">
					<nav class="nav nav-main">
						<ul class="header-menu">
							<?php clean_header_menu('mainmenu'); ?>
						</ul>
					</nav>
					<nav class="nav-info">
						<?php  
							$header_right_first_menu = get_field('header_right_first_menu', 'options');
							$header_right_2nd_menu = get_field('header_right_2nd_menu', 'options');
						?>
						<?php if( $header_right_first_menu ): ?>
							<ul class="nav-login">
								<li>
									<a href="<?php echo $header_right_first_menu['url']; ?>"
										target="<?php echo $header_right_first_menu['target']; ?>">
										<?php echo $header_right_first_menu['title']; ?>
									</a>
								</li>
							</ul>
						<?php endif; ?>
						<?php if( $header_right_2nd_menu ): ?>
							<a href="<?php echo $header_right_2nd_menu['url']; ?>" class="btn btn-dark" target="<?php echo $header_right_2nd_menu['target']; ?>"><?php echo $header_right_2nd_menu['title']; ?></a>
						<?php endif; ?>
					</nav>
				</div>
				<button class="nav-opener">
					<span></span>
				</button>
			</div>
		</div>
	</header>
	<main class="main">