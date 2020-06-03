<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Adaptativo
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses adaptativo_header_style()
 */
function adaptativo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'adaptativo_custom_header_args', array(
		'default-image'          => get_template_directory_uri().'/img/background-header.jpg',
		'default-text-color'     => '#fff',
		'wp-head-callback'       => 'adaptativo_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'adaptativo_custom_header_setup' );

if ( ! function_exists( 'adaptativo_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see adaptativo_custom_header_setup().
	 */
	function adaptativo_header_style() {
		adaptativo_header_image();
		adaptativo_header_text_color();
	}

	function adaptativo_header_image(){

		if ( has_header_image() ){
			$header_image = get_header_image();
		}
		else{
			$header_image = get_theme_support( 'custom-header', 'default-image' );
		}

		?>
		<style type="text/css">
			header.site-header{
				background-image: url(<?php echo $header_image; ?>);
			}
		</style>
		<?php
	} //apaptativo header image

	function adaptativo_header_text_color(){
		$header_text_color = get_header_textcolor();

		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
			// Has the text been hidden?
			if ( ! display_header_text() ) :
		?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}

		<?php
			// If the user has set a custom color for the text use that.
			else :
		?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	} //adaptativo text color

endif;
