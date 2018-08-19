<?php
/**
 * Blog Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-blog-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-blog',
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
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);

	/**
	 * Blog Post Title Padding Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-title-padding-top]', array(
			'default'           => bstone_get_option( 'blog-title-padding-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-title-padding-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog',
			'priority'    => 5,
			'label'       => __( 'Title Padding Top', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Blog Post Title Padding Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-title-padding-bottom]', array(
			'default'           => bstone_get_option( 'blog-title-padding-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-title-padding-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog',
			'priority'    => 10,
			'label'       => __( 'Title Padding Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-spacing-divider-1]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-spacing-blog',
				'priority' => 15,
				'settings' => array(),
			)
		)
	);

	/**
	 * Blog Post Meta Padding Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-padding-top]', array(
			'default'           => bstone_get_option( 'blog-meta-padding-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-meta-padding-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog',
			'priority'    => 20,
			'label'       => __( 'Meta Padding Top', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Blog Post Meta Padding Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-padding-bottom]', array(
			'default'           => bstone_get_option( 'blog-meta-padding-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-meta-padding-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog',
			'priority'    => 25,
			'label'       => __( 'Meta Padding Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-spacing-divider-2]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-spacing-blog',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Blog Post Content Padding Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-content-padding-top]', array(
			'default'           => bstone_get_option( 'blog-content-padding-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-content-padding-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog',
			'priority'    => 35,
			'label'       => __( 'Content Padding Top', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Blog Post Content Padding Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-content-padding-bottom]', array(
			'default'           => bstone_get_option( 'blog-content-padding-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-content-padding-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog',
			'priority'    => 40,
			'label'       => __( 'Content Padding Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-spacing-divider-3]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-spacing-blog',
				'priority' => 45,
				'settings' => array(),
			)
		)
	);

	/**
	 * Article Inner Container Padding
	 */

	$article_inner_padding = array(
		'bainner_top_padding:'.bstone_get_option( 'bainner_top_padding' ),'bainner_bottom_padding:'.bstone_get_option( 'bainner_bottom_padding' ),'bainner_left_padding:'.bstone_get_option( 'bainner_left_padding' ), 'bainner_right_padding:'.bstone_get_option( 'bainner_right_padding' ),
		'bainner_tablet_top_padding:', 'bainner_tablet_bottom_padding:','bainner_tablet_left_padding:', 'bainner_tablet_right_padding:',
		'bainner_mobile_top_padding:', 'bainner_mobile_bottom_padding:','bainner_mobile_left_padding:', 'bainner_mobile_right_padding:',
	);	
	foreach($article_inner_padding as $dimension) {
		$dval = explode(":",$dimension);
		$wp_customize->add_setting(
			BSTONE_THEME_SETTINGS . '['.$dval[0].']', array(
				'default'           => $dval[1],
				'type'              => 'option',
				'capability' 		=> 'manage_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
			)
		);
	}
	$wp_customize->add_control(
		new Bstone_Control_Dimensions(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-article-inner-padding]', array(
				'section'  => 'section-spacing-blog',
				'priority' => 50,
				'label'    => __( 'Post Container Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bainner_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bainner_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bainner_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bainner_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bainner_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bainner_tablet_right_padding]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[bainner_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bainner_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bainner_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bainner_mobile_right_padding]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[bainner_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bainner_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);

	/**
	 * Post Margin
	 */

	$article_outer_padding = array(
		'baouter_top_padding:'.bstone_get_option( 'baouter_top_padding' ),'baouter_bottom_padding:'.bstone_get_option( 'baouter_bottom_padding' ),'baouter_left_padding:'.bstone_get_option( 'baouter_left_padding' ), 'baouter_right_padding:'.bstone_get_option( 'baouter_right_padding' ),
		'baouter_tablet_top_padding:', 'baouter_tablet_bottom_padding:','baouter_tablet_left_padding:', 'baouter_tablet_right_padding:',
		'baouter_mobile_top_padding:', 'baouter_mobile_bottom_padding:','baouter_mobile_left_padding:', 'baouter_mobile_right_padding:',
	);	
	foreach($article_outer_padding as $dimension) {
		$dval = explode(":",$dimension);
		$wp_customize->add_setting(
			BSTONE_THEME_SETTINGS . '['.$dval[0].']', array(
				'default'           => $dval[1],
				'type'              => 'option',
				'capability' 		=> 'manage_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
			)
		);
	}
	$wp_customize->add_control(
		new Bstone_Control_Dimensions(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-article-outer-padding]', array(
				'section'  => 'section-spacing-blog',
				'priority' => 55,
				'label'    => __( 'Post Container Margin (px)', 'bstone' ),
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[baouter_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[baouter_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[baouter_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[baouter_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_right_padding]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_right_padding]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => -100,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);

	/**
	 * Text area Padding
	 */

	$article_text_padding = array(
		'batarea_left_padding:'.bstone_get_option( 'batarea_left_padding' ), 'batarea_right_padding:'.bstone_get_option( 'batarea_right_padding' ),
		'batarea_tablet_left_padding:', 'batarea_tablet_right_padding:',
		'batarea_mobile_left_padding:', 'batarea_mobile_right_padding:',
	);	
	foreach($article_text_padding as $dimension) {
		$dval = explode(":",$dimension);
		$wp_customize->add_setting(
			BSTONE_THEME_SETTINGS . '['.$dval[0].']', array(
				'default'           => $dval[1],
				'type'              => 'option',
				'capability' 		=> 'manage_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
			)
		);
	}
	$wp_customize->add_control(
		new Bstone_Control_Dimensions(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-article-text-padding]', array(
				'section'  => 'section-spacing-blog',
				'priority' => 55,
				'label'    => __( 'Article Text Area Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[batarea_right_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[batarea_left_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[batarea_tablet_right_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[batarea_tablet_left_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[batarea_mobile_right_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[batarea_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);