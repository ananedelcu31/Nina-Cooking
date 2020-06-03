<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Adaptativo
 */


require_once get_template_directory().'/inc/helper.php';


$img_background = "";

if ( has_post_thumbnail()  ){
  $thumbnail = get_the_post_thumbnail_url( null, 'adaptativo_img_home' );
  $img_background = ' style="background-image:url('.$thumbnail.')"';
  $img_linkclass = 'wrap-article-home';
}
else{
  $img_linkclass = 'wrap-article-home-text';
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php echo $img_background; ?> >

  <?php
    if ( is_sticky() ){
      echo '<i class="fa fa-bookmark" aria-hidden="true"></i>';
    }
  ?>

  <div class="<?php echo $img_linkclass; ?>" >


    	<header class="entry-header">

        <a href="<?php echo esc_url( get_permalink() ); ?>" >
      		<?php
        		if ( is_single() ) :
        			the_title( '<h1 class="entry-title">', '</h1>' );
        		else :
        			the_title( '<h2 class="entry-title">', '</h2>' );
        		endif;
          ?>
        </a>

        <?php
      		if ( 'post' === get_post_type() ) : ?>
      		<div class="entry-meta">
      			<?php adaptativo_posted_on_home(); ?>
      		</div><!-- .entry-meta -->
      		<?php
      		endif;
        ?>

    	</header><!-- .entry-header -->

      <?php if ( empty($img_background) ): // only text?>

         <div class="entry-content">
    		 <?php


         if( strpos( $post->post_content, '<!--more-->' ) ) {
             echo get_the_excerpt().' [...]';
         }
         else {
             the_excerpt();
         }

      			// wp_link_pages( array(
      			// 	'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adaptativo' ),
      			// 	'after'  => '</div>',
      			// ) );

    		?>
    	</div><!-- .entry-content -->

    <?php endif; //only text ?>


  </div><!-- wrap-article-home -->

</article><!-- #post-## -->
