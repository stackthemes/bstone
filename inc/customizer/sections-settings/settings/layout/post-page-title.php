<?php
/**
 * Page / Post Title Layout Option for Bstone Theme.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Page Title Layout - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[page-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-heading]', array(
				'label'    	=> esc_html__( 'Page Title Section', 'bstone' ),
				'section'  	=> 'section-title',
				'priority' 	=> 5,
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
				'priority' => 10,
				'label'    => __( 'Page Title Structure', 'bstone' ),
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
			'priority' => 15,
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
			'priority'    => 20,
			'label'       => __( 'Border Bottom Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);

	/**
	 * Post Title Layout - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[post-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-title-heading]', array(
				'label'    	=> esc_html__( 'Post Title Section', 'bstone' ),
				'section'  	=> 'section-title',
				'priority' 	=> 25,
			)
		)
	);

	/**
	 * Option: Display Post Title Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-title-structure]', array(
			'default'           => bstone_get_option( 'post-title-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-title-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-title',
				'priority' => 30,
				'label'    => __( 'Post Title Structure', 'bstone' ),
				'choices'  => array(
					'post-title' 		=> __( 'Title', 'bstone' ),
					'post-breadcrumbs'  => __( 'Breadcrumbs', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Title & Breadcrumbs Alignment - Post
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-title-alignment]', array(
			'default'           => bstone_get_option( 'post-title-alignment' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-title-alignment]', array(
			'type'     => 'select',
			'section'  => 'section-title',
			'priority' => 35,
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
		BSTONE_THEME_SETTINGS . '[post-title-border-width]', array(
			'default'           => bstone_get_option( 'post-title-border-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-title-border-width]', array(
			'type'        => 'number',
			'section'     => 'section-title',
			'priority'    => 45,
			'label'       => __( 'Border Bottom Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);