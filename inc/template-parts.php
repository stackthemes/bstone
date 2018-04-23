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
