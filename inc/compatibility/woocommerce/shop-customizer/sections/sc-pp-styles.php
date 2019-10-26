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

/************************************************
 * Section: Single Product Styles Tab - Container
 ************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_page_layout',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Main Container', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_playout',
			'priority' => 5,
		)
	)
);

/**
 * Option: Product Page Container
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_playout_content_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_playout_content_width' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_playout_content_width]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_page_layout',
		'priority' => 5,
		'label'    => __( 'Product Content Width', 'bstone' ),
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
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_playout_content_width_custom]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_playout_content_width_custom' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_playout_content_width_custom]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_pp_s_page_layout',
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

/**
 * Option: Single Product Container Padding
 */

$sh_pp_sty_playout_padding = array(
	'sh_pp_sty_playout_top_padding:'.bstone_get_option( 'sh_pp_sty_playout_top_padding' ), 'sh_pp_sty_playout_bottom_padding:'.bstone_get_option( 'sh_pp_sty_playout_bottom_padding' ), 'sh_pp_sty_playout_left_padding:'.bstone_get_option( 'sh_pp_sty_playout_left_padding' ), 'sh_pp_sty_playout_right_padding:'.bstone_get_option( 'sh_pp_sty_playout_right_padding' ),
	'sh_pp_sty_playout_tablet_top_padding:', 'sh_pp_sty_playout_tablet_bottom_padding:', 'sh_pp_sty_playout_tablet_left_padding:', 'sh_pp_sty_playout_tablet_right_padding:',
	'sh_pp_sty_playout_mobile_top_padding:', 'sh_pp_sty_playout_mobile_bottom_padding:', 'sh_pp_sty_playout_mobile_left_padding:', 'sh_pp_sty_playout_mobile_right_padding:',
);	
foreach($sh_pp_sty_playout_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_playout_padding]', array(
			'section'  => 'sc_s_pp_s_page_layout',
			'priority' => 10,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_playout_mobile_left_padding]',
			),
			'input_attrs' 			=> array(
				'min'   => 0,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/********************************************
 * Section: Single Product Styles Tab - Image
 ********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_image',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Image', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_img',
			'priority' => 10,
		)
	)
);

// Option: Single Product Custom Image Size Toggle
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_custom_size_toggle]', array(
		'type' 				=> 'option',
		'default' 		    => bstone_get_option( 'sh_pp_sty_img_custom_size_toggle' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_custom_size_toggle]',
		array(
			'section' => 'sc_s_pp_s_image',
			'column'  => 'sc-col-6',
            'priority' => 4,
			'label' => __( 'Custom Image Size', 'bstone' ),
		)
	)
);

// Option: Single Product Custom Image Size
$product_c_img_size = get_intermediate_image_sizes();

$bstone_product_img_c_image_sizes = array();

foreach ( $product_c_img_size as $size ) {
	$size_name = str_replace( "_", " ", $size );
	$size_name = str_replace( "-", " ", $size_name );
	$size_name = str_replace( ".", " ", $size_name );
	$size_name = ucwords( $size_name );
	$bstone_product_img_c_image_sizes[ $size ] = $size_name;
}

$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_custom_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_img_custom_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_custom_size]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_image',
		'priority' => 4,
		'label'    => __( 'Image Size', 'bstone' ),
		'choices'  => $bstone_product_img_c_image_sizes,
	)
);



// Option: Single Product Gallery Nav Toggle
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_gallery_nav]', array(
		'type' 				=> 'option',
		'default' 		    => bstone_get_option( 'sh_pp_sty_img_gallery_nav' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_gallery_nav]',
		array(
			'section' => 'sc_s_pp_s_image',
			'column'  => 'sc-col-6',
            'priority' => 7,
			'label' => __( 'Gallery Direction Nav', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Gallery Nav Toggle Spacing From Top
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_gnav_top]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_img_gnav_top' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_gnav_top]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_image',
		'priority'    => 7,
		'label'       => __( 'Gallery Nav Spacing From Top %', 'bstone' ),
		'input_attrs' => array(
			'min'  => -100,
			'step' => 0.1,
			'max'  => 100,
		),
	)
);

// Option: Single Product Gallery Thumbnail Orientation 
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_orientation]', array(
		'type' => 'option',
		'default'   => bstone_get_option( 'sh_pp_sty_img_orientation' ),
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);

$wp_customize->add_control(
	new SC_Radio_Control(
		$wp_customize,
		BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_orientation]',
		array(
			'section' => 'sc_s_pp_s_image',
			'priority' => 10,
			'column'  => 'sc-col-5',
			'label'  => __( 'Gallery Thumbnail Orientation', 'bstone' ),
			'input_type'  => 'icon',
			'choices' => array(
				//'vertical'   => 'sc-thumbnails-vertical',
				'horizontal' => 'sc-thumbnails-horizontal',
				'none'       => 'sc-thumbnails-none',
			),
		)
	)
);

/**
 * Option: Single Product Thumbnails Alignment
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_thumb_alignment]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_img_thumb_alignment' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	new SC_Radio_Control(
		$wp_customize,
		BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_thumb_alignment]',
		array(
			'section' => 'sc_s_pp_s_image',
			'priority' => 13,
			'column'  => 'sc-col-5',
			'label'  => __( 'Thumbnail Alignment', 'bstone' ),
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

/**
 * Option: Single Product Image Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_img_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_bg_color]', array(
			'section'  => 'sc_s_pp_s_image',
			'priority' => 15,
			'label'    => __( 'Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Image Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_border_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_img_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_border_color]', array(
			'section'  => 'sc_s_pp_s_image',
			'priority' => 20,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Image Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_border_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_img_border_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_border_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_image',
		'priority'    => 25,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Single Product Image Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_border_radius]', array(
		'default'           => 0,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_border_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_image',
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
 * Option: Single Product Image Margin
 */
$sh_pp_sty_img_margin = array(
	'sh_pp_sty_img_top_margin:'.bstone_get_option( 'sh_pp_sty_img_top_margin' ), 'sh_pp_sty_img_bottom_margin:'.bstone_get_option( 'sh_pp_sty_img_bottom_margin' ), 'sh_pp_sty_img_left_margin:'.bstone_get_option( 'sh_pp_sty_img_left_margin' ), 'sh_pp_sty_img_right_margin:'.bstone_get_option( 'sh_pp_sty_img_right_margin' ),
	'sh_pp_sty_img_tablet_top_margin:', 'sh_pp_sty_img_tablet_bottom_margin:', 'sh_pp_sty_img_tablet_left_margin:', 'sh_pp_sty_img_tablet_right_margin:',
	'sh_pp_sty_img_mobile_top_margin:', 'sh_pp_sty_img_mobile_bottom_margin:', 'sh_pp_sty_img_mobile_left_margin:', 'sh_pp_sty_img_mobile_right_margin:',
);	
foreach($sh_pp_sty_img_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_img_margin]', array(
			'section'  => 'sc_s_pp_s_image',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_img_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***************************************************
 * Section: Single Product Styles Tab - Image Thumbs
 ***************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_image_thumbs',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Gallery Thumbnails', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_gthumbs',
			'priority' => 13,
		)
	)
);

