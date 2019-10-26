<?php
/**
 * Forms Settings for Bstone Theme.
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
		BSTONE_THEME_SETTINGS . '[bstone-disably-form-styling]', array(
			'default'           => bstone_get_option( 'bstone-disably-form-styling' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-disably-form-styling]', array(
			'type'        => 'checkbox',
			'section'     => 'section-forms-settings',
			'label'       => __( 'Disable Form Styles Customization', 'bstone' ),
			'priority'    => 4,
		)
	);

	/**
	 * Heading: Form Layout
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-heading-layout]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-heading-layout]', array(
				'label'    	=> esc_html__( 'Layout', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 5,
				'status' 	=> 'open',
				'items'     => array(
					"customize-control-bstone-settings-bstone-input-height",
					"customize-control-bstone-settings-bstone-textarea-height",
					"customize-control-bstone-settings-bstone-fields-border-width",
					"customize-control-bstone-settings-bstone-fields-border-radius",
					"customize-control-bstone-settings-bfbuttons-border-width",
					"customize-control-bstone-settings-bfbuttons-border-radius"
				),
			)
		)
	);
	
	/**
	 * Option: Form input height
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-input-height]', array(
			'default'           => bstone_get_option( 'bstone-input-height' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-input-height]', array(
			'type'        => 'number',
			'section'     => 'section-forms-settings',
			'priority'    => 15,
			'label'       => __( 'Fields Height', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 500,
			),
		)
	);
	
	/**
	 * Option: Form textarea height
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-textarea-height]', array(
			'default'           => bstone_get_option( 'bstone-textarea-height' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-textarea-height]', array(
			'type'        => 'number',
			'section'     => 'section-forms-settings',
			'priority'    => 20,
			'label'       => __( 'Textarea Height', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 1000,
			),
		)
	);
	
	/**
	 * Option: Form fields border width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-fields-border-width]', array(
			'default'           => bstone_get_option( 'bstone-fields-border-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-fields-border-width]', array(
			'type'        => 'number',
			'section'     => 'section-forms-settings',
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
	 * Option: Form fields border radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bstone-fields-border-radius]', array(
			'default'           => bstone_get_option( 'bstone-fields-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bstone-fields-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-forms-settings',
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
	 * Option: Form buttons border width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-border-width]', array(
			'default'           => bstone_get_option( 'bfbuttons-border-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bfbuttons-border-width]', array(
			'type'        => 'number',
			'section'     => 'section-forms-settings',
			'priority'    => 35,
			'label'       => __( 'Button Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);
	
	/**
	 * Option: Form buttons border radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-border-radius]', array(
			'default'           => bstone_get_option( 'bfbuttons-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bfbuttons-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-forms-settings',
			'priority'    => 40,
			'label'       => __( 'Button Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 500,
			),
		)
	);

	/**
	 * Heading: Form Field's Spacing
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-heading-spacing]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-heading-spacing]', array(
				'label'    	=> esc_html__( 'Spacing', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 45,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-bffield-spacing",
					"customize-control-bstone-settings-bftextarea-spacing",
					"customize-control-bstone-settings-bffield-margin-spacing",
					"customize-control-bstone-settings-bfbuttons-spacing"
				),
			)
		)
	);

	/**
	 * Option: Form Fields Padding
	 */
	$bffield_padding = array(
		'bffield_top_padding:'.bstone_get_option( 'bffield_top_padding' ), 'bffield_right_padding:'.bstone_get_option( 'bffield_right_padding' ), 'bffield_bottom_padding:'.bstone_get_option( 'bffield_bottom_padding' ), 'bffield_left_padding:'.bstone_get_option( 'bffield_left_padding' ),
		'bffield_tablet_top_padding:', 'bffield_tablet_right_padding:', 'bffield_tablet_bottom_padding:', 'bffield_tablet_left_padding:', 
		'bffield_mobile_top_padding:', 'bffield_mobile_right_padding:', 'bffield_mobile_bottom_padding:', 'bffield_mobile_left_padding:'
	);	
	foreach($bffield_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-spacing]', array(
				'section'  => 'section-forms-settings',
				'priority' => 50,
				'label'    => __( 'Fields Padding', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bffield_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bffield_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bffield_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bffield_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bffield_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bffield_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bffield_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bffield_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bffield_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bffield_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bffield_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bffield_mobile_left_padding]',
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
	 * Option: Form Textarea Padding
	 */
	$bftextarea_padding = array(
		'bftextarea_top_padding:'.bstone_get_option( 'bftextarea_top_padding' ), 'bftextarea_right_padding:'.bstone_get_option( 'bftextarea_right_padding' ), 'bftextarea_bottom_padding:'.bstone_get_option( 'bftextarea_bottom_padding' ), 'bftextarea_left_padding:'.bstone_get_option( 'bftextarea_left_padding' ),
		'bftextarea_tablet_top_padding:', 'bftextarea_tablet_right_padding:', 'bftextarea_tablet_bottom_padding:', 'bftextarea_tablet_left_padding:', 
		'bftextarea_mobile_top_padding:', 'bftextarea_mobile_right_padding:', 'bftextarea_mobile_bottom_padding:', 'bftextarea_mobile_left_padding:'
	);	
	foreach($bftextarea_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[bftextarea-spacing]', array(
				'section'  => 'section-forms-settings',
				'priority' => 55,
				'label'    => __( 'Textarea Padding', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bftextarea_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bftextarea_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bftextarea_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bftextarea_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bftextarea_mobile_left_padding]',
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
	 * Option: Form Fields margin
	 */
	$bffield_margin = array(
		'bffield_top_margin:'.bstone_get_option( 'bffield_top_margin' ), 'bffield_right_margin:'.bstone_get_option( 'bffield_right_margin' ), 'bffield_bottom_margin:'.bstone_get_option( 'bffield_bottom_margin' ), 'bffield_left_margin:'.bstone_get_option( 'bffield_left_margin' ),
		'bffield_tablet_top_margin:', 'bffield_tablet_right_margin:', 'bffield_tablet_bottom_margin:', 'bffield_tablet_left_margin:', 
		'bffield_mobile_top_margin:', 'bffield_mobile_right_margin:', 'bffield_mobile_bottom_margin:', 'bffield_mobile_left_margin:'
	);	
	foreach($bffield_margin as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-margin-spacing]', array(
				'section'  => 'section-forms-settings',
				'priority' => 60,
				'label'    => __( 'Fields Margin', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bffield_top_margin]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bffield_right_margin]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bffield_bottom_margin]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bffield_left_margin]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bffield_tablet_top_margin]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bffield_tablet_right_margin]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bffield_tablet_bottom_margin]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bffield_tablet_left_margin]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bffield_mobile_top_margin]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bffield_mobile_right_margin]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bffield_mobile_bottom_margin]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bffield_mobile_left_margin]',
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
	 * Option: Form Buttons Padding
	 */
	$bfbuttons_padding = array(
		'bfbuttons_top_padding:'.bstone_get_option( 'bfbuttons_top_padding' ), 'bfbuttons_right_padding:'.bstone_get_option( 'bfbuttons_right_padding' ), 'bfbuttons_bottom_padding:'.bstone_get_option( 'bfbuttons_bottom_padding' ), 'bfbuttons_left_padding:'.bstone_get_option( 'bfbuttons_left_padding' ),
		'bfbuttons_tablet_top_padding:', 'bfbuttons_tablet_right_padding:', 'bfbuttons_tablet_bottom_padding:', 'bfbuttons_tablet_left_padding:', 
		'bfbuttons_mobile_top_padding:', 'bfbuttons_mobile_right_padding:', 'bfbuttons_mobile_bottom_padding:', 'bfbuttons_mobile_left_padding:'
	);	
	foreach($bfbuttons_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-spacing]', array(
				'section'  => 'section-forms-settings',
				'priority' => 65,
				'label'    => __( 'Buttons Padding', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_top_padding]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bfbuttons_right_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bfbuttons_bottom_padding]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_left_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_tablet_top_padding]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_tablet_right_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bfbuttons_tablet_bottom_padding]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_tablet_left_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_mobile_top_padding]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_mobile_right_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bfbuttons_mobile_bottom_padding]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bfbuttons_mobile_left_padding]',
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
	 * Heading: Form Field's Typography
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-heading-typography]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-heading-typography]', array(
				'label'    	=> esc_html__( 'Fields Typography', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 70,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-bffield-font-family",
					"customize-control-bstone-settings-bffield-font-weight",
					"customize-control-bstone-settings-bffield-text-transform",
					"customize-control-bstone-settings-bffield-font-size"
				),
			)
		)
	);

	/**
	 * Option: Form Fields font family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-font-family]', array(
			'default'           => bstone_get_option( 'bffield-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-font-family]', array(
				'type'        => 'bst-font-family',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-forms-settings',
				'priority'    => 75,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[bffield-font-weight]',
			)
		)
	);

	/**
	 * Option: Form Fields font weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-font-weight]', array(
			'default'           => bstone_get_option( 'bffield-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-font-weight]', array(
				'type'        => 'bst-font-weight',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-forms-settings',
				'priority'    => 80,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[bffield-font-family]',
			)
		)
	);

	/**
	 * Option: Form Fields Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-text-transform]', array(
			'default'           => bstone_get_option( 'bffield-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bffield-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-forms-settings',
			'priority' => 85,
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
	 * Option: Form Fields Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-font-size]', array(
			'default'           => bstone_get_option( 'bffield-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-forms-settings',
				'priority'    => 90,
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
	 * Heading: Form Buttons Typography
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-heading-buttons-typography]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-heading-buttons-typography]', array(
				'label'    	=> esc_html__( 'Buttons Typography', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 95,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-bfbuttons-font-family",
					"customize-control-bstone-settings-bfbuttons-font-weight",
					"customize-control-bstone-settings-bfbuttons-text-transform",
					"customize-control-bstone-settings-bfbuttons-font-size"
				),
			)
		)
	);

	/**
	 * Option: Form Buttons font family
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-font-family]', array(
			'default'           => bstone_get_option( 'bfbuttons-font-family' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-font-family]', array(
				'type'        => 'bst-font-family',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-forms-settings',
				'priority'    => 100,
				'label'       => __( 'Font Family', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[bfbuttons-font-weight]',
			)
		)
	);

	/**
	 * Option: Form Buttons font weight
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-font-weight]', array(
			'default'           => bstone_get_option( 'bfbuttons-font-weight' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Typography(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-font-weight]', array(
				'type'        => 'bst-font-weight',
				'bst_inherit' => __( 'Default', 'bstone' ),
				'section'     => 'section-forms-settings',
				'priority'    => 105,
				'label'       => __( 'Font Weight', 'bstone' ),
				'connect'     => BSTONE_THEME_SETTINGS . '[bfbuttons-font-family]',
			)
		)
	);

	/**
	 * Option: Form Buttons Text Transform
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-text-transform]', array(
			'default'           => bstone_get_option( 'bfbuttons-text-transform' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bfbuttons-text-transform]', array(
			'type'     => 'select',
			'section'  => 'section-forms-settings',
			'priority' => 110,
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
	 * Option: Form Buttons Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-font-size]', array(
			'default'           => bstone_get_option( 'bfbuttons-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-forms-settings',
				'priority'    => 115,
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
	 * Heading: Form Field's Colors
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-heading-colors]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-heading-colors]', array(
				'label'    	=> esc_html__( 'Field Colors', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 120,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-bffield-bg-color",
					"customize-control-bstone-settings-bffield-text-color",
					"customize-control-bstone-settings-bffield-placeholder-color",
					"customize-control-bstone-settings-bffield-border-color"
				),
			)
		)
	);

	/**
	 * Option: Form Fields Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-bg-color]', array(
			'default'           => bstone_get_option( 'bffield-bg-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-bg-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 125,
				'label'    => __( 'Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Fields Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-text-color]', array(
			'default'           => bstone_get_option( 'bffield-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-text-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 130,
				'label'    => __( 'Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Fields Placeholder Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-placeholder-color]', array(
			'default'           => bstone_get_option( 'bffield-placeholder-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-placeholder-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 135,
				'label'    => __( 'Placeholder Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Fields Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bffield-border-color]', array(
			'default'           => bstone_get_option( 'bffield-border-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bffield-border-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 140,
				'label'    => __( 'Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Heading: Form Buttons Colors
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[forms-heading-buttons-colors]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[forms-heading-buttons-colors]', array(
				'label'    	=> esc_html__( 'Button Colors', 'bstone' ),
				'section'  	=> 'section-forms-settings',
				'priority' 	=> 145,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-bfbuttons-text-color",
					"customize-control-bstone-settings-bfbuttons-text-color-hover",
					"customize-control-bstone-settings-bfbuttons-bg-color",
					"customize-control-bstone-settings-bfbuttons-bg-color-hover",
					"customize-control-bstone-settings-bfbuttons-border-color",
					"customize-control-bstone-settings-bfbuttons-border-color-hover"
				),
			)
		)
	);

	/**
	 * Option: Form Buttons Text Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-text-color]', array(
			'default'           => bstone_get_option( 'bfbuttons-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-text-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 150,
				'label'    => __( 'Text Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Buttons Text Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-text-color-hover]', array(
			'default'           => bstone_get_option( 'bfbuttons-text-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-text-color-hover]', array(
				'section'  => 'section-forms-settings',
				'priority' => 155,
				'label'    => __( 'Text Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Buttons Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-bg-color]', array(
			'default'           => bstone_get_option( 'bfbuttons-bg-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-bg-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 160,
				'label'    => __( 'Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Buttons Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-bg-color-hover]', array(
			'default'           => bstone_get_option( 'bfbuttons-bg-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-bg-color-hover]', array(
				'section'  => 'section-forms-settings',
				'priority' => 165,
				'label'    => __( 'Background Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Buttons Border Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-border-color]', array(
			'default'           => bstone_get_option( 'bfbuttons-border-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-border-color]', array(
				'section'  => 'section-forms-settings',
				'priority' => 175,
				'label'    => __( 'Border Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Form Buttons Border Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bfbuttons-border-color-hover]', array(
			'default'           => bstone_get_option( 'bfbuttons-border-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bfbuttons-border-color-hover]', array(
				'section'  => 'section-forms-settings',
				'priority' => 180,
				'label'    => __( 'Border Color Hover', 'bstone' ),
			)
		)
	);