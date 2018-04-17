<?php
/**
 * Custom Styling output for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic CSS
 */
if ( ! class_exists( 'Bstone_Dynamic_CSS' ) ) {

	/**
	 * Dynamic CSS
	 */
	class Bstone_Dynamic_CSS {
		/**
		 * Return CSS Output
		 *
		 * @return string Generated CSS.
		 */
		
		public static function get_bstone_font_family( $default, $element ) {
			
			$element_font = bstone_options( $element );
			
			if( $element_font == 'inherit' ) {
				return $default;
			} else {
				return $element_font;
			}
		}
		
		public static function get_bstone_font_waight( $default, $element ) {
			
			$element_font_waight = bstone_options( $element );
			
			if( $element_font_waight == 'inherit' ) {
				return $default;
			} else {
				return $element_font_waight;
			}
		}
		
		public static function return_output() {

			$dynamic_css = '';

			/**
			 * - Variable Declaration
			 */
			$site_content_width              = bstone_options( 'site-content-width', 1200 );

			// Site Background Color.
			$box_bg_color                    = bstone_options( 'site-layout-outside-bg-color' );
			
			// Default Font Family
			$default_font_family 			 = bstone_options( 'default-body-font-family' );
			
			// Default Font Waight
			$default_font_waight 			 = bstone_options( 'default-body-font-weight' );

			// Color Options.
			$body_bg_color					 = bstone_options( 'body-bg-color' );
			$container_bg_color				 = bstone_options( 'container-bg-color' );
			$primary_bg_color				 = bstone_options( 'primary-content-bg-color' );
			$sidebar_bg_color				 = bstone_options( 'sidebar-bg-color' );
			$widget_bg_color				 = bstone_options( 'widget-bg-color' );
			
			$text_color                      = bstone_options( 'base-text-color' );
			$link_color                      = bstone_options( 'link-color' );
			$link_hover_color                = bstone_options( 'link-h-color' );
			
			$main_border_color				 = bstone_options( 'main-border-color' );

			// Typography.
			$body_font_size                  = bstone_options( 'font-size-body' );
			$body_line_height                = bstone_options( 'body-line-height' );
			$para_margin_bottom              = bstone_options( 'para-margin-bottom' );
			$body_text_transform             = bstone_options( 'body-text-transform' );
			$single_post_title_font_size     = bstone_options( 'font-size-entry-title' );
			$archive_summary_title_font_size = bstone_options( 'font-size-archive-summary-title' );
			$archive_post_title_font_size    = bstone_options( 'font-size-page-title' );
			
			$bstone_font_awesome_icons		 = bstone_options( 'bstone-font-awesome-icons' );
			$bstone_font_awesome_brands		 = bstone_options( 'bstone-font-awesome-brands' );
			$bstone_font_awesome_regular	 = bstone_options( 'bstone-font-awesome-regular' );
			$bstone_font_awesome_light		 = bstone_options( 'bstone-font-awesome-light' );
			$bstone_font_awesome_solid		 = bstone_options( 'bstone-font-awesome-solid' );
			
			$heading_h1_font_family          = self::get_bstone_font_family($default_font_family, 'h1-font-family');
			$heading_h2_font_family          = self::get_bstone_font_family($default_font_family, 'h2-font-family');
			$heading_h3_font_family          = self::get_bstone_font_family($default_font_family, 'h3-font-family');
			$heading_h4_font_family          = self::get_bstone_font_family($default_font_family, 'h4-font-family');
			$heading_h5_font_family          = self::get_bstone_font_family($default_font_family, 'h5-font-family');
			$heading_h6_font_family          = self::get_bstone_font_family($default_font_family, 'h6-font-family');
			
			$heading_h1_font_waight          = self::get_bstone_font_waight( $default_font_waight, 'h1-font-weight' );
			$heading_h2_font_waight          = self::get_bstone_font_waight( $default_font_waight, 'h2-font-weight' );
			$heading_h3_font_waight          = self::get_bstone_font_waight( $default_font_waight, 'h3-font-weight' );
			$heading_h4_font_waight          = self::get_bstone_font_waight( $default_font_waight, 'h4-font-weight' );
			$heading_h5_font_waight          = self::get_bstone_font_waight( $default_font_waight, 'h5-font-weight' );
			$heading_h6_font_waight          = self::get_bstone_font_waight( $default_font_waight, 'h6-font-weight' );
			
			$heading_h1_font_transform       = bstone_options( 'h1-text-transform' );
			$heading_h2_font_transform       = bstone_options( 'h2-text-transform' );
			$heading_h3_font_transform       = bstone_options( 'h3-text-transform' );
			$heading_h4_font_transform       = bstone_options( 'h4-text-transform' );
			$heading_h5_font_transform       = bstone_options( 'h5-text-transform' );
			$heading_h6_font_transform       = bstone_options( 'h6-text-transform' );
			
			$heading_h1_font_size            = bstone_options( 'font-h1-size' );
			$heading_h2_font_size            = bstone_options( 'font-h2-size' );
			$heading_h3_font_size            = bstone_options( 'font-h3-size' );
			$heading_h4_font_size            = bstone_options( 'font-h4-size' );
			$heading_h5_font_size            = bstone_options( 'font-h5-size' );
			$heading_h6_font_size            = bstone_options( 'font-h6-size' );
			
			$heading_h1_color     	       	 = bstone_options( 'h1-color' );
			$heading_h2_color     	       	 = bstone_options( 'h2-color' );
			$heading_h3_color     	       	 = bstone_options( 'h3-color' );
			$heading_h4_color     	       	 = bstone_options( 'h4-color' );
			$heading_h5_color     	       	 = bstone_options( 'h5-color' );
			$heading_h6_color     	       	 = bstone_options( 'h6-color' );
			
			$widget_title_color				 = bstone_options( 'sidebar-widget-title-color' );
			$widget_text_color				 = bstone_options( 'sidebar-text-color' );
			$widget_link_color				 = bstone_options( 'sidebar-link-color' );
			$widget_link_hover_color		 = bstone_options( 'sidebar-link-color-hover' );
			
			$header_font_family          	 = self::get_bstone_font_family($default_font_family, 'header-typo-text-font-family');
			$header_font_waight          	 = self::get_bstone_font_waight($default_font_waight, 'header-typo-text-font-weight');
			$header_font_transform       	 = bstone_options( 'header-typo-text-transform' );
			$header_font_size            	 = bstone_options( 'header-typo-text-font-size' );
			
			$logo_font_family          	 	 = self::get_bstone_font_family($default_font_family, 'logo-typo-text-font-family');
			$logo_font_waight          	 	 = self::get_bstone_font_waight($default_font_waight, 'logo-typo-text-font-weight');
			$logo_font_transform       	 	 = bstone_options( 'logo-typo-text-transform' );
			$logo_font_size            	 	 = bstone_options( 'logo-typo-text-font-size' );
			
			$tagline_font_family          	 = self::get_bstone_font_family($default_font_family, 'tagline-typo-text-font-family');
			$tagline_font_waight          	 = self::get_bstone_font_waight($default_font_waight, 'tagline-typo-text-font-weight');
			$tagline_font_transform       	 = bstone_options( 'tagline-typo-text-transform' );
			$tagline_font_size            	 = bstone_options( 'tagline-typo-text-font-size' );
			
			$top_nav_font_family          	 = self::get_bstone_font_family($default_font_family, 'nav-typo-text-font-family');
			$top_nav_font_waight          	 = self::get_bstone_font_waight($default_font_waight, 'nav-typo-text-font-weight');
			$top_nav_font_transform       	 = bstone_options( 'nav-typo-text-transform' );
			$top_nav_font_size            	 = bstone_options( 'nav-typo-text-font-size' );
			
			$sidebar_wtitle_font_family      = self::get_bstone_font_family($default_font_family, 'sidebar-typo-title-font-family');
			$sidebar_wtitle_font_waight      = self::get_bstone_font_waight($default_font_waight, 'sidebar-typo-title-font-weight');
			$sidebar_wtitle_font_transform   = bstone_options( 'sidebar-typo-title-transform' );
			$sidebar_wtitle_font_size        = bstone_options( 'sidebar-typo-title-font-size' );
			
			$sidebar_wtext_font_family       = self::get_bstone_font_family($default_font_family, 'sidebar-typo-text-font-family');
			$sidebar_wtext_font_waight       = self::get_bstone_font_waight($default_font_waight, 'sidebar-typo-text-font-weight');
			$sidebar_wtext_font_transform    = bstone_options( 'sidebar-typo-text-transform' );
			$sidebar_wtext_font_size         = bstone_options( 'sidebar-typo-text-font-size' );
			
			$footer_top_title_font_family    = self::get_bstone_font_family($default_font_family, 'footer-typo-title-font-family');
			$footer_top_title_font_waight    = self::get_bstone_font_waight($default_font_waight, 'footer-typo-title-font-weight');
			$footer_top_title_font_transform = bstone_options( 'footer-typo-title-transform' );
			$footer_top_title_font_size      = bstone_options( 'footer-typo-title-font-size' );
			
			$footer_top_text_font_family     = self::get_bstone_font_family($default_font_family, 'footer-typo-text-font-family');
			$footer_top_text_font_waight     = self::get_bstone_font_waight($default_font_waight, 'footer-typo-text-font-weight');
			$footer_top_text_font_transform  = bstone_options( 'footer-typo-text-transform' );
			$footer_top_text_font_size       = bstone_options( 'footer-typo-text-font-size' );
			
			$footer_bar_title_font_family    = self::get_bstone_font_family($default_font_family, 'footer-bar-typo-title-font-family');
			$footer_bar_title_font_waight    = self::get_bstone_font_waight($default_font_waight, 'footer-bar-typo-title-font-weight');
			$footer_bar_title_font_transform = bstone_options( 'footer-bar-typo-title-transform' );
			$footer_bar_title_font_size      = bstone_options( 'footer-bar-typo-title-font-size' );
			
			$footer_bar_text_font_family     = self::get_bstone_font_family($default_font_family, 'footer-bar-typo-text-font-family');
			$footer_bar_text_font_waight     = self::get_bstone_font_waight($default_font_waight, 'footer-bar-typo-text-font-weight');
			$footer_bar_text_font_transform  = bstone_options( 'footer-bar-typo-text-transform' );
			$footer_bar_text_font_size       = bstone_options( 'footer-bar-typo-text-font-size' );
			
			$blog_typo_title_font_family     = self::get_bstone_font_family($default_font_family, 'blog-typo-title-font-family');
			$blog_typo_title_font_weight     = self::get_bstone_font_waight( $default_font_waight, 'blog-typo-title-font-weight' );
			$blog_typo_title_transform  	 = bstone_options( 'blog-typo-title-transform' );
			$blog_typo_title_font_size       = bstone_options( 'blog-typo-title-font-size' );
			
			$blog_typo_entry_font_family     = self::get_bstone_font_family( $default_font_family, 'blog-typo-entry-font-family' );
			$blog_typo_entry_font_weight     = self::get_bstone_font_waight($default_font_waight, 'blog-typo-entry-font-weight');
			$blog_typo_entry_transform  	 = bstone_options( 'blog-typo-entry-transform' );
			$blog_typo_entry_font_size       = bstone_options( 'blog-typo-entry-font-size' );
			
			$blog_title_color       		 = bstone_options( 'blog-title-color' );
			$blog_meta_color       			 = bstone_options( 'blog-meta-color' );
			$blog_meta_link_color       	 = bstone_options( 'blog-meta-link-color' );
			$blog_meta_link_color_hover      = bstone_options( 'blog-meta-link-color-hover' );
			$blog_entry_bg_color      		 = bstone_options( 'blog-entry-bg-color' );
			
			$blog_title_padding_top      	 = bstone_options( 'blog-title-padding-top' );
			$blog_title_padding_bottom       = bstone_options( 'blog-title-padding-bottom' );
			$blog_meta_padding_top       	 = bstone_options( 'blog-meta-padding-top' );
			$blog_meta_padding_bottom        = bstone_options( 'blog-meta-padding-bottom' );
			$blog_content_padding_top        = bstone_options( 'blog-content-padding-top' );
			$blog_content_padding_bottom     = bstone_options( 'blog-content-padding-bottom' );

			// Button Styling.
			$btn_border_radius               = bstone_options( 'btn-border-radius' );
			$btn_border_width                = bstone_options( 'btn-border-width' );
			$btn_top_padding            	 = bstone_options( 'btn_top_padding' );
			$btn_left_padding            	 = bstone_options( 'btn_left_padding' );
			$btn_right_padding            	 = bstone_options( 'btn_right_padding' );
			$btn_bottom_padding            	 = bstone_options( 'btn_bottom_padding' );
			$highlight_text_color            = bstone_options( 'highlight-text-color' );
			
			$button_font_family 			 = self::get_bstone_font_family($default_font_family, 'btn-typo-text-font-family');
			$button_font_waight				 = self::get_bstone_font_waight( $default_font_waight, 'btn-typo-text-font-weight' );
			$button_font_transform			 = bstone_options( 'btn-typo-text-transform' );
			$btn_typo_text_font_size		 = bstone_options( 'btn-typo-text-font-size' );
			
			if( $btn_border_radius=='' ) {
				$btn_border_radius=0;
			}
			
			$readbtn_border_radius           = bstone_options( 'readbtn-border-radius' );
			$readbtn_border_width            = bstone_options( 'readbtn-border-width' );
			$readbtn_top_padding             = bstone_options( 'readbtn_top_padding' );
			$readbtn_left_padding            = bstone_options( 'readbtn_left_padding' );
			$readbtn_right_padding           = bstone_options( 'readbtn_right_padding' );
			$readbtn_bottom_padding          = bstone_options( 'readbtn_bottom_padding' );
			
			$readbutton_font_family 		 = self::get_bstone_font_family($default_font_family, 'readbtn-typo-text-font-family');
			$readbutton_font_waight			 = self::get_bstone_font_waight( $default_font_waight, 'readbtn-typo-text-font-weight' );
			$readbutton_font_transform		 = bstone_options( 'readbtn-typo-text-transform' );
			$readbtn_typo_text_font_size	 = bstone_options( 'readbtn-typo-text-font-size' );
			
			if( $readbtn_border_radius=='' ) {
				$readbtn_border_radius=0;
			}
			
			$read_text_color				 = bstone_options( 'read-text-color' );
			$read_text_color_hover			 = bstone_options( 'read-text-color-hover' );
			$read_background_color			 = bstone_options( 'read-background-color' );
			$read_background_color_hover	 = bstone_options( 'read-background-color-hover' );
			$read_border_color			 	 = bstone_options( 'read-border-color' );
			$read_border_color_hover		 = bstone_options( 'read-border-color-hover' );
			
			// Backgrounds
			$page_bg_image = bstone_options( 'page-bg-image' );
			
			if( isset( $page_bg_image ) && ! empty( $page_bg_image ) ) {
				$page_bg_img_position 	= bstone_options( 'page-bg-img-position' );
				$page_bg_img_attachment = bstone_options( 'page-bg-img-attachment' );
				$page_bg_img_repeat 	= bstone_options( 'page-bg-img-repeat' );
				$page_bg_img_size 		= bstone_options( 'page-bg-img-size' );
			}
			
			// Header Settings
			$header_layout           		 = bstone_options( 'header-layouts' );
			$header_menu_alignment           = bstone_options( 'header-menu-alignment' );
			$header_item_1_alignment         = bstone_options( 'header-cmi-1-alignment' );
			$header_item_2_alignment         = bstone_options( 'header-cmi-2-alignment' );
			$header_padding_top         	 = bstone_options( 'header_top_padding' );
			$header_padding_bottom         	 = bstone_options( 'header_bottom_padding' );
			$header_padding_left         	 = bstone_options( 'header_left_padding' );
			$header_padding_right         	 = bstone_options( 'header_right_padding' );
			$header_menu_position         	 = bstone_options( 'header-menu-position' );
			$header_separator_nav_top		 = bstone_options( 'header-main-sep-top' );
			$header_main_layout_width  		 = bstone_options( 'header-main-layout-width' );
			$header_logo_alignment  		 = bstone_options( 'header-logo-alignment' );
			
			$display_site_title  		 	 = bstone_options( 'display-site-title' );
			$display_site_tagline  		 	 = bstone_options( 'display-site-tagline' );
			
			$disable_primary_nav  		 	 = bstone_options( 'disable-primary-nav' );
			
			$enable_transparent_header		 = bstone_options( 'enable-transparent-header' );
			
			// Header Colors 
			$header_separator_nav_top_color  = bstone_options( 'header-main-sep-top-color' );
			$header_bg_color  		 		 = bstone_options( 'bg-color-header' );			
			$menu_link_color_header		 	 = bstone_options( 'menu-link-color-header' );
			$menu_link_hover_color_header	 = bstone_options( 'menu-link-hover-color-header' );
			$text_color_header		 		 = bstone_options( 'text-color-header' );
			$link_color_header		 	 	 = bstone_options( 'link-color-header' );
			$link_hover_color_header	 	 = bstone_options( 'link-hover-color-header' );
			$nav_bg_color  		 		 	 = bstone_options( 'menu-bg-color-header' );			
			$site_tital_color		 		 = bstone_options( 'site-tital-color' );			
			$site_desc_color		 		 = bstone_options( 'site-desc-color' );
			

			// Footer
			$footer_top_border_color  		 = bstone_options( 'footer-top-border-color' );
			$footer_top_background_color  	 = bstone_options( 'footer-top-background-color' );
			$footer_top_border_size  	 	 = bstone_options( 'footer-top-border-size' );
			$footer_top_title_color  	 	 = bstone_options( 'footer-top-title-color' );
			$footer_top_text_color  	 	 = bstone_options( 'footer-top-text-color' );
			$footer_top_link_color  	 	 = bstone_options( 'footer-top-link-color' );
			$footer_top_link_hover_color  	 = bstone_options( 'footer-top-link-hover-color' );
			
			$footer_widgets_margin_bottom    = bstone_options( 'footer-widgets-margin-bottom' );
			$footer_widgets_title_bottom     = bstone_options( 'footer-widgets-title-margin-bottom' );
			
			$footer_bottom_background_color  = bstone_options( 'footer-bottom-bg-color' );
			$footer_bar_top_border_size   	 = bstone_options( 'footer-bar-top-border-size' );
			$footer_bar_bottom_border_size   = bstone_options( 'footer-bar-bottom-border-size' );
			$footer_bar_top_border_color   	 = bstone_options( 'footer-bar-top-border-color' );
			$footer_bar_bottom_border_color  = bstone_options( 'footer-bar-bottom-border-color' );
			$footer_bottom_title_color  	 = bstone_options( 'footer-bottom-title-color' );
			$footer_bottom_text_color  	 	 = bstone_options( 'footer-bottom-text-color' );
			$footer_bottom_link_color  	 	 = bstone_options( 'footer-bottom-link-color' );
			$footer_bottom_link_hover_color  = bstone_options( 'footer-bottom-link-hover-color' );
			
			$fbar_widgets_margin_bottom    	 = bstone_options( 'footer-bar-widgets-margin-bottom' );
			$fbar_widgets_title_bottom       = bstone_options( 'footer-bar-widgets-title-margin-bottom' );
			
			// Sidebar			
			$sidebar_widgets_margin_bottom   = bstone_options( 'sidebar-widgets-margin-bottom' );
			$sidebar_widgets_title_margin_b  = bstone_options( 'sidebar-widgets-title-margin-bottom' );
			$sidebar_widgets_title_margin_t  = bstone_options( 'sidebar-widgets-title-margin-top' );
			
			// Blog
			$blog_list_text_position		 = bstone_options( 'blog-list-text-position' );
			$post_type_icon_color		 	 = bstone_options( 'post-type-icon-color' );
			$post_type_icon_bg_color		 = bstone_options( 'post-type-icon-bg-color' );
			$post_type_icon_border_color	 = bstone_options( 'post-type-icon-border-color' );
			$post_type_icon_border_size	 	 = bstone_options( 'post-type-icon-border-size' );
			$post_type_icon_border_radius	 = bstone_options( 'post-type-icon-border-radius' );			
			$img_caption_padding	 		 = bstone_options( 'img-caption-padding' );
			$img_caption_color	 		 	 = bstone_options( 'img-caption-color' );
			$img_caption_bg_color	 		 = bstone_options( 'img-caption-bg-color' );
			
			// Pagination
			$pagination_align		 		 = bstone_options( 'pagination-align' );
			$pagination_border_width		 = bstone_options( 'pagination-border-width' );
			$pagination_border_radius		 = bstone_options( 'pagination-border-radius' );
			$border_color_pagination		 = bstone_options( 'border-color-pagination' );
			$border_color_hover_pagination	 = bstone_options( 'border-color-hover-pagination' );
			$bg_color_pagination		 	 = bstone_options( 'bg-color-pagination' );
			$bg_color_hover_pagination	 	 = bstone_options( 'bg-color-hover-pagination' );
			$text_color_pagination		 	 = bstone_options( 'text-color-pagination' );
			$text_color_hover_pagination	 = bstone_options( 'text-color-hover-pagination' );
			
			$pagination_font_family 		 = self::get_bstone_font_family($default_font_family, 'pagination-text-font-family');
			$pagination_font_waight			 = self::get_bstone_font_waight( $default_font_waight, 'pagination-text-font-weight' );
			$pagination_text_transform	 	 = bstone_options( 'pagination-text-transform' );
			$pagination_text_font_size	 	 = bstone_options( 'pagination-text-font-size' );

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = bstone_options( 'buttons-text-color' );
			if ( empty( $btn_text_color ) ) {
				$btn_text_color = bstone_get_foreground_color( $link_color );
			}

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = bstone_options( 'buttons-text-color-hover' );
			if ( empty( $btn_text_hover_color ) ) {
				$btn_text_hover_color = bstone_get_foreground_color( $link_hover_color );
			}
			$btn_bg_color       = bstone_options( 'buttons-background-color', $link_color );
			$btn_bg_hover_color = bstone_options( 'buttons-background-color-hover', $link_hover_color );
			
			$btn_border_color = bstone_options( 'buttons-border-color' );
			$btn_border_hover_color = bstone_options( 'buttons-border-color-hover' );

			// Spacing of Big Footer.
			$small_footer_divider_color = bstone_options( 'footer-sml-divider-color' );
			$small_footer_divider       = bstone_options( 'footer-sml-divider' );

			/**
			 * Small Footer Styling
			 */
			$small_footer_layout  = bstone_options( 'footer-sml-layout', 'footer-sml-layout-1' );
			$bstone_footer_width             = bstone_options( 'footer-layout-width' );

			// Blog Post Title Typography Options.
			$single_post_max       = bstone_options( 'blog-single-width' );
			$single_post_max_width = bstone_options( 'blog-single-max-width' );
			$blog_width            = bstone_options( 'blog-width' );
			$blog_max_width        = bstone_options( 'blog-max-width' );

			$css_output = array();
			// Body Font Family.
			$body_font_family = bstone_body_font_family();
			$body_font_weight = self::get_bstone_font_waight( $default_font_waight, 'body-font-weight' );

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}

			$css_output = array(

				// HTML.
				'html' => array(
					'font-size' => bstone_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				'a, .page-title, a:visited' => array(
					'color' => esc_attr( $link_color ),
				),
				'a:hover, a:focus' => array(
					'color' => esc_attr( $link_hover_color ),
				),
				'body, button, input, select, textarea, .thumbnail-caption' => array(
					'font-family'    => bstone_get_font_family( $body_font_family ),
					'font-weight'    => esc_attr( $body_font_weight ),
					'font-size'      => bstone_responsive_font( $body_font_size, 'desktop' ),
					'line-height'    => esc_attr( $body_line_height ),
					'text-transform' => esc_attr( $body_text_transform ),
				),
				'body' => array(
					'background-color' => esc_attr( $body_bg_color ),
				),
				'body #page.site' => array(
					'background-color' => esc_attr( $container_bg_color ),
				),
				
				'body #primary' => array(
					'border-color'	   => esc_attr( $main_border_color ),
					'background-color' => esc_attr( $primary_bg_color ),
				),
				'#primary p, #primary .entry-content p' => array(
					'margin-top'       => '0em',
					'margin-bottom'    => bstone_get_css_value( $para_margin_bottom, 'em' ),
				),
				'body #secondary' => array(
					'border-color'	   => esc_attr( $main_border_color ),
					'background-color' => esc_attr( $sidebar_bg_color ),
				),
				'body #tertiary' => array(
					'border-color'	   => esc_attr( $main_border_color ),
					'background-color' => esc_attr( $sidebar_bg_color ),
				),
				'body #secondary aside, body #secondary .widget' => array(
					'background-color' => esc_attr( $widget_bg_color ),
				),
				'body #tertiary aside, body #tertiary .widget' => array(
					'background-color' => esc_attr( $widget_bg_color ),
				),
				'#masthead .site-logo-img .custom-logo-link img' => array(
					'max-width' => esc_attr( bstone_options( 'bst-header-logo-width' ) ) . 'px',
				),
				'.bst-archive-description .bst-archive-title' => array(
					'font-size' => bstone_responsive_font( $archive_summary_title_font_size, 'desktop' ),
				),
				'.entry-title' => array(
					'font-size' => bstone_responsive_font( $archive_post_title_font_size, 'desktop' ),
				),
				'.comment-reply-title' => array(
					'font-size' => bstone_get_font_css_value( (int) $body_font_size_desktop * 1.66666 ),
				),
				'.bst-comment-list #cancel-comment-reply-link' => array(
					'font-size' => bstone_responsive_font( $body_font_size, 'desktop' ),
				),
				'.bst-single-post .entry-title, .page-title' => array(
					'font-size'   => bstone_responsive_font( $single_post_title_font_size, 'desktop' ),
				),
				'#secondary' => array(
					'font-size' => bstone_responsive_font( $body_font_size, 'desktop' ),
				),

				// Global CSS.
				'::selection' => array(
					'background-color' => esc_attr( $link_color ),
					'color'            => esc_attr( $highlight_text_color ),
				),
				'body, body #primary, body #primary p, body .elementor-widget-text-editor' => array(
					'color' => esc_attr( $text_color ),
				),

				// Typography and Colors
				'.tagcloud a:hover, .tagcloud a:focus, .tagcloud a.current-item' => array(
					'color'            => bstone_get_foreground_color( $link_color ),
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
				),
				
				'#primary h1, #primary h1 a' => array(
					'color'			 => esc_attr( $heading_h1_color ),
					'font-family' 	 => "'".bstone_get_css_value( $heading_h1_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $heading_h1_font_waight ),
					'text-transform' => esc_attr( $heading_h1_font_transform ),
				),
				
				'#primary h2, #primary h2 a' => array(
					'color'			 => esc_attr( $heading_h2_color ),
					'font-family' 	 => "'".bstone_get_css_value( $heading_h2_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $heading_h2_font_waight ),
					'text-transform' => esc_attr( $heading_h2_font_transform ),
				),
				
				'#primary h3, #primary h3 a' => array(
					'color'			 => esc_attr( $heading_h3_color ),
					'font-family' 	 => "'".bstone_get_css_value( $heading_h3_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $heading_h3_font_waight ),
					'text-transform' => esc_attr( $heading_h3_font_transform ),
				),
				
				'#primary h4, #primary h4 a' => array(
					'color'			 => esc_attr( $heading_h4_color ),
					'font-family' 	 => "'".bstone_get_css_value( $heading_h4_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $heading_h4_font_waight ),
					'text-transform' => esc_attr( $heading_h4_font_transform ),
				),
				
				'#primary h5, #primary h5 a' => array(
					'color'			 => esc_attr( $heading_h5_color ),
					'font-family' 	 => "'".bstone_get_css_value( $heading_h5_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $heading_h5_font_waight ),
					'text-transform' => esc_attr( $heading_h5_font_transform ),
				),
				
				'#primary h6, #primary h6 a' => array(
					'color'			 => esc_attr( $heading_h6_color ),
					'font-family' 	 => "'".bstone_get_css_value( $heading_h6_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $heading_h6_font_waight ),
					'text-transform' => esc_attr( $heading_h6_font_transform ),
				),
				
				'#secondary aside .widget-title, #secondary .widget .widget-title, #tertiary aside .widget-title, #tertiary .widget .widget-title' => array(
					'color' => esc_attr( $widget_title_color ),
					'font-family' 	 => "'".bstone_get_css_value( $sidebar_wtitle_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $sidebar_wtitle_font_waight ),
					'text-transform' => esc_attr( $sidebar_wtitle_font_transform ),
				),
				
				'#secondary aside, #secondary .widget, #tertiary aside, #tertiary .widget' => array(
					'color' => esc_attr( $widget_text_color ),
					'font-family' 	 => "'".bstone_get_css_value( $sidebar_wtext_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $sidebar_wtext_font_waight ),
					'text-transform' => esc_attr( $sidebar_wtext_font_transform ),
				),
				
				'#secondary aside a, #secondary .widget a, #tertiary aside a, #tertiary .widget a, #secondary aside ul li, #secondary .widget ul li, #tertiary aside ul li, #tertiary .widget ul li' => array(
					'color' => esc_attr( $widget_link_color ),
				),
				
				'#secondary aside a:hover, #secondary .widget a:hover, #tertiary aside a:hover, #tertiary .widget a:hover' => array(
					'color' => esc_attr( $widget_link_hover_color ),
				),
				
				'header.site-header .st-head-cta,header.site-header .st-head-cta p,header.site-header .st-head-cta a' => array(
					'font-family' 	 => "'".bstone_get_css_value( $header_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $header_font_waight ),
					'text-transform' => esc_attr( $header_font_transform ),
				),
				
				'header .site-title,header .site-title a,header .site-title p,header h1.site-title,header p.site-title' => array(
					'font-family' 	 => "'".bstone_get_css_value( $logo_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $logo_font_waight ),
					'text-transform' => esc_attr( $logo_font_transform ),
				),
				
				'header.site-header .site-description,header.site-header .site-description a,header.site-header p.site-description' => array(
					'font-family' 	 => "'".bstone_get_css_value( $tagline_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $tagline_font_waight ),
					'text-transform' => esc_attr( $tagline_font_transform ),
				),
				
				// Sidebar				
				'body #secondary.widget-area .widget, body #tertiary.widget-area .widget' => array(
					'margin-bottom'  => bstone_get_css_value( $sidebar_widgets_margin_bottom ),
				),
				'body #secondary.widget-area .widget-title, body #tertiary.widget-area .widget-title' => array(
					'margin-top'  	 => bstone_get_css_value( $sidebar_widgets_title_margin_t ),
					'margin-bottom'  => bstone_get_css_value( $sidebar_widgets_title_margin_b ),
				),

				// Main - Menu Items.
				'.main-header-menu li:hover > a, .main-header-menu li:hover > .bst-menu-toggle, .main-header-menu .bst-masthead-custom-menu-items a:hover, .main-header-menu li.focus > a, .main-header-menu li.focus > .bst-menu-toggle, .main-header-menu .current-menu-item > a, .main-header-menu .current-menu-ancestor > a, .main-header-menu .current_page_item > a, .main-header-menu .current-menu-item > .bst-menu-toggle, .main-header-menu .current-menu-ancestor > .bst-menu-toggle, .main-header-menu .current_page_item > .bst-menu-toggle' => array(
					'color' => esc_attr( $link_color ),
				),

				// Input tags.
				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
					'box-shadow'       => 'none',
				),

				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),

				// Single Post Meta.
				'.bst-comment-meta' => array(
					'line-height' => '1.666666667',
					'font-size' => bstone_get_font_css_value( (int) $body_font_size_desktop * 0.8571428571 ),
				),
				'.single .nav-links .nav-previous, .single .nav-links .nav-next, .single .bst-author-details .author-title, .bst-comment-meta' => array(
					'color' => esc_attr( $link_color ),
				),

				// Button Typography.
				'.menu-toggle, button, .bst-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"], header.site-header .st-head-cta a.button' => array(
					'border-radius'    => bstone_get_css_value( $btn_border_radius, 'px' ),
					'padding'          => bstone_get_css_value( $btn_top_padding, 'px' ) . ' ' . bstone_get_css_value( $btn_right_padding, 'px' ) . ' ' . bstone_get_css_value( $btn_bottom_padding, 'px' ) . ' ' . bstone_get_css_value( $btn_left_padding, 'px' ),
					'color'            => esc_attr( $btn_text_color ),
					'border-color'     => esc_attr( $btn_border_color ),
					'background-color' => esc_attr( $btn_bg_color ),
					'border-width'     => bstone_get_css_value( $btn_border_width, 'px' ),
					'font-family'	   => "'".bstone_get_css_value( $button_font_family, 'font' )."'",
					'font-weight' 	   => esc_attr( $button_font_waight ),
					'text-transform'   => esc_attr( $button_font_transform ),
				),
				'button:focus, .menu-toggle:hover, button:hover, .bst-button:hover, .button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus, header.site-header .st-head-cta a.button:hover, header.site-header .st-head-cta a.button:focus' => array(
					'color'            => esc_attr( $btn_text_hover_color ),
					'border-color'     => esc_attr( $btn_border_hover_color ),
					'background-color' => esc_attr( $btn_bg_hover_color ),
				),
				'.search-submit, .search-submit:hover, .search-submit:focus' => array(
					'color'            => bstone_get_foreground_color( $link_color ),
					'background-color' => esc_attr( $link_color ),
				),				
				
				'.blog-entry-readmore a' => array(
					'color'            => esc_attr( $read_text_color ),
					'background-color' => esc_attr( $read_background_color ),
					'border-color'     => esc_attr( $read_border_color ),
					'border-radius'    => bstone_get_css_value( $readbtn_border_radius, 'px' ),
					'border-width'     => bstone_get_css_value( $readbtn_border_width, 'px' ),
					'font-family'	   => "'".bstone_get_css_value( $readbutton_font_family, 'font' )."'",
					'font-weight' 	   => esc_attr( $readbutton_font_waight ),
					'text-transform'   => esc_attr( $readbutton_font_transform ),
				),				
				
				'.blog-entry-readmore a:hover' => array(
					'color'            => esc_attr( $read_text_color_hover ),
					'background-color' => esc_attr( $read_background_color_hover ),
					'border-color'     => esc_attr( $read_border_color_hover ),
				),

				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *' => array(
					'line-height' => '1.45',
					'color'       => esc_attr( $link_color ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *' => array(
					'color'       => esc_attr( $link_hover_color ),
				),
				
				// Blog Post Styles 
				'article.bst-post-list .st-flex' => array(
					'align-items' => $blog_list_text_position,
				),
				
				// Blog Post Type Icon 
				'.bst-posts-cnt article .bst-post-type-icon' => array(
					'color' 		   => esc_attr( $post_type_icon_color ),
					'background-color' => esc_attr( $post_type_icon_bg_color ),
					'border-color' 	   => esc_attr( $post_type_icon_border_color ),
					'border-width' 	   => bstone_get_css_value( $post_type_icon_border_size, 'px' ),
					'border-radius'    => bstone_get_css_value( $post_type_icon_border_radius, 'px' ),
				),
				
				// Blog Post Image Caption 
				'.bst-posts-cnt article .thumbnail-caption' => array(
					'color' 	   	   => esc_attr( $img_caption_color ),
					'background-color' => esc_attr( $img_caption_bg_color ),
					'padding' 		   => $img_caption_padding.'px 0px',
				),
				'.bst-posts-cnt article .thumbnail-caption a' => array(
					'color' 	   	   => esc_attr( $img_caption_color ),
				),
				
				// Pagination
				'.st-pagination' => array(
					'text-align'	   => esc_attr( $pagination_align ),
				),				
				'.st-pagination .nav-links a' => array(
					'color' 	   	   => esc_attr( $text_color_pagination ),
					'background-color' => esc_attr( $bg_color_pagination ),
					'border-color' 	   => esc_attr( $border_color_pagination ),
					'border-width' 	   => bstone_get_css_value( $pagination_border_width, 'px' ),
					'border-radius'    => bstone_get_css_value( $pagination_border_radius, 'px' ),
					'font-family'	   => "'".bstone_get_css_value( $pagination_font_family, 'font' )."'",
					'font-weight' 	   => esc_attr( $pagination_font_waight ),
					'text-transform'   => esc_attr( $pagination_text_transform ),
				),				
				'.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers' => array(
					'color' 	   	   => esc_attr( $text_color_hover_pagination ),
					'background-color' => esc_attr( $bg_color_hover_pagination ),
					'border-color' 	   => esc_attr( $border_color_hover_pagination ),
				),				
				'.st-pagination .nav-links span.page-numbers' => array(
					'border-width' 	   => bstone_get_css_value( $pagination_border_width, 'px' ),
					'border-radius'    => bstone_get_css_value( $pagination_border_radius, 'px' ),
					'font-family'	   => "'".bstone_get_css_value( $pagination_font_family, 'font' )."'",
					'font-weight' 	   => esc_attr( $pagination_font_waight ),
					'text-transform'   => esc_attr( $pagination_text_transform ),
				),	

				// Blockquote Text Color.
				'blockquote, blockquote a' => array(
					'color' => bstone_adjust_brightness( $text_color, 75, 'darken' ),
				),

				// 404 Page.
				'.bst-404-layout-1 .bst-404-text' => array(
					'font-size' => bstone_get_font_css_value( '200' ),
				),

				// Widget Title.
				'.widget-title' => array(
					'font-size' => bstone_get_font_css_value( (int) $body_font_size_desktop * 1.428571429 ),
				),
				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'color' => esc_attr( $link_color ),
				),
				'.secondary .calendar_wrap #today, .bst-progress-val span' => array(
					'background' => esc_attr( $link_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),
				'.calendar_wrap #today > a' => array(
					'color' => bstone_get_foreground_color( $link_color ),
				),

				// Pagination.
				'.bst-pagination a, .page-links .page-link, .single .post-navigation a' => array(
					'color' => esc_attr( $link_color ),
				),
				'.bst-pagination a:hover, .bst-pagination a:focus, .bst-pagination > span:hover:not(.dots), .bst-pagination > span.current, .page-links > .page-link, .page-links .page-link:hover, .post-navigation a:hover' => array(
					'color' => esc_attr( $link_hover_color ),
				),
				
				// Header Settings
				'.header-2 .st-site-branding, header .st-site-branding' => array(
					'text-align' => esc_attr( $header_logo_alignment ),
				),
				
				// Header Colors
				'header.site-header' => array(
					'background' => esc_attr( $header_bg_color ),
				),
				'header.site-header .st-head-cta, header.site-header .st-head-cta p' => array(
					'color' => esc_attr( $text_color_header ),
				),
				'header.site-header .st-head-cta a' => array(
					'color' => esc_attr( $link_color_header ),
				),
				'header.site-header .st-head-cta a:hover' => array(
					'color' => esc_attr( $link_hover_color_header ),
				),
				'header.site-header .site-description, header.site-header .site-description a, header.site-header p.site-description' => array(
					'color' => esc_attr( $site_desc_color ),
				),
				'header .site-title, header .site-title a, header .site-title p, header h1.site-title, header p.site-title' => array(
					'color' => esc_attr( $site_tital_color ),
				),
				'header.site-header nav .st-main-navigation > ul li a' => array(
					'color' => esc_attr( $menu_link_color_header ),
					'font-family' 	 => "'".bstone_get_css_value( $top_nav_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $top_nav_font_waight ),
					'text-transform' => esc_attr( $top_nav_font_transform ),
				),
				'header.site-header nav .st-main-navigation > ul li a:hover' => array(
					'color' => esc_attr( $menu_link_hover_color_header ),
				),
				'.header-2 .st-site-nav nav' => array(
					'background' => esc_attr( $nav_bg_color ),
				),
				
				'footer .footer_top_markup' => array(
					'color' 		   => esc_attr( $footer_top_text_color ),
					'background-color' => esc_attr( $footer_top_background_color ),
					'border-top-color' => esc_attr( $footer_top_border_color ),
					'border-top-width' => bstone_get_css_value( $footer_top_border_size, 'px' ),
					'font-family' 	 => "'".bstone_get_css_value( $footer_top_text_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $footer_top_text_font_waight ),
					'text-transform' => esc_attr( $footer_top_text_font_transform ),
				),
				
				'footer .footer_top_markup .widget' => array(
					'margin-bottom'  => bstone_get_css_value( $footer_widgets_margin_bottom, 'px' ),
				),
				
				'footer .footer_top_markup .widget .widget-title' => array(
					'color' => esc_attr( $footer_top_title_color ),
					'font-family' 	 => "'".bstone_get_css_value( $footer_top_title_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $footer_top_title_font_waight ),
					'text-transform' => esc_attr( $footer_top_title_font_transform ),
					'margin-bottom'  => bstone_get_css_value( $footer_widgets_title_bottom, 'px' ),
				),
				
				'footer .footer_top_markup a' => array(
					'color' => esc_attr( $footer_top_link_color ),
				),
				
				'footer .footer_top_markup a:hover' => array(
					'color' => esc_attr( $footer_top_link_hover_color ),
				),
				
				'footer .footer_bar_markup .widget' => array(
					'margin-bottom'  => bstone_get_css_value( $fbar_widgets_margin_bottom, 'px' ),
				),
				
				'footer .footer_bar_markup' => array(
					'color' 		   => esc_attr( $footer_bottom_text_color ),
					'background-color' => esc_attr( $footer_bottom_background_color ),
					'border-top-color' => esc_attr( $footer_bar_top_border_color ),
					'border-top-width' => bstone_get_css_value( $footer_bar_top_border_size, 'px' ),
					'border-bottom-color' => esc_attr( $footer_bar_bottom_border_color ),
					'border-bottom-width' => bstone_get_css_value( $footer_bar_bottom_border_size, 'px' ),
					'font-family' 	 => "'".bstone_get_css_value( $footer_bar_text_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $footer_bar_text_font_waight ),
					'text-transform' => esc_attr( $footer_bar_text_font_transform ),
				),
				
				'footer .footer_bar_markup .widget .widget-title' => array(
					'color' => esc_attr( $footer_bottom_title_color ),
					'font-family' 	 => "'".bstone_get_css_value( $footer_bar_title_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $footer_bar_title_font_waight ),
					'text-transform' => esc_attr( $footer_bar_title_font_transform ),
					'margin-bottom'  => bstone_get_css_value( $fbar_widgets_title_bottom, 'px' ),
				),
				
				'footer .footer_bar_markup a' => array(
					'color' => esc_attr( $footer_bottom_link_color ),
				),
				
				'footer .footer_bar_markup a:hover' => array(
					'color' => esc_attr( $footer_bottom_link_hover_color ),
				),
				
				'#primary .bst-posts-cnt .entry-title, #primary .bst-posts-cnt .entry-title a' => array(
					'color' 		 => esc_attr( $blog_title_color ),
					'font-family' 	 => "'".bstone_get_css_value( $blog_typo_title_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $blog_typo_title_font_weight ),
					'text-transform' => esc_attr( $blog_typo_title_transform ),
				),
				
				'#primary .bst-posts-cnt .entry-title' => array(
					'margin-top' 	 => bstone_get_css_value( $blog_title_padding_top, 'px' ),
					'margin-bottom' => bstone_get_css_value( $blog_title_padding_bottom, 'px' ),
				),
				
				'#primary .bst-posts-cnt .entry-meta, .single-post #primary .entry-meta' => array(
					'margin-top' 	 => bstone_get_css_value( $blog_meta_padding_top, 'px' ),
					'margin-bottom' => bstone_get_css_value( $blog_meta_padding_bottom, 'px' ),
				),
				
				'#primary .bst-posts-cnt .entry-content' => array(
					'margin-top' 	 => bstone_get_css_value( $blog_content_padding_top, 'px' ),
					'margin-bottom'  => bstone_get_css_value( $blog_content_padding_bottom, 'px' ),
				),
				
				'#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a, .single-post #primary .entry-meta, .single-post #primary .entry-meta a' => array(
					'color' 		 => esc_attr( $blog_meta_color ),
					'font-family' 	 => "'".bstone_get_css_value( $blog_typo_entry_font_family, 'font' )."'",
					'font-weight' 	 => esc_attr( $blog_typo_entry_font_weight ),
					'text-transform' => esc_attr( $blog_typo_entry_transform ),
				),
				
				'.entry-meta, .entry-meta *' => array(
					'color' 		 => esc_attr( $blog_meta_color ),
				),
				
				'#primary .bst-posts-cnt .entry-meta a, .single-post #primary .entry-meta a' => array(
					'color' 		 => esc_attr( $blog_meta_link_color ),
				),
				
				'#primary .bst-posts-cnt .entry-meta a:hover, .single-post #primary .entry-meta a:hover' => array(
					'color' 		 => esc_attr( $blog_meta_link_color_hover ),
				),
				
				'#primary .bst-posts-cnt article .bst-article-inner' => array(
					'background-color' => esc_attr( $blog_entry_bg_color ),
				),
			);

			/* Parse CSS from array() */
			$parse_css = bstone_parse_css( $css_output );
			
			// Page Background - Boxed & Padded Version			
			if( isset( $page_bg_image ) && ! empty( $page_bg_image ) ) {
				$bstone_page_bg_css = array(
					'body' => array(
						'background-image' 	    => 'url('.$page_bg_image.')',
						'background-position'   => esc_attr( str_replace( "-"," ",$page_bg_img_position ) ),
						'background-attachment' => esc_attr( $page_bg_img_attachment ),
						'background-repeat' 	=> esc_attr( $page_bg_img_repeat ),
						'background-size' 	 	=> esc_attr( $page_bg_img_size ),
					),
				);
				
				$parse_css .= bstone_parse_css( $bstone_page_bg_css );
			}
			
			// Spacing
			$parse_css .= bstone_get_responsive_spacings (
				'header .st-site-identity .site-logo-img img',
				'logo', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'header.site-header .site-title',
				'stitle', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'header.site-header p.site-description',
				'tagline', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'.header-2 .st-site-nav ul > li > a, .header-1 .st-site-nav ul > li > a',
				'navlink', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body.page-builder #content > .st-container, body #content > .st-container',
				'pcnt', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body.page-builder #content > .st-container, body #content > .st-container',
				'pcnt', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #primary',
				'carea', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #primary',
				'pcontentarea', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary h1, .entry-content h1',
				'h1', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary h2, .entry-content h2',
				'h2', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary h3, .entry-content h3',
				'h3', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary h4, .entry-content h4',
				'h4', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary h5, .entry-content h5',
				'h5', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary h6, .entry-content h6',
				'h6', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #secondary.widget-area',
				'sidebar', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #tertiary.widget-area',
				'sidebarbth', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #secondary.widget-area .widget, body #tertiary.widget-area .widget',
				'wpadding', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'footer .footer_top_markup',
				'footer', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'footer .footer_top_markup .widget',
				'fwsp', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'footer .footer_bar_markup',
				'footer_bar', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'footer .footer_bar_markup .widget',
				'fbar_sp', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'footer .footer_bar_markup .widget',
				'fbar_sp', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #primary',
				'primarycnt', 'border',
				'border', 'width',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #secondary',
				'sidebar', 'border',
				'border', 'width',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body #tertiary',
				'trtrysidebar', 'border',
				'border', 'width',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'.blog-entry-readmore a',
				'readbtn', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'#primary .bst-posts-cnt article .bst-article-inner',
				'bainner', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				"#primary .bst-posts-cnt article, #primary .bst-posts-cnt article[class^='st-col'], #primary .bst-posts-cnt article[class*='st-col']",
				'baouter', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'body.blog #primary .st-row.bst-posts-cnt, body.single-post #primary .st-row.bst-posts-cnt',
				'baouter', 'padding',
				'margin', '-',
				'px',
				array('right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			$parse_css .= bstone_get_responsive_spacings (
				'.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers',
				'pagi', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			
			/* Responsive Typo */
			$parse_css .= bstone_responsive_font_size_css( '#primary h1, #primary h1 a, .entry-content h1, .entry-content h1 a', $heading_h1_font_size );
			$parse_css .= bstone_responsive_font_size_css( '#primary h2, #primary h2 a, .entry-content h2, .entry-content h2 a', $heading_h2_font_size );
			$parse_css .= bstone_responsive_font_size_css( '#primary h3, #primary h3 a, .entry-content h3, .entry-content h3 a', $heading_h3_font_size );
			$parse_css .= bstone_responsive_font_size_css( '#primary h4, #primary h4 a, .entry-content h4, .entry-content h4 a', $heading_h4_font_size );
			$parse_css .= bstone_responsive_font_size_css( '#primary h5, #primary h5 a, .entry-content h5, .entry-content h5 a', $heading_h5_font_size );
			$parse_css .= bstone_responsive_font_size_css( '#primary h6, #primary h6 a, .entry-content h6, .entry-content h6 a', $heading_h6_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'header.site-header .st-head-cta, header.site-header .st-head-cta p, header.site-header .st-head-cta a', $header_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'header .site-title, header .site-title a, header .site-title p, header h1.site-title, header p.site-title', $logo_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'header.site-header .site-description, header.site-header .site-description a, header.site-header p.site-description', $tagline_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'header.site-header nav .st-main-navigation > ul li a', $top_nav_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( '#secondary aside .widget-title, #secondary .widget .widget-title, #tertiary aside .widget-title, #tertiary .widget .widget-title', $sidebar_wtitle_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( '#secondary aside, #secondary .widget, #tertiary aside, #tertiary .widget', $sidebar_wtext_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'footer .footer_top_markup', $footer_top_text_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'footer .footer_top_markup .widget .widget-title', $footer_top_title_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'footer .footer_bar_markup', $footer_bar_text_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( 'footer .footer_bar_markup .widget .widget-title', $footer_bar_title_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( '#primary .bst-posts-cnt .entry-title, #primary .bst-posts-cnt .entry-title a', $blog_typo_title_font_size );
			$parse_css .= bstone_responsive_font_size_css( '#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a, .single-post #primary .entry-meta, .single-post #primary .entry-meta a', $blog_typo_entry_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( '.menu-toggle, button, .bst-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"], header.site-header .st-head-cta a.button', $btn_typo_text_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( '.blog-entry-readmore a', $readbtn_typo_text_font_size );
			
			$parse_css .= bstone_responsive_font_size_css( '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers', $pagination_text_font_size );
			
			/* Primary Container */
			
			$primary_cnt_border_left 	= bstone_options( 'primarycnt_left_border' );
			$primary_cnt_border_right 	= bstone_options( 'primarycnt_right_border' );
			
			if( $primary_cnt_border_left > 0 ) { $primary_cnt_border_left = '-'.$primary_cnt_border_left; }
			if( $primary_cnt_border_right > 0 ) { $primary_cnt_border_right = '-'.$primary_cnt_border_right; }
			
			$primary_cnt_border_left_css = array(
				'body #primary' => array(
					'margin-left' => $primary_cnt_border_left.'px',
				),
			);			
			$parse_css .= bstone_parse_css( $primary_cnt_border_left_css, '753' );
			
			$primary_cnt_border_right_css = array(
				'body #primary' => array(
					'margin-right' => $primary_cnt_border_right.'px',
				),
			);			
			$parse_css .= bstone_parse_css( $primary_cnt_border_right_css, '753' );
			
			/* Transparent Header */
			
			if( false == $enable_transparent_header ) {
				$transparent_css = array(
					'header.site-header' => array(
						'top' 		=> 'auto',
						'width' 	=> '100%',
						'position'  => 'relative',
					),
				);
				
				$parse_css .= bstone_parse_css( $transparent_css );
			} else {
				$transparent_css = array(
					'header.site-header' => array(
						'top' 		=> '0px',
						'width' 	=> '100%',
						'position'  => 'absolute',
					),
				);
				
				$parse_css .= bstone_parse_css( $transparent_css );
			}
			
			/* Header Spacing */ 
			if( $header_layout == 'header-main-layout-1' ) {				
				$parse_css .= bstone_responsive_css(
						'.main-header-content',
						'header', 'top_padding', 'padding-top', 'px', array('desktop', 'tablet', 'mobile')
					);
				$parse_css .= bstone_responsive_css(
						'.main-header-content',
						'header', 'right_padding', 'padding-right', 'px', array('desktop', 'tablet', 'mobile')
					);
				$parse_css .= bstone_responsive_css(
						'.main-header-content',
						'header', 'bottom_padding', 'padding-bottom', 'px', array('desktop', 'tablet', 'mobile')
					);
				$parse_css .= bstone_responsive_css(
						'.main-header-content',
						'header', 'left_padding', 'padding-left', 'px', array('desktop', 'tablet', 'mobile')
					);
				
			} else if( $header_layout == 'header-main-layout-2' ) {
				if( $header_menu_position == 'top' ) {
					$header2_padding = array(
						'.header-2 .main-header-content' => array(
							'padding-top' => '0px',
						),
						'.header-2 .st-site-nav' => array(
							'margin-top' => '0px',
						),
						'.header-2 .st-site-nav nav' => array(
							'border-top-width' => '0px',
							'border-bottom-width' => bstone_get_css_value( $header_separator_nav_top, 'px' ),
							'border-bottom-color' => esc_attr( $header_separator_nav_top_color ),
						),
					);
					$parse_css .= bstone_responsive_css(
							'.header-2 .main-header-content',
							'header', 'right_padding', 'padding-right', 'px', array('desktop', 'tablet', 'mobile')
						);
					$parse_css .= bstone_responsive_css(
							'.header-2 .main-header-content',
							'header', 'bottom_padding', 'padding-bottom', 'px', array('desktop', 'tablet', 'mobile')
						);
					$parse_css .= bstone_responsive_css(
							'.header-2 .main-header-content',
							'header', 'left_padding', 'padding-left', 'px', array('desktop', 'tablet', 'mobile')
						);
					$parse_css .= bstone_responsive_css(
							'.header-2 .st-site-nav',
							'header', 'top_padding', 'margin-bottom', 'px', array('desktop')
						);
				} else {
					$header2_padding = array(
						'.header-2 .main-header-content' => array(
							'padding-bottom' => '0px',
						),
						'.header-2 .st-site-nav' => array(
							'margin-bottom' => '0px',
						),
						'.header-2 .st-site-nav nav' => array(
							'border-bottom-width' => '0px',
							'border-top-width' => bstone_get_css_value( $header_separator_nav_top, 'px' ),
							'border-top-color' => esc_attr( $header_separator_nav_top_color ),
						),
					);									
					$parse_css .= bstone_responsive_css(
							'.header-2 .main-header-content',
							'header', 'top_padding', 'padding-top', 'px', array('desktop', 'tablet', 'mobile')
						);
					$parse_css .= bstone_responsive_css(
							'.header-2 .main-header-content',
							'header', 'right_padding', 'padding-right', 'px', array('desktop', 'tablet', 'mobile')
						);
					$parse_css .= bstone_responsive_css(
							'.header-2 .main-header-content',
							'header', 'left_padding', 'padding-left', 'px', array('desktop', 'tablet', 'mobile')
						);
					$parse_css .= bstone_responsive_css(
							'.header-2 .st-site-nav',
							'header', 'bottom_padding', 'margin-top', 'px', array('desktop', 'tablet', 'mobile')
						);
				}
				
				if( 'content' == $header_main_layout_width ):
					$header_nav_width = array(
						'.header-2 header .st-site-nav nav > div > ul' => array(
							'max-width' => bstone_get_css_value( $site_content_width, 'px' ),
						),
					);
				else:
					$header_nav_width = array(
						'.header-2 header .st-site-nav nav > div > ul' => array(
							'max-width' => '100%',
						),
					);
				
					$header_nav_padding_res = array(
						'.header-2 .full-width-header .st-site-nav ul > li:first-child > a' => array(
							'padding-left' => bstone_get_css_value( $header_padding_left, 'px' ),
						),
						'.header-2 .full-width-header .st-site-nav ul > li:lbst-child > a' => array(
							'padding-right' => bstone_get_css_value( $header_padding_right, 'px' ),
						),
					);
				
					$parse_css .= bstone_responsive_css(
						'.header-2 .full-width-header .st-site-nav ul > li:first-child > a',
						'header', 'left_padding', 'padding-left', 'px', array('desktop')
					);
				
					$parse_css .= bstone_responsive_css(
						'.header-2 .full-width-header .st-site-nav ul > li:lbst-child > a',
						'header', 'right_padding', 'padding-right', 'px', array('desktop')
					);
				endif;
				
				$header2_nav_bg_color = array(
					'.header-2 .st-site-nav nav' => array(
						'background' => esc_attr( $nav_bg_color ),
					),
				);
				
				$parse_css .= bstone_parse_css( $header2_padding );
				$parse_css .= bstone_parse_css( $header2_nav_bg_color );
				$parse_css .= bstone_parse_css( $header_nav_width, '769' );
			}
			
			/* Header 2 Settings */
			if( $header_layout == 'header-main-layout-2' ) {
				$header2_settings = array(
					'.header-2 .st-head-cta.cta-h-left' => array(
						'text-align' => esc_attr( $header_item_1_alignment ),
					),
					'.header-2 .st-head-cta.cta-h-right' => array(
						'text-align' => esc_attr( $header_item_2_alignment ),
					),
					'.header-2 .st-site-nav nav > div > ul, .header-1 .st-site-nav nav > div > ul' => array(
						'justify-content' => esc_attr( $header_menu_alignment ),
					),
				);
				$parse_css .= bstone_parse_css( $header2_settings );
			}

			// Foreground color.

			/* Width for Footer */
			if ( 'content' != $bstone_footer_width ) {
				$genral_global_responsive = array(
					'.bst-small-footer .bst-container' => array(
						'max-width' => '100%',
						'padding-left' => '35px',
						'padding-right' => '35px',
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= bstone_parse_css( $genral_global_responsive, '769' );
			}

			/* Width for Comments for Full Width / Stretched Template */
			$page_builder_comment = array(
				'.st-page-builder-template .comments-area, .single.st-page-builder-template .entry-header, .single.st-page-builder-template .post-navigation' => array(
					'max-width' => bstone_get_css_value( $site_content_width + 40, 'px' ),
					'margin-left' => 'auto',
					'margin-right' => 'auto',
				),
			);
			
			$parse_css .= bstone_parse_css( $page_builder_comment, '545' );

			// Font Awesome Icons
			
			if( true == $bstone_font_awesome_icons ) {
				
				$font_awesome_dir = BSTONE_THEME_URI.'assets/fonts/';
				
				if( true == $bstone_font_awesome_brands ) {
					$bstone_font_awesome_brands_css = array(
						'@font-face' => array(
							'font-family' => 'Font Awesome\ 5 Brands',
							'font-style'  => 'normal',
							'font-weight' => '400',
							'src' 		  => 'url('.$font_awesome_dir.'fa-brands-400.eot)',
							'src' 		  => 'url('.$font_awesome_dir.'fa-brands-400.eot?#iefix) format("embedded-opentype"), url('.$font_awesome_dir.'fa-brands-400.woff2) format("woff2"), url('.$font_awesome_dir.'fa-brands-400.woff) format("woff"), url('.$font_awesome_dir.'fa-brands-400.ttf) format("truetype"), url('.$font_awesome_dir.'fa-brands-400.svg#fontawesome) format("svg")',
						),
					);

					$parse_css .= bstone_parse_css( $bstone_font_awesome_brands_css );
				}
				
				if( true == $bstone_font_awesome_regular ) {
					$bstone_font_awesome_regular_css = array(
						'@font-face' => array(
							'font-family' => 'Font Awesome\ 5 Free',
							'font-style'  => 'normal',
							'font-weight' => '400',
							'src' 		  => 'url('.$font_awesome_dir.'fa-regular-400.eot)',
							'src' 		  => 'url('.$font_awesome_dir.'fa-regular-400.eot?#iefix) format("embedded-opentype"), url('.$font_awesome_dir.'fa-regular-400.woff2) format("woff2"), url('.$font_awesome_dir.'fa-regular-400.woff) format("woff"), url('.$font_awesome_dir.'fa-regular-400.ttf) format("truetype"), url('.$font_awesome_dir.'fa-regular-400.svg#fontawesome) format("svg")',
						),
					);

					$parse_css .= bstone_parse_css( $bstone_font_awesome_regular_css );
				}
				
				if( true == $bstone_font_awesome_solid ) {
					$bstone_font_awesome_solid_css = array(
						'@font-face' => array(
							'font-family' => 'Font Awesome\ 5 Free',
							'font-style'  => 'normal',
							'font-weight' => '900',
							'src' 		  => 'url('.$font_awesome_dir.'fa-solid-900.eot)',
							'src' 		  => 'url('.$font_awesome_dir.'fa-solid-900.eot?#iefix) format("embedded-opentype"), url('.$font_awesome_dir.'fa-solid-900.woff2) format("woff2"), url('.$font_awesome_dir.'fa-solid-900.woff) format("woff"), url('.$font_awesome_dir.'fa-solid-900.ttf) format("truetype"), url('.$font_awesome_dir.'fa-solid-900.svg#fontawesome) format("svg")',
						),
					);

					$parse_css .= bstone_parse_css( $bstone_font_awesome_solid_css );
				}
				
			}

			/* Parse CSS from array()*/

			$separate_container_css = array(
				'body, .bst-separate-container' => array(
					'background-color' => esc_attr( $box_bg_color ),
				),
			);
			$parse_css .= bstone_parse_css( $separate_container_css );

			$tablet_typo = array();

			$tablet_html = array(
				'font-size' => bstone_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%', 'desktop' ),
			);

			if ( isset( $body_font_size['tablet'] ) && '' != $body_font_size['tablet'] ) {

				$tablet_html = array(
					'font-size' => bstone_get_font_css_value( (int) $body_font_size['tablet'] * 6.25, '%', 'tablet' ),
				);

				$tablet_typo = array(
					'.comment-reply-title' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['tablet'] * 1.66666, 'px', 'tablet' ),
					),
					// Single Post Meta.
					'.bst-comment-meta' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['tablet'] * 0.8571428571, 'px', 'tablet' ),
					),
					// Widget Title.
					'.widget-title' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['tablet'] * 1.428571429, 'px', 'tablet' ),
					),
				);
			}

			/* Tablet Typography */
			$tablet_typography = array(
				'html' => $tablet_html,
				'body, button, input, select, textarea' => array(
					'font-size'      => bstone_responsive_font( $body_font_size, 'tablet' ),
				),
				'.bst-comment-list #cancel-comment-reply-link' => array(
					'font-size' => bstone_responsive_font( $body_font_size, 'tablet' ),
				),
				'#secondary' => array(
					'font-size' => bstone_responsive_font( $body_font_size, 'tablet' ),
				),
				'.bst-archive-description .bst-archive-title' => array(
					'font-size' => bstone_responsive_font( $archive_summary_title_font_size, 'tablet', 40 ),
				),
				'.entry-title' => array(
					'font-size' => bstone_responsive_font( $archive_post_title_font_size, 'tablet', 30 ),
				),
				'.bst-single-post .entry-title, .page-title' => array(
					'font-size'   => bstone_responsive_font( $single_post_title_font_size, 'tablet', 30 ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= bstone_parse_css( array_merge( $tablet_typo, $tablet_typography ), '' ,'768' );

			$mobile_typo = array();
			if ( isset( $body_font_size['mobile'] ) && '' != $body_font_size['mobile'] ) {
				$mobile_typo = array(
					'html' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['mobile'] * 6.25, '%', 'mobile' ),
					),
					'.comment-reply-title' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['mobile'] * 1.66666, 'px', 'mobile' ),
					),
					// Single Post Meta.
					'.bst-comment-meta' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['mobile'] * 0.8571428571, 'px', 'mobile' ),
					),
					// Widget Title.
					'.widget-title' => array(
						'font-size' => bstone_get_font_css_value( (int) $body_font_size['mobile'] * 1.428571429, 'px', 'mobile' ),
					),
				);
			}

			/* Mobile Typography */
			$mobile_typography = array(
				'body, button, input, select, textarea' => array(
					'font-size'      => bstone_responsive_font( $body_font_size, 'mobile' ),
				),
				'.bst-comment-list #cancel-comment-reply-link' => array(
					'font-size' => bstone_responsive_font( $body_font_size, 'mobile' ),
				),
				'#secondary' => array(
					'font-size' => bstone_responsive_font( $body_font_size, 'mobile' ),
				),
				'.bst-archive-description .bst-archive-title' => array(
					'font-size' => bstone_responsive_font( $archive_summary_title_font_size, 'mobile', 40 ),
				),
				'.entry-title' => array(
					'font-size' => bstone_responsive_font( $archive_post_title_font_size, 'mobile', 30 ),
				),
				'.bst-single-post .entry-title, .page-title' => array(
					'font-size'   => bstone_responsive_font( $single_post_title_font_size, 'mobile', 30 ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= bstone_parse_css( array_merge( $mobile_typo, $mobile_typography ), '' ,'544' );

			/* Site width Responsive */
			$site_width = array(
				'.st-container' => array(
					'max-width' => bstone_get_css_value( $site_content_width + 40, 'px' ),
				),
			);
			$nav_ul_width = array(
				'.header-2 .st-site-nav nav > div > ul' => array(
					'max-width' 	=> bstone_get_css_value( $site_content_width, 'px' ),
					'padding-left'  => '0px',
					'margin'  		=> '0 auto',
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= bstone_parse_css( $site_width, '769' );
			$parse_css .= bstone_parse_css( $nav_ul_width, '769' );

			/**
			 * Bstone Fonts
			 */
			if ( apply_filters( 'bstone_enable_default_fonts', true ) ) {
				$bstone_fonts  = '@font-face {';
					$bstone_fonts .= 'font-family: "bstone";';
					$bstone_fonts .= 'src: url( ' . BSTONE_THEME_URI . 'assets/fonts/bstone.woff) format("woff"),';
						$bstone_fonts .= 'url( ' . BSTONE_THEME_URI . 'assets/fonts/bstone.ttf) format("truetype"),';
						$bstone_fonts .= 'url( ' . BSTONE_THEME_URI . 'assets/fonts/bstone.svg#Bstone) format("svg");';
					$bstone_fonts .= 'font-weight: normal;';
					$bstone_fonts .= 'font-style: normal;';
				$bstone_fonts .= '}';
				$parse_css .= $bstone_fonts;
			}

			/* Blog */
			if ( 'custom' === $blog_width ) :
				$blog_css  = '@media (min-width:769px) {';
					$blog_css .= '.blog .site-content > .bst-container, .archive .site-content > .bst-container, .search .site-content > .bst-container{';
						$blog_css .= 'max-width:' . esc_attr( $blog_max_width ) . 'px;';
					$blog_css .= '}';
				$blog_css .= '}';
				$parse_css .= $blog_css;
			endif;

			/* Single Blog */
			if ( 'custom' === $single_post_max ) :
					$single_blog_css = '@media (min-width:769px) {';
					$single_blog_css .= '.single #content > .st-container, .single .st-container.page-header-inner {';
					$single_blog_css .= 'max-width:' . esc_attr( $single_post_max_width ) . 'px;';
					$single_blog_css .= '}';
					$single_blog_css .= '}';
					$parse_css       .= $single_blog_css;
			endif;

			/* Small Footer CSS */
			if ( 'disabled' != $small_footer_layout ) :
				$sml_footer_css = '.bst-small-footer {';
					$sml_footer_css .= 'border-top-style:solid;';
					$sml_footer_css .= 'border-top-width:' . esc_attr( $small_footer_divider ) . 'px;';
					$sml_footer_css .= 'border-top-color:' . esc_attr( $small_footer_divider_color );
				$sml_footer_css .= '}';
				if ( 'footer-sml-layout-2' != $small_footer_layout ) {
					$sml_footer_css .= '.bst-small-footer-wrap{';
						$sml_footer_css .= 'text-align: center;';
					$sml_footer_css .= '}';
				}
				$parse_css .= $sml_footer_css;
			endif;

			/* 404 Page */
			$parse_css .= bstone_parse_css(
				array(
					'.bst-404-layout-1 .bst-404-text' => array(
						'font-size'   => bstone_get_font_css_value( 100 ),
					),
				), '', '920'
			);

			$dynamic_css = $parse_css;
			$custom_css  = bstone_options( 'custom-css' );

			if ( '' != $custom_css ) {
				$dynamic_css .= $custom_css;
			}

			// trim white space for faster page loading.
			$dynamic_css = Bstone_Enqueue_Scripts::trim_css( $dynamic_css );

			return $dynamic_css;
		}

		/**
		 * Return post meta CSS
		 *
		 * @param  boolean $return_css Return the CSS.
		 * @return mixed              Return on print the CSS.
		 */
		static public function return_meta_output( $return_css = false ) {

			/**
			 * - Page Layout
			 *
			 *   - Sidebar Positions CSS
			 */
			$secondary_width        = bstone_options( 'site-sidebar-width' );
			$primary_width          = absint( 100 - $secondary_width );
			$meta_style             = '';

			// Header Separator.
			$header_separator       		= bstone_options( 'header-main-sep' );
			$header_separator_color 		= bstone_options( 'header-main-sep-color' );

			$meta_style .= 'header.site-header {';
			$meta_style .= 'border-bottom-width:' . bstone_get_css_value( $header_separator, 'px' ) . ';';
			$meta_style .= 'border-bottom-color:' . esc_attr( $header_separator_color ) . ';';
			$meta_style .= '}';
			$meta_style .= '@media (min-width: 769px) {';
			$meta_style .= '.main-header-bar {';
			$meta_style .= 'border-bottom-width:' . bstone_get_css_value( $header_separator, 'px' ) . ';';
			$meta_style .= 'border-bottom-color:' . esc_attr( $header_separator_color ) . ';';
			$meta_style .= '}';
			$meta_style .= '}';

			if ( 'no-sidebar' !== bstone_page_layout() && 'both-sidebars' !== bstone_page_layout() ) :
				$meta_style .= '@media (min-width: 769px) {';
				$meta_style .= '#primary {';
				$meta_style .= 'width:' . esc_attr( $primary_width ) . '%;';
				$meta_style .= '}';
				$meta_style .= '#secondary.widget-area {';
				$meta_style .= 'width:' . esc_attr( $secondary_width ) . '%;';
				$meta_style .= '}';
				$meta_style .= '}';
			elseif ( 'both-sidebars' == bstone_page_layout() ) :
				$primary_width = absint( 100 - $secondary_width*2 );
			
				$meta_style .= '@media (min-width: 769px) {';
				$meta_style .= '#primary {';
				$meta_style .= 'width:' . esc_attr( $primary_width ) . '%;';
				$meta_style .= '}';
				$meta_style .= '#secondary.widget-area, #tertiary.widget-area {';
				$meta_style .= 'width:' . esc_attr( $secondary_width ) . '%;';
				$meta_style .= '}';
				$meta_style .= '}';
			endif;

			if ( false != $return_css ) {
				return $meta_style;
			}

			wp_add_inline_style( 'bstone-theme-css', $meta_style );
		}
	}
	
}