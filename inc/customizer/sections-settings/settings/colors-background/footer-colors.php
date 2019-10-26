<?php
/**
 * Styling Options for Bstone Theme Footer - Colors
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-footer-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-footer',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-footer',
					'section-footer-typo-settings',
					'section-color-footer',
					'section-spacing-footer'
				),
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Option: Footer Top Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-background-color]', array(
			'default'           => bstone_get_option( 'footer-top-background-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-background-color]', array(
				'section'  		  => 'section-color-footer',
				'priority' 		  => 5,
				'label'    		  => __( 'Footer Background Color', 'bstone' ),
			)
		)
	);
	
	
	/**
	 * Option: Footer Borders Color Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-border-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-footer',
				'priority' => 10,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Top Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-border-size]', array(
			'default'           => bstone_get_option( 'footer-top-border-size' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-top-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-color-footer',
			'priority'    => 15,
			'label'       => __( 'Footer Top Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);
	
	/**
	 * Option: Footer Top Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-border-color]', array(
			'default'           => bstone_get_option( 'footer-top-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-border-color]', array(
				'section'  => 'section-color-footer',
				'priority' => 20,
				'label'    => __( 'Footer Top Border Color', 'bstone' ),
			)
		)
	);
	
	
	/**
	 * Option: Footer Top Color Devicer
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-footer',
				'priority' => 25,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Top Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-title-color]', array(
			'default'           => bstone_get_option( 'footer-top-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-title-color]', array(
				'section'  => 'section-color-footer',
				'priority' => 30,
				'label'    => __( 'Footer Widgets Title Color', 'bstone' ),
			)
		)
	);
	
	/**
	 * Option: Footer Top Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-text-color]', array(
			'default'           => bstone_get_option( 'footer-top-text-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-text-color]', array(
				'section'  => 'section-color-footer',
				'priority' => 35,
				'label'    => __( 'Footer Widgets Text Color', 'bstone' ),
			)
		)
	);
	
	/**
	 * Option: Footer Top Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-link-color]', array(
			'default'           => bstone_get_option( 'footer-top-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-link-color]', array(
				'section'  => 'section-color-footer',
				'priority' => 40,
				'label'    => __( 'Footer Widgets Link Color', 'bstone' ),
			)
		)
	);
	
	/**
	 * Option: Footer Top Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-link-hover-color]', array(
			'default'           => bstone_get_option( 'footer-top-link-hover-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-link-hover-color]', array(
				'section'  => 'section-color-footer',
				'priority' => 45,
				'label'    => __( 'Footer Widgets Link Hover Color', 'bstone' ),
			)
		)
	);