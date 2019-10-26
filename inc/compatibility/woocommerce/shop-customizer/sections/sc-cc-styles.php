<?php
/**
 * Register customizer settings for WooCommerce.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.1.6
 */

/*************************************************
 * Section: Checkout & Cart Section Heading Styles
 *************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_section_heading',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Section Heading', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_shead',
			'priority' => 5,
		)
	)
);

/**
 * Option: Cart & Checkout Section Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_text_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_shead_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_text_color]', array(
			'section'  => 'sc_s_cc_s_section_heading',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Section Title Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_family]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_shead_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_section_heading',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_weight]',
		)
	)
);

/**
 * Option: Cart & Checkout Section Title Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_weight]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_shead_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_section_heading',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_family]',
		)
	)
);

/**
 * Option: Cart & Checkout Section Title Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_text_transform]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_shead_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_section_heading',
		'priority' => 20,
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
 * Option: Cart & Checkout Section Title Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_text_style]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_shead_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_section_heading',
		'priority' => 25,
		'label'    => __( 'Font Style', 'bstone' ),
		'choices'  => array(
			''        => __( 'Default', 'bstone' ),
			'normal'  => __( 'Normal', 'bstone' ),
			'italic'  => __( 'Italic', 'bstone' ),
			'oblique' => __( 'Oblique', 'bstone' ),
		),
	)
);

/**
 * Option: Cart & Checkout Section Title Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_size]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_shead_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_cc_s_section_heading',
			'priority'    => 30,
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
 * Option: Cart & Checkout Section Title Padding
 */
$sh_cc_sty_shead_padding = array(
	'sh_cc_sty_shead_top_padding:'.bstone_get_option( 'sh_cc_sty_shead_top_padding' ), 'sh_cc_sty_shead_bottom_padding:'.bstone_get_option( 'sh_cc_sty_shead_bottom_padding' ), 'sh_cc_sty_shead_left_padding:'.bstone_get_option( 'sh_cc_sty_shead_left_padding' ), 'sh_cc_sty_shead_right_padding:'.bstone_get_option( 'sh_cc_sty_shead_right_padding' ),
	'sh_cc_sty_shead_tablet_top_padding:', 'sh_cc_sty_shead_tablet_bottom_padding:', 'sh_cc_sty_shead_tablet_left_padding:', 'sh_cc_sty_shead_tablet_right_padding:',
	'sh_cc_sty_shead_mobile_top_padding:', 'sh_cc_sty_shead_mobile_bottom_padding:', 'sh_cc_sty_shead_mobile_left_padding:', 'sh_cc_sty_shead_mobile_right_padding:',
);	
foreach($sh_cc_sty_shead_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_shead_padding]', array(
			'section'  => 'sc_s_cc_s_section_heading',
			'priority' => 35,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_shead_mobile_left_padding]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/*************************************************
 * Section: Checkout & Cart Order Summary Styles
 *************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_order_summary',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Order Summary', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_osmry',
			'priority' => 10,
		)
	)
);

/**
 * Option: Cart & Checkout - Order Summry - Remove Button Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_remove_btn_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_remove_btn_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_remove_btn_color]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 5,
			'label'    => __( 'Remove Button Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Order Summry - Remove Button Hover Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_remove_btn_color_hover]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_remove_btn_color_hover' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_remove_btn_color_hover]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 10,
			'label'    => __( 'Remove Button Color Hover', 'bstone' ),
		)
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_remove_btn_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_order_summary',
            'priority' => 15,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout - Order Summry - Table Heade Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_table_head_bg_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_table_head_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_table_head_bg_color]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 20,
			'label'    => __( 'Order Table Head Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Order Summry - Table Heade Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_table_head_text_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_table_head_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_table_head_text_color]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 25,
			'label'    => __( 'Order Table Head Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Order Summry - Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_table_text_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_table_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_table_text_color]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 30,
			'label'    => __( 'Order Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Order Summry - Product Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_ptitle_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_ptitle_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_ptitle_color]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 35,
			'label'    => __( 'Product Title Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Order Summry - Product Title Hover Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_ptitle_hover_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_osmry_ptitle_hover_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_osmry_ptitle_hover_color]', array(
			'section'  => 'sc_s_cc_s_order_summary',
			'priority' => 40,
			'label'    => __( 'Product Title Hover Color', 'bstone' ),
		)
	)
);

/**************************************
 * Section: Checkout & Cart Field Label
 **************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_label',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Field Label', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_label',
			'priority' => 15,
		)
	)
);

/**
 * Option: Cart & Checkout Section Label Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_text_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_label_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_text_color]', array(
			'section'  => 'sc_s_cc_s_label',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Section Label Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_family]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_label_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_label',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_weight]',
		)
	)
);

/**
 * Option: Cart & Checkout Section Label Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_weight]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_label_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_label',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_family]',
		)
	)
);

/**
 * Option: Cart & Checkout Section Label Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_text_transform]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_label_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_label',
		'priority' => 20,
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
 * Option: Cart & Checkout Section Label Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_text_style]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_label_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_label',
		'priority' => 25,
		'label'    => __( 'Font Style', 'bstone' ),
		'choices'  => array(
			''        => __( 'Default', 'bstone' ),
			'normal'  => __( 'Normal', 'bstone' ),
			'italic'  => __( 'Italic', 'bstone' ),
			'oblique' => __( 'Oblique', 'bstone' ),
		),
	)
);

/**
 * Option: Cart & Checkout Section Label Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_size]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_label_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_cc_s_label',
			'priority'    => 30,
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
 * Option: Cart & Checkout Section Label Padding
 */
