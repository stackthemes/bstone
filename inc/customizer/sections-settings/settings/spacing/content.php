<?php
/**
 * Content Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-content-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-content',
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
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);

	/**
	 * Content Spacing - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[spacing-content-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[spacing-content-heading]', array(
				'label'    	=> esc_html__( 'Content Spacing', 'bstone' ),
				'section'  	=> 'section-spacing-content',
				'priority' 	=> 5,
			)
		)
	);

	/**
	 * Option: Main Container Padding
	 */

	$pcnt_padding = array(
		'pcnt_top_padding:'.bstone_get_option( 'pcnt_top_padding' ), 'pcnt_bottom_padding:'.bstone_get_option( 'pcnt_bottom_padding' ), 'pcnt_left_padding:'.bstone_get_option( 'pcnt_left_padding' ), 'pcnt_right_padding:'.bstone_get_option( 'pcnt_right_padding' ),
		'pcnt_tablet_top_padding:', 'pcnt_tablet_bottom_padding:', 'pcnt_tablet_left_padding:', 'pcnt_tablet_right_padding:',
		'pcnt_mobile_top_padding:', 'pcnt_mobile_bottom_padding:','pcnt_mobile_left_padding:', 'pcnt_mobile_right_padding:',
	);	
	foreach($pcnt_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[primary-container-padding]', array(
				'section'  => 'section-spacing-content',
				'priority' => 10,
				'label'    => __( 'Main Container Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[pcnt_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[pcnt_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcnt_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[pcnt_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[pcnt_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[pcnt_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcnt_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[pcnt_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[pcnt_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[pcnt_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcnt_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[pcnt_mobile_left_padding]',
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
	 * Option: Main Container Margin
	 */

	$pcnt_margin = array(
		'pcnt_top_margin:'.bstone_get_option( 'pcnt_top_margin' ), 'pcnt_bottom_margin:'.bstone_get_option( 'pcnt_bottom_margin' ),
		'pcnt_tablet_top_margin:', 'pcnt_tablet_bottom_margin:',
		'pcnt_mobile_top_margin:', 'pcnt_mobile_bottom_margin:',
	);	
	foreach($pcnt_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[primary-container-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 15,
				'label'    => __( 'Main Container Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[pcnt_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcnt_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[pcnt_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcnt_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[pcnt_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcnt_mobile_bottom_margin]',
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
	 * Option: Primary Content Area Padding
	 */

	$carea_padding = array(
		'carea_top_padding:'.bstone_get_option( 'carea_top_padding' ),'carea_bottom_padding:'.bstone_get_option( 'carea_bottom_padding' ),'carea_left_padding:'.bstone_get_option( 'carea_left_padding' ), 'carea_right_padding:'.bstone_get_option( 'carea_right_padding' ),
		'carea_tablet_top_padding:', 'carea_tablet_bottom_padding:','carea_tablet_left_padding:', 'carea_tablet_right_padding:'.bstone_get_option( 'carea_tablet_right_padding' ),
		'carea_mobile_top_padding:', 'carea_mobile_bottom_padding:','carea_mobile_left_padding:', 'carea_mobile_right_padding:'.bstone_get_option( 'carea_mobile_right_padding' ),
	);	
	foreach($carea_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[content-area-padding]', array(
				'section'  => 'section-spacing-content',
				'priority' => 20,
				'label'    => __( 'Primary Content Area Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[carea_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[carea_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[carea_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[carea_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[carea_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[carea_tablet_right_padding]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[carea_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[carea_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[carea_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[carea_mobile_right_padding]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[carea_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[carea_mobile_left_padding]',
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
	 * Option: Primary Content Area Margin
	 */

	$pcontentarea_margin = array(
		'pcontentarea_top_margin:'.bstone_get_option( 'pcontentarea_top_margin' ), 'pcontentarea_bottom_margin:'.bstone_get_option( 'pcontentarea_bottom_margin' ),
		'pcontentarea_tablet_top_margin:', 'pcontentarea_tablet_bottom_margin:',
		'pcontentarea_mobile_top_margin:', 'pcontentarea_mobile_bottom_margin:',
	);	
	foreach($pcontentarea_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[pcontentarea-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 25,
				'label'    => __( 'Primary Content Area Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[pcontentarea_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcontentarea_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[pcontentarea_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcontentarea_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[pcontentarea_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[pcontentarea_mobile_bottom_margin]',
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
	 * Headings Spacing - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[spacing-headings-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[spacing-headings-heading]', array(
				'label'    	=> esc_html__( 'Headings Spacing', 'bstone' ),
				'section'  	=> 'section-spacing-content',
				'priority' 	=> 30,
			)
		)
	);

	/**
	 * Option: Spacing - H1
	 */

	$h1_margin = array(
		'h1_top_margin:'.bstone_get_option( 'h1_top_margin' ), 'h1_bottom_margin:'.bstone_get_option( 'h1_bottom_margin' ),
		'h1_tablet_top_margin:', 'h1_tablet_bottom_margin:',
		'h1_mobile_top_margin:', 'h1_mobile_bottom_margin:',
	);	
	foreach($h1_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[h1-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 35,
				'label'    => __( 'H1 Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[h1_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[h1_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[h1_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[h1_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[h1_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[h1_mobile_bottom_margin]',
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
	 * Option: Spacing - H2
	 */

	$h2_margin = array(
		'h2_top_margin:'.bstone_get_option( 'h2_top_margin' ), 'h2_bottom_margin:'.bstone_get_option( 'h2_bottom_margin' ),
		'h2_tablet_top_margin:', 'h2_tablet_bottom_margin:',
		'h2_mobile_top_margin:', 'h2_mobile_bottom_margin:',
	);	
	foreach($h2_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[h2-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 40,
				'label'    => __( 'H2 Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[h2_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[h2_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[h2_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[h2_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[h2_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[h2_mobile_bottom_margin]',
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
	 * Option: Spacing - H3
	 */

	$h3_margin = array(
		'h3_top_margin:'.bstone_get_option( 'h3_top_margin' ), 'h3_bottom_margin:'.bstone_get_option( 'h3_bottom_margin' ),
		'h3_tablet_top_margin:', 'h3_tablet_bottom_margin:',
		'h3_mobile_top_margin:', 'h3_mobile_bottom_margin:',
	);	
	foreach($h3_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[h3-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 45,
				'label'    => __( 'H3 Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[h3_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[h3_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[h3_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[h3_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[h3_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[h3_mobile_bottom_margin]',
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
	 * Option: Spacing - H4
	 */

	$h4_margin = array(
		'h4_top_margin:'.bstone_get_option( 'h4_top_margin' ), 'h4_bottom_margin:'.bstone_get_option( 'h4_bottom_margin' ),
		'h4_tablet_top_margin:', 'h4_tablet_bottom_margin:',
		'h4_mobile_top_margin:', 'h4_mobile_bottom_margin:',
	);	
	foreach($h4_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[h4-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 50,
				'label'    => __( 'H4 Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[h4_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[h4_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[h4_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[h4_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[h4_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[h4_mobile_bottom_margin]',
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
	 * Option: Spacing - H5
	 */

	$h5_margin = array(
		'h5_top_margin:'.bstone_get_option( 'h5_top_margin' ), 'h5_bottom_margin:'.bstone_get_option( 'h5_bottom_margin' ),
		'h5_tablet_top_margin:', 'h5_tablet_bottom_margin:',
		'h5_mobile_top_margin:', 'h5_mobile_bottom_margin:',
	);	
	foreach($h5_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[h5-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 55,
				'label'    => __( 'H5 Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[h5_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[h5_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[h5_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[h5_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[h5_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[h5_mobile_bottom_margin]',
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
	 * Option: Spacing - H6
	 */

	$h6_margin = array(
		'h6_top_margin:'.bstone_get_option( 'h6_top_margin' ), 'h6_bottom_margin:'.bstone_get_option( 'h6_bottom_margin' ),
		'h6_tablet_top_margin:', 'h6_tablet_bottom_margin:',
		'h6_mobile_top_margin:', 'h6_mobile_bottom_margin:',
	);	
	foreach($h6_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[h6-margin]', array(
				'section'  => 'section-spacing-content',
				'priority' => 60,
				'label'    => __( 'H6 Margin (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[h6_top_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[h6_bottom_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[h6_tablet_top_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[h6_tablet_bottom_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[h6_mobile_top_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[h6_mobile_bottom_margin]',
				),
			    'input_attrs' 			=> array(
			        'min'   => -500,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);