<?php
/**
 * Default Typography Settings
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[default-typo-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[default-typo-heading]', array(
				'label'    	=> esc_html__( 'Default Typography Settings', 'bstone' ),
				'section'  	=> 'section-default-typo-settings',
				'priority' 	=> 5,
			)
		)
	);

	/**
	 * Option: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[default-body-font-family]', array(
			'default'           => bstone_get_option( 'default-body-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[default-body-font-family]', array(
				'type'        => 'bst-font-family',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-default-typo-settings',
				'priority'    => 10,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[default-body-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[default-body-font-weight]', array(
			'default'           => bstone_get_option( 'body-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[default-body-font-weight]', array(
				'type'        => 'bst-font-weight',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-default-typo-settings',
				'priority'    => 15,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[default-body-font-family]',
			)
		)
	);