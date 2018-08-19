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

/**************************************
 * Section: Shop Styles Tab - Container
 **************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_container',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Main Container', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_cnt',
			'priority' => 5,
		)
	)
);

/**
 * Option: Shop Container
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cnt_content_width]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cnt_content_width' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cnt_content_width]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_container',
		'priority' => 5,
		'label'    => __( 'Shop Archive Content Width', 'bstone' ),
		'choices'  => array(
			'default' => __( 'Default', 'bstone' ),
			'custom'  => __( 'Custom', 'bstone' ),
		),
	)
);

/**
 * Option: Enter Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cnt_content_width_custom]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cnt_content_width_custom' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cnt_content_width_custom]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_pl_s_container',
			'priority'    => 10,
			'label'       => __( 'Enter Width', 'bstone' ),
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 768,
				'step' => 1,
				'max'  => 1920,
			),
		)
	)
);

/****************************************
 * Section: Shop Styles Tab - Shop Filter
 ****************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_filter',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Shop Filter', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_filter',
			'priority' => 7,
		)
	)
);

/**
 * Option: Shop Filter Margin Bottom
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_margin_bottom]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_margin_bottom' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_margin_bottom]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_filter',
		'priority'    => 5,
		'label'       => __( 'Margin Bottom', 'bstone' ),
		'input_attrs' => array(
			'min'  => -100,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Item Count Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_item_count_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_item_count_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_item_count_color]', array(
			'section'  => 'sc_s_pl_s_filter',
			'priority' => 10,
			'label'    => __( 'Item Count Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Filter Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_text_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_text_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_text_color]', array(
			'section'  => 'sc_s_pl_s_filter',
			'priority' => 15,
			'label'    => __( 'Filter Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Filter Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_bg_color]', array(
			'section'  => 'sc_s_pl_s_filter',
			'priority' => 20,
			'label'    => __( 'Filter Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Filter Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_border_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_border_color]', array(
			'section'  => 'sc_s_pl_s_filter',
			'priority' => 25,
			'label'    => __( 'Filter Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_filter',
            'priority' => 30,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Filter Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_filter',
			'priority'    => 35,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_weight]',
		)
	)
);

/**
 * Option: Shop Filter Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_filter',
			'priority'    => 40,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_family]',
		)
	)
);

/**
 * Option: Shop Filter Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_filter',
		'priority' => 45,
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
 * Option: Shop Filter Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_filter',
		'priority' => 50,
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
 * Option: Shop Filter Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_filter_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_filter_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_filter',
			'priority'    => 55,
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

/************************************
 * Section: Shop Styles Tab - Box
 ************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_box',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Product Box', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_box',
			'priority' => 10,
		)
	)
);

/**
 * Option: Shop Item Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_bg_color]', array(
			'section'  => 'sc_s_pl_s_box',
			'priority' => 5,
			'label'    => __( 'Product Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Item Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_border_width]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_border_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_border_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_box',
		'priority'    => 10,
		'label'       => __( 'Products Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Shop Item Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_border_radius]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_border_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_border_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_box',
		'priority'    => 15,
		'label'       => __( 'Products Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Item Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_border_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_border_color]', array(
			'section'  => 'sc_s_pl_s_box',
			'priority' => 20,
			'label'    => __( 'Product Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Item Container Padding
 */