$sh_cc_sty_label_padding = array(
	'sh_cc_sty_label_top_padding:'.bstone_get_option( 'sh_cc_sty_label_top_padding' ), 'sh_cc_sty_label_bottom_padding:'.bstone_get_option( 'sh_cc_sty_label_bottom_padding' ), 'sh_cc_sty_label_left_padding:'.bstone_get_option( 'sh_cc_sty_label_left_padding' ), 'sh_cc_sty_label_right_padding:'.bstone_get_option( 'sh_cc_sty_label_right_padding' ),
	'sh_cc_sty_label_tablet_top_padding:', 'sh_cc_sty_label_tablet_bottom_padding:', 'sh_cc_sty_label_tablet_left_padding:', 'sh_cc_sty_label_tablet_right_padding:',
	'sh_cc_sty_label_mobile_top_padding:', 'sh_cc_sty_label_mobile_bottom_padding:', 'sh_cc_sty_label_mobile_left_padding:', 'sh_cc_sty_label_mobile_right_padding:',
);	
foreach($sh_cc_sty_label_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_label_padding]', array(
			'section'  => 'sc_s_cc_s_label',
			'priority' => 35,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_label_mobile_left_padding]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/********************************
 * Section: Checkout & Cart Field
 ********************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_field',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Field', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_field',
			'priority' => 20,
		)
	)
);

/**
 * Option: Cart & Checkout Fields Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_color]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Fields Focus Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_color_fcs]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_text_color_fcs' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_color_fcs]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 15,
			'label'    => __( 'Focus Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Fields Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_bg_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_bg_color]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Fields Focus Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_bg_color_fcs]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_bg_color_fcs' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_bg_color_fcs]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 25,
			'label'    => __( 'Focus Background', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Fields Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_color]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 30,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Fields Focus Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_color_fcs]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_brdr_color_fcs' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_color_fcs]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 35,
			'label'    => __( 'Focus Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Fields Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_field',
		'priority'    => 40,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Cart & Checkout Fields Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_field',
		'priority'    => 45,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_field',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout Fields Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_family]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_field',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_weight]',
		)
	)
);

/**
 * Option: Cart & Checkout Fields Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_weight]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_field',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_family]',
		)
	)
);

/**
 * Option: Cart & Checkout Fields Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_transform]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_field',
		'priority' => 65,
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
 * Option: Cart & Checkout Fields Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_style]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_field',
		'priority' => 70,
		'label'    => __( 'Font Style', 'bstone' ),
		'choices'  => array(
			''        => __( 'Default', 'bstone' ),
			'normal'  => __( 'Normal', 'bstone' ),
			'italic'  => __( 'Italic', 'bstone' ),
			'oblique' => __( 'Oblique', 'bstone' ),
		),
	)
);

/**
 * Option: Cart & Checkout Fields Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_size]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_field_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_cc_s_field',
			'priority'    => 75,
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
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_field',
            'priority' => 80,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout Fields Padding
 */
$sh_cc_sty_field_padding = array(
	'sh_cc_sty_field_top_padding:'.bstone_get_option( 'sh_cc_sty_field_top_padding' ), 'sh_cc_sty_field_bottom_padding:'.bstone_get_option( 'sh_cc_sty_field_bottom_padding' ), 'sh_cc_sty_field_left_padding:'.bstone_get_option( 'sh_cc_sty_field_left_padding' ), 'sh_cc_sty_field_right_padding:'.bstone_get_option( 'sh_cc_sty_field_right_padding' ),
	'sh_cc_sty_field_tablet_top_padding:', 'sh_cc_sty_field_tablet_bottom_padding:', 'sh_cc_sty_field_tablet_left_padding:', 'sh_cc_sty_field_tablet_right_padding:',
	'sh_cc_sty_field_mobile_top_padding:', 'sh_cc_sty_field_mobile_bottom_padding:', 'sh_cc_sty_field_mobile_left_padding:', 'sh_cc_sty_field_mobile_right_padding:',
);	
foreach($sh_cc_sty_field_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_padding]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_left_padding]',
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
 * Option: Cart & Checkout Fields Margin
 */
