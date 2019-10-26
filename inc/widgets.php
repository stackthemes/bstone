<?php
/**
 * Widget and sidebars related functions
 *
 * @package     Bstone
 * @author      Stack Themes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bstone_widgets_init() {
	
	/**
	 * Register Main Sidebar
	 */
	
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar 1', 'bstone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bstone' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	/**
	 * Register Extra Sidebar - To activate both sidebars
	 */
	
	register_sidebar( array(
		'name'          => esc_html__( 'Main Sidebar 2', 'bstone' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'An extra sidebar to activate both sidebars (Left & Right). Add widgets here.', 'bstone' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	/**
	 * Register Header Widgets area 1
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget Area 1', 'bstone' ),
		'id'            => 'header-widget-1',
		'description'   => esc_html__( 'Add widgets here.', 'bstone' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	/**
	 * Register Header Widgets area 2
	 */
	register_sidebar( array(
		'name'          => esc_html__( 'Header Widget Area 2', 'bstone' ),
		'id'            => 'header-widget-2',
		'description'   => esc_html__( 'Add widgets here.', 'bstone' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	/**
	 * Register Footer Bar Widgets area
	 */
	register_sidebar(
		apply_filters(
			'bstone_footer_1_widgets_init', array(
				'name'          => esc_html__( 'Footer Bar Section 1', 'bstone' ),
				'id'            => 'footer-widget-1',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		)
	);

	register_sidebar(
		apply_filters(
			'bstone_footer_2_widgets_init', array(
				'name'          => esc_html__( 'Footer Bar Section 2', 'bstone' ),
				'id'            => 'footer-widget-2',
				'description'   => '',
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		)
	);

	/**
	 * Register Footer Widgets area
	 */
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area 1', 'bstone' ),
			'id'            => 'advanced-footer-widget-1',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area 2', 'bstone' ),
			'id'            => 'advanced-footer-widget-2',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area 3', 'bstone' ),
			'id'            => 'advanced-footer-widget-3',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget Area 4', 'bstone' ),
			'id'            => 'advanced-footer-widget-4',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bstone_widgets_init' );