$shop_item_cnt_padding = array(
	'sh_pl_sty_box_itm_cnt_top_padding:'.bstone_get_option( 'sh_pl_sty_box_itm_cnt_top_padding' ), 'sh_pl_sty_box_itm_cnt_bottom_padding:'.bstone_get_option( 'sh_pl_sty_box_itm_cnt_bottom_padding' ), 'sh_pl_sty_box_itm_cnt_left_padding:'.bstone_get_option( 'sh_pl_sty_box_itm_cnt_left_padding' ), 'sh_pl_sty_box_itm_cnt_right_padding:'.bstone_get_option( 'sh_pl_sty_box_itm_cnt_right_padding' ),
	'sh_pl_sty_box_itm_cnt_tablet_top_padding:', 'sh_pl_sty_box_itm_cnt_tablet_bottom_padding:', 'sh_pl_sty_box_itm_cnt_tablet_left_padding:', 'sh_pl_sty_box_itm_cnt_tablet_right_padding:',
	'sh_pl_sty_box_itm_cnt_mobile_top_padding:', 'sh_pl_sty_box_itm_cnt_mobile_bottom_padding:', 'sh_pl_sty_box_itm_cnt_mobile_left_padding:', 'sh_pl_sty_box_itm_cnt_mobile_right_padding:',
);	
foreach($shop_item_cnt_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[woo-sidebar-padding]', array(
			'section'  => 'sc_s_pl_s_box',
			'priority' => 25,
			'label'    => __( 'Product Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_itm_cnt_mobile_left_padding]',
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
 * Option: Shop Item Shadow
 */
$woo_shop_item_box_shadow = array(
	'sh_pl_sty_box_item_shadow_x:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_x' ),
	'sh_pl_sty_box_item_shadow_y:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_y' ),
	'sh_pl_sty_box_item_shadow_blur:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_blur' ),
	'sh_pl_sty_box_item_shadow_spread:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_spread' ),
);
foreach($woo_shop_item_box_shadow as $value_attr) {
	$dval = explode(":",$value_attr);
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

$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_shadow_inset]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_shadow_inset' ),
		'type'              => 'option',
		'capability' 		=> 'manage_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_shadow_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_shadow_color' ),
		'type'              => 'option',
		'capability' 		=> 'manage_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);

$wp_customize->add_control(
	new Bstone_Control_Shadow(
		$wp_customize,
		BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_shadow]',
		array(
			'section'  	 	  => 'sc_s_pl_s_box',
			'priority' 	 	  => 25,
			'label'    	 	  => __( 'Box Shadow', 'bstone' ),
			'settings' => array(
				'x' 	 => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_x]',
				'y' 	 => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_y]',
				'blur' 	 => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_blur]',
				'spread' => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_spread]',
				'inset'  => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_inset]',
				'color'  => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_color]',
			),
			'input_attrs' 	 => array(
				'min'   => -100,
				'max'   => 100,
				'step'  => 1,
			),
		)
	)
);


/**
 * Option: Shop Item Shadow Hover
 */
$woo_shop_item_box_shadow_hover = array(
	'sh_pl_sty_box_item_shadow_x_hover:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_x_hover' ),
	'sh_pl_sty_box_item_shadow_y_hover:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_y_hover' ),
	'sh_pl_sty_box_item_shadow_blur_hover:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_blur_hover' ),
	'sh_pl_sty_box_item_shadow_spread_hover:'.bstone_get_option( 'sh_pl_sty_box_item_shadow_spread_hover' ),
);
foreach($woo_shop_item_box_shadow_hover as $value_attr) {
	$dval = explode(":",$value_attr);
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

$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_shadow_inset_hover]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_shadow_inset_hover' ),
		'type'              => 'option',
		'capability' 		=> 'manage_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
	)
);

$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_shadow_color_hover]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_box_item_shadow_color_hover' ),
		'type'              => 'option',
		'capability' 		=> 'manage_options',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);

$wp_customize->add_control(
	new Bstone_Control_Shadow(
		$wp_customize,
		BSTONE_THEME_SETTINGS . '[sh_pl_sty_box_item_shadow_hover]',
		array(
			'section'  	 	  => 'sc_s_pl_s_box',
			'priority' 	 	  => 30,
			'label'    	 	  => __( 'Box Hover Shadow', 'bstone' ),
			'settings' => array(
				'x' 	 => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_x_hover]',
				'y' 	 => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_y_hover]',
				'blur' 	 => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_blur_hover]',
				'spread' => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_spread_hover]',
				'inset'  => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_inset_hover]',
				'color'  => BSTONE_THEME_SETTINGS.'[sh_pl_sty_box_item_shadow_color_hover]',
			),
			'input_attrs' 	 => array(
				'min'   => -100,
				'max'   => 100,
				'step'  => 1,
			),
		)
	)
);

/***********************************
 * Section: Shop Styles Tab - Title
 ***********************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_title',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Title', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_title',
			'priority' => 15,
		)
	)
);

/**
 * Option: Shop Product Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_title_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_color]', array(
			'section'  => 'sc_s_pl_s_title',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Title Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_title_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_title',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Title Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_title_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_title',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_family]',
		)
	)
);

/**
 * Option: Shop Product Title Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_title_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_title',
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
 * Option: Shop Product Title Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_title_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_title',
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
 * Option: Shop Product Title Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_title_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_title',
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
 * Option: Shop Product Title Margin
 */

