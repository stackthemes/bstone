<?php
/**
 * Content Typography
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-content-typography-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-general-typo-settings',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-container-layout',
					'section-general-typo-settings',
					'section-color-general',
					'section-spacing-content'
				),
				'tabs_active'   => __('typography', 'bstone'),
			)
		)
	);

	/**
	 * Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-typo-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-typo-heading]', array(
				'label'    	=> esc_html__( 'Body & Content', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 5,
			)
		)
	);

	/**
	 * Option: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[body-font-family]', array(
			'default'           => bstone_get_option( 'body-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[body-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 10,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[body-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[body-font-weight]', array(
			'default'           => bstone_get_option( 'body-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[body-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 15,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[body-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[body-text-transform]', array(
			'default'           => bstone_get_option( 'body-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[body-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 20,
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-size-body]', array(
			'default'           => bstone_get_option( 'font-size-body' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-size-body]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 25,
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
	 * Option: Body Line Height
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[body-line-height]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[body-line-height]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-general-typo-settings',
				'priority'    => 30,
				'label'       => __( 'Line Height', 'bstone' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 0.01,
					'max'  => 5,
				),
			)
		)
	);

	/**
	 * Option: Paragraph Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[para-margin-bottom]', array(
			'default'           => '',
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[para-margin-bottom]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-general-typo-settings',
				'priority'    => 35,
				'label'       => __( 'Paragraph Margin Bottom', 'bstone' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 0.01,
					'max'  => 5,
				),
			)
		)
	);

	/**
	 * Heading H1 Fonts Title
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-heading-typo-h1]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-heading-typo-h1]', array(
				'label'    	=> esc_html__( 'Headings: H1', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 40,
			)
		)
	);

	/**
	 * Option: Heading H1 Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h1-font-family]', array(
			'default'           => bstone_get_option( 'h1-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h1-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 45,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h1-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h1-font-weight]', array(
			'default'           => bstone_get_option( 'h1-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h1-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 50,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h1-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h1-text-transform]', array(
			'default'           => bstone_get_option( 'h1-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[h1-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 55,
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-h1-size]', array(
			'default'           => bstone_get_option( 'font-h1-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-h1-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 60,
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
	 * Heading H2 Fonts Title
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-heading-typo-h2]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-heading-typo-h2]', array(
				'label'    	=> esc_html__( 'Headings: H2', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 65,
			)
		)
	);

	/**
	 * Option: Heading H2 Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h2-font-family]', array(
			'default'           => bstone_get_option( 'h2-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h2-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 70,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h2-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h2-font-weight]', array(
			'default'           => bstone_get_option( 'h2-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h2-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 75,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h2-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h2-text-transform]', array(
			'default'           => bstone_get_option( 'h2-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[h2-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 80,
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-h2-size]', array(
			'default'           => bstone_get_option( 'font-h2-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-h2-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 85,
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
	 * Heading H3 Fonts Title
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-heading-typo-h3]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-heading-typo-h3]', array(
				'label'    	=> esc_html__( 'Headings: H3', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 90,
			)
		)
	);

	/**
	 * Option: Heading H3 Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h3-font-family]', array(
			'default'           => bstone_get_option( 'h3-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h3-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 95,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h3-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h3-font-weight]', array(
			'default'           => bstone_get_option( 'h3-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h3-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 100,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h3-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h3-text-transform]', array(
			'default'           => bstone_get_option( 'h3-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[h3-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 105,
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-h3-size]', array(
			'default'           => bstone_get_option( 'font-h3-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-h3-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 110,
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
	 * Heading H4 Fonts Title
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-heading-typo-h4]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-heading-typo-h4]', array(
				'label'    	=> esc_html__( 'Headings: H4', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 115,
			)
		)
	);

	/**
	 * Option: Heading H4 Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h4-font-family]', array(
			'default'           => bstone_get_option( 'h4-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h4-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 120,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h4-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h4-font-weight]', array(
			'default'           => bstone_get_option( 'h4-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h4-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 125,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h4-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h4-text-transform]', array(
			'default'           => bstone_get_option( 'h4-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[h4-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 130,
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-h4-size]', array(
			'default'           => bstone_get_option( 'font-h4-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-h4-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 135,
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
	 * Heading H5 Fonts Title
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-heading-typo-h5]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-heading-typo-h5]', array(
				'label'    	=> esc_html__( 'Headings: H5', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 140,
			)
		)
	);

	/**
	 * Option: Heading H5 Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h5-font-family]', array(
			'default'           => bstone_get_option( 'h5-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h5-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 145,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h5-font-weight]',
			)
		)
	);

	/**
	 * Option: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h5-font-weight]', array(
			'default'           => bstone_get_option( 'h5-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h5-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 150,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h5-font-family]',
			)
		)
	);

	/**
	 * Option: Body Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h5-text-transform]', array(
			'default'           => bstone_get_option( 'h5-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[h5-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 155,
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
	 * Option: Body Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-h5-size]', array(
			'default'           => bstone_get_option( 'font-h5-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-h5-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 160,
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
	 * Heading H6 Fonts Title
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[general-heading-typo-h6]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[general-heading-typo-h6]', array(
				'label'    	=> esc_html__( 'Headings: H6', 'bstone' ),
				'section'  	=> 'section-general-typo-settings',
				'priority' 	=> 165,
			)
		)
	);

	/**
	 * Option: Heading H6 Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h6-font-family]', array(
			'default'           => bstone_get_option( 'h6-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h6-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 170,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h6-font-weight]',
			)
		)
	);

	/**
	 * Option: H6 Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h6-font-weight]', array(
			'default'           => bstone_get_option( 'h6-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h6-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-general-typo-settings',
				'priority'    => 175,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[h6-font-family]',
			)
		)
	);

	/**
	 * Option: H6 Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h6-text-transform]', array(
			'default'           => bstone_get_option( 'h6-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[h6-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-general-typo-settings',
			'priority' => 180,
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
	 * Option: H6 Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[font-h6-size]', array(
			'default'           => bstone_get_option( 'font-h6-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[font-h6-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-general-typo-settings',
				'priority'    => 185,
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