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

$bst_sc_svg_icons_url = BSTONE_THEME_URI. 'inc/compatibility/woocommerce/shop-customizer/assets/icons/';

// Section: Settings Tab
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize,
		'sc_s_pp_settings',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_set',
				'text' => __( 'Settings', 'bstone' ),
			),
			'sc_child' => false,
			'priority' => 0,
		)
	)
);

// product Page Layout.
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_set_woo_product_layout]', array(
		'type'              => 'option',
		'default'           => bstone_get_option( 'sh_pp_set_woo_product_layout' ),
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	new SC_Radio_Control(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_set_woo_product_layout]',
		array(
			'label'      => __( 'Layout', 'bstone' ),
			'section'    => 'sc_s_pp_settings',
			'column'     => 'sc-col-12',
			'input_type' => 'image',
			'choices'    => array(
				1  => $bst_sc_svg_icons_url . 'sc-layout-1.svg',
				3  => $bst_sc_svg_icons_url . 'sc-layout-3.svg',
				4  => $bst_sc_svg_icons_url . 'sc-layout-4.svg',
				5  => $bst_sc_svg_icons_url . 'sc-layout-7.svg',
			),
		)
	)
);

/**
 * Option: Product Single Container
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_set_woo_single_layout]', array(
		'default'           => bstone_get_option( 'sh_pp_set_woo_single_layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_set_woo_single_layout]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_settings',
		'priority' => 10,
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
 * Option: Product Single Side Bar
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_set_woo_single_sidebar_layout]', array(
		'default'           => bstone_get_option( 'sh_pp_set_woo_single_sidebar_layout' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_set_woo_single_sidebar_layout]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_settings',
		'priority' => 15,
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
 * Option: Single Product Info Structure
 */
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_product_main_structure]', array(
        'default'           => bstone_get_option( 'sh_pp_set_product_main_structure' ),
        'type'              => 'option',
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
    )
);
$wp_customize->add_control(
    new Bstone_Control_Sortable(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_set_product_main_structure]', array(
            'type'     => 'bst-sortable',
            'section'  => 'sc_s_pp_settings',
            'priority' => 20,
            'label'    => __( 'Product Structure', 'bstone' ),
            'choices'  => array(
                'title'      => __( 'Title', 'bstone' ),
                'ratings'    => __( 'Ratings', 'bstone' ),
                'price'      => __( 'Price', 'bstone' ),
                'short_desc' => __( 'Short Description', 'bstone' ),
                'quantity'   => __( 'Quantity', 'bstone' ),
                'add_cart'   => __( 'Add To Cart', 'bstone' ),
                'meta'       => __( 'Meta', 'bstone' ),
            ),
        )
    )
);

// Option: Single Product Category
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_category]', array(
		'type' 				=> 'option',
		'transport'         => 'postMessage',
		'default' 		    => bstone_get_option( 'sh_pp_set_single_product_category' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_category]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 25,
			'label' => __( 'Category', 'bstone' ),
		)
	)
);

// Option: Single Product Tags
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_tags]', array(
		'type' 				=> 'option',
		'transport'         => 'postMessage',
		'default' 		    => bstone_get_option( 'sh_pp_set_single_product_tags' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_tags]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 30,
			'label' => __( 'Tags', 'bstone' ),
		)
	)
);

// Option: Single Product SKU
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_sku]', array(
		'type' 				=> 'option',
		'transport'         => 'postMessage',
		'default' 		    => bstone_get_option( 'sh_pp_set_single_product_sku' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_sku]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 35,
			'label' => __( 'SKU', 'bstone' ),
		)
	)
);

/**
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_set_product_single_meta_devider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_settings',
            'priority' => 40,
            'settings' => array(),
        )
    )
);

// Option: Single Product Title Area
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_titlearea]', array(
		'type' 				=> 'option',
		'default' 			=> bstone_get_option( 'sh_pp_set_single_product_titlearea' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_titlearea]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 43,
			'label' => __( 'Product Title Section', 'bstone' ),
		)
	)
);

// Option: Single Product Breadcrumb
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_breadcrumb]', array(
		'type' 				=> 'option',
		'transport'         => 'postMessage',
		'default' 			=> bstone_get_option( 'sh_pp_set_single_product_breadcrumb' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_single_product_breadcrumb]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 45,
			'label' => __( 'Product Breadcrumb', 'bstone' ),
		)
	)
);

// Option: Single Product Description
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_product_desc]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_product_desc' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_product_desc]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 50,
			'label' => __( 'Description', 'bstone' ),
		)
	)
);

// Option: Single Product Review
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_product_review]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_product_review' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_product_review]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 55,
			'label' => __( 'Review', 'bstone' ),
		)
	)
);

// Option: Single Product Additional Info
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_product_additional_info]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_product_additional_info' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_product_additional_info]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 60,
			'label' => __( 'Additional Info', 'bstone' ),
		)
	)
);

// Option: Single Product Lightbox
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_product_lightbox]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_product_lightbox' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_product_lightbox]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 65,
			'label' => __( 'Product Lightbox', 'bstone' ),
		)
	)
);

// Option: Single Product Zoom
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_product_zoom]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_product_zoom' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_product_zoom]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 70,
			'label' => __( 'Product Zoom', 'bstone' ),
		)
	)
);

// Option: Single Product Related Products
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_related_products]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_related_products' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_related_products]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 75,
			'label' => __( 'Related Products', 'bstone' ),
		)
	)
);

// Option: Single Product Upsells
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_set_upsells_products]', array(
		'type' => 'option',
		'default' => bstone_get_option( 'sh_pp_set_upsells_products' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_set_upsells_products]',
		array(
			'section' => 'sc_s_pp_settings',
			'column'  => 'sc-col-6',
            'priority' => 80,
			'label' => __( 'Upsells', 'bstone' ),
		)
	)
);