/**
* Option: Gallery Thumb Width
*/
$wp_customize->add_setting(
   BSTONE_THEME_SETTINGS . '[sh_pp_sty_gthumbs_img_width]', array(
	   'default'           => bstone_get_option( 'sh_pp_sty_gthumbs_img_width' ),
	   'type'              => 'option',
	   'transport'         => 'postMessage',
	   'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
   )
);
$wp_customize->add_control(
   new Bstone_Control_Slider(
	   $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_gthumbs_img_width]', array(
		   'type'        => 'bst-slider',
		   'section'     => 'sc_s_pp_s_image_thumbs',
		   'priority'    => 5,
		   'label'       => __( 'Thumbnail Width', 'bstone' ),
		   'suffix'      => '%',
		   'input_attrs' => array(
			   'min'  => 1,
			   'step' => 0.1,
			   'max'  => 100,
		   ),
	   )
   )
);

/**
 * Option: Gallery Thumbnail Spacing
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_gthumbs_img_spacing]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_gthumbs_img_spacing' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_gthumbs_img_spacing]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_pp_s_image_thumbs',
			'priority'    => 30,
			'label'       => __( 'Thumbnail Spacing', 'bstone' ),
			'suffix'      => 'em',
			'input_attrs' => array(
				'min'  => 0,
				'step' => 0.1,
				'max'  => 10,
			),
		)
	)
);


/********************************************
 * Section: Single Product Styles Tab - Title
 ********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_title',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Title', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_title',
			'priority' => 15,
		)
	)
);

/**
 * Option: Single Product Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_color]', array(
			'section'  => 'sc_s_pp_s_title',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Title Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_title',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_weight]',
		)
	)
);

/**
 * Option: Single Product Title Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_title',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_family]',
		)
	)
);

/**
 * Option: Single Product Title Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_title',
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
 * Option: Single Product Title Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_title',
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
 * Option: Single Product Title Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_title',
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
 * Option: Single Product Title Line Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_line_height]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_title_line_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_line_height]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_pp_s_title',
			'priority'    => 32,
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
 * Option: Single Product Title Margin
 */
$sh_pp_sty_title_margin = array(
	'sh_pp_sty_title_top_margin:'.bstone_get_option( 'sh_pp_sty_title_top_margin' ), 'sh_pp_sty_title_bottom_margin:'.bstone_get_option( 'sh_pp_sty_title_bottom_margin' ), 'sh_pp_sty_title_left_margin:'.bstone_get_option( 'sh_pp_sty_title_left_margin' ), 'sh_pp_sty_title_right_margin:'.bstone_get_option( 'sh_pp_sty_title_right_margin' ),
	'sh_pp_sty_title_tablet_top_margin:', 'sh_pp_sty_title_tablet_bottom_margin:', 'sh_pp_sty_title_tablet_left_margin:', 'sh_pp_sty_title_tablet_right_margin:',
	'sh_pp_sty_title_mobile_top_margin:', 'sh_pp_sty_title_mobile_bottom_margin:', 'sh_pp_sty_title_mobile_left_margin:', 'sh_pp_sty_title_mobile_right_margin:',
);	
foreach($sh_pp_sty_title_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_title_margin]', array(
			'section'  => 'sc_s_pp_s_title',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_title_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/****************************************************
 * Section: Single Product Styles Tab - Regular Price
 ****************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_price',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Regular Price', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_price',
			'priority' => 20,
		)
	)
);

/**
 * Option: Single Product Regular Price Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_price_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_color]', array(
			'section'  => 'sc_s_pp_s_price',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Regular Price Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_price_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_price',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_weight]',
		)
	)
);

/**
 * Option: Single Product Regular Price Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_price_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_price',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_family]',
		)
	)
);

/**
 * Option: Single Product Regular Price Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_price_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_price',
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
 * Option: Single Product Regular Price Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_price_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_price',
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
 * Option: Single Product Regular Price Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_price_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_price',
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
 * Option: Single Product Regular Price Margin
 */
$sh_pp_sty_price_margin = array(
	'sh_pp_sty_price_top_margin:'.bstone_get_option( 'sh_pp_sty_price_top_margin' ), 'sh_pp_sty_price_bottom_margin:'.bstone_get_option( 'sh_pp_sty_price_bottom_margin' ), 'sh_pp_sty_price_left_margin:'.bstone_get_option( 'sh_pp_sty_price_left_margin' ), 'sh_pp_sty_price_right_margin:'.bstone_get_option( 'sh_pp_sty_price_right_margin' ),
	'sh_pp_sty_price_tablet_top_margin:', 'sh_pp_sty_price_tablet_bottom_margin:', 'sh_pp_sty_price_tablet_left_margin:', 'sh_pp_sty_price_tablet_right_margin:',
	'sh_pp_sty_price_mobile_top_margin:', 'sh_pp_sty_price_mobile_bottom_margin:', 'sh_pp_sty_price_mobile_left_margin:', 'sh_pp_sty_price_mobile_right_margin:',
);	
foreach($sh_pp_sty_price_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_price_margin]', array(
			'section'  => 'sc_s_pp_s_price',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_price_mobile_left_margin]',
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
 * Section: Single Product Styles Tab - Sale Price
 *************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_sale_price',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Sale Price', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_sale_price',
			'priority' => 25,
		)
	)
);

/**
 * Option: Single Product Sale Price Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_price_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_color]', array(
			'section'  => 'sc_s_pp_s_sale_price',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Sale Price Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_price_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_sale_price',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_weight]',
		)
	)
);

/**
 * Option: Single Product Sale Price Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_price_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_sale_price',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_family]',
		)
	)
);

/**
 * Option: Single Product Sale Price Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_price_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_sale_price',
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
 * Option: Single Product Sale Price Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_price_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_sale_price',
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
 * Option: Single Product Sale Price Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_price_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_sale_price',
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
 * Option: Single Product Sale Price Margin
 */
$sh_pp_sty_sale_price_margin = array(
	'sh_pp_sty_sale_price_top_margin:'.bstone_get_option( 'sh_pp_sty_sale_price_top_margin' ), 'sh_pp_sty_sale_price_bottom_margin:'.bstone_get_option( 'sh_pp_sty_sale_price_bottom_margin' ), 'sh_pp_sty_sale_price_left_margin:'.bstone_get_option( 'sh_pp_sty_sale_price_left_margin' ), 'sh_pp_sty_sale_price_right_margin:'.bstone_get_option( 'sh_pp_sty_sale_price_right_margin' ),
	'sh_pp_sty_sale_price_tablet_top_margin:', 'sh_pp_sty_sale_price_tablet_bottom_margin:', 'sh_pp_sty_sale_price_tablet_left_margin:', 'sh_pp_sty_sale_price_tablet_right_margin:',
	'sh_pp_sty_sale_price_mobile_top_margin:', 'sh_pp_sty_sale_price_mobile_bottom_margin:', 'sh_pp_sty_sale_price_mobile_left_margin:', 'sh_pp_sty_sale_price_mobile_right_margin:',
);	
foreach($sh_pp_sty_sale_price_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_price_margin]', array(
			'section'  => 'sc_s_pp_s_sale_price',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_price_mobile_left_margin]',
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
 * Section: Single Product Styles Tab - Category
 ***********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_cat',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Category', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_cat',
			'priority' => 30,
		)
	)
);

