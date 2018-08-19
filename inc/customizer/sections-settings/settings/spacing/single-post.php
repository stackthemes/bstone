<?php
/**
 * Blog Spacing Settings
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-single-post-spacing-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-spacing-blog-single',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-single',
					'section-spacing-blog-single'
				),
				'tabs_active'   => __('spacing', 'bstone'),
			)
		)
	);
    
    /**
	 * Blog Post Single Meta Margin Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-meta-margin-top]', array(
			'default'           => bstone_get_option( 'blog-single-meta-margin-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-meta-margin-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog-single',
			'priority'    => 5,
			'label'       => __( 'Meta Margin Top', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);
    
    /**
	 * Blog Post Single Meta Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-meta-margin-bottom]', array(
			'default'           => bstone_get_option( 'blog-single-meta-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-meta-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog-single',
			'priority'    => 10,
			'label'       => __( 'Meta Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-single-spacing-divider-1]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-spacing-blog-single',
				'priority' => 15,
				'settings' => array(),
			)
		)
	);
    
    /**
	 * Blog Post Single Featured Image Margin Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-img-margin-top]', array(
			'default'           => bstone_get_option( 'blog-single-img-margin-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-img-margin-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog-single',
			'priority'    => 20,
			'label'       => __( 'Featured Image Margin Top', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);
    
    /**
	 * Blog Post Single Featured Image Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-img-margin-bottom]', array(
			'default'           => bstone_get_option( 'blog-single-img-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-img-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog-single',
			'priority'    => 25,
			'label'       => __( 'Featured Image Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
	 * Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-single-spacing-divider-2]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-spacing-blog-single',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);
    
    /**
	 * Blog Post Single Entry Footer Margin Top
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-footer-margin-top]', array(
			'default'           => bstone_get_option( 'blog-single-footer-margin-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-footer-margin-top]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog-single',
			'priority'    => 35,
			'label'       => __( 'Entry Footer Margin Top', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);
    
    /**
	 * Blog Post Single Entry Footer Margin Bottom
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-footer-margin-bottom]', array(
			'default'           => bstone_get_option( 'blog-single-footer-margin-bottom' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-footer-margin-bottom]', array(
			'type'        => 'number',
			'section'     => 'section-spacing-blog-single',
			'priority'    => 40,
			'label'       => __( 'Entry Footer Margin Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => -50,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	

	/**
	 * Single After Post Sections Padding
	 */

	$article_after_sec_padding = array(
		'safsp_top_padding:'.bstone_get_option( 'safsp_top_padding' ), 'safsp_bottom_padding:'.bstone_get_option( 'safsp_bottom_padding' ),
		'safsp_tablet_top_padding:', 'safsp_tablet_bottom_padding:',
		'safsp_mobile_top_padding:', 'safsp_mobile_bottom_padding:',
	);	
	foreach($article_after_sec_padding as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-article-after-sec-padding]', array(
				'section'  => 'section-spacing-blog-single',
				'priority' => 45,
				'label'    => __( 'Single After Post Sections Padding (px)', 'bstone' ),				
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[safsp_top_padding]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[safsp_bottom_padding]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[safsp_tablet_top_padding]',
		            'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[safsp_tablet_bottom_padding]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[safsp_mobile_top_padding]',
		            'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[safsp_mobile_bottom_padding]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);