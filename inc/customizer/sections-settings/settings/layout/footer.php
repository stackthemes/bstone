<?php
/**
 * Footer Options for Bstone Theme.
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-footer-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-footer',
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
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);
	
	/**
	 * Option: Footer Widgets Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-adv]', array(
			'default'           => bstone_get_option( 'footer-adv' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Radio_Image(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-adv]', array(
				'type'    => 'bst-radio-image',
				'label'   => __( 'Footer Top Area', 'bstone' ),
				'section' => 'section-footer',
				'priority' => 5,
				'choices' => array(
					'disabled'    => array(
						'label' => __( 'Disable', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/no-adv-footer-115x48.png',
					),
					'layout-4'  => array(
						'label' => __( 'Layout 4', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/layout-4-115x48.png',
					),
				),
			)
		)
	);

	/**
	 * Option: Footer Widgets Area Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-top-area-width]', array(
			'default'           => bstone_get_option( 'footer-top-area-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-top-area-width]', array(
			'type'     => 'select',
			'section'  => 'section-footer',
			'priority' => 10,
			'label'    => __( 'Footer Top Width', 'bstone' ),
			'choices'  => array(
				'full' => __( 'Full Width', 'bstone' ),
				'content'    => __( 'Content Width', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[section-st-small-footer-layout-info-w]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-footer',
				'priority' => 15,
				'settings' => array(),
			)
		)
	);

	/**
	 * Customizer Tabs - To navigate to other related sections.
	 */
	$wp_customize->add_control(
		new Bstone_Control_Tabs(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-footer-bar-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-footer',
				'priority'      => 18,
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
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);

	/**
	 * Option: Footer Bar Layout
	 */

	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-sml-layout]', array(
			'default'           => bstone_get_option( 'footer-sml-layout' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Radio_Image(
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-sml-layout]', array(
				'type'     => 'bst-radio-image',
				'section'  => 'section-footer',
				'priority' => 20,
				'label'    => __( 'Footer Bottom Bar', 'bstone' ),
				'choices'  => array(
					'disabled'            => array(
						'label' => __( 'Disabled', 'bstone' ),
						'path'  => BSTONE_THEME_URI . 'assets/images/disabled-footer-76x48.png',
					),
					'footer-sml-layout-1' => array(
						'label' => __( 'Footer Bar Layout 1', 'bstone' ),
						'path'  => BSTONE_THEME_URI . 'assets/images/footer-layout-1-76x48.png',
					),
					'footer-sml-layout-2' => array(
						'label' => __( 'Footer Bar Layout 2', 'bstone' ),
						'path'  => BSTONE_THEME_URI . 'assets/images/footer-layout-2-76x48.png',
					),
				),
			)
		)
	);

	/**
	 * Option: Footer Bar Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-width]', array(
			'default'           => bstone_get_option( 'footer-bar-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-bar-width]', array(
			'type'     => 'select',
			'section'  => 'section-footer',
			'priority' => 25,
			'label'    => __( 'Footer Bottom Bar Width', 'bstone' ),
			'choices'  => array(
				'full' => __( 'Full Width', 'bstone' ),
				'content'    => __( 'Content Width', 'bstone' ),
			),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			BSTONE_THEME_SETTINGS . '[footer-adv]', array(
				'selector'            => 'footer#colophon',
				'settings'   		  => array('bstone-settings[footer-adv]', 'bstone-settings[footer-sml-layout]'),
				'container_inclusive' => false,
				'render_callback'     => 'bstone_render_footer_change',
				'fallback_refresh' 	  => false, //
			)
		);
	}