$shop_item_title_margin = array(
	'sh_pl_sty_title_top_margin:'.bstone_get_option( 'sh_pl_sty_title_top_margin' ), 'sh_pl_sty_title_bottom_margin:'.bstone_get_option( 'sh_pl_sty_title_bottom_margin' ), 'sh_pl_sty_title_left_margin:'.bstone_get_option( 'sh_pl_sty_title_left_margin' ), 'sh_pl_sty_title_right_margin:'.bstone_get_option( 'sh_pl_sty_title_right_margin' ),
	'sh_pl_sty_title_tablet_top_margin:', 'sh_pl_sty_title_tablet_bottom_margin:', 'sh_pl_sty_title_tablet_left_margin:', 'sh_pl_sty_title_tablet_right_margin:',
	'sh_pl_sty_title_mobile_top_margin:', 'sh_pl_sty_title_mobile_bottom_margin:', 'sh_pl_sty_title_mobile_left_margin:', 'sh_pl_sty_title_mobile_right_margin:',
);	
foreach($shop_item_title_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_title_margin]', array(
			'section'  => 'sc_s_pl_s_title',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_title_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***********************************************
 * Section: Shop Styles Tab - Short Description
 ***********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_desc',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Short Description', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_desc',
			'priority' => 20,
		)
	)
);

/**
 * Option: Shop Product Description Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_color]', array(
			'section'  => 'sc_s_pl_s_desc',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Description Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_desc',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Description Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_desc',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_family]',
		)
	)
);

/**
 * Option: Shop Product Description Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_desc',
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
 * Option: Shop Product Description Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_desc',
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
 * Option: Shop Product Description Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_desc',
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
 * Option: Shop Product Description Line Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_line_height]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_desc_line_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_line_height]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_pl_s_desc',
			'priority'    => 35,
			'label'       => __( 'Line Height', 'bstone' ),
			'suffix'      => '',
			'input_attrs' => array(
				'min'  => 1,
				'step' => 0.01,
				'max'  => 5,
			),
		)
	)
);

/**
 * Option: Shop Product Description Margin
 */

$shop_item_desc_margin = array(
	'sh_pl_sty_desc_top_margin:'.bstone_get_option( 'sh_pl_sty_desc_top_margin' ), 'sh_pl_sty_desc_bottom_margin:'.bstone_get_option( 'sh_pl_sty_desc_bottom_margin' ), 'sh_pl_sty_desc_left_margin:'.bstone_get_option( 'sh_pl_sty_desc_left_margin' ), 'sh_pl_sty_desc_right_margin:'.bstone_get_option( 'sh_pl_sty_desc_right_margin' ),
	'sh_pl_sty_desc_tablet_top_margin:', 'sh_pl_sty_desc_tablet_bottom_margin:', 'sh_pl_sty_desc_tablet_left_margin:', 'sh_pl_sty_desc_tablet_right_margin:',
	'sh_pl_sty_desc_mobile_top_margin:', 'sh_pl_sty_desc_mobile_bottom_margin:', 'sh_pl_sty_desc_mobile_left_margin:', 'sh_pl_sty_desc_mobile_right_margin:',
);	
foreach($shop_item_desc_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_desc_margin]', array(
			'section'  => 'sc_s_pl_s_desc',
			'priority' => 40,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_desc_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/*************************************
 * Section: Shop Styles Tab - Category
 *************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_cat',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Category', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_cat',
			'priority' => 25,
		)
	)
);

/**
 * Option: Shop Product Category Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cat_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_color]', array(
			'section'  => 'sc_s_pl_s_cat',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Category Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cat_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_cat',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Category Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cat_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_cat',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_family]',
		)
	)
);

/**
 * Option: Shop Product Category Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cat_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_cat',
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
 * Option: Shop Product Category Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cat_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_cat',
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
 * Option: Shop Product Category Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cat_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_cat',
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
 * Option: Shop Product Category Margin
 */

