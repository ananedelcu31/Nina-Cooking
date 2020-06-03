<?php
/**
 * Adaptativo Theme Customizer
 *
 * @package Adaptativo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function adaptativo_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';


	// $wp_customize->add_setting( 'color_theme_settings', array(
	// 	'default'   => '#ff0000',
	// 	'transport' => 'postMessage'
	// ) );
	//
	// $wp_customize->add_control( new WP_Customize_Color_Control(
	// 	$wp_customize,
	// 	'color_theme_control',
	// 	array(
	// 		'label'      => __( 'Theme Color', 'adaptativo' ),
	// 		'section'    => 'colors',
	// 		'settings'	 => 'color_theme_settings',
	// 		'priority'	 => 10
	// 	) )
	// );

}
add_action( 'customize_register', 'adaptativo_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function adaptativo_customize_preview_js() {
	wp_enqueue_script( 'adaptativo_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'adaptativo_customize_preview_js' );
