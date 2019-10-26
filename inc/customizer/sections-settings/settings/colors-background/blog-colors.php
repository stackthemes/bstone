<?php
/**
 * Styling Options for Bstone Theme Blog - Colors
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-blog-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-blog',
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
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Option: Blog Entry Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-title-color]', array(
			'default'           => bstone_get_option( 'blog-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-title-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 75,
				'label'    => __( 'Blog Entry Title Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Entry Meta Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-color]', array(
			'default'           => bstone_get_option( 'blog-meta-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 80,
				'label'    => __( 'Post Meta Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Entry Meta Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-link-color]', array(
			'default'           => bstone_get_option( 'blog-meta-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-link-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 85,
				'label'    => __( 'Post Meta Link Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Entry Meta Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-link-color-hover]', array(
			'default'           => bstone_get_option( 'blog-meta-link-color-hover' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-link-color-hover]', array(
				'section'  => 'section-color-blog',
				'priority' => 90,
				'label'    => __( 'Post Meta Link Hover Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-entry-bg-color]', array(
			'default'           => bstone_get_option( 'blog-entry-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-entry-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 95,
				'label'    => __( 'Blog Entry Background Color', 'bstone' ),
			)
		)
	);


	/**
	 * Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-blog',
				'priority' => 100,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-color]', array(
			'default'           => bstone_get_option( 'post-type-icon-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 105,
				'label'    => __( 'Post Type Icon Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon BG Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-bg-color]', array(
			'default'           => bstone_get_option( 'post-type-icon-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 110,
				'label'    => __( 'Post Type Icon Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-color]', array(
			'default'           => bstone_get_option( 'post-type-icon-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-border-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 115,
				'label'    => __( 'Post Type Icon Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-size]', array(
			'default'           => bstone_get_option( 'post-type-icon-border-size' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-color-blog',
			'priority'    => 120,
			'label'       => __( 'Post Type Icon Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-radius]', array(
			'default'           => bstone_get_option( 'post-type-icon-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-color-blog',
			'priority'    => 125,
			'label'       => __( 'Post Type Icon Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);


	/**
	 * Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[image-caption-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-blog',
				'priority' => 130,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Image Caption Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[img-caption-color]', array(
			'default'           => bstone_get_option( 'img-caption-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[img-caption-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 135,
				'label'    => __( 'Image Caption Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Image Caption BG Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[img-caption-bg-color]', array(
			'default'           => bstone_get_option( 'img-caption-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[img-caption-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 140,
				'label'    => __( 'Image Caption Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Image Caption Padding Top/Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[img-caption-padding]', array(
			'default'           => bstone_get_option( 'img-caption-padding' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[img-caption-padding]', array(
			'type'        => 'number',
			'section'     => 'section-color-blog',
			'priority'    => 145,
			'label'       => __( 'Image Caption Padding Top/Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);