$shop_item_cat_margin = array(
	'sh_pl_sty_cat_top_margin:'.bstone_get_option( 'sh_pl_sty_cat_top_margin' ), 'sh_pl_sty_cat_bottom_margin:'.bstone_get_option( 'sh_pl_sty_cat_bottom_margin' ), 'sh_pl_sty_cat_left_margin:'.bstone_get_option( 'sh_pl_sty_cat_left_margin' ), 'sh_pl_sty_cat_right_margin:'.bstone_get_option( 'sh_pl_sty_cat_right_margin' ),
	'sh_pl_sty_cat_tablet_top_margin:', 'sh_pl_sty_cat_tablet_bottom_margin:', 'sh_pl_sty_cat_tablet_left_margin:', 'sh_pl_sty_cat_tablet_right_margin:',
	'sh_pl_sty_cat_mobile_top_margin:', 'sh_pl_sty_cat_mobile_bottom_margin:', 'sh_pl_sty_cat_mobile_left_margin:', 'sh_pl_sty_cat_mobile_right_margin:',
);	
foreach($shop_item_cat_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cat_margin]', array(
			'section'  => 'sc_s_pl_s_cat',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cat_mobile_left_margin]',
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
 * Section: Shop Styles Tab - Price
 **********************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_price',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Price', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_price',
			'priority' => 30,
		)
	)
);

/**
 * Option: Shop Product Price Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_price_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_color]', array(
			'section'  => 'sc_s_pl_s_price',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Price Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_price_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_price',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Price Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_price_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_price',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_family]',
		)
	)
);

/**
 * Option: Shop Product Price Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_price_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_price',
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
 * Option: Shop Product Price Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_price_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_price',
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
 * Option: Shop Product Price Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_price_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_price',
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
 * Option: Shop Product Price Margin
 */

$shop_item_price_margin = array(
	'sh_pl_sty_price_top_margin:'.bstone_get_option( 'sh_pl_sty_price_top_margin' ), 'sh_pl_sty_price_bottom_margin:'.bstone_get_option( 'sh_pl_sty_price_bottom_margin' ), 'sh_pl_sty_price_left_margin:'.bstone_get_option( 'sh_pl_sty_price_left_margin' ), 'sh_pl_sty_price_right_margin:'.bstone_get_option( 'sh_pl_sty_price_right_margin' ),
	'sh_pl_sty_price_tablet_top_margin:', 'sh_pl_sty_price_tablet_bottom_margin:', 'sh_pl_sty_price_tablet_left_margin:', 'sh_pl_sty_price_tablet_right_margin:',
	'sh_pl_sty_price_mobile_top_margin:', 'sh_pl_sty_price_mobile_bottom_margin:', 'sh_pl_sty_price_mobile_left_margin:', 'sh_pl_sty_price_mobile_right_margin:',
);	
foreach($shop_item_price_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_price_margin]', array(
			'section'  => 'sc_s_pl_s_price',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_price_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***************************************
 * Section: Shop Styles Tab - Sale Price
 ***************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_sale_price',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Sale Price', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_sale_price',
			'priority' => 35,
		)
	)
);

/**
 * Option: Shop Product Sale Price Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_price_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_color]', array(
			'section'  => 'sc_s_pl_s_sale_price',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Sale Price Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_price_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_sale_price',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Sale Price Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_price_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_sale_price',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_family]',
		)
	)
);

/**
 * Option: Shop Product Sale Price Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_price_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_sale_price',
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
 * Option: Shop Product Sale Price Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_price_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_sale_price',
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
 * Option: Shop Product Sale Price Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_price_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_sale_price',
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
 * Option: Shop Product Sale Price Margin
 */

$shop_item_sale_price_margin = array(
	'sh_pl_sty_sale_price_top_margin:'.bstone_get_option( 'sh_pl_sty_sale_price_top_margin' ), 'sh_pl_sty_sale_price_bottom_margin:'.bstone_get_option( 'sh_pl_sty_sale_price_bottom_margin' ), 'sh_pl_sty_sale_price_left_margin:'.bstone_get_option( 'sh_pl_sty_sale_price_left_margin' ), 'sh_pl_sty_sale_price_right_margin:'.bstone_get_option( 'sh_pl_sty_sale_price_right_margin' ),
	'sh_pl_sty_sale_price_tablet_top_margin:', 'sh_pl_sty_sale_price_tablet_bottom_margin:', 'sh_pl_sty_sale_price_tablet_left_margin:', 'sh_pl_sty_sale_price_tablet_right_margin:',
	'sh_pl_sty_sale_price_mobile_top_margin:', 'sh_pl_sty_sale_price_mobile_bottom_margin:', 'sh_pl_sty_sale_price_mobile_left_margin:', 'sh_pl_sty_sale_price_mobile_right_margin:',
);	
foreach($shop_item_sale_price_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_price_margin]', array(
			'section'  => 'sc_s_pl_s_sale_price',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_price_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***********************************
 * Section: Shop Styles Tab - Rating
 ***********************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_rating',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Rating', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_rating',
			'priority' => 40,
		)
	)
);

