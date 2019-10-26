<?php
/**
 * Bstone Meta Box Functions
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.6
 */

/**
 * Meta Box
 */
if ( ! class_exists( 'Bstone_Meta_Box_Functions' ) ) {

	/**
	 * Meta Box
	 */
	class Bstone_Meta_Box_Functions {
        /**
		 * Instance
		 *
		 * @var $instance
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
		public function __construct() {
			add_action( 'wp', array( $this, 'meta_hooks' ) );
		}

		/**
		 * Metabox Hooks
		 */
		function meta_hooks() {

			if ( is_singular() ) {
				add_action( 'wp_head', array( $this, 'primary_header' ) );
                add_filter( 'bstone_the_title_enabled', array( $this, 'post_title' ) );
				add_filter( 'bstone_footer_top_enabled', array( $this, 'footer_top' ) );
				add_filter( 'bstone_footer_bottom_enabled', array( $this, 'footer_bottom' ) );
			}
		}

		/**
		 * Primary Header
		 */
		function primary_header() {

			$display_header = get_post_meta( get_the_ID(), 'bst-main-header-display', true );

			$display_header = apply_filters( 'bst_main_header_display', $display_header );

			if ( 'disabled' == $display_header ) {

				remove_action( 'bstone_masthead', 'bstone_masthead_default_template' );
				remove_action( 'bstone_masthead', 'bstone_pro_header_markup' );
			}
		}

		/**
		 * Disable Post / Page Title
		 *
		 * @param  boolean $defaults Show default post title.
		 * @return boolean Status of default post title.
		 */
		function post_title( $defaults ) {

			$title = get_post_meta( get_the_ID(), 'site-post-title', true );
			if ( 'disabled' == $title ) {
				$defaults = false;
			}

			return $defaults;
        }
        
        /**
		 * Disable Footer Top Area
		 *
		 * @param  boolean $defaults Show default footer top.
		 * @return boolean Status of default post footer top.
		 */
        function footer_top( $defaults ) {

            $footer_top = get_post_meta( get_the_ID(), 'bst-footer-top-area', true );
            if ( 'disabled' == $footer_top ) {
				$defaults = false;
            }
            
            return $defaults;
        }
        
        /**
		 * Disable Footer Bottom Area
		 *
		 * @param  boolean $defaults Show default footer bottom.
		 * @return boolean Status of default footer bottom.
		 */
        function footer_bottom( $defaults ) {

            $footer_bottom = get_post_meta( get_the_ID(), 'bst-footer-bottom-area', true );
            if ( 'disabled' == $footer_bottom ) {
				$defaults = false;
            }
            
            return $defaults;
        }
    }
}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Bstone_Meta_Box_Functions::get_instance();