/**
 * Customizer controls toggles
 *
 * @package Bstone
 */

( function( $ ) {

	/* Internal shorthand */
	var api = wp.customize;

	/**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @since 1.0.0
	 * @class BstoneCustomizerToggles
	 */
	BstoneCustomizerToggles = {
		
		// Header 2 Menu Items Position		
		'bstone-settings[header-2-items-position]' :
		[
			{
				controls: [
					'bstone-settings[header-cmi-1-alignment]',
				],
				callback: function( value ) {
					if ( value.indexOf("menu-item-1")>-1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[header-cmi-2-alignment]',
				],
				callback: function( value ) {
					if ( value.indexOf("menu-item-2")>-1 ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[header-logo-display]',
				],
				callback: function( value ) {
					var header_type = api.instance('bstone-settings[header-layouts]').get();
					
					if ( ( value.indexOf("logo") === -1 ) && 'header-main-layout-2' === header_type ) {
						return false;
					}
					return true;
				}
			},
		],

		// Header Layout Controls
		'bstone-settings[header-layouts]' :
		[
			{
				controls: [
					'bstone-settings[header-main-rt-section-2]',

					'bstone-settings[header-main-sep-top]',
					'bstone-settings[header-main-sep-top-color]',

					'bstone-settings[menu-bg-color-header]',

					'bstone-settings[header-cmi-1-alignment]',
					'bstone-settings[header-cmi-2-alignment]',
					'bstone-settings[header-menu-position]',
					'bstone-settings[header-2-items-position]',
					'bstone-settings[header-logo-alignment]',
				],
				callback: function( value ) {					
					if ( 'header-main-layout-1' === value ) {
						return false;
					}
					return true;
				}
			},
			{
				controls: [
					'bstone-settings[header-main-rt-section-2-html]',
				],
				callback: function( value ) {

					var header_main_rt_val = api.control( 'bstone-settings[header-main-rt-section-2]' ).setting.get();

					if ( 'header-main-layout-2' === value && 'text-html' === header_main_rt_val ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[header-logo-display]',
				],
				callback: function( value ) {
					var header_mpos = api.instance('bstone-settings[header-2-items-position]').get();
					
					if ( ( header_mpos.indexOf("logo") === -1 ) && 'header-main-layout-2' === value ) {
						return false;
					}
					return true;
				}
			},
		],
		
		// Menu Active or Not : Toggle Menu Spacing Controls		
		'bstone-settings[disable-primary-nav]' :
		[
			{
				controls: [
					'bstone-settings[navlink-spacing]',
					'bstone-settings[nav-typo-text-heading]',
					'bstone-settings[nav-typo-text-font-size]',
					'bstone-settings[nav-typo-text-transform]',
					'bstone-settings[nav-typo-text-font-weight]',
					'bstone-settings[nav-typo-text-font-family]',
					'bstone-settings[header-menu-alignment]',
					'bstone-settings[menu-link-color-header]',
					'bstone-settings[menu-link-hover-color-header]',
				],
				callback: function( value ) {					
					if ( false === value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[header-menu-position]',
					'bstone-settings[header-main-sep-top]',
					'bstone-settings[header-main-sep-top-color]',
					'bstone-settings[menu-bg-color-header]',
				],
				callback: function( value ) {
					if ( false === value ) {

						var menu_header_type = api.instance('bstone-settings[header-layouts]').get();

						if( 'header-main-layout-2' == menu_header_type ) {
							return true;
						} else {
							return false;
						}						
					}
					return false;
				}
			},
		],
		
		// Site Title Controls
		
		'bstone-settings[display-site-title]' :
		[
			{
				controls: [
					'bstone-settings[site-tital-color]',					
					'bstone-settings[logo-typo-text-heading]',
					'bstone-settings[logo-typo-text-font-family]',					
					'bstone-settings[logo-typo-text-font-weight]',					
					'bstone-settings[logo-typo-text-transform]',
					'bstone-settings[logo-typo-text-font-size]',
					'bstone-settings[stitle-spacing]',
				],
				callback: function( value ) {					
					if ( false === value ) {
						return false;
					}
					return true;
				}
			},
			{
				controls: [
					'bstone-settings[site-title-color-desc-divider]',
				],
				callback: function( value ) {
					var display_sitetitle = api.control('bstone-settings[display-site-tagline]').setting.get();
					
					if ( false === value && false === display_sitetitle ) {
						return false;
					}
					return true;
				}
			},
		],
		
		// Site Tagline Controls
		
		'bstone-settings[display-site-tagline]' :
		[
			{
				controls: [
					'bstone-settings[site-desc-color]',					
					'bstone-settings[tagline-typo-text-heading]',
					'bstone-settings[tagline-typo-text-font-family]',					
					'bstone-settings[tagline-typo-text-font-weight]',					
					'bstone-settings[tagline-typo-text-transform]',
					'bstone-settings[tagline-typo-text-font-size]',
					'bstone-settings[tagline-spacing]',
				],
				callback: function( value ) {					
					if ( false === value ) {
						return false;
					}
					return true;
				}
			},
			{
				controls: [
					'bstone-settings[site-title-color-desc-divider]',
				],
				callback: function( value ) {
					var display_sitetagline = api.control('bstone-settings[display-site-title]').setting.get();
					
					if ( false === value && false === display_sitetagline ) {
						return false;
					}
					return true;
				}
			},
		],
		
		// Header Main RT Section Html
		
		'bstone-settings[header-main-rt-section]' :
		[
			{
				controls: [
					'bstone-settings[header-main-rt-section-html]',
				],
				callback: function( value ) {					
					if ( 'text-html' === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Header Main RT Section 2 Html
		
		'bstone-settings[header-main-rt-section-2]' :
		[
			{
				controls: [
					'bstone-settings[header-main-rt-section-2-html]',
				],
				callback: function( value ) {					
					if ( 'text-html' === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Sidebar Layout Default
		
		'bstone-settings[site-sidebar-layout]' :
		[
			{
				controls: [
					'bstone-settings[site-sidebar-width]',
					'bstone-settings[sidebar-border-width]',
					'bstone-settings[divider-section-sidebar-width]',
					'bstone-settings[divider-section-sidebar-border]',
					'bstone-settings[site-sidebar-layout-tabs]',
				],
				callback: function() {
					return bstone_sidebar_width_control(api);
				}
			},
			{
				controls: [
					'bstone-settings[sidebar-both-padding]',
					'bstone-settings[trtrysidebar-border-width]',
				],
				callback: function() {
					return sidebar_spacing_control(api);
				}
			},
		],
		
		// Sidebar Layout Page
		
		'bstone-settings[single-page-sidebar-layout]' :
		[
			{
				controls: [
					'bstone-settings[site-sidebar-width]',
					'bstone-settings[sidebar-border-width]',
					'bstone-settings[divider-section-sidebar-width]',
					'bstone-settings[divider-section-sidebar-border]',
					'bstone-settings[site-sidebar-layout-tabs]',
				],
				callback: function() {
					return bstone_sidebar_width_control(api);
				}
			},
		],
		
		// Sidebar Layout Post
		
		'bstone-settings[single-post-sidebar-layout]' :
		[
			{
				controls: [
					'bstone-settings[site-sidebar-width]',
					'bstone-settings[sidebar-border-width]',
					'bstone-settings[divider-section-sidebar-width]',
					'bstone-settings[divider-section-sidebar-border]',
					'bstone-settings[site-sidebar-layout-tabs]',
				],
				callback: function() {
					return bstone_sidebar_width_control(api);
				}
			},
		],
		
		// Sidebar Layout Archive
		
		'bstone-settings[archive-post-sidebar-layout]' :
		[
			{
				controls: [
					'bstone-settings[site-sidebar-width]',
					'bstone-settings[sidebar-border-width]',
					'bstone-settings[divider-section-sidebar-width]',
					'bstone-settings[divider-section-sidebar-border]',
					'bstone-settings[site-sidebar-layout-tabs]',
				],
				callback: function() {
					return bstone_sidebar_width_control(api);
				}
			},
		],
		
		// Footer Controls
		
		'bstone-settings[footer-adv]' :
		[
			{
				controls: [
					'bstone-settings[footer-top-area-width]',
					'bstone-settings[site-footer-layout-tabs]',
				],
				callback: function( value ) {					
					if ( 'disabled' !== value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Footer Bar Controls
		
		'bstone-settings[footer-sml-layout]' :
		[
			{
				controls: [
					'bstone-settings[footer-bar-width]',
					'bstone-settings[site-footer-bar-layout-tabs]',
				],
				callback: function( value ) {					
					if ( 'disabled' !== value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Blog Post Controls
		
		'bstone-settings[blog-post-structure]' :
		[
			{
				controls: [
					'bstone-settings[post-type-icon]',
					'bstone-settings[post-icon-type]',
					'bstone-settings[post-icon-size]',
					'bstone-settings[post-icon-position]',
					'bstone-settings[overlay-on-img-hover]',
					'bstone-settings[blog-img-size]',
					'bstone-settings[blog-img-custom-width]',
					'bstone-settings[blog-img-custom-height]',
					'bstone-settings[bst-styling-section-blog-width]',
					'bstone-settings[blog-img-size-divider]',
				],
				callback: function( value ) {
					if ( true === value.includes('image') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-post-content]',
				],
				callback: function( value ) {
					if ( true === value.includes('post-content') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-post-content-length]',
					'bstone-settings[blog-post-content-more]',
				],
				callback: function( value ) {
					if ( true === value.includes('post-content') ) {
						
						var post_content_text = api.instance('bstone-settings[blog-post-content]').get();
						
						if( 'excerpt' === post_content_text ) { return true; } else { return false; }
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-read-more-text]',
					'bstone-settings[blog-read-more-icon]',
				],
				callback: function( value ) {
					if ( true === value.includes('read-more') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-meta-separator]',
					'bstone-settings[display-meta-text]',
					'bstone-settings[display-meta-icons]',
				],
				callback: function( value ) {
					if ( true === value.includes('post-meta') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-comments-txt-zero]',
					'bstone-settings[blog-comments-txt-one]',
					'bstone-settings[blog-comments-txt-more]',
				],
				callback: function( value ) {
					if ( true === value.includes('post-meta') ) {
						var meta_comment = api.instance('bstone-settings[blog-meta]').get();
						if( true === meta_comment.includes('comments') ) { return true; } else { return false; }
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[meta-icons-type]',
				],
				callback: function( value ) {
					if ( true === value.includes('post-meta') ) {
						var meta_icon_typ = api.instance('bstone-settings[display-meta-icons]').get();
						if( true === meta_icon_typ ) { return true; } else { return false; }
					}
					return false;
				}
			},
		],
		
		// Blog Meta Controls
		
		'bstone-settings[blog-meta]' :
		[
			{
				controls: [
					'bstone-settings[blog-comments-txt-zero]',
					'bstone-settings[blog-comments-txt-one]',
					'bstone-settings[blog-comments-txt-more]',
				],
				callback: function( value ) {
					if ( true === value.includes('comments') ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Blog Content Width Control
		
		'bstone-settings[blog-width]' :
		[
			{
				controls: [
					'bstone-settings[blog-max-width]',
				],
				callback: function( value ) {					
					if ( 'custom' === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Post type icon display
		
		'bstone-settings[post-type-icon]' :
		[
			{
				controls: [
					'bstone-settings[post-icon-type]',
					'bstone-settings[post-icon-size]',
					'bstone-settings[post-icon-position]',
					'bstone-settings[post-type-icon-color]',
					'bstone-settings[post-type-icon-bg-color]',
					'bstone-settings[post-type-icon-border-size]',
					'bstone-settings[post-type-icon-border-color]',
					'bstone-settings[post-type-icon-border-radius]',
					'bstone-settings[post-type-icon-colors-divider]',
				],
				callback: function( value ) {					
					if ( 'disable' !== value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Blog Style
		
		'bstone-settings[blog-style]' :
		[
			{
				controls: [
					'bstone-settings[blog-display-style]',
				],
				callback: function( value ) {					
					if ( 'full-width' !== value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-display-style-list]',
					'bstone-settings[blog-list-text-position]',
				],
				callback: function( value ) {					
					if ( 'list' === value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-post-cols-count]',
					'bstone-settings[post-cols-count-divider]',
				],
				callback: function( value ) {					
					if ( 'full-width' !== value && 'list' !== value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Single Post Controls
		
		'bstone-settings[blog-single-post-structure]' :
		[
			{
				controls: [
					'bstone-settings[blog-single-meta]',
				],
				callback: function( value ) {
					if ( true === value.includes('single-post-meta') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[single-tags-share-structure]',
				],
				callback: function( value ) {
					if ( true === value.includes('single-post-footer') ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Single Post - After Post Controls
		
		'bstone-settings[after-single-post-structure]' :
		[
			{
				controls: [
					'bstone-settings[nex-prev-liks-style]',
					'bstone-settings[nex-prev-liks-position]',
					'bstone-settings[nex-prev-liks-taxonomy]',
					'bstone-settings[next-prev-section-single-blog-devider]',
				],
				callback: function( value ) {
					if ( true === value.includes('post-next-prev') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[blog-related-count]',
					'bstone-settings[blog-related-columns]',
					'bstone-settings[blog-related-taxonomy]',
					'bstone-settings[blog-related-img-width]',
					'bstone-settings[blog-related-img-height]',
					'bstone-settings[bst-related-posts-devider]',
				],
				callback: function( value ) {
					if ( true === value.includes('related-posts') ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Single Post Content Width Control
		
		'bstone-settings[blog-single-width]' :
		[
			{
				controls: [
					'bstone-settings[blog-single-max-width]',
				],
				callback: function( value ) {					
					if ( 'custom' === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Blog Post Content Length
		
		'bstone-settings[blog-post-content]' :
		[
			{
				controls: [
					'bstone-settings[blog-post-content-more]',
					'bstone-settings[blog-post-content-length]',
				],
				callback: function( value ) {					
					if ( 'excerpt' === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		// Scroll To Top Active or Not : Toggle Scroll to Top Controls
		
		'bstone-settings[bstone-enable-scroll-top]' :
		[
			{
				controls: [
					'bstone-settings[scroll-border-width]',
					'bstone-settings[scroll-border-radius]',
					'bstone-settings[sctop-icon-class]',
					'bstone-settings[sctop-icon-size]',
					'bstone-settings[sctop-spacing]',
					'bstone-settings[bg-color-scroll]',
					'bstone-settings[border-color-scroll]',
					'bstone-settings[icon-color-pagination]',
					'bstone-settings[bg-color-hover-scroll]',
					'bstone-settings[divider-scrolltop-colors]',
					'bstone-settings[border-color-hover-scroll]',
					'bstone-settings[icon-color-sctop]',
					'bstone-settings[icon-color-hover-sctop]',
				],
				callback: function( value ) {
					if ( false === value ) {
						return false;
					}
					return true;
				}
			},
		],
		
		// Font Awesome Active or Not : Toggle Font Awesome Controls
		
		'bstone-settings[bstone-font-awesome-icons]' :
		[
			{
				controls: [
					'bstone-settings[bstone-font-awesome-brands]',
					'bstone-settings[bstone-font-awesome-regular]',
					'bstone-settings[bstone-font-awesome-solid]',
				],
				callback: function( value ) {
					if ( false === value ) {
						return false;
					}
					return true;
				}
			},
		],
		
		// Toggle Meta Icons Type
		
		'bstone-settings[display-meta-icons]' :
		[
			{
				controls: [
					'bstone-settings[meta-icons-type]',
				],
				callback: function( value ) {
					if ( false === value ) {
						return false;
					}
					return true;
				}
			},
		],
		
		// Pagination Settings - Header
		
		'bstone-settings[pagination-border-width]' :
		[
			{
				controls: [
					'bstone-settings[border-color-pagination]',
					'bstone-settings[border-color-hover-pagination]',
				],
				callback: function( value ) {					
					if ( value > 0 ) {
						return true;
					}
					return false;
				}
			},
		],

		// Posts Banner / Slider - Data Source Change		
		'bstone-settings[bp-banner-data-source]' :
		[
			{
				controls: [
					'bstone-settings[bp-banner-data-category]',
				],
				callback: function( value ) {					
					if ( 'category' === value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-data-postid]',
				],
				callback: function( value ) {
					if ( 'posts' === value ) {
						return true;
					}
					return false;
				}
			},
		],

		//Posts Banner / Slider - Type Change
		'bstone-settings[bp-banner-type]' :
		[
			{
				controls: [
					'bstone-settings[bp-banner-grid-gap]',
				],
				callback: function( value ) {
					if ( 'posts-grid' === value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-title-font-size-smlgrid]',
				],
				callback: function( value ) {
					if ( 'posts-grid' === value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-category-font-size-smlgrid]',
				],
				callback: function( value ) {					
					if ( 'posts-grid' === value ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-posts-num]',
				],
				callback: function( value ) {				
					if ( 'slider' === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		//Posts Banner / Slider - Structure Change
		'bstone-settings[bp-banner-structure]' :
		[
			{
				controls: [
					'bstone-settings[bp-banner-category-font-size]',
					'bstone-settings[bp-banner-category-text-color]',
					'bstone-settings[bp-banner-category-text-color-hover]',
					'bstone-settings[bp-banner-category-bg-color]',
					'bstone-settings[bp-banner-category-bg-color-hover]',
					'bstone-settings[bp-banner-cat-top-padding]',
					'bstone-settings[bp-banner-cat-left-padding]',
					'bstone-settings[bp-banner-cat-shadow]',
				],
				callback: function( value ) {
					if ( true === value.includes('category') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-title-font-size]',
					'bstone-settings[bp-banner-title-text-color]',
					'bstone-settings[bp-banner-title-text-color-hover]',
					'bstone-settings[bp-banner-title-bg-color]',
					'bstone-settings[bp-banner-title-bg-color-hover]',
					'bstone-settings[bp-banner-title-top-padding]',
					'bstone-settings[bp-banner-title-left-padding]',
					'bstone-settings[bp-banner-title-shadow]',
				],
				callback: function( value ) {
					if ( true === value.includes('title') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-meta-text-color]',
					'bstone-settings[bp-banner-meta-structure]',
					'bstone-settings[bp-banner-meta-shadow]',
				],
				callback: function( value ) {
					if ( true === value.includes('meta') ) {
						return true;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-category-font-size-smlgrid]',
				],
				callback: function( value ) {
					if ( true === value.includes('category') ) {

						var bp_banner_type_cat = api.instance('bstone-settings[bp-banner-type]').get();

						if( 'posts-grid' == bp_banner_type_cat ) {
							return true;
						} 
						return false;
					}
					return false;
				}
			},
			{
				controls: [
					'bstone-settings[bp-banner-title-font-size-smlgrid]',
				],
				callback: function( value ) {
					if ( true === value.includes('title') ) {

						var bp_banner_type_title = api.instance('bstone-settings[bp-banner-type]').get();

						if( 'posts-grid' == bp_banner_type_title ) {
							return true;
						} 
						return false;
					}
					return false;
				}
			},
		],
		
		
	};
	
	// Stick Bstone Customizer Tabs Section To Top
	$( '#customize-controls .wp-full-overlay-sidebar-content').scroll(function() {
		var bst_tab_width = '';
		var bst_tab_border_left = '0px';
		var screenSize = $(window).width();

		if( screenSize <= 1500 ) {
			bst_tab_border_left = '-1px';
		}

		if( $(this).scrollTop() > 200 ) {

			if( screenSize <= 600 ) {
				bst_tab_width = '100%';
			} else {
				bst_tab_width = '17.9%';
			}

			$( '.bstone-customizer-tabs' ).css({
				'position' : 'fixed',
				'z-index' : '9999',
				'top' : '46px',
				'left' : bst_tab_border_left,
				'width' : bst_tab_width,
				'min-width': '300px',
				'max-width': '600px',
				'background' : '#ffffff',
				'padding' : '17px 0px',				
				'border-right' : 'solid 1px #dddddd',
				'border-bottom' : 'solid 1px #dddddd'
			});
		} else {
			$( '.bstone-customizer-tabs' ).css({
				'position' : 'relative',
				'z-index' : '0',
				'top' : 'auto',
				'left' : 'auto',
				'width' : 'auto',
				'background' : 'transparent',
				'padding' : '0px',
				'border-right' : 'none',
				'border-bottom' : 'none'
			});
		}
	});
	
})( jQuery );

function bstone_sidebar_width_control(st_customize) {
	"use strict";
	var sb_default 	= st_customize.control('bstone-settings[site-sidebar-layout]').setting.get();
	var sb_page 	= st_customize.control('bstone-settings[single-page-sidebar-layout]').setting.get();
	var sb_post 	= st_customize.control('bstone-settings[single-post-sidebar-layout]').setting.get();
	var sb_blog 	= st_customize.control('bstone-settings[archive-post-sidebar-layout]').setting.get();

	if('no-sidebar'===sb_default && ('no-sidebar'===sb_page || 'default'===sb_page) && ('no-sidebar'===sb_post || 'default'===sb_post) && ('no-sidebar'===sb_blog || 'default'===sb_blog)) {
		st_customize.section('section-color-sidebar').deactivate();
		st_customize.section('section-spacing-sidebar').deactivate();
		st_customize.section('section-sidebar-typo-settings').deactivate();
		
		return false;
	}
	
	st_customize.section('section-color-sidebar').activate();
	st_customize.section('section-spacing-sidebar').activate();
	st_customize.section('section-sidebar-typo-settings').activate();
	return true;
}

function sidebar_spacing_control(st_customize) {
	"use strict";
	var sb_default 	= st_customize.control('bstone-settings[site-sidebar-layout]').setting.get();
	var sb_page 	= st_customize.control('bstone-settings[single-page-sidebar-layout]').setting.get();
	var sb_post 	= st_customize.control('bstone-settings[single-post-sidebar-layout]').setting.get();
	var sb_blog 	= st_customize.control('bstone-settings[archive-post-sidebar-layout]').setting.get();

	if('both-sidebars'===sb_default && ('both-sidebars'===sb_page || 'default'===sb_page) && ('both-sidebars'===sb_post || 'default'===sb_post) && ('both-sidebars'===sb_blog || 'default'===sb_blog)) {		
		return true;
	}
	
	return false;
}