// Option: Shop Product Rating Star Size
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_star_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_rating_star_size' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_star_size]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_rating',
		'priority'    => 5,
		'label'       => __( 'Size', 'bstone' ),
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 50,
		),
	)
);

/**
 * Option: Shop Product Rating Star Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_star_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_rating_star_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_star_color]', array(
			'section'  => 'sc_s_pl_s_rating',
			'priority' => 10,
			'label'    => __( 'Star color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Rating Active Star Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_active_star_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_rating_active_star_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_active_star_color]', array(
			'section'  => 'sc_s_pl_s_rating',
			'priority' => 15,
			'label'    => __( 'Active Star color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Rating Margin
 */

$shop_item_rating_margin = array(
	'sh_pl_sty_rating_top_margin:'.bstone_get_option( 'sh_pl_sty_rating_top_margin' ), 'sh_pl_sty_rating_bottom_margin:'.bstone_get_option( 'sh_pl_sty_rating_bottom_margin' ), 'sh_pl_sty_rating_left_margin:'.bstone_get_option( 'sh_pl_sty_rating_left_margin' ), 'sh_pl_sty_rating_right_margin:'.bstone_get_option( 'sh_pl_sty_rating_right_margin' ),
	'sh_pl_sty_rating_tablet_top_margin:', 'sh_pl_sty_rating_tablet_bottom_margin:', 'sh_pl_sty_rating_tablet_left_margin:', 'sh_pl_sty_rating_tablet_right_margin:',
	'sh_pl_sty_rating_mobile_top_margin:', 'sh_pl_sty_rating_mobile_bottom_margin:', 'sh_pl_sty_rating_mobile_left_margin:', 'sh_pl_sty_rating_mobile_right_margin:',
);	
foreach($shop_item_rating_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_rating_margin]', array(
			'section'  => 'sc_s_pl_s_rating',
			'priority' => 20,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_rating_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***********************************************
 * Section: Shop Styles Tab - Add to Cart Button
 ***********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_cart_btn',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Add to Cart', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_cart_btn',
			'priority' => 45,
		)
	)
);

/**
 * Option: Shop Product Add To Cart Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_txt_color]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Add To Cart Hover Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_txt_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_txt_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_txt_color_hovr]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 10,
			'label'    => __( 'Hover Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Add To Cart Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_bg_color]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 15,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Add To Cart Hover Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_bg_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_bg_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_bg_color_hovr]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 20,
			'label'    => __( 'Hover Background', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Add To Cart Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_color]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Add To Cart Hover Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_brdr_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_color_hovr]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 30,
			'label'    => __( 'Hover Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Add To Cart Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_cart_btn',
		'priority'    => 35,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Shop Product Add To Cart Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_cart_btn',
		'priority'    => 40,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_cart_btn',
            'priority' => 43,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Add To Cart Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_cart_btn',
			'priority'    => 45,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Add To Cart Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_cart_btn',
			'priority'    => 50,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_family]',
		)
	)
);

/**
 * Option: Shop Product Add To Cart Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_cart_btn',
		'priority' => 55,
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
 * Option: Shop Product Add To Cart Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_cart_btn',
		'priority' => 60,
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
 * Option: Shop Product Add To Cart Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_cart_btn_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_cart_btn',
			'priority'    => 65,
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_cart_btn',
            'priority' => 68,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Add To Cart Padding
 */

$shop_item_add_cart_btn_padding = array(
	'sh_pl_sty_cart_btn_top_padding:'.bstone_get_option( 'sh_pl_sty_cart_btn_top_padding' ), 'sh_pl_sty_cart_btn_bottom_padding:'.bstone_get_option( 'sh_pl_sty_cart_btn_bottom_padding' ), 'sh_pl_sty_cart_btn_left_padding:'.bstone_get_option( 'sh_pl_sty_cart_btn_left_padding' ), 'sh_pl_sty_cart_btn_right_padding:'.bstone_get_option( 'sh_pl_sty_cart_btn_right_padding' ),
	'sh_pl_sty_cart_btn_tablet_top_padding:', 'sh_pl_sty_cart_btn_tablet_bottom_padding:', 'sh_pl_sty_cart_btn_tablet_left_padding:', 'sh_pl_sty_cart_btn_tablet_right_padding:',
	'sh_pl_sty_cart_btn_mobile_top_padding:', 'sh_pl_sty_cart_btn_mobile_bottom_padding:', 'sh_pl_sty_cart_btn_mobile_left_padding:', 'sh_pl_sty_cart_btn_mobile_right_padding:',
);	
foreach($shop_item_add_cart_btn_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_padding]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 70,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_left_padding]',
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
 * Option: Shop Product Add To Cart Margin
 */