$sh_cc_sty_field_margin = array(
	'sh_cc_sty_field_top_margin:'.bstone_get_option( 'sh_cc_sty_field_top_margin' ), 'sh_cc_sty_field_bottom_margin:'.bstone_get_option( 'sh_cc_sty_field_bottom_margin' ), 'sh_cc_sty_field_left_margin:'.bstone_get_option( 'sh_cc_sty_field_left_margin' ), 'sh_cc_sty_field_right_margin:'.bstone_get_option( 'sh_cc_sty_field_right_margin' ),
	'sh_cc_sty_field_tablet_top_margin:', 'sh_cc_sty_field_tablet_bottom_margin:', 'sh_cc_sty_field_tablet_left_margin:', 'sh_cc_sty_field_tablet_right_margin:',
	'sh_cc_sty_field_mobile_top_margin:', 'sh_cc_sty_field_mobile_bottom_margin:', 'sh_cc_sty_field_mobile_left_margin:', 'sh_cc_sty_field_mobile_right_margin:',
);	
foreach($sh_cc_sty_field_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_field_margin]', array(
			'section'  => 'sc_s_cc_s_field',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_field_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/*********************************
 * Section: Checkout & Cart Button
 *********************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_button',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Button', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_button',
			'priority' => 25,
		)
	)
);

/**
 * Option: Cart & Checkout Button Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_txt_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_txt_color]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Button Hover Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_txt_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_txt_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_txt_color_hovr]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 15,
			'label'    => __( 'Hover Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Button Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_bg_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_bg_color]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Button Hover Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_bg_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_bg_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_bg_color_hovr]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 25,
			'label'    => __( 'Hover Background', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Button Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_color]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 30,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Button Hover Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_brdr_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_color_hovr]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 35,
			'label'    => __( 'Hover Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Button Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_button',
		'priority'    => 40,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Cart & Checkout Button Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_button',
		'priority'    => 45,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_button',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout Button Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_family]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_button',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_weight]',
		)
	)
);

/**
 * Option: Cart & Checkout Button Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_weight]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_button',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_family]',
		)
	)
);

/**
 * Option: Cart & Checkout Button Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_text_transform]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_button',
		'priority' => 65,
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
 * Option: Cart & Checkout Button Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_text_style]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_button',
		'priority' => 70,
		'label'    => __( 'Font Style', 'bstone' ),
		'choices'  => array(
			''        => __( 'Default', 'bstone' ),
			'normal'  => __( 'Normal', 'bstone' ),
			'italic'  => __( 'Italic', 'bstone' ),
			'oblique' => __( 'Oblique', 'bstone' ),
		),
	)
);

/**
 * Option: Cart & Checkout Button Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_size]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_button_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_cc_s_button',
			'priority'    => 75,
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
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_button',
            'priority' => 80,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout Button Padding
 */
$sh_cc_sty_button_padding = array(
	'sh_cc_sty_button_top_padding:'.bstone_get_option( 'sh_cc_sty_button_top_padding' ), 'sh_cc_sty_button_bottom_padding:'.bstone_get_option( 'sh_cc_sty_button_bottom_padding' ), 'sh_cc_sty_button_left_padding:'.bstone_get_option( 'sh_cc_sty_button_left_padding' ), 'sh_cc_sty_button_right_padding:'.bstone_get_option( 'sh_cc_sty_button_right_padding' ),
	'sh_cc_sty_button_tablet_top_padding:', 'sh_cc_sty_button_tablet_bottom_padding:', 'sh_cc_sty_button_tablet_left_padding:', 'sh_cc_sty_button_tablet_right_padding:',
	'sh_cc_sty_button_mobile_top_padding:', 'sh_cc_sty_button_mobile_bottom_padding:', 'sh_cc_sty_button_mobile_left_padding:', 'sh_cc_sty_button_mobile_right_padding:',
);	
foreach($sh_cc_sty_button_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_padding]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_left_padding]',
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
 * Option: Cart & Checkout Button Margin
 */
