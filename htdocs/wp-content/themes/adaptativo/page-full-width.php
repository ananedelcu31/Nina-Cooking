<?php
/**
 * Template Name: Full Width
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adaptativo
 */

get_header(); ?>

	<div id="primaryfull" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			}
			?>
			
			<?php
			while ( have_posts() ) : the_post();

				if ( has_post_thumbnail() ){
					echo '<div class="page-thumbnail">';
					the_post_thumbnail( 'full' );
					echo '</div>';
				}

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
