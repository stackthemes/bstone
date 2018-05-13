<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package bstone
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bstone_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a class of header type
	if( bstone_options( 'header-layouts' ) == 'header-main-layout-1' ) {
		$classes[] = 'header-1';
	} else if( bstone_options( 'header-layouts' ) == 'header-main-layout-2' ) {
		$classes[] = 'header-2';
	}
	
	// Adds a class of page container layout
	$classes[] = bstone_page_container_type();
	
	// Masonry Blog Posts
	if( 'masonry' == bstone_options( 'blog-style' ) ) {
		$classes[] = 'bst-masonry-posts';
	}
	
	// Inline menu toggle button
	if( 'inline' == bstone_options( 'header-main-menu-align' ) ) {
		$classes[] = 'inline-menu-toggle';
	} else if( 'stack' == bstone_options( 'header-main-menu-align' ) ) {
		$classes[] = 'stack-menu-toggle';
	}
	
	// Display custom menu items in responsive menu
	if( bstone_options( 'custom-menu-in-responsive' ) ) {
		$classes[] = 'display-custom-menu-responsive';
	} else {
		$classes[] = 'hide-custom-menu-responsive';
	}

	return $classes;
}
add_filter( 'body_class', 'bstone_body_classes' );

/**
 * bstone_page_container_type()
 *
 * Get page layout settings to add related class to body classes
 */
if ( ! function_exists( 'bstone_page_container_type' ) ) {

	/**
	 * Site Container Layout
	 *
	 * Default 'Full Width / Contained' for overall site.
	 */
	function bstone_page_container_type() {
		if ( is_singular() ) {

			// If post meta value is empty,
			// Then get the POST_TYPE layout.
			$layout = bstone_get_option_meta( 'site-content-layout', '', true );

			if ( empty( $layout ) ) {

				$layout = bstone_options( 'single-' . get_post_type() . '-content-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global container value.
					// NOTE: Here not used `true` in the below function call.
					$layout = bstone_options( 'site-default-layout' );
				}
			}
		} else {
			
			if ( is_search() ) {

				// Check only post type archive option value.
				$layout = bstone_options( 'archive-post-content-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global content value.
					// NOTE: Here not used `true` in the below function call.
					$layout = bstone_options( 'site-default-layout' );
				}
			} else {

				$layout = bstone_options( 'archive-' . get_post_type() . '-content-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global content value.
					// NOTE: Here not used `true` in the below function call.
					$layout = bstone_options( 'site-default-layout' );
				}// End if().
			}
		} // End if().
		
		$layout_class = '';
		
		if('boxed-container'==$layout || 'separate-container'==$layout || 'plain-container'==$layout || 'page-builder'==$layout) {
			$layout_class = $layout;
		} else {
			$layout_class = bstone_options( 'site-default-layout' );
		}

		$layout_class = esc_attr( $layout_class );
		
		return apply_filters( 'bstone_page_container_type', $layout_class );
	}
}

/**
 * Get title section classes
 */
if ( ! function_exists( 'bstone_title_section_classes' ) ) {

	function bstone_title_section_classes() {

		$classes[] = "st-container clear page-header-inner";

		// Get page title alignment settings
		$page_title_alignment = bstone_options( 'page-title-alignment' );

		switch ($page_title_alignment) {
			case "centre":
				$classes[] = "title-center";
				break;
			case "left":
				$classes[] = "title-left";
				break;
			case "right":
				$classes[] = "title-right";
				break;
			case "inline":
				$classes[] = "title-inline st-flex";
				break;
			default:
				$classes[] = "title-center";
		}

		$classes_markup = 'class="'.implode(" ", $classes).'"';

		return apply_filters( 'bstone_title_section_classes', $classes_markup);
	}
}

