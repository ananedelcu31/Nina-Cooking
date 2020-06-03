<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adaptativo
 */

 require_once get_template_directory().'/inc/helper.php';

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'adaptativo' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="container">
			<div class="row header-top">

				<div class="col-4">
						<?php the_custom_logo(); ?>
						<div class="site-branding">
								<?php
								if ( is_front_page() && is_home() ) : ?>
									<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php else : ?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
								<?php
								endif;

								$description = get_bloginfo( 'description', 'display' );
								if ( $description || is_customize_preview() ) : ?>
									<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
								<?php
								endif; ?>
						</div><!-- .site-branding -->
				</div>

				<div class="col-8">

					<nav id="site-navigation" class="main-navigation" role="navigation">

							<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">&#9776; <?php esc_html_e( 'Menu', 'adaptativo' ); ?></button>
							<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>

					</nav><!-- #site-navigation -->

				</div>

			</div><!-- row -->

				<!-- home header bottom -->
				<?php if ( is_my_home() && is_active_sidebar('home-header-bottom') ): ?>
					<div class='row home-header-bottom'>
						<?php dynamic_sidebar( 'home-header-bottom' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( ! is_my_home()  && is_active_sidebar('header-bottom') ): ?>
					<div class='row header-bottom'>
						<?php dynamic_sidebar( 'header-bottom' ); ?>
					</div>
				<?php endif; ?>
				<!-- Fin home header bottom -->


		</div><!-- container -->

	</header><!-- #masthead -->


  <div class="wrap-content">

	<!-- Content-top -->
	<?php if ( is_my_home() &&  is_active_sidebar('home-content-top') ): ?>
		<div class="container home-content-top">
				<?php dynamic_sidebar( 'home-content-top' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( ! is_my_home() &&  is_active_sidebar('content-top') ): ?>
		<div class="container content-top">
				<?php dynamic_sidebar( 'content-top' ); ?>
		</div>
	<?php endif; ?>
	<!-- Fin content-top -->

	<div id="content" class="container site-content<?php echo has_sidebar()?' sidebar':'' ?>">
