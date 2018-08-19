<?php
/**
 * Header Options for Bstone Theme.
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
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-header-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-header',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-header',
					'section-header-typo-settings',
					'section-color-header',
					'section-spacing-header'
				),
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);

	/**
	 * Option: Header Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-layouts]', array(
			'default'           => bstone_get_option( 'header-layouts' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		new Bstone_Control_Radio_Image(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-layouts]', array(
				'section'  => 'section-header',
				'priority' => 5,
				'label'    => __( 'Header', 'bstone' ),
				'type'     => 'bst-radio-image',
				'choices'  => array(
					'header-main-layout-1'          => array(
						'label' => __( 'Logo Left', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/header-layout-1-60x60.png',
					),
					'header-main-layout-2'          => array(
						'label' => __( 'Logo Center', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/header-layout-2-60x60.png',
					),
				),
			)
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			BSTONE_THEME_SETTINGS . '[header-layouts]', array(
				'selector'            => 'header#masthead',
				'settings'   		  => array(
					'bstone-settings[header-layouts]',
					'bstone-settings[header-main-rt-section]',
					'bstone-settings[header-main-rt-section-html]',
					'bstone-settings[disable-primary-nav]',
					'bstone-settings[display-site-title]',
					'bstone-settings[display-site-tagline]',
					'bstone-settings[header-main-rt-section-2-html]',
					'bstone-settings[header-main-rt-section-2]',
					'bstone-settings[header-menu-position]',
					'bstone-settings[header-2-items-position]'
				),
				'container_inclusive' => false,
				'render_callback'     => 'bstone_render_header_change',
				'fallback_refresh' 	  => false, //
			)
		);
	}
	
	/**
	 * Option: Enable Transparent Header
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[enable-transparent-header]', array(
			'default'           => bstone_get_option( 'enable-transparent-header' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[enable-transparent-header]', array(
			'type'        => 'checkbox',
			'section'     => 'section-header',
			'label'       => __( 'Transparent Header', 'bstone' ),
			'priority'    => 7,
		)
	);

	/**
	 * Option: Disable Menu
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[disable-primary-nav]', array(
			'default'           => bstone_get_option( 'disable-primary-nav' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[disable-primary-nav]', array(
			'type'        => 'checkbox',
			'section'     => 'section-header',
			'label'       => __( 'Disable Menu', 'bstone' ),
			'priority'    => 10,
		)
	);

	/**
	 * Option: Custom Menu Item
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section]', array(
			'default'           => bstone_get_option( 'header-main-rt-section' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 15,
			'label'    => __( 'Custom Menu Item', 'bstone' ),
			'choices'  => apply_filters(
				'bstone_header_section_elements',
					array(
						'none'      => __( 'None', 'bstone' ),
						'search'    => __( 'Search', 'bstone' ),
						'text-html' => __( 'Text / HTML', 'bstone' ),
						'widget'    => __( 'Widget', 'bstone' ),
					),
					'primary-header'
				),
		)
	);

	/**
	 * Option: Custom Menu Item
	 */

	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'default'           => bstone_get_option( 'header-main-rt-section-html' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section-html]', array(
			'type'    		  => 'textarea',
			'section'  		  => 'section-header',
			'priority' 		  => 20,
			'label'    		  => __( 'Custom Menu Text / HTML', 'bstone' ),
		)
	);

	/**
	 * Option: Custom Menu Item 2
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section-2]', array(
			'default'           => bstone_get_option( 'header-main-rt-section-2' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section-2]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 25,
			'label'    => __( 'Custom Menu Item 2', 'bstone' ),
			'choices'  => apply_filters(
				'bstone_header_section_elements',
					array(
						'none'      => __( 'None', 'bstone' ),
						'search'    => __( 'Search', 'bstone' ),
						'text-html' => __( 'Text / HTML', 'bstone' ),
						'widget'    => __( 'Widget', 'bstone' ),
					),
					'primary-header'
				),
		)
	);

	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section-2-html]', array(
			'default'           => bstone_get_option( 'header-main-rt-section-2-html' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_html' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-rt-section-2-html]', array(
			'type'    		  => 'textarea',
			'section'  		  => 'section-header',
			'priority' 		  => 30,
			'label'    		  => __( 'Custom Menu Text / HTML 2', 'bstone' ),
		)
	);

	/**
	 * Option: Display Post Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-2-items-position]', array(
			'default'           => bstone_get_option( 'header-2-items-position' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-2-items-position]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-header',
				'priority' => 35,
				'label'    => __( 'Items Position', 'bstone' ),
				'choices'  => array(
					'menu-item-1' => __( 'Menu Item 1', 'bstone' ),
					'logo' 		  => __( 'Logo / Site Title', 'bstone' ),
					'menu-item-2' => __( 'Menu Item 2', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Custom Menu Item Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-cmi-1-alignment]', array(
			'default'           => bstone_get_option( 'header-cmi-1-alignment' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-cmi-1-alignment]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 40,
			'label'    => __( 'Custom Menu Item Alignment', 'bstone' ),
			'choices'  => array(
				'left'    	=> __( 'Left', 'bstone' ),
				'right' 	=> __( 'Right', 'bstone' ),
				'center'    => __( 'Center', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Custom Menu Item 2 Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-cmi-2-alignment]', array(
			'default'           => bstone_get_option( 'header-cmi-2-alignment' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-cmi-2-alignment]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 45,
			'label'    => __( 'Custom Menu Item 2 Alignment', 'bstone' ),
			'choices'  => array(
				'left'    	=> __( 'Left', 'bstone' ),
				'right' 	=> __( 'Right', 'bstone' ),
				'center'    => __( 'Center', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Logo Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-logo-alignment]', array(
			'default'           => bstone_get_option( 'header-logo-alignment' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-logo-alignment]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 50,
			'label'    => __( 'Logo Alignment', 'bstone' ),
			'choices'  => array(
				'left'    	=> __( 'Left', 'bstone' ),
				'right' 	=> __( 'Right', 'bstone' ),
				'center'    => __( 'Center', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Primary Menu Position
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-menu-position]', array(
			'default'           => bstone_get_option( 'header-menu-position' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-menu-position]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 60,
			'label'    => __( 'Primary Menu Position', 'bstone' ),
			'choices'  => array(
				'top'    	=> __( 'Top', 'bstone' ),
				'bottom' 	=> __( 'Bottom', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Primary Menu Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-menu-alignment]', array(
			'default'           => bstone_get_option( 'header-menu-alignment' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-menu-alignment]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 65,
			'label'    => __( 'Primary Menu Alignment', 'bstone' ),
			'choices'  => array(
				'flex-start'=> __( 'Left', 'bstone' ),
				'flex-end' 	=> __( 'Right', 'bstone' ),
				'center'    => __( 'Center', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Bottom Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-sep]', array(
			'default'           => bstone_get_option( 'header-main-sep' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-sep]', array(
			'type'        => 'number',
			'section'     => 'section-header',
			'priority'    => 70,
			'label'       => __( 'Bottom Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Top Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-sep-top]', array(
			'default'           => bstone_get_option( 'header-main-sep-top' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-sep-top]', array(
			'type'        => 'number',
			'section'     => 'section-header',
			'priority'    => 75,
			'label'       => __( 'Nav Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 600,
			),
		)
	);

	/**
	 * Option: Header Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-layout-width]', array(
			'default'           => bstone_get_option( 'header-main-layout-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-layout-width]', array(
			'type'     => 'select',
			'section'  => 'section-header',
			'priority' => 80,
			'label'    => __( 'Header Width', 'bstone' ),
			'choices'  => array(
				'full'    => __( 'Full Width', 'bstone' ),
				'content' => __( 'Content Width', 'bstone' ),
			),
		)
	);


	/**
	 * Option: Mobile Menu Label Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[header-main-menu-label-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-header',
				'priority' => 85,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Mobile Menu Label
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-menu-label]', array(
			'default'   => bstone_get_option( 'header-main-menu-label' ),
			'type'      => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-menu-label]', array(
			'section'     => 'section-header',
			'priority'    => 90,
			'label'       => __( 'Menu Label on Small Devices', 'bstone' ),
			'type'        => 'text',
		)
	);

	/**
	 * Option: Mobile Menu Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[header-main-menu-align]', array(
			'default'           => bstone_get_option( 'header-main-menu-align' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[header-main-menu-align]', array(
			'type'        => 'select',
			'section'     => 'section-header',
			'priority'    => 95,
			'label'       => __( 'Mobile Header Alignment', 'bstone' ),
			'choices'     => array(
				'inline'    => __( 'Inline', 'bstone' ),
				'stack'      => __( 'Stack', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Disable Menu
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[custom-menu-in-responsive]', array(
			'default'           => bstone_get_option( 'custom-menu-in-responsive' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[custom-menu-in-responsive]', array(
			'type'        => 'checkbox',
			'section'     => 'section-header',
			'label'       => __( 'Display Custom Menu Items in Responsive Menu', 'bstone' ),
			'priority'    => 100,
		)
	);
