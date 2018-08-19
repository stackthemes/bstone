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

/*************************
 * Section: Mini Cart Icon
 *************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_mc_s_icon',
		array(
			'sc_belong' => 'sc_s_mc_dialog',
			'sc_tab' => array(
				'id' => 'sh_mc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Icon', 'bstone' ),
			'sc_reset' => 'sh_mc_sty_icon',
			'priority' => 5,
		)
	)
);

/**
 * Option: Mini Cart - Icon Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_icon_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_color]', array(
			'section'  => 'sc_s_mc_s_icon',
			'priority' => 5,
			'label'    => __( 'Icon Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Icon Color Hover
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_color_hover]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_icon_color_hover' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_color_hover]', array(
			'section'  => 'sc_s_mc_s_icon',
			'priority' => 10,
			'label'    => __( 'Icon Color Hover', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Text Color on Icon Hover
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_color_text]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_icon_color_text' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_color_text]', array(
			'section'  => 'sc_s_mc_s_icon',
			'priority' => 15,
			'label'    => __( 'Text Color on Icon Hover', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Icon Margin Left
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_margin_left]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_icon_margin_left' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_margin_left]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_icon',
		'priority'    => 20,
		'label'       => __( 'Margin Left', 'bstone' ),
		'input_attrs' => array(
			'min'  => -100,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Mini Cart - Icon Margin Right
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_margin_right]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_icon_margin_right' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_icon_margin_right]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_icon',
		'priority'    => 25,
		'label'       => __( 'Margin Right', 'bstone' ),
		'input_attrs' => array(
			'min'  => -100,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/***************************
 * Section: Mini Cart Styles
 ***************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_mc_s_container',
		array(
			'sc_belong' => 'sc_s_mc_dialog',
			'sc_tab' => array(
				'id' => 'sh_mc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Container', 'bstone' ),
			'sc_reset' => 'sh_mc_sty_container',
			'priority' => 10,
		)
	)
);

/**
 * Option: Mini Cart - Container Background
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_bg_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_container_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_bg_color]', array(
			'section'  => 'sc_s_mc_s_container',
			'priority' => 5,
			'label'    => __( 'Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Container Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_border_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_container_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_border_color]', array(
			'section'  => 'sc_s_mc_s_container',
			'priority' => 10,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Container Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_border_width]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_container_border_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_border_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_container',
		'priority'    => 15,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Mini Cart - Container Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_border_radius]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_container_border_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_border_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_container',
		'priority'    => 20,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Mini Cart - Position
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_position]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_container_position' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_container_position]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_container',
		'priority' => 25,
		'label'    => __( 'Position', 'bstone' ),
		'choices'  => array(
			'left'  => __( 'Left', 'bstone' ),
			'right' => __( 'Right', 'bstone' ),
		),
	)
);

/*************************************
 * Section: Mini Cart View Cart Button
 *************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_mc_s_view',
		array(
			'sc_belong' => 'sc_s_mc_dialog',
			'sc_tab' => array(
				'id' => 'sh_mc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'View Cart Button', 'bstone' ),
			'sc_reset' => 'sh_mc_sty_view',
			'priority' => 15,
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_txt_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_txt_color]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Hover Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_txt_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_txt_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_txt_color_hovr]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 15,
			'label'    => __( 'Hover Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_bg_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_bg_color]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Hover Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_bg_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_bg_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_bg_color_hovr]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 25,
			'label'    => __( 'Hover Background', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_color]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 30,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Hover Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_brdr_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_color_hovr]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 35,
			'label'    => __( 'Hover Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_view',
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
 * Option: Mini Cart - View Cart Button Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_view',
		'priority'    => 45,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_mc_s_view',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Mini Cart - View Cart Button Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_family]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_mc_s_view',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_weight]',
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_weight]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_mc_s_view',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_family]',
		)
	)
);

/**
 * Option: Mini Cart - View Cart Button Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_text_transform]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_view',
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
 * Option: Mini Cart - View Cart Button Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_text_style]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_view',
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
 * Option: Mini Cart - View Cart Button Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_size]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_view_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_mc_s_view',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_mc_s_view',
            'priority' => 80,
            'settings' => array(),
        )
    )
);

/**
 * Option: Mini Cart - View Cart Button Padding
 */
