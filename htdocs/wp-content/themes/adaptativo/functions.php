<?php
/**
 * Adaptativo functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Adaptativo
 */

if ( ! function_exists( 'adaptativo_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function adaptativo_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Adaptativo, use a find and replace
	 * to change 'adaptativo' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'adaptativo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Main menu', 'adaptativo' ),
		'menu-2' => esc_html__( 'Menu footer', 'adaptativo' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'adaptativo_custom_background_args', array(
		'default-color' => 'f2f2f2',
		'default-image' => '',
	) ) );


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );


	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array( 'header-text' => array( 'site-title', 'site-description' ) ) );

}
endif;
add_action( 'after_setup_theme', 'adaptativo_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function adaptativo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'adaptativo_content_width', 640 );
}
add_action( 'after_setup_theme', 'adaptativo_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function adaptativo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'adaptativo' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home header bottom', 'adaptativo' ),
		'id'            => 'home-header-bottom',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home content top', 'adaptativo' ),
		'id'            => 'home-content-top',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home content bottom', 'adaptativo' ),
		'id'            => 'home-content-bottom',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );


	register_sidebar( array(
		'name'          => esc_html__( 'Header bottom', 'adaptativo' ),
		'id'            => 'header-bottom',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content top', 'adaptativo' ),
		'id'            => 'content-top',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Content bottom', 'adaptativo' ),
		'id'            => 'content-bottom',
		'description'   => esc_html__( 'Add widgets here.', 'adaptativo' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'adaptativo_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function adaptativo_scripts() {

	//styles
	wp_enqueue_style( 'adaptativo-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version') );
	wp_enqueue_style( 'adaptativo-gfont', 'https://fonts.googleapis.com/css?family=Roboto+Condensed:400|Raleway' );
	wp_enqueue_style( 'custom-stylesheet', get_template_directory_uri() . '/css/font-awesome.min.css');

	//scripts
	//wp_enqueue_script( 'adaptativo-jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), '3.2.1', true );
	wp_enqueue_script( 'adaptativo-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'adaptativo-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	//wp_enqueue_script( 'adaptativo-script', get_template_directory_uri().'/js/script.js', array('adaptativo-jquery'), '1.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'adaptativo_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



//Comments
function adaptativo_custom_comments($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>

		<div class="row">

		    <div class="col-8 comment-author vcard">
		        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $size = '48' ); ?>
		        <?php printf( __( '<cite class="fn">%s</cite>', 'adaptativo' ), esc_url(get_comment_author_link()) ); ?>
		    </div>

				<div class="col-4 comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s - %2$s', 'adaptativo'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'adaptativo' ), '  ', '' );
						?>
				</div>

		</div>

    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'adaptativo' ); ?></em>
          <br />
    <?php endif; ?>


    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args,
															array(
																'add_below' => $add_below,
																'depth' => $depth,
																'max_depth' => $args['max_depth'],
																'after' => ' <i class="fa fa-reply" aria-hidden="true"></i>'
															)
															) );
				?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
  }


//Read more-link

function modify_read_more_link() {
    $link_text = sprintf(
			wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'adaptativo' ), array( 'span' => array( 'class' => array() )) ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		);

		return '<div class="wrap-more-link"><a class="more-link" href="' . esc_url(get_permalink()) . '">'.$link_text.'</a></div>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

//Image Serializable
add_image_size( 'adaptativo_img_home' , 400, 360, true );
