<?php
/**
 * Page / Post Title Layout Option for Bstone Theme.
 *
 * @package     Bstone
 * @author      Bstone
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-area-layout-tabs]', array(
			'type'          => 'bst-tabs',
			'section'       => 'section-title',
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
			'tabs_active'   => __('layout', 'bstone'),
		)
	)
);

	/**
	 * Option: Display Page Title Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-structure]', array(
			'default'           => bstone_get_option( 'page-title-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-title',
				'priority' => 5,
				'label'    => __( 'Title Structure', 'bstone' ),
				'choices'  => array(
					'page-title' 		=> __( 'Title', 'bstone' ),
					'page-breadcrumbs'  => __( 'Breadcrumbs', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Title & Breadcrumbs Alignment - Page
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-alignment]', array(
			'default'           => bstone_get_option( 'page-title-alignment' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-title-alignment]', array(
			'type'     => 'select',
			'section'  => 'section-title',
			'priority' => 10,
			'label'    => __( 'Alignment', 'bstone' ),
			'choices'  => array(
				'centre' => __( 'Centre', 'bstone' ),
				'left'  => __( 'Left', 'bstone' ),
				'right'  => __( 'Right', 'bstone' ),
				'inline'  => __( 'Inline', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Bottom Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-border-width]', array(
			'default'           => bstone_get_option( 'page-title-border-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-title-border-width]', array(
			'type'        => 'number',
			'section'     => 'section-title',
			'priority'    => 15,
			'label'       => __( 'Border Bottom Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);

	/**
	 * Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[enable-title-area-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[enable-title-area-heading]', array(
				'label'    	=> esc_html__( 'Enable Title Section', 'bstone' ),
				'section'  	=> 'section-title',
				'priority' 	=> 20,
				'collapse'	=> false,
			)
		)
	);

	/**
	 * Option: Enable title area on front page
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-title-area-frontpage]', array(
			'default'           => bstone_get_option( 'enable-title-area-frontpage' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-title-area-frontpage]', array(
			'type'        => 'checkbox',
			'section'     => 'section-title',
			'label'       => __( 'Blog Title', 'bstone' ),
			'priority'    =>25,
		)
	);

	/**
	 * Option: Enable title area on archive pages
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-title-area-archive]', array(
			'default'           => bstone_get_option( 'enable-title-area-archive' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-title-area-archive]', array(
			'type'        => 'checkbox',
			'section'     => 'section-title',
			'label'       => __( 'Archive Title', 'bstone' ),
			'priority'    =>30,
		)
	);

	/**
	 * Option: Enable title area on post single
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-title-area-single]', array(
			'default'           => bstone_get_option( 'enable-title-area-single' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-title-area-single]', array(
			'type'        => 'checkbox',
			'section'     => 'section-title',
			'label'       => __( 'Post Title', 'bstone' ),
			'priority'    =>35,
		)
	);

	/**
	 * Option: Enable title area on pages
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-title-area-page]', array(
			'default'           => bstone_get_option( 'enable-title-area-page' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-title-area-page]', array(
			'type'        => 'checkbox',
			'section'     => 'section-title',
			'label'       => __( 'Page Title', 'bstone' ),
			'priority'    =>40,
		)
	);

	/**
	 * Option: Enable title area on search
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-title-area-search]', array(
			'default'           => bstone_get_option( 'enable-title-area-search' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-title-area-search]', array(
			'type'        => 'checkbox',
			'section'     => 'section-title',
			'label'       => __( 'Search Page Title', 'bstone' ),
			'priority'    =>45,
		)
	);

	/**
	 * Option: Enable title area on 404
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-title-area-notfound]', array(
			'default'           => bstone_get_option( 'enable-title-area-notfound' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-title-area-notfound]', array(
			'type'        => 'checkbox',
			'section'     => 'section-title',
			'label'       => __( '404 Page Title', 'bstone' ),
			'priority'    =>50,
		)
	);