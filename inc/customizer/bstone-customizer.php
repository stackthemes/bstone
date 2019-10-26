<?php
/**
 * Bstone Theme Customizer
 *
 * @package Bstone
 */

/**
 * Reset customizer Priorities
 */
require BSTONE_THEME_DIR . 'inc/customizer/reset-default-priorities.php';

/**
 * Register controls
 */
require BSTONE_THEME_DIR . 'inc/customizer/register-controls.php';

/**
 * Extend Customizer
 */
require BSTONE_THEME_DIR . 'inc/customizer/extend_customizer.php';


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function bstone_customize_register( $wp_customize ) {

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'bstone_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'bstone_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'bstone_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bstone_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bstone_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bstone_customize_preview_js() {
	wp_enqueue_script( 'bstone-customizer', BSTONE_THEME_URI . 'assets/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bstone_customize_preview_js' );
