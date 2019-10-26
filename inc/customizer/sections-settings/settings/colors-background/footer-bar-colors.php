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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-footer-bar-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-footer-bar',
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
					'section-footer-bar-typo-settings',
					'section-color-footer-bar',
					'section-spacing-footer-bar'
				),
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);
	
	/**
	 * Option: Footer Bottom Bar Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bottom-bg-color]', array(
			'default'           => bstone_get_option( 'footer-bottom-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bottom-bg-color]', array(
				'section'  		  => 'section-color-footer-bar',
				'priority' 		  => 10,
				'label'    		  => __( 'Footer Bottom Bar Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Footer Bar Top Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-top-border-size]', array(
			'default'           => bstone_get_option( 'footer-bar-top-border-size' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-bar-top-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-color-footer-bar',
			'priority'    => 15,
			'label'       => __( 'Footer Bar Top Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);
	
	/**
	 * Option: Footer Bar Top Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-top-border-color]', array(
			'default'           => bstone_get_option( 'footer-bar-top-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bar-top-border-color]', array(
				'section'  => 'section-color-footer-bar',
				'priority' => 20,
				'label'    => __( 'Footer Bar Top Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Footer Bar Bottom Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-bottom-border-size]', array(
			'default'           => bstone_get_option( 'footer-bar-bottom-border-size' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-bar-bottom-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-color-footer-bar',
			'priority'    => 25,
			'label'       => __( 'Footer Bar Bottom Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);
	
	/**
	 * Option: Footer Bar Bottom Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-bottom-border-color]', array(
			'default'           => bstone_get_option( 'footer-bar-bottom-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bar-bottom-border-color]', array(
				'section'  => 'section-color-footer-bar',
				'priority' => 30,
				'label'    => __( 'Footer Bar Bottom Border Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Footer Bottom Bar Colors Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bottom-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-footer-bar',
				'priority' => 35,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Footer Bottom Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bottom-title-color]', array(
			'default'           => bstone_get_option( 'footer-bottom-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bottom-title-color]', array(
				'section'  => 'section-color-footer-bar',
				'priority' => 40,
				'label'    => __( 'Footer Bar Widgets Title Color', 'bstone' ),
			)
		)
	);
	
	/**
	 * Option: Footer Bottom Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bottom-text-color]', array(
			'default'           => bstone_get_option( 'footer-bottom-text-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bottom-text-color]', array(
				'section'  => 'section-color-footer-bar',
				'priority' => 45,
				'label'    => __( 'Footer Bar Widgets Text Color', 'bstone' ),
			)
		)
	);
	
	/**
	 * Option: Footer Bottom Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bottom-link-color]', array(
			'default'           => bstone_get_option( 'footer-bottom-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bottom-link-color]', array(
				'section'  => 'section-color-footer-bar',
				'priority' => 50,
				'label'    => __( 'Footer Bar Widgets Link Color', 'bstone' ),
			)
		)
	);
	
	/**
	 * Option: Footer Bottom Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bottom-link-hover-color]', array(
			'default'           => bstone_get_option( 'footer-bottom-link-hover-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bottom-link-hover-color]', array(
				'section'  => 'section-color-footer-bar',
				'priority' => 55,
				'label'    => __( 'Footer Bar Widgets Link Hover Color', 'bstone' ),
			)
		)
	);