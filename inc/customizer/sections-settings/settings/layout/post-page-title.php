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
			'label'       => __( 'Enable title on front page', 'bstone' ),
			'priority'    =>20,
		)
	);