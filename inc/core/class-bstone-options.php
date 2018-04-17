<?php
/**
 * Bstone Theme Options
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

/**
 * Theme Options
 */
if ( ! class_exists( 'Bstone_Theme_Options' ) ) {
	/**
	 * Theme Options
	 */
	class Bstone_Theme_Options {
		/**
		 * Class instance.
		 *
		 * @access private
		 * @var $instance Class instance.
		 */
		private static $instance;
		/**
		 * Post id.
		 *
		 * @var $instance Post id.
		 */
		public static $post_id = null;
		/**
		 * A static option variable.
		 *
		 * @since 1.0.0
		 * @access private
		 * @var mixed $db_options
		 */
		private static $db_options;
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

			// Refresh options variables after customizer save.
			add_action( 'after_setup_theme', array( $this, 'refresh' ) );

		}

		/**
		 * Set default theme option values
		 *
		 * @since 1.0.0
		 * @return default values of the theme.
		 */
		public static function defaults() {
			// Defaults list of options.
			return apply_filters(
				'bstone_theme_defaults', array(
					
					// General.
					'bst-header-retina-logo'   => '',
					'bst-header-logo-width'    => '',
					'display-site-title'       => 1,
					'display-site-tagline'     => 0,
					'bstone-schema-markup'     => true,
					'bstone-css-location'	   => 'head',
					'bstone-customizer-type'   => 'basic',
				
					'bstone-font-awesome-icons'   => true,
					'bstone-font-awesome-brands'  => true,
					'bstone-font-awesome-regular' => false,
					'bstone-font-awesome-light'   => true,
					'bstone-font-awesome-solid'   => false,
				
					'search-source'            => 'any',
					'search-results-per-page'  => 10,
					
					// Site Layout
					'site-content-width'               => 1200,
				
					// Container.
					'site-default-layout'       		=> 'plain-container',
					'single-page-content-layout'        => 'default',
					'single-post-content-layout'        => 'default',
					'archive-post-content-layout'       => 'default',
					
					'primarycnt_top_border'				=> 0,
					'primarycnt_bottom_border'			=> 0,
					'primarycnt_left_border'			=> 0,
					'primarycnt_right_border'			=> 1,
				
					// Header.
					'disable-primary-nav'               => false,
					'header-layouts'                    => 'header-main-layout-1',
					'header-main-rt-section'            => 'none',
					'header-main-rt-section-2'          => 'none',
					'header-main-rt-section-html'       => '<button>' . __( 'Contact Us' , 'bstone' ) . '</button>',
					'header-main-rt-section-2-html'     => '<button>' . __( 'Contact Us' , 'bstone' ) . '</button>',
					'header-main-sep'                   => 1,
					'header-main-sep-color'             => '#e0e0e0',
					'header-main-sep-top'               => 1,
					'header-main-sep-top-color'         => '',
					'header-main-layout-width'          => 'content',
					'header-main-menu-label'            => '',
					'header-main-menu-align'            => 'inline',
					'header-cmi-1-alignment'            => 'left',
					'header-cmi-2-alignment'            => 'right',
					'header-logo-alignment'				=> 'left',
					'header-logo-display'				=> 1,
					'header-menu-position'            	=> 'bottom',
					'header-menu-alignment'            	=> 'center',
					'custom-menu-in-responsive'         => 0,
					'header-2-items-position'           => array(
						'menu-item-1',
						'logo',
						'menu-item-2',
					),
					
					// Footer.
					'footer-adv'                        => 'disabled',
					'footer-sml-layout'                 => 'disabled',
					'footer-top-border-size'			=> 0,
					'footer-bar-top-border-size'		=> 0,
					'footer-bar-bottom-border-size'		=> 0,
					'footer-top-area-width'				=> 'content',
					'footer-bar-width'					=> 'content',

					// Sidebar.
					'site-sidebar-layout'               => 'right-sidebar',
					'site-sidebar-width'                => 30,
					'sidebar_right_border'       		=> 0,
					'sidebar_bottom_border'       		=> 0,
					'sidebar_left_border'       		=> 1,
					'sidebar_top_border'       			=> 0,
					'trtrysidebar_top_border'     		=> 0,
					'trtrysidebar_left_border'  		=> 0,
					'trtrysidebar_bottom_border'    	=> 0,
					'trtrysidebar_right_border'   		=> 0,
					'single-page-sidebar-layout'        => 'default',
					'single-post-sidebar-layout'        => 'default',
					'archive-post-sidebar-layout'       => 'default',
				
					// Buttons Layout
					'btn-border-width'  => 1,
					'btn-border-radius' => 0,
					'btn_top_padding'   => 5,
					'btn_right_padding' => 10,
					'btn_bottom_padding'=> 5,
					'btn_left_padding'  => 10,
					
					'readbtn-border-width'  => 1,
					'readbtn-border-radius' => 0,
					'readbtn_top_padding'   => 0,
					'readbtn_right_padding' => 0,
					'readbtn_bottom_padding'=> 0,
					'readbtn_left_padding'  => 0,
				
					// Blog.
					'blog-post-cols-count' 			  => 3,
					'blog-post-structure'             => array(
						'image',
						'post-title',
						'post-meta',
						'post-content',
						'read-more',
					),
					'blog-width'                      => 'default',
					'blog-max-width'                  => 1200,
					'blog-post-content'               => 'excerpt',
					'blog-post-content-length'        => 30,
					'blog-post-content-more'          => '...',
					'blog-meta'                       => array(
						'comments',
						'date',
						'author',
					),
					'blog-img-custom-width'           => '',
					'blog-img-custom-height'          => '',
					'blog-post-border-radius'         => 0,
					'blog-read-more-text'         	  => 'Read More',
					'blog-read-more-icon'         	  => '',
					'blog-meta-separator'         	  => '-',
					'display-meta-icons'			  => true,
					'meta-icons-type'			  	  => 'regular',
					'display-meta-text'			  	  => true,
					'blog-comments-txt-zero'		  => 'No Comments',
					'blog-comments-txt-one'		  	  => '1 Comment',
					'blog-comments-txt-more'		  => 'Comments',
				
					'blog-img-size'		  			  => 'full',
					'overlay-on-img-hover'			  => false,
					'blog-style'					  => 'full-width',
					'blog-display-style'			  => 'normal',
					'blog-display-style-list'	  	  => 'left',
					'post-type-icon'				  => 'disable',
					'post-icon-position'			  => 'center',
					'post-icon-type'			      => 'far',
					'post-icon-size'			      => 'm', // Medium
					'blog-list-text-position'		  => 'flex-start',
					'blog-title-padding-top'		  => 15,
					'blog-title-padding-bottom'		  => 0,
					'blog-meta-padding-top'		  	  => 10,
					'blog-meta-padding-bottom'		  => 0,
					'blog-content-padding-top'		  => 15,
					'blog-content-padding-bottom'	  => -5,
					'bainner_top_padding'			  => 0,
					'bainner_bottom_padding'		  => 0,
					'bainner_left_padding'			  => 0,
					'bainner_right_padding'			  => 0,
					'baouter_top_padding'			  => 0,
					'baouter_bottom_padding'		  => 20,
					'baouter_left_padding'			  => 0,
					'baouter_right_padding'			  => 0,
				
					// Blog Single.
					'blog-single-post-structure' => array(
						'single-image',
						'single-post-title',
						'single-post-meta',
						'single-post-content',
					),
				
					'blog-single-width'         => 'default',
					'blog-single-max-width'     => 1200,
					'blog-single-meta'          => array(
						'comments',
						'category',
						'author',
					),
					'post-title-display-option' => 0,
					'nex-prev-liks-position'    => 'default',
					'nex-prev-liks-style'       => 'title-arrow-bottom',
					'nex-prev-liks-taxonomy'    => 'default',
					'blog-related-count'        => 3,
					'blog-related-columns'      => 3,
					'blog-related-taxonomy'     => 'tag',
					'blog-related-img-width'    => '',
					'blog-related-img-height'   => '',
					'single-sec-border-size'    => 1,
				
					'single-tags-share-structure' => array(),
				
					'after-single-post-structure' => array (
						'post-next-prev',
						'post-author',
						'post-comments',
					),
				
					// Page / Post Title Section.
					'page-title-structure'      => array(
						'page-title',
						'page-breadcrumbs',
					),
					'page-title-alignment'      => 'centre',
					'page-title-border-width'   => 1,
					'post-title-alignment'      => 'centre',
					'post-title-border-width'   => 1,
				
					'post-title-structure'      => array(
						'post-title',
						'post-breadcrumbs',
					),
				
					// Background & Colors
				
					// -- General Colors
					'base-text-color'        	=> '#3a3a3a',
					'base-heading-color'     	=> '#3a3a3a',
					'link-color'       		 	=> '#3a3a3a',
					'link-h-color'       	 	=> '#3a3a3a',
					'body-bg-color'       	 	=> '#ffffff',
					'main-border-color'      	=> '#e9e9e9',
					'h1-color'       		 	=> '#3a3a3a',
					'h2-color'       		 	=> '#3a3a3a',
					'h3-color'       		 	=> '#3a3a3a',
					'h4-color'       		 	=> '#3a3a3a',
					'h5-color'       		 	=> '#3a3a3a',
					'h6-color'       		 	=> '#3a3a3a',
					'page-bg-img-position' 	 	=> 'center center',
					'page-bg-img-attachment' 	=> 'initial',
					'page-bg-img-repeat' 	 	=> 'no-repeat',
					'page-bg-img-size' 	 	 	=> 'cover',
					'container-bg-color'     	=> '#ffffff',
					'primary-content-bg-color'  => '#ffffff',
				
					'highlight-text-color'  	=> '#ffffff',
				
					// -- Header Colors
					'text-color-header'        		=> '#3a3a3a',
					'link-color-header'    			=> '#3a3a3a',
					'link-hover-color-header'  		=> '#3a3a3a',
					'enable-transparent-header'		=> false,
					'bg-color-header'        		=> '#ffffff',
					'header-main-sep-top-color' 	=> '#ffffff',
					'header-main-sep-color' 		=> '#efefef',
					'menu-bg-color-header' 			=> '#ffffff',
					'menu-link-color-header'    	=> '#3a3a3a',
					'menu-link-hover-color-header'  => '#0274be',
					'site-tital-color'        		=> '#3a3a3a',
					'site-desc-color'        		=> '#3a3a3a',
				
					// -- Sidebar Colors
					'sidebar-widget-title-color'    => '#3a3a3a',
					'sidebar-text-color'    		=> '#3a3a3a',
					'sidebar-link-color'    		=> '#3a3a3a',
					'sidebar-link-color-hover'    	=> '#3a3a3a',
					'sidebar-bg-color'        		=> '#ffffff',
					'widget-bg-color'        		=> '#ffffff',
				
					// -- Blog Colors
					'page-single-title-color'       => '#3a3a3a',
					'page-single-breadcrumbs-color' => '#3a3a3a',
					'page-single-title-bg-color' 	=> '#E7E7E7',
					'title-img-position' 			=> 'center center',
					'title-img-attachment' 			=> 'initial',
					'title-img-repeat' 				=> 'no-repeat',
					'title-img-size' 				=> 'cover',
					'page-title-bg-overlay-color' 	=> 'rgba(10,10,10,0.1)',
					'page-title-border-color' 		=> '#E7E7E7',
					'page-featured-title-bg'      	=> false,
					'post-featured-title-bg'      	=> false,
					'blog-title-color' 				=> '#3a3a3a',
					'blog-meta-color' 				=> '#3a3a3a',
					'blog-meta-link-color' 			=> '#3a3a3a',
					'blog-meta-link-color-hover' 	=> '#3a3a3a',
					'blog-entry-bg-color' 			=> '#ffffff',
					'post-type-icon-color' 			=> '#ffffff',
					'post-type-icon-bg-color' 		=> '#333333',
					'post-type-icon-border-color' 	=> '#333333',
					'post-type-icon-border-size' 	=> 0,
					'post-type-icon-border-radius' 	=> 0,
					'img-caption-padding' 			=> 0,
					'img-caption-color' 			=> '#333333',
					'img-caption-bg-color' 			=> '#f5f5f5',
				
					// -- Buttons Colors
					'buttons-text-color'       			=> '#ffffff',
					'buttons-text-color-hover'      	=> '#ffffff',
					'buttons-background-color'      	=> '#0085BA',
					'buttons-background-color-hover'	=> '#008EC2',
					'buttons-border-color'      		=> '#0085BA',
					'buttons-border-color-hover'      	=> '#008EC2',
				
					'read-text-color'       			=> '#3a3a3a',
					'read-text-color-hover'      		=> '#3a3a3a',
					'read-background-color'      		=> '#ffffff',
					'read-background-color-hover'		=> '#ffffff',
					'read-border-color'      			=> '#ffffff',
					'read-border-color-hover'      		=> '#ffffff',
				
					// -- Footer Colors
					'footer-top-background-color'	 => '#ffffff',
					'footer-top-border-color'	 	 => '#ffffff',
					'footer-top-title-color'	 	 => '#3a3a3a',
					'footer-top-text-color'	 	 	 => '#3a3a3a',
					'footer-top-link-color'	 	 	 => '#3a3a3a',
					'footer-top-link-hover-color'	 => '#3a3a3a',
				
					// -- Footer Bar Colors
					'footer-bottom-bg-color'		 => '#ffffff',
					'footer-bar-top-border-color'	 => '#ffffff',
					'footer-bar-bottom-border-color' => '#ffffff',
					'footer-bottom-title-color' 	 => '#3a3a3a',
					'footer-bottom-text-color' 	 	 => '#3a3a3a',
					'footer-bottom-link-color' 	 	 => '#3a3a3a',
					'footer-bottom-link-hover-color' => '#3a3a3a',

					// Typography.
				
					'font-size-body'                  => array(
						'desktop'      => 15,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'body-font-family'                => 'inherit',
					'body-font-weight'                => 'inherit',
					'default-body-font-family'		  => 'Montserrat',
					'body-line-height'                => '',
					'para-margin-bottom'              => '1.5',
				
					'font-h1-size'					  => array(
						'desktop'      => 48,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-h2-size'					  => array(
						'desktop'      => 36,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-h3-size'					  => array(
						'desktop'      => 32,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-h4-size'					  => array(
						'desktop'      => 28,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-h5-size'					  => array(
						'desktop'      => 24,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					'font-h6-size'					  => array(
						'desktop'      => 18,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'h1-text-transform'				  => '',
					'h2-text-transform'				  => '',
					'h3-text-transform'				  => '',
					'h4-text-transform'				  => '',
					'h5-text-transform'				  => '',
					'h6-text-transform'				  => '',
				
					'h1-font-weight'				  => 'inherit',				
					'h2-font-weight'				  => 'inherit',
					'h3-font-weight'				  => 'inherit',
					'h4-font-weight'				  => 'inherit',
					'h5-font-weight'				  => 'inherit',
					'h6-font-weight'				  => 'inherit',
				
					'h1-font-family'				  => 'inherit',
					'h2-font-family'				  => 'inherit',
					'h3-font-family'				  => 'inherit',
					'h4-font-family'				  => 'inherit',
					'h5-font-family'				  => 'inherit',
					'h6-font-family'				  => 'inherit',
				
					'header-typo-text-font-family'	  => 'inherit',
					'header-typo-text-font-weight'	  => 'inherit',
					'header-typo-text-transform'	  => '',
					'header-typo-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'logo-typo-text-font-family'	  => 'inherit',
					'logo-typo-text-font-weight'	  => 'inherit',
					'logo-typo-text-transform'	  => '',
					'logo-typo-text-font-size'	  => array(
						'desktop'      => 28,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'tagline-typo-text-font-family'	  => 'inherit',
					'tagline-typo-text-font-weight'	  => 'inherit',
					'tagline-typo-text-transform'	  => '',
					'tagline-typo-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'nav-typo-text-font-family'	  => 'inherit',
					'nav-typo-text-font-weight'	  => 'inherit',
					'nav-typo-text-transform'	  => '',
					'nav-typo-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'sidebar-typo-title-font-family'	  => 'inherit',
					'sidebar-typo-title-font-weight'	  => 'inherit',
					'sidebar-typo-title-transform'	  	  => 'none',
					'sidebar-typo-title-font-size'	  	  => array(
						'desktop'      => 22,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'sidebar-typo-text-font-family'	  => 'inherit',
					'sidebar-typo-text-font-weight'	  => 'inherit',
					'sidebar-typo-text-transform'	  => '',
					'sidebar-typo-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'footer-typo-title-font-family'	  => 'inherit',
					'footer-typo-title-font-weight'	  => 'inherit',
					'footer-typo-title-transform'	  => '',
					'footer-typo-title-font-size'	  => array(
						'desktop'      => 18,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'footer-typo-text-font-family'	  => 'inherit',
					'footer-typo-text-font-weight'	  => 'inherit',
					'footer-typo-text-transform'	  => '',
					'footer-typo-text-font-size'	  => array(
						'desktop'      => 13,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'footer-bar-typo-title-font-family'	  => 'inherit',
					'footer-bar-typo-title-font-weight'	  => 'inherit',
					'footer-bar-typo-title-transform'	  => '',
					'footer-bar-typo-title-font-size'	  => array(
						'desktop'      => 22,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'footer-bar-typo-text-font-family'	  => 'inherit',
					'footer-bar-typo-text-font-weight'	  => 'inherit',
					'footer-bar-typo-text-transform'	  => '',
					'footer-bar-typo-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'single-typo-title-font-family'	  => 'inherit',
					'single-typo-title-font-weight'	  => 'inherit',
					'single-typo-title-transform'	  => '',
					'single-typo-title-font-size'	  => array(
						'desktop'      => 24,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'blog-typo-title-font-family'	  => 'inherit',
					'blog-typo-title-font-weight'	  => 'inherit',
					'blog-typo-title-transform'	  => '',
					'blog-typo-title-font-size'	  => array(
						'desktop'      => 24,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'blog-typo-entry-font-family'	  => 'inherit',
					'blog-typo-entry-font-weight'	  => 'inherit',
					'blog-typo-entry-transform'	  => '',
					'blog-typo-entry-font-size'	  => array(
						'desktop'      => 13,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),					
					
					'single-typo-breadcrumbs-font-size'	  => array(
						'desktop'      => 13,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'btn-typo-text-font-family'	  => 'inherit',
					'btn-typo-text-font-weight'	  => 'inherit',
					'btn-typo-text-transform'	  => '',
					'btn-typo-text-font-size'	  => array(
						'desktop'      => 13,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'readbtn-typo-text-font-family'	  => 'inherit',
					'readbtn-typo-text-font-weight'	  => 'inherit',
					'readbtn-typo-text-transform'	  => '',
					'readbtn-typo-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
				
					'pagination-text-font-family'	  => 'inherit',
					'pagination-text-font-weight'	  => 'inherit',
					'pagination-text-transform'	  => '',
					'pagination-text-font-size'	  => array(
						'desktop'      => 14,
						'tablet'       => '',
						'mobile'       => '',
						'desktop-unit' => 'px',
						'tablet-unit'  => 'px',
						'mobile-unit'  => 'px',
					),
					
					// Pagination.
					'pagination-align'   			=> 'left',
					'pagination-border-width'   	=> 0,
					'pagination-border-radius'  	=> 0,
					'pagi_top_padding'  			=> 5,
					'pagi_right_padding'  			=> 5,
					'pagi_bottom_padding'  			=> 5,
					'pagi_left_padding'  			=> 5,
					'bg-color-pagination'  			=> 'rgba(0,0,0,0)',
					'bg-color-hover-pagination' 	=> 'rgba(0,0,0,0)',
					'border-color-pagination'   	=> 'rgba(0,0,0,0)',
					'border-color-hover-pagination' => 'rgba(0,0,0,0)',
					'text-color-pagination' 		=> '#333333',
					'text-color-hover-pagination' 	=> '#000000',
					'pagination-text-next'			=> bstone_default_strings( 'string-blog-navigation-next', false ),
					'pagination-text-prev'			=> bstone_default_strings( 'string-blog-navigation-previous', false ),
					
					// Scroll To Top.
					'bstone-enable-scroll-top'   	=> false,
					'scroll-border-width'   		=> 1,
					'scroll-border-radius'   		=> 0,
					'bg-color-scroll'   			=> '#ffffff',
					'bg-color-hover-scroll'   		=> '#f8f8f8',
					'border-color-scroll'   		=> '#e9e9e9',
					'border-color-hover-scroll'   	=> '#e9e9e9',
					'icon-color-pagination'   		=> '#ffffff',
					'icon-color-hover-pagination'   => '#ffffff',
					
					// Social Icons Settings.
					'show-icons-edit' 	 		 		=> false,
					'icon-padding-header' 				=> 10,
					'icon-padding-footer' 				=> 10,
					'icon-padding-sidebar' 				=> 10,
					'icon-border-width-header' 	 		=> 0,
					'icon-border-width-footer' 	 		=> 0,
					'icon-border-width-sidebar'  		=> 0,
					'icon-border-radius-header'  		=> 0,
					'icon-border-radius-footer'  		=> 0,
					'icon-border-radius-sidebar' 		=> 0,
					'enable-custom-icon-colors-header'  => false,
					'enable-custom-icon-colors-footer'  => false,
					'enable-custom-icon-colors-sidebar' => false,
					'icon-border-color-header' 	 		=> '#ffffff',
					'icon-border-color-footer' 	 		=> '#ffffff',
					'icon-border-color-sidebar' 	 	=> '#ffffff',
					'icon-border-color-hover-header' 	=> '#ffffff',
					'icon-border-color-hover-footer' 	=> '#ffffff',
					'icon-border-color-hover-sidebar' 	=> '#ffffff',
					'icon-bg-color-header' 				=> '#ffffff',
					'icon-bg-color-footer' 				=> '#ffffff',
					'icon-bg-color-sidebar' 			=> '#ffffff',
					'icon-bg-color-hover-header' 		=> '#ffffff',
					'icon-bg-color-hover-footer' 		=> '#ffffff',
					'icon-bg-color-hover-sidebar' 		=> '#ffffff',
					'icon-color-header' 				=> '#ffffff',
					'icon-color-footer' 				=> '#ffffff',
					'icon-color-sidebar' 				=> '#ffffff',
					'icon-color-hover-header' 			=> '#ffffff',
					'icon-color-hover-footer' 			=> '#ffffff',
					'icon-color-hover-sidebar' 			=> '#ffffff',
					
					// Spacing.
					'pcnt_top_padding' 	  => 0,
					'pcnt_bottom_padding' => 0,
					'pcnt_left_padding'   => 20,
					'pcnt_right_padding'  => 20,
					'pcnt_top_margin' 	  => 0,
					'pcnt_bottom_margin'  => 0,
					'pcontentarea_top_margin' 	  => 0,
					'pcontentarea_bottom_margin'  => 0,
					'carea_top_padding'  => 20,
					'carea_bottom_padding' => 0,
					'carea_left_padding'  => 0,
					'carea_right_padding' => 40,
					'carea_tablet_right_padding' => 0,
					'carea_mobile_right_padding' => 0,
					'h1_top_margin' 	  => 0,
					'h1_bottom_margin'    => 0,
					'h2_top_margin' 	  => 0,
					'h2_bottom_margin'    => 0,
					'h3_top_margin' 	  => 0,
					'h3_bottom_margin'    => 0,
					'h4_top_margin' 	  => 0,
					'h4_bottom_margin'    => 0,
					'h5_top_margin' 	  => 0,
					'h5_bottom_margin'    => 0,
					'h6_top_margin' 	  => 0,
					'h6_bottom_margin'    => 0,
					
					'footer_top_padding' 		   		 => 0,
					'footer_bottom_padding' 	   		 => 0,
					'footer-widgets-margin-bottom' 		 => 15,
					'footer-widgets-title-margin-bottom' => 15,
					'fwsp_top_padding'	  => 0,
					'fwsp_right_padding'  => 0,
					'fwsp_bottom_padding' => 0,
					'fwsp_left_padding'	  => 0,
					
					'footer_bar_top_padding' 		   		 => 0,
					'footer_bar_bottom_padding' 	   		 => 0,
					'footer-bar-widgets-margin-bottom' 		 => 15,
					'footer-bar-widgets-title-margin-bottom' => 15,
					'fbar_sp_top_padding'	 => 0,
					'fbar_sp_right_padding'  => 0,
					'fbar_sp_bottom_padding' => 0,
					'fbar_sp_left_padding'	 => 0,
					
					'sidebar_top_padding' 		   		  => 40,
					'sidebar_bottom_padding' 	   		  => 0,
					'sidebar_left_padding' 		   		  => 0,
					'sidebar_right_padding' 	   		  => 0,
					'sidebar-widgets-margin-bottom' 	  => 15,
					'sidebar-widgets-title-margin-bottom' => 15,
					'sidebar-widgets-title-margin-top' 	  => 15,
					'wpadding_top_padding'	  => 0,
					'wpadding_right_padding'  => 0,
					'wpadding_bottom_padding' => 20,
					'wpadding_left_padding'	  => 20,
					
					'header_top_padding'	 	=> 20,
					'header_right_padding'      => 20,
					'header_bottom_padding' 	=> 20,
					'header_left_padding'	    => 20,
					'logo_top_margin'	  => 0,
					'logo_right_margin'   => 0,
					'logo_bottom_margin'  => 0,
					'logo_left_margin'	  => 0,
					'stitle_top_margin'	  => 0,
					'stitle_right_margin' => 0,
					'stitle_bottom_margin'=> 0,
					'stitle_left_margin'  => 0,				
					'tagline_top_margin'   => 0,
					'tagline_right_margin' => 0,
					'tagline_bottom_margin'=> 0,
					'tagline_left_margin'  => 0,
					'navlink_top_padding'	 => 12,
					'navlink_right_padding'  => 20,
					'navlink_bottom_padding' => 12,
					'navlink_left_padding'	 => 20,
					'hmitems_top_margin'	 => 0,
					'hmitems_right_margin'   => 0,
					'hmitems_bottom_margin'  => 0,
					'hmitems_left_margin'	 => 0,
				)
			);
		}
		/**
		 * Get theme options from static array()
		 *
		 * @return array    Return array of theme options.
		 */
		public static function get_options() {
			return self::$db_options;
		}
		/**
		 * Update theme static option array.
		 */
		public static function refresh() {
			self::$db_options = wp_parse_args(
				get_option( BSTONE_THEME_SETTINGS ),
				self::defaults()
			);
		}
	}
}// End if().
/**
 * Kicking this off by calling 'get_instance()' method
 */
Bstone_Theme_Options::get_instance();
