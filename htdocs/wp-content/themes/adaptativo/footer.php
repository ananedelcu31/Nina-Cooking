<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adaptativo
 */

 require_once get_template_directory().'/inc/helper.php';

?>

	</div><!-- #content -->


	<!-- Content-bottom -->
	<?php if ( is_my_home() &&  is_active_sidebar('home-content-bottom') ): ?>
		<div class="container home-content-bottom">
				<?php dynamic_sidebar( 'home-content-bottom' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( ! is_my_home() &&  is_active_sidebar('content-bottom') ): ?>
		<div class="container content-bottom">
				<?php dynamic_sidebar( 'content-bottom' ); ?>
		</div>
	<?php endif; ?>
	<!-- Fin content-bottom -->

</div><!-- wrap-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

    <div class="container">

      <div class="row">

        <div class="<?php echo has_nav_menu('menu-2')?'col-6':''; ?> copyright">
          <span><?php _e( 'Proudly powered by ', 'adaptativo' ) ?></span>	<a target="_blank" href="<?php echo esc_url('https://wordpress.org/') ?>"> <?php _e('WordPress', 'adaptativo') ?></a>
    			<br/>
          <span>&copy; <?php _e('Theme designed by', 'adaptativo'); ?> </span> <a target="_blank" href="<?php echo esc_url('https://www.webempresa.com/') ?>" rel="designer"> <?php _e('hosting Webempresa','adaptativo') ?></a>

        </div><!-- .site-info -->


        <?php
        if ( has_nav_menu('menu-2') ){
          wp_nav_menu( array( 'theme_location' => 'menu-2', 'menu_id' => 'footer-menu', 'container_class' => 'col-6') );
        }
        ?>

      </div>

    </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
