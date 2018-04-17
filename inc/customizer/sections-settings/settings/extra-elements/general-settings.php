<?php
/**
 * General Options for Bstone Theme.
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
	 * Heading: Schema Markup
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[schema-markup-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[schema-markup-heading]', array(
				'label'    	=> esc_html__( 'Schema Markup', 'bstone' ),
				'section'  	=> 'section-general-settings',
				'priority' 	=> 5,
			)
		)
	);

	/**
	 * Option: Enable Schema Markup
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-schema-markup]', array(
			'default'           => bstone_get_option( 'bstone-schema-markup' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-schema-markup]', array(
			'type'        => 'checkbox',
			'section'     => 'section-general-settings',
			'label'       => __( 'Enable Schema Markup', 'bstone' ),
			'priority'    => 10,
		)
	);

	/**
	 * Heading: Customizer Styles Location
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[css-output-location-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[css-output-location-heading]', array(
				'label'    	=> esc_html__( 'Customizer Styles Location', 'bstone' ),
				'section'  	=> 'section-general-settings',
				'priority' 	=> 30,
			)
		)
	);

	/**
	 * Option: Bstone CSS Location
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-css-location]', array(
			'default'           => bstone_get_option( 'bstone-css-location' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-css-location]', array(
			'type'        => 'radio',
			'section'     => 'section-general-settings',
			'label'       => __( 'Customizer Styles Output Location', 'bstone' ),
			'priority'    => 35,
			'choices'     => array(
				'head' 		=> esc_html__( 'WP Head', 'bstone' ),
				'file' 		=> esc_html__( 'Custom File', 'bstone' ),
			),
			'description' => esc_html__( 'If you choose Custom File, a CSS file will be created in your uploads folder. "WP Head" Recommended when using customizer.', 'bstone' ),
		)
	);

	/**
	 * Heading: Icon Settings
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[bstone-font-awesome-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[bstone-font-awesome-heading]', array(
				'label'    	=> esc_html__( 'Icon Settings', 'bstone' ),
				'section'  	=> 'section-general-settings',
				'priority' 	=> 40,
			)
		)
	);

	/**
	 * Option: Enable Font Awesome Icons
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-icons]', array(
			'default'           => bstone_get_option( 'bstone-font-awesome-icons' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-icons]', array(
			'type'        => 'checkbox',
			'section'     => 'section-general-settings',
			'label'       => __( 'Enable Icons', 'bstone' ),
			'priority'    => 45,
		)
	);

	/**
	 * Option: Enable Font Awesome Icons - Brands
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-brands]', array(
			'default'           => bstone_get_option( 'bstone-font-awesome-brands' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-brands]', array(
			'type'        => 'checkbox',
			'section'     => 'section-general-settings',
			'label'       => __( 'Font Awesome Brands', 'bstone' ),
			'priority'    => 50,
		)
	);

	/**
	 * Option: Enable Font Awesome Icons - Regular
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-regular]', array(
			'default'           => bstone_get_option( 'bstone-font-awesome-regular' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-regular]', array(
			'type'        => 'checkbox',
			'section'     => 'section-general-settings',
			'label'       => __( 'Font Awesome Regular', 'bstone' ),
			'priority'    => 55,
		)
	);

	/**
	 * Option: Enable Font Awesome Icons - Solid
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-solid]', array(
			'default'           => bstone_get_option( 'bstone-font-awesome-solid' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-font-awesome-solid]', array(
			'type'        => 'checkbox',
			'section'     => 'section-general-settings',
			'label'       => __( 'Font Awesome Solid', 'bstone' ),
			'priority'    => 65,
		)
	);

	/**
	 * Heading: Search Page Settings
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[search-page-settings-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[search-page-settings-heading]', array(
				'label'    	=> esc_html__( 'Search Page Settings', 'bstone' ),
				'section'  	=> 'section-general-settings',
				'priority' 	=> 70,
			)
		)
	);

	/**
	 * Option: Search Source
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[search-source]', array(
			'default'           => bstone_get_option( 'search-source' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[search-source]', array(
			'type'     => 'select',
			'section'  => 'section-general-settings',
			'priority' => 75,
			'label'    => __( 'Search Source', 'bstone' ),
			'choices'  => array(
				'any'  => __( 'All Post Types', 'bstone' ),
				'post' => __( 'Posts', 'bstone' ),
				'page' => __( 'Pages', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Search Results Per Page
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[search-results-per-page]', array(
			'default'           => bstone_get_option( 'search-results-per-page' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[search-results-per-page]', array(
			'type'        => 'number',
			'section'     => 'section-general-settings',
			'priority'    => 80,
			'label'       => __( 'Search Results Per Page', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);
