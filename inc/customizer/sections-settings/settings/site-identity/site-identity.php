<?php
/**
 * Site Identity Options for Bstone Theme.
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
	 * Option: Retina logo selector
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bst-header-retina-logo]', array(
			'default'           => bstone_get_option( 'bst-header-retina-logo' ),
			'type'              => 'option',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-header-retina-logo]', array(
				'section'  => 'title_tagline',
				'priority' => 5,
				'label'    => __( 'Retina Logo', 'bstone' ),
				'library_filter' => array( 'gif', 'jpg', 'jpeg', 'png', 'ico' ),
			)
		)
	);

	/**
	 * Option: Logo Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bst-header-logo-width]', array(
			'default'           => bstone_get_option( 'bst-header-logo-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-header-logo-width]', array(
				'type'        => 'bst-slider',
				'section'     => 'title_tagline',
				'priority'    => 5,
				'label'       => __( 'Logo Width', 'bstone' ),
				'input_attrs' => array(
					'min'  => 50,
					'step' => 1,
					'max'  => 600,
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-site-logo-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'title_tagline',
				'priority' => 5,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Display Title
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[display-site-title]', array(
			'default'           => bstone_get_option( 'display-site-title' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[display-site-title]', array(
			'type'        => 'checkbox',
			'section'     => 'title_tagline',
			'label'       => __( 'Display Site Title', 'bstone' ),
			'priority'    => 6,
		)
	);

	/**
	 * Option: Display Tagline
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[display-site-tagline]', array(
			'default'           => bstone_get_option( 'display-site-tagline' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
			'priority'          => 5,
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[display-site-tagline]', array(
			'type'        => 'checkbox',
			'section'     => 'title_tagline',
			'label'       => __( 'Display Site Tagline', 'bstone' ),
		)
	);

	/**
	 * Option: Divider
	*/
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-site-icon-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'title_tagline',
				'priority' => 50,
				'settings' => array(),
			)
		)
	);

