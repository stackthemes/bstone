<?php
/**
 * Forms Settings for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Forms Settings - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-settings-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-settings-heading]', array(
				'label'    	=> esc_html__( 'Forms Settings', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 10,
			)
		)
	);