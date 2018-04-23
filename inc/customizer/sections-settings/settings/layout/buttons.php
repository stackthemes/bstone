<?php
/**
 * Buttons Layout
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-buttons-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-buttons',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone')
				),
				'tabs_sections' => array(
					'section-buttons',
					'section-buttons-typo-settings',
					'section-color-buttons'
				),
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);

	/**
	 * Option: Buttons Padding
	 */

	$btn_padding = array(
		'btn_top_padding:'.bstone_get_option( 'btn_top_padding' ), 'btn_right_padding:'.bstone_get_option( 'btn_right_padding' ), 'btn_bottom_padding:'.bstone_get_option( 'btn_bottom_padding' ), 'btn_left_padding:'.bstone_get_option( 'btn_left_padding' ),
		'btn_tablet_top_padding:', 'btn_tablet_right_padding:', 'btn_tablet_bottom_padding:', 'btn_tablet_left_padding:', 
		'btn_mobile_top_padding:', 'btn_mobile_right_padding:', 'btn_mobile_bottom_padding:', 'btn_mobile_left_padding:'
	);	
	foreach($btn_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[buttons-spacing]', array(
				'section'  => 'section-buttons',
				'priority' => 10,
				'label'    => __( 'Buttons Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[btn_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[btn_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[btn_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[btn_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[btn_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[btn_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[btn_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[btn_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[btn_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[btn_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[btn_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[btn_mobile_left_padding]',
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
	 * Option: Buttons Border Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[btn-border-width]', array(
			'default'           => bstone_get_option( 'btn-border-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[btn-border-width]', array(
				'type'        => 'number',
				'section'     => 'section-buttons',
				'priority'    => 15,
				'label'       => __( 'Buttons Border Width', 'bstone' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 50,
				),
			)
		)
	);

	/**
	 * Option: Buttons Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[btn-border-radius]', array(
			'default'           => bstone_get_option( 'btn-border-radius' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[btn-border-radius]', array(
				'type'        => 'number',
				'section'     => 'section-buttons',
				'priority'    => 20,
				'label'       => __( 'Buttons Border Radius', 'bstone' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 50,
				),
			)
		)
	);

	/**
	 * Read More Button
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[read-more-button-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-more-button-heading]', array(
				'label'    	=> esc_html__( 'Read More Button', 'bstone' ),
				'section'  	=> 'section-buttons',
				'priority' 	=> 25,
			)
		)
	);

	/**
	 * Option: Read More Buttons Padding
	 */

	$readbtn_padding = array(
		'readbtn_top_padding:'.bstone_get_option( 'readbtn_top_padding' ), 'readbtn_right_padding:'.bstone_get_option( 'readbtn_right_padding' ), 'readbtn_bottom_padding:'.bstone_get_option( 'readbtn_bottom_padding' ), 'readbtn_left_padding:'.bstone_get_option( 'readbtn_left_padding' ),
		'readbtn_tablet_top_padding:', 'readbtn_tablet_right_padding:', 'readbtn_tablet_bottom_padding:', 'readbtn_tablet_left_padding:', 
		'readbtn_mobile_top_padding:', 'readbtn_mobile_right_padding:', 'readbtn_mobile_bottom_padding:', 'readbtn_mobile_left_padding:'
	);	
	foreach($readbtn_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[read-buttons-spacing]', array(
				'section'  => 'section-buttons',
				'priority' => 30,
				'label'    => __( 'Buttons Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[readbtn_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[readbtn_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[readbtn_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[readbtn_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[readbtn_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[readbtn_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[readbtn_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[readbtn_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[readbtn_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[readbtn_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[readbtn_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[readbtn_mobile_left_padding]',
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
	 * Option: Read More Buttons Border Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[readbtn-border-width]', array(
			'default'           => bstone_get_option( 'readbtn-border-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[readbtn-border-width]', array(
				'type'        => 'number',
				'section'     => 'section-buttons',
				'priority'    => 35,
				'label'       => __( 'Buttons Border Width', 'bstone' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 50,
				),
			)
		)
	);

	/**
	 * Option: Read More Buttons Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[readbtn-border-radius]', array(
			'default'           => bstone_get_option( 'readbtn-border-radius' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[readbtn-border-radius]', array(
				'type'        => 'number',
				'section'     => 'section-buttons',
				'priority'    => 40,
				'label'       => __( 'Buttons Border Radius', 'bstone' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 0,
					'step' => 1,
					'max'  => 50,
				),
			)
		)
	);