$sh_cc_sty_button_margin = array(
	'sh_cc_sty_button_top_margin:'.bstone_get_option( 'sh_cc_sty_button_top_margin' ), 'sh_cc_sty_button_bottom_margin:'.bstone_get_option( 'sh_cc_sty_button_bottom_margin' ), 'sh_cc_sty_button_left_margin:'.bstone_get_option( 'sh_cc_sty_button_left_margin' ), 'sh_cc_sty_button_right_margin:'.bstone_get_option( 'sh_cc_sty_button_right_margin' ),
	'sh_cc_sty_button_tablet_top_margin:', 'sh_cc_sty_button_tablet_bottom_margin:', 'sh_cc_sty_button_tablet_left_margin:', 'sh_cc_sty_button_tablet_right_margin:',
	'sh_cc_sty_button_mobile_top_margin:', 'sh_cc_sty_button_mobile_bottom_margin:', 'sh_cc_sty_button_mobile_left_margin:', 'sh_cc_sty_button_mobile_right_margin:',
);	
foreach($sh_cc_sty_button_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_button_margin]', array(
			'section'  => 'sc_s_cc_s_button',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_button_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/**************************************
 * Section: Checkout & Cart Update Button
 **************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_update_button',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Update, Coupon Button', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_update_button',
			'priority' => 30,
		)
	)
);

/**
 * Option: Cart & Checkout Update Button Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_txt_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_txt_color]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Hover Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_txt_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_txt_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_txt_color_hovr]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 15,
			'label'    => __( 'Hover Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_bg_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_bg_color]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Hover Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_bg_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_bg_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_bg_color_hovr]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 25,
			'label'    => __( 'Hover Background', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_color]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 30,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Hover Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_brdr_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_color_hovr]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 35,
			'label'    => __( 'Hover Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_update_button',
		'priority'    => 40,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Cart & Checkout Back Button Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_update_button',
		'priority'    => 45,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_update_button',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout Back Button Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_family]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_update_button',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_weight]',
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_weight]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_cc_s_update_button',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_family]',
		)
	)
);

/**
 * Option: Cart & Checkout Back Button Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_text_transform]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_update_button',
		'priority' => 65,
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
 * Option: Cart & Checkout Back Button Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_text_style]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_cc_s_update_button',
		'priority' => 70,
		'label'    => __( 'Font Style', 'bstone' ),
		'choices'  => array(
			''        => __( 'Default', 'bstone' ),
			'normal'  => __( 'Normal', 'bstone' ),
			'italic'  => __( 'Italic', 'bstone' ),
			'oblique' => __( 'Oblique', 'bstone' ),
		),
	)
);

/**
 * Option: Cart & Checkout Back Button Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_size]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_update_button_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_cc_s_update_button',
			'priority'    => 75,
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
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_cc_s_update_button',
            'priority' => 80,
            'settings' => array(),
        )
    )
);

/**
 * Option: Cart & Checkout Back Button Padding
 */
$sh_cc_sty_update_button_padding = array(
	'sh_cc_sty_update_button_top_padding:'.bstone_get_option( 'sh_cc_sty_update_button_top_padding' ), 'sh_cc_sty_update_button_bottom_padding:'.bstone_get_option( 'sh_cc_sty_update_button_bottom_padding' ), 'sh_cc_sty_update_button_left_padding:'.bstone_get_option( 'sh_cc_sty_update_button_left_padding' ), 'sh_cc_sty_update_button_right_padding:'.bstone_get_option( 'sh_cc_sty_update_button_right_padding' ),
	'sh_cc_sty_update_button_tablet_top_padding:', 'sh_cc_sty_update_button_tablet_bottom_padding:', 'sh_cc_sty_update_button_tablet_left_padding:', 'sh_cc_sty_update_button_tablet_right_padding:',
	'sh_cc_sty_update_button_mobile_top_padding:', 'sh_cc_sty_update_button_mobile_bottom_padding:', 'sh_cc_sty_update_button_mobile_left_padding:', 'sh_cc_sty_update_button_mobile_right_padding:',
);	
foreach($sh_cc_sty_update_button_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_padding]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_left_padding]',
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
 * Option: Cart & Checkout Back Button Margin
 */
