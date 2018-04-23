<?php
/**
 * Pagination Options for Bstone Theme.
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
	 * Option: Pagination Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-align]', array(
			'default'           => bstone_get_option( 'pagination-align' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[pagination-align]', array(
			'type'     => 'select',
			'section'  => 'section-pagination-settings',
			'priority' => 5,
			'label'    => __( 'Align', 'bstone' ),
			'choices'  => array(
				'right'  => __( 'Right', 'bstone' ),
				'left' => __( 'Left', 'bstone' ),
				'center' => __( 'Center', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Pagination Border Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-border-width]', array(
			'default'           => bstone_get_option( 'pagination-border-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[pagination-border-width]', array(
			'type'        => 'number',
			'section'     => 'section-pagination-settings',
			'priority'    => 10,
			'label'       => __( 'Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);

	/**
	 * Option: Pagination Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-border-radius]', array(
			'default'           => bstone_get_option( 'pagination-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[pagination-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-pagination-settings',
			'priority'    => 15,
			'label'       => __( 'Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 100,
			),
		)
	);

	/**
	 * Option: Pagination Spacing
	 */

	$pagi_padding = array(
		'pagi_top_padding:'.bstone_get_option( 'pagi_top_padding' ), 'pagi_right_padding:'.bstone_get_option( 'pagi_right_padding' ), 'pagi_bottom_padding:'.bstone_get_option( 'pagi_bottom_padding' ), 'pagi_left_padding:'.bstone_get_option( 'pagi_left_padding' ),
		'pagi_tablet_top_padding:', 'pagi_tablet_right_padding:', 'pagi_tablet_bottom_padding:', 'pagi_tablet_left_padding:', 
		'pagi_mobile_top_padding:', 'pagi_mobile_right_padding:', 'pagi_mobile_bottom_padding:', 'pagi_mobile_left_padding:'
	);	
	foreach($pagi_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[pagi-spacing]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 20,
				'label'    => __( 'Link Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[pagi_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[pagi_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[pagi_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[pagi_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[pagi_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[pagi_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[pagi_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[pagi_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[pagi_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[pagi_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[pagi_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[pagi_mobile_left_padding]',
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-pagination-colors]', array(
				'section'  => 'section-pagination-settings',
				'type'     => 'bst-divider',
				'priority' => 25,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Pagination Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bg-color-pagination]', array(
			'default'           => bstone_get_option( 'bg-color-pagination' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bg-color-pagination]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 30,
				'label'    => __( 'Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Pagination Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bg-color-hover-pagination]', array(
			'default'           => bstone_get_option( 'bg-color-hover-pagination' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bg-color-hover-pagination]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 35,
				'label'    => __( 'Background Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Pagination Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[border-color-pagination]', array(
			'default'           => bstone_get_option( 'border-color-pagination' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[border-color-pagination]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 40,
				'label'    => __( 'Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Pagination Border Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[border-color-hover-pagination]', array(
			'default'           => bstone_get_option( 'border-color-hover-pagination' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[border-color-hover-pagination]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 45,
				'label'    => __( 'Border Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Pagination Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[text-color-pagination]', array(
			'default'           => bstone_get_option( 'text-color-pagination' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[text-color-pagination]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 50,
				'label'    => __( 'Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Pagination Text Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[text-color-hover-pagination]', array(
			'default'           => bstone_get_option( 'text-color-hover-pagination' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[text-color-hover-pagination]', array(
				'section'  => 'section-pagination-settings',
				'priority' => 55,
				'label'    => __( 'Text Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-pagination-fonts]', array(
				'section'  => 'section-pagination-settings',
				'type'     => 'bst-divider',
				'priority' => 60,
				'settings' => array(),
			)
		)
	);

	/**
	 * Pagination Typography - Text: Font Family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-text-font-family]', array(
			'default'           => bstone_get_option( 'pagination-text-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[pagination-text-font-family]', array(
				'type'        => 'bst-font-family',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-pagination-settings',
				'priority'    => 65,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[pagination-text-font-weight]',
			)
		)
	);

	/**
	 * Pagination Typography - Text: Font Weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-text-font-weight]', array(
			'default'           => bstone_get_option( 'pagination-text-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[pagination-text-font-weight]', array(
				'type'        => 'bst-font-weight',
				'ast_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-pagination-settings',
				'priority'    => 70,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[header-typo-text-font-family]',
			)
		)
	);

	/**
	 * Pagination Typography - Text: Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-text-transform]', array(
			'default'           => bstone_get_option( 'pagination-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[pagination-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-pagination-settings',
			'priority' => 75,
			'label'    => __( 'Text Transform', 'bstone' ),
			'choices'  => array(
				''           => __( 'Default', 'bstone' ),
				'none'       => __( 'None', 'bstone' ),
				'capitalize' => __( 'Capitalize', 'bstone' ),
				'uppercase'  => __( 'Uppercase', 'bstone' ),
				'lowercase'  => __( 'Lowercase', 'bstone' ),
			),
		)
	);

	

	/**
	 * Pagination Typography - Text: Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-text-font-size]', array(
			'default'           => bstone_get_option( 'pagination-text-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[pagination-text-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-pagination-settings',
				'priority'    => 80,
				'label'       => __( 'Font Size', 'bstone' ),
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-pagination-text]', array(
				'section'  => 'section-pagination-settings',
				'type'     => 'bst-divider',
				'priority' => 85,
				'settings' => array(),
			)
		)
	);

	/**
	 * Pagination Text - Next
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-text-next]', array(
			'default'   => bstone_get_option( 'pagination-text-next' ),
			'type'      => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[pagination-text-next]', array(
			'section'     => 'section-pagination-settings',
			'priority'    => 90,
			'label'       => __( 'Pagination Text - Next', 'bstone' ),
			'type'        => 'text',
			'description' => esc_html__( 'Save and reload page to see updated text.', 'bstone' ),
		)
	);

	/**
	 * Pagination Text - Prev
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[pagination-text-prev]', array(
			'default'   => bstone_get_option( 'pagination-text-prev' ),
			'type'      => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[pagination-text-prev]', array(
			'section'     => 'section-pagination-settings',
			'priority'    => 95,
			'label'       => __( 'Pagination Text - Previous', 'bstone' ),
			'type'        => 'text',
			'description' => esc_html__( 'Save and reload page to see updated text.', 'bstone' ),
		)
	);