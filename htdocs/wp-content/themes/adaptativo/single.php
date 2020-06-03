<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Adaptativo
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		}
		?>

		<?php
		while ( have_posts() ) : the_post();

			// if ( has_post_thumbnail() ){
			// 	echo '<div class="single-thumbnail">';
			// 	the_post_thumbnail( 'full' );
			// 	echo '</div>';
			// }

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation(array(
				'prev_text'=>'<i class="fa fa-arrow-left" aria-hidden="true"></i> %title',
				'next_text'=>'%title <i class="fa fa-arrow-right" aria-hidden="true"></i>'
			));

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
