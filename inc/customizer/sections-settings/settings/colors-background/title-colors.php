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
		$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-area-color-tabs]', array(
			'type'          => 'bst-tabs',
			'section'       => 'section-color-page-title',
			'priority'      => 1,
			'settings'      => array(),
			'tabs_data'     => array(
				__('layout', 'bstone'),
				__('typography', 'bstone'),
				__('colors', 'bstone'),
				__('spacing', 'bstone')
			),
			'tabs_sections' => array(
				'section-title',
				'section-single-typo-settings',
				'section-color-page-title',
				'section-spacing-page-title'
			),
			'tabs_active'   => __('colors', 'bstone'),
		)
	)
);

	/**
	 * Option: Post / Page Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-single-title-color]', array(
			'default'           => bstone_get_option( 'page-single-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-single-title-color]', array(
				'section'  => 'section-color-page-title',
				'priority' => 10,
				'label'    => __( 'Post / Page Title Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Breadcrumbs Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-single-breadcrumbs-color]', array(
			'default'           => bstone_get_option( 'page-single-breadcrumbs-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-single-breadcrumbs-color]', array(
				'section'  => 'section-color-page-title',
				'priority' => 15,
				'label'    => __( 'Breadcrumbs Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Title Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-single-title-bg-color]', array(
			'default'           => bstone_get_option( 'page-single-title-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-single-title-bg-color]', array(
				'section'  => 'section-color-page-title',
				'priority' => 20,
				'label'    => __( 'Post / Page Title Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Title BG Image - Position
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-position]', array(
			'default'           => bstone_get_option( 'title-img-position' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-position]', array(
			'type'     => 'select',
			'section'  => 'section-color-page-title',
			'priority' => 30,
			'label'    => __( 'Position', 'bstone' ),
			'choices'  => array(
				'initial' 		 => __( 'Default', 'bstone' ),
				'top-left'  	 => __( 'Top Left', 'bstone' ),
				'top-center'  	 => __( 'Top Center', 'bstone' ),
				'top-right'  	 => __( 'Top Right', 'bstone' ),
				'center-left'  	 => __( 'Center Left', 'bstone' ),
				'center-center'  => __( 'Center Center', 'bstone' ),
				'center-right'   => __( 'Center Right', 'bstone' ),
				'bottom-left'  	 => __( 'Bottom Left', 'bstone' ),
				'bottom-center'  => __( 'Bottom Center', 'bstone' ),
				'bottom-right'   => __( 'Bottom Right', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Title BG Image - Attachment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-attachment]', array(
			'default'           => bstone_get_option( 'title-img-attachment' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-attachment]', array(
			'type'     => 'select',
			'section'  => 'section-color-page-title',
			'priority' => 35,
			'label'    => __( 'Attachment', 'bstone' ),
			'choices'  => array(
				'initial' => __( 'Default', 'bstone' ),
				'scroll'  => __( 'Scroll', 'bstone' ),
				'fixed'   => __( 'Fixed', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Title BG Image - Repeat
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-repeat]', array(
			'default'           => bstone_get_option( 'title-img-repeat' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-repeat]', array(
			'type'     => 'select',
			'section'  => 'section-color-page-title',
			'priority' => 40,
			'label'    => __( 'Repeat', 'bstone' ),
			'choices'  => array(
				'initial' 	 => __( 'Default', 'bstone' ),
				'no-repeat'  => __( 'No-repeat', 'bstone' ),
				'repeat'   	 => __( 'Repeat', 'bstone' ),
				'repeat-x' 	 => __( 'Repeat-x', 'bstone' ),
				'repeat-y' 	 => __( 'Repeat-y', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Title BG Image - Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-size]', array(
			'default'           => bstone_get_option( 'title-img-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-size]', array(
			'type'     => 'select',
			'section'  => 'section-color-page-title',
			'priority' => 45,
			'label'    => __( 'Size', 'bstone' ),
			'choices'  => array(
				'initial' 	=> __( 'Default', 'bstone' ),
				'auto'  	=> __( 'Auto', 'bstone' ),
				'cover'   	=> __( 'Cover', 'bstone' ),
				'contain'   => __( 'Contain', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Post / Page Title Background Image Overlay Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-bg-overlay-color]', array(
			'default'           => bstone_get_option( 'page-title-bg-overlay-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-bg-overlay-color]', array(
				'section'  => 'section-color-page-title',
				'priority' => 50,
				'label'    => __( 'Title Background Image Overlay Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Title Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-border-color]', array(
			'default'           => bstone_get_option( 'page-title-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-border-color]', array(
				'section'  => 'section-color-page-title',
				'priority' => 55,
				'label'    => __( 'Title Border Bottom Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Use Page Featured Image As Title Background
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-featured-title-bg]', array(
			'default'           => bstone_get_option( 'page-featured-title-bg' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-featured-title-bg]', array(
			'type'        => 'checkbox',
			'section'     => 'section-color-page-title',
			'label'       => __( 'Use Post/Page Featured Image As Title Background', 'bstone' ),
			'priority'    => 60,
		)
	);