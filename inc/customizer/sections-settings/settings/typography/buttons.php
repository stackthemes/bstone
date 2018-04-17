<?php
/**
 * Buttons Typography
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-buttons-typography-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-buttons-typo-settings',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone')
				),
				'tabs_sections' => array(
					'section-buttons',
					'section-buttons-typo-settings',
					'section-color-buttons'
				),
				'tabs_active'   => __('typography', 'bstone'),
			)
		)
	);	

	/**
	 * Buttons Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[btn-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'btn-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[btn-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-buttons-typo-settings',
				'priority'    => 5,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[btn-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Buttons Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[btn-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'btn-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[btn-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-buttons-typo-settings',
				'priority'    => 10,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[btn-typo-text-font-family]',
			)
		)
	);

	/**
	 * Buttons Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[btn-typo-text-transform]', array(
			'default'           => bstone_get_option( 'btn-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[btn-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-buttons-typo-settings',
			'priority' => 15,
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
	 * Buttons Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[btn-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'btn-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[btn-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-buttons-typo-settings',
				'priority'    => 20,
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
	 * Read More Button
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[read-more-button-typo-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-more-button-typo-heading]', array(
				'label'    	=> esc_html__( 'Read More Button', 'bstone' ),
				'section'  	=> 'section-buttons-typo-settings',
				'priority' 	=> 25,
			)
		)
	);	

	/**
	 * Buttons Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-family]', array(
			'default'           => bstone_get_option( 'readbtn-typo-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-buttons-typo-settings',
				'priority'    => 30,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-weight]',
			)
		)
	);

	/**
	 * Buttons Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-weight]', array(
			'default'           => bstone_get_option( 'readbtn-typo-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-buttons-typo-settings',
				'priority'    => 35,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-family]',
			)
		)
	);

	/**
	 * Buttons Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[readbtn-typo-text-transform]', array(
			'default'           => bstone_get_option( 'readbtn-typo-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[readbtn-typo-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-buttons-typo-settings',
			'priority' => 40,
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
	 * Buttons Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-size]', array(
			'default'           => bstone_get_option( 'readbtn-typo-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[readbtn-typo-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-buttons-typo-settings',
				'priority'    => 45,
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