$shop_item_add_cart_btn_margin = array(
	'sh_pl_sty_cart_btn_top_margin:'.bstone_get_option( 'sh_pl_sty_cart_btn_top_margin' ), 'sh_pl_sty_cart_btn_bottom_margin:'.bstone_get_option( 'sh_pl_sty_cart_btn_bottom_margin' ), 'sh_pl_sty_cart_btn_left_margin:'.bstone_get_option( 'sh_pl_sty_cart_btn_left_margin' ), 'sh_pl_sty_cart_btn_right_margin:'.bstone_get_option( 'sh_pl_sty_cart_btn_right_margin' ),
	'sh_pl_sty_cart_btn_tablet_top_margin:', 'sh_pl_sty_cart_btn_tablet_bottom_margin:', 'sh_pl_sty_cart_btn_tablet_left_margin:', 'sh_pl_sty_cart_btn_tablet_right_margin:',
	'sh_pl_sty_cart_btn_mobile_top_margin:', 'sh_pl_sty_cart_btn_mobile_bottom_margin:', 'sh_pl_sty_cart_btn_mobile_left_margin:', 'sh_pl_sty_cart_btn_mobile_right_margin:',
);	
foreach($shop_item_add_cart_btn_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_cart_btn_margin]', array(
			'section'  => 'sc_s_pl_s_cart_btn',
			'priority' => 75,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_cart_btn_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***************************************
 * Section: Shop Styles Tab - Sale Badge
 ***************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_sale_bdg',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Sale Badge', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_sale_bdg',
			'priority' => 50,
		)
	)
);

/**
 * Option: Shop Product Sale Badge Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_txt_color]', array(
			'section'  => 'sc_s_pl_s_sale_bdg',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Sale Badge Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_bg_color]', array(
			'section'  => 'sc_s_pl_s_sale_bdg',
			'priority' => 15,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Sale Badge Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_brdr_color]', array(
			'section'  => 'sc_s_pl_s_sale_bdg',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Sale Badge Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_sale_bdg',
		'priority'    => 35,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Shop Product Sale Badge Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_sale_bdg',
		'priority'    => 40,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_text_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_sale_bdg',
            'priority' => 43,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Sale Badge Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_sale_bdg',
			'priority'    => 45,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Sale Badge Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_sale_bdg',
			'priority'    => 50,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_family]',
		)
	)
);

/**
 * Option: Shop Product Sale Badge Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_sale_bdg',
		'priority' => 55,
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
 * Option: Shop Product Sale Badge Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_sale_bdg',
		'priority' => 60,
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
 * Option: Shop Product Sale Badge Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_sale_bdg',
			'priority'    => 65,
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_sale_bdg',
            'priority' => 68,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Sale Badge Position
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_position]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_position' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_position]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_sale_bdg',
		'priority' => 70,
		'label'    => __( 'Position', 'bstone' ),
		'choices'  => array(
			'pos-top-right'     => __( 'Top Right', 'bstone' ),
			'pos-top-left'      => __( 'Top Left', 'bstone' ),
			'pos-top-center'    => __( 'Top Center', 'bstone' ),
			'pos-bottom-right'  => __( 'Bottom Right', 'bstone' ),
			'pos-bottom-left'   => __( 'Bottom Left', 'bstone' ),
			'pos-bottom-center' => __( 'Bottom Center', 'bstone' ),
		),
	)
);

/**
 * Option: Shop Product Sale Badge Position X
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_position_x]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_position_x' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_position_x]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_sale_bdg',
		'priority'    => 75,
		'label'       => __( 'Position X', 'bstone' ),
		'input_attrs' => array(
			'min'  => -500,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Product Sale Badge Position Y
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_position_y]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_sale_bdg_position_y' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_position_y]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_sale_bdg',
		'priority'    => 80,
		'label'       => __( 'Position Y', 'bstone' ),
		'input_attrs' => array(
			'min'  => -500,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Product Sale Badge Padding
 */

