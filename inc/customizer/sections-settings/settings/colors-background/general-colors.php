<?php
/**
 * Styling Options for Bstone Theme - Colors
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-content-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-general',
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
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Option: Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[base-text-color]', array(
			'default'           => bstone_get_option( 'base-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[base-text-color]', array(
				'section'  => 'section-color-general',
				'priority' => 5,
				'label'    => __( 'Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[link-color]', array(
			'default'           => bstone_get_option( 'link-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[link-color]', array(
				'section'  => 'section-color-general',
				'priority' => 15,
				'label'    => __( 'Theme Color / Link Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[link-h-color]', array(
			'default'           => bstone_get_option( 'link-h-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[link-h-color]', array(
				'section'  => 'section-color-general',
				'priority' => 20,
				'label'    => __( 'Link Hover Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Highlight Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[highlight-text-color]', array(
			'default'           => bstone_get_option( 'highlight-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[highlight-text-color]', array(
				'section'  => 'section-color-general',
				'priority' => 25,
				'label'    => __( 'Highlight Text Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-outside-bg-color]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-general',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Page BG Image - Position
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-bg-img-position]', array(
			'default'           => bstone_get_option( 'page-bg-img-position' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-bg-img-position]', array(
			'type'     => 'select',
			'section'  => 'section-color-general',
			'priority' => 45,
			'label'    => __( 'Position', 'bstone' ),
			'choices'  => array(
				'initial' 		 => __( 'Default', 'bstone' ),
				'top-left'  	 => __( 'Top Left', 'bstone' ),
				'top-center'  	 => __( 'Top Center', 'bstone' ),
				'top-right'  	 => __( 'Top Right', 'bstone' ),
				'center-left'  	 => __( 'Center Left', 'bstone' ),
				'center-center'  => __( 'Center-Center', 'bstone' ),
				'center-right'   => __( 'Center Right', 'bstone' ),
				'bottom-left'  	 => __( 'Bottom Left', 'bstone' ),
				'bottom-center'  => __( 'Bottom Center', 'bstone' ),
				'bottom-right'   => __( 'Bottom Right', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Page BG Image - Attachment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-bg-img-attachment]', array(
			'default'           => bstone_get_option( 'page-bg-img-attachment' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-bg-img-attachment]', array(
			'type'     => 'select',
			'section'  => 'section-color-general',
			'priority' => 50,
			'label'    => __( 'Attachment', 'bstone' ),
			'choices'  => array(
				'initial' => __( 'Default', 'bstone' ),
				'scroll'  => __( 'Scroll', 'bstone' ),
				'fixed'   => __( 'Fixed', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Page BG Image - Repeat
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-bg-img-repeat]', array(
			'default'           => bstone_get_option( 'page-bg-img-repeat' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-bg-img-repeat]', array(
			'type'     => 'select',
			'section'  => 'section-color-general',
			'priority' => 55,
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
	 * Option: Page BG Image - Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-bg-img-size]', array(
			'default'           => bstone_get_option( 'page-bg-img-size' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-bg-img-size]', array(
			'type'     => 'select',
			'section'  => 'section-color-general',
			'priority' => 60,
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
	 * Option: Container Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[container-bg-color]', array(
			'default'           => bstone_get_option( 'container-bg-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[container-bg-color]', array(
				'section'  => 'section-color-general',
				'priority' => 65,
				'label'    => __( 'Container BG Color', 'bstone' ),
			)
		)
	);


	/**
	 * Option: Primary Content Area Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[primary-content-bg-color]', array(
			'default'           => bstone_get_option( 'primary-content-bg-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[primary-content-bg-color]', array(
				'section'  => 'section-color-general',
				'priority' => 70,
				'label'    => __( 'Primary Content Area BG Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Main Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[main-border-color]', array(
			'default'           => bstone_get_option( 'main-border-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[main-border-color]', array(
				'section'  => 'section-color-general',
				'priority' => 75,
				'label'    => __( 'Main Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Heading Colors : Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[hcolors-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[hcolors-heading]', array(
				'label'    	=> esc_html__( 'Heading Colors', 'bstone' ),
				'section'  	=> 'section-color-general',
				'priority' 	=> 80,
			)
		)
	);


	/**
	 * Heading Colors : H1 Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h1-color]', array(
			'default'           => bstone_get_option( 'h1-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h1-color]', array(
				'section'  => 'section-color-general',
				'priority' => 85,
				'label'    => __( 'H1 Color', 'bstone' ),
			)
		)
	);


	/**
	 * Heading Colors : H2 Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h2-color]', array(
			'default'           => bstone_get_option( 'h2-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h2-color]', array(
				'section'  => 'section-color-general',
				'priority' => 90,
				'label'    => __( 'H2 Color', 'bstone' ),
			)
		)
	);


	/**
	 * Heading Colors : H3 Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h3-color]', array(
			'default'           => bstone_get_option( 'h3-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h3-color]', array(
				'section'  => 'section-color-general',
				'priority' => 95,
				'label'    => __( 'H3 Color', 'bstone' ),
			)
		)
	);


	/**
	 * Heading Colors : H4 Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h4-color]', array(
			'default'           => bstone_get_option( 'h4-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h4-color]', array(
				'section'  => 'section-color-general',
				'priority' => 100,
				'label'    => __( 'H4 Color', 'bstone' ),
			)
		)
	);


	/**
	 * Heading Colors : H5 Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h5-color]', array(
			'default'           => bstone_get_option( 'h5-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h5-color]', array(
				'section'  => 'section-color-general',
				'priority' => 105,
				'label'    => __( 'H5 Color', 'bstone' ),
			)
		)
	);


	/**
	 * Heading Colors : H6 Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[h6-color]', array(
			'default'           => bstone_get_option( 'h6-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[h6-color]', array(
				'section'  => 'section-color-general',
				'priority' => 110,
				'label'    => __( 'H6 Color', 'bstone' ),
			)
		)
	);
