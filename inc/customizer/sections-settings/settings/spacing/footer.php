<?php
/**
 * Footer Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-footer-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-footer',
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
					'section-footer-typo-settings',
					'section-color-footer',
					'section-spacing-footer'
				),
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);

	/**
	 * Option: Footer Padding
	 */

	$footer_padding = array(
		'footer_top_padding:'.bstone_get_option( 'footer_top_padding' ), 'footer_bottom_padding:'.bstone_get_option( 'footer_bottom_padding' ),
		'footer_tablet_top_padding:', 'footer_tablet_bottom_padding:',
		'footer_mobile_top_padding:', 'footer_mobile_bottom_padding:',
	);	
	foreach($footer_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-top-area-padding]', array(
				'section'  => 'section-spacing-footer',
				'priority' => 5,
				'label'    => __( 'Footer Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[footer_top_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[footer_bottom_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[footer_tablet_top_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[footer_tablet_bottom_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[footer_mobile_top_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[footer_mobile_bottom_padding]',
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
	 * Footer Spacing - Widgets: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[footer-spacing-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-spacing-title-heading]', array(
				'label'    	=> esc_html__( 'Widgets Spacing', 'bstone' ),
				'section'  	=> 'section-spacing-footer',
				'priority' 	=> 10,
				'collapse'	=> false,
			)
		)
	);

	/**
	 * Footer Spacing - Widgets: Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-widgets-margin-bottom]', array(
			'default'           => bstone_get_option( 'footer-widgets-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-widgets-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-footer',
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
	 * Footer Spacing - Widgets Title: Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[footer-widgets-title-margin-bottom]', array(
			'default'           => bstone_get_option( 'footer-widgets-title-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[footer-widgets-title-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-footer',
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

	$fwsp_padding = array(
		'fwsp_top_padding:'.bstone_get_option( 'fwsp_top_padding' ), 'fwsp_right_padding:'.bstone_get_option( 'fwsp_right_padding' ), 'fwsp_bottom_padding:'.bstone_get_option( 'fwsp_bottom_padding' ), 'fwsp_left_padding:'.bstone_get_option( 'fwsp_left_padding' ),
		'fwsp_tablet_top_padding:', 'fwsp_tablet_right_padding:', 'fwsp_tablet_bottom_padding:', 'fwsp_tablet_left_padding:', 
		'fwsp_mobile_top_padding:', 'fwsp_mobile_right_padding:', 'fwsp_mobile_bottom_padding:', 'fwsp_mobile_left_padding:'
	);	
	foreach($fwsp_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[footer-widget-spacing]', array(
				'section'  => 'section-spacing-footer',
				'priority' => 25,
				'label'    => __( 'Widgets Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[fwsp_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[fwsp_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[fwsp_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[fwsp_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[fwsp_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[fwsp_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[fwsp_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[fwsp_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[fwsp_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[fwsp_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[fwsp_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[fwsp_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);