/**
 * Option: Single Product Category Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_title_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_title_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_title_color]', array(
			'section'  => 'sc_s_pp_s_cat',
			'priority' => 2,
			'label'    => __( 'Label Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Category Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_color]', array(
			'section'  => 'sc_s_pp_s_cat',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Category Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_cat',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_weight]',
		)
	)
);

/**
 * Option: Single Product Category Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_cat',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_family]',
		)
	)
);

/**
 * Option: Single Product Category Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_cat',
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
 * Option: Single Product Category Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_cat',
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
 * Option: Single Product Category Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cat_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_cat',
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
 * Option: Single Product Category Margin
 */
$sh_pp_sty_cat_margin = array(
	'sh_pp_sty_cat_top_margin:'.bstone_get_option( 'sh_pp_sty_cat_top_margin' ), 'sh_pp_sty_cat_bottom_margin:'.bstone_get_option( 'sh_pp_sty_cat_bottom_margin' ), 'sh_pp_sty_cat_left_margin:'.bstone_get_option( 'sh_pp_sty_cat_left_margin' ), 'sh_pp_sty_cat_right_margin:'.bstone_get_option( 'sh_pp_sty_cat_right_margin' ),
	'sh_pp_sty_cat_tablet_top_margin:', 'sh_pp_sty_cat_tablet_bottom_margin:', 'sh_pp_sty_cat_tablet_left_margin:', 'sh_pp_sty_cat_tablet_right_margin:',
	'sh_pp_sty_cat_mobile_top_margin:', 'sh_pp_sty_cat_mobile_bottom_margin:', 'sh_pp_sty_cat_mobile_left_margin:', 'sh_pp_sty_cat_mobile_right_margin:',
);	
foreach($sh_pp_sty_cat_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cat_margin]', array(
			'section'  => 'sc_s_pp_s_cat',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cat_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/*******************************************
 * Section: Single Product Styles Tab - Tags
 *******************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_tags',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Tags', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_tags',
			'priority' => 35,
		)
	)
);

/**
 * Option: Single Product Tags Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_title_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_title_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_title_color]', array(
			'section'  => 'sc_s_pp_s_tags',
			'priority' => 2,
			'label'    => __( 'Label Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tags Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_color]', array(
			'section'  => 'sc_s_pp_s_tags',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tags Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_tags',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_weight]',
		)
	)
);

/**
 * Option: Single Product Tags Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_tags',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_family]',
		)
	)
);

/**
 * Option: Single Product Tags Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_tags',
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
 * Option: Single Product Tags Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_tags',
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
 * Option: Single Product Tags Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tags_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_tags',
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
 * Option: Single Product Tags Margin
 */
$sh_pp_sty_tags_margin = array(
	'sh_pp_sty_tags_top_margin:'.bstone_get_option( 'sh_pp_sty_tags_top_margin' ), 'sh_pp_sty_tags_bottom_margin:'.bstone_get_option( 'sh_pp_sty_tags_bottom_margin' ), 'sh_pp_sty_tags_left_margin:'.bstone_get_option( 'sh_pp_sty_tags_left_margin' ), 'sh_pp_sty_tags_right_margin:'.bstone_get_option( 'sh_pp_sty_tags_right_margin' ),
	'sh_pp_sty_tags_tablet_top_margin:', 'sh_pp_sty_tags_tablet_bottom_margin:', 'sh_pp_sty_tags_tablet_left_margin:', 'sh_pp_sty_tags_tablet_right_margin:',
	'sh_pp_sty_tags_mobile_top_margin:', 'sh_pp_sty_tags_mobile_bottom_margin:', 'sh_pp_sty_tags_mobile_left_margin:', 'sh_pp_sty_tags_mobile_right_margin:',
);	
foreach($sh_pp_sty_tags_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tags_margin]', array(
			'section'  => 'sc_s_pp_s_tags',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tags_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/*********************************************************
 * Section: Single Product Styles Tab - Add to Cart Button
 *********************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_cart_btn',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Add to Cart Button', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_cart_btn',
			'priority' => 40,
		)
	)
);

// Option: Single Product Add To Cart Full Width
$wp_customize->add_setting(
    BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_full_width]', array(
		'type' => 'option',
		'transport' => 'postMessage',
		'default' => bstone_get_option( 'sh_pp_sty_cart_btn_full_width' ),
        'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_toggle' ),
	)
);

$wp_customize->add_control(
	new SC_Toggle_Control(
		$wp_customize,  BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_full_width]',
		array(
			'section' => 'sc_s_pp_s_cart_btn',
			'column'  => 'sc-col-6',
            'priority' => 5,
			'label' => __( 'Full Width', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_txt_color]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Hover Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_txt_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_txt_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_txt_color_hovr]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 15,
			'label'    => __( 'Hover Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_bg_color]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Hover Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_bg_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_bg_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_bg_color_hovr]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 25,
			'label'    => __( 'Hover Background', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_color]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 30,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Hover Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_color_hovr]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_brdr_color_hovr' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_color_hovr]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 35,
			'label'    => __( 'Hover Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Add To Cart Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_cart_btn',
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
 * Option: Single Product Add To Cart Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_cart_btn',
		'priority'    => 45,
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_txt_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_cart_btn',
            'priority' => 50,
            'settings' => array(),
        )
    )
);

/**
 * Option: Single Product Add To Cart Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_cart_btn',
			'priority'    => 55,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_weight]',
		)
	)
);

/**
 * Option: Single Product Add To Cart Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_cart_btn',
			'priority'    => 60,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_family]',
		)
	)
);

/**
 * Option: Single Product Add To Cart Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_cart_btn',
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
 * Option: Single Product Add To Cart Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_cart_btn',
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
 * Option: Single Product Add To Cart Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_cart_btn_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_cart_btn',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_cart_btn',
            'priority' => 80,
            'settings' => array(),
        )
    )
);

/**
 * Option: Single Product Add To Cart Padding
 */