$sh_mc_sty_view_padding = array(
	'sh_mc_sty_view_top_padding:'.bstone_get_option( 'sh_mc_sty_view_top_padding' ), 'sh_mc_sty_view_bottom_padding:'.bstone_get_option( 'sh_mc_sty_view_bottom_padding' ), 'sh_mc_sty_view_left_padding:'.bstone_get_option( 'sh_mc_sty_view_left_padding' ), 'sh_mc_sty_view_right_padding:'.bstone_get_option( 'sh_mc_sty_view_right_padding' ),
	'sh_mc_sty_view_tablet_top_padding:', 'sh_mc_sty_view_tablet_bottom_padding:', 'sh_mc_sty_view_tablet_left_padding:', 'sh_mc_sty_view_tablet_right_padding:',
	'sh_mc_sty_view_mobile_top_padding:', 'sh_mc_sty_view_mobile_bottom_padding:', 'sh_mc_sty_view_mobile_left_padding:', 'sh_mc_sty_view_mobile_right_padding:',
);	
foreach($sh_mc_sty_view_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_padding]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_left_padding]',
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
 * Option: Mini Cart - View Cart Button Margin
 */
$sh_mc_sty_view_margin = array(
	'sh_mc_sty_view_top_margin:'.bstone_get_option( 'sh_mc_sty_view_top_margin' ), 'sh_mc_sty_view_bottom_margin:'.bstone_get_option( 'sh_mc_sty_view_bottom_margin' ), 'sh_mc_sty_view_left_margin:'.bstone_get_option( 'sh_mc_sty_view_left_margin' ), 'sh_mc_sty_view_right_margin:'.bstone_get_option( 'sh_mc_sty_view_right_margin' ),
	'sh_mc_sty_view_tablet_top_margin:', 'sh_mc_sty_view_tablet_bottom_margin:', 'sh_mc_sty_view_tablet_left_margin:', 'sh_mc_sty_view_tablet_right_margin:',
	'sh_mc_sty_view_mobile_top_margin:', 'sh_mc_sty_view_mobile_bottom_margin:', 'sh_mc_sty_view_mobile_left_margin:', 'sh_mc_sty_view_mobile_right_margin:',
);	
foreach($sh_mc_sty_view_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_view_margin]', array(
			'section'  => 'sc_s_mc_s_view',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_view_mobile_left_margin]',
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
 * Section: Mini Cart Checkout Button
 ************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_mc_s_checkout',
		array(
			'sc_belong' => 'sc_s_mc_dialog',
			'sc_tab' => array(
				'id' => 'sh_mc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Checkout Button', 'bstone' ),
			'sc_reset' => 'sh_mc_sty_checkout',
			'priority' => 20,
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_txt_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_txt_color]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Hover Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_txt_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_txt_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_txt_color_hovr]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 15,
			'label'    => __( 'Hover Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_bg_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_bg_color]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Hover Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_bg_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_bg_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_bg_color_hovr]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 25,
			'label'    => __( 'Hover Background', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_color]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 30,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Hover Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_brdr_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_color_hovr]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 35,
			'label'    => __( 'Hover Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_checkout',
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
 * Option: Mini Cart - Checkout Button Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_checkout',
		'priority'    => 45,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_mc_s_checkout',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Mini Cart - Checkout Button Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_family]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_mc_s_checkout',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_weight]',
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_weight]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_mc_s_checkout',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_family]',
		)
	)
);

