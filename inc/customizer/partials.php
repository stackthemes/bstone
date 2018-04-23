<?php
/**
 * Customizer Partial.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customizer Partials
 *
 * @since 1.0.0
 */
if ( ! class_exists( 'Bstone_Customizer_Partials' ) ) {

	/**
	 * Customizer Partials initial setup
	 */
	class Bstone_Customizer_Partials {

		/**
		 * Instance
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() { }

		/**
		 * Render Partial Header Right Section HTML
		 */
		static function _render_header_main_rt_section_html() {

			$right_section_html = bstone_get_option( 'header-main-rt-section-html' );

			return do_shortcode( $right_section_html );
		}
	}
}// End if().

/**
 * Kicking this off by calling 'get_instance()' method
 */
Bstone_Customizer_Partials::get_instance();
