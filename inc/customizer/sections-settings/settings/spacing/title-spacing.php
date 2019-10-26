<?php
/**
 * Post / Page Title Spacing Settings
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
 * Customizer Tabs - To navigate to other related sections.
 */
$wp_customize->add_control(
	new Bstone_Control_Tabs(
		$wp_customize, BSTONE_THEME_SETTINGS . '[page-title-area-spacing-tabs]', array(
			'type'          => 'bst-tabs',
			'section'       => 'section-spacing-page-title',
			'priority'      => 1,
			'settings'      => array(),
			'tabs_data'     => array(
				__('layout', 'bstone'),
				__('typography', 'bstone'),
				__('colors', 'bstone'),
				__('spacing', 'bstone')
			),
			'tabs_sections' => array(
				'section-title',
				'section-single-typo-settings',
				'section-color-page-title',
				'section-spacing-page-title'
			),
			'tabs_active'   => __('spacing', 'bstone'),
		)
	)
);

/**
 * Option: Post / Page Title Area Padding
 */

$bst_title_padding = array(
    'bst_title_top_padding:'.bstone_get_option( 'bst_title_top_padding' ), 'bst_title_right_padding:'.bstone_get_option( 'bst_title_right_padding' ), 'bst_title_bottom_padding:'.bstone_get_option( 'bst_title_bottom_padding' ), 'bst_title_left_padding:'.bstone_get_option( 'bst_title_left_padding' ),
    'bst_title_tablet_top_padding:', 'bst_title_tablet_right_padding:', 'bst_title_tablet_bottom_padding:', 'bst_title_tablet_left_padding:', 
    'bst_title_mobile_top_padding:', 'bst_title_mobile_right_padding:', 'bst_title_mobile_bottom_padding:', 'bst_title_mobile_left_padding:'
);	
foreach($bst_title_padding as $dimension) {
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[bst-title-spacing]', array(
            'section'  => 'section-spacing-page-title',
            'priority' => 5,
            'label'    => __( 'Title Section Padding (px)', 'bstone' ),				
            'settings'   => array(
                'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bst_title_top_padding]',
                'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bst_title_right_padding]',
                'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_title_bottom_padding]',
                'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bst_title_left_padding]',
                'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bst_title_tablet_top_padding]',
                'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bst_title_tablet_right_padding]',
                'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_title_tablet_bottom_padding]',
                'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bst_title_tablet_left_padding]',
                'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bst_title_mobile_top_padding]',
                'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bst_title_mobile_right_padding]',
                'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_title_mobile_bottom_padding]',
                'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bst_title_mobile_left_padding]',
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
 * Option: Post / Page Title Margin - h1
 */

$bst_single_title_margin = array(
    'bst_single_title_top_margin:'.bstone_get_option( 'bst_single_title_top_margin' ), 'bst_single_title_bottom_margin:'.bstone_get_option( 'bst_single_title_bottom_margin' ),
    'bst_single_title_tablet_top_margin:', 'bst_single_title_tablet_bottom_margin:',
    'bst_single_title_mobile_top_margin:', 'bst_single_title_mobile_bottom_margin:',
);	
foreach($bst_single_title_margin as $dimension) {
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[bst-title-area-h1-margin]', array(
            'section'  => 'section-spacing-page-title',
            'priority' => 10,
            'label'    => __( 'Title Margin (px)', 'bstone' ),				
            'settings'   => array(
                'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bst_single_title_top_margin]',
                'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_single_title_bottom_margin]',
                'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bst_single_title_tablet_top_margin]',
                'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_single_title_tablet_bottom_margin]',
                'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bst_single_title_mobile_top_margin]',
                'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_single_title_mobile_bottom_margin]',
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
 * Option: Post / Page Breadcrumbs Margin
 */

$bst_breadcrumbs_margin = array(
    'bst_breadcrumbs_top_margin:'.bstone_get_option( 'bst_breadcrumbs_top_margin' ), 'bst_breadcrumbs_bottom_margin:'.bstone_get_option( 'bst_breadcrumbs_bottom_margin' ),
    'bst_breadcrumbs_tablet_top_margin:', 'bst_breadcrumbs_tablet_bottom_margin:',
    'bst_breadcrumbs_mobile_top_margin:', 'bst_breadcrumbs_mobile_bottom_margin:',
);	
foreach($bst_breadcrumbs_margin as $dimension) {
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
        $wp_customize, BSTONE_THEME_SETTINGS . '[bst-breadcrumbs-margin]', array(
            'section'  => 'section-spacing-page-title',
            'priority' => 15,
            'label'    => __( 'Breadcrumbs Margin (px)', 'bstone' ),				
            'settings'   => array(
                'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bst_breadcrumbs_top_margin]',
                'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_breadcrumbs_bottom_margin]',
                'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bst_breadcrumbs_tablet_top_margin]',
                'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_breadcrumbs_tablet_bottom_margin]',
                'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bst_breadcrumbs_mobile_top_margin]',
                'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bst_breadcrumbs_mobile_bottom_margin]',
            ),
            'input_attrs' 			=> array(
                'min'   => 0,
                'max'   => 500,
                'step'  => 1,
            ),
        )
    )
);