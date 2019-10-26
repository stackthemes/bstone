<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

/**
 * Themes and Plugins can check for bstone_hooks using current_theme_supports( 'bstone_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 *      // Declare support for all hook types
 *      add_theme_support( 'bstone_hooks', array( 'all' ) );
 *
 *      // Declare support for certain hook types only
 *      add_theme_support( 'bstone_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */

/**
 * Themes and Plugins can check for bstone_hooks using current_theme_supports( 'bstone_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 *      // Declare support for all hook types
 *      add_theme_support( 'bstone_hooks', array( 'all' ) );
 *
 *      // Declare support for certain hook types only
 *      add_theme_support( 'bstone_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support(
	'bstone_hooks', array(

		/**
		 * As a Theme developer, use the 'all' parameter, to declare support for all
		 * hook types.
		 * Please make sure you then actually reference all the hooks in this file,
		 * Plugin developers depend on it!
		 */
		'all',

		/**
		 * Themes can also choose to only support certain hook types.
		 * Please make sure you then actually reference all the hooks in this type
		 * family.
		 *
		 * When the 'all' parameter was set, specific hook types do not need to be
		 * added explicitly.
		 */
		'html',
		'body',
		'head',
		'header',
		'content',
		'entry',
		'comments',
		'sidebars',
		'sidebar',
		'footer',

	/**
	 * If/when WordPress Core implements similar methodology, Themes and Plugins
	 * will be able to check whether the version of THA supplied by the theme
	 * supports Core hooks.
	 */
	)
);

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 *      if ( current_theme_supports( 'bstone_hooks', 'header' ) )
 *          add_action( 'bstone_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool  $bool true.
 * @param array $args The hook type being checked.
 * @param array $registered All registered hook types.
 *
 * @return bool
 */
function bstone_current_theme_supports( $bool, $args, $registered ) {
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-bstone_hooks', 'bstone_current_theme_supports', 10, 3 );

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $bstone_supports[] = 'html;
 */
function bstone_html_before() {
	do_action( 'bstone_html_before' );
}
/**
 * HTML <body> hooks
 * $bstone_supports[] = 'body';
 */
function bstone_body_top() {
	do_action( 'bstone_body_top' );
}

/**
 * Body Bottom
 */
function bstone_body_bottom() {
	do_action( 'bstone_body_bottom' );
}

/**
 * HTML <head> hooks
 *
 * $bstone_supports[] = 'head';
 */
function bstone_head_top() {
	do_action( 'bstone_head_top' );
}

/**
 * Head Bottom
 */
function bstone_head_bottom() {
	do_action( 'bstone_head_bottom' );
}

/**
 * Semantic <header> hooks
 *
 * $bstone_supports[] = 'header';
 */
function bstone_header_before() {
	do_action( 'bstone_header_before' );
}

/**
 * Site Header
 */
function bstone_header() {
	do_action( 'bstone_header' );
}

/**
 * Masthead Top
 */
function bstone_masthead_top() {
	do_action( 'bstone_masthead_top' );
}

/**
 * Masthead
 */
function bstone_masthead() {
	do_action( 'bstone_masthead' );
}

/**
 * Masthead Bottom
 */
function bstone_masthead_bottom() {
	do_action( 'bstone_masthead_bottom' );
}

/**
 * Header After
 */
function bstone_header_after() {
	do_action( 'bstone_header_after' );
}

/**
 * Main Header bar top
 */
function bstone_main_header_bar_top() {
	do_action( 'bstone_main_header_bar_top' );
}

/**
 * Main Header bar bottom
 */
function bstone_main_header_bar_bottom() {
	do_action( 'bstone_main_header_bar_bottom' );
}

/**
 * Main Header Content
 */
function bstone_masthead_content() {
	do_action( 'bstone_masthead_content' );
}
/**
 * Main toggle button before
 */
function bstone_masthead_toggle_buttons_before() {
	do_action( 'bstone_masthead_toggle_buttons_before' );
}

/**
 * Main toggle buttons
 */
function bstone_masthead_toggle_buttons() {
	do_action( 'bstone_masthead_toggle_buttons' );
}

/**
 * Main toggle button after
 */
function bstone_masthead_toggle_buttons_after() {
	do_action( 'bstone_masthead_toggle_buttons_after' );
}

/**
 * Semantic <content> hooks
 *
 * $bstone_supports[] = 'content';
 */
function bstone_content_before() {
	do_action( 'bstone_content_before' );
}

/**
 * Content after
 */
function bstone_content_after() {
	do_action( 'bstone_content_after' );
}

/**
 * Content top
 */
function bstone_content_top() {
	do_action( 'bstone_content_top' );
}

/**
 * Content bottom
 */
function bstone_content_bottom() {
	do_action( 'bstone_content_bottom' );
}

/**
 * Content while before
 */
function bstone_content_while_before() {
	do_action( 'bstone_content_while_before' );
}

/**
 * Content while after
 */
function bstone_content_while_after() {
	do_action( 'bstone_content_while_after' );
}

/**
 * Semantic <entry> hooks
 *
 * $bstone_supports[] = 'entry';
 */
function bstone_entry_before() {
	do_action( 'bstone_entry_before' );
}

/**
 * Entry after
 */
function bstone_entry_after() {
	do_action( 'bstone_entry_after' );
}

/**
 * Entry content before
 */
function bstone_entry_content_before() {
	do_action( 'bstone_entry_content_before' );
}

/**
 * Entry content after
 */
function bstone_entry_content_after() {
	do_action( 'bstone_entry_content_after' );
}

/**
 * Entry Top
 */
function bstone_entry_top() {
	do_action( 'bstone_entry_top' );
}

/**
 * Entry bottom
 */
function bstone_entry_bottom() {
	do_action( 'bstone_entry_bottom' );
}

/**
 * Blog entry title before
 */
function bstone_blog_entry_title_before() {
	do_action( 'bstone_blog_entry_title_before' );
}

/**
 * Blog entry title after
 */
function bstone_blog_entry_title_after() {
	do_action( 'bstone_blog_entry_title_after' );
}

/**
 * Single Post/Page Header
 */
function bstone_single_header() {
	do_action( 'bstone_single_header' );
}

/**
 * Single Post/Page Header Before
 */
function bstone_single_header_before() {
	do_action( 'bstone_single_header_before' );
}

/**
 * Single Post/Page Header After
 */
function bstone_single_header_after() {
	do_action( 'bstone_single_header_after' );
}

/**
 * Single Post/Page Header Top
 */
function bstone_single_header_top() {
	do_action( 'bstone_single_header_top' );
}

/**
 * Single Post/Page Header Title Before
 */
function bstone_single_header_title_before() {
	do_action( 'bstone_single_header_title_before' );
}

/**
 * Single Post/Page Header Title After
 */
function bstone_single_header_title_after() {
	do_action( 'bstone_single_header_title_after' );
}

/**
 * Single Post/Page Header Bottom
 */
function bstone_single_header_bottom() {
	do_action( 'bstone_single_header_bottom' );
}

/**
 * Comments block hooks
 *
 * $bstone_supports[] = 'comments';
 */
function bstone_comments_before() {
	do_action( 'bstone_comments_before' );
}

/**
 * Comments after.
 */
function bstone_comments_after() {
	do_action( 'bstone_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $bstone_supports[] = 'sidebar';
 */
function bstone_sidebars_before() {
	do_action( 'bstone_sidebars_before' );
}

/**
 * Sidebars after
 */
function bstone_sidebars_after() {
	do_action( 'bstone_sidebars_after' );
}

/**
 * Semantic <footer> hooks
 *
 * $bstone_supports[] = 'footer';
 */
function bstone_footer() {
	do_action( 'bstone_footer' );
}

/**
 * Footer before
 */
function bstone_footer_before() {
	do_action( 'bstone_footer_before' );
}

/**
 * Footer after
 */
function bstone_footer_after() {
	do_action( 'bstone_footer_after' );
}

/**
 * Footer top
 */
function bstone_footer_content_top() {
	do_action( 'bstone_footer_content_top' );
}

/**
 * Footer
 */
function bstone_footer_content() {
	do_action( 'bstone_footer_content' );
}

/**
 * Footer markup
 */
function bstone_footer_content_markup() {
	do_action( 'bstone_footer_content_markup' );
}

/**
 * Footer bottom
 */
function bstone_footer_content_bottom() {
	do_action( 'bstone_footer_content_bottom' );
}

/**
 * Archive header
 */
function bstone_archive_header() {
	do_action( 'bstone_archive_header' );
}

/**
 * Pagination
 */
function bstone_pagination() {
	do_action( 'bstone_pagination' );
}

/**
 * Primary Content Top
 */
function bstone_primary_content_top() {
	do_action( 'bstone_primary_content_top' );
}

/**
 * Primary Content Bottom
 */
function bstone_primary_content_bottom() {
	do_action( 'bstone_primary_content_bottom' );
}

/**
 * 404
 */
function bstone_entry_content_404_page() {
	do_action( 'bstone_entry_content_404_page' );
}