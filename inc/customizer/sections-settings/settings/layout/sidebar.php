<?php
/**
 * Sidebar Options for Bstone Theme.
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
	 * Customizer Tabs - To navigate to other related sections.
	 */
	$wp_customize->add_control(
		new Bstone_Control_Tabs(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-sidebar-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-sidebars',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-sidebars',
					'section-sidebar-typo-settings',
					'section-color-sidebar',
					'section-spacing-sidebar'
				),
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);

	/**
	 * Option: Default Sidebar Position
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[site-sidebar-layout]', array(
			'default'           => bstone_get_option( 'site-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[site-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 5,
			'label'    => __( 'Default Layout', 'bstone' ),
			'choices'  => array(
				'no-sidebar'    => __( 'No Sidebar', 'bstone' ),
				'left-sidebar'  => __( 'Left Sidebar', 'bstone' ),
				'right-sidebar' => __( 'Right Sidebar', 'bstone' ),
				'both-sidebars' => __( 'Both Sidebars', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-page-sidebar-layout-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-sidebars',
				'priority' => 10,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Page
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
			'default'           => bstone_get_option( 'single-page-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[single-page-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 15,
			'label'    => __( 'Pages', 'bstone' ),
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
	 * Option: Blog Post
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
			'default'           => bstone_get_option( 'single-post-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[single-post-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 20,
			'label'    => __( 'Blog Posts', 'bstone' ),
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
	 * Option: Blog Post Archive
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
			'default'           => bstone_get_option( 'archive-post-sidebar-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[archive-post-sidebar-layout]', array(
			'type'     => 'select',
			'section'  => 'section-sidebars',
			'priority' => 25,
			'label'    => __( 'Blog Post Archives', 'bstone' ),
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-section-sidebar-width]', array(
				'section'  => 'section-sidebars',
				'type'     => 'bst-divider',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Sidebar Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[site-sidebar-width]', array(
			'default'           => bstone_get_option( 'site-sidebar-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-sidebar-width]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-sidebars',
				'priority'    => 35,
				'label'       => __( 'Sidebar Width', 'bstone' ),
				'suffix'      => '%',
				'input_attrs' => array(
					'min'  => 15,
					'step' => 1,
					'max'  => 50,
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[divider-section-sidebar-border]', array(
				'section'  => 'section-sidebars',
				'type'     => 'bst-divider',
				'priority' => 40,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Sidebar Secondary Bottom Border Size
	 */
	$sidebar_border = array(
		'sidebar_top_border:'.bstone_get_option( 'sidebar_top_border' ),'sidebar_bottom_border:'.bstone_get_option( 'sidebar_bottom_border' ),'sidebar_left_border:'.bstone_get_option( 'sidebar_left_border' ), 'sidebar_right_border:'.bstone_get_option( 'sidebar_right_border' ),
		'sidebar_tablet_top_border:', 'sidebar_tablet_bottom_border:','sidebar_tablet_left_border:', 'sidebar_tablet_right_border:',
		'sidebar_mobile_top_border:', 'sidebar_mobile_bottom_border:','sidebar_mobile_left_border:', 'sidebar_mobile_right_border:',
	);	
	foreach($sidebar_border as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[sidebar-border-width]', array(
				'section'  => 'section-sidebars',
				'priority' => 45,
				'label'    => __( 'Sidebar Border Size (px)', 'bstone' ),				
				'settings' => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[sidebar_top_border]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[sidebar_right_border]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[sidebar_bottom_border]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[sidebar_left_border]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_top_border]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_right_border]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_bottom_border]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[sidebar_tablet_left_border]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_top_border]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_right_border]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_bottom_border]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[sidebar_mobile_left_border]',
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
	 * Option: Sidebar Tertiary Bottom Border Size
	 */
	$trtrysidebar_border = array(
		'trtrysidebar_top_border:'.bstone_get_option( 'trtrysidebar_top_border' ),'trtrysidebar_bottom_border:'.bstone_get_option( 'trtrysidebar_bottom_border' ),'trtrysidebar_left_border:'.bstone_get_option( 'trtrysidebar_left_border' ), 'trtrysidebar_right_border:'.bstone_get_option( 'trtrysidebar_right_border' ),
		'trtrysidebar_tablet_top_border:', 'trtrysidebar_tablet_bottom_border:','trtrysidebar_tablet_left_border:', 'trtrysidebar_tablet_right_border:',
		'trtrysidebar_mobile_top_border:', 'trtrysidebar_mobile_bottom_border:','trtrysidebar_mobile_left_border:', 'trtrysidebar_mobile_right_border:',
	);	
	foreach($trtrysidebar_border as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[trtrysidebar-border-width]', array(
				'section'  => 'section-sidebars',
				'priority' => 45,
				'label'    => __( 'Sidebar 2 Border Size (px)', 'bstone' ),				
				'settings' => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_top_border]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[trtrysidebar_right_border]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[trtrysidebar_bottom_border]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_left_border]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_tablet_top_border]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_tablet_right_border]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_tablet_bottom_border]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_tablet_left_border]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_mobile_top_border]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_mobile_right_border]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_mobile_bottom_border]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[trtrysidebar_mobile_left_border]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 500,
			        'step'  => 1,
			    ),
			)
		)
	);