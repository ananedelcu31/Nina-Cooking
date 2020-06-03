<?php
/**
 * The Search form Widget
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adaptativo
 */
 ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">  
  <input type="search" class="search-field"  name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'adaptativo' ); ?>" value="<?php echo get_search_query(); ?>" />
  <button type="submit" class="search-submit">
    <i class="fa fa-search" aria-hidden="true"></i>
    <span class="screen-reader-text"><?php esc_attr_e( 'Search', 'adaptativo' ); ?></span>
  </button>

</form>
