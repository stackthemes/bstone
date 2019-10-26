<?php
/**
 * Buttons Colors
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-buttons-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-buttons',
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
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Option: Button Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[buttons-text-color]', array(
			'default'           => bstone_get_option( 'buttons-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-text-color]', array(
				'section'  => 'section-color-buttons',
				'priority' => 5,
				'label'    => __( 'Buttons Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Button Text Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[buttons-text-color-hover]', array(
			'default'           => bstone_get_option( 'buttons-text-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-text-color-hover]', array(
				'section'  => 'section-color-buttons',
				'priority' => 10,
				'label'    => __( 'Buttons Hover Text Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-buttons-bg-color]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-buttons',
				'priority' => 15,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Button Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[buttons-background-color]', array(
			'default'           => bstone_get_option( 'buttons-background-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-background-color]', array(
				'section'  => 'section-color-buttons',
				'priority' => 20,
				'label'    => __( 'Buttons Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Button Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[buttons-background-color-hover]', array(
			'default'           => bstone_get_option( 'buttons-background-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-background-color-hover]', array(
				'section'  => 'section-color-buttons',
				'priority' => 25,
				'label'    => __( 'Buttons Hover Background Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-buttons-border-color]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-buttons',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Button Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[buttons-border-color]', array(
			'default'           => bstone_get_option( 'buttons-border-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-border-color]', array(
				'section'  => 'section-color-buttons',
				'priority' => 35,
				'label'    => __( 'Buttons Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Button Border Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[buttons-border-color-hover]', array(
			'default'           => bstone_get_option( 'buttons-border-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-border-color-hover]', array(
				'section'  => 'section-color-buttons',
				'priority' => 40,
				'label'    => __( 'Buttons Hover Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Read More Button
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[read-more-button-color-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-more-button-color-heading]', array(
				'label'    	=> esc_html__( 'Read More Button', 'bstone' ),
				'section'  	=> 'section-color-buttons',
				'priority' 	=> 45,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-read-text-color",
					"customize-control-bstone-settings-read-text-color-hover",
					"customize-control-bstone-settings-divider-read-bg-color",
					"customize-control-bstone-settings-read-background-color",
					"customize-control-bstone-settings-read-background-color-hover",
					"customize-control-bstone-settings-divider-read-border-color",
					"customize-control-bstone-settings-read-border-color",
					"customize-control-bstone-settings-read-border-color-hover"
				),
			)
		)
	);

	/**
	 * Option: Button Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[read-text-color]', array(
			'default'           => bstone_get_option( 'read-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-text-color]', array(
				'section'  => 'section-color-buttons',
				'priority' => 50,
				'label'    => __( 'Buttons Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Button Text Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[read-text-color-hover]', array(
			'default'           => bstone_get_option( 'read-text-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-text-color-hover]', array(
				'section'  => 'section-color-buttons',
				'priority' => 55,
				'label'    => __( 'Buttons Hover Text Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-read-bg-color]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-buttons',
				'priority' => 60,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Button Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[read-background-color]', array(
			'default'           => bstone_get_option( 'read-background-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-background-color]', array(
				'section'  => 'section-color-buttons',
				'priority' => 65,
				'label'    => __( 'Buttons Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Button Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[read-background-color-hover]', array(
			'default'           => bstone_get_option( 'read-background-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-background-color-hover]', array(
				'section'  => 'section-color-buttons',
				'priority' => 70,
				'label'    => __( 'Buttons Hover Background Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-read-border-color]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-buttons',
				'priority' => 75,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Button Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[read-border-color]', array(
			'default'           => bstone_get_option( 'read-border-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-border-color]', array(
				'section'  => 'section-color-buttons',
				'priority' => 80,
				'label'    => __( 'Buttons Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Button Border Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[read-border-color-hover]', array(
			'default'           => bstone_get_option( 'read-border-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-border-color-hover]', array(
				'section'  => 'section-color-buttons',
				'priority' => 85,
				'label'    => __( 'Buttons Hover Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	// Learn More link if Bstone Pro is not activated.
	if ( ! defined( 'BSTONE_PRO_VER' ) ) {
		$wp_customize->add_control(
			new Bstone_Control_Divider(
				$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-pro-divider]', array(
					'type'        => 'bst-divider',
					'section' 	  => 'section-color-buttons',
					'priority'    => 90,
					'settings'    => array(),
					'dividerline' => true,
					'link' 		  => 'https://wpbstone.com/pro/?utm_source=customizer&utm_medium=upgrade-link&utm_campaign=upgrade-to-pro',
					'html'     	  => __( 'More Options Available in Bstone Pro!', 'bstone' ),
				)
			)
		);
	}