/**
 * Option: Mini Cart - Checkout Button Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_text_transform]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_checkout',
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
 * Option: Mini Cart - Checkout Button Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_text_style]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_checkout',
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
 * Option: Mini Cart - Checkout Button Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_size]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_checkout_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_mc_s_checkout',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_mc_s_checkout',
            'priority' => 80,
            'settings' => array(),
        )
    )
);

/**
 * Option: Mini Cart - Checkout Button Padding
 */
$sh_mc_sty_checkout_padding = array(
	'sh_mc_sty_checkout_top_padding:'.bstone_get_option( 'sh_mc_sty_checkout_top_padding' ), 'sh_mc_sty_checkout_bottom_padding:'.bstone_get_option( 'sh_mc_sty_checkout_bottom_padding' ), 'sh_mc_sty_checkout_left_padding:'.bstone_get_option( 'sh_mc_sty_checkout_left_padding' ), 'sh_mc_sty_checkout_right_padding:'.bstone_get_option( 'sh_mc_sty_checkout_right_padding' ),
	'sh_mc_sty_checkout_tablet_top_padding:', 'sh_mc_sty_checkout_tablet_bottom_padding:', 'sh_mc_sty_checkout_tablet_left_padding:', 'sh_mc_sty_checkout_tablet_right_padding:',
	'sh_mc_sty_checkout_mobile_top_padding:', 'sh_mc_sty_checkout_mobile_bottom_padding:', 'sh_mc_sty_checkout_mobile_left_padding:', 'sh_mc_sty_checkout_mobile_right_padding:',
);	
foreach($sh_mc_sty_checkout_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_padding]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_left_padding]',
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
 * Option: Mini Cart - Checkout Button Margin
 */
