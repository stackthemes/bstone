<?php
/**
 * Scroll To Top Options for Bstone Theme.
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
	 * Option: Enable Scroll To Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-enable-scroll-top]', array(
			'default'           => bstone_get_option( 'bstone-enable-scroll-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-enable-scroll-top]', array(
			'type'        => 'checkbox',
			'section'     => 'section-scroll-top-settings',
			'label'       => __( 'Enable Scroll To Top', 'bstone' ),
			'priority'    => 5,
		)
	);

	/**
	 * Option: Scroll to Top Icon Class
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sctop-icon-class]', array(
			'default'   => bstone_get_option( 'sctop-icon-class' ),
			'type'      => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[sctop-icon-class]', array(
			'section'     => 'section-scroll-top-settings',
			'priority'    => 10,
			'label'       => __( 'Icon Class', 'bstone' ),
			'type'        => 'text',
		)
	);

	/**
	 * Option: Scroll to Top Icon Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[sctop-icon-size]', array(
			'default'           => bstone_get_option( 'sctop-icon-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[sctop-icon-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-scroll-top-settings',
				'priority'    => 15,
				'label'       => __( 'Icon Size', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);

	/**
	 * Option: Scroll to Top Spacing
	 */

	$sctop_padding = array(
		'sctop_top_padding:'.bstone_get_option( 'sctop_top_padding' ), 'sctop_right_padding:'.bstone_get_option( 'sctop_right_padding' ), 'sctop_bottom_padding:'.bstone_get_option( 'sctop_bottom_padding' ), 'sctop_left_padding:'.bstone_get_option( 'sctop_left_padding' ),
		'sctop_tablet_top_padding:', 'sctop_tablet_right_padding:', 'sctop_tablet_bottom_padding:', 'sctop_tablet_left_padding:', 
		'sctop_mobile_top_padding:', 'sctop_mobile_right_padding:', 'sctop_mobile_bottom_padding:', 'sctop_mobile_left_padding:'
	);	
	foreach($sctop_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[sctop-spacing]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 20,
				'label'    => __( 'Scroll Top Button Padding', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sctop_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sctop_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sctop_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sctop_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sctop_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sctop_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sctop_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sctop_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sctop_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sctop_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sctop_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sctop_mobile_left_padding]',
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
	 * Option: Scroll To Top Border Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[scroll-border-width]', array(
			'default'           => bstone_get_option( 'scroll-border-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[scroll-border-width]', array(
			'type'        => 'number',
			'section'     => 'section-scroll-top-settings',
			'priority'    => 25,
			'label'       => __( 'Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);

	/**
	 * Option: Scroll To Top Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[scroll-border-radius]', array(
			'default'           => bstone_get_option( 'scroll-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[scroll-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-scroll-top-settings',
			'priority'    => 30,
			'label'       => __( 'Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 500,
			),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-scrolltop-colors]', array(
				'section'  => 'section-scroll-top-settings',
				'type'     => 'bst-divider',
				'priority' => 35,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Scroll To Top Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bg-color-scroll]', array(
			'default'           => bstone_get_option( 'bg-color-scroll' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bg-color-scroll]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 40,
				'label'    => __( 'Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Scroll To Top Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bg-color-hover-scroll]', array(
			'default'           => bstone_get_option( 'bg-color-hover-scroll' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bg-color-hover-scroll]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 45,
				'label'    => __( 'Background Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Scroll To Top Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[border-color-scroll]', array(
			'default'           => bstone_get_option( 'border-color-scroll' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[border-color-scroll]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 50,
				'label'    => __( 'Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Scroll To Top Border Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[border-color-hover-scroll]', array(
			'default'           => bstone_get_option( 'border-color-hover-scroll' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[border-color-hover-scroll]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 55,
				'label'    => __( 'Border Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Scroll To Top Icon Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[icon-color-sctop]', array(
			'default'           => bstone_get_option( 'icon-color-sctop' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[icon-color-sctop]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 60,
				'label'    => __( 'Icon Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Scroll To Top Icon Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[icon-color-hover-sctop]', array(
			'default'           => bstone_get_option( 'icon-color-hover-sctop' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[icon-color-hover-sctop]', array(
				'section'  => 'section-scroll-top-settings',
				'priority' => 65,
				'label'    => __( 'Icon Color Hover', 'bstone' ),
			)
		)
	);