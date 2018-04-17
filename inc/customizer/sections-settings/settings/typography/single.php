<?php
/**
 * Blog Single Typography
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
	 * Blog Single Typography - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[single-typo-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-typo-title-heading]', array(
				'label'    	=> esc_html__( 'Post / Page Title Typography', 'bstone' ),
				'section'  	=> 'section-single-typo-settings',
				'priority' 	=> 10,
			)
		)
	);

	/**
	 * Blog Single Typography - Title: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-typo-title-font-family]', array(
			'default'           => bstone_get_option( 'single-typo-title-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-typo-title-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-single-typo-settings',
				'priority'    => 15,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[single-typo-title-font-weight]',
			)
		)
	);

	/**
	 * Blog Single Typography - Title: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-typo-title-font-weight]', array(
			'default'           => bstone_get_option( 'single-typo-title-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-typo-title-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-single-typo-settings',
				'priority'    => 20,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[single-typo-title-font-family]',
			)
		)
	);

	/**
	 * Blog Single Typography - Title: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-typo-title-transform]', array(
			'default'           => bstone_get_option( 'single-typo-title-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[single-typo-title-transform]', array(
			'type'     => 'select',
			'section'  => 'section-single-typo-settings',
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
	 * Blog Single Typography - Title: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-typo-title-font-size]', array(
			'default'           => bstone_get_option( 'single-typo-title-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-typo-title-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-single-typo-settings',
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
	 * Blog Single Typography - Devider: Breadcrumbs
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-typo-breadcrumbs-devider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-single-typo-settings',
				'priority' => 35,
				'settings' => array(),
			)
		)
	);

	

	/**
	 * Blog Single Typography - Breadcrumbs: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-typo-breadcrumbs-font-size]', array(
			'default'           => bstone_get_option( 'single-typo-breadcrumbs-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-typo-breadcrumbs-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-single-typo-settings',
				'priority'    => 40,
				'label'       => __( 'Breadcrumbs Font Size', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);