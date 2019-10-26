<?php
/**
 * Styling Options for Bstone Theme Sidebar - Colors
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-sidebar-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-sidebar',
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
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Option: Widget Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-widget-title-color]', array(
			'default'           => bstone_get_option( 'sidebar-widget-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-widget-title-color]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 5,
				'label'    => __( 'Title Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-text-color]', array(
			'default'           => bstone_get_option( 'sidebar-text-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-text-color]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 10,
				'label'    => __( 'Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-link-color]', array(
			'default'           => bstone_get_option( 'sidebar-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-link-color]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 15,
				'label'    => __( 'Link Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-link-color-hover]', array(
			'default'           => bstone_get_option( 'sidebar-link-color-hover' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-link-color-hover]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 20,
				'label'    => __( 'Link Hover Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-background-colors-devider]', array(
				'section'  => 'section-color-sidebar',
				'type'     => 'bst-divider',
				'priority' => 25,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Sidebar Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-bg-color]', array(
			'default'           => bstone_get_option( 'sidebar-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-bg-color]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 30,
				'label'    => __( 'Sidebar Background', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Widget Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[widget-bg-color]', array(
			'default'           => bstone_get_option( 'widget-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[widget-bg-color]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 35,
				'label'    => __( 'Widget Background', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Widget Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[widget-border-color]', array(
			'default'           => bstone_get_option( 'widget-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[widget-border-color]', array(
				'section'  => 'section-color-sidebar',
				'priority' => 40,
				'label'    => __( 'Widget Border', 'bstone' ),
			)
		)
	);