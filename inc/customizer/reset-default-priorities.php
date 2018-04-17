<?php
/**
 * Reset Customizer Default Section/Control Priorities
 *
 * @package   Bstone
 * @author    Stack Themes
 * @copyright Copyright (c) 2017, Bstone
 * @link      https://wpbstone.com/
 * @since     Bstone 1.0.0
 */

if ( ! class_exists( 'ST_Customizer_Reset_Priority' ) ) {

	/**
	 * ST_Customizer_Reset_Priority initial setup
	 *
	 * @since 1.0.0
	 */
	class ST_Customizer_Reset_Priority {

		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {

			// Strip away unused customizer nodes.
			add_action( 'customize_register', array( $this, 'move_controls' ), 999 );
		}
		
		/**
	   * Move stuff to other sections - That WordPress adds to the customizer.
	   *
	   * param object $wp_customize An instance of WP_Customize_Manager.
	   */
	   public function move_controls( $wp_customize ) {
		   
		   $header_image  	    = $wp_customize->get_control( 'header_image' );
		   $background_image    = $wp_customize->get_control( 'background_image' );
		   $background_color    = $wp_customize->get_control( 'background_color' );
		   $header_text_color   = $wp_customize->get_control( 'header_textcolor' );
		   
		   if ( $header_image ) {
			   $header_image->section  = 'section-color-header';
			   $header_image->priority = 23;
		   }
		   
		   if ( $background_image ) {
			   $background_image->section = 'section-color-general';
		   }
		   
		   if ( $background_color ) {
			   $background_color->priority = 22;
			   $background_color->section  = 'section-color-header';
		   }
		   
		   if ( $header_text_color ) {
			   $header_text_color->priority = 5;
			   $header_text_color->section  = 'section-color-header';
		   }

	   }
	}
}// End if().

/**
 * Kicking this off by calling 'get_instance()' method
 */
ST_Customizer_Reset_Priority::get_instance();