$sh_cc_sty_update_button_margin = array(
	'sh_cc_sty_update_button_top_margin:'.bstone_get_option( 'sh_cc_sty_update_button_top_margin' ), 'sh_cc_sty_update_button_bottom_margin:'.bstone_get_option( 'sh_cc_sty_update_button_bottom_margin' ), 'sh_cc_sty_update_button_left_margin:'.bstone_get_option( 'sh_cc_sty_update_button_left_margin' ), 'sh_cc_sty_update_button_right_margin:'.bstone_get_option( 'sh_cc_sty_update_button_right_margin' ),
	'sh_cc_sty_update_button_tablet_top_margin:', 'sh_cc_sty_update_button_tablet_bottom_margin:', 'sh_cc_sty_update_button_tablet_left_margin:', 'sh_cc_sty_update_button_tablet_right_margin:',
	'sh_cc_sty_update_button_mobile_top_margin:', 'sh_cc_sty_update_button_mobile_bottom_margin:', 'sh_cc_sty_update_button_mobile_left_margin:', 'sh_cc_sty_update_button_mobile_right_margin:',
);	
foreach($sh_cc_sty_update_button_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_update_button_margin]', array(
			'section'  => 'sc_s_cc_s_update_button',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_update_button_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/************************************
 * Section: Checkout & Cart Thumbnail
 ************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_thumb',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Thumbnail', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_thumb',
			'priority' => 35,
		)
	)
);

// Option: Cart & Checkout Thumbnail Show / Hide
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_show_thumb]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_cc_sty_thumb_show_thumb' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_show_thumb]',
		array(
			'section' => 'sc_s_cc_s_thumb',
			'column'  => 'sc-col-6',
            'priority' => 5,
			'label' => __( 'Show', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Thumbnail Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_thumb_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_brdr_color]', array(
			'section'  => 'sc_s_cc_s_thumb',
			'priority' => 15,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Thumbnail Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_thumb_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_thumb',
		'priority'    => 20,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Cart & Checkout Thumbnail Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_thumb_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_thumb',
		'priority'    => 25,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Cart & Checkout Thumbnail Margin
 */
$sh_cc_sty_thumb_margin = array(
	'sh_cc_sty_thumb_top_margin:'.bstone_get_option( 'sh_cc_sty_thumb_top_margin' ), 'sh_cc_sty_thumb_bottom_margin:'.bstone_get_option( 'sh_cc_sty_thumb_bottom_margin' ), 'sh_cc_sty_thumb_left_margin:'.bstone_get_option( 'sh_cc_sty_thumb_left_margin' ), 'sh_cc_sty_thumb_right_margin:'.bstone_get_option( 'sh_cc_sty_thumb_right_margin' ),
	'sh_cc_sty_thumb_tablet_top_margin:', 'sh_cc_sty_thumb_tablet_bottom_margin:', 'sh_cc_sty_thumb_tablet_left_margin:', 'sh_cc_sty_thumb_tablet_right_margin:',
	'sh_cc_sty_thumb_mobile_top_margin:', 'sh_cc_sty_thumb_mobile_bottom_margin:', 'sh_cc_sty_thumb_mobile_left_margin:', 'sh_cc_sty_thumb_mobile_right_margin:',
);	
foreach($sh_cc_sty_thumb_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_thumb_margin]', array(
			'section'  => 'sc_s_cc_s_thumb',
			'priority' => 30,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_cc_sty_thumb_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***********************
 * Section: Other Styles
 ***********************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_cc_s_others',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Others', 'bstone' ),
			'sc_reset' => 'sh_cc_sty_others',
			'priority' => 40,
		)
	)
);

/**
 * Option: Cart & Checkout - Others - Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_border_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_border_color]', array(
			'section'  => 'sc_s_cc_s_others',
			'priority' => 5,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Others - Divider Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_divider_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_divider_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_divider_color]', array(
			'section'  => 'sc_s_cc_s_others',
			'priority' => 10,
			'label'    => __( 'Divider Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Others - Divider Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_divider_height]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_divider_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_divider_height]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_others',
		'priority'    => 15,
		'label'       => __( 'Divider Height', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Cart & Checkout - Others - Order Summry Border Width on Checkout Page
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_chk_order_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_chk_order_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_chk_order_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_s_others',
		'priority'    => 20,
		'label'       => __( 'Order Summry Border Width on Checkout Page', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Cart & Checkout - Others - Payment Box Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_payment_box_bg_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_payment_box_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_payment_box_bg_color]', array(
			'section'  => 'sc_s_cc_s_others',
			'priority' => 25,
			'label'    => __( 'Payment Box Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Others - Payment Box Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_payment_box_text_color]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_payment_box_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_payment_box_text_color]', array(
			'section'  => 'sc_s_cc_s_others',
			'priority' => 30,
			'label'    => __( 'Payment Box Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout - Others - Payment Box Line Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_payment_box_line_height]', array(
		'default'           => bstone_get_option( 'sh_cc_sty_others_payment_box_line_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_cc_sty_others_payment_box_line_height]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_cc_s_others',
			'priority'    => 35,
			'label'       => __( 'Payment Box Line Height', 'bstone' ),
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 0.01,
				'max'  => 5,
			),
		)
	)
);