$sh_pp_sty_cart_btn_padding = array(
	'sh_pp_sty_cart_btn_top_padding:'.bstone_get_option( 'sh_pp_sty_cart_btn_top_padding' ), 'sh_pp_sty_cart_btn_bottom_padding:'.bstone_get_option( 'sh_pp_sty_cart_btn_bottom_padding' ), 'sh_pp_sty_cart_btn_left_padding:'.bstone_get_option( 'sh_pp_sty_cart_btn_left_padding' ), 'sh_pp_sty_cart_btn_right_padding:'.bstone_get_option( 'sh_pp_sty_cart_btn_right_padding' ),
	'sh_pp_sty_cart_btn_tablet_top_padding:', 'sh_pp_sty_cart_btn_tablet_bottom_padding:', 'sh_pp_sty_cart_btn_tablet_left_padding:', 'sh_pp_sty_cart_btn_tablet_right_padding:',
	'sh_pp_sty_cart_btn_mobile_top_padding:', 'sh_pp_sty_cart_btn_mobile_bottom_padding:', 'sh_pp_sty_cart_btn_mobile_left_padding:', 'sh_pp_sty_cart_btn_mobile_right_padding:',
);	
foreach($sh_pp_sty_cart_btn_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_padding]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 85,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_left_padding]',
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
 * Option: Single Product Add To Cart Margin
 */

$shop_item_add_cart_btn_margin = array(
	'sh_pp_sty_cart_btn_top_margin:'.bstone_get_option( 'sh_pp_sty_cart_btn_top_margin' ), 'sh_pp_sty_cart_btn_bottom_margin:'.bstone_get_option( 'sh_pp_sty_cart_btn_bottom_margin' ), 'sh_pp_sty_cart_btn_left_margin:'.bstone_get_option( 'sh_pp_sty_cart_btn_left_margin' ), 'sh_pp_sty_cart_btn_right_margin:'.bstone_get_option( 'sh_pp_sty_cart_btn_right_margin' ),
	'sh_pp_sty_cart_btn_tablet_top_margin:', 'sh_pp_sty_cart_btn_tablet_bottom_margin:', 'sh_pp_sty_cart_btn_tablet_left_margin:', 'sh_pp_sty_cart_btn_tablet_right_margin:',
	'sh_pp_sty_cart_btn_mobile_top_margin:', 'sh_pp_sty_cart_btn_mobile_bottom_margin:', 'sh_pp_sty_cart_btn_mobile_left_margin:', 'sh_pp_sty_cart_btn_mobile_right_margin:',
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_cart_btn_margin]', array(
			'section'  => 'sc_s_pp_s_cart_btn',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_cart_btn_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/******************************************
 * Section: Single Product Styles Tab - SKU
 ******************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_sku',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'SKU', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_sku',
			'priority' => 45,
		)
	)
);

/**
 * Option: Single Product SKU Title Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_title_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_title_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_title_color]', array(
			'section'  => 'sc_s_pp_s_sku',
			'priority' => 2,
			'label'    => __( 'Label Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product SKU Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_color]', array(
			'section'  => 'sc_s_pp_s_sku',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product SKU Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_sku',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_weight]',
		)
	)
);

/**
 * Option: Single Product SKU Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_sku',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_family]',
		)
	)
);

/**
 * Option: Single Product SKU Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_sku',
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
 * Option: Single Product SKU Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_sku',
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
 * Option: Single Product SKU Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sku_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_sku',
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
 * Option: Single Product SKU Margin
 */
$sh_pp_sty_sku_margin = array(
	'sh_pp_sty_sku_top_margin:'.bstone_get_option( 'sh_pp_sty_sku_top_margin' ), 'sh_pp_sty_sku_bottom_margin:'.bstone_get_option( 'sh_pp_sty_sku_bottom_margin' ), 'sh_pp_sty_sku_left_margin:'.bstone_get_option( 'sh_pp_sty_sku_left_margin' ), 'sh_pp_sty_sku_right_margin:'.bstone_get_option( 'sh_pp_sty_sku_right_margin' ),
	'sh_pp_sty_sku_tablet_top_margin:', 'sh_pp_sty_sku_tablet_bottom_margin:', 'sh_pp_sty_sku_tablet_left_margin:', 'sh_pp_sty_sku_tablet_right_margin:',
	'sh_pp_sty_sku_mobile_top_margin:', 'sh_pp_sty_sku_mobile_bottom_margin:', 'sh_pp_sty_sku_mobile_left_margin:', 'sh_pp_sty_sku_mobile_right_margin:',
);	
foreach($sh_pp_sty_sku_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sku_margin]', array(
			'section'  => 'sc_s_pp_s_sku',
			'priority' => 35,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sku_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/**************************************************
 * Section: Single Product Styles Tab - Description
 **************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_desc',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Description', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_desc',
			'priority' => 50,
		)
	)
);

/**
 * Option: Single Product Description Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_color]', array(
			'section'  => 'sc_s_pp_s_desc',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Description Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_bg_color]', array(
			'section'  => 'sc_s_pp_s_desc',
			'priority' => 7,
			'label'    => __( 'Background Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Description Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_desc',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_weight]',
		)
	)
);

/**
 * Option: Single Product Description Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_desc',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_family]',
		)
	)
);

/**
 * Option: Single Product Description Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_desc',
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
 * Option: Single Product Description Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_desc',
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
 * Option: Single Product Description Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_desc_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_desc',
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
 * Option: Single Product Description Padding
 */
$sh_pp_sty_desc_padding = array(
	'sh_pp_sty_desc_top_padding:'.bstone_get_option( 'sh_pp_sty_desc_top_padding' ), 'sh_pp_sty_desc_bottom_padding:'.bstone_get_option( 'sh_pp_sty_desc_bottom_padding' ), 'sh_pp_sty_desc_left_padding:'.bstone_get_option( 'sh_pp_sty_desc_left_padding' ), 'sh_pp_sty_desc_right_padding:'.bstone_get_option( 'sh_pp_sty_desc_right_padding' ),
	'sh_pp_sty_desc_tablet_top_padding:', 'sh_pp_sty_desc_tablet_bottom_padding:', 'sh_pp_sty_desc_tablet_left_padding:', 'sh_pp_sty_desc_tablet_right_padding:',
	'sh_pp_sty_desc_mobile_top_padding:', 'sh_pp_sty_desc_mobile_bottom_padding:', 'sh_pp_sty_desc_mobile_left_padding:', 'sh_pp_sty_desc_mobile_right_padding:',
);	
foreach($sh_pp_sty_desc_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_padding]', array(
			'section'  => 'sc_s_pp_s_desc',
			'priority' => 35,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_left_padding]',
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
 * Option: Single Product Description Margin
 */
