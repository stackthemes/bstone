<?php
/**
 * Sidebar Typography
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-sidebar-typography-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-sidebar-typo-settings',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-sidebars',
					'section-sidebar-typo-settings',
					'section-color-sidebar',
					'section-spacing-sidebar'
				),
				'tabs_active'   => __('typography', 'bstone'),
			)
		)
	);

	/**
	 * Sidebar Typography - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[sidebar-typo-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-title-heading]', array(
				'label'    	=> esc_html__( 'Widget Title Typography', 'bstone' ),
				'section'  	=> 'section-sidebar-typo-settings',
				'priority' 	=> 10,
			)
		)
	);

	/**
	 * Sidebar Typography - Title: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-family]', array(
			'default'           => bstone_get_option( 'sidebar-typo-title-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-family]', array(
				'type'        => 'bst-font-family',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-sidebar-typo-settings',
				'priority'    => 15,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-weight]',
			)
		)
	);

	/**
	 * Sidebar Typography - Title: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-weight]', array(
			'default'           => bstone_get_option( 'sidebar-typo-title-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-weight]', array(
				'type'        => 'bst-font-weight',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-sidebar-typo-settings',
				'priority'    => 20,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-family]',
			)
		)
	);

	/**
	 * Sidebar Typography - Title: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-title-transform]', array(
			'default'           => bstone_get_option( 'sidebar-typo-title-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-title-transform]', array(
			'type'     => 'select',
			'section'  => 'section-sidebar-typo-settings',
			'priority' => 25,
			'label'    => __( 'Text Transform', 'bstone' ),
			'choices'  => array(
				''           => __( 'Default', 'bstone' ),
				'none'       => __( 'None', 'bstone' ),
				'capitalize' => __( 'Capitalize', 'bstone' ),
				'uppercase'  => __( 'Uppercase', 'bstone' ),
				'lowercase'  => __( 'Lowercase', 'bstone' ),
			),
		)
	);

	

	/**
	 * Sidebar Typography - Title: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-size]', array(
			'default'           => bstone_get_option( 'sidebar-typo-title-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-title-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-sidebar-typo-settings',
				'priority'    => 30,
				'label'       => __( 'Font Size', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);

	/**
	 * Sidebar Typography - Text: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[sidebar-typo-text-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-text-heading]', array(
				'label'    	=> esc_html__( 'Widget Text Typography', 'bstone' ),
				'section'  	=> 'section-sidebar-typo-settings',
				'priority' 	=> 35,
			)
		)
	);

	/**
	 * Sidebar Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'sidebar-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-sidebar-typo-settings',
				'priority'    => 40,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Sidebar Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'sidebar-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-sidebar-typo-settings',
				'priority'    => 45,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-family]',
			)
		)
	);

	/**
	 * Sidebar Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-text-transform]', array(
			'default'           => bstone_get_option( 'sidebar-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-sidebar-typo-settings',
			'priority' => 50,
			'label'    => __( 'Text Transform', 'bstone' ),
			'choices'  => array(
				''           => __( 'Default', 'bstone' ),
				'none'       => __( 'None', 'bstone' ),
				'capitalize' => __( 'Capitalize', 'bstone' ),
				'uppercase'  => __( 'Uppercase', 'bstone' ),
				'lowercase'  => __( 'Lowercase', 'bstone' ),
			),
		)
	);

	

	/**
	 * Sidebar Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'sidebar-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-sidebar-typo-settings',
				'priority'    => 55,
				'label'       => __( 'Font Size', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);