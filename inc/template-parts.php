<?php
/**
 * Template parts
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

add_action( 'bstone_masthead', 'bstone_masthead_default_template' );
add_action( 'bstone_footer_content', 'bstone_footer_default_template' );
add_action( 'bstone_entry_content_404_page', 'bstone_entry_content_404_page_template' );

/**
 * Primary Header
 */
if ( ! function_exists( 'bstone_masthead_default_template' ) ) {

	/**
	 * Primary Header
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 */
	function bstone_masthead_default_template() {
		bstone_render_header_change();
	}
}

/**
 * Footer Content
 */
if ( ! function_exists( 'bstone_footer_default_template' ) ) {

	/**
	 * Primary Header
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 */
	function bstone_footer_default_template() {
		bstone_render_footer_change();
	}
}

/**
 * 404 markup
 */
if ( ! function_exists( 'bstone_entry_content_404_page_template' ) ) {

	/**
	 * 404 markup
	 *
	 * => Used in files:
	 *
	 * /template-parts/content-404.php
	 *
	 * @since 1.2.2
	 */
	function bstone_entry_content_404_page_template() {
		get_template_part( 'template-parts/404/404-layout', '' );
	}
}