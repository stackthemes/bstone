<?php
/**
 * Sidebar Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-sidebar-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-sidebar',
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
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);

	/**
	 * Option: Sidebar Left/Right Padding
	 */

	$sidebar_padding = array(
		'sidebar_top_padding:'.bstone_get_option( 'sidebar_top_padding' ), 'sidebar_bottom_padding:'.bstone_get_option( 'sidebar_bottom_padding' ), 'sidebar_left_padding:'.bstone_get_option( 'sidebar_left_padding' ), 'sidebar_right_padding:'.bstone_get_option( 'sidebar_right_padding' ),
		'sidebar_tablet_top_padding:', 'sidebar_tablet_bottom_padding:', 'sidebar_tablet_left_padding:', 'sidebar_tablet_right_padding:',
		'sidebar_mobile_top_padding:', 'sidebar_mobile_bottom_padding:', 'sidebar_mobile_left_padding:', 'sidebar_mobile_right_padding:',
	);	
	foreach($sidebar_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-padding]', array(
				'section'  => 'section-spacing-sidebar',
				'priority' => 5,
				'label'    => __( 'Sidebar Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sidebar_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sidebar_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebar_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sidebar_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_left_padding]',
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
	 * Option: Sidebar Right Padding - In case of both sidebars
	 */

	$sidebar_padding_both = array(
		'sidebarbth_top_padding:0', 'sidebarbth_bottom_padding:0', 'sidebarbth_left_padding:0', 'sidebarbth_right_padding:0',
		'sidebarbth_tablet_top_padding:', 'sidebarbth_tablet_bottom_padding:', 'sidebarbth_tablet_left_padding:', 'sidebarbth_tablet_right_padding:',
		'sidebarbth_mobile_top_padding:', 'sidebarbth_mobile_bottom_padding:', 'sidebarbth_mobile_left_padding:', 'sidebarbth_mobile_right_padding:',
	);
	foreach($sidebar_padding_both as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-both-padding]', array(
				'section'  => 'section-spacing-sidebar',
				'priority' => 5,
				'label'    => __( 'Sidebar 2 Padding (px)', 'bstone' ),
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sidebarbth_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebarbth_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebarbth_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebarbth_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sidebarbth_mobile_left_padding]',
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
	 * Sidebar Spacing - Widgets: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[sidebar-spacing-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-spacing-title-heading]', array(
				'label'    	=> esc_html__( 'Widgets Spacing', 'bstone' ),
				'section'  	=> 'section-spacing-sidebar',
				'priority' 	=> 10,
			)
		)
	);

	/**
	 * Sidebar Spacing - Widgets: Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-widgets-margin-bottom]', array(
			'default'           => bstone_get_option( 'sidebar-widgets-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[sidebar-widgets-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-sidebar',
			'priority'    => 15,
			'label'       => __( 'Widgets Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'step' => 1,
				'min'  => -500,
				'max'  => 500,
			),
		)
	);

	/**
	 * Sidebar Spacing - Widgets Title: Margin Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-widgets-title-margin-top]', array(
			'default'           => bstone_get_option( 'sidebar-widgets-title-margin-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[sidebar-widgets-title-margin-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-sidebar',
			'priority'    => 20,
			'label'       => __( 'Widget Title Margin Top', 'bstone' ),
			'input_attrs' => array(
				'step' => 1,
				'min'  => -500,
				'max'  => 500,
			),
		)
	);

	/**
	 * Sidebar Spacing - Widgets Title: Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sidebar-widgets-title-margin-bottom]', array(
			'default'           => bstone_get_option( 'sidebar-widgets-title-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[sidebar-widgets-title-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-sidebar',
			'priority'    => 20,
			'label'       => __( 'Widget Title Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'step' => 1,
				'min'  => -500,
				'max'  => 500,
			),
		)
	);

	/**
	 * Option: Widgets Padding
	 */

	$wpadding_padding = array(
		'wpadding_top_padding:'.bstone_get_option( 'wpadding_top_padding' ), 'wpadding_right_padding:'.bstone_get_option( 'wpadding_right_padding' ), 'wpadding_bottom_padding:'.bstone_get_option( 'wpadding_bottom_padding' ), 'wpadding_left_padding:'.bstone_get_option( 'wpadding_left_padding' ),
		'wpadding_tablet_top_padding:', 'wpadding_tablet_right_padding:', 'wpadding_tablet_bottom_padding:', 'wpadding_tablet_left_padding:', 
		'wpadding_mobile_top_padding:', 'wpadding_mobile_right_padding:', 'wpadding_mobile_bottom_padding:', 'wpadding_mobile_left_padding:'
	);	
	foreach($wpadding_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[wpadding-spacing]', array(
				'section'  => 'section-spacing-sidebar',
				'priority' => 25,
				'label'    => __( 'Widgets Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[wpadding_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[wpadding_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[wpadding_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[wpadding_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[wpadding_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[wpadding_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[wpadding_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[wpadding_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[wpadding_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[wpadding_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[wpadding_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[wpadding_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);