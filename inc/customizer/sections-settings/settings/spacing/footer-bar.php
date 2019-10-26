<?php
/**
 * Footer Bar Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-footer-bar-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-footer-bar',
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
					'section-footer-bar-typo-settings',
					'section-color-footer-bar',
					'section-spacing-footer-bar'
				),
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);

	/**
	 * Option: Footer Bar Padding
	 */

	$footer_bar_padding = array(
		'footer_bar_top_padding:'.bstone_get_option( 'footer_bar_top_padding' ), 'footer_bar_bottom_padding:'.bstone_get_option( 'footer_bar_bottom_padding' ),
		'footer_bar_tablet_top_padding:', 'footer_bar_tablet_bottom_padding:',
		'footer_bar_mobile_top_padding:', 'footer_bar_mobile_bottom_padding:',
	);	
	foreach($footer_bar_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bar-top-area-padding]', array(
				'section'  => 'section-spacing-footer-bar',
				'priority' => 5,
				'label'    => __( 'Footer Bar Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[footer_bar_top_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[footer_bar_bottom_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[footer_bar_tablet_top_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[footer_bar_tablet_bottom_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[footer_bar_mobile_top_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[footer_bar_mobile_bottom_padding]',
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
	 * Footer Bar Spacing - Widgets: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[footer-bar-spacing-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bar-spacing-title-heading]', array(
				'label'    	=> esc_html__( 'Widgets Spacing', 'bstone' ),
				'section'  	=> 'section-spacing-footer-bar',
				'priority' 	=> 10,
				'collapse'	=> false,
			)
		)
	);

	/**
	 * Footer Bar Spacing - Widgets: Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-widgets-margin-bottom]', array(
			'default'           => bstone_get_option( 'footer-bar-widgets-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-bar-widgets-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-footer-bar',
			'priority'    => 15,
			'label'       => __( 'Widgets Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 500,
			),
		)
	);

	/**
	 * Footer Bar Spacing - Widgets Title: Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-bar-widgets-title-margin-bottom]', array(
			'default'           => bstone_get_option( 'footer-bar-widgets-title-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-bar-widgets-title-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-footer-bar',
			'priority'    => 20,
			'label'       => __( 'Widget Title Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 500,
			),
		)
	);

	/**
	 * Option: Widgets Padding
	 */

	$fbar_sp_padding = array(
		'fbar_sp_top_padding:'.bstone_get_option( 'fbar_sp_top_padding' ), 'fbar_sp_right_padding:'.bstone_get_option( 'fbar_sp_right_padding' ), 'fbar_sp_bottom_padding:'.bstone_get_option( 'fbar_sp_bottom_padding' ), 'fbar_sp_left_padding:'.bstone_get_option( 'fbar_sp_left_padding' ),
		'fbar_sp_tablet_top_padding:', 'fbar_sp_tablet_right_padding:', 'fbar_sp_tablet_bottom_padding:', 'fbar_sp_tablet_left_padding:', 
		'fbar_sp_mobile_top_padding:', 'fbar_sp_mobile_right_padding:', 'fbar_sp_mobile_bottom_padding:', 'fbar_sp_mobile_left_padding:'
	);	
	foreach($fbar_sp_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-bar-widget-spacing]', array(
				'section'  => 'section-spacing-footer-bar',
				'priority' => 25,
				'label'    => __( 'Widgets Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[fbar_sp_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[fbar_sp_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[fbar_sp_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[fbar_sp_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[fbar_sp_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);