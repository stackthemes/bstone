<?php
/**
 * Recommends plugins for use with the theme via the TGMA Script
 *
 * @package Bstone WordPress theme
 */

function bstone_tgmpa_register() {

	// Get array of recommended plugins
	$plugins = array(
		
		array(
			'name'				=> 'Bstone Light',
			'slug'				=> 'bstone-light', 
			'required'			=> false,
			'force_activation'	=> false,
		),
		
		array(
			'name'				=> 'Elementor',
			'slug'				=> 'elementor', 
			'required'			=> false,
			'force_activation'	=> false,
		),
		
	);

	// Register notice
	tgmpa( $plugins, array(
		'id'           => 'bstone_theme',
		'domain'       => 'bstone',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'dismissable'  => true,
	) );

}
add_action( 'tgmpa_register', 'bstone_tgmpa_register' );