/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

/**
 * Dynamic Internal/Embedded Style for a Control
 */
function bstone_dynamic_css( control, style ) {
	"use strict";
	control = control.replace( '[', '-' );
	control = control.replace( ']', '' );
	jQuery( 'style#' + control ).remove();

	jQuery( 'head' ).append(
		'<style id="' + control + '">' + style + '</style>'
	);
}

( function( $ ) {
	var api = wp.customize;
	
	$( 'h2' ).click(function() {
		wp.customize.previewer.refresh();
	});
	
	// Container Width
	api( 'bstone-settings[site-content-width]', function( value ) {
		value.bind( function( width ) {
			var site_width = parseFloat(width)+40;
			var dynamicStyle = '.st-container, .st-page-builder-template .comments-area, .single.st-page-builder-template .entry-header, .single.st-page-builder-template .post-navigation {';
			dynamicStyle += 'max-width: '+site_width+'px;';
			dynamicStyle += '}';
			dynamicStyle += '.header-2 .st-site-nav nav > div > ul {';
			dynamicStyle += 'max-width: '+width+'px;';
			dynamicStyle += '}';

			bstone_dynamic_css( 'site-content-width', dynamicStyle );
		} );
	} );
	
		
	// Site Title
	api( 'blogname', function( value ) {
		value.bind( function( text ) {
			$( '.site-title a' ).text( text );
		} );
	} );

	// Tagline
	api( 'blogdescription', function( value ) {
		value.bind( function( text ) {
			$( '.site-description' ).text( text );
		} );
	} );

	// Logo Width
	api( 'bstone-settings[bst-header-logo-width]', function( value ) {
		value.bind( function( width ) {
			var dynamicStyle = '.site-logo-img img.custom-logo {';
			if(''===width) {
				dynamicStyle += 'width: auto;';
			}
			else {
				dynamicStyle += 'width: '+width+'px;';
			}
			dynamicStyle += '}';

			bstone_dynamic_css( 'bst-header-logo-width', dynamicStyle );
		} );
	} );

	// Header border bottom width
	api( 'bstone-settings[header-main-sep]', function( value ) {
		value.bind( function( width ) {
			if(''===width){width=0;}
			var dynamicStyle = 'header.site-header {';
			dynamicStyle += 'border-bottom-width: '+width+'px;';
			dynamicStyle += '}';

			bstone_dynamic_css( 'header-main-sep', dynamicStyle );
		} );
	} );

	// Header border bottom color	
	bstone_get_css( api, 'header-main-sep-color', 'header.site-header', 'border-bottom-color', '' );

	// Header nav border top width
	api( 'bstone-settings[header-main-sep-top]', function( value ) {
		value.bind( function( width ) {
			var header2_menu_pos = api.instance('bstone-settings[header-menu-position]').get();
			if(''===width){width=0;}
			var dynamicStyle = '';
			if( 'top' === header2_menu_pos ) {
				dynamicStyle += '.header-2 .st-site-nav nav {';
				dynamicStyle += 'border-top-width: 0px;';
				dynamicStyle += 'border-bottom-width: '+width+'px;';
				dynamicStyle += '}';
			} else {
				dynamicStyle += '.header-2 .st-site-nav nav {';
				dynamicStyle += 'border-top-width: '+width+'px;';
				dynamicStyle += 'border-bottom-width: 0px;';
				dynamicStyle += '}';
			}

			bstone_dynamic_css( 'header-main-sep-top', dynamicStyle );
		} );
	} );

	// Header nav border top color
	bstone_get_css( api, 'header-main-sep-top-color', '.header-2 .st-site-nav nav', ['border-top-color', 'border-bottom-color'], '' );

	// Header Width 
	api( 'bstone-settings[header-main-layout-width]', function( value ) {
		value.bind( function( width ) {
			var dynamicStyle = '';
			if( 'full' === width ) {				
				$( 'header.site-header .main-header-content' ).removeClass("st-container");
				dynamicStyle += '@media (min-width: 769px) {';
				dynamicStyle += '.header-2 header .st-site-nav nav > div > ul {';
				dynamicStyle += 'max-width: 100%;';
				dynamicStyle += '}';
				dynamicStyle += '}';				
				dynamicStyle += bstone_responsive_css(
					'.header-2 .full-width-header .st-site-nav ul > li:first-child > a',
					'bstone-settings[header',
					'left_padding]',
					'padding-left:',
					'px;',
					//['mobile', 'tablet', 'desktop']
					['desktop']
				);				
				dynamicStyle += bstone_responsive_css(
					'.header-2 .full-width-header .st-site-nav ul > li:lbst-child > a',
					'bstone-settings[header',
					'right_padding]',
					'padding-right:',
					'px;',
					['desktop']
				);
				$( 'header.site-header .main-header-wrap' ).addClass("full-width-header");
			}
			else {
				$( 'header.site-header .main-header-content' ).addClass("st-container");
				var site_width = api.instance('bstone-settings[site-content-width]').get();
				dynamicStyle += '@media (min-width: 769px) {.header-2 header .st-site-nav nav > div > ul {';
				dynamicStyle += 'max-width: '+site_width+'px;';
				dynamicStyle += '}}';
				$( 'header.site-header .main-header-wrap' ).removeClass("full-width-header");
			}
			bstone_dynamic_css( 'header-main-layout-width', dynamicStyle );
		} );
	} );

	// Header Layout Classes 
	api( 'bstone-settings[header-layouts]', function( value ) {
		value.bind( function( layout ) {
			if( 'header-main-layout-1' === layout ) {
				$( 'body' ).removeClass("header-2");
				$( 'body' ).addClass("header-1");
			} else if( 'header-main-layout-2' === layout ) {
				$( 'body' ).removeClass("header-1");
				$( 'body' ).addClass("header-2");
			}
		} );
	} );
	
	

	// Sidebar Width
	api( 'bstone-settings[site-sidebar-width]', function( value ) {
		value.bind( function( width ) {
			
			if(typeof parseFloat(width) === 'number') {

				var sb_default 	= api.instance('bstone-settings[site-sidebar-layout]').get();
				var sb_page 	= api.instance('bstone-settings[single-page-sidebar-layout]').get();
				var sb_post 	= api.instance('bstone-settings[single-post-sidebar-layout]').get();
				var sb_blog 	= api.instance('bstone-settings[archive-post-sidebar-layout]').get();

				var dynamicStyle 	 	  = '';
				var primary_width 	 	  = parseFloat((100)-width);
				var primary_width_both 	  = parseFloat((100)-(width)*2);
				var default_style_primary = '';

				// Default Sidebar Settings

				if( 'left-sidebar' === sb_default || 'right-sidebar' === sb_default ) {
					default_style_primary = '#primary {width: '+primary_width+'%;}';
				}
				else if( 'both-sidebars' === sb_default ) {
					default_style_primary = '#primary {width: '+primary_width_both+'%;}';
				}
				else {
					default_style_primary = '#primary {width: 100%;}';
				}

				// Page Sidebar Settings

				if( 'left-sidebar' === sb_page || 'right-sidebar' === sb_page ) {
					dynamicStyle += 'body.page #secondary {width: '+width+'%;}';
					dynamicStyle += 'body.page #primary {width: '+primary_width+'%;}';
				}
				else if( 'both-sidebars' === sb_page ) {
					dynamicStyle += 'body.page #secondary.widget-area, body.page #tertiary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.page #primary {width: '+primary_width_both+'%;}';
				}
				else if( 'default' === sb_page ) {
					dynamicStyle += 'body.page #secondary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.page #tertiary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.page '+default_style_primary;
				}
				else {
					dynamicStyle += 'body.page #primary {width: 100%;}';
				}

				// Blog Single Sidebar Settings

				if( 'left-sidebar' === sb_post || 'right-sidebar' === sb_post ) {
					dynamicStyle += 'body.single-post #secondary {width: '+width+'%;}';
					dynamicStyle += 'body.single-post #primary {width: '+primary_width+'%;}';
				}
				else if( 'both-sidebars' === sb_post ) {
					dynamicStyle += 'body.single-post #secondary.widget-area, body.single-post #tertiary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.single-post #primary {width: '+primary_width_both+'%;}';
				}
				else if( 'default' === sb_post ) {
					dynamicStyle += 'body.single-post #secondary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.single-post #tertiary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.single-post '+default_style_primary;
				}
				else {
					dynamicStyle += 'body.single-post #primary {width: 100%;}';
				}

				// Blog Archives Sidebar Settings

				if( 'left-sidebar' === sb_blog || 'right-sidebar' === sb_blog ) {
					dynamicStyle += 'body.blog #secondary {width: '+width+'%;}';
					dynamicStyle += 'body.blog #primary {width: '+primary_width+'%;}';
				}
				else if( 'both-sidebars' === sb_blog ) {
					dynamicStyle += 'body.blog #secondary.widget-area, body.blog #tertiary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.blog #primary {width: '+primary_width_both+'%;}';
				}
				else if( 'default' === sb_blog ) {
					dynamicStyle += 'body.blog #secondary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.blog #tertiary.widget-area {width: '+width+'%;}';
					dynamicStyle += 'body.blog '+default_style_primary;
				}
				else {
					dynamicStyle += 'body.blog #primary {width: 100%;}';
				}

				bstone_dynamic_css( 'site-sidebar-width', dynamicStyle );
			}
			
		} );
	} );
	
	/**************************
	 * General Color Settings
	 **************************/	
	
	// General Text Color
	bstone_get_css( api, 'base-text-color', 'body, body #primary, body #primary p', 'color', '' );
	bstone_get_css( api, 'link-color', 'a, a:visited', 'color', '' );
	bstone_get_css( api, 'link-h-color', 'a:hover, a:focus', 'color', '' );
	
	bstone_get_css( api, 'highlight-text-color', '::selection', 'color', '' );
	bstone_get_css( api, 'highlight-color', '::selection', 'background-color', '' );
	
	// General Heading Color	
	bstone_get_css( api, 'base-heading-color', 'body #primary h1, body #primary h1 a, body #primary h2, body #primary h2 a, body #primary h3, body #primary h3 a, body #primary h4, body #primary h4 a, body #primary h5, body #primary h5 a, body #primary h6, body #primary h6 a', 'color', '' );

	// Page Background Color
	bstone_get_css( api, 'container-bg-color', 'body #page.site', 'background-color', '' );
	bstone_get_css( api, 'primary-content-bg-color', 'body #primary', 'background-color', '' );
	
	bstone_get_css( api, 'sidebar-bg-color', 'body #secondary', 'background-color', '' );
	bstone_get_css( api, 'sidebar-bg-color', 'body #tertiary', 'background-color', '' );
	bstone_get_css( api, 'widget-bg-color', 'body #secondary aside', 'background-color', '' );
	bstone_get_css( api, 'widget-bg-color', 'body #tertiary aside', 'background-color', '' );
	
	bstone_get_css( api, 'page-bg-img-attachment', 'html body, html body.custom-background', 'background-attachment', '' );
	bstone_get_css( api, 'page-bg-img-repeat', 'html body, html body.custom-background', 'background-repeat', '' );
	bstone_get_css( api, 'page-bg-img-size', 'html body, html body.custom-background', 'background-size', '' );
	
	api( 'bstone-settings[page-bg-img-position]', function( value ) {
		value.bind( function( position ) {
			var img_position = position.replace("-", " ");
			dynamicStyle = 'html body, html body.custom-background {background-position: '+img_position+';}';

			bstone_dynamic_css( 'page-bg-img-position', dynamicStyle );
		} );
	} );
	
	/**************************
	 * Header Color Settings
	 **************************/
	
	// Site Title	
	bstone_get_css( api, 'site-tital-color', 'header .site-title, header .site-title a, header .site-title p, header h1.site-title, header p.site-title', 'color', '' );
	
	// Site Tagline
	bstone_get_css( api, 'site-desc-color', 'header.site-header .site-description, header.site-header .site-description a, header.site-header p.site-description', 'color', '' );

	// Header Background Color
	bstone_get_css( api, 'bg-color-header', 'header.site-header', 'background-color', '' );

	// Header Nav Background Color - Header 2
	bstone_get_css( api, 'menu-bg-color-header', '.header-2 .st-site-nav nav', 'background-color', '' );

	// Header Text Color
	api( 'header_textcolor', function( value ) {
		value.bind( function( color ) {
			dynamicStyle = 'header.site-header .st-head-cta, header.site-header .st-head-cta p {color: '+color+';}';
			bstone_dynamic_css( 'page_header_textcolor', dynamicStyle );
		} );
	} );
	
	bstone_get_css( api, 'link-color-header', 'header.site-header .st-head-cta a', 'color', '' );
	bstone_get_css( api, 'link-hover-color-header', 'header.site-header .st-head-cta a:hover', 'color', '' );

	// Header Nav Color
	bstone_get_css( api, 'menu-link-color-header', 'header.site-header nav .st-main-navigation > ul li a', 'color', '' );
	bstone_get_css( api, 'menu-link-hover-color-header', 'header.site-header nav .st-main-navigation > ul li a:hover, header.site-header nav .st-main-navigation > ul li.current-menu-item a', 'color', '' );

	// Header Menu Alignment
	bstone_get_css( api, 'header-menu-alignment', '.header-2 .st-site-nav nav > div > ul, .header-1 .st-site-nav nav > div > ul', 'justify-content', '' );

	// Header Menu Items Position - Header 2 Only
	bstone_get_css( api, 'header-cmi-1-alignment', '.header-2 .st-head-cta.cta-h-left', 'text-align', '' );	
	bstone_get_css( api, 'header-cmi-2-alignment', '.header-2 .st-head-cta.cta-h-right', 'text-align', '' );

	// Header Menu Position - Header 2 Only
	api( 'bstone-settings[header-menu-position]', function( value ) {
		value.bind( function( position ) {
			var header_nav_border 	  = api.instance('bstone-settings[header-main-sep-top]').get();
			var header_nav_border_color = api.instance('bstone-settings[header-main-sep-top-color]').get();
			var dynamicStyle = '';
				
			dynamicStyle += bstone_responsive_css(
				'.header-2 .main-header-content',
				'bstone-settings[header', 'left_padding]', 'padding-left:', 'px;', ['desktop', 'tablet', 'mobile']
			);
			dynamicStyle += bstone_responsive_css(
				'.header-2 .main-header-content',
				'bstone-settings[header', 'right_padding]', 'padding-right:', 'px;', ['desktop', 'tablet', 'mobile']
			);
			
			if( 'top' === position ) {
				dynamicStyle += bstone_responsive_css(
					'.header-2 .main-header-content',
					'bstone-settings[header', 'bottom_padding]', 'padding-bottom:', 'px;', ['desktop', 'tablet', 'mobile']
				);
				dynamicStyle += bstone_responsive_css(
					'.header-2 .st-site-nav',
					'bstone-settings[header', 'top_padding]', 'margin-bottom:', 'px;', ['desktop', 'tablet', 'mobile']
				);				
				dynamicStyle += '.header-2 .main-header-content {';
				dynamicStyle += 'padding-top: '+'0px;';
				dynamicStyle += '}';
				dynamicStyle += '.header-2 .st-site-nav {';
				dynamicStyle += 'margin-top: '+'0px;';
				dynamicStyle += '}';
				dynamicStyle += '.header-2 .st-site-nav nav {';
				dynamicStyle += 'border-top-width: 0px;';
				dynamicStyle += 'border-bottom-width: '+header_nav_border+'px;';
				dynamicStyle += 'border-bottom-color: '+header_nav_border_color+';';
				dynamicStyle += '}';
			} else {				
				dynamicStyle += bstone_responsive_css(
					'.header-2 .main-header-content',
					'bstone-settings[header', 'top_padding]', 'padding-top:', 'px;', ['desktop', 'tablet', 'mobile']
				);				
				dynamicStyle += bstone_responsive_css(
					'.header-2 .st-site-nav',
					'bstone-settings[header', 'bottom_padding]', 'margin-top:', 'px;', ['desktop', 'tablet', 'mobile']
				);				
				dynamicStyle += '.header-2 .main-header-content {';
				dynamicStyle += 'padding-bottom: '+'0px;';
				dynamicStyle += '}';
				dynamicStyle += '.header-2 .st-site-nav {';
				dynamicStyle += 'margin-bottom: '+'0px;';
				dynamicStyle += '}';
				dynamicStyle += '.header-2 .st-site-nav nav {';
				dynamicStyle += 'border-top-width: '+header_nav_border+'px;';
				dynamicStyle += 'border-bottom-width: 0px;';
				dynamicStyle += 'border-top-color: '+header_nav_border_color+';';
				dynamicStyle += '}';
			}

			bstone_dynamic_css( 'header-menu-position', dynamicStyle );
		} );
	} );
	
	// Transparent Header
	api( 'bstone-settings[enable-transparent-header]', function( value ) {
		value.bind( function( transparent ) {
			var dynamicStyle 		= '';
			var dynamicStyle_header = '';
			var header_bg_color = api.instance('bstone-settings[bg-color-header]').get();
			
			switch(transparent) {
				case false:					
					dynamicStyle += 'header.site-header {';
					dynamicStyle += 'background-color: '+header_bg_color+';';
					dynamicStyle += '}';
					bstone_dynamic_css( 'bg-color-header', dynamicStyle );
					
					dynamicStyle_header += 'header.site-header {';
					dynamicStyle_header += 'top: auto;';
					dynamicStyle_header += 'width: 100%;';
					dynamicStyle_header += 'position: relative;';
					dynamicStyle_header += '}';
					bstone_dynamic_css( 'enable-transparent-header', dynamicStyle_header );
					
					
					break;
				case true:
					dynamicStyle += 'header.site-header {';
					dynamicStyle += 'background-color: transparent;';
					dynamicStyle += '}';
					bstone_dynamic_css( 'bg-color-header', dynamicStyle );
					
					dynamicStyle_header += 'header.site-header {';
					dynamicStyle_header += 'top: 0px;';
					dynamicStyle_header += 'width: 100%;';
					dynamicStyle_header += 'position: absolute;';
					dynamicStyle_header += '}';
					bstone_dynamic_css( 'enable-transparent-header', dynamicStyle_header );					
					break;
				default:					
					dynamicStyle += 'header.site-header {';
					dynamicStyle += 'background-color: '+header_bg_color+';';
					dynamicStyle += '}';
					bstone_dynamic_css( 'bg-color-header', dynamicStyle );
					
					dynamicStyle_header += 'header.site-header {';
					dynamicStyle_header += 'top: auto;';
					dynamicStyle_header += 'width: 100%;';
					dynamicStyle_header += 'position: relative;';
					dynamicStyle_header += '}';
					bstone_dynamic_css( 'enable-transparent-header', dynamicStyle_header );
			}
		} );
	} );
	
	// Footer Width
	api( 'bstone-settings[footer-top-area-width]', function( value ) {
		value.bind( function( width ) {
			switch(width) {
				case 'full':
					$( 'footer .footer_top_markup' ).removeClass("st-container");
					$( 'footer .footer_top_markup .footer_top_markup_inner' ).addClass("full-width");
					$( 'footer .footer_top_markup .footer_top_markup_inner' ).removeClass("st-container");
					break;
				case 'content':
					$( 'footer .footer_top_markup .footer_top_markup_inner' ).removeClass("full-width");
					$( 'footer .footer_top_markup .footer_top_markup_inner' ).addClass("st-container");
					break;
				default:
					$( 'footer .footer_top_markup .footer_top_markup_inner' ).removeClass("full-width");
					$( 'footer .footer_top_markup .footer_top_markup_inner' ).addClass("st-container");
			}
		} );
	} );
	api( 'bstone-settings[footer-bar-width]', function( value ) {
		value.bind( function( width ) {
			switch(width) {
				case 'full':
					$( 'footer .footer_bar_markup .footer_bar_markup_inner' ).addClass("full-width");
					$( 'footer .footer_bar_markup .footer_bar_markup_inner' ).removeClass("st-container");
					break;
				case 'content':
					$( 'footer .footer_bar_markup .footer_bar_markup_inner' ).removeClass("full-width");
					$( 'footer .footer_bar_markup .footer_bar_markup_inner' ).addClass("st-container");
					break;
				default:
					$( 'footer .footer_bar_markup .footer_bar_markup_inner' ).removeClass("full-width");
					$( 'footer .footer_bar_markup .footer_bar_markup_inner' ).addClass("st-container");
			}
		} );
	} );
	
	// Buttons Settings	
	var bstone_buttons_selector = '.menu-toggle, button, .bst-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"], header.site-header .st-head-cta a.button';
	
	var bstone_buttons_hover_selector = '.menu-toggle:hover, button:hover, .bst-button:hover, .button:hover, input#submit:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover, header.site-header .st-head-cta a.button:hover';
	
	bstone_get_css( api, 'btn-border-width', bstone_buttons_selector, 'border-width', 'px' );
	bstone_get_css( api, 'btn-border-radius', bstone_buttons_selector, 'border-radius', 'px' );
	bstone_get_css( api, 'btn_top_padding', bstone_buttons_selector, 'padding-top', 'px' );
	bstone_get_css( api, 'btn_right_padding', bstone_buttons_selector, 'padding-right', 'px' );
	bstone_get_css( api, 'btn_bottom_padding', bstone_buttons_selector, 'padding-bottom', 'px' );
	bstone_get_css( api, 'btn_left_padding', bstone_buttons_selector, 'padding-left', 'px' );	
	bstone_get_css( api, 'buttons-text-color', bstone_buttons_selector, 'color', '' );	
	bstone_get_css( api, 'buttons-background-color', bstone_buttons_selector, 'background-color', '' );	
	bstone_get_css( api, 'buttons-border-color', bstone_buttons_selector, 'border-color', '' );	
	bstone_get_css( api, 'btn-typo-text-transform', bstone_buttons_selector, 'text-transform', '' );
	
	bstone_get_css( api, 'buttons-text-color-hover', bstone_buttons_hover_selector, 'color', '' );	
	bstone_get_css( api, 'buttons-background-color-hover', bstone_buttons_hover_selector, 'background-color', '' );	
	bstone_get_css( api, 'buttons-border-color-hover', bstone_buttons_hover_selector, 'border-color', '' );
	
	bstone_get_css( api, 'readbtn-border-width', '.blog-entry-readmore a', 'border-width', 'px' );
	bstone_get_css( api, 'readbtn-border-radius', '.blog-entry-readmore a', 'border-radius', 'px' );
	bstone_get_css( api, 'readbtn-typo-text-transform', '.blog-entry-readmore a', 'text-transform', '' );
	bstone_get_css( api, 'read-text-color', '.blog-entry-readmore a', 'color', '' );
	bstone_get_css( api, 'read-background-color', '.blog-entry-readmore a', 'background-color', '' );
	bstone_get_css( api, 'read-border-color', '.blog-entry-readmore a', 'border-color', '' );
	bstone_get_css( api, 'read-text-color-hover', '.blog-entry-readmore a:hover', 'color', '' );
	bstone_get_css( api, 'read-background-color-hover', '.blog-entry-readmore a:hover', 'background-color', '' );
	bstone_get_css( api, 'read-border-color-hover', '.blog-entry-readmore a:hover', 'border-color', '' );
	
	// Typography Settings
	bstone_get_css( api, 'body-text-transform', 'body, button, input, select, textarea', 'text-transform', '' );
	bstone_get_css( api, 'body-line-height', 'body, button, input, select, textarea', 'line-height', '' );
	
	bstone_get_css( api, 'h1-text-transform', '#primary h1, #primary h1 a', 'text-transform', '' );
	bstone_get_css( api, 'h2-text-transform', '#primary h2, #primary h2 a', 'text-transform', '' );
	bstone_get_css( api, 'h3-text-transform', '#primary h3, #primary h3 a', 'text-transform', '' );
	bstone_get_css( api, 'h4-text-transform', '#primary h4, #primary h4 a', 'text-transform', '' );
	bstone_get_css( api, 'h5-text-transform', '#primary h5, #primary h5 a', 'text-transform', '' );
	bstone_get_css( api, 'h6-text-transform', '#primary h6, #primary h6 a', 'text-transform', '' );
	
	bstone_get_css( api, 'header-typo-text-transform', 'header.site-header .st-head-cta, header.site-header .st-head-cta p, header.site-header .st-head-cta a', 'text-transform', '' );	
	
	bstone_get_css( api, 'logo-typo-text-transform', 'header .site-title, header .site-title a, header .site-title p, header h1.site-title, header p.site-title', 'text-transform', '' );
	
	bstone_get_css( api, 'tagline-typo-text-transform', 'header.site-header .site-description, header.site-header .site-description a, header.site-header p.site-description', 'text-transform', '' );
	
	bstone_get_css( api, 'nav-typo-text-transform', 'header.site-header nav .st-main-navigation > ul li a', 'text-transform', '' );
	
	bstone_get_css( api, 'sidebar-typo-title-transform', '#secondary aside .widget-title, #secondary .widget .widget-title, #tertiary aside .widget-title, #tertiary .widget .widget-title', 'text-transform', '' );
	
	bstone_get_css( api, 'sidebar-typo-text-transform', '#secondary aside, #secondary .widget, #tertiary aside, #tertiary .widget', 'text-transform', '' );
	
	bstone_get_css( api, 'footer-typo-title-transform', 'footer .footer_top_markup', 'text-transform', '' );
	bstone_get_css( api, 'footer-typo-text-transform', 'footer .footer_top_markup .widget .widget-title', 'text-transform', '' );
	
	bstone_get_css( api, 'footer-bar-typo-title-transform', 'footer .footer_bar_markup', 'text-transform', '' );
	bstone_get_css( api, 'footer-bar-typo-text-transform', 'footer .footer_bar_markup .widget .widget-title', 'text-transform', '' );
	
	bstone_get_css( api, 'blog-typo-title-transform', '#primary .bst-posts-cnt .entry-title, #primary .bst-posts-cnt .entry-title a', 'text-transform', '' );
	bstone_get_css( api, 'blog-typo-entry-transform', '#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a', 'text-transform', '' );	
	
	// Color Settings
	bstone_get_css( api, 'h1-color', '#primary h1, #primary h1 a', 'color', '' );
	bstone_get_css( api, 'h2-color', '#primary h2, #primary h2 a', 'color', '' );
	bstone_get_css( api, 'h3-color', '#primary h3, #primary h3 a', 'color', '' );
	bstone_get_css( api, 'h4-color', '#primary h4, #primary h4 a', 'color', '' );
	bstone_get_css( api, 'h5-color', '#primary h5, #primary h5 a', 'color', '' );
	bstone_get_css( api, 'h6-color', '#primary h6, #primary h6 a', 'color', '' );
	
	bstone_get_css( api, 'sidebar-bg-color', 'body #secondary, body #tertiary', 'background-color', '' );
	bstone_get_css( api, 'widget-bg-color', 'body #secondary aside, body #secondary .widget, body #tertiary aside, body #tertiary .widget', 'background-color', '' );
	bstone_get_css( api, 'sidebar-widget-title-color', '#secondary aside .widget-title, #secondary .widget .widget-title, #tertiary aside .widget-title, #tertiary .widget .widget-title', 'color', '' );
	bstone_get_css( api, 'sidebar-text-color', '#secondary aside, #secondary .widget, #tertiary aside, #tertiary .widget', 'color', '' );
	bstone_get_css( api, 'sidebar-link-color', '#secondary aside a, #secondary .widget a, #tertiary aside a, #tertiary .widget a, #secondary aside ul li, #secondary .widget ul li, #tertiary aside ul li, #tertiary .widget ul li', 'color', '' );
	bstone_get_css( api, 'sidebar-link-color-hover', '#secondary aside a:hover, #secondary .widget a:hover, #tertiary aside a:hover, #tertiary .widget a:hover', 'color', '' );
	
	bstone_get_css( api, 'footer-top-border-color', 'footer .footer_top_markup', 'border-top-color', '' );
	bstone_get_css( api, 'footer-top-background-color', 'footer .footer_top_markup', 'background-color', '' );
	bstone_get_css( api, 'footer-top-border-size', 'footer .footer_top_markup', 'border-top-width', 'px' );
	bstone_get_css( api, 'footer-top-title-color', 'footer .footer_top_markup .widget .widget-title', 'color', '' );
	bstone_get_css( api, 'footer-top-text-color', 'footer .footer_top_markup', 'color', '' );
	bstone_get_css( api, 'footer-top-link-color', 'footer .footer_top_markup a', 'color', '' );
	bstone_get_css( api, 'footer-top-link-hover-color', 'footer .footer_top_markup a:hover', 'color', '' );
	
	bstone_get_css( api, 'footer-bottom-bg-color', 'footer .footer_bar_markup', 'background-color', '' );
	bstone_get_css( api, 'footer-bar-top-border-size', 'footer .footer_bar_markup', 'border-top-width', 'px' );
	bstone_get_css( api, 'footer-bar-bottom-border-size', 'footer .footer_bar_markup', 'border-bottom-width', 'px' );
	bstone_get_css( api, 'footer-bar-top-border-color', 'footer .footer_bar_markup', 'border-top-color', '' );
	bstone_get_css( api, 'footer-bar-bottom-border-color', 'footer .footer_bar_markup', 'border-bottom-color', '' );
	bstone_get_css( api, 'footer-bottom-title-color', 'footer .footer_bar_markup .widget .widget-title', 'color', '' );
	bstone_get_css( api, 'footer-bottom-text-color', 'footer .footer_bar_markup', 'color', '' );
	bstone_get_css( api, 'footer-bottom-link-color', 'footer .footer_bar_markup a', 'color', '' );
	bstone_get_css( api, 'footer-bottom-link-hover-color', 'footer .footer_bar_markup a:hover', 'color', '' );
	
	bstone_get_css( api, 'blog-title-color', '#primary .bst-posts-cnt .entry-title, #primary .bst-posts-cnt .entry-title a', 'color', '' );
	bstone_get_css( api, 'blog-meta-color', '#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a, .entry-meta, .entry-meta *', 'color', '' );
	bstone_get_css( api, 'blog-meta-link-color', '#primary .bst-posts-cnt .entry-meta a', 'color', '' );
	bstone_get_css( api, 'blog-meta-link-color-hover', '#primary .bst-posts-cnt .entry-meta a:hover', 'color', '' );
	bstone_get_css( api, 'blog-entry-bg-color', '#primary .bst-posts-cnt article .bst-article-inner', 'background-color', '' );
	
	// Spacing Settings	
	var header_left_padding_ctrls = ['bstone-settings[header_left_padding]', 'bstone-settings[header_tablet_left_padding]', 'bstone-settings[header_mobile_left_padding]'];
	
	header_left_padding_ctrls.forEach(function(element) {
		api( element, function( value ) {
			value.bind( function() {
				var dynamicStyle = '';

				dynamicStyle += bstone_responsive_css(
					'.header-2 .main-header-content, .main-header-content',
					'bstone-settings[header', 'left_padding]', 'padding-left:', 'px;', ['desktop', 'tablet', 'mobile']
				);

				bstone_dynamic_css( 'header_left_padding', dynamicStyle );
			});
		} );
	});
	
	var header_right_padding_ctrls = ['bstone-settings[header_right_padding]', 'bstone-settings[header_tablet_right_padding]', 'bstone-settings[header_mobile_right_padding]'];
	
	header_right_padding_ctrls.forEach(function(element) {
		api( element, function( value ) {
			value.bind( function() {
				var dynamicStyle = '';

				dynamicStyle += bstone_responsive_css(
					'.header-2 .main-header-content, .main-header-content',
					'bstone-settings[header', 'right_padding]', 'padding-right:', 'px;', ['desktop', 'tablet', 'mobile']
				);

				bstone_dynamic_css( 'header_right_padding', dynamicStyle );
			});
		} );
	});
	
	var header_top_padding_ctrls = ['bstone-settings[header_top_padding]', 'bstone-settings[header_tablet_top_padding]', 'bstone-settings[header_mobile_top_padding]'];
	
	header_top_padding_ctrls.forEach(function(element) {
		api( element, function( value ) {
			value.bind( function() {
				var dynamicStyle = '';
				
				var header_type = api.instance('bstone-settings[header-layouts]').get();
				
				if( 'header-main-layout-2' === header_type ) {
					var header_nav_pos = api.instance('bstone-settings[header-menu-position]').get();
					
					if( 'top' === header_nav_pos ) {
						dynamicStyle += '.header-2 .st-site-nav {margin-top: 0px;}';
						dynamicStyle += '.header-2 .main-header-content, .main-header-content {padding-top: 0px;}';
						
						dynamicStyle += bstone_responsive_css(
							'.header-2 .st-site-nav',
							'bstone-settings[header', 'top_padding]', 'margin-bottom:', 'px;', ['desktop', 'tablet', 'mobile']
						);
					} else {
						dynamicStyle += bstone_responsive_css(
							'.header-2 .main-header-content, .main-header-content',
							'bstone-settings[header', 'top_padding]', 'padding-top:', 'px;', ['desktop', 'tablet', 'mobile']
						);
					}
				} else {
					dynamicStyle += bstone_responsive_css(
						'.header-2 .main-header-content, .main-header-content',
						'bstone-settings[header', 'top_padding]', 'padding-top:', 'px;', ['desktop', 'tablet', 'mobile']
					);
				}
				
				bstone_dynamic_css( 'header_top_padding', dynamicStyle );
			});
		} );
	});
	
	var header_bottom_padding_ctrls = ['bstone-settings[header_bottom_padding]', 'bstone-settings[header_tablet_bottom_padding]', 'bstone-settings[header_mobile_bottom_padding]'];
	
	header_bottom_padding_ctrls.forEach(function(element) {
		api( element, function( value ) {
			value.bind( function() {
				var dynamicStyle = '';

				var header_type = api.instance('bstone-settings[header-layouts]').get();
				
				if( 'header-main-layout-2' === header_type ) {
					var header_nav_pos = api.instance('bstone-settings[header-menu-position]').get();
					
					if( 'top' === header_nav_pos ) {
						dynamicStyle += bstone_responsive_css(
							'.header-2 .main-header-content, .main-header-content',
							'bstone-settings[header', 'bottom_padding]', 'padding-bottom:', 'px;', ['desktop', 'tablet', 'mobile']
						);
					} else {
						dynamicStyle += '.header-2 .st-site-nav {margin-bottom: 0px;}';
						dynamicStyle += '.header-2 .main-header-content, .main-header-content {padding-bottom: 0px;}';
						
						dynamicStyle += bstone_responsive_css(
							'.header-2 .st-site-nav',
							'bstone-settings[header', 'bottom_padding]', 'margin-top:', 'px;', ['desktop', 'tablet', 'mobile']
						);
					}	
				} else {
					dynamicStyle += bstone_responsive_css(
						'.header-2 .main-header-content, .main-header-content',
						'bstone-settings[header', 'bottom_padding]', 'padding-bottom:', 'px;', ['desktop', 'tablet', 'mobile']
					);
				}
				bstone_dynamic_css( 'header_bottom_padding', dynamicStyle );
			});
		} );
	});
	
	var bst_logo_margin = [
		'logo_top_margin', 'logo_tablet_top_margin', 'logo_mobile_top_margin',
		'logo_bottom_margin', 'logo_tablet_bottom_margin', 'logo_mobile_bottom_margin',
		'logo_left_margin', 'logo_tablet_left_margin', 'logo_mobile_left_margin',
		'logo_right_margin', 'logo_tablet_right_margin', 'logo_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, 'header .st-site-identity .site-logo-img img', 'logo', bst_logo_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_site_title_margin = [
		'stitle_top_margin', 'stitle_tablet_top_margin', 'stitle_mobile_top_margin',
		'stitle_bottom_margin', 'stitle_tablet_bottom_margin', 'stitle_mobile_bottom_margin',
		'stitle_left_margin', 'stitle_tablet_left_margin', 'stitle_mobile_left_margin',
		'stitle_right_margin', 'stitle_tablet_right_margin', 'stitle_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, 'header.site-header .site-title', 'stitle', bst_site_title_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_site_tagline_margin = [
		'tagline_top_margin', 'tagline_tablet_top_margin', 'tagline_mobile_top_margin',
		'tagline_bottom_margin', 'tagline_tablet_bottom_margin', 'tagline_mobile_bottom_margin',
		'tagline_left_margin', 'tagline_tablet_left_margin', 'tagline_mobile_left_margin',
		'tagline_right_margin', 'tagline_tablet_right_margin', 'tagline_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, 'header.site-header p.site-description', 'tagline', bst_site_tagline_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_site_navlink_padding = [
		'navlink_top_padding', 'navlink_tablet_top_padding', 'navlink_mobile_top_padding',
		'navlink_bottom_padding', 'navlink_tablet_bottom_padding', 'navlink_mobile_bottom_padding',
		'navlink_left_padding', 'navlink_tablet_left_padding', 'navlink_mobile_left_padding',
		'navlink_right_padding', 'navlink_tablet_right_padding', 'navlink_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.header-2 .st-site-nav ul > li > a, .header-1 .st-site-nav ul > li > a', 'navlink', bst_site_navlink_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_primary_cnt_padding = [
		'pcnt_top_padding', 'pcnt_tablet_top_padding', 'pcnt_mobile_top_padding',
		'pcnt_bottom_padding', 'pcnt_tablet_bottom_padding', 'pcnt_mobile_bottom_padding',
		'pcnt_left_padding', 'pcnt_tablet_left_padding', 'pcnt_mobile_left_padding',
		'pcnt_right_padding', 'pcnt_tablet_right_padding', 'pcnt_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body.page-builder #content > .st-container, body #content > .st-container', 'pcnt', bst_primary_cnt_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_primary_cnt_margin = [
		'pcnt_top_margin', 'pcnt_tablet_top_margin', 'pcnt_mobile_top_margin',
		'pcnt_bottom_margin', 'pcnt_tablet_bottom_margin', 'pcnt_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, 'body.page-builder #content > .st-container, body #content > .st-container', 'pcnt', bst_primary_cnt_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_content_area_padding = [
		'carea_top_padding', 'carea_tablet_top_padding', 'carea_mobile_top_padding',
		'carea_bottom_padding', 'carea_tablet_bottom_padding', 'carea_mobile_bottom_padding',
		'carea_left_padding', 'carea_tablet_left_padding', 'carea_mobile_left_padding',
		'carea_right_padding', 'carea_tablet_right_padding', 'carea_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #primary', 'carea', bst_content_area_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_content_area_margin = [
		'pcontentarea_top_margin', 'pcontentarea_tablet_top_margin', 'pcontentarea_mobile_top_margin',
		'pcontentarea_bottom_margin', 'pcontentarea_tablet_bottom_margin', 'pcontentarea_mobile_bottom_margin',
	];
	bstone_get_responsive_spacings( api, 'body #primary', 'pcontentarea', bst_content_area_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_h1_margin = [
		'h1_top_margin', 'h1_tablet_top_margin', 'h1_mobile_top_margin',
		'h1_bottom_margin', 'h1_tablet_bottom_margin', 'h1_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, '#primary h1, .entry-content h1', 'h1', bst_h1_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_h2_margin = [
		'h2_top_margin', 'h2_tablet_top_margin', 'h2_mobile_top_margin',
		'h2_bottom_margin', 'h2_tablet_bottom_margin', 'h2_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, '#primary h2, .entry-content h2', 'h2', bst_h2_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_h3_margin = [
		'h3_top_margin', 'h3_tablet_top_margin', 'h3_mobile_top_margin',
		'h3_bottom_margin', 'h3_tablet_bottom_margin', 'h3_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, '#primary h3, .entry-content h3', 'h3', bst_h3_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_h4_margin = [
		'h4_top_margin', 'h4_tablet_top_margin', 'h4_mobile_top_margin',
		'h4_bottom_margin', 'h4_tablet_bottom_margin', 'h4_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, '#primary h4, .entry-content h4', 'h4', bst_h4_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_h5_margin = [
		'h5_top_margin', 'h5_tablet_top_margin', 'h5_mobile_top_margin',
		'h5_bottom_margin', 'h5_tablet_bottom_margin', 'h5_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, '#primary h5, .entry-content h5', 'h5', bst_h5_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_h6_margin = [
		'h6_top_margin', 'h6_tablet_top_margin', 'h6_mobile_top_margin',
		'h6_bottom_margin', 'h6_tablet_bottom_margin', 'h6_mobile_bottom_margin'
	];
	bstone_get_responsive_spacings( api, '#primary h6, .entry-content h6', 'h6', bst_h6_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_sidebar_single_padding = [
		'sidebar_top_padding', 'sidebar_tablet_top_padding', 'sidebar_mobile_top_padding',
		'sidebar_bottom_padding', 'sidebar_tablet_bottom_padding', 'sidebar_mobile_bottom_padding',
		'sidebar_left_padding', 'sidebar_tablet_left_padding', 'sidebar_mobile_left_padding',
		'sidebar_right_padding', 'sidebar_tablet_right_padding', 'sidebar_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #secondary.widget-area', 'sidebar', bst_sidebar_single_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_sidebar_tertiary_padding = [
		'sidebarbth_top_padding', 'sidebarbth_tablet_top_padding', 'sidebarbth_mobile_top_padding',
		'sidebarbth_bottom_padding', 'sidebarbth_tablet_bottom_padding', 'sidebarbth_mobile_bottom_padding',
		'sidebarbth_left_padding', 'sidebarbth_tablet_left_padding', 'sidebarbth_mobile_left_padding',
		'sidebarbth_right_padding', 'sidebarbth_tablet_right_padding', 'sidebar_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #tertiary.widget-area', 'sidebarbth', bst_sidebar_tertiary_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	bstone_get_css( api, 'sidebar-widgets-margin-bottom', 'body #secondary.widget-area .widget, body #tertiary.widget-area .widget', 'margin-bottom', 'px' );
	
	bstone_get_css( api, 'sidebar-widgets-title-margin-top', 'body #secondary.widget-area .widget-title, body #tertiary.widget-area .widget-title', 'margin-top', 'px' );
	
	bstone_get_css( api, 'sidebar-widgets-title-margin-bottom', 'body #secondary.widget-area .widget-title, body #tertiary.widget-area .widget-title', 'margin-bottom', 'px' );
	
	var bst_sidebar_widget_padding = [
		'wpadding_top_padding', 'wpadding_tablet_top_padding', 'wpadding_mobile_top_padding',
		'wpadding_bottom_padding', 'wpadding_tablet_bottom_padding', 'wpadding_mobile_bottom_padding',
		'wpadding_left_padding', 'wpadding_tablet_left_padding', 'wpadding_mobile_left_padding',
		'wpadding_right_padding', 'wpadding_tablet_right_padding', 'wpadding_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #secondary.widget-area .widget, body #tertiary.widget-area .widget', 'wpadding', bst_sidebar_widget_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_footer_padding = [
		'footer_top_padding', 'footer_tablet_top_padding', 'footer_mobile_top_padding',
		'footer_bottom_padding', 'footer_tablet_bottom_padding', 'footer_mobile_bottom_padding'
	];
	bstone_get_responsive_spacings( api, 'footer .footer_top_markup', 'footer', bst_footer_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	bstone_get_css( api, 'footer-widgets-margin-bottom', 'footer .footer_top_markup .widget', 'margin-bottom', 'px' );
	bstone_get_css( api, 'footer-widgets-title-margin-bottom', 'footer .footer_top_markup .widget .widget-title', 'margin-bottom', 'px' );
	
	var bst_footer_widget_padding = [
		'fwsp_top_padding', 'fwsp_tablet_top_padding', 'fwsp_mobile_top_padding',
		'fwsp_bottom_padding', 'fwsp_tablet_bottom_padding', 'fwsp_mobile_bottom_padding',
		'fwsp_left_padding', 'fwsp_tablet_left_padding', 'fwsp_mobile_left_padding',
		'fwsp_right_padding', 'fwsp_tablet_right_padding', 'fwsp_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'footer .footer_top_markup .widget', 'fwsp', bst_footer_widget_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_footer_bar_padding = [
		'footer_bar_top_padding', 'footer_bar_tablet_top_padding', 'footer_bar_mobile_top_padding',
		'footer_bar_bottom_padding', 'footer_bar_tablet_bottom_padding', 'footer_bar_mobile_bottom_padding'
	];
	bstone_get_responsive_spacings( api, 'footer .footer_bar_markup', 'footer_bar', bst_footer_bar_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	bstone_get_css( api, 'footer-bar-widgets-margin-bottom', 'footer .footer_bar_markup .widget', 'margin-bottom', 'px' );
	bstone_get_css( api, 'footer-bar-widgets-title-margin-bottom', 'footer .footer_bar_markup .widget .widget-title', 'margin-bottom', 'px' );
	
	var bst_footer_bar_widget_padding = [
		'fbar_sp_top_padding', 'fbar_sp_tablet_top_padding', 'fbar_sp_mobile_top_padding',
		'fbar_sp_bottom_padding', 'fbar_sp_tablet_bottom_padding', 'fbar_sp_mobile_bottom_padding',
		'fbar_sp_left_padding', 'fbar_sp_tablet_left_padding', 'fbar_sp_mobile_left_padding',
		'fbar_sp_right_padding', 'fbar_sp_tablet_right_padding', 'fbar_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'footer .footer_bar_markup .widget', 'fbar_sp', bst_footer_bar_widget_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	bstone_get_css( api, 'header-logo-alignment', '.header-2 .st-site-branding, header .st-site-branding', 'text-align', '' );
	
	var bst_primary_cnt_border = [
		'primarycnt_top_border', 'primarycnt_tablet_top_border', 'primarycnt_mobile_top_border',
		'primarycnt_bottom_border', 'primarycnt_tablet_bottom_border', 'primarycnt_mobile_bottom_border',
		'primarycnt_left_border', 'primarycnt_tablet_left_border', 'primarycnt_mobile_left_border',
		'primarycnt_right_border', 'primarycnt_tablet_right_border', 'primarycnt_mobile_right_border'
	];
	bstone_get_responsive_spacings( api, 'body #primary', 'primarycnt', bst_primary_cnt_border, 'border', 'width', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_secondary_cnt_border = [
		'sidebar_top_border', 'sidebar_tablet_top_border', 'sidebar_mobile_top_border',
		'sidebar_bottom_border', 'sidebar_tablet_bottom_border', 'sidebar_mobile_bottom_border',
		'sidebar_left_border', 'sidebar_tablet_left_border', 'sidebar_mobile_left_border',
		'sidebar_right_border', 'sidebar_tablet_right_border', 'sidebar_mobile_right_border'
	];
	bstone_get_responsive_spacings( api, 'body #secondary', 'sidebar', bst_secondary_cnt_border, 'border', 'width', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_tertiary_cnt_border = [
		'trtrysidebar_top_border', 'trtrysidebar_tablet_top_border', 'trtrysidebar_mobile_top_border',
		'trtrysidebar_bottom_border', 'trtrysidebar_tablet_bottom_border', 'trtrysidebar_mobile_bottom_border',
		'trtrysidebar_left_border', 'trtrysidebar_tablet_left_border', 'trtrysidebar_mobile_left_border',
		'trtrysidebar_right_border', 'trtrysidebar_tablet_right_border', 'trtrysidebar_mobile_right_border'
	];
	bstone_get_responsive_spacings( api, 'body #tertiary', 'trtrysidebar', bst_tertiary_cnt_border, 'border', 'width', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_read_more_btn_padding = [
		'readbtn_top_padding', 'readbtn_tablet_top_padding', 'readbtn_mobile_top_padding',
		'readbtn_bottom_padding', 'readbtn_tablet_bottom_padding', 'readbtn_mobile_bottom_padding',
		'readbtn_left_padding', 'readbtn_tablet_left_padding', 'readbtn_mobile_left_padding',
		'readbtn_right_padding', 'readbtn_tablet_right_padding', 'readbtn_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.blog-entry-readmore a', 'readbtn', bst_read_more_btn_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_blog_article_inner_padding = [
		'bainner_top_padding', 'bainner_tablet_top_padding', 'bainner_mobile_top_padding',
		'bainner_bottom_padding', 'bainner_tablet_bottom_padding', 'bainner_mobile_bottom_padding',
		'bainner_left_padding', 'bainner_tablet_left_padding', 'bainner_mobile_left_padding',
		'bainner_right_padding', 'bainner_tablet_right_padding', 'bainner_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '#primary .bst-posts-cnt article .bst-article-inner', 'bainner', bst_blog_article_inner_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_blog_article_outer_padding = [
		'baouter_top_padding', 'baouter_tablet_top_padding', 'baouter_mobile_top_padding',
		'baouter_bottom_padding', 'baouter_tablet_bottom_padding', 'baouter_mobile_bottom_padding',
		'baouter_left_padding', 'baouter_tablet_left_padding', 'baouter_mobile_left_padding',
		'baouter_right_padding', 'baouter_tablet_right_padding', 'baouter_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, "#primary .bst-posts-cnt article, #primary .bst-posts-cnt article[class^='st-col'], #primary .bst-posts-cnt article[class*='st-col']", 'baouter', bst_blog_article_outer_padding, 'margin-padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_pagination_padding = [
		'pagi_top_padding', 'pagi_tablet_top_padding', 'pagi_mobile_top_padding',
		'pagi_bottom_padding', 'pagi_tablet_bottom_padding', 'pagi_mobile_bottom_padding',
		'pagi_left_padding', 'pagi_tablet_left_padding', 'pagi_mobile_left_padding',
		'pagi_right_padding', 'pagi_tablet_right_padding', 'pagi_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers', 'pagi', bst_pagination_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_sctop_padding = [
		'sctop_top_padding', 'sctop_tablet_top_padding', 'sctop_mobile_top_padding',
		'sctop_bottom_padding', 'sctop_tablet_bottom_padding', 'sctop_mobile_bottom_padding',
		'sctop_left_padding', 'sctop_tablet_left_padding', 'sctop_mobile_left_padding',
		'sctop_right_padding', 'sctop_tablet_right_padding', 'sctop_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '#bstone-scroll-top', 'sctop', bst_sctop_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_bffield_margin = [
		'bffield_top_margin', 'bffield_tablet_top_margin', 'bffield_mobile_top_margin',
		'bffield_bottom_margin', 'bffield_tablet_bottom_margin', 'bffield_mobile_bottom_margin',
		'bffield_left_margin', 'bffield_tablet_left_margin', 'bffield_mobile_left_margin',
		'bffield_right_margin', 'bffield_tablet_right_margin', 'bffield_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, 'body #content form input, body #content form select, body #content form textarea', 'bffield', bst_bffield_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bftextarea_padding = [
		'bftextarea_top_padding', 'bftextarea_tablet_top_padding', 'bftextarea_mobile_top_padding',
		'bftextarea_bottom_padding', 'bftextarea_tablet_bottom_padding', 'bftextarea_mobile_bottom_padding',
		'bftextarea_left_padding', 'bftextarea_tablet_left_padding', 'bftextarea_mobile_left_padding',
		'bftextarea_right_padding', 'bftextarea_tablet_right_padding', 'bftextarea_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #content form textarea', 'bftextarea', bst_bftextarea_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bffield_padding = [
		'bffield_top_padding', 'bffield_tablet_top_padding', 'bffield_mobile_top_padding',
		'bffield_bottom_padding', 'bffield_tablet_bottom_padding', 'bffield_mobile_bottom_padding',
		'bffield_left_padding', 'bffield_tablet_left_padding', 'bffield_mobile_left_padding',
		'bffield_right_padding', 'bffield_tablet_right_padding', 'bffield_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #content form input, body #content form select', 'bffield', bst_bffield_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bfbuttons_padding = [
		'bfbuttons_top_padding', 'bfbuttons_tablet_top_padding', 'bfbuttons_mobile_top_padding',
		'bfbuttons_bottom_padding', 'bfbuttons_tablet_bottom_padding', 'bfbuttons_mobile_bottom_padding',
		'bfbuttons_left_padding', 'bfbuttons_tablet_left_padding', 'bfbuttons_mobile_left_padding',
		'bfbuttons_right_padding', 'bfbuttons_tablet_right_padding', 'bfbuttons_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #content form input[type="reset"], body #content form button', 'bfbuttons', bst_bfbuttons_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	
	// Paragraph Margin 
	bstone_get_css( api, 'para-margin-bottom', '#primary p, #primary .entry-content p', 'margin-bottom', 'em' );
	
	// Blog Styles	
	bstone_get_css( api, 'blog-list-text-position', 'article.bst-post-list .st-flex', 'align-items', '' );
	bstone_get_css( api, 'blog-title-padding-top', '#primary .bst-posts-cnt .entry-title', 'margin-top', 'px' );
	bstone_get_css( api, 'blog-title-padding-bottom', '#primary .bst-posts-cnt .entry-title', 'margin-bottom', 'px' );
	bstone_get_css( api, 'blog-meta-padding-top', '#primary .bst-posts-cnt .entry-meta', 'margin-top', 'px' );
	bstone_get_css( api, 'blog-meta-padding-bottom', '#primary .bst-posts-cnt .entry-meta', 'margin-bottom', 'px' );
	bstone_get_css( api, 'blog-content-padding-top', '#primary .bst-posts-cnt .entry-content', 'margin-top', 'px' );
	bstone_get_css( api, 'blog-content-padding-bottom', '#primary .bst-posts-cnt .entry-content', 'margin-bottom', 'px' );
	bstone_get_css( api, 'post-type-icon-color', '.bst-posts-cnt article .bst-post-type-icon', 'color', '' );
	bstone_get_css( api, 'post-type-icon-bg-color', '.bst-posts-cnt article .bst-post-type-icon', 'background-color', '' );
	bstone_get_css( api, 'post-type-icon-border-color', '.bst-posts-cnt article .bst-post-type-icon', 'border-color', '' );
	bstone_get_css( api, 'post-type-icon-border-size', '.bst-posts-cnt article .bst-post-type-icon', 'border-width', 'px' );
	bstone_get_css( api, 'post-type-icon-border-radius', '.bst-posts-cnt article .bst-post-type-icon', 'border-radius', 'px' );
	bstone_get_css( api, 'img-caption-padding', '.bst-posts-cnt article .thumbnail-caption', 'padding', 'px' );
	bstone_get_css( api, 'img-caption-color', '.bst-posts-cnt article .thumbnail-caption, .bst-posts-cnt article .thumbnail-caption a', 'color', '' );
	bstone_get_css( api, 'img-caption-bg-color', '.bst-posts-cnt article .thumbnail-caption', 'background-color', '' );
	
	bstone_get_css( api, 'pagination-align', '.st-pagination', 'text-align', '' );
	bstone_get_css( api, 'border-color-pagination', '.st-pagination .nav-links a', 'border-color', '' );
	bstone_get_css( api, 'bg-color-pagination', '.st-pagination .nav-links a', 'background-color', '' );
	bstone_get_css( api, 'text-color-pagination', '.st-pagination .nav-links a', 'color', '' );
	
	bstone_get_css( api, 'pagination-border-width', '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers', 'border-width', 'px' );
	bstone_get_css( api, 'pagination-border-radius', '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers', 'border-radius', 'px' );
	bstone_get_css( api, 'text-color-hover-pagination', '.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers', 'color', '' );
	bstone_get_css( api, 'bg-color-hover-pagination', '.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers', 'background-color', '' );
	bstone_get_css( api, 'border-color-hover-pagination', '.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers', 'border-color', '' );
	bstone_get_css( api, 'pagination-text-transform', '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers', 'text-transform', '' );

	// Single Post
	bstone_get_css( api, 'blog-single-max-width', '.single #content > .st-container, .single .st-container.page-header-inner', 'max-width', 'px' );

	// Post Title Area
	bstone_get_css( api, 'page-title-border-width', '#content header.bst-title-section', 'border-bottom-width', 'px' );
	bstone_get_css( api, 'single-typo-title-transform', '.bst-title-section h1', 'text-transform', '' );
	bstone_get_css( api, 'page-single-title-color', '.bst-title-section h1', 'color', '' );
	bstone_get_css( api, 'page-single-breadcrumbs-color', '.bst-title-section .site-breadcrumbs ul li, .bst-title-section .site-breadcrumbs ul li a', 'color', '' );
	bstone_get_css( api, 'page-single-title-bg-color', '#content header.bst-title-section', 'background-color', '' );
	bstone_get_css( api, 'title-img-repeat', '#content header.bst-title-section', 'background-repeat', '' );
	bstone_get_css( api, 'title-img-size', '#content header.bst-title-section', 'background-size', '' );
	bstone_get_css( api, 'title-img-attachment', '#content header.bst-title-section', 'background-attachment', '' );
	bstone_get_css( api, 'page-title-border-color', '#content header.bst-title-section', 'border-bottom-color', '' );
	bstone_get_css( api, 'page-title-bg-overlay-color', '.bst-title-section:after', 'background-color', '' );	
	
	api( 'bstone-settings[title-img-position]', function( value ) {
		value.bind( function( position ) {
			var img_position = position.replace("-", " ");
			dynamicStyle = '#content header.bst-title-section {background-position: '+img_position+';}';

			bstone_dynamic_css( 'title-img-position', dynamicStyle );
		} );
	} );

	// Scroll to Top	
	bstone_get_css( api, 'icon-color-sctop', '#bstone-scroll-top', 'color', '' );
	bstone_get_css( api, 'bg-color-scroll', '#bstone-scroll-top', 'background-color', '' );
	bstone_get_css( api, 'border-color-scroll', '#bstone-scroll-top', 'border-color', '' );
	bstone_get_css( api, 'scroll-border-width', '#bstone-scroll-top', 'border-width', 'px' );
	bstone_get_css( api, 'scroll-border-radius', '#bstone-scroll-top', 'border-radius', 'px' );
	bstone_get_css( api, 'icon-color-hover-sctop', '#bstone-scroll-top:hover', 'color', '' );
	bstone_get_css( api, 'bg-color-hover-scroll', '#bstone-scroll-top:hover', 'background-color', '' );
	bstone_get_css( api, 'border-color-hover-scroll', '#bstone-scroll-top:hover', 'border-color', '' );

	// Form Styles
	api( 'bstone-settings[bstone-toggle-form-label]', function( value ) {
		value.bind( function( display ) {
			if( true === display ) {
				dynamicStyle = 'body #content form label {display: block;}';
			} else {
				dynamicStyle = 'body #content form label {display: none;}';
			}

			bstone_dynamic_css( 'form-label-display-toggle', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[bffield-placeholder-color]', function( value ) {
		value.bind( function( color ) {
			dynamicStyle = '::placeholder {color: '+color+'; opacity: 1;} :-ms-input-placeholder{color: '+color+';} ::-ms-input-placeholder{color: '+color+';}';
			bstone_dynamic_css( 'form-fields-placeholder-color', dynamicStyle );
		} );
	} );
	bstone_get_css( api, 'bffield-text-color', 'body #content form input, body #content form select, body #content form textarea, body #content form label', 'color', '' );
	bstone_get_css( api, 'bffield-bg-color', 'body #content form input, body #content form select, body #content form textarea', 'background-color', '' );
	bstone_get_css( api, 'bffield-border-color', 'body #content form input, body #content form select, body #content form textarea', 'border-color', '' );
	bstone_get_css( api, 'bffield-text-transform', 'body #content form input, body #content form select, body #content form textarea, body #content form label', 'text-transform', '' );
	bstone_get_css( api, 'bstone-fields-border-width', 'body #content form input, body #content form select, body #content form textarea', 'border-width', 'px' );
	bstone_get_css( api, 'bstone-fields-border-radius', 'body #content form input, body #content form select, body #content form textarea', 'border-radius', 'px' );
	bstone_get_css( api, 'bstone-input-height', 'body #content form input, body #content form select', 'height', 'px' );
	bstone_get_css( api, 'bstone-textarea-height', 'body #content form textarea', 'height', 'px' );

	var bfbuttons_selector = 'body #content form input[type="button"], body #content form input[type="reset"], body #content form input[type="submit"], body #content form button';
	var bfbuttons_hover_selector = 'body #content form input[type="button"]:hover, body #content form input[type="reset"]:hover, body #content form input[type="submit"]:hover, body #content form button:hover';
	bstone_get_css( api, 'bfbuttons-bg-color', bfbuttons_selector, 'background-color', '' );
	bstone_get_css( api, 'bfbuttons-bg-color-hover', bfbuttons_hover_selector, 'background-color', '' );
	bstone_get_css( api, 'bfbuttons-text-color', bfbuttons_selector, 'color', '' );
	bstone_get_css( api, 'bfbuttons-text-color-hover', bfbuttons_hover_selector, 'color', '' );
	bstone_get_css( api, 'bfbuttons-border-color', bfbuttons_selector, 'border-color', '' );
	bstone_get_css( api, 'bfbuttons-border-color-hover', bfbuttons_hover_selector, 'border-color', '' );
	bstone_get_css( api, 'bfbuttons-border-width', bfbuttons_selector, 'border-width', 'px' );
	bstone_get_css( api, 'bfbuttons-border-radius', bfbuttons_selector, 'border-radius', 'px' );
	bstone_get_css( api, 'bfbuttons-text-transform', bfbuttons_selector, 'text-transform', '' );
	
} )( jQuery );

function bstone_responsive_css( selector, control1, control2, css1, css2, media_queries ) {
	"use strict";
	var api = wp.customize;
	var cssOutput = '';
	
	var cssNegativeVal = '';
	
	if( '-pxmargin;' === css2 ) {
		cssNegativeVal = '-';
		css2 = 'px;';
		
		css1 = css1.replace("padding", "margin");
	}
	
	var ctrl_val_desktop = api.instance(control1+'_'+control2).get();
	var ctrl_val_tablet = api.instance(control1+'_tablet_'+control2).get();
	var ctrl_val_mobile = api.instance(control1+'_mobile_'+control2).get();
	
	if( '' === ctrl_val_mobile ) {
		if( '' === ctrl_val_tablet ) {
			ctrl_val_mobile = ctrl_val_desktop;
		} else {
			ctrl_val_mobile = ctrl_val_tablet;
		}
	}
	if( '' === ctrl_val_tablet ) { ctrl_val_tablet = ctrl_val_desktop; }
	
	/* Mobile */
	if ( media_queries.indexOf("mobile")>-1 ) {
		cssOutput += '@media (min-width: 120px) {';
		cssOutput += selector+' {';
		cssOutput += css1+cssNegativeVal+ctrl_val_mobile+css2;
		cssOutput += '}';
		cssOutput += '}';
	}
	
	/* Tablet */
	if ( media_queries.indexOf("tablet")>-1 ) {
		cssOutput += '@media (min-width: 481px) {';
		cssOutput += selector+' {';
		cssOutput += css1+cssNegativeVal+ctrl_val_tablet+css2;
		cssOutput += '}';
		cssOutput += '}';
	}
	
	/* Desktop */
	if ( media_queries.indexOf("desktop")>-1 ) {
		cssOutput += '@media (min-width: 921px) {';
		cssOutput += selector+' {';
		cssOutput += css1+cssNegativeVal+ctrl_val_desktop+css2;
		cssOutput += '}';
		cssOutput += '}';
	}
	return cssOutput;
}

function bstone_get_css( api, control, selector, property, unit ) {
	api( 'bstone-settings['+control+']', function( value ) {
		value.bind( function( control_value ) {
			var dynamicStyle = '';
			if ( property instanceof Array ) {
				dynamicStyle += selector+' {';
				property.forEach(function( item ) {
					dynamicStyle += item+': '+control_value+unit+';';
				});
				dynamicStyle += '}';
			} else {
				dynamicStyle += selector+' {';
				dynamicStyle += property+': '+control_value+unit+';';
				dynamicStyle += '}';
			}

			bstone_dynamic_css( control, dynamicStyle );
		} );
	} );
}

function bstone_get_responsive_spacings( api, selector, selector_part, controls, property1, property2, unit, devices ) {
	"use strict";
	if( '' !== property2 ) {
		property2 = '-'+property2;
	}
	
	var function_recall = 0;
	
	if( property1 === 'margin-padding' ) {
		property1 = 'padding';
		function_recall = 1;
	}
	
	if( property1 === 'padding-margin' ) {
		property1 = 'margin';
		function_recall = 1;
	}
	
	controls.forEach(function(element) {
		api( 'bstone-settings['+element+']', function( value ) {	
			
			value.bind( function() {
				var dynamicStyle = '';
				var ptag = '';
				if( element.indexOf("top") > 0 ) { ptag = 'top'; }
				if( element.indexOf("left") > 0 ) { ptag = 'left'; }
				if( element.indexOf("right") > 0 ) { ptag = 'right'; }
				if( element.indexOf("bottom") > 0 ) { ptag = 'bottom'; }
				
				dynamicStyle += bstone_responsive_css(
					selector,
					'bstone-settings['+selector_part, ptag+'_'+property1+']', property1+'-'+ptag+property2+':', unit+';', devices
				);
				bstone_dynamic_css( 'bst_'+selector_part+'_'+property1+'_'+ptag, dynamicStyle );
				
				if( function_recall === 1 && ptag === 'left' && ptag === 'right' ) {
					dynamicStyle += bstone_responsive_css(
						'body.blog #primary .st-row.bst-posts-cnt, body.single-post #primary .st-row.bst-posts-cnt',
						'bstone-settings['+selector_part, ptag+'_'+property1+']', property1+'-'+ptag+property2+':', '-pxmargin'+';', devices
					);
					bstone_dynamic_css( 'bst_'+selector_part+'_'+property1+'_'+ptag, dynamicStyle );
				}
			});
		} );
	});
}