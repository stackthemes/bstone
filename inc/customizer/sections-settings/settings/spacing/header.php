<?php
/**
 * Header Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-header-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-header',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-header',
					'section-header-typo-settings',
					'section-color-header',
					'section-spacing-header'
				),
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);

	/**
	 * Option: Header Padding
	 */

	$header_padding = array(
		'header_top_padding:'.bstone_get_option( 'header_top_padding' ), 'header_right_padding:'.bstone_get_option( 'header_right_padding' ), 'header_bottom_padding:'.bstone_get_option( 'header_bottom_padding' ), 'header_left_padding:'.bstone_get_option( 'header_left_padding' ),
		'header_tablet_top_padding:', 'header_tablet_right_padding:', 'header_tablet_bottom_padding:', 'header_tablet_left_padding:', 
		'header_mobile_top_padding:', 'header_mobile_right_padding:', 'header_mobile_bottom_padding:', 'header_mobile_left_padding:'
	);	
	foreach($header_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-spacing]', array(
				'section'  => 'section-spacing-header',
				'priority' => 5,
				'label'    => __( 'Header Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[header_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[header_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[header_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[header_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[header_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[header_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[header_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[header_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[header_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[header_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[header_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[header_mobile_left_padding]',
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
	 * Option: Logo Margin
	 */

	$logo_margin = array(
		'logo_top_margin:'.bstone_get_option( 'logo_top_margin' ), 'logo_right_margin:'.bstone_get_option( 'logo_right_margin' ), 'logo_bottom_margin:'.bstone_get_option( 'logo_bottom_margin' ), 'logo_left_margin:'.bstone_get_option( 'logo_left_margin' ),
		'logo_tablet_top_margin:', 'logo_tablet_right_margin:', 'logo_tablet_bottom_margin:', 'logo_tablet_left_margin:', 
		'logo_mobile_top_margin:', 'logo_mobile_right_margin:', 'logo_mobile_bottom_margin:', 'logo_mobile_left_margin:'
	);	
	foreach($logo_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[logo-spacing]', array(
				'section'  => 'section-spacing-header',
				'priority' => 10,
				'label'    => __( 'Logo Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[logo_top_margin]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[logo_right_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[logo_bottom_margin]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[logo_left_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[logo_tablet_top_margin]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[logo_tablet_right_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[logo_tablet_bottom_margin]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[logo_tablet_left_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[logo_mobile_top_margin]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[logo_mobile_right_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[logo_mobile_bottom_margin]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[logo_mobile_left_margin]',
				),
			    'input_attrs' 			=> array(
			        'min'   => -500,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);

	/**
	 * Option: Site Title Margin
	 */

	$stitle_margin = array(
		'stitle_top_margin:'.bstone_get_option( 'stitle_top_margin' ), 'stitle_right_margin:'.bstone_get_option( 'stitle_right_margin' ), 'stitle_bottom_margin:'.bstone_get_option( 'stitle_bottom_margin' ), 'stitle_left_margin:'.bstone_get_option( 'stitle_left_margin' ),
		'stitle_tablet_top_margin:', 'stitle_tablet_right_margin:', 'stitle_tablet_bottom_margin:', 'stitle_tablet_left_margin:', 
		'stitle_mobile_top_margin:', 'stitle_mobile_right_margin:', 'stitle_mobile_bottom_margin:', 'stitle_mobile_left_margin:'
	);	
	foreach($stitle_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[stitle-spacing]', array(
				'section'  => 'section-spacing-header',
				'priority' => 15,
				'label'    => __( 'Site Title Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[stitle_top_margin]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[stitle_right_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[stitle_bottom_margin]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[stitle_left_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[stitle_tablet_top_margin]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[stitle_tablet_right_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[stitle_tablet_bottom_margin]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[stitle_tablet_left_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[stitle_mobile_top_margin]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[stitle_mobile_right_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[stitle_mobile_bottom_margin]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[stitle_mobile_left_margin]',
				),
			    'input_attrs' 			=> array(
			        'min'   => -500,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);

	/**
	 * Option: Tagline Margin
	 */

	$tagline_margin = array(
		'tagline_top_margin:'.bstone_get_option( 'tagline_top_margin' ), 'tagline_right_margin:'.bstone_get_option( 'tagline_right_margin' ), 'tagline_bottom_margin:'.bstone_get_option( 'tagline_bottom_margin' ), 'tagline_left_margin:'.bstone_get_option( 'tagline_left_margin' ),
		'tagline_tablet_top_margin:', 'tagline_tablet_right_margin:', 'tagline_tablet_bottom_margin:', 'tagline_tablet_left_margin:', 
		'tagline_mobile_top_margin:', 'tagline_mobile_right_margin:', 'tagline_mobile_bottom_margin:', 'tagline_mobile_left_margin:'
	);	
	foreach($tagline_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[tagline-spacing]', array(
				'section'  => 'section-spacing-header',
				'priority' => 20,
				'label'    => __( 'Tagline Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[tagline_top_margin]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[tagline_right_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[tagline_bottom_margin]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[tagline_left_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[tagline_tablet_top_margin]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[tagline_tablet_right_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[tagline_tablet_bottom_margin]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[tagline_tablet_left_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[tagline_mobile_top_margin]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[tagline_mobile_right_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[tagline_mobile_bottom_margin]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[tagline_mobile_left_margin]',
				),
			    'input_attrs' 			=> array(
			        'min'   => -500,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);

	/**
	 * Option: NavLink Padding
	 */

	$navlink_padding = array(
		'navlink_top_padding:'.bstone_get_option( 'navlink_top_padding' ), 'navlink_right_padding:'.bstone_get_option( 'navlink_right_padding' ), 'navlink_bottom_padding:'.bstone_get_option( 'navlink_bottom_padding' ), 'navlink_left_padding:'.bstone_get_option( 'navlink_left_padding' ),
		'navlink_tablet_top_padding:', 'navlink_tablet_right_padding:', 'navlink_tablet_bottom_padding:', 'navlink_tablet_left_padding:', 
		'navlink_mobile_top_padding:', 'navlink_mobile_right_padding:', 'navlink_mobile_bottom_padding:', 'navlink_mobile_left_padding:'
	);	
	foreach($navlink_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[navlink-spacing]', array(
				'section'  => 'section-spacing-header',
				'priority' => 25,
				'label'    => __( 'Primary Menu Links Padding (px)', 'bstone' ),				
				'settings' => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[navlink_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[navlink_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[navlink_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[navlink_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[navlink_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[navlink_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[navlink_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[navlink_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[navlink_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[navlink_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[navlink_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[navlink_mobile_left_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);
