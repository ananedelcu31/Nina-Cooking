<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Adaptativo
 */


 //Only for content-home.php
 if ( ! function_exists('adaptativo_posted_on_home') ):
	 /**
	  * Prints HTML with meta information for the current post-date/time and author.
	  */
 		function adaptativo_posted_on_home(){

 			// date
 			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
 			$posted_on = sprintf( $time_string,	esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() )	);
 			echo '<span class="posted-on">' . $posted_on . '</span>';

 			// Author
			$author = sprintf( _x( 'by %s', 'post author', 'adaptativo' ), esc_html( get_the_author() ) );
 			echo '<span class="byline"> ' . $author . '</span>';

 		} // adaptativo_posted_on_home

 endif; // ! function_exists



if ( ! function_exists( 'adaptativo_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function adaptativo_posted_on() {

    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
  		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
  	}

  	$time_string = sprintf( $time_string,
  		esc_attr( get_the_date( 'c' ) ),
  		esc_html( get_the_date() ),
  		esc_attr( get_the_modified_date( 'c' ) ),
  		esc_html( get_the_modified_date() )
  	);

  	$posted_on = sprintf(
  		esc_html_x( 'Posted on %s', 'post date', 'adaptativo' ),
  		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
  	);


		//date
		$day 		= sprintf("%02d", get_the_date('j'));
		$month 	= substr(get_the_date('F'),0,3);
		$year 	= get_the_date('y');

		echo '<div class="wrap-info-article">';

			echo '<div class="date-article" rel="bookmark">';
			echo '<span class="day">'.$day.'</span>';
			echo '<span class="month-year">'.$month.'-'.$year.'</span>';
			echo '</div>';

			echo '<span class="posted-on screen-reader-text">' . $posted_on . '</span>';

			if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

				$icon_comments='<i class="fa fa-comment fa-flip-horizontal" aria-hidden="true"></i>';

				echo '<span class="comments-link">';
				comments_popup_link('',$icon_comments.' 1',$icon_comments.' %');
				echo '</span>';
			}

		echo '</div>'; //wrap-info-article;


	// Author
	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'adaptativo' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);
		echo '<span class="byline"> ' . $byline . '</span>';


	//Categories
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'adaptativo' ) );
		if ( $categories_list && adaptativo_categorized_blog() ) {
			printf( ' | <span class="cat-links">%1$s </span>', $categories_list ); // WPCS: XSS OK.
		}
	}


} // function adaptativo_posted_on
endif; // ! function_exists




if ( ! function_exists( 'adaptativo_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function adaptativo_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		// $categories_list = get_the_category_list( esc_html__( ', ', 'adaptativo' ) );
		// if ( $categories_list && adaptativo_categorized_blog() ) {
		// 	printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'adaptativo' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		// }

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'adaptativo' ) );
		if ( $tags_list ) {
			$tags_list = str_replace( ',', ' ', $tags_list );
			printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
		}
	}


	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'adaptativo' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function adaptativo_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'adaptativo_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'adaptativo_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so adaptativo_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so adaptativo_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in adaptativo_categorized_blog.
 */
function adaptativo_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'adaptativo_categories' );
}
add_action( 'edit_category', 'adaptativo_category_transient_flusher' );
add_action( 'save_post',     'adaptativo_category_transient_flusher' );
