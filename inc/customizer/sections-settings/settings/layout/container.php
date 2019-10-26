<?php
/**
 * General Options for Bstone Theme.
 *
 * @package     Bstone
 * @author      Bstone
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-content-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-container-layout',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-container-layout',
					'section-general-typo-settings',
					'section-color-general',
					'section-spacing-content'
				),
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);

	/**
	 * Option: Site Content Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[site-default-layout]', array(
			'default'           => bstone_get_option( 'site-default-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[site-default-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 5,
			'label'    => __( 'Default Layout', 'bstone' ),
			'choices'  => array(
				'boxed-container'         => __( 'Boxed', 'bstone' ),
				'separate-container' 	  => __( 'Separate', 'bstone' ),
				'plain-container'         => __( 'Full Width / Contained', 'bstone' ),
				'page-builder'            => __( 'Full Width / Stretched', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-content-layout-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-container-layout',
				'priority' => 10,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Single Page Content Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-page-content-layout]', array(
			'default'           => bstone_get_option( 'single-page-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[single-page-content-layout]', array(
			'type'     => 'select',
			'priority' => 15,
			'section'  => 'section-container-layout',
			'label'    => __( 'Pages', 'bstone' ),
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
	 * Option: Single Post Content Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-post-content-layout]', array(
			'default'           => bstone_get_option( 'single-post-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[single-post-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 20,
			'label'    => __( 'Blog Posts', 'bstone' ),
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
	 * Option: Archive Post Content Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[archive-post-content-layout]', array(
			'default'           => bstone_get_option( 'archive-post-content-layout' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[archive-post-content-layout]', array(
			'type'     => 'select',
			'section'  => 'section-container-layout',
			'priority' => 25,
			'label'    => __( 'Blog Post Archives', 'bstone' ),
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
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[primary-cnt-border-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-container-layout',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Bottom Border Size
	 */
	$primarycnt_border = array(
		'primarycnt_top_border:'.bstone_get_option( 'primarycnt_top_border' ),'primarycnt_bottom_border:'.bstone_get_option( 'primarycnt_bottom_border' ),'primarycnt_left_border:'.bstone_get_option( 'primarycnt_left_border' ), 'primarycnt_right_border:'.bstone_get_option( 'primarycnt_right_border' ),
		'primarycnt_tablet_top_border:', 'primarycnt_tablet_bottom_border:','primarycnt_tablet_left_border:', 'primarycnt_tablet_right_border:',
		'primarycnt_mobile_top_border:', 'primarycnt_mobile_bottom_border:','primarycnt_mobile_left_border:', 'primarycnt_mobile_right_border:',
	);	
	foreach($primarycnt_border as $dimension) {
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[primarycnt-border-width]', array(
				'section'  => 'section-container-layout',
				'priority' => 35,
				'label'    => __( 'Border Size (px)', 'bstone' ),				
				'settings' => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_top_border]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[primarycnt_right_border]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[primarycnt_bottom_border]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_left_border]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_tablet_top_border]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_tablet_right_border]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[primarycnt_tablet_bottom_border]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_tablet_left_border]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_mobile_top_border]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_mobile_right_border]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[primarycnt_mobile_bottom_border]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[primarycnt_mobile_left_border]',
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
	 * Option: Divider
	 */
	// Learn More link if Bstone Pro is not activated.
	if ( ! defined( 'BSTONE_PRO_VER' ) ) {
		$wp_customize->add_control(
			new Bstone_Control_Divider(
				$wp_customize, BSTONE_THEME_SETTINGS . '[primary-cnt-pro-divider]', array(
					'type'        => 'bst-divider',
					'section'     => 'section-container-layout',
					'priority'    => 40,
					'settings'    => array(),
					'dividerline' => true,
					'link' 		  => 'https://wpbstone.com/pro/?utm_source=customizer&utm_medium=upgrade-link&utm_campaign=upgrade-to-pro',
					'html'     	  => __( 'More Options Available in Bstone Pro!', 'bstone' ),
				)
			)
		);
	}