$sh_pp_sty_desc_margin = array(
	'sh_pp_sty_desc_top_margin:'.bstone_get_option( 'sh_pp_sty_desc_top_margin' ), 'sh_pp_sty_desc_bottom_margin:'.bstone_get_option( 'sh_pp_sty_desc_bottom_margin' ), 'sh_pp_sty_desc_left_margin:'.bstone_get_option( 'sh_pp_sty_desc_left_margin' ), 'sh_pp_sty_desc_right_margin:'.bstone_get_option( 'sh_pp_sty_desc_right_margin' ),
	'sh_pp_sty_desc_tablet_top_margin:', 'sh_pp_sty_desc_tablet_bottom_margin:', 'sh_pp_sty_desc_tablet_left_margin:', 'sh_pp_sty_desc_tablet_right_margin:',
	'sh_pp_sty_desc_mobile_top_margin:', 'sh_pp_sty_desc_mobile_bottom_margin:', 'sh_pp_sty_desc_mobile_left_margin:', 'sh_pp_sty_desc_mobile_right_margin:',
);	
foreach($sh_pp_sty_desc_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_desc_margin]', array(
			'section'  => 'sc_s_pp_s_desc',
			'priority' => 40,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_desc_mobile_left_margin]',
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
 * Section: Single Product Styles Tab - Variations
 *************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_var',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Variations', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_var',
			'priority' => 55,
		)
	)
);

/**
 * Option: Shop Product Variations Label Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_label_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_label_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_label_color]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 5,
			'label'    => __( 'Label Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Variations Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_txt_color]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 10,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Variations Clear Button Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_clear_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_clear_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_clear_color]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 15,
			'label'    => __( 'Clear Button Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Variations Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_bg_color]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 20,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Variations Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_brdr_color]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Variations Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_var',
		'priority'    => 30,
		'label'       => __( 'Border Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Shop Product Variations Seprator Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_seprator_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_seprator_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_seprator_color]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 35,
			'label'    => __( 'Seprator Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Variations Seprator Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_seprator_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_seprator_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_seprator_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_var',
		'priority'    => 40,
		'label'       => __( 'Seprator Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 0,
			'step' => 1,
			'max'  => 10,
		),
	)
);

/**
 * Option: Shop Product Variations Fields Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_fields_height]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_fields_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_fields_height]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_var',
		'priority'    => 45,
		'label'       => __( 'Fields Height', 'bstone' ),
		'input_attrs' => array(
			'min'  => 10,
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_text_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_var',
            'priority' => 48,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Variations Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_var',
			'priority'    => 50,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Variations Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_var',
			'priority'    => 55,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_family]',
		)
	)
);

/**
 * Option: Shop Product Variations Label Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_label_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_label_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_label_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_var',
		'priority' => 60,
		'label'    => __( 'Label Transform', 'bstone' ),
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
 * Option: Shop Product Variations Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_var',
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
 * Option: Shop Product Variations Clear Button Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_clear_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_clear_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_clear_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_var',
		'priority' => 70,
		'label'    => __( 'Clear Button Transform', 'bstone' ),
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
 * Option: Shop Product Variations Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_var',
		'priority' => 75,
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
 * Option: Shop Product Variations Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_var_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_var',
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
 * Option: Devider
 */
$wp_customize->add_control(
    new Bstone_Control_Divider(
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_var',
            'priority' => 85,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Variations Margin
 */
$sh_pp_sty_var_margin = array(
	'sh_pp_sty_var_top_margin:'.bstone_get_option( 'sh_pp_sty_var_top_margin' ), 'sh_pp_sty_var_bottom_margin:'.bstone_get_option( 'sh_pp_sty_var_bottom_margin' ), 'sh_pp_sty_var_left_margin:'.bstone_get_option( 'sh_pp_sty_var_left_margin' ), 'sh_pp_sty_var_right_margin:'.bstone_get_option( 'sh_pp_sty_var_right_margin' ),
	'sh_pp_sty_var_tablet_top_margin:', 'sh_pp_sty_var_tablet_bottom_margin:', 'sh_pp_sty_var_tablet_left_margin:', 'sh_pp_sty_var_tablet_right_margin:',
	'sh_pp_sty_var_mobile_top_margin:', 'sh_pp_sty_var_mobile_bottom_margin:', 'sh_pp_sty_var_mobile_left_margin:', 'sh_pp_sty_var_mobile_right_margin:',
);	
foreach($sh_pp_sty_var_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_var_margin]', array(
			'section'  => 'sc_s_pp_s_var',
			'priority' => 90,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_var_mobile_left_margin]',
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
 * Section: Single Product Styles Tab - Quantity
 ***********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_qty',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Quantity', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_qty',
			'priority' => 60,
		)
	)
);

/**
 * Option: Shop Product Quantity Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_color]', array(
			'section'  => 'sc_s_pp_s_qty',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Quantity Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_bg_color]', array(
			'section'  => 'sc_s_pp_s_qty',
			'priority' => 15,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Quantity Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_border_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_border_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_border_color]', array(
			'section'  => 'sc_s_pp_s_qty',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Shop Product Quantity Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_qty',
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
 * Option: Shop Product Quantity Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_field_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_field_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_field_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_qty',
		'priority'    => 40,
		'label'       => __( 'Width', 'bstone' ),
		'input_attrs' => array(
			'min'  => 10,
			'step' => 1,
			'max'  => 500,
		),
	)
);

/**
 * Option: Shop Product Quantity Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_field_height]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_field_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_field_height]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_qty',
		'priority'    => 40,
		'label'       => __( 'Height', 'bstone' ),
		'input_attrs' => array(
			'min'  => 10,
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_text_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_qty',
            'priority' => 42,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Quantity Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_qty',
			'priority'    => 45,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_weight]',
		)
	)
);

/**
 * Option: Shop Product Quantity Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_qty',
			'priority'    => 50,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_family]',
		)
	)
);

/**
 * Option: Shop Product Quantity Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_qty',
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
 * Option: Shop Product Quantity Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_qty',
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
 * Option: Shop Product Quantity Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_qty_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_qty',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_qty',
            'priority' => 70,
            'settings' => array(),
        )
    )
);

/**
 * Option: Shop Product Quantity Margin
 */
$sh_pp_sty_qty_margin = array(
	'sh_pp_sty_qty_top_margin:'.bstone_get_option( 'sh_pp_sty_qty_top_margin' ), 'sh_pp_sty_qty_bottom_margin:'.bstone_get_option( 'sh_pp_sty_qty_bottom_margin' ), 'sh_pp_sty_qty_left_margin:'.bstone_get_option( 'sh_pp_sty_qty_left_margin' ), 'sh_pp_sty_qty_right_margin:'.bstone_get_option( 'sh_pp_sty_qty_right_margin' ),
	'sh_pp_sty_qty_tablet_top_margin:', 'sh_pp_sty_qty_tablet_bottom_margin:', 'sh_pp_sty_qty_tablet_left_margin:', 'sh_pp_sty_qty_tablet_right_margin:',
	'sh_pp_sty_qty_mobile_top_margin:', 'sh_pp_sty_qty_mobile_bottom_margin:', 'sh_pp_sty_qty_mobile_left_margin:', 'sh_pp_sty_qty_mobile_right_margin:',
);	
foreach($sh_pp_sty_qty_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_qty_margin]', array(
			'section'  => 'sc_s_pp_s_qty',
			'priority' => 75,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_qty_mobile_left_margin]',
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
 * Section: Single Product Styles Tab - Sale Badge
 *************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_sale_bdg',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Sale Badge', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_sale_bdg',
			'priority' => 65,
		)
	)
);

