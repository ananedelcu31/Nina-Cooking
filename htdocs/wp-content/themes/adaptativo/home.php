<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adaptativo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main home-site" role="main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

  				get_template_part( 'template-parts/content-home', get_post_format() );

			endwhile;


			the_posts_pagination( array(
				'prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i>' . '<span class="screen-reader-text">' . __( 'Previous page', 'adaptativo' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'adaptativo' ) . '</span>' .'<i class="fa fa-arrow-right" aria-hidden="true"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'adaptativo' ) . ' </span>',
			) );


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
