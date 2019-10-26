<?php
/**
 * Register customizer panels & sections.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

/********************************
 * Layout Panel
 ********************************/
$wp_customize->add_panel(
	'panel-layout', array(
		'priority' => 6,
		'title'    => __( 'Layout', 'bstone' ),
	)
);

	$wp_customize->add_section(
		'section-site-layout', array(
			'priority' => 10,
			'panel'    => 'panel-layout',
			'title'    => __( 'Site Layout', 'bstone' ),
		)
	);

	$wp_customize->add_section(
		'section-container-layout', array(
			'priority' => 20,
			'panel'    => 'panel-layout',
			'title'    => __( 'Container', 'bstone' ),
		)
	);

	$wp_customize->add_section(
		'section-header', array(
			'title'    => __( 'Header', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'section-sidebars', array(
			'title'    => __( 'Sidebar', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 40,
		)
	);

	$wp_customize->add_section(
		'section-blog', array(
			'title'    => __( 'Blog / Archive', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 50,
		)
	);

	$wp_customize->add_section(
		'section-single', array(
			'title'    => __( 'Single Post', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 60,
		)
	);

	$wp_customize->add_section(
		'section-title', array(
			'title'    => __( 'Page / Post Title', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 70,
		)
	);

	$wp_customize->add_section(
		'section-footer', array(
			'title'    => __( 'Footer', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 80,
		)
	);

	$wp_customize->add_section(
		'section-buttons', array(
			'title'    => __( 'Buttons', 'bstone' ),
			'panel'    => 'panel-layout',
			'priority' => 90,
		)
	);

/********************************
 * Colors & Background
 ********************************/
$wp_customize->add_panel(
	'panel-colors', array(
		'priority' => 10,
		'title'    => __( 'Colors & Background', 'bstone' ),
	)
);

	$wp_customize->add_section(
		'section-color-general', array(
			'title'    => __( 'Content', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'section-color-header', array(
			'title'    => __( 'Header', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'section-color-sidebar', array(
			'title'    => __( 'Sidebar', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 30,
			'active_callback' => 'bstone_sidebar_activeornot',
		)
	);

	$wp_customize->add_section(
		'section-color-footer', array(
			'title'    => __( 'Footer', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 40,
			'active_callback' => 'bstone_footer_adv_active_sec',
		)
	);

	$wp_customize->add_section(
		'section-color-footer-bar', array(
			'title'    => __( 'Footer Bar', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 50,
			'active_callback' => 'bstone_footer_sml_active_sec',
		)
	);

	$wp_customize->add_section(
		'section-color-blog', array(
			'title'    => __( 'Blog', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 60,
		)
	);

	$wp_customize->add_section(
		'section-color-page-title', array(
			'title'    => __( 'Post / Page Title', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 70,
		)
	);

	$wp_customize->add_section(
		'section-color-buttons', array(
			'title'    => __( 'Buttons', 'bstone' ),
			'panel'    => 'panel-colors',
			'priority' => 80,
		)
	);

/********************************
 * Typography
 ********************************/
$wp_customize->add_panel(
	'panel-typography', array(
		'priority' => 15,
		'title'    => __( 'Typography', 'bstone' ),
	)
);

	$wp_customize->add_section(
		'section-default-typo-settings', array(
			'title'    => __( 'Default', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'section-general-typo-settings', array(
			'title'    => __( 'Content', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'section-header-typo-settings', array(
			'title'    => __( 'Header', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'section-sidebar-typo-settings', array(
			'title'    => __( 'Sidebar', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 40,
			'active_callback' => 'bstone_sidebar_activeornot',
		)
	);

	$wp_customize->add_section(
		'section-footer-typo-settings', array(
			'title'    		  => __( 'Footer', 'bstone' ),
			'panel'    		  => 'panel-typography',
			'priority' 		  => 50,
			'active_callback' => 'bstone_footer_adv_active_sec',
		)
	);

	$wp_customize->add_section(
		'section-footer-bar-typo-settings', array(
			'title'    		  => __( 'Footer Bar', 'bstone' ),
			'panel'    		  => 'panel-typography',
			'priority' 		  => 60,
			'active_callback' => 'bstone_footer_sml_active_sec',
		)
	);

	$wp_customize->add_section(
		'section-archive-typo-settings', array(
			'title'    => __( 'Blog / Archive', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 70,
		)
	);

	$wp_customize->add_section(
		'section-single-typo-settings', array(
			'title'    => __( 'Post / Page Title', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 80,
		)
	);

	$wp_customize->add_section(
		'section-buttons-typo-settings', array(
			'title'    => __( 'Buttons', 'bstone' ),
			'panel'    => 'panel-typography',
			'priority' => 90,
		)
	);

/********************************
 * Spacing
 ********************************/
$wp_customize->add_panel(
	'panel-spacing', array(
		'priority' => 20,
		'title'    => __( 'Spacing', 'bstone' ),
	)
);

	$wp_customize->add_section(
		'section-spacing-header', array(
			'priority' => 10,
			'panel'    => 'panel-spacing',
			'title'    => __( 'Header', 'bstone' ),
		)
	);

	$wp_customize->add_section(
		'section-spacing-content', array(
			'priority' => 20,
			'panel'    => 'panel-spacing',
			'title'    => __( 'Content', 'bstone' ),
		)
	);

	$wp_customize->add_section(
		'section-spacing-sidebar', array(
			'priority' 		  => 30,
			'panel'    		  => 'panel-spacing',
			'title'    		  => __( 'Sidebar', 'bstone' ),
			'active_callback' => 'bstone_sidebar_activeornot',
		)
	);

	$wp_customize->add_section(
		'section-spacing-footer', array(
			'priority' => 40,
			'panel'    => 'panel-spacing',
			'title'    => __( 'Footer', 'bstone' ),
			'active_callback' => 'bstone_footer_adv_active_sec',
		)
	);

	$wp_customize->add_section(
		'section-spacing-footer-bar', array(
			'priority' => 50,
			'panel'    => 'panel-spacing',
			'title'    => __( 'Footer Bar', 'bstone' ),
			'active_callback' => 'bstone_footer_sml_active_sec',
		)
	);

	$wp_customize->add_section(
		'section-spacing-blog', array(
			'priority' 		  => 60,
			'panel'    		  => 'panel-spacing',
			'title'    		  => __( 'Blog / Archive', 'bstone' ),
		)
	);

	$wp_customize->add_section(
		'section-spacing-blog-single', array(
			'priority' 		  => 70,
			'panel'    		  => 'panel-spacing',
			'title'    		  => __( 'Single Post', 'bstone' ),
		)
	);

	$wp_customize->add_section(
		'section-spacing-page-title', array(
			'priority' 		  => 75,
			'panel'    		  => 'panel-spacing',
			'title'    		  => __( 'Post / Page Title', 'bstone' ),
		)
	);

/********************************
 * Site Settings Panel
 ********************************/
$wp_customize->add_panel(
	'panel-extra-elements', array(
		'priority' => 120,
		'title'    => __( 'Settings', 'bstone' ),
	)
);

	$wp_customize->add_section(
		'section-general-settings', array(
			'title'    => __( 'General Settings', 'bstone' ),
			'panel'    => 'panel-extra-elements',
			'priority' => 10,
		)
	);

	$wp_customize->add_section(
		'section-posts-slider', array(
			'title'    => __( 'Posts Banner / Slider', 'bstone' ),
			'panel'    => 'panel-extra-elements',
			'priority' => 20,
		)
	);

	$wp_customize->add_section(
		'section-pagination-settings', array(
			'title'    => __( 'Pagination', 'bstone' ),
			'panel'    => 'panel-extra-elements',
			'priority' => 30,
		)
	);

	$wp_customize->add_section(
		'section-forms-settings', array(
			'title'    => __( 'Forms', 'bstone' ),
			'panel'    => 'panel-extra-elements',
			'priority' => 40,
		)
	);

	$wp_customize->add_section(
		'section-scroll-top-settings', array(
			'title'    => __( 'Scroll To Top', 'bstone' ),
			'panel'    => 'panel-extra-elements',
			'priority' => 50,
		)
	);

/********************************
 * Callback Functions
 ********************************/

function bstone_footer_adv_active_sec() {
	if( 'disabled' == bstone_options('footer-adv') ) {
		return false;
	}
	return true;
}

function bstone_footer_sml_active_sec() {
	if( 'disabled' == bstone_options('footer-sml-layout') ) {
		return false;
	}
	return true;
}

function bstone_sidebar_activeornot(){
	if(
		'no-sidebar' == bstone_options('site-sidebar-layout') && 

		('default' == bstone_options('single-page-sidebar-layout') ||
		 'no-sidebar' == bstone_options('single-page-sidebar-layout')) && 

		('default' == bstone_options('single-post-sidebar-layout') ||
		 'no-sidebar' == bstone_options('single-post-sidebar-layout')) && 

		('default' == bstone_options('archive-post-sidebar-layout') ||
		 'no-sidebar' == bstone_options('archive-post-sidebar-layout'))
	) {
		return false;
	}
	return true;
}