<?php
/**
 * Blog / Archive Typography
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-blog-typography-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-archive-typo-settings',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-blog',
					'section-archive-typo-settings',
					'section-color-blog',
					'section-spacing-blog'
				),
				'tabs_active'   => __('typography', 'bstone'),
			)
		)
	);

	/**
	 * Blog / Archive Typography - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-typo-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-title-heading]', array(
				'label'    	=> esc_html__( 'Post Title Typography', 'bstone' ),
				'section'  	=> 'section-archive-typo-settings',
				'priority' 	=> 10,
			)
		)
	);

	/**
	 * Blog / Archive Typography - Title: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-title-font-family]', array(
			'default'           => bstone_get_option( 'blog-typo-title-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-title-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-archive-typo-settings',
				'priority'    => 15,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[blog-typo-title-font-weight]',
			)
		)
	);

	/**
	 * Blog / Archive Typography - Title: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-title-font-weight]', array(
			'default'           => bstone_get_option( 'blog-typo-title-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-title-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-archive-typo-settings',
				'priority'    => 20,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[blog-typo-title-font-family]',
			)
		)
	);

	/**
	 * Blog / Archive Typography - Title: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-title-transform]', array(
			'default'           => bstone_get_option( 'blog-typo-title-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-typo-title-transform]', array(
			'type'     => 'select',
			'section'  => 'section-archive-typo-settings',
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
	 * Blog / Archive Typography - Title: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-title-font-size]', array(
			'default'           => bstone_get_option( 'blog-typo-title-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-title-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-archive-typo-settings',
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
	 * Blog / Archive Typography - Entry Meta: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-typo-entry-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-entry-heading]', array(
				'label'    	=> esc_html__( 'Entry Meta Typography', 'bstone' ),
				'section'  	=> 'section-archive-typo-settings',
				'priority' 	=> 35,
			)
		)
	);

	/**
	 * Blog / Archive Typography - Entry Meta: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-family]', array(
			'default'           => bstone_get_option( 'blog-typo-entry-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-archive-typo-settings',
				'priority'    => 40,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-weight]',
			)
		)
	);

	/**
	 * Blog / Archive Typography - Entry Meta: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-weight]', array(
			'default'           => bstone_get_option( 'blog-typo-entry-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-archive-typo-settings',
				'priority'    => 45,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-family]',
			)
		)
	);

	/**
	 * Blog / Archive Typography - Entry Meta: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-entry-transform]', array(
			'default'           => bstone_get_option( 'blog-typo-entry-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-typo-entry-transform]', array(
			'type'     => 'select',
			'section'  => 'section-archive-typo-settings',
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
	 * Blog / Archive Typography - Entry Meta: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-size]', array(
			'default'           => bstone_get_option( 'blog-typo-entry-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-typo-entry-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-archive-typo-settings',
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