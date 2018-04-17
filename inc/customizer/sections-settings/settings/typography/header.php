<?php
/**
 * Header Typography
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
	 * Customizer Tabs - To navigate to other related sections.
	 */
	$wp_customize->add_control(
		new Bstone_Control_Tabs(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-header-typo-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-header-typo-settings',
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
				'tabs_active'   => __('typography', 'bstone'),
			)
		)
	);

	/**
	 * Header Typography - Text: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[header-typo-text-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-typo-text-heading]', array(
				'label'    	=> esc_html__( 'Header Text Typography', 'bstone' ),
				'section'  	=> 'section-header-typo-settings',
				'priority' 	=> 10,
			)
		)
	);

	/**
	 * Header Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'header-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 15,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[header-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Header Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'header-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 20,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[header-typo-text-font-family]',
			)
		)
	);

	/**
	 * Header Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-typo-text-transform]', array(
			'default'           => bstone_get_option( 'header-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-header-typo-settings',
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
	 * Header Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'header-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-header-typo-settings',
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
	 * Logo Typography - Text: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[logo-typo-text-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[logo-typo-text-heading]', array(
				'label'    	=> esc_html__( 'Logo / Site Title  Typography', 'bstone' ),
				'section'  	=> 'section-header-typo-settings',
				'priority' 	=> 35,
			)
		)
	);

	/**
	 * Logo Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[logo-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'logo-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[logo-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 40,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[logo-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Logo Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[logo-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'logo-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[logo-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 45,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[logo-typo-text-font-family]',
			)
		)
	);

	/**
	 * Logo Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[logo-typo-text-transform]', array(
			'default'           => bstone_get_option( 'logo-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[logo-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-header-typo-settings',
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
	 * Logo Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[logo-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'logo-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[logo-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-header-typo-settings',
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

	/**
	 * Tagline Typography - Text: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[tagline-typo-text-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[tagline-typo-text-heading]', array(
				'label'    	=> esc_html__( 'Tagline Typography', 'bstone' ),
				'section'  	=> 'section-header-typo-settings',
				'priority' 	=> 60,
			)
		)
	);

	/**
	 * Tagline Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'tagline-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 65,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Tagline Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'tagline-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 70,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-family]',
			)
		)
	);

	/**
	 * Tagline Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[tagline-typo-text-transform]', array(
			'default'           => bstone_get_option( 'tagline-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[tagline-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-header-typo-settings',
			'priority' => 75,
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
	 * Tagline Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'tagline-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[tagline-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-header-typo-settings',
				'priority'    => 80,
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
	 * Nav Typography - Text: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[nav-typo-text-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[nav-typo-text-heading]', array(
				'label'    	=> esc_html__( 'Primary Navigation', 'bstone' ),
				'section'  	=> 'section-header-typo-settings',
				'priority' 	=> 85,
			)
		)
	);

	/**
	 * Nav Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nav-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'nav-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[nav-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 90,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[nav-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Nav Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nav-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'nav-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[nav-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-header-typo-settings',
				'priority'    => 95,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[nav-typo-text-font-family]',
			)
		)
	);

	/**
	 * Nav Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nav-typo-text-transform]', array(
			'default'           => bstone_get_option( 'nav-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[nav-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-header-typo-settings',
			'priority' => 100,
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
	 * Nav Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nav-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'nav-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[nav-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-header-typo-settings',
				'priority'    => 105,
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