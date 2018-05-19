<?php
/**
 * Styling Options for Bstone Theme Header - Colors
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
	 * Customizer Tabs - To navigate to other related sections.
	 */
	$wp_customize->add_control(
		new Bstone_Control_Tabs(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-header-color-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-header',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-header',
					'section-header-typo-settings',
					'section-color-header',
					'section-spacing-header'
				),
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Option: Header Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[link-color-header]', array(
			'default'           => bstone_get_option( 'link-color-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[link-color-header]', array(
				'section'  => 'section-color-header',
				'priority' => 10,
				'label'    => __( 'Link Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Header Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[link-hover-color-header]', array(
			'default'           => bstone_get_option( 'link-hover-color-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[link-hover-color-header]', array(
				'section'  => 'section-color-header',
				'priority' => 15,
				'label'    => __( 'Link Hover Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Header Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bg-color-header]', array(
			'default'           => bstone_get_option( 'bg-color-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bg-color-header]', array(
				'section'  => 'section-color-header',
				'priority' => 25,
				'label'    => __( 'Header Background Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Nav Colors Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-nav-color-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-header',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Top Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-sep-top-color]', array(
			'default'           => bstone_get_option( 'header-main-sep-top-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-main-sep-top-color]', array(
				'section'  => 'section-color-header',
				'priority' => 35,
				'label'    => __( 'Nav Top Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Bottom Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-sep-color]', array(
			'default'           => bstone_get_option( 'header-main-sep-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_hex_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-main-sep-color]', array(
				'section'  => 'section-color-header',
				'priority' => 40,
				'label'    => __( 'Bottom Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Header Menu Bg Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[menu-bg-color-header]', array(
			'default'           => bstone_get_option( 'menu-bg-color-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[menu-bg-color-header]', array(
				'section'  => 'section-color-header',
				'priority' => 45,
				'label'    => __( 'Primary Nav Background', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Header Menu Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[menu-link-color-header]', array(
			'default'           => bstone_get_option( 'menu-link-color-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[menu-link-color-header]', array(
				'section'  => 'section-color-header',
				'priority' => 50,
				'label'    => __( 'Nav Link Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Header Menu Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[menu-link-hover-color-header]', array(
			'default'           => bstone_get_option( 'menu-link-hover-color-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[menu-link-hover-color-header]', array(
				'section'  => 'section-color-header',
				'priority' => 55,
				'label'    => __( 'Nav Link Hover Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Site Tital Color & Description Color Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-title-color-desc-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-header',
				'priority' => 60,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Site Tital Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[site-tital-color]', array(
			'default'           => bstone_get_option( 'site-tital-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-tital-color]', array(
				'section'  => 'section-color-header',
				'priority' => 65,
				'label'    => __( 'Site Tital Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Site Description Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[site-desc-color]', array(
			'default'           => bstone_get_option( 'site-desc-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-desc-color]', array(
				'section'  => 'section-color-header',
				'priority' => 70,
				'label'    => __( 'Site Description Color', 'bstone' ),
			)
		)
	);

