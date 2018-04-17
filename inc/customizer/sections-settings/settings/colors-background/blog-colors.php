<?php
/**
 * Styling Options for Bstone Theme Blog - Colors
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-blog-colors-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-color-blog',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-blog',
					'section-archive-typo-settings',
					'section-color-blog',
					'section-spacing-blog'
				),
				'tabs_active'   => __('colors', 'bstone'),
			)
		)
	);

	/**
	 * Page Title Layout - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[page-title-colors-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-colors-heading]', array(
				'label'    	=> esc_html__( 'Page / Post Title Colors', 'bstone' ),
				'section'  	=> 'section-color-blog',
				'priority' 	=> 5,
			)
		)
	);

	/**
	 * Option: Post / Page Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-single-title-color]', array(
			'default'           => bstone_get_option( 'page-single-title-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-single-title-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 10,
				'label'    => __( 'Post / Page Title Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Breadcrumbs Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-single-breadcrumbs-color]', array(
			'default'           => bstone_get_option( 'page-single-breadcrumbs-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-single-breadcrumbs-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 15,
				'label'    => __( 'Breadcrumbs Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Title Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-single-title-bg-color]', array(
			'default'           => bstone_get_option( 'page-single-title-bg-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-single-title-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 20,
				'label'    => __( 'Post / Page Title Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Title Background Image
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-bg-image]', array(
		'sanitize_callback' 	=> array( 'Bstone_Customizer_Sanitizes', 'sanitize_image' ),
	) );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-bg-image]', array (
				'label'	   				=> esc_html__( 'Background Image', 'bstone' ),
				'section'  				=> 'section-color-blog',
				'priority' 				=> 25,
			)
		)
	);

	/**
	 * Option: Title BG Image - Position
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-position]', array(
			'default'           => bstone_get_option( 'title-img-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-position]', array(
			'type'     => 'select',
			'section'  => 'section-color-blog',
			'priority' => 30,
			'label'    => __( 'Position', 'bstone' ),
			'choices'  => array(
				'initial' 		 => __( 'Default', 'bstone' ),
				'top left'  	 => __( 'Top Left', 'bstone' ),
				'top center'  	 => __( 'Top Center', 'bstone' ),
				'top right'  	 => __( 'Top Right', 'bstone' ),
				'center left'  	 => __( 'Center Left', 'bstone' ),
				'center center'  => __( 'Center Center', 'bstone' ),
				'center right'   => __( 'Center Right', 'bstone' ),
				'bottom left'  	 => __( 'Bottom Left', 'bstone' ),
				'bottom center'  => __( 'Bottom Center', 'bstone' ),
				'bottom right'   => __( 'Bottom Right', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Title BG Image - Attachment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-attachment]', array(
			'default'           => bstone_get_option( 'title-img-attachment' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-attachment]', array(
			'type'     => 'select',
			'section'  => 'section-color-blog',
			'priority' => 35,
			'label'    => __( 'Attachment', 'bstone' ),
			'choices'  => array(
				'initial' => __( 'Default', 'bstone' ),
				'scroll'  => __( 'Scroll', 'bstone' ),
				'fixed'   => __( 'Fixed', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Title BG Image - Repeat
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-repeat]', array(
			'default'           => bstone_get_option( 'title-img-repeat' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-repeat]', array(
			'type'     => 'select',
			'section'  => 'section-color-blog',
			'priority' => 40,
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
	 * Option: Title BG Image - Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[title-img-size]', array(
			'default'           => bstone_get_option( 'title-img-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[title-img-size]', array(
			'type'     => 'select',
			'section'  => 'section-color-blog',
			'priority' => 45,
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
	 * Option: Post / Page Title Background Image Overlay Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-bg-overlay-color]', array(
			'default'           => bstone_get_option( 'page-title-bg-overlay-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-bg-overlay-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 50,
				'label'    => __( 'Title Background Image Overlay Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Post / Page Title Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-title-border-color]', array(
			'default'           => bstone_get_option( 'page-title-border-color' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-border-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 55,
				'label'    => __( 'Title Border Bottom Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Use Page Featured Image As Title Background
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[page-featured-title-bg]', array(
			'default'           => bstone_get_option( 'page-featured-title-bg' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[page-featured-title-bg]', array(
			'type'        => 'checkbox',
			'section'     => 'section-color-blog',
			'label'       => __( 'Use Page Featured Image As Title Background', 'bstone' ),
			'priority'    => 60,
		)
	);

	/**
	 * Option: Use Post Featured Image As Title Background
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-featured-title-bg]', array(
			'default'           => bstone_get_option( 'post-featured-title-bg' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-featured-title-bg]', array(
			'type'        => 'checkbox',
			'section'     => 'section-color-blog',
			'label'       => __( 'Use Post Featured Image As Title Background', 'bstone' ),
			'priority'    => 65,
		)
	);

	/**
	 * Page Title Layout - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-colors-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-colors-heading]', array(
				'label'    	=> esc_html__( 'Blog Colors', 'bstone' ),
				'section'  	=> 'section-color-blog',
				'priority' 	=> 70,
			)
		)
	);

	/**
	 * Option: Blog Entry Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-title-color]', array(
			'default'           => bstone_get_option( 'blog-title-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-title-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 75,
				'label'    => __( 'Blog Entry Title Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Entry Meta Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-color]', array(
			'default'           => bstone_get_option( 'blog-meta-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 80,
				'label'    => __( 'Post Meta Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Entry Meta Link Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-link-color]', array(
			'default'           => bstone_get_option( 'blog-meta-link-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-link-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 85,
				'label'    => __( 'Post Meta Link Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Entry Meta Link Hover Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-link-color-hover]', array(
			'default'           => bstone_get_option( 'blog-meta-link-color-hover' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-link-color-hover]', array(
				'section'  => 'section-color-blog',
				'priority' => 90,
				'label'    => __( 'Post Meta Link Hover Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-entry-bg-color]', array(
			'default'           => bstone_get_option( 'blog-entry-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-entry-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 95,
				'label'    => __( 'Blog Entry Background Color', 'bstone' ),
			)
		)
	);


	/**
	 * Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-blog',
				'priority' => 100,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-color]', array(
			'default'           => bstone_get_option( 'post-type-icon-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 105,
				'label'    => __( 'Post Type Icon Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon BG Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-bg-color]', array(
			'default'           => bstone_get_option( 'post-type-icon-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 110,
				'label'    => __( 'Post Type Icon Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-color]', array(
			'default'           => bstone_get_option( 'post-type-icon-border-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-type-icon-border-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 115,
				'label'    => __( 'Post Type Icon Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-size]', array(
			'default'           => bstone_get_option( 'post-type-icon-border-size' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-color-blog',
			'priority'    => 120,
			'label'       => __( 'Post Type Icon Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Option: Blog Entry Post Type Icon Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-radius]', array(
			'default'           => bstone_get_option( 'post-type-icon-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-type-icon-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-color-blog',
			'priority'    => 125,
			'label'       => __( 'Post Type Icon Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);


	/**
	 * Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[image-caption-colors-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-color-blog',
				'priority' => 130,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Image Caption Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[img-caption-color]', array(
			'default'           => bstone_get_option( 'img-caption-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[img-caption-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 135,
				'label'    => __( 'Image Caption Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Image Caption BG Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[img-caption-bg-color]', array(
			'default'           => bstone_get_option( 'img-caption-bg-color' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[img-caption-bg-color]', array(
				'section'  => 'section-color-blog',
				'priority' => 140,
				'label'    => __( 'Image Caption Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Image Caption Padding Top/Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[img-caption-padding]', array(
			'default'           => bstone_get_option( 'img-caption-padding' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[img-caption-padding]', array(
			'type'        => 'number',
			'section'     => 'section-color-blog',
			'priority'    => 145,
			'label'       => __( 'Image Caption Padding Top/Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);