$shop_item_sale_badge_padding = array(
	'sh_pl_sty_sale_bdg_top_padding:'.bstone_get_option( 'sh_pl_sty_sale_bdg_top_padding' ), 'sh_pl_sty_sale_bdg_bottom_padding:'.bstone_get_option( 'sh_pl_sty_sale_bdg_bottom_padding' ), 'sh_pl_sty_sale_bdg_left_padding:'.bstone_get_option( 'sh_pl_sty_sale_bdg_left_padding' ), 'sh_pl_sty_sale_bdg_right_padding:'.bstone_get_option( 'sh_pl_sty_sale_bdg_right_padding' ),
	'sh_pl_sty_sale_bdg_tablet_top_padding:', 'sh_pl_sty_sale_bdg_tablet_bottom_padding:', 'sh_pl_sty_sale_bdg_tablet_left_padding:', 'sh_pl_sty_sale_bdg_tablet_right_padding:',
	'sh_pl_sty_sale_bdg_mobile_top_padding:', 'sh_pl_sty_sale_bdg_mobile_bottom_padding:', 'sh_pl_sty_sale_bdg_mobile_left_padding:', 'sh_pl_sty_sale_bdg_mobile_right_padding:',
);	
foreach($shop_item_sale_badge_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_padding]', array(
			'section'  => 'sc_s_pl_s_sale_bdg',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_left_padding]',
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
 * Option: Shop Product Sale Badge Margin
 */

$shop_item_sale_badge_margin = array(
	'sh_pl_sty_sale_bdg_top_margin:'.bstone_get_option( 'sh_pl_sty_sale_bdg_top_margin' ), 'sh_pl_sty_sale_bdg_bottom_margin:'.bstone_get_option( 'sh_pl_sty_sale_bdg_bottom_margin' ), 'sh_pl_sty_sale_bdg_left_margin:'.bstone_get_option( 'sh_pl_sty_sale_bdg_left_margin' ), 'sh_pl_sty_sale_bdg_right_margin:'.bstone_get_option( 'sh_pl_sty_sale_bdg_right_margin' ),
	'sh_pl_sty_sale_bdg_tablet_top_margin:', 'sh_pl_sty_sale_bdg_tablet_bottom_margin:', 'sh_pl_sty_sale_bdg_tablet_left_margin:', 'sh_pl_sty_sale_bdg_tablet_right_margin:',
	'sh_pl_sty_sale_bdg_mobile_top_margin:', 'sh_pl_sty_sale_bdg_mobile_bottom_margin:', 'sh_pl_sty_sale_bdg_mobile_left_margin:', 'sh_pl_sty_sale_bdg_mobile_right_margin:',
);	
foreach($shop_item_sale_badge_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_sale_bdg_margin]', array(
			'section'  => 'sc_s_pl_s_sale_bdg',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_sale_bdg_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***********************************************
 * Section: Shop Styles Tab - Out of Stock Badge
 ***********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pl_s_out_stok',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Out of Stock Badge', 'bstone' ),
			'sc_reset' => 'sh_pl_sty_out_stok',
			'priority' => 55,
		)
	)
);

