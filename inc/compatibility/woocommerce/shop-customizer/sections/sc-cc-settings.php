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

// Section: Settings Tab
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize,
		'sc_s_cc_settings',
		array(
			'sc_belong' => 'sc_s_cc_dialog',
			'sc_tab' => array(
				'id' => 'sh_cc_set',
				'text' => __( 'Settings', 'bstone' ),
			),
			'sc_child' => false,
			'priority' => 0,
		)
	)
);

// Option: Enable Cart Cross-Sells
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_cc_set_enable_cart_cross_sells]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_cc_set_enable_cart_cross_sells' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_cc_set_enable_cart_cross_sells]',
		array(
			'section' => 'sc_s_cc_settings',
			'column'  => 'sc-col-6',
            'priority' => 5,
			'label' => __( 'Enable Cross-Sells', 'bstone' ),
		)
	)
);

// Option: Cart Page Title Section
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_cc_set_cart_title_section]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_cc_set_cart_title_section' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_cc_set_cart_title_section]',
		array(
			'section' => 'sc_s_cc_settings',
			'column'  => 'sc-col-6',
            'priority' => 10,
			'label' => __( 'Cart Title Section', 'bstone' ),
		)
	)
);

// Option: Checkout Page Title Section
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_cc_set_checkout_title_section]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_cc_set_checkout_title_section' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_cc_set_checkout_title_section]',
		array(
			'section' => 'sc_s_cc_settings',
			'column'  => 'sc-col-6',
            'priority' => 15,
			'label' => __( 'Checkout Title Section', 'bstone' ),
		)
	)
);

// Option: Account Page Title Section
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_cc_set_account_title_section]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_cc_set_account_title_section' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_cc_set_account_title_section]',
		array(
			'section' => 'sc_s_cc_settings',
			'column'  => 'sc-col-6',
            'priority' => 20,
			'label' => __( 'Account Title Section', 'bstone' ),
		)
	)
);

// Option: Cart Cross-Sells Full Width
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_cc_set_cross_sells_full_width]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_cc_set_cross_sells_full_width' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_cc_set_cross_sells_full_width]',
		array(
			'section' => 'sc_s_cc_settings',
			'column'  => 'sc-col-6',
            'priority' => 25,
			'label' => __( 'Cross-Sells Full Width', 'bstone' ),
		)
	)
);

/**
 * Option: Cart & Checkout Cross-Sells Number of Products
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_cc_set_cross_sells_num]', array(
		'default'           => bstone_get_option( 'sh_cc_set_cross_sells_num' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_cc_set_cross_sells_num]', array(
		'type'        => 'number',
		'section'     => 'sc_s_cc_settings',
		'priority'    => 30,
		'label'       => __( 'Cross-Sells Number of Columns', 'bstone' ),
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 6,
		),
	)
);