/**
 * Option: Single Product Sale Badge Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_txt_color]', array(
			'section'  => 'sc_s_pp_s_sale_bdg',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Sale Badge Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_bg_color]', array(
			'section'  => 'sc_s_pp_s_sale_bdg',
			'priority' => 15,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Sale Badge Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_brdr_color]', array(
			'section'  => 'sc_s_pp_s_sale_bdg',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Sale Badge Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_sale_bdg',
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
 * Option: Single Product Sale Badge Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_sale_bdg',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_text_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_sale_bdg',
            'priority' => 43,
            'settings' => array(),
        )
    )
);

/**
 * Option: Single Product Sale Badge Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_sale_bdg',
			'priority'    => 45,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_weight]',
		)
	)
);

/**
 * Option: Single Product Sale Badge Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_sale_bdg',
			'priority'    => 50,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_family]',
		)
	)
);

/**
 * Option: Single Product Sale Badge Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_sale_bdg',
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
 * Option: Single Product Sale Badge Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_sale_bdg',
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
 * Option: Single Product Sale Badge Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_sale_bdg_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_sale_bdg',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_sale_bdg',
            'priority' => 68,
            'settings' => array(),
        )
    )
);

/**
 * Option: Single Product Sale Badge Padding
 */
$sh_pp_sty_sale_bdg_padding = array(
	'sh_pp_sty_sale_bdg_top_padding:'.bstone_get_option( 'sh_pp_sty_sale_bdg_top_padding' ), 'sh_pp_sty_sale_bdg_bottom_padding:'.bstone_get_option( 'sh_pp_sty_sale_bdg_bottom_padding' ), 'sh_pp_sty_sale_bdg_left_padding:'.bstone_get_option( 'sh_pp_sty_sale_bdg_left_padding' ), 'sh_pp_sty_sale_bdg_right_padding:'.bstone_get_option( 'sh_pp_sty_sale_bdg_right_padding' ),
	'sh_pp_sty_sale_bdg_tablet_top_padding:', 'sh_pp_sty_sale_bdg_tablet_bottom_padding:', 'sh_pp_sty_sale_bdg_tablet_left_padding:', 'sh_pp_sty_sale_bdg_tablet_right_padding:',
	'sh_pp_sty_sale_bdg_mobile_top_padding:', 'sh_pp_sty_sale_bdg_mobile_bottom_padding:', 'sh_pp_sty_sale_bdg_mobile_left_padding:', 'sh_pp_sty_sale_bdg_mobile_right_padding:',
);	
foreach($sh_pp_sty_sale_bdg_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_padding]', array(
			'section'  => 'sc_s_pp_s_sale_bdg',
			'priority' => 70,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_left_padding]',
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
 * Option: Single Product Sale Badge Margin
 */
$sh_pp_sty_sale_bdg_margin = array(
	'sh_pp_sty_sale_bdg_top_margin:'.bstone_get_option( 'sh_pp_sty_sale_bdg_top_margin' ), 'sh_pp_sty_sale_bdg_bottom_margin:'.bstone_get_option( 'sh_pp_sty_sale_bdg_bottom_margin' ), 'sh_pp_sty_sale_bdg_left_margin:'.bstone_get_option( 'sh_pp_sty_sale_bdg_left_margin' ), 'sh_pp_sty_sale_bdg_right_margin:'.bstone_get_option( 'sh_pp_sty_sale_bdg_right_margin' ),
	'sh_pp_sty_sale_bdg_tablet_top_margin:', 'sh_pp_sty_sale_bdg_tablet_bottom_margin:', 'sh_pp_sty_sale_bdg_tablet_left_margin:', 'sh_pp_sty_sale_bdg_tablet_right_margin:',
	'sh_pp_sty_sale_bdg_mobile_top_margin:', 'sh_pp_sty_sale_bdg_mobile_bottom_margin:', 'sh_pp_sty_sale_bdg_mobile_left_margin:', 'sh_pp_sty_sale_bdg_mobile_right_margin:',
);	
foreach($sh_pp_sty_sale_bdg_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_sale_bdg_margin]', array(
			'section'  => 'sc_s_pp_s_sale_bdg',
			'priority' => 75,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_sale_bdg_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/*********************************************************
 * Section: Single Product Styles Tab - Out of Stock Badge
 *********************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_out_stok',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Out of Stock Badge', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_out_stok',
			'priority' => 70,
		)
	)
);

/**
 * Option: Single Product Out of Stock Badge Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_txt_color]', array(
			'section'  => 'sc_s_pp_s_out_stok',
			'priority' => 5,
			'label'    => __( 'Text Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Out of Stock Badge Background Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_bg_color]', array(
			'section'  => 'sc_s_pp_s_out_stok',
			'priority' => 15,
			'label'    => __( 'Background', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Out of Stock Badge Border Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_brdr_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_brdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_brdr_color]', array(
			'section'  => 'sc_s_pp_s_out_stok',
			'priority' => 25,
			'label'    => __( 'Border Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Out of Stock Badge Border Width
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_brdr_width]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_brdr_width' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_brdr_width]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_out_stok',
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
 * Option: Single Product Out of Stock Badge Border Radius
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_brdr_radius]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_brdr_radius' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_brdr_radius]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_out_stok',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_text_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_out_stok',
            'priority' => 43,
            'settings' => array(),
        )
    )
);

/**
 * Option: Single Product Out of Stock Badge Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_out_stok',
			'priority'    => 45,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_weight]',
		)
	)
);

/**
 * Option: Single Product Out of Stock Badge Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_out_stok',
			'priority'    => 50,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_family]',
		)
	)
);

/**
 * Option: Single Product Out of Stock Badge Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_out_stok',
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
 * Option: Single Product Out of Stock Badge Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_out_stok',
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
 * Option: Single Product Out of Stock Badge Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_out_stok_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_out_stok',
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_spacing_divider]', array(
            'type'     => 'bst-divider',
            'section'  => 'sc_s_pp_s_out_stok',
            'priority' => 68,
            'settings' => array(),
        )
    )
);

/**
 * Option: Single Product Out of Stock Badge Padding
 */
