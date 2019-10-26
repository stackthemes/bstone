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
		'sc_s_pl_settings',
		array(
			'sc_belong' => 'sc_s_pl_dialog',
			'sc_tab' => array(
				'id' => 'sh_pl_set',
				'text' => __( 'Settings', 'bstone' ),
			),
			'sc_child' => false,
			'priority' => 0,
		)
	)
);

/**
 * Option: Shop Container
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_woo_shop_layout]', array(
		'default'           => bstone_get_option( 'sh_pl_set_woo_shop_layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_woo_shop_layout]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_settings',
		'priority' => 5,
		'label'    => __( 'Container', 'bstone' ),
		'choices'  => array(
			'default'                 => __( 'Default', 'bstone' ),
			'boxed-container'         => __( 'Boxed', 'bstone' ),
			'separate-container' 	  => __( 'Separate', 'bstone' ),
			'plain-container'         => __( 'Full Width / Contained', 'bstone' ),
			'page-builder'            => __( 'Full Width / Stretched', 'bstone' ),
		),
	)
);

/**
 * Option: Shop Side Bar
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_woo_sidebar_layout]', array(
		'default'           => bstone_get_option( 'sh_pl_set_woo_sidebar_layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_woo_sidebar_layout]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_settings',
		'priority' => 10,
		'label'    => __( 'Sidebar', 'bstone' ),
		'choices'  => array(
			'default'       => __( 'Default', 'bstone' ),
			'no-sidebar'    => __( 'No Sidebar', 'bstone' ),
			'left-sidebar'  => __( 'Left Sidebar', 'bstone' ),
			'right-sidebar' => __( 'Right Sidebar', 'bstone' ),
			'both-sidebars' => __( 'Both Sidebars', 'bstone' ),
		),
	)
);

/**
 * Option: Item Hover Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_hover_style]', array(
		'default'           => bstone_get_option( 'sh_pl_set_shop_hover_style' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_hover_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pl_settings',
		'priority' => 15,
		'label'    => __( 'Item Hover Style', 'bstone' ),
		'choices'  => array(
			'none'      => __( 'None', 'bstone' ),
			'alternate' => __( 'Alternate', 'bstone' ),
			'zoom'  	=> __( 'Zoom', 'bstone' ),
		),
	)
);

/**
 * Option: Shop Product Info Structure
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_item_structure]', array(
		'default'           => bstone_get_option( 'sh_pl_set_shop_item_structure' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Sortable(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_item_structure]', array(
			'type'     => 'bst-sortable',
			'section'  => 'sc_s_pl_settings',
			'priority' => 20,
			'label'    => __( 'Shop Product Structure', 'bstone' ),
			'choices'  => array(
				'title'      => __( 'Title', 'bstone' ),
				'price'      => __( 'Price', 'bstone' ),
				'ratings'    => __( 'Ratings', 'bstone' ),
				'short_desc' => __( 'Short Description', 'bstone' ),
				'add_cart'   => __( 'Add To Cart', 'bstone' ),
				'category'   => __( 'Category', 'bstone' ),
			),
		)
	)
);

// Option: Align Product Info.
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_content_align]', array(
		'type' => 'option',
		'default'   => bstone_get_option( 'sh_pl_set_shop_content_align' ),
		'transport' => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	new SC_Radio_Control(
		$wp_customize,
		BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_content_align]',
		array(
			'section' => 'sc_s_pl_settings',
			'priority' => 25,
			'column'  => 'sc-col-5',
			'label'  => __( 'Align Product Info', 'bstone' ),
			'input_type'  => 'icon',
			'choices' => array(
				'left' => 'sc-left',
				'center' => 'sc-center',
				'right' => 'sc-right',
				'' => 'sc-close',
			),
		)
	)
);

// Option: Shop Columns.
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_grids]', array(
		'default'           => bstone_get_option( 'sh_pl_set_shop_grids' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_slider' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_grids]', array(
			'type'        => 'bst-responsive-slider',
			'section'     => 'sc_s_pl_settings',
			'priority'    => 30,
			'label'       => __( 'Shop Columns', 'bstone' ),
			'input_attrs' => array(
				'step' => 1,
				'min'  => 1,
				'max'  => 6,
			),
		)
	)
);

// Option: Products Per Page.
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_num_of_products]', array(
		'default'           => bstone_get_option( 'sh_pl_set_num_of_products' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_num_of_products]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pl_settings',
		'priority'    => 35,
		'label'       => __( 'Products Per Page', 'bstone' ),
		'input_attrs' => array(
			'min'  => 1,
			'step' => 1,
			'max'  => 50,
		),
	)
);

// Option: Horizontal Space
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_horizontal_space]', array(
		'default'			=> bstone_get_option( 'sh_pl_set_shop_horizontal_space' ),
		'type'				=> 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_horizontal_space]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_settings',
			'priority'    => 40,
			'label'       => __( 'Horizontal Space', 'bstone' ),
			'input_attrs' => array(
				'step' => 1,
				'min'  => 0,
				'max'  => 500,
			),
			'units'       => array(
				'px' => 'px',
			),
		)
	)
);

// Option: Vertical Space
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_vertical_space]', array(
		'default'           => bstone_get_option( 'sh_pl_set_shop_vertical_space' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_vertical_space]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pl_settings',
			'priority'    => 45,
			'label'       => __( 'Vertical Space', 'bstone' ),
			'input_attrs' => array(
				'step' => 1,
				'min'  => 0,
				'max'  => 500,
			),
			'units'       => array(
				'px' => 'px',
			),
		)
	)
);

// Option: Shop Title Section
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_title_section]', array(
		'type' 				=> 'option',
		'default' 			=> bstone_get_option( 'sh_pl_set_shop_title_section' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_title_section]',
		array(
			'section' => 'sc_s_pl_settings',
			'column'  => 'sc-col-6',
            'priority' => 50,
			'label' => __( 'Shop Title Section', 'bstone' ),
		)
	)
);

// Option: Shop Taxonomy Title Section
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pl_set_taxonomy_title_section]', array(
		'type' 				=> 'option',
		'default' 			=> bstone_get_option( 'sh_pl_set_taxonomy_title_section' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pl_set_taxonomy_title_section]',
		array(
			'section' => 'sc_s_pl_settings',
			'column'  => 'sc-col-6',
            'priority' => 55,
			'label' => __( 'Taxonomy Title Section', 'bstone' ),
		)
	)
);

// Option: Shop Filter
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_filter]', array(
		'type' 				=> 'option',
		'default' 			=> bstone_get_option( 'sh_pl_set_shop_filter' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pl_set_shop_filter]',
		array(
			'section' => 'sc_s_pl_settings',
			'column'  => 'sc-col-6',
            'priority' => 60,
			'label' => __( 'Shop Filter', 'bstone' ),
		)
	)
);