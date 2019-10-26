<?php
/**
 * Bstone Theme Strings
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

/**
 * Default Strings
 */
if ( ! function_exists( 'bstone_default_strings' ) ) {

	/**
	 * Default Strings
	 *
	 * @since 1.0.0
	 * @param  string  $key  String key.
	 * @param  boolean $echo Print string.
	 * @return mixed        Return string or nothing.
	 */
	function bstone_default_strings( $key, $echo = true ) {

		$defaults = apply_filters(
			'bstone_default_strings', array(

				// Header.
				'string-header-skip-link'                => __( 'Skip to content', 'bstone' ),

				// Blog Default Strings.
				'string-blog-navigation-next'            => __( 'Next Page', 'bstone' ) . ' <span class="bst-right-arrow">&rarr;</span>',
				'string-blog-navigation-previous'        => '<span class="bst-left-arrow">&larr;</span> ' . __( 'Previous Page', 'bstone' ),
				'string-single-page-links-before'		 => __( 'Pages:', 'bstone' ),
				'string-blog-navigation-next'            => __( 'Next Page', 'bstone' ) . ' <span class="bst-right-arrow">&rarr;</span>',
				'string-blog-navigation-previous'        => '<span class="bst-left-arrow">&larr;</span> ' . __( 'Previous Page', 'bstone' ),
				'string-post-by-title'		 			 => __( 'Posts by', 'bstone' ),
				'string-comment-field-label'		 	 => __( 'Comment', 'bstone' ),
				'string-comment-field-placeholder'		 => __( 'Type Here...', 'bstone' ),

				// Single Post Default Strings.
				'string-single-page-links-before'        => __( 'Pages:', 'bstone' ),
				/* translators: 1: Post type label */
				'string-single-navigation-next'          => __( 'Next %s', 'bstone' ) . ' <span class="bst-right-arrow">&rarr;</span>',
				/* translators: 1: Post type label */
				'string-single-navigation-previous'      => '<span class="bst-left-arrow">&larr;</span> ' . __( 'Previous %s', 'bstone' ),
				'string-related-posts-title'		 	 => __( 'Related Posts', 'bstone' ),

				// Content None.
				'string-content-nothing-found-message'   => __( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'bstone' ),

				// Search Page Strings.
				'string-search-nothing-found'            => __( 'Nothing Found', 'bstone' ),
				'string-search-nothing-found-message'    => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'bstone' ),
				'string-full-width-search-message'       => __( 'Start typing and press enter to search', 'bstone' ),
				'string-full-width-search-placeholder'   => __( 'Start Typing&hellip;', 'bstone' ),
				'string-header-cover-search-placeholder' => __( 'Start Typing&hellip;', 'bstone' ),
				'string-search-input-placeholder'        => __( 'Search &hellip;', 'bstone' ),

				// Breadcrumb Strings
				'string-breadcrumb-home'            	 => __( 'Home', 'bstone' ),
				'string-breadcrumb-author-archive'		 => __( 'Author archive for ', 'bstone' ),
				'string-breadcrumb-search'		 		 => __( 'Search query for: ', 'bstone' ),
				'string-breadcrumb-not-found'		 	 => __( 'Error 404: ', 'bstone' ),

			)
		);
		
		if ( is_rtl() ) {
			$defaults['string-blog-navigation-next']     = __( 'Next Page', 'bstone' ) . ' <span class="bst-left-arrow">&larr;</span>';
			$defaults['string-blog-navigation-previous'] = '<span class="bst-right-arrow">&rarr;</span> ' . __( 'Previous Page', 'bstone' );

			/* translators: 1: Post type label */
			$defaults['string-single-navigation-next'] = __( 'Next %s', 'bstone' ) . ' <span class="bst-left-arrow">&larr;</span>';
			/* translators: 1: Post type label */
			$defaults['string-single-navigation-previous'] = '<span class="bst-right-arrow">&rarr;</span> ' . __( 'Previous %s', 'bstone' );
		}

		$output = isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';

		/**
		 * Print or return
		 */
		if ( $echo ) {
			echo $output;
		} else {
			return $output;
		}
	}
}// End if().
