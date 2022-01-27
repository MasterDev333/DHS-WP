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
				<ul class="header-top-list">
					<li><a href="#">Priory</a></li>
					<li class="ml-a"><a href="#">ALUMNI</a></li>
					<li><a href="#">STUDENTS</a></li>
					<li><a href="#">FACULTY</a></li>
					<li class="br-1"><a href="#">LIBRARY</a></li>
					<li><a href="#">POPULI</a></li>
					<li class="br-1"><a href="#">CONTACT</a></li>
				</ul>
			</div>
		</div>
		<div class="header-menu-wrapper">
			<div class="container">
				<div class="header-menu-inner">
					<a href="#" class="logo">
						<img src="img/logo-light.svg" alt="logo">
					</a>
					<div class="header-nav">
						<div class="header-nav-holder header-mnav">
							<div class="nav-drop">
								<nav class="nav">
									<ul class="header-menu">
										<li class="d-none d-lg-block home-link">
											<a href="#">Home</a>
										</li>
										<li class="has-mega-menu">
											<a href="#">About</a>
											<ul class="mega-menu">
												<li>
													<div class="col">
														<ul class="nav-main-link">
															<li><a href="#">Mission</a></li>
															<li><a href="#">History</a></li>
															<li><a href="#">Campus*</a></li>
															<li><a href="#">Staff</a></li>
														</ul>
														<ul class="nav-sub-link">
															<li><a href="#">Accreditation</a></li>
															<li><a href="#">Trustees &amp; Overseers</a></li>
															<li><a href="#">Administration</a></li>
															<li><a href="#">Affiliated Institutions</a></li>
														</ul>
													</div>
													<div class="col">
														<ul class="nav-big-link">
															<li>
																<a href="#">Plan Your Visit</a>
																<p> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
															</li>
															<li>
																<a href="#">Contact Us</a>
																<p> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</li>
										<li class="has-mega-menu">
											<a href="#">Admission</a>
											<ul class="mega-menu">
												<li>
													<div class="col">
														<ul class="nav-main-link">
															<li><a href="#">Tuition &amp; Fees</a></li>
															<li><a href="#">Requirements</a></li>
															<li><a href="#">Financial Aid</a></li>
															<li><a href="#">Housing</a></li>
														</ul>
														<ul class="nav-sub-link">
															<li><a href="#">Continuing Education</a></li>
															<li><a href="#">Make a Payment</a></li>
														</ul>
													</div>
													<div class="col">
														<ul class="nav-big-link">
															<li>
																<a href="#">Plan Your Visit</a>
																<p> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
															</li>
															<li>
																<a href="#">Apply</a>
																<p> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</li>
										<li class="has-mega-menu">
											<a href="#">Academics</a>
											<ul class="mega-menu">
												<li>
													<div class="col">
														<ul class="nav-main-link">
															<li><a href="#">Degree Program</a></li>
															<li><a href="#">Course Details</a></li>
															<li><a href="#">Student Life</a></li>
															<li><a href="#">Academic Calendar</a></li>
														</ul>
														<ul class="nav-sub-link">
															<li><a href="#">Grades &amp; Honors</a></li>
															<li><a href="#">The Thomistic Institute</a></li>
															<li><a href="#">Course Schedules</a></li>
															<li><a href="#">Course Descriptions</a></li>
															<li><a href="#">Course Learning Objectives</a></li>
															<li><a href="#">Booklist</a></li>
														</ul>
													</div>
													<div class="col">
														<ul class="nav-big-link">
															<li>
																<a href="#">Plan Your Visit</a>
																<p> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
															</li>
															<li>
																<a href="#">Explore All Programs</a>
																<p> Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. </p>
															</li>
														</ul>
													</div>
												</li>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
							<div class="header-search-block-mob nav-search">
								<button class="header-search-btn-mob">
									<i class="icon-m-search"></i>Search </button>
							</div>
							<div class="online bg-l-gray d-none d-md-block">
								<span class="online-tittle">The Preacher’s Corner</span>
								<span class="online-count">3 New</span>
							</div>
							<div class="header-btn d-none d-md-flex">
								<a href="#" class="btn _out">Apply</a>
								<a href="#" class="btn">Give</a>
							</div>
							<ul class="header-top-list d-none d-md-flex">
								<li><a href="#">ALUMNI</a></li>
								<li><a href="#">LIBRARY</a></li>
								<li><a href="#">STUDENTS</a></li>
								<li><a href="#">POPULI</a></li>
								<li><a href="#">FACULTY</a></li>
								<li><a href="#">CONTACT</a></li>
							</ul>
						</div>
						<div class="header-nav-holder header-sub-mob">
							<button class="header-search-btn-mob nav-search arrows-back"> Back </button>
							<div class="header-sub-content">
								<div class="header-search-btn-mob">
									<i class="icon-m-search"></i>Search
								</div>
								<form action="#">
									<label class="filter-results-label">
										<input type="text" placeholder="Search the Site...">
									</label>
									<div class="header-btn">
										<button class="btn">Search</button>
									</div>
								</form>
							</div>
						</div>
						<div class="header-mob-footer">
							<ul class="footer-social">
								<li>
									<a href="#"><i class="icon-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-m-xz"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-youtube"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="icon-vimeo2"></i></a>
								</li>
							</ul>
							<div class="footer-bottom-b">
								<span>© 2021 Dominican House of Studies. All rights reserved.</span>
							</div>
						</div>
						<div class="header-search-block">
							<button class="header-search-btn">
								<i class="icon-m-search"></i>Search </button>
							<div class="header-search">
								<input class="search-field" type="text" placeholder="Search the Site...">
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
							</div>
						</div>
					</div>
					<div class="online bg-l-gray d-md-none">
						<span class="online-tittle">The Preacher’s Corner</span>
						<span class="online-count">3 New</span>
					</div>
					<div class="header-btn d-md-none">
						<a href="#" class="btn _out">Apply</a>
						<a href="#" class="btn">Give</a>
					</div>
					<button class="nav-opener">
						<span class="nav-opener-ico"><span></span></span><span>Menu</span>
					</button>
				</div>
			</div>
		</div>
	</header>
	<main class="main">