$sh_mc_sty_checkout_margin = array(
	'sh_mc_sty_checkout_top_margin:'.bstone_get_option( 'sh_mc_sty_checkout_top_margin' ), 'sh_mc_sty_checkout_bottom_margin:'.bstone_get_option( 'sh_mc_sty_checkout_bottom_margin' ), 'sh_mc_sty_checkout_left_margin:'.bstone_get_option( 'sh_mc_sty_checkout_left_margin' ), 'sh_mc_sty_checkout_right_margin:'.bstone_get_option( 'sh_mc_sty_checkout_right_margin' ),
	'sh_mc_sty_checkout_tablet_top_margin:', 'sh_mc_sty_checkout_tablet_bottom_margin:', 'sh_mc_sty_checkout_tablet_left_margin:', 'sh_mc_sty_checkout_tablet_right_margin:',
	'sh_mc_sty_checkout_mobile_top_margin:', 'sh_mc_sty_checkout_mobile_bottom_margin:', 'sh_mc_sty_checkout_mobile_left_margin:', 'sh_mc_sty_checkout_mobile_right_margin:',
);	
foreach($sh_mc_sty_checkout_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_checkout_margin]', array(
			'section'  => 'sc_s_mc_s_checkout',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_mc_sty_checkout_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/**********************************
 * Section: Mini Cart Remove Button
 **********************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_mc_s_remove',
		array(
			'sc_belong' => 'sc_s_mc_dialog',
			'sc_tab' => array(
				'id' => 'sh_mc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Remove Button', 'bstone' ),
			'sc_reset' => 'sh_mc_sty_remove',
			'priority' => 25,
		)
	)
);

/**
 * Option: Mini Cart - Remove Button Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_remove_btn_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_color]', array(
			'section'  => 'sc_s_mc_s_remove',
			'priority' => 5,
			'label'    => __( 'Remove Button Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Remove Button Color Hover
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_color_hover]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_remove_btn_color_hover' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_color_hover]', array(
			'section'  => 'sc_s_mc_s_remove',
			'priority' => 10,
			'label'    => __( 'Remove Button Hover Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Remove Button Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_font_size]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_remove_btn_font_size' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_font_size]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_remove',
		'priority'    => 15,
		'label'       => __( 'Font Size', 'bstone' ),
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Mini Cart - Remove Button Line Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_line_height]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_remove_btn_line_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_remove_btn_line_height]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_mc_s_remove',
			'priority'    => 20,
			'label'       => __( 'Line Height', 'bstone' ),
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 0.1,
				'step' => 0.01,
				'max'  => 5,
			),
		)
	)
);

/****************************
 * Section: Mini Cart Content
 ****************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_mc_s_content',
		array(
			'sc_belong' => 'sc_s_mc_dialog',
			'sc_tab' => array(
				'id' => 'sh_mc_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Content', 'bstone' ),
			'sc_reset' => 'sh_mc_sty_content',
			'priority' => 30,
		)
	)
);

/**
 * Option: Mini Cart - Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_text_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_text_color]', array(
			'section'  => 'sc_s_mc_s_content',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Subtotal Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_subtotal_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_subtotal_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_subtotal_color]', array(
			'section'  => 'sc_s_mc_s_content',
			'priority' => 10,
			'label'    => __( 'Subtotal Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Subtotal Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_subtotal_border_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_subtotal_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_subtotal_border_color]', array(
			'section'  => 'sc_s_mc_s_content',
			'priority' => 15,
			'label'    => __( 'Subtotal Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Product Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_ptitle_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_color]', array(
			'section'  => 'sc_s_mc_s_content',
			'priority' => 20,
			'label'    => __( 'Product Title Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Product Title Color Hover
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_color_hover]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_ptitle_color_hover' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_color_hover]', array(
			'section'  => 'sc_s_mc_s_content',
			'priority' => 25,
			'label'    => __( 'Product Title Hover Color', 'bstone' ),
		)
	)
);

/**
 * Option: Mini Cart - Product Title Line Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_line_height]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_ptitle_line_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_line_height]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_mc_s_content',
			'priority'    => 30,
			'label'       => __( 'Line Height', 'bstone' ),
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 0.1,
				'step' => 0.01,
				'max'  => 5,
			),
		)
	)
);

/**
 * Option: Mini Cart - Product Title Margin Top
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_margin_top]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_ptitle_margin_top' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_margin_top]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_content',
		'priority'    => 33,
		'label'       => __( 'Margin Top', 'bstone' ),
		'input_attrs' => array(
			'min'  => -100,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Mini Cart - Product Title Margin Bottom
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_margin_bottom]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_ptitle_margin_bottom' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_ptitle_margin_bottom]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_content',
		'priority'    => 35,
		'label'       => __( 'Margin Bottom', 'bstone' ),
		'input_attrs' => array(
			'min'  => -100,
			'step' => 1,
			'max'  => 100,
		),
	)
);

/**
 * Option: Mini Cart - Cart Item Padding Bottom
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_cart_item_padding_bottom]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_cart_item_padding_bottom' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_cart_item_padding_bottom]', array(
		'type'        => 'number',
		'section'     => 'sc_s_mc_s_content',
		'priority'    => 40,
		'label'       => __( 'Cart Item Padding Bottom', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 0,
			'max'  => 100,
		),
	)
);

/**
 * Option: Mini Cart - Product Divider Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_divider_color]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_divider_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_divider_color]', array(
			'section'  => 'sc_s_mc_s_content',
			'priority' => 45,
			'label'    => __( 'Product Divider Color', 'bstone' ),
		)
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_divider_fonts]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_mc_s_content',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Mini Cart - Content Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_family]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_mc_s_content',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_weight]',
		)
	)
);

/**
 * Option: Mini Cart - Content Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_weight]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_mc_s_content',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_family]',
		)
	)
);

/**
 * Option: Mini Cart - Content Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_text_transform]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_content',
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
 * Option: Mini Cart - Content Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_text_style]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_mc_s_content',
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
 * Option: Mini Cart - Content Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_size]', array(
		'default'           => bstone_get_option( 'sh_mc_sty_content_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_mc_sty_content_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_mc_s_content',
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