/**
 * Option: Shop Product Out of Stock Badge Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_txt_color]', array(
			'section'  => 'sc_s_pl_s_out_stok',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Out of Stock Badge Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_bg_color]', array(
			'section'  => 'sc_s_pl_s_out_stok',
			'priority' => 15,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Out of Stock Badge Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_brdr_color]', array(
			'section'  => 'sc_s_pl_s_out_stok',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Out of Stock Badge Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_out_stok',
		'priority'    => 35,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Shop Product Out of Stock Badge Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_out_stok',
		'priority'    => 40,
		'label'       => __( 'Border Radius', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_text_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_out_stok',
            'priority' => 43,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Out of Stock Badge Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_family]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_out_stok',
			'priority'    => 45,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Out of Stock Badge Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pl_s_out_stok',
			'priority'    => 50,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_family]',
		)
	)
);

/**
 * Option: Shop Product Out of Stock Badge Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_out_stok',
		'priority' => 55,
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
 * Option: Shop Product Out of Stock Badge Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_text_style]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_out_stok',
		'priority' => 60,
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
 * Option: Shop Product Out of Stock Badge Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_size]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_s_out_stok',
			'priority'    => 65,
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pl_s_out_stok',
            'priority' => 70,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Out of Stock Badge Position
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_position]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_position' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_position]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_s_out_stok',
		'priority' => 75,
		'label'    => __( 'Position', 'bstone' ),
		'choices'  => array(
			'pos-top-right'     => __( 'Top Right', 'bstone' ),
			'pos-top-left'      => __( 'Top Left', 'bstone' ),
			'pos-top-center'    => __( 'Top Center', 'bstone' ),
			'pos-bottom-right'  => __( 'Bottom Right', 'bstone' ),
			'pos-bottom-left'   => __( 'Bottom Left', 'bstone' ),
			'pos-bottom-center' => __( 'Bottom Center', 'bstone' ),
		),
	)
);

/**
 * Option: Shop Product Out of Stock Badge Position X
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_position_x]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_position_x' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_position_x]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_out_stok',
		'priority'    => 80,
		'label'       => __( 'Position X', 'bstone' ),
		'input_attrs' => array(
			'min'  => -500,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Product Out of Stock Badge Position Y
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_position_y]', array(
		'default'           => bstone_get_option( 'sh_pl_sty_out_stok_position_y' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_position_y]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_s_out_stok',
		'priority'    => 85,
		'label'       => __( 'Position Y', 'bstone' ),
		'input_attrs' => array(
			'min'  => -500,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Product Out of Stock Badge Padding
 */

$shop_item_out_stok_padding = array(
	'sh_pl_sty_out_stok_top_padding:'.bstone_get_option( 'sh_pl_sty_out_stok_top_padding' ), 'sh_pl_sty_out_stok_bottom_padding:'.bstone_get_option( 'sh_pl_sty_out_stok_bottom_padding' ), 'sh_pl_sty_out_stok_left_padding:'.bstone_get_option( 'sh_pl_sty_out_stok_left_padding' ), 'sh_pl_sty_out_stok_right_padding:'.bstone_get_option( 'sh_pl_sty_out_stok_right_padding' ),
	'sh_pl_sty_out_stok_tablet_top_padding:', 'sh_pl_sty_out_stok_tablet_bottom_padding:', 'sh_pl_sty_out_stok_tablet_left_padding:', 'sh_pl_sty_out_stok_tablet_right_padding:',
	'sh_pl_sty_out_stok_mobile_top_padding:', 'sh_pl_sty_out_stok_mobile_bottom_padding:', 'sh_pl_sty_out_stok_mobile_left_padding:', 'sh_pl_sty_out_stok_mobile_right_padding:',
);	
foreach($shop_item_out_stok_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_padding]', array(
			'section'  => 'sc_s_pl_s_out_stok',
			'priority' => 90,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_left_padding]',
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
 * Option: Shop Product Out of Stock Badge Margin
 */

$shop_item_out_stok_margin = array(
	'sh_pl_sty_out_stok_top_margin:'.bstone_get_option( 'sh_pl_sty_out_stok_top_margin' ), 'sh_pl_sty_out_stok_bottom_margin:'.bstone_get_option( 'sh_pl_sty_out_stok_bottom_margin' ), 'sh_pl_sty_out_stok_left_margin:'.bstone_get_option( 'sh_pl_sty_out_stok_left_margin' ), 'sh_pl_sty_out_stok_right_margin:'.bstone_get_option( 'sh_pl_sty_out_stok_right_margin' ),
	'sh_pl_sty_out_stok_tablet_top_margin:', 'sh_pl_sty_out_stok_tablet_bottom_margin:', 'sh_pl_sty_out_stok_tablet_left_margin:', 'sh_pl_sty_out_stok_tablet_right_margin:',
	'sh_pl_sty_out_stok_mobile_top_margin:', 'sh_pl_sty_out_stok_mobile_bottom_margin:', 'sh_pl_sty_out_stok_mobile_left_margin:', 'sh_pl_sty_out_stok_mobile_right_margin:',
);	
foreach($shop_item_out_stok_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_sty_out_stok_margin]', array(
			'section'  => 'sc_s_pl_s_out_stok',
			'priority' => 95,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pl_sty_out_stok_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);