$sh_pp_sty_out_stok_padding = array(
	'sh_pp_sty_out_stok_top_padding:'.bstone_get_option( 'sh_pp_sty_out_stok_top_padding' ), 'sh_pp_sty_out_stok_bottom_padding:'.bstone_get_option( 'sh_pp_sty_out_stok_bottom_padding' ), 'sh_pp_sty_out_stok_left_padding:'.bstone_get_option( 'sh_pp_sty_out_stok_left_padding' ), 'sh_pp_sty_out_stok_right_padding:'.bstone_get_option( 'sh_pp_sty_out_stok_right_padding' ),
	'sh_pp_sty_out_stok_tablet_top_padding:', 'sh_pp_sty_out_stok_tablet_bottom_padding:', 'sh_pp_sty_out_stok_tablet_left_padding:', 'sh_pp_sty_out_stok_tablet_right_padding:',
	'sh_pp_sty_out_stok_mobile_top_padding:', 'sh_pp_sty_out_stok_mobile_bottom_padding:', 'sh_pp_sty_out_stok_mobile_left_padding:', 'sh_pp_sty_out_stok_mobile_right_padding:',
);	
foreach($sh_pp_sty_out_stok_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_padding]', array(
			'section'  => 'sc_s_pp_s_out_stok',
			'priority' => 70,
			'label'    => __( 'Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_left_padding]',
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
 * Option: Single Product Out of Stock Badge Margin
 */
$sh_pp_sty_out_stok_margin = array(
	'sh_pp_sty_out_stok_top_margin:'.bstone_get_option( 'sh_pp_sty_out_stok_top_margin' ), 'sh_pp_sty_out_stok_bottom_margin:'.bstone_get_option( 'sh_pp_sty_out_stok_bottom_margin' ), 'sh_pp_sty_out_stok_left_margin:'.bstone_get_option( 'sh_pp_sty_out_stok_left_margin' ), 'sh_pp_sty_out_stok_right_margin:'.bstone_get_option( 'sh_pp_sty_out_stok_right_margin' ),
	'sh_pp_sty_out_stok_tablet_top_margin:', 'sh_pp_sty_out_stok_tablet_bottom_margin:', 'sh_pp_sty_out_stok_tablet_left_margin:', 'sh_pp_sty_out_stok_tablet_right_margin:',
	'sh_pp_sty_out_stok_mobile_top_margin:', 'sh_pp_sty_out_stok_mobile_bottom_margin:', 'sh_pp_sty_out_stok_mobile_left_margin:', 'sh_pp_sty_out_stok_mobile_right_margin:',
);	
foreach($sh_pp_sty_out_stok_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_out_stok_margin]', array(
			'section'  => 'sc_s_pp_s_out_stok',
			'priority' => 75,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_out_stok_mobile_left_margin]',
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
 * Section: Single Product Styles Tab - Rating
 ***********************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_rating',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Rating', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_rating',
			'priority' => 75,
		)
	)
);

// Option: Single Product Rating Star Size
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_star_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_star_size' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_star_size]', array(
		'type'        => 'number',
		'section'     => 'sc_s_pp_s_rating',
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
 * Option: Single Product Rating Star Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_star_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_star_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_star_color]', array(
			'section'  => 'sc_s_pp_s_rating',
			'priority' => 10,
			'label'    => __( 'Star color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Rating Active Star Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_active_star_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_active_star_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_active_star_color]', array(
			'section'  => 'sc_s_pp_s_rating',
			'priority' => 15,
			'label'    => __( 'Active Star color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Rating Text Line Height
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_text_line_height]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_text_line_height' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Slider(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_text_line_height]', array(
			'type'        => 'bst-slider',
			'section'     => 'sc_s_pp_s_rating',
			'priority'    => 18,
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
 * Option: Single Product Rating Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_txt_color]', array(
			'section'  => 'sc_s_pp_s_rating',
			'priority' => 20,
			'label'    => __( 'Text color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Rating Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_rating',
			'priority'    => 25,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_weight]',
		)
	)
);

/**
 * Option: Single Product Rating Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_rating',
			'priority'    => 30,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_family]',
		)
	)
);

/**
 * Option: Single Product Rating Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_rating',
		'priority' => 35,
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
 * Option: Single Product Rating Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_rating',
		'priority' => 40,
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
 * Option: Single Product Rating Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rating_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_rating',
			'priority'    => 45,
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
 * Option: Single Product Rating Margin
 */
$sh_pp_sty_rating_margin = array(
	'sh_pp_sty_rating_top_margin:'.bstone_get_option( 'sh_pp_sty_rating_top_margin' ), 'sh_pp_sty_rating_bottom_margin:'.bstone_get_option( 'sh_pp_sty_rating_bottom_margin' ), 'sh_pp_sty_rating_left_margin:'.bstone_get_option( 'sh_pp_sty_rating_left_margin' ), 'sh_pp_sty_rating_right_margin:'.bstone_get_option( 'sh_pp_sty_rating_right_margin' ),
	'sh_pp_sty_rating_tablet_top_margin:', 'sh_pp_sty_rating_tablet_bottom_margin:', 'sh_pp_sty_rating_tablet_left_margin:', 'sh_pp_sty_rating_tablet_right_margin:',
	'sh_pp_sty_rating_mobile_top_margin:', 'sh_pp_sty_rating_mobile_bottom_margin:', 'sh_pp_sty_rating_mobile_left_margin:', 'sh_pp_sty_rating_mobile_right_margin:',
);	
foreach($sh_pp_sty_rating_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rating_margin]', array(
			'section'  => 'sc_s_pp_s_rating',
			'priority' => 50,
			'label'    => __( 'Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rating_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/***********************************************************
 * Section: Single Product Styles Tab - Detail & Review Tabs
 ***********************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_tabs',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Detail & Review Tabs', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_tabs',
			'priority' => 80,
		)
	)
);

/**
 * Option: Single Product Tabs Active Tab Border Top Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_acbrdr_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_acbrdr_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_acbrdr_color]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 5,
			'label'    => __( 'Active Tab Border Top color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tabs Divider Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_divider_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_divider_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_divider_color]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 10,
			'label'    => __( 'Divider color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tabs Background
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_bg_color]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 15,
			'label'    => __( 'Background color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tabs Active Background
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_active_bg_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_active_bg_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_active_bg_color]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 20,
			'label'    => __( 'Active Tab Background color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tabs Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_txt_color]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 25,
			'label'    => __( 'Title color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tabs Active Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_active_txt_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_active_txt_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_active_txt_color]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 30,
			'label'    => __( 'Active Tab Title color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Tabs Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_tabs',
			'priority'    => 35,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_weight]',
		)
	)
);

/**
 * Option: Single Product Tabs Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_tabs',
			'priority'    => 40,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_family]',
		)
	)
);

/**
 * Option: Single Product Tabs Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_tabs',
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
 * Option: Single Product Tabs Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_tabs',
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
 * Option: Single Product Tabs Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_tabs_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_tabs',
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

/**
 * Option: Single Product Out of Stock Badge Padding
 */
$sh_pp_sty_tabs_padding = array(
	'sh_pp_sty_tabs_top_padding:'.bstone_get_option( 'sh_pp_sty_tabs_top_padding' ), 'sh_pp_sty_tabs_bottom_padding:'.bstone_get_option( 'sh_pp_sty_tabs_bottom_padding' ), 'sh_pp_sty_tabs_left_padding:'.bstone_get_option( 'sh_pp_sty_tabs_left_padding' ), 'sh_pp_sty_tabs_right_padding:'.bstone_get_option( 'sh_pp_sty_tabs_right_padding' ),
	'sh_pp_sty_tabs_tablet_top_padding:', 'sh_pp_sty_tabs_tablet_bottom_padding:', 'sh_pp_sty_tabs_tablet_left_padding:', 'sh_pp_sty_tabs_tablet_right_padding:',
	'sh_pp_sty_tabs_mobile_top_padding:', 'sh_pp_sty_tabs_mobile_bottom_padding:', 'sh_pp_sty_tabs_mobile_left_padding:', 'sh_pp_sty_tabs_mobile_right_padding:',
);	
foreach($sh_pp_sty_tabs_padding as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_padding]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 60,
			'label'    => __( 'Tabs Padding (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_top_padding]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_right_padding]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_bottom_padding]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_left_padding]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_top_padding]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_right_padding]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_bottom_padding]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_left_padding]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_top_padding]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_right_padding]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_bottom_padding]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_left_padding]',
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
 * Option: Single Product Tabs Margin
 */
$sh_pp_sty_tabs_margin = array(
	'sh_pp_sty_tabs_top_margin:'.bstone_get_option( 'sh_pp_sty_tabs_top_margin' ), 'sh_pp_sty_tabs_bottom_margin:'.bstone_get_option( 'sh_pp_sty_tabs_bottom_margin' ), 'sh_pp_sty_tabs_left_margin:'.bstone_get_option( 'sh_pp_sty_tabs_left_margin' ), 'sh_pp_sty_tabs_right_margin:'.bstone_get_option( 'sh_pp_sty_tabs_right_margin' ),
	'sh_pp_sty_tabs_tablet_top_margin:', 'sh_pp_sty_tabs_tablet_bottom_margin:', 'sh_pp_sty_tabs_tablet_left_margin:', 'sh_pp_sty_tabs_tablet_right_margin:',
	'sh_pp_sty_tabs_mobile_top_margin:', 'sh_pp_sty_tabs_mobile_bottom_margin:', 'sh_pp_sty_tabs_mobile_left_margin:', 'sh_pp_sty_tabs_mobile_right_margin:',
);	
foreach($sh_pp_sty_tabs_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_tabs_margin]', array(
			'section'  => 'sc_s_pp_s_tabs',
			'priority' => 65,
			'label'    => __( 'Container Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_tabs_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);

/********************************************************
 * Section: Single Product Styles Tab - Related & Upsells
 ********************************************************/
$wp_customize->add_section(
	new SC_Dialog(
		$wp_customize, 'sc_s_pp_s_related_up',
		array(
			'sc_belong' => 'sc_s_pp_dialog',
			'sc_tab' => array(
				'id' => 'sh_pp_sty',
				'text' => __( 'Styles', 'bstone' ),
			),
			'title' => __( 'Related & Upsells', 'bstone' ),
			'sc_reset' => 'sh_pp_sty_rup',
			'priority' => 80,
		)
	)
);

/**
 * Option: Single Product Upsells & Related Products Heading Text Color
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_heading_color]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rup_heading_color' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Color(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_heading_color]', array(
			'section'  => 'sc_s_pp_s_related_up',
			'priority' => 5,
			'label'    => __( 'Title Color', 'bstone' ),
		)
	)
);

/**
 * Option: Single Product Upsells & Related Products Heading Font Family
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_family]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rup_font_family' ),
		'type'              => 'option',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_family]', array(
			'type'        => 'bst-font-family',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_related_up',
			'priority'    => 10,
			'label'       => __( 'Font Family', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_weight]',
		)
	)
);

/**
 * Option: Single Product Upsells & Related Products Heading Font Weight
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_weight]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rup_font_weight' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_font_weight' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Typography(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_weight]', array(
			'type'        => 'bst-font-weight',
			'bst_inherit' => __( 'Default', 'bstone' ),
			'section'     => 'sc_s_pp_s_related_up',
			'priority'    => 15,
			'label'       => __( 'Font Weight', 'bstone' ),
			'connect'     => BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_family]',
		)
	)
);

/**
 * Option: Single Product Upsells & Related Products Heading Text Transform
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_text_transform]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rup_text_transform' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_text_transform]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_related_up',
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
 * Option: Single Product Upsells & Related Products Heading Font Style
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_text_style]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rup_text_style' ),
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
	)
);
$wp_customize->add_control(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_text_style]', array(
		'type'     => 'select',
		'section'  => 'sc_s_pp_s_related_up',
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
 * Option: Single Product Upsells & Related Products Heading Font Size
 */
$wp_customize->add_setting(
	BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_size]', array(
		'default'           => bstone_get_option( 'sh_pp_sty_rup_font_size' ),
		'type'              => 'option',
		'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
	)
);
$wp_customize->add_control(
	new Bstone_Control_Responsive(
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_font_size]', array(
			'type'        => 'bst-responsive',
			'section'     => 'sc_s_pp_s_related_up',
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
 * Option: Single Product Upsells & Related Products Heading Margin
 */
$sh_pp_sty_rup_margin = array(
	'sh_pp_sty_rup_top_margin:'.bstone_get_option( 'sh_pp_sty_rup_top_margin' ), 'sh_pp_sty_rup_bottom_margin:'.bstone_get_option( 'sh_pp_sty_rup_bottom_margin' ), 'sh_pp_sty_rup_left_margin:'.bstone_get_option( 'sh_pp_sty_rup_left_margin' ), 'sh_pp_sty_rup_right_margin:'.bstone_get_option( 'sh_pp_sty_rup_right_margin' ),
	'sh_pp_sty_rup_tablet_top_margin:', 'sh_pp_sty_rup_tablet_bottom_margin:', 'sh_pp_sty_rup_tablet_left_margin:', 'sh_pp_sty_rup_tablet_right_margin:',
	'sh_pp_sty_rup_mobile_top_margin:', 'sh_pp_sty_rup_mobile_bottom_margin:', 'sh_pp_sty_rup_mobile_left_margin:', 'sh_pp_sty_rup_mobile_right_margin:',
);	
foreach($sh_pp_sty_rup_margin as $dimension) {
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
		$wp_customize, BSTONE_THEME_SETTINGS . '[sh_pp_sty_rup_margin]', array(
			'section'  => 'sc_s_pp_s_related_up',
			'priority' => 35,
			'label'    => __( 'Title Margin (px)', 'bstone' ),
			'settings'   => array(
				'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_top_margin]',
				'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_right_margin]',
				'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_bottom_margin]',
				'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_left_margin]',
				'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_tablet_top_margin]',
				'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_tablet_right_margin]',
				'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_tablet_bottom_margin]',
				'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_tablet_left_margin]',
				'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_mobile_top_margin]',
				'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_mobile_right_margin]',
				'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_mobile_bottom_margin]',
				'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sh_pp_sty_rup_mobile_left_margin]',
			),
			'input_attrs' 			=> array(
				'min'   => -100,
				'max'   => 500,
				'step'  => 1,
			),
		)
	)
);