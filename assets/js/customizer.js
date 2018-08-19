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
	bstone_get_css( api, 'header-main-sep-color', 'header.site-header', 'border-bottom-color', '' ,'' );

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
	bstone_get_css( api, 'header-main-sep-top-color', '.header-2 .st-site-nav nav', ['border-top-color', 'border-bottom-color'], '' ,'' );

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
	bstone_get_css( api, 'base-text-color', 'body, body #primary, body #primary p', 'color', '' ,'' );
	bstone_get_css( api, 'link-color', 'a, a:visited', 'color', '' ,'' );
	bstone_get_css( api, 'link-h-color', 'a:hover, a:focus', 'color', '' ,'' );
	
	bstone_get_css( api, 'highlight-text-color', '::selection', 'color', '' ,'' );
	bstone_get_css( api, 'highlight-color', '::selection', 'background-color', '' ,'' );
	
	// General Heading Color	
	bstone_get_css( api, 'base-heading-color', 'body #primary h1, body #primary h1 a, body #primary h2, body #primary h2 a, body #primary h3, body #primary h3 a, body #primary h4, body #primary h4 a, body #primary h5, body #primary h5 a, body #primary h6, body #primary h6 a', 'color', '' ,'' );

	// Page Background Color
	bstone_get_css( api, 'container-bg-color', 'body #page.site', 'background-color', '' ,'' );
	bstone_get_css( api, 'primary-content-bg-color', 'body #primary', 'background-color', '' ,'' );
	bstone_get_css( api, 'main-border-color', 'body #primary, body #secondary, body #tertiary', 'border-color', '' ,'' );
	
	bstone_get_css( api, 'sidebar-bg-color', 'body #secondary', 'background-color', '' ,'' );
	bstone_get_css( api, 'sidebar-bg-color', 'body #tertiary', 'background-color', '' ,'' );
	bstone_get_css( api, 'widget-bg-color', 'body #secondary aside', 'background-color', '' ,'' );
	bstone_get_css( api, 'widget-bg-color', 'body #tertiary aside', 'background-color', '' ,'' );
	
	bstone_get_css( api, 'page-bg-img-attachment', 'html body, html body.custom-background', 'background-attachment', '' ,'' );
	bstone_get_css( api, 'page-bg-img-repeat', 'html body, html body.custom-background', 'background-repeat', '' ,'' );
	bstone_get_css( api, 'page-bg-img-size', 'html body, html body.custom-background', 'background-size', '' ,'' );
	
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
	bstone_get_css( api, 'site-tital-color', 'header .site-title, header .site-title a, header .site-title p, header h1.site-title, header p.site-title', 'color', '' ,'' );
	
	// Site Tagline
	bstone_get_css( api, 'site-desc-color', 'header.site-header .site-description, header.site-header .site-description a, header.site-header p.site-description', 'color', '' ,'' );

	// Header Background Color
	bstone_get_css( api, 'bg-color-header', 'header.site-header', 'background-color', '' ,'' );

	// Header Nav Background Color - Header 2
	bstone_get_css( api, 'menu-bg-color-header', '.header-2 .st-site-nav nav', 'background-color', '' ,'' );

	// Header Text Color
	api( 'header_textcolor', function( value ) {
		value.bind( function( color ) {
			dynamicStyle = 'header.site-header .st-head-cta, header.site-header .st-head-cta p {color: '+color+';}';
			bstone_dynamic_css( 'page_header_textcolor', dynamicStyle );
		} );
	} );
	
	bstone_get_css( api, 'link-color-header', 'header.site-header .st-head-cta a', 'color', '' ,'' );
	bstone_get_css( api, 'link-hover-color-header', 'header.site-header .st-head-cta a:hover', 'color', '' ,'' );

	// Header Nav Color
	bstone_get_css( api, 'menu-link-color-header', 'header.site-header nav .st-main-navigation > ul li a', 'color', '' ,'' );
	bstone_get_css( api, 'menu-link-hover-color-header', 'header.site-header nav .st-main-navigation > ul li a:hover, header.site-header nav .st-main-navigation > ul li.current-menu-item a', 'color', '' ,'' );

	// Header Menu Alignment
	bstone_get_css( api, 'header-menu-alignment', '.header-2 .st-site-nav nav > div > ul, .header-1 .st-site-nav nav > div > ul', 'justify-content', '' ,'' );

	// Header Menu Items Position - Header 2 Only
	bstone_get_css( api, 'header-cmi-1-alignment', '.header-2 .st-head-cta.cta-h-left', 'text-align', '' ,'' );	
	bstone_get_css( api, 'header-cmi-2-alignment', '.header-2 .st-head-cta.cta-h-right', 'text-align', '' ,'' );

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
	
	bstone_get_css( api, 'btn-border-width', bstone_buttons_selector, 'border-width', 'px' ,'' );
	bstone_get_css( api, 'btn-border-radius', bstone_buttons_selector, 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'btn_top_padding', bstone_buttons_selector, 'padding-top', 'px' ,'' );
	bstone_get_css( api, 'btn_right_padding', bstone_buttons_selector, 'padding-right', 'px' ,'' );
	bstone_get_css( api, 'btn_bottom_padding', bstone_buttons_selector, 'padding-bottom', 'px' ,'' );
	bstone_get_css( api, 'btn_left_padding', bstone_buttons_selector, 'padding-left', 'px' ,'' );	
	bstone_get_css( api, 'buttons-text-color', bstone_buttons_selector, 'color', '' ,'' );	
	bstone_get_css( api, 'buttons-background-color', bstone_buttons_selector, 'background-color', '' ,'' );	
	bstone_get_css( api, 'buttons-border-color', bstone_buttons_selector, 'border-color', '' ,'' );	
	bstone_get_css( api, 'btn-typo-text-transform', bstone_buttons_selector, 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'buttons-text-color-hover', bstone_buttons_hover_selector, 'color', '' ,'' );	
	bstone_get_css( api, 'buttons-background-color-hover', bstone_buttons_hover_selector, 'background-color', '' ,'' );	
	bstone_get_css( api, 'buttons-border-color-hover', bstone_buttons_hover_selector, 'border-color', '' ,'' );
	
	bstone_get_css( api, 'readbtn-border-width', '.blog-entry-readmore a', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'readbtn-border-radius', '.blog-entry-readmore a', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'readbtn-typo-text-transform', '.blog-entry-readmore a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'read-text-color', '.blog-entry-readmore a', 'color', '' ,'' );
	bstone_get_css( api, 'read-background-color', '.blog-entry-readmore a', 'background-color', '' ,'' );
	bstone_get_css( api, 'read-border-color', '.blog-entry-readmore a', 'border-color', '' ,'' );
	bstone_get_css( api, 'read-text-color-hover', '.blog-entry-readmore a:hover', 'color', '' ,'' );
	bstone_get_css( api, 'read-background-color-hover', '.blog-entry-readmore a:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'read-border-color-hover', '.blog-entry-readmore a:hover', 'border-color', '' ,'' );
	bstone_get_css( api, 'blog-article-alignment', '.bst-posts-cnt .bst-article-inner', 'text-align', '' ,'' );
	
	// Typography Settings
	bstone_get_css( api, 'body-text-transform', 'body, button, input, select, textarea', 'text-transform', '' ,'' );
	bstone_get_css( api, 'body-line-height', 'body, button, input, select, textarea', 'line-height', '' ,'' );
	
	bstone_get_css( api, 'h1-text-transform', '#primary h1, #primary h1 a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'h2-text-transform', '#primary h2, #primary h2 a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'h3-text-transform', '#primary h3, #primary h3 a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'h4-text-transform', '#primary h4, #primary h4 a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'h5-text-transform', '#primary h5, #primary h5 a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'h6-text-transform', '#primary h6, #primary h6 a', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'header-typo-text-transform', 'header.site-header .st-head-cta, header.site-header .st-head-cta p, header.site-header .st-head-cta a', 'text-transform', '' ,'' );	
	
	bstone_get_css( api, 'logo-typo-text-transform', 'header .site-title, header .site-title a, header .site-title p, header h1.site-title, header p.site-title', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'tagline-typo-text-transform', 'header.site-header .site-description, header.site-header .site-description a, header.site-header p.site-description', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'nav-typo-text-transform', 'header.site-header nav .st-main-navigation > ul li a', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'sidebar-typo-title-transform', '#secondary aside .widget-title, #secondary .widget .widget-title, #tertiary aside .widget-title, #tertiary .widget .widget-title', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'sidebar-typo-text-transform', '#secondary aside, #secondary .widget, #tertiary aside, #tertiary .widget', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'footer-typo-title-transform', 'footer .footer_top_markup .widget .widget-title', 'text-transform', '' ,'' );
	bstone_get_css( api, 'footer-typo-text-transform', 'footer .footer_top_markup', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'footer-bar-typo-title-transform', 'footer .footer_bar_markup', 'text-transform', '' ,'' );
	bstone_get_css( api, 'footer-bar-typo-text-transform', 'footer .footer_bar_markup .widget .widget-title', 'text-transform', '' ,'' );
	
	bstone_get_css( api, 'blog-typo-title-transform', '#primary .bst-posts-cnt .entry-title, #primary .bst-posts-cnt .entry-title a, .bst-popular-posts-widget li .entry-title', 'text-transform', '' ,'' );
	bstone_get_css( api, 'blog-typo-entry-transform', '#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a, .bst-article-inner-single .entry-footer', 'text-transform', '' ,'' );	

	bstone_get_css( api, 'blog-typo-title-transform', '#bp-banner-container .bst-banner-heading', 'text-transform', '' ,'' );
	bstone_get_css( api, 'blog-typo-entry-transform', '#bp-banner-container .bp-banner-category', 'text-transform', '' ,'' );
	bstone_get_css( api, 'blog-typo-entry-transform', '#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a, .single-post #primary .entry-meta, .single-post #primary .entry-meta a, .bst-popular-posts-widget li .bst-widget-post-cnt .entry-meta, .entry-meta *', 'text-transform', '' ,'bstmeta' );
	
	// Color Settings
	bstone_get_css( api, 'h1-color', '#primary h1, #primary h1 a', 'color', '' ,'' );
	bstone_get_css( api, 'h2-color', '#primary h2, #primary h2 a', 'color', '' ,'' );
	bstone_get_css( api, 'h3-color', '#primary h3, #primary h3 a', 'color', '' ,'' );
	bstone_get_css( api, 'h4-color', '#primary h4, #primary h4 a', 'color', '' ,'' );
	bstone_get_css( api, 'h5-color', '#primary h5, #primary h5 a', 'color', '' ,'' );
	bstone_get_css( api, 'h6-color', '#primary h6, #primary h6 a', 'color', '' ,'' );
	
	var bst_side_bar_color_selector = '#secondary aside, #tertiary aside, #tertiary .bst-popular-posts-widget ul.posts-separator li.bst-post-list-separator, #secondary .bst-popular-posts-widget ul.posts-separator li.bst-post-list-separator';
	bstone_get_css( api, 'widget-border-color', bst_side_bar_color_selector, 'border-color', '' ,'' );
	bstone_get_css( api, 'sidebar-bg-color', 'body #secondary, body #tertiary', 'background-color', '' ,'' );
	bstone_get_css( api, 'widget-bg-color', 'body #secondary aside, body #secondary .widget, body #tertiary aside, body #tertiary .widget', 'background-color', '' ,'' );
	bstone_get_css( api, 'sidebar-widget-title-color', '#secondary aside .widget-title, #secondary .widget .widget-title, #tertiary aside .widget-title, #tertiary .widget .widget-title', 'color', '' ,'' );
	bstone_get_css( api, 'sidebar-text-color', '#secondary aside, #secondary .widget, #tertiary aside, #tertiary .widget', 'color', '' ,'' );
	bstone_get_css( api, 'sidebar-link-color', '#secondary aside a, #secondary .widget a, #tertiary aside a, #tertiary .widget a, #secondary aside ul li, #secondary .widget ul li, #tertiary aside ul li, #tertiary .widget ul li', 'color', '' ,'' );
	bstone_get_css( api, 'sidebar-link-color-hover', '#secondary aside a:hover, #secondary .widget a:hover, #tertiary aside a:hover, #tertiary .widget a:hover', 'color', '' ,'' );
	
	bstone_get_css( api, 'footer-top-border-color', 'footer .footer_top_markup', 'border-top-color', '' ,'' );
	bstone_get_css( api, 'footer-top-background-color', 'footer .footer_top_markup', 'background-color', '' ,'' );
	bstone_get_css( api, 'footer-top-border-size', 'footer .footer_top_markup', 'border-top-width', 'px' ,'' );
	bstone_get_css( api, 'footer-top-title-color', 'footer .footer_top_markup .widget .widget-title', 'color', '' ,'' );
	bstone_get_css( api, 'footer-top-text-color', 'footer .footer_top_markup', 'color', '' ,'' );
	bstone_get_css( api, 'footer-top-link-color', 'footer .footer_top_markup a', 'color', '' ,'' );
	bstone_get_css( api, 'footer-top-link-hover-color', 'footer .footer_top_markup a:hover', 'color', '' ,'' );
	
	bstone_get_css( api, 'footer-bottom-bg-color', 'footer .footer_bar_markup', 'background-color', '' ,'' );
	bstone_get_css( api, 'footer-bar-top-border-size', 'footer .footer_bar_markup', 'border-top-width', 'px' ,'' );
	bstone_get_css( api, 'footer-bar-bottom-border-size', 'footer .footer_bar_markup', 'border-bottom-width', 'px' ,'' );
	bstone_get_css( api, 'footer-bar-top-border-color', 'footer .footer_bar_markup', 'border-top-color', '' ,'' );
	bstone_get_css( api, 'footer-bar-bottom-border-color', 'footer .footer_bar_markup', 'border-bottom-color', '' ,'' );
	bstone_get_css( api, 'footer-bottom-title-color', 'footer .footer_bar_markup .widget .widget-title', 'color', '' ,'' );
	bstone_get_css( api, 'footer-bottom-text-color', 'footer .footer_bar_markup', 'color', '' ,'' );
	bstone_get_css( api, 'footer-bottom-link-color', 'footer .footer_bar_markup a', 'color', '' ,'' );
	bstone_get_css( api, 'footer-bottom-link-hover-color', 'footer .footer_bar_markup a:hover', 'color', '' ,'' );
	
	bstone_get_css( api, 'blog-title-color', '#primary .bst-posts-cnt .entry-title, #primary .bst-posts-cnt .entry-title a', 'color', '' ,'' );
	bstone_get_css( api, 'blog-meta-color', '#primary .bst-posts-cnt .entry-meta, #primary .bst-posts-cnt .entry-meta a, .entry-meta, .entry-meta *, .bst-popular-posts-widget li .bst-widget-post-cnt .entry-meta', 'color', '' ,'' );
	bstone_get_css( api, 'blog-meta-link-color', '#primary .bst-posts-cnt .entry-meta a', 'color', '' ,'' );
	bstone_get_css( api, 'blog-meta-link-color-hover', '#primary .bst-posts-cnt .entry-meta a:hover, .bst-article-inner-single .entry-footer a:hover', 'color', '' ,'' );
	bstone_get_css( api, 'blog-entry-bg-color', '#primary .bst-posts-cnt article .bst-article-inner', 'background-color', '' ,'' );
	bstone_get_css( api, 'blog-post-border-radius', '#primary .bst-posts-cnt article .bst-article-inner', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'single-sec-border-size', '.bst-single-post-section', 'border-bottom-width', 'px' ,'' );	
	bstone_get_css( api, 'single-sec-border-size', '#main > .bst-single-post-section', 'border-top-width', 'px' ,'main' );
	bstone_get_css( api, 'main-border-color', '#main > .bst-single-post-section, .bst-single-post-section, #primary .bst-posts-cnt article .bst-article-inner', 'border-color', '' ,'' );

	bstone_get_css( api, 'bp-banner-title-text-color', '#bp-banner-container .bst-banner-heading, #bp-banner-container .bst-banner-heading a', 'color', '' ,'' );
	bstone_get_css( api, 'bp-banner-title-text-color-hover', '#bp-banner-container .bst-banner-heading:hover, #bp-banner-container .bst-banner-heading:hover a', 'color', '' ,'' );
	bstone_get_css( api, 'bp-banner-category-text-color', '#bp-banner-container .bp-banner-category, #bp-banner-container .bp-banner-category a', 'color', '' ,'' );
	bstone_get_css( api, 'bp-banner-category-text-color-hover', '#bp-banner-container .bp-banner-category:hover, #bp-banner-container .bp-banner-category:hover a', 'color', '' ,'' );
	bstone_get_css( api, 'bp-banner-title-bg-color', '#bp-banner-container .bst-banner-heading', 'background-color', '' ,'' );
	bstone_get_css( api, 'bp-banner-title-bg-color-hover', '#bp-banner-container .bst-banner-heading:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'bp-banner-meta-text-color', '#bp-banner-container .bp-banner-meta, #bp-banner-container .bp-banner-meta a, #bp-banner-container .entry-meta *', 'color', '' ,'' );
	bstone_get_css( api, 'bp-banner-overlay-color', '#bp-banner-container .bp-slider-item:after, #bp-banner-container .bpg-small-bg-cnt:after, #bp-banner-container .bp-banner-grid-item.bpg-large:after', 'background', '' ,'' );	
	bstone_get_css( api, 'bp-banner-category-bg-color', '#bp-banner-container .bp-banner-category a', 'background-color', '' ,'' );
	bstone_get_css( api, 'bp-banner-category-bg-color-hover', '#bp-banner-container .bp-banner-category:hover a', 'background-color', '' ,'' );

	api( 'bstone-settings[bp-banner-title-top-padding]', function( value ) {
		value.bind( function( padding ) {
			
			dynamicStyle = '#bp-banner-container .bst-banner-heading a {padding-top: '+padding+'px; padding-bottom: '+padding+'px;}';

			bstone_dynamic_css( 'bp-banner-title-top-padding', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[bp-banner-title-left-padding]', function( value ) {
		value.bind( function( padding ) {
			
			dynamicStyle = '#bp-banner-container .bst-banner-heading a {padding-left: '+padding+'px; padding-right: '+padding+'px;}';

			bstone_dynamic_css( 'bp-banner-title-left-padding', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[bp-banner-cat-top-padding]', function( value ) {
		value.bind( function( padding ) {
			
			dynamicStyle = '#bp-banner-container .bp-banner-category a {padding-top: '+padding+'px; padding-bottom: '+padding+'px;}';

			bstone_dynamic_css( 'bp-banner-cat-top-padding', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[bp-banner-cat-left-padding]', function( value ) {
		value.bind( function( padding ) {
			
			dynamicStyle = '#bp-banner-container .bp-banner-category a {padding-left: '+padding+'px; padding-right: '+padding+'px;}';

			bstone_dynamic_css( 'bp-banner-cat-left-padding', dynamicStyle );
		} );
	} );

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

				dynamicStyle += bstone_responsive_css(
					'body.boxed-container.header-2 .full-width-nav .st-site-nav nav',
					'bstone-settings[header', 'left_padding]', 'margin-left:-', 'px;', ['desktop', 'tablet', 'mobile']
				);

				dynamicStyle += bstone_responsive_css(
					'body.boxed-container.header-2 .full-width-nav .st-site-nav nav ul',
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

				dynamicStyle += bstone_responsive_css(
					'body.boxed-container.header-2 .full-width-nav .st-site-nav nav',
					'bstone-settings[header', 'right_padding]', 'margin-right:-', 'px;', ['desktop', 'tablet', 'mobile']
				);

				dynamicStyle += bstone_responsive_css(
					'body.boxed-container.header-2 .full-width-nav .st-site-nav nav ul',
					'bstone-settings[header', 'right_padding]', 'padding-right:-', 'px;', ['desktop', 'tablet', 'mobile']
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
	
	bstone_get_css( api, 'sidebar-widgets-margin-bottom', 'body #secondary.widget-area .widget, body #tertiary.widget-area .widget', 'margin-bottom', 'px' ,'' );
	
	bstone_get_css( api, 'sidebar-widgets-title-margin-top', 'body #secondary.widget-area .widget-title, body #tertiary.widget-area .widget-title', 'margin-top', 'px' ,'' );
	
	bstone_get_css( api, 'sidebar-widgets-title-margin-bottom', 'body #secondary.widget-area .widget-title, body #tertiary.widget-area .widget-title', 'margin-bottom', 'px' ,'' );
	
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
	
	bstone_get_css( api, 'footer-widgets-margin-bottom', 'footer .footer_top_markup .widget', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'footer-widgets-title-margin-bottom', 'footer .footer_top_markup .widget .widget-title', 'margin-bottom', 'px' ,'' );
	
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
	
	bstone_get_css( api, 'footer-bar-widgets-margin-bottom', 'footer .footer_bar_markup .widget', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'footer-bar-widgets-title-margin-bottom', 'footer .footer_bar_markup .widget .widget-title', 'margin-bottom', 'px' ,'' );
	
	var bst_footer_bar_widget_padding = [
		'fbar_sp_top_padding', 'fbar_sp_tablet_top_padding', 'fbar_sp_mobile_top_padding',
		'fbar_sp_bottom_padding', 'fbar_sp_tablet_bottom_padding', 'fbar_sp_mobile_bottom_padding',
		'fbar_sp_left_padding', 'fbar_sp_tablet_left_padding', 'fbar_sp_mobile_left_padding',
		'fbar_sp_right_padding', 'fbar_sp_tablet_right_padding', 'fbar_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'footer .footer_bar_markup .widget', 'fbar_sp', bst_footer_bar_widget_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	bstone_get_css( api, 'header-logo-alignment', '.header-2 .st-site-branding, header .st-site-branding', 'text-align', '' ,'' );
	
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

	var bst_article_outer_border = [
		'baouter_top_border', 'baouter_tablet_top_border', 'baouter_mobile_top_border',
		'baouter_bottom_border', 'baouter_tablet_bottom_border', 'baouter_mobile_bottom_border',
		'baouter_left_border', 'baouter_tablet_left_border', 'baouter_mobile_left_border',
		'baouter_right_border', 'baouter_tablet_right_border', 'baouter_mobile_right_border'
	];
	bstone_get_responsive_spacings( api, '#primary .bst-posts-cnt article .bst-article-inner', 'baouter', bst_article_outer_border, 'border', 'width', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_bstwidget_border = [
		'bstwidget_top_border', 'bstwidget_tablet_top_border', 'bstwidget_mobile_top_border',
		'bstwidget_bottom_border', 'bstwidget_tablet_bottom_border', 'bstwidget_mobile_bottom_border',
		'bstwidget_left_border', 'bstwidget_tablet_left_border', 'bstwidget_mobile_left_border',
		'bstwidget_right_border', 'bstwidget_tablet_right_border', 'bstwidget_mobile_right_border'
	];
	bstone_get_responsive_spacings( api, '#secondary aside, #tertiary aside', 'bstwidget', bst_bstwidget_border, 'border', 'width', 'px', ['desktop', 'tablet', 'mobile'] );
	
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
	
	var bst_blog_article_outer_padding_bpbanner = [
		'baouter_left_padding', 'baouter_tablet_left_padding', 'baouter_mobile_left_padding',
		'baouter_right_padding', 'baouter_tablet_right_padding', 'baouter_mobile_right_padding'
	];
	bstone_get_responsive_spacings_unique( api, "body.blog #primary .st-row.bst-posts-cnt, body.single-post #primary .st-row.bst-posts-cnt", 'baouter', bst_blog_article_outer_padding_bpbanner, 'margin-padding', 'margin', '', 'px', ['desktop', 'tablet', 'mobile'], 'bpbanner', '-pxmargin' );

	var bst_blog_article_text_padding = [
		'batarea_left_padding', 'batarea_tablet_left_padding', 'batarea_mobile_left_padding',
		'batarea_right_padding', 'batarea_tablet_right_padding', 'batarea_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, "#primary .bst-posts-cnt article .entry-title, #primary .bst-posts-cnt article .entry-meta, #primary .bst-posts-cnt article .entry-content, #primary .bst-posts-cnt article .blog-entry-readmore", 'batarea', bst_blog_article_text_padding, 'margin-padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_article_after_sec_padding = [
		'safsp_top_padding', 'safsp_tablet_top_padding', 'safsp_mobile_top_padding',
		'safsp_bottom_padding', 'safsp_tablet_bottom_padding', 'safsp_mobile_bottom_padding'
	];

	bstone_get_responsive_spacings( api, ".bst-single-post-section", 'safsp', bst_single_article_after_sec_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_article_after_sec_padding_b = [
		'safsp_bottom_padding', 'safsp_tablet_bottom_padding', 'safsp_mobile_bottom_padding'
	];

	bstone_get_responsive_spacings_unique( api, ".single-post #main > article", 'safsp', bst_single_article_after_sec_padding_b, 'margin-padding', 'padding', '', 'px', ['desktop', 'tablet', 'mobile'], 'secpadding', 'px' );

	var bst_pagination_padding = [
		'pagi_top_padding', 'pagi_tablet_top_padding', 'pagi_mobile_top_padding',
		'pagi_bottom_padding', 'pagi_tablet_bottom_padding', 'pagi_mobile_bottom_padding',
		'pagi_left_padding', 'pagi_tablet_left_padding', 'pagi_mobile_left_padding',
		'pagi_right_padding', 'pagi_tablet_right_padding', 'pagi_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li a, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'pagi', bst_pagination_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

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
	bstone_get_responsive_spacings( api, 'body #page form input, body #page form select, body #page form textarea', 'bffield', bst_bffield_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bftextarea_padding = [
		'bftextarea_top_padding', 'bftextarea_tablet_top_padding', 'bftextarea_mobile_top_padding',
		'bftextarea_bottom_padding', 'bftextarea_tablet_bottom_padding', 'bftextarea_mobile_bottom_padding',
		'bftextarea_left_padding', 'bftextarea_tablet_left_padding', 'bftextarea_mobile_left_padding',
		'bftextarea_right_padding', 'bftextarea_tablet_right_padding', 'bftextarea_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #page form textarea', 'bftextarea', bst_bftextarea_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bffield_padding = [
		'bffield_top_padding', 'bffield_tablet_top_padding', 'bffield_mobile_top_padding',
		'bffield_bottom_padding', 'bffield_tablet_bottom_padding', 'bffield_mobile_bottom_padding',
		'bffield_left_padding', 'bffield_tablet_left_padding', 'bffield_mobile_left_padding',
		'bffield_right_padding', 'bffield_tablet_right_padding', 'bffield_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #page form input, body #page form select', 'bffield', bst_bffield_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bfbuttons_padding = [
		'bfbuttons_top_padding', 'bfbuttons_tablet_top_padding', 'bfbuttons_mobile_top_padding',
		'bfbuttons_bottom_padding', 'bfbuttons_tablet_bottom_padding', 'bfbuttons_mobile_bottom_padding',
		'bfbuttons_left_padding', 'bfbuttons_tablet_left_padding', 'bfbuttons_mobile_left_padding',
		'bfbuttons_right_padding', 'bfbuttons_tablet_right_padding', 'bfbuttons_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body #page form input[type="reset"], body #page form button', 'bfbuttons', bst_bfbuttons_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_bpbnr_margin = [
		'bpbnr_top_margin', 'bpbnr_tablet_top_margin', 'bpbnr_mobile_top_margin',
		'bpbnr_bottom_margin', 'bpbnr_tablet_bottom_margin', 'bpbnr_mobile_bottom_margin',
		'bpbnr_left_margin', 'bpbnr_tablet_left_margin', 'bpbnr_mobile_left_margin',
		'bpbnr_right_margin', 'bpbnr_tablet_right_margin', 'bpbnr_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '#bp-banner-container .bp-banner-inner', 'bpbnr', bst_bpbnr_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_bpbnr_padding = [
		'bpbnr_top_padding', 'bpbnr_tablet_top_padding', 'bpbnr_mobile_top_padding',
		'bpbnr_bottom_padding', 'bpbnr_tablet_bottom_padding', 'bpbnr_mobile_bottom_padding',
		'bpbnr_left_padding', 'bpbnr_tablet_left_padding', 'bpbnr_mobile_left_padding',
		'bpbnr_right_padding', 'bpbnr_tablet_right_padding', 'bpbnr_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '#bp-banner-container .bp-banner-inner .bp-banner-content', 'bpbnr', bst_bpbnr_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_titlearea_padding = [
		'bst_title_top_padding', 'bst_title_tablet_top_padding', 'bst_title_mobile_top_padding',
		'bst_title_bottom_padding', 'bst_title_tablet_bottom_padding', 'bst_title_mobile_bottom_padding',
		'bst_title_left_padding', 'bst_title_tablet_left_padding', 'bst_title_mobile_left_padding',
		'bst_title_right_padding', 'bst_title_tablet_right_padding', 'bst_title_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '#content header.bst-title-section', 'bst_title', bst_titlearea_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_title_margin = [
		'bst_single_title_top_margin', 'bst_single_title_tablet_top_margin', 'bst_single_title_mobile_top_margin',
		'bst_single_title_bottom_margin', 'bst_single_title_tablet_bottom_margin', 'bst_single_title_mobile_bottom_margin',
	];
	bstone_get_responsive_spacings( api, '.bst-title-section h1', 'bst_single_title', bst_single_title_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_breadcrumbs_margin = [
		'bst_breadcrumbs_top_margin', 'bst_breadcrumbs_tablet_top_margin', 'bst_breadcrumbs_mobile_top_margin',
		'bst_breadcrumbs_bottom_margin', 'bst_breadcrumbs_tablet_bottom_margin', 'bst_breadcrumbs_mobile_bottom_margin',
	];
	bstone_get_responsive_spacings( api, '.bst-title-section .site-breadcrumbs', 'bst_breadcrumbs', bst_breadcrumbs_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	// Paragraph Margin 
	bstone_get_css( api, 'para-margin-bottom', '#primary p, #primary .entry-content p', 'margin-bottom', 'em' );
	
	// Blog Styles	
	bstone_get_css( api, 'blog-list-text-position', 'article.bst-post-list .st-flex', 'align-items', '' ,'' );
	bstone_get_css( api, 'blog-title-padding-top', '#primary .bst-posts-cnt .entry-title', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'blog-title-padding-bottom', '#primary .bst-posts-cnt .entry-title', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'blog-meta-padding-top', '#primary .bst-posts-cnt .entry-meta, #primary .bst-article-inner-single .entry-meta', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'blog-meta-padding-bottom', '#primary .bst-posts-cnt .entry-meta', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'blog-content-padding-top', '#primary .bst-posts-cnt .entry-content', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'blog-content-padding-bottom', '#primary .bst-posts-cnt .entry-content', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'post-type-icon-color', '.bst-posts-cnt article .bst-post-type-icon', 'color', '' ,'' );
	bstone_get_css( api, 'post-type-icon-bg-color', '.bst-posts-cnt article .bst-post-type-icon', 'background-color', '' ,'' );
	bstone_get_css( api, 'post-type-icon-border-color', '.bst-posts-cnt article .bst-post-type-icon', 'border-color', '' ,'' );
	bstone_get_css( api, 'post-type-icon-border-size', '.bst-posts-cnt article .bst-post-type-icon', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'post-type-icon-border-radius', '.bst-posts-cnt article .bst-post-type-icon', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'img-caption-padding', '.bst-posts-cnt article .thumbnail-caption', 'padding', 'px' ,'' );
	bstone_get_css( api, 'img-caption-color', '.bst-posts-cnt article .thumbnail-caption, .bst-posts-cnt article .thumbnail-caption a', 'color', '' ,'' );
	bstone_get_css( api, 'img-caption-bg-color', '.bst-posts-cnt article .thumbnail-caption', 'background-color', '' ,'' );
	
	bstone_get_css( api, 'blog-single-meta-margin-top', '#primary .bst-article-inner-single .entry-meta', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'blog-single-meta-margin-bottom', '#primary .bst-article-inner-single .entry-meta', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'blog-single-img-margin-top', '.bst-article-inner-single > .thumbnail', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'blog-single-img-margin-bottom', '.bst-article-inner-single > .thumbnail', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'blog-single-footer-margin-top', '.bst-article-inner-single .entry-footer', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'blog-single-footer-margin-bottom', '.bst-article-inner-single .entry-footer', 'margin-bottom', 'px' ,'' );
	
	bstone_get_css( api, 'pagination-align', '.st-pagination, body.woocommerce #page nav.woocommerce-pagination', 'text-align', '' ,'' );
	bstone_get_css( api, 'border-color-pagination', '.st-pagination .nav-links a, body.woocommerce #page nav.woocommerce-pagination ul li a, body.woocommerce #page nav.woocommerce-pagination ul li span', 'border-color', '' ,'' );
	bstone_get_css( api, 'bg-color-pagination', '.st-pagination .nav-links a, body.woocommerce #page nav.woocommerce-pagination ul li a, body.woocommerce #page nav.woocommerce-pagination ul li span', 'background-color', '' ,'' );
	bstone_get_css( api, 'text-color-pagination', '.st-pagination .nav-links a, body.woocommerce #page nav.woocommerce-pagination ul li a, body.woocommerce #page nav.woocommerce-pagination ul li span', 'color', '' ,'' );
	
	bstone_get_css( api, 'pagination-border-width', '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li a body.woocommerce #page nav.woocommerce-pagination ul li span, body.woocommerce #page nav.woocommerce-pagination ul li a, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'pagination-border-radius', '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li span, body.woocommerce #page nav.woocommerce-pagination ul li a, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'text-color-hover-pagination', '.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li span, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'color', '' ,'' );
	bstone_get_css( api, 'bg-color-hover-pagination', '.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li span, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'background-color', '' ,'' );
	bstone_get_css( api, 'border-color-hover-pagination', '.st-pagination .nav-links a:hover, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li span, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'border-color', '' ,'' );
	bstone_get_css( api, 'pagination-text-transform', '.st-pagination .nav-links a, .st-pagination .nav-links span.page-numbers, body.woocommerce #page nav.woocommerce-pagination ul li span, body.woocommerce #page nav.woocommerce-pagination ul li span.current', 'text-transform', '' ,'' );

	// Single Post
	bstone_get_css( api, 'blog-single-max-width', '.single #content > .st-container, .single .st-container.page-header-inner', 'max-width', 'px' ,'' );
	bstone_get_css( api, 'blog-max-width', 'body.blog #content > .st-container, body.archive #content > .st-container, body.blog .st-container.page-header-inner, body.archive .st-container.page-header-inner, body.search #content > .st-container, body.search .st-container.page-header-inner', 'max-width', 'px' ,'' );

	// Post Title Area
	bstone_get_css( api, 'page-title-border-width', '#content header.bst-title-section', 'border-bottom-width', 'px' ,'' );
	bstone_get_css( api, 'single-typo-title-transform', '.bst-title-section h1', 'text-transform', '' ,'' );
	bstone_get_css( api, 'page-single-title-color', '.bst-title-section h1', 'color', '' ,'' );
	bstone_get_css( api, 'page-single-breadcrumbs-color', '.bst-title-section .site-breadcrumbs ul li, .bst-title-section .site-breadcrumbs ul li a', 'color', '' ,'' );
	bstone_get_css( api, 'page-single-title-bg-color', '#content header.bst-title-section', 'background-color', '' ,'' );
	bstone_get_css( api, 'title-img-repeat', '#content header.bst-title-section', 'background-repeat', '' ,'' );
	bstone_get_css( api, 'title-img-size', '#content header.bst-title-section', 'background-size', '' ,'' );
	bstone_get_css( api, 'title-img-attachment', '#content header.bst-title-section', 'background-attachment', '' ,'' );
	bstone_get_css( api, 'page-title-border-color', '#content header.bst-title-section', 'border-bottom-color', '' ,'' );
	bstone_get_css( api, 'page-title-bg-overlay-color', '.bst-title-section:after', 'background-color', '' ,'' );	
	
	api( 'bstone-settings[title-img-position]', function( value ) {
		value.bind( function( position ) {
			var img_position = position.replace("-", " ");
			dynamicStyle = '#content header.bst-title-section {background-position: '+img_position+';}';

			bstone_dynamic_css( 'title-img-position', dynamicStyle );
		} );
	} );

	// Scroll to Top	
	bstone_get_css( api, 'icon-color-sctop', '#bstone-scroll-top', 'color', '' ,'' );
	bstone_get_css( api, 'bg-color-scroll', '#bstone-scroll-top', 'background-color', '' ,'' );
	bstone_get_css( api, 'border-color-scroll', '#bstone-scroll-top', 'border-color', '' ,'' );
	bstone_get_css( api, 'scroll-border-width', '#bstone-scroll-top', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'scroll-border-radius', '#bstone-scroll-top', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'icon-color-hover-sctop', '#bstone-scroll-top:hover', 'color', '' ,'' );
	bstone_get_css( api, 'bg-color-hover-scroll', '#bstone-scroll-top:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'border-color-hover-scroll', '#bstone-scroll-top:hover', 'border-color', '' ,'' );

	// Form Styles
	api( 'bstone-settings[bstone-toggle-form-label]', function( value ) {
		value.bind( function( display ) {
			if( true === display ) {
				dynamicStyle = 'body #page form label {display: block;}';
			} else {
				dynamicStyle = 'body #page form label {display: none;}';
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
	bstone_get_css( api, 'bffield-text-color', 'body #page form input, body #page form select, body #page form textarea, body #page form label', 'color', '' ,'' );
	bstone_get_css( api, 'bffield-bg-color', 'body #page form input, body #page form select, body #page form textarea', 'background-color', '' ,'' );
	bstone_get_css( api, 'bffield-border-color', 'body #page form input, body #page form select, body #page form textarea', 'border-color', '' ,'' );
	bstone_get_css( api, 'bffield-text-transform', 'body #page form input, body #page form select, body #page form textarea, body #page form label', 'text-transform', '' ,'' );
	bstone_get_css( api, 'bstone-fields-border-width', 'body #page form input, body #page form select, body #page form textarea', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'bstone-fields-border-radius', 'body #page form input, body #page form select, body #page form textarea', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'bstone-input-height', 'body #page form input, body #page form select', 'height', 'px' ,'' );
	bstone_get_css( api, 'bstone-textarea-height', 'body #page form textarea', 'height', 'px' ,'' );

	var bfbuttons_selector = 'body #page form input[type="button"], body #page form input[type="reset"], body #page form input[type="submit"], body #page form button';
	var bfbuttons_hover_selector = 'body #page form input[type="button"]:hover, body #page form input[type="reset"]:hover, body #page form input[type="submit"]:hover, body #page form button:hover';
	bstone_get_css( api, 'bfbuttons-bg-color', bfbuttons_selector, 'background-color', '' ,'' );
	bstone_get_css( api, 'bfbuttons-bg-color-hover', bfbuttons_hover_selector, 'background-color', '' ,'' );
	bstone_get_css( api, 'bfbuttons-text-color', bfbuttons_selector, 'color', '' ,'' );
	bstone_get_css( api, 'bfbuttons-text-color-hover', bfbuttons_hover_selector, 'color', '' ,'' );
	bstone_get_css( api, 'bfbuttons-border-color', bfbuttons_selector, 'border-color', '' ,'' );
	bstone_get_css( api, 'bfbuttons-border-color-hover', bfbuttons_hover_selector, 'border-color', '' ,'' );
	bstone_get_css( api, 'bfbuttons-border-width', bfbuttons_selector, 'border-width', 'px' ,'' );
	bstone_get_css( api, 'bfbuttons-border-radius', bfbuttons_selector, 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'bfbuttons-text-transform', bfbuttons_selector, 'text-transform', '' ,'' );


	/**
	 * WooCommerce Shop Customizer Preview
	 */
	bstone_get_css( api, 'sh_pl_set_shop_content_align', '.woocommerce ul.products li.product .bstone-shop-summary-wrap', 'text-align', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_box_item_bg_color', '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_box_item_border_width', '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_box_item_border_radius', '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_box_item_border_color', '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_box_item_border_radius', '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product img.wp-post-image', 'border-top-left-radius', 'px' ,'sha_img_tl_radius' );
	bstone_get_css( api, 'sh_pl_sty_box_item_border_radius', '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product img.wp-post-image', 'border-top-right-radius', 'px' ,'sha_img_tr_radius' );
	
	bstone_get_css( api, 'sh_pl_sty_title_color', '.woocommerce #primary ul.products li.product .woocommerce-loop-product__title', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_title_text_transform', '.woocommerce #primary ul.products li.product .woocommerce-loop-product__title', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_title_text_style', '.woocommerce #primary ul.products li.product .woocommerce-loop-product__title', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_cat_color', '.woocommerce ul.products li.product .bst-woo-product-category', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cat_text_transform', '.woocommerce ul.products li.product .bst-woo-product-category', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cat_text_style', '.woocommerce ul.products li.product .bst-woo-product-category', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_desc_color', '.woocommerce ul.products li.product .bst-woo-shop-product-description', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_desc_text_transform', '.woocommerce ul.products li.product .bst-woo-shop-product-description', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_desc_text_style', '.woocommerce ul.products li.product .bst-woo-shop-product-description', 'font-style', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_desc_line_height', '.woocommerce ul.products li.product .bst-woo-shop-product-description', 'line-height', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_price_color', '.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_price_text_transform', '.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_price_text_style', '.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_sale_price_color', '.woocommerce ul.products li.product .price del', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_price_text_transform', '.woocommerce ul.products li.product .price del', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_price_text_style', '.woocommerce ul.products li.product .price del', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_rating_active_star_color', '.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_rating_star_size', '.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating', 'font-size', 'px' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_rating_star_color', '.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating::before', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_rating_star_size', '.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating::before', 'font-size', 'px' ,'star-size' );
	
	bstone_get_css( api, 'sh_pl_sty_cart_btn_txt_color', '.woocommerce ul.products li.product .button', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_bg_color', '.woocommerce ul.products li.product .button', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_brdr_color', '.woocommerce ul.products li.product .button', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_brdr_width', '.woocommerce ul.products li.product .button', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_brdr_radius', '.woocommerce ul.products li.product .button', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_text_transform', '.woocommerce ul.products li.product .button', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_text_style', '.woocommerce ul.products li.product .button', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_cart_btn_txt_color_hovr', '.woocommerce ul.products li.product .button:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_bg_color_hovr', '.woocommerce ul.products li.product .button:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_cart_btn_brdr_color_hovr', '.woocommerce ul.products li.product .button:hover', 'border-color', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_txt_color', '.woocommerce ul.products li.product .onsale', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_bg_color', '.woocommerce ul.products li.product .onsale', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_brdr_color', '.woocommerce ul.products li.product .onsale', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_brdr_width', '.woocommerce ul.products li.product .onsale', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_brdr_radius', '.woocommerce ul.products li.product .onsale', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_text_transform', '.woocommerce ul.products li.product .onsale', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_sale_bdg_text_style', '.woocommerce ul.products li.product .onsale', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_out_stok_txt_color', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_out_stok_bg_color', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_out_stok_brdr_color', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_out_stok_brdr_width', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_out_stok_brdr_radius', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_out_stok_text_transform', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_out_stok_text_style', '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_title_color', '.woocommerce #primary .summary .product_title, .woocommerce-page  #primary .summary .product_title', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_title_text_transform', '.woocommerce #primary .summary .product_title, .woocommerce-page  #primary .summary .product_title', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_title_text_style', '.woocommerce #primary .summary .product_title, .woocommerce-page  #primary .summary .product_title', 'font-style', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_title_line_height', '.woocommerce #primary .summary .product_title, .woocommerce-page  #primary .summary .product_title', 'line-height', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_price_color', '.woocommerce #page .summary .price, .woocommerce-page #page .summary .price, .woocommerce .summary .woocommerce-Price-amount, .woocommerce-page .summary .woocommerce-Price-amount,  .woocommerce .summary ins .woocommerce-Price-amount, .woocommerce-page .summary ins .woocommerce-Price-amount', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_price_text_transform', '.woocommerce #page .summary .price, .woocommerce-page #page .summary .price, .woocommerce .summary .woocommerce-Price-amount, .woocommerce-page .summary .woocommerce-Price-amount,  .woocommerce .summary ins .woocommerce-Price-amount, .woocommerce-page .summary ins .woocommerce-Price-amount', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_price_text_style', '.woocommerce #page .summary .price, .woocommerce-page #page .summary .price, .woocommerce .summary .woocommerce-Price-amount, .woocommerce-page .summary .woocommerce-Price-amount,  .woocommerce .summary ins .woocommerce-Price-amount, .woocommerce-page .summary ins .woocommerce-Price-amount', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_sale_price_color', '.woocommerce #page .summary del, .woocommerce-page #page .summary del, .woocommerce #page .summary del .woocommerce-Price-amount, .woocommerce-page #page .summary del .woocommerce-Price-amount', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sale_price_text_transform', '.woocommerce #page .summary del, .woocommerce-page #page .summary del, .woocommerce #page .summary del .woocommerce-Price-amount, .woocommerce-page #page .summary del .woocommerce-Price-amount', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sale_price_text_style', '.woocommerce #page .summary del, .woocommerce-page #page .summary del, .woocommerce #page .summary del .woocommerce-Price-amount, .woocommerce-page #page .summary del .woocommerce-Price-amount', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_cat_title_color', '.woocommerce div.product .product_meta > span.posted_in', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cat_text_transform', '.woocommerce div.product .product_meta > span.posted_in', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cat_text_style', '.woocommerce div.product .product_meta > span.posted_in', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_cat_color', '.woocommerce div.product .product_meta > span.posted_in a', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cat_text_transform', '.woocommerce div.product .product_meta > span.posted_in a', 'text-transform', '' ,'link' );
	bstone_get_css( api, 'sh_pp_sty_cat_text_style', '.woocommerce div.product .product_meta > span.posted_in a', 'font-style', '' ,'link' );
	
	bstone_get_css( api, 'sh_pp_sty_tags_title_color', '.woocommerce div.product .product_meta > span.tagged_as', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tags_text_transform', '.woocommerce div.product .product_meta > span.tagged_as', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tags_text_style', '.woocommerce div.product .product_meta > span.tagged_as', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_tags_color', '.woocommerce div.product .product_meta > span.tagged_as a', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tags_text_transform', '.woocommerce div.product .product_meta > span.tagged_as a', 'text-transform', '' ,'link' );
	bstone_get_css( api, 'sh_pp_sty_tags_text_style', '.woocommerce div.product .product_meta > span.tagged_as a', 'font-style', '' ,'link' );
	
	bstone_get_css( api, 'sh_pp_sty_sku_title_color', '.woocommerce div.product .product_meta > span.sku_wrapper', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sku_text_transform', '.woocommerce div.product .product_meta > span.sku_wrapper', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sku_text_style', '.woocommerce div.product .product_meta > span.sku_wrapper', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_sku_color', '.woocommerce div.product .product_meta > span.sku_wrapper span', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sku_text_transform', '.woocommerce div.product .product_meta > span.sku_wrapper span', 'text-transform', '' ,'link' );
	bstone_get_css( api, 'sh_pp_sty_sku_text_style', '.woocommerce div.product .product_meta > span.sku_wrapper span', 'font-style', '' ,'link' );
	
	bstone_get_css( api, 'sh_pp_sty_cart_btn_txt_color', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_bg_color', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_brdr_color', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_brdr_width', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_brdr_radius', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_text_transform', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_text_style', '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_cart_btn_txt_color_hovr', '.woocommerce #page .product .summary form .single_add_to_cart_button:hover, .woocommerce #page .product #review_form #respond .form-submit input:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_bg_color_hovr', '.woocommerce #page .product .summary form .single_add_to_cart_button:hover, .woocommerce #page .product #review_form #respond .form-submit input:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_cart_btn_brdr_color_hovr', '.woocommerce #page .product .summary form .single_add_to_cart_button:hover, .woocommerce #page .product #review_form #respond .form-submit input:hover', 'border-color', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_desc_color', '.woocommerce .product .summary .bst-sp-short-description', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_desc_bg_color', '.woocommerce .product .summary .bst-sp-short-description', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_desc_text_transform', '.woocommerce .product .summary .bst-sp-short-description', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_desc_text_style', '.woocommerce .product .summary .bst-sp-short-description', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_var_txt_color', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_bg_color', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_brdr_color', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_brdr_width', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_fields_height', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'height', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_text_transform', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_text_style', '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_var_label_color', '.woocommerce #page .product .summary form .variations label', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_label_transform', '.woocommerce #page .product .summary form .variations label', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_text_style', '.woocommerce #page .product .summary form .variations label', 'font-style', '' ,'label' );
	
	bstone_get_css( api, 'sh_pp_sty_var_clear_color', '.woocommerce .product .summary .variations .reset_variations', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_clear_transform', '.woocommerce .product .summary .variations .reset_variations', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_text_style', '.woocommerce .product .summary .variations .reset_variations', 'font-style', '' ,'variations' );
	
	bstone_get_css( api, 'sh_pp_sty_var_seprator_color', '.woocommerce div.product form.cart .variations', 'border-bottom-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_var_seprator_width', '.woocommerce div.product form.cart .variations', 'border-bottom-width', 'px' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_qty_color', '.woocommerce #page .product .summary .quantity', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_field_width', '.woocommerce #page .product .summary .quantity', 'max-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_text_transform', '.woocommerce #page .product .summary .quantity', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_text_style', '.woocommerce #page .product .summary .quantity', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_qty_color', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'color', '' ,'input' );
	bstone_get_css( api, 'sh_pp_sty_qty_bg_color', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_border_color', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_brdr_width', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_field_height', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'height', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_qty_text_transform', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'text-transform', '' ,'input' );
	bstone_get_css( api, 'sh_pp_sty_qty_text_style', '.woocommerce #page #primary .product .summary form .quantity input.qty', 'font-style', '' ,'input' );
	
	bstone_get_css( api, 'sh_pp_sty_rating_txt_color', '.woocommerce #page .product .summary .woocommerce-product-rating a', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rating_text_transform', '.woocommerce #page .product .summary .woocommerce-product-rating a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rating_text_style', '.woocommerce #page .product .summary .woocommerce-product-rating a', 'font-style', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rating_text_line_height', '.woocommerce #page .product .summary .woocommerce-product-rating', 'line-height', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_rating_star_color', '.woocommerce #page .product .summary .woocommerce-product-rating .star-rating:before', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rating_active_star_color', '.woocommerce #page .product .summary .woocommerce-product-rating .star-rating span', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rating_star_size', '.woocommerce #page .product .summary .woocommerce-product-rating .star-rating, .woocommerce #page .product .summary .woocommerce-product-rating .star-rating:before', 'font-size', 'px' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_txt_color', '.woocommerce div.product span.onsale', 'color', '' ,'input' );
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_bg_color', '.woocommerce div.product span.onsale', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_brdr_color', '.woocommerce div.product span.onsale', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_brdr_width', '.woocommerce div.product span.onsale', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_brdr_radius', '.woocommerce div.product span.onsale', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_text_transform', '.woocommerce div.product span.onsale', 'text-transform', '' ,'input' );
	bstone_get_css( api, 'sh_pp_sty_sale_bdg_text_style', '.woocommerce div.product span.onsale', 'font-style', '' ,'input' );
	
	bstone_get_css( api, 'sh_pp_sty_out_stok_txt_color', '.woocommerce #page .product .summary .out-of-stock', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_out_stok_bg_color', '.woocommerce #page .product .summary .out-of-stock', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_out_stok_brdr_color', '.woocommerce #page .product .summary .out-of-stock', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_out_stok_brdr_width', '.woocommerce #page .product .summary .out-of-stock', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_out_stok_brdr_radius', '.woocommerce #page .product .summary .out-of-stock', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_out_stok_text_transform', '.woocommerce #page .product .summary .out-of-stock', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_out_stok_text_style', '.woocommerce #page .product .summary .out-of-stock', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_img_bg_color', '.woocommerce .images .woocommerce-product-gallery__image, .woocommerce-page .images .woocommerce-product-gallery__image', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_img_border_color', '.woocommerce .images .woocommerce-product-gallery__image, .woocommerce-page .images .woocommerce-product-gallery__image', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_img_border_width', '.woocommerce .images .woocommerce-product-gallery__image, .woocommerce-page .images .woocommerce-product-gallery__image', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_pp_sty_img_border_radius', '.woocommerce .images .woocommerce-product-gallery__image, .woocommerce-page .images .woocommerce-product-gallery__image', 'border-radius', 'px' ,'' );

	bstone_get_css( api, 'sh_pp_sty_img_thumb_alignment', '.woocommerce div.product div.images .flex-control-thumbs', 'text-align', '' ,'' );

	bstone_get_css( api, 'sh_pp_sty_img_gnav_top', '.woocommerce div.product .images.woocommerce-product-gallery--with-images .flex-direction-nav, .woocommerce-page div.product .images.woocommerce-product-gallery--with-images .flex-direction-nav', 'top', '%' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_tabs_txt_color', '.woocommerce div.product .woocommerce-tabs ul.tabs li a', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tabs_bg_color', '.woocommerce div.product .woocommerce-tabs ul.tabs li a', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tabs_text_transform', '.woocommerce div.product .woocommerce-tabs ul.tabs li a', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tabs_text_style', '.woocommerce div.product .woocommerce-tabs ul.tabs li a', 'font-style', '' ,'' );	
	bstone_get_css( api, 'sh_pp_sty_tabs_active_txt_color', '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tabs_active_bg_color', '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover', 'background-color', '' ,'' );	
	bstone_get_css( api, 'sh_pp_sty_tabs_acbrdr_color', '.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_tabs_divider_color', '.woocommerce div.product .woocommerce-tabs ul.tabs', 'border-top-color', '' ,'' );
	
	bstone_get_css( api, 'sh_pp_sty_rup_heading_color', '.woocommerce #primary .upsells.products h2, .woocommerce-page #primary .upsells.products h2, .woocommerce #primary .related.products h2, .woocommerce-page #primary .related.products h2', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rup_text_transform', '.woocommerce #primary .upsells.products h2, .woocommerce-page #primary .upsells.products h2, .woocommerce #primary .related.products h2, .woocommerce-page #primary .related.products h2', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pp_sty_rup_text_style', '.woocommerce #primary .upsells.products h2, .woocommerce-page #primary .upsells.products h2, .woocommerce #primary .related.products h2, .woocommerce-page #primary .related.products h2', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_filter_text_color', 'body #page form.woocommerce-ordering select.orderby', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_filter_bg_color', 'body #page form.woocommerce-ordering select.orderby', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_filter_border_color', 'body #page form.woocommerce-ordering select.orderby', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_filter_margin_bottom', 'body #page form.woocommerce-ordering select.orderby', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'sh_pl_sty_filter_text_transform', 'body #page form.woocommerce-ordering select.orderby', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_filter_text_style', 'body #page form.woocommerce-ordering select.orderby', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_pl_sty_filter_item_count_color', 'body #primary p.woocommerce-result-count', 'color', '' ,'' );
	bstone_get_css( api, 'sh_pl_sty_filter_margin_bottom', 'body #primary p.woocommerce-result-count', 'margin-bottom', 'px' ,'item-count' );
	bstone_get_css( api, 'sh_pl_sty_filter_text_transform', 'body #primary p.woocommerce-result-count', 'text-transform', '' ,'item-count' );
	bstone_get_css( api, 'sh_pl_sty_filter_text_style', 'body #primary p.woocommerce-result-count', 'font-style', '' ,'item-count' );
	
	bstone_get_css( api, 'sh_cc_sty_shead_text_color', '.woocommerce-cart #primary .cross-sells > h2, .woocommerce-cart #primary .cart_totals h2, .woocommerce-checkout #primary .woocommerce-billing-fields h3, .woocommerce-checkout #primary .woocommerce-additional-fields h3, .woocommerce-checkout #primary h3#order_review_heading', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_shead_text_transform', '.woocommerce-cart #primary .cross-sells > h2, .woocommerce-cart #primary .cart_totals h2, .woocommerce-checkout #primary .woocommerce-billing-fields h3, .woocommerce-checkout #primary .woocommerce-additional-fields h3, .woocommerce-checkout #primary h3#order_review_heading', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_shead_text_style', '.woocommerce-cart #primary .cross-sells > h2, .woocommerce-cart #primary .cart_totals h2, .woocommerce-checkout #primary .woocommerce-billing-fields h3, .woocommerce-checkout #primary .woocommerce-additional-fields h3, .woocommerce-checkout #primary h3#order_review_heading', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_cc_sty_label_text_color', 'body.woocommerce #page form label, body.woocommerce-page #page form label', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_label_text_transform', 'body.woocommerce #page form label, body.woocommerce-page #page form label', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_label_text_style', 'body.woocommerce #page form label, body.woocommerce-page #page form label', 'font-style', '' ,'' );
	
	var woo_form_fld_css = 'body.woocommerce #page form input[type="text"], body.woocommerce #page form input[type="email"], body.woocommerce #page form input[type="tel"], body.woocommerce #page form select, body.woocommerce #page form textarea, body.woocommerce-page #page form input[type="text"], body.woocommerce-page #page form input[type="email"], body.woocommerce-page #page form input[type="tel"], body.woocommerce-page #page form select, body.woocommerce-page #page form textarea, .woocommerce #page .select2-container .select2-selection--single, .woocommerce-page #page .select2-container .select2-selection--single';

	bstone_get_css( api, 'sh_cc_sty_field_text_color', woo_form_fld_css, 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_bg_color', woo_form_fld_css, 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_brdr_color', woo_form_fld_css, 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_brdr_width', woo_form_fld_css, 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_brdr_radius', woo_form_fld_css, 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_text_transform', woo_form_fld_css, 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_text_style', woo_form_fld_css, 'font-style', '' ,'' );
	
	var woo_form_fld_css_focus = 'body.woocommerce #page form input[type="text"]:focus, body.woocommerce #page form input[type="email"]:focus, body.woocommerce #page form input[type="tel"]:focus, body.woocommerce #page form select:focus, body.woocommerce #page form textarea:focus, body.woocommerce-page #page form input[type="text"]:focus, body.woocommerce-page #page form input[type="email"]:focus, body.woocommerce-page #page form input[type="tel"]:focus, body.woocommerce-page #page form select:focus, body.woocommerce-page #page form textarea:focus';

	bstone_get_css( api, 'sh_cc_sty_field_text_color_fcs', woo_form_fld_css_focus, 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_bg_color_fcs', woo_form_fld_css_focus, 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_field_brdr_color_fcs', woo_form_fld_css_focus, 'border-color', '' ,'' );

	bstone_get_css( api, 'sh_cc_sty_button_txt_color', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_bg_color', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_brdr_color', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_brdr_width', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_brdr_radius', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_text_transform', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_text_style', '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'font-style', '' ,'' );

	bstone_get_css( api, 'sh_cc_sty_button_txt_color_hovr', '.woocommerce .cart-collaterals a.button.wc-forward:hover, .woocommerce-page .cart-collaterals a.button.wc-forward:hover, .woocommerce.woocommerce-checkout #payment #place_order:hover, .woocommerce-page.woocommerce-checkout #payment #place_order:hover, .woocommerce a.button.wc-backward:hover, .woocommerce-page a.button.wc-backward:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_bg_color_hovr', '.woocommerce .cart-collaterals a.button.wc-forward:hover, .woocommerce-page .cart-collaterals a.button.wc-forward:hover, .woocommerce.woocommerce-checkout #payment #place_order:hover, .woocommerce-page.woocommerce-checkout #payment #place_order:hover, .woocommerce a.button.wc-backward:hover, .woocommerce-page a.button.wc-backward:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_button_brdr_color_hovr', '.woocommerce .cart-collaterals a.button.wc-forward:hover, .woocommerce-page .cart-collaterals a.button.wc-forward:hover, .woocommerce.woocommerce-checkout #payment #place_order:hover, .woocommerce-page.woocommerce-checkout #payment #place_order:hover, .woocommerce a.button.wc-backward:hover, .woocommerce-page a.button.wc-backward:hover', 'border-color', '' ,'' );	

	bstone_get_css( api, 'sh_cc_sty_update_button_txt_color', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_bg_color', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_brdr_color', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_brdr_width', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_brdr_radius', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_text_transform', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_text_style', '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'font-style', '' ,'' );

	bstone_get_css( api, 'sh_cc_sty_update_button_txt_color_hovr', '.woocommerce #content table.cart td.actions .button:hover, .woocommerce-page #content table.cart td.actions .button:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_bg_color_hovr', '.woocommerce #content table.cart td.actions .button:hover, .woocommerce-page #content table.cart td.actions .button:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_update_button_brdr_color_hovr', '.woocommerce #content table.cart td.actions .button:hover, .woocommerce-page #content table.cart td.actions .button:hover', 'border-color', '' ,'' );

	bstone_get_css( api, 'sh_cc_sty_thumb_brdr_color', '.woocommerce table.cart img, .woocommerce #content table.cart img, .woocommerce-page table.cart img, .woocommerce-page #content table.cart img', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_thumb_brdr_width', '.woocommerce table.cart img, .woocommerce #content table.cart img, .woocommerce-page table.cart img, .woocommerce-page #content table.cart img', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_cc_sty_thumb_brdr_radius', '.woocommerce table.cart img, .woocommerce #content table.cart img, .woocommerce-page table.cart img, .woocommerce-page #content table.cart img', 'border-radius', 'px' ,'' );
	
	bstone_get_css( api, 'sh_cc_sty_osmry_remove_btn_color', '.woocommerce td.product-remove a.remove, .woocommerce-page td.product-remove a.remove', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_osmry_remove_btn_color_hover', '.woocommerce td.product-remove a.remove:hover, .woocommerce-page td.product-remove a.remove:hover', 'color', '' ,'' );	
	bstone_get_css( api, 'sh_cc_sty_osmry_remove_btn_color', '.woocommerce td.product-remove a.remove, .woocommerce-page td.product-remove a.remove', 'border-color', '' ,'border' );
	bstone_get_css( api, 'sh_cc_sty_osmry_remove_btn_color_hover', '.woocommerce td.product-remove a.remove:hover, .woocommerce-page td.product-remove a.remove:hover', 'border-color', '' ,'border' );

	bstone_get_css( api, 'sh_cc_sty_osmry_table_head_bg_color', '.woocommerce table.shop_table thead, .woocommerce-page table.shop_table thead, .woocommerce-cart .cart-collaterals .cart_totals > h2, .woocommerce-cart .cart-collaterals .cross-sells > h2', 'background-color', '' ,'' );	
	bstone_get_css( api, 'sh_cc_sty_osmry_table_head_text_color', '.woocommerce table.shop_table thead, .woocommerce-page table.shop_table thead, .woocommerce-checkout form #order_review th, .woocommerce-cart .cart-collaterals .cart_totals table th', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_osmry_table_text_color', '.woocommerce table.shop_table tbody td, .woocommerce-page table.shop_table tbody td, .woocommerce-checkout form #order_review td', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_osmry_ptitle_color', '.woocommerce td.product-name a, .woocommerce-page td.product-name a', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_osmry_ptitle_hover_color', '.woocommerce td.product-name a:hover, .woocommerce-page td.product-name a:hover', 'color', '' ,'' );

	bstone_get_css( api, 'sh_cc_sty_others_border_color', '.woocommerce table.shop_table, .woocommerce-page table.shop_table, .woocommerce table.shop_table td, .woocommerce-page table.shop_table td, .woocommerce-cart .cart-collaterals .cart_totals, .woocommerce-cart .cart-collaterals .cross-sells, .woocommerce-cart #primary .cart_totals h2, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart ul.products li.product, body.woocommerce-checkout #page form #order_review_heading, body.woocommerce-checkout #page form #order_review, .woocommerce-cart .cart-collaterals .cross-sells > h2', 'border-color', '' ,'' );

	bstone_get_css( api, 'sh_cc_sty_others_chk_order_brdr_width', 'body.woocommerce-checkout #page form #order_review_heading, body.woocommerce-checkout #page form #order_review', 'border-left-width', 'px' ,'chk_border_1' );
	bstone_get_css( api, 'sh_cc_sty_others_chk_order_brdr_width', 'body.woocommerce-checkout #page form #order_review_heading, body.woocommerce-checkout #page form #order_review', 'border-right-width', 'px' ,'chk_border_2' );
	bstone_get_css( api, 'sh_cc_sty_others_chk_order_brdr_width', 'body.woocommerce-checkout #page form #order_review_heading', 'border-top-width', 'px' ,'chk_border_3' );
	bstone_get_css( api, 'sh_cc_sty_others_chk_order_brdr_width', 'body.woocommerce-checkout #page form #order_review', 'border-bottom-width', 'px' ,'chk_border_4' );
	
	bstone_get_css( api, 'sh_cc_sty_others_divider_color', 'body.woocommerce-checkout #page #customer_details h3', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_others_divider_height', 'body.woocommerce-checkout #page #customer_details h3', 'border-bottom-width', 'px' ,'' );

	bstone_get_css( api, 'sh_cc_sty_others_payment_box_text_color', '.woocommerce.woocommerce-checkout #payment div.payment_box, .woocommerce-page.woocommerce-checkout #payment div.payment_box', 'color', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_others_payment_box_bg_color', '.woocommerce.woocommerce-checkout #payment div.payment_box, .woocommerce-page.woocommerce-checkout #payment div.payment_box', 'background-color', '' ,'bg' );
	bstone_get_css( api, 'sh_cc_sty_others_payment_box_line_height', '.woocommerce.woocommerce-checkout #payment div.payment_box, .woocommerce-page.woocommerce-checkout #payment div.payment_box', 'line-height', '' ,'' );
	bstone_get_css( api, 'sh_cc_sty_others_payment_box_bg_color', '.woocommerce.woocommerce-checkout #payment div.payment_box:before, .woocommerce-page.woocommerce-checkout #payment div.payment_box:before', 'border-bottom-color', '' ,'' );

	bstone_get_css( api, 'sh_mc_sty_icon_color', 'body .bst-cart-menu-wrap .count, body .bst-cart-menu-wrap .count:after', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_icon_color', 'body .bst-cart-menu-wrap .count, body .bst-cart-menu-wrap .count:after', 'border-color', '' ,'cart' );

	bstone_get_css( api, 'sh_mc_sty_icon_color_hover', 'body .bst-cart-menu-wrap:hover .count, body .bst-cart-menu-wrap:hover .count:after', 'color', '' ,'hvr' );
	bstone_get_css( api, 'sh_mc_sty_icon_color_hover', 'body .bst-cart-menu-wrap:hover .count, body .bst-cart-menu-wrap:hover .count:after', 'border-color', '' ,'hvrcart' );

	bstone_get_css( api, 'sh_mc_sty_icon_color_text', 'body .bst-cart-menu-wrap:hover .count', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_icon_color_hover', 'body .bst-cart-menu-wrap:hover .count', 'background-color', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_icon_margin_left', 'header.site-header .st-head-cta a.cart-container', 'margin-left', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_icon_margin_right', 'header.site-header .st-head-cta a.cart-container', 'margin-right', 'px' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_container_bg_color', '.bst-site-header-cart .widget_shopping_cart', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_container_border_color', '.bst-site-header-cart .widget_shopping_cart', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_container_border_width', '.bst-site-header-cart .widget_shopping_cart', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_container_border_radius', '.woocommerce .bst-site-header-cart .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart', 'border-radius', 'px' ,'' );

	bstone_get_css( api, 'sh_mc_sty_container_border_color', '.woocommerce .bst-site-header-cart .widget_shopping_cart:before, .bst-site-header-cart .widget_shopping_cart:before', 'border-bottom-color', '' ,'bottom' );

	bstone_get_css( api, 'sh_mc_sty_container_bg_color', '.woocommerce .bst-site-header-cart .widget_shopping_cart:after, .bst-site-header-cart .widget_shopping_cart:after', 'border-bottom-color', '' ,'bottom' );
	
	bstone_get_css( api, 'sh_mc_sty_view_txt_color', '.site-header .bst-site-header-cart-data .button.wc-forward', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_bg_color', '.site-header .bst-site-header-cart-data .button.wc-forward', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_brdr_color', '.site-header .bst-site-header-cart-data .button.wc-forward', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_brdr_width', '.site-header .bst-site-header-cart-data .button.wc-forward', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_brdr_radius', '.site-header .bst-site-header-cart-data .button.wc-forward', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_text_transform', '.site-header .bst-site-header-cart-data .button.wc-forward', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_text_style', '.site-header .bst-site-header-cart-data .button.wc-forward', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_view_txt_color_hovr', '.site-header .bst-site-header-cart-data .button.wc-forward:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_bg_color_hovr', '.site-header .bst-site-header-cart-data .button.wc-forward:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_view_brdr_color_hovr', '.site-header .bst-site-header-cart-data .button.wc-forward:hover', 'border-color', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_checkout_txt_color', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_bg_color', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_brdr_color', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'border-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_brdr_width', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'border-width', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_brdr_radius', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'border-radius', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_text_transform', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'text-transform', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_text_style', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'font-style', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_checkout_txt_color_hovr', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout:hover, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_bg_color_hovr', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout:hover, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward:hover', 'background-color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_checkout_brdr_color_hovr', '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout:hover, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward:hover', 'border-color', '' ,'' );

	bstone_get_css( api, 'sh_mc_sty_content_subtotal_border_color', '.woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total', 'border-top-color', '' ,'top' );
	bstone_get_css( api, 'sh_mc_sty_content_subtotal_border_color', '.woocommerce .widget_shopping_cart .total, .woocommerce.widget_shopping_cart .total', 'border-bottom-color', '' ,'bottom' );
	
	bstone_get_css( api, 'sh_mc_sty_remove_btn_color', '.bst-site-header-cart .widget_shopping_cart .cart_list a.remove', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_remove_btn_color', '.bst-site-header-cart .widget_shopping_cart .cart_list a.remove', 'border-color', '' ,'border' );
	bstone_get_css( api, 'sh_mc_sty_remove_btn_font_size', '.bst-site-header-cart .widget_shopping_cart .cart_list a.remove', 'font-size', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_remove_btn_line_height', '.bst-site-header-cart .widget_shopping_cart .cart_list a.remove', 'line-height', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_remove_btn_color_hover', '.bst-site-header-cart .widget_shopping_cart .cart_list a.remove:hover', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_remove_btn_color_hover', '.bst-site-header-cart .widget_shopping_cart .cart_list a.remove:hover', 'border-color', '' ,'border' );
	
	bstone_get_css( api, 'sh_mc_sty_content_subtotal_color', '.bst-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount', 'color', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_content_ptitle_color', '.bst-site-header-cart .widget_shopping_cart .cart_list a', 'color', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_content_ptitle_line_height', '.bst-site-header-cart .widget_shopping_cart .cart_list a', 'line-height', '' ,'' );
	bstone_get_css( api, 'sh_mc_sty_content_ptitle_margin_top', '.bst-site-header-cart .widget_shopping_cart .cart_list a', 'margin-top', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_content_ptitle_margin_bottom', '.bst-site-header-cart .widget_shopping_cart .cart_list a', 'margin-bottom', 'px' ,'' );
	bstone_get_css( api, 'sh_mc_sty_content_cart_item_padding_bottom', '.woocommerce .bst-site-header-cart .widget_shopping_cart .product_list_widget li, .bst-site-header-cart .widget_shopping_cart .product_list_widget li', 'padding-bottom', 'px' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_content_ptitle_color_hover', '.bst-site-header-cart .widget_shopping_cart .cart_list a:hover', 'color', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_content_divider_color', '.woocommerce .bst-site-header-cart .widget_shopping_cart .product_list_widget li, .bst-site-header-cart .widget_shopping_cart .product_list_widget li', 'border-bottom-color', '' ,'' );
	
	bstone_get_css( api, 'sh_mc_sty_content_text_color', 'header.site-header .st-head-cta .widget_shopping_cart, header.site-header .st-head-cta .widget_shopping_cart p, .bst-site-header-cart .widget_shopping_cart .product_list_widget li', 'color', '' ,'' );
	
	api( 'bstone-settings[sh_pp_sty_gthumbs_img_width]', function( value ) {
		value.bind( function( width ) {
			
			var sc_ps_gallery_thumb_spacing = api.instance('bstone-settings[sh_pp_sty_gthumbs_img_spacing]').get();

			var dynamicStyle = '.woocommerce #page div.product div.woocommerce-product-gallery .flex-control-thumbs li {';
			dynamicStyle += 'width: calc( '+width+'% - '+(sc_ps_gallery_thumb_spacing*2)+'em);';
			dynamicStyle += 'margin-left: '+sc_ps_gallery_thumb_spacing+'em;';
			dynamicStyle += 'margin-right: '+sc_ps_gallery_thumb_spacing+'em;';
			dynamicStyle += 'margin-bottom: '+(sc_ps_gallery_thumb_spacing*2)+'em;';
			dynamicStyle += '}';

			dynamicStyle += '.woocommerce #page div.product div.images.woocommerce-product-gallery .flex-viewport {';
			dynamicStyle += 'margin-bottom: '+(sc_ps_gallery_thumb_spacing*2)+'em;';
			dynamicStyle += '}';

			dynamicStyle += '.woocommerce #page div.product div.woocommerce-product-gallery .flex-control-thumbs {';
			dynamicStyle += 'margin-left: -'+sc_ps_gallery_thumb_spacing+'em;';
			dynamicStyle += 'margin-right: -'+sc_ps_gallery_thumb_spacing+'em;';
			dynamicStyle += '}';

			bstone_dynamic_css( 'sc_sh_pp_sty_gthumbs_img_width', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pp_sty_gthumbs_img_spacing]', function( value ) {
		value.bind( function( spacing ) {
			
			var sc_ps_gallery_thumb_width = api.instance('bstone-settings[sh_pp_sty_gthumbs_img_width]').get();

			var dynamicStyle = '.woocommerce #page div.product div.woocommerce-product-gallery .flex-control-thumbs li {';
			dynamicStyle += 'width: calc( '+sc_ps_gallery_thumb_width+'% - '+(spacing*2)+'em);';
			dynamicStyle += 'margin-left: '+spacing+'em;';
			dynamicStyle += 'margin-right: '+spacing+'em;';
			dynamicStyle += 'margin-bottom: '+(spacing*2)+'em;';
			dynamicStyle += '}';

			dynamicStyle += '.woocommerce #page div.product div.images.woocommerce-product-gallery .flex-viewport {';
			dynamicStyle += 'margin-bottom: '+(spacing*2)+'em;';
			dynamicStyle += '}';

			dynamicStyle += '.woocommerce #page div.product div.woocommerce-product-gallery .flex-control-thumbs {';
			dynamicStyle += 'margin-left: -'+spacing+'em;';
			dynamicStyle += 'margin-right: -'+spacing+'em;';
			dynamicStyle += '}';

			bstone_dynamic_css( 'sc_sh_pp_sty_gthumbs_img_spacing', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_cnt_content_width_custom]', function( value ) {
		value.bind( function( width ) {
			var dynamicStyle = '.bst-woo-shop-archive .site-content > .st-container {';
			dynamicStyle += 'max-width: '+width+'px;';
			dynamicStyle += '}';

			bstone_dynamic_css( 'sh_pl_sty_cnt_content_width_custom', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pp_sty_playout_content_width_custom]', function( value ) {
		value.bind( function( width ) {
			var dynamicStyle = '.woocommerce.single.single-product .site-content > .st-container {';
			dynamicStyle += 'max-width: '+width+'px;';
			dynamicStyle += '}';

			bstone_dynamic_css( 'sh_pp_sty_playout_content_width_custom', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_sale_bdg_position]', function( value ) {
		value.bind( function( position ) {
			bstone_get_position_css(
				'.woocommerce ul.products li.product .onsale', 'sh_pl_sty_sale_bdg_position', 'sh_pl_sty_sale_bdg_position_x', 'sh_pl_sty_sale_bdg_position_y'
			);
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_sale_bdg_position_x]', function( value ) {
		value.bind( function( position ) {
			bstone_get_position_css(
				'.woocommerce ul.products li.product .onsale', 'sh_pl_sty_sale_bdg_position', 'sh_pl_sty_sale_bdg_position_x', 'sh_pl_sty_sale_bdg_position_y'
			);
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_sale_bdg_position_y]', function( value ) {
		value.bind( function( position ) {
			bstone_get_position_css(
				'.woocommerce ul.products li.product .onsale', 'sh_pl_sty_sale_bdg_position', 'sh_pl_sty_sale_bdg_position_x', 'sh_pl_sty_sale_bdg_position_y'
			);
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_out_stok_position]', function( value ) {
		value.bind( function( position ) {
			bstone_get_position_css(
				'.woocommerce ul.products li.product .bst-shop-product-out-of-stock, .woocommerce ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock, .woocommerce-page ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock', 'sh_pl_sty_out_stok_position', 'sh_pl_sty_out_stok_position_x', 'sh_pl_sty_out_stok_position_y'
			);

			control = 'sc-out-stock-pos-img-align';

			if( 'pos-bottom-center' == position || 'pos-top-center' == position ) {

				jQuery( 'style#' + control ).remove();

				jQuery( 'head' ).append(
					'<style id="' + control + '"> .woocommerce ul.products li.product .bstone-shop-thumbnail-wrap a {text-align:center;} </style>'
				);
			} else {
				jQuery( 'style#' + control ).remove();

				jQuery( 'head' ).append(
					'<style id="' + control + '"> .woocommerce ul.products li.product .bstone-shop-thumbnail-wrap a {text-align:left;} </style>'
				);
			}
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_out_stok_position_x]', function( value ) {
		value.bind( function( position ) {
			bstone_get_position_css(
				'.woocommerce ul.products li.product .bst-shop-product-out-of-stock, .woocommerce ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock, .woocommerce-page ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock', 'sh_pl_sty_out_stok_position', 'sh_pl_sty_out_stok_position_x', 'sh_pl_sty_out_stok_position_y'
			);
		} );
	} );

	api( 'bstone-settings[sh_pl_sty_out_stok_position_y]', function( value ) {
		value.bind( function( position ) {
			bstone_get_position_css(
				'.woocommerce ul.products li.product .bst-shop-product-out-of-stock, .woocommerce ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock, .woocommerce-page ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock', 'sh_pl_sty_out_stok_position', 'sh_pl_sty_out_stok_position_x', 'sh_pl_sty_out_stok_position_y'
			);
		} );
	} );

	api( 'bstone-settings[sh_pp_set_single_product_category]', function( value ) {
		value.bind( function( status ) {

			var dynamicStyle = '.woocommerce div.product .product_meta > span.posted_in {';
			if( 'true' === status ) {
				dynamicStyle += 'display: block';
			} else {
				dynamicStyle += 'display: none';
			}
			dynamicStyle += '}';

			bstone_dynamic_css( 'bst_sh_pp_set_single_product_category', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pp_set_single_product_tags]', function( value ) {
		value.bind( function( status ) {
			var dynamicStyle = '.woocommerce div.product .product_meta > span.tagged_as {';
			if( 'false' === status ) {
				dynamicStyle += 'display: none';
			} else {
				dynamicStyle += 'display: block';
			}
			dynamicStyle += '}';

			bstone_dynamic_css( 'bst_sh_pp_set_single_product_tags', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pp_set_single_product_sku]', function( value ) {
		value.bind( function( status ) {
			var dynamicStyle = '.woocommerce div.product .product_meta > span.sku_wrapper {';
			if( 'false' === status ) {
				dynamicStyle += 'display: none';
			} else {
				dynamicStyle += 'display: block';
			}
			dynamicStyle += '}';

			bstone_dynamic_css( 'bst_sh_pp_set_single_product_sku', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pp_set_single_product_breadcrumb]', function( value ) {
		value.bind( function( status ) {
			var dynamicStyle = '.woocommerce .summary .woocommerce-breadcrumb {';
			if( 'false' === status ) {
				dynamicStyle += 'display: none';
			} else {
				dynamicStyle += 'display: block';
			}
			dynamicStyle += '}';

			bstone_dynamic_css( 'bst_sh_pp_set_single_product_breadcrumb', dynamicStyle );
		} );
	} );

	api( 'bstone-settings[sh_pp_sty_cart_btn_full_width]', function( value ) {
		value.bind( function( status ) {

			var dynamicStyle = '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product .summary form .woocommerce-variation-add-to-cart {';
			if( 'true' === status ) {
				dynamicStyle += 'width: 100%';
			} else {
				dynamicStyle += 'width: auto';
			}
			dynamicStyle += '}';

			bstone_dynamic_css( 'bst_sh_pp_sty_cart_btn_full_width', dynamicStyle );
		} );
	} );

	var bst_shop_item_padding = [
		'sh_pl_sty_box_itm_cnt_top_padding', 'sh_pl_sty_box_itm_cnt_tablet_top_padding', 'sh_pl_sty_box_itm_cnt_mobile_top_padding',
		'sh_pl_sty_box_itm_cnt_bottom_padding', 'sh_pl_sty_box_itm_cnt_tablet_bottom_padding', 'sh_pl_sty_box_itm_cnt_mobile_bottom_padding',
		'sh_pl_sty_box_itm_cnt_left_padding', 'sh_pl_sty_box_itm_cnt_tablet_left_padding', 'sh_pl_sty_box_itm_cnt_mobile_left_padding',
		'sh_pl_sty_box_itm_cnt_right_padding', 'sh_pl_sty_box_itm_cnt_tablet_right_padding', 'sh_pl_sty_box_itm_cnt_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product', 'sh_pl_sty_box_itm_cnt', bst_shop_item_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_title_margin = [
		'sh_pl_sty_title_top_margin', 'sh_pl_sty_title_tablet_top_margin', 'sh_pl_sty_title_mobile_top_margin',
		'sh_pl_sty_title_bottom_margin', 'sh_pl_sty_title_tablet_bottom_margin', 'sh_pl_sty_title_mobile_bottom_margin',
		'sh_pl_sty_title_left_margin', 'sh_pl_sty_title_tablet_left_margin', 'sh_pl_sty_title_mobile_left_margin',
		'sh_pl_sty_title_right_margin', 'sh_pl_sty_title_tablet_right_margin', 'sh_pl_sty_title_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #primary ul.products li.product .woocommerce-loop-product__title', 'sh_pl_sty_title', bst_shop_item_title_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_cat_margin = [
		'sh_pl_sty_cat_top_margin', 'sh_pl_sty_cat_tablet_top_margin', 'sh_pl_sty_cat_mobile_top_margin',
		'sh_pl_sty_cat_bottom_margin', 'sh_pl_sty_cat_tablet_bottom_margin', 'sh_pl_sty_cat_mobile_bottom_margin',
		'sh_pl_sty_cat_left_margin', 'sh_pl_sty_cat_tablet_left_margin', 'sh_pl_sty_cat_mobile_left_margin',
		'sh_pl_sty_cat_right_margin', 'sh_pl_sty_cat_tablet_right_margin', 'sh_pl_sty_cat_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .bst-woo-product-category', 'sh_pl_sty_cat', bst_shop_item_cat_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_desc_margin = [
		'sh_pl_sty_desc_top_margin', 'sh_pl_sty_desc_tablet_top_margin', 'sh_pl_sty_desc_mobile_top_margin',
		'sh_pl_sty_desc_bottom_margin', 'sh_pl_sty_desc_tablet_bottom_margin', 'sh_pl_sty_desc_mobile_bottom_margin',
		'sh_pl_sty_desc_left_margin', 'sh_pl_sty_desc_tablet_left_margin', 'sh_pl_sty_desc_mobile_left_margin',
		'sh_pl_sty_desc_right_margin', 'sh_pl_sty_desc_tablet_right_margin', 'sh_pl_sty_desc_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .bst-woo-shop-product-description', 'sh_pl_sty_desc', bst_shop_item_desc_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_rprice_margin = [
		'sh_pl_sty_price_top_margin', 'sh_pl_sty_price_tablet_top_margin', 'sh_pl_sty_price_mobile_top_margin',
		'sh_pl_sty_price_bottom_margin', 'sh_pl_sty_price_tablet_bottom_margin', 'sh_pl_sty_price_mobile_bottom_margin',
		'sh_pl_sty_price_left_margin', 'sh_pl_sty_price_tablet_left_margin', 'sh_pl_sty_price_mobile_left_margin',
		'sh_pl_sty_price_right_margin', 'sh_pl_sty_price_tablet_right_margin', 'sh_pl_sty_price_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins', 'sh_pl_sty_price', bst_shop_item_rprice_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_sprice_margin = [
		'sh_pl_sty_sale_price_top_margin', 'sh_pl_sty_sale_price_tablet_top_margin', 'sh_pl_sty_sale_price_mobile_top_margin',
		'sh_pl_sty_sale_price_bottom_margin', 'sh_pl_sty_sale_price_tablet_bottom_margin', 'sh_pl_sty_sale_price_mobile_bottom_margin',
		'sh_pl_sty_sale_price_left_margin', 'sh_pl_sty_sale_price_tablet_left_margin', 'sh_pl_sty_sale_price_mobile_left_margin',
		'sh_pl_sty_sale_price_right_margin', 'sh_pl_sty_sale_price_tablet_right_margin', 'sh_pl_sty_sale_price_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .price del', 'sh_pl_sty_sale_price', bst_shop_item_sprice_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_star_margin = [
		'sh_pl_sty_rating_top_margin', 'sh_pl_sty_rating_tablet_top_margin', 'sh_pl_sty_rating_mobile_top_margin',
		'sh_pl_sty_rating_bottom_margin', 'sh_pl_sty_rating_tablet_bottom_margin', 'sh_pl_sty_rating_mobile_bottom_margin',
		'sh_pl_sty_rating_left_margin', 'sh_pl_sty_rating_tablet_left_margin', 'sh_pl_sty_rating_mobile_left_margin',
		'sh_pl_sty_rating_right_margin', 'sh_pl_sty_rating_tablet_right_margin', 'sh_pl_sty_rating_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating', 'sh_pl_sty_rating', bst_shop_item_star_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_button_margin = [
		'sh_pl_sty_cart_btn_top_margin', 'sh_pl_sty_cart_btn_tablet_top_margin', 'sh_pl_sty_cart_btn_mobile_top_margin',
		'sh_pl_sty_cart_btn_bottom_margin', 'sh_pl_sty_cart_btn_tablet_bottom_margin', 'sh_pl_sty_cart_btn_mobile_bottom_margin',
		'sh_pl_sty_cart_btn_left_margin', 'sh_pl_sty_cart_btn_tablet_left_margin', 'sh_pl_sty_cart_btn_mobile_left_margin',
		'sh_pl_sty_cart_btn_right_margin', 'sh_pl_sty_cart_btn_tablet_right_margin', 'sh_pl_sty_cart_btn_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .button', 'sh_pl_sty_cart_btn', bst_shop_item_button_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_button_padding = [
		'sh_pl_sty_cart_btn_top_padding', 'sh_pl_sty_cart_btn_tablet_top_padding', 'sh_pl_sty_cart_btn_mobile_top_padding',
		'sh_pl_sty_cart_btn_bottom_padding', 'sh_pl_sty_cart_btn_tablet_bottom_padding', 'sh_pl_sty_cart_btn_mobile_bottom_padding',
		'sh_pl_sty_cart_btn_left_padding', 'sh_pl_sty_cart_btn_tablet_left_padding', 'sh_pl_sty_cart_btn_mobile_left_padding',
		'sh_pl_sty_cart_btn_right_padding', 'sh_pl_sty_cart_btn_tablet_right_padding', 'sh_pl_sty_cart_btn_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .button', 'sh_pl_sty_cart_btn', bst_shop_item_button_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_sale_bdg_margin = [
		'sh_pl_sty_sale_bdg_top_margin', 'sh_pl_sty_sale_bdg_tablet_top_margin', 'sh_pl_sty_sale_bdg_mobile_top_margin',
		'sh_pl_sty_sale_bdg_bottom_margin', 'sh_pl_sty_sale_bdg_tablet_bottom_margin', 'sh_pl_sty_sale_bdg_mobile_bottom_margin',
		'sh_pl_sty_sale_bdg_left_margin', 'sh_pl_sty_sale_bdg_tablet_left_margin', 'sh_pl_sty_sale_bdg_mobile_left_margin',
		'sh_pl_sty_sale_bdg_right_margin', 'sh_pl_sty_sale_bdg_tablet_right_margin', 'sh_pl_sty_sale_bdg_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .onsale', 'sh_pl_sty_sale_bdg', bst_shop_item_sale_bdg_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_sale_bdg_padding = [
		'sh_pl_sty_sale_bdg_top_padding', 'sh_pl_sty_sale_bdg_tablet_top_padding', 'sh_pl_sty_sale_bdg_mobile_top_padding',
		'sh_pl_sty_sale_bdg_bottom_padding', 'sh_pl_sty_sale_bdg_tablet_bottom_padding', 'sh_pl_sty_sale_bdg_mobile_bottom_padding',
		'sh_pl_sty_sale_bdg_left_padding', 'sh_pl_sty_sale_bdg_tablet_left_padding', 'sh_pl_sty_sale_bdg_mobile_left_padding',
		'sh_pl_sty_sale_bdg_right_padding', 'sh_pl_sty_sale_bdg_tablet_right_padding', 'sh_pl_sty_sale_bdg_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .onsale', 'sh_pl_sty_sale_bdg', bst_shop_item_sale_bdg_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_out_stok_margin = [
		'sh_pl_sty_out_stok_top_margin', 'sh_pl_sty_out_stok_tablet_top_margin', 'sh_pl_sty_out_stok_mobile_top_margin',
		'sh_pl_sty_out_stok_bottom_margin', 'sh_pl_sty_out_stok_tablet_bottom_margin', 'sh_pl_sty_out_stok_mobile_bottom_margin',
		'sh_pl_sty_out_stok_left_margin', 'sh_pl_sty_out_stok_tablet_left_margin', 'sh_pl_sty_out_stok_mobile_left_margin',
		'sh_pl_sty_out_stok_right_margin', 'sh_pl_sty_out_stok_tablet_right_margin', 'sh_pl_sty_out_stok_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'sh_pl_sty_out_stok', bst_shop_item_out_stok_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_shop_item_out_stok_padding = [
		'sh_pl_sty_out_stok_top_padding', 'sh_pl_sty_out_stok_tablet_top_padding', 'sh_pl_sty_out_stok_mobile_top_padding',
		'sh_pl_sty_out_stok_bottom_padding', 'sh_pl_sty_out_stok_tablet_bottom_padding', 'sh_pl_sty_out_stok_mobile_bottom_padding',
		'sh_pl_sty_out_stok_left_padding', 'sh_pl_sty_out_stok_tablet_left_padding', 'sh_pl_sty_out_stok_mobile_left_padding',
		'sh_pl_sty_out_stok_right_padding', 'sh_pl_sty_out_stok_tablet_right_padding', 'sh_pl_sty_out_stok_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce ul.products li.product .bst-shop-product-out-of-stock', 'sh_pl_sty_out_stok', bst_shop_item_out_stok_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );	

	var bst_single_product_title_margin = [
		'sh_pp_sty_title_top_margin', 'sh_pp_sty_title_tablet_top_margin', 'sh_pp_sty_title_mobile_top_margin',
		'sh_pp_sty_title_bottom_margin', 'sh_pp_sty_title_tablet_bottom_margin', 'sh_pp_sty_title_mobile_bottom_margin',
		'sh_pp_sty_title_left_margin', 'sh_pp_sty_title_tablet_left_margin', 'sh_pp_sty_title_mobile_left_margin',
		'sh_pp_sty_title_right_margin', 'sh_pp_sty_title_tablet_right_margin', 'sh_pp_sty_title_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #primary .summary .product_title, .woocommerce-page  #primary .summary .product_title', 'sh_pp_sty_title', bst_single_product_title_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );	

	var bst_single_product_reg_price_margin = [
		'sh_pp_sty_price_top_margin', 'sh_pp_sty_price_tablet_top_margin', 'sh_pp_sty_price_mobile_top_margin',
		'sh_pp_sty_price_bottom_margin', 'sh_pp_sty_price_tablet_bottom_margin', 'sh_pp_sty_price_mobile_bottom_margin',
		'sh_pp_sty_price_left_margin', 'sh_pp_sty_price_tablet_left_margin', 'sh_pp_sty_price_mobile_left_margin',
		'sh_pp_sty_price_right_margin', 'sh_pp_sty_price_tablet_right_margin', 'sh_pp_sty_price_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .summary .price, .woocommerce-page #page .summary .price, .woocommerce .summary .woocommerce-Price-amount, .woocommerce-page .summary .woocommerce-Price-amount,  .woocommerce .summary ins .woocommerce-Price-amount, .woocommerce-page .summary ins .woocommerce-Price-amount', 'sh_pp_sty_price', bst_single_product_reg_price_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_sale_price_margin = [
		'sh_pp_sty_sale_price_top_margin', 'sh_pp_sty_sale_price_tablet_top_margin', 'sh_pp_sty_sale_price_mobile_top_margin',
		'sh_pp_sty_sale_price_bottom_margin', 'sh_pp_sty_sale_price_tablet_bottom_margin', 'sh_pp_sty_sale_price_mobile_bottom_margin',
		'sh_pp_sty_sale_price_left_margin', 'sh_pp_sty_sale_price_tablet_left_margin', 'sh_pp_sty_sale_price_mobile_left_margin',
		'sh_pp_sty_sale_price_right_margin', 'sh_pp_sty_sale_price_tablet_right_margin', 'sh_pp_sty_sale_price_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .summary del, .woocommerce-page #page .summary del, .woocommerce #page .summary del .woocommerce-Price-amount, .woocommerce-page #page .summary del .woocommerce-Price-amount', 'sh_pp_sty_sale_price', bst_single_product_sale_price_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_category_margin = [
		'sh_pp_sty_cat_top_margin', 'sh_pp_sty_cat_tablet_top_margin', 'sh_pp_sty_cat_mobile_top_margin',
		'sh_pp_sty_cat_bottom_margin', 'sh_pp_sty_cat_tablet_bottom_margin', 'sh_pp_sty_cat_mobile_bottom_margin',
		'sh_pp_sty_cat_left_margin', 'sh_pp_sty_cat_tablet_left_margin', 'sh_pp_sty_cat_mobile_left_margin',
		'sh_pp_sty_cat_right_margin', 'sh_pp_sty_cat_tablet_right_margin', 'sh_pp_sty_cat_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product .product_meta > span.posted_in', 'sh_pp_sty_cat', bst_single_product_category_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_tags_margin = [
		'sh_pp_sty_tags_top_margin', 'sh_pp_sty_tags_tablet_top_margin', 'sh_pp_sty_tags_mobile_top_margin',
		'sh_pp_sty_tags_bottom_margin', 'sh_pp_sty_tags_tablet_bottom_margin', 'sh_pp_sty_tags_mobile_bottom_margin',
		'sh_pp_sty_tags_left_margin', 'sh_pp_sty_tags_tablet_left_margin', 'sh_pp_sty_tags_mobile_left_margin',
		'sh_pp_sty_tags_right_margin', 'sh_pp_sty_tags_tablet_right_margin', 'sh_pp_sty_tags_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product .product_meta > span.tagged_as', 'sh_pp_sty_tags', bst_single_product_tags_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_sku_margin = [
		'sh_pp_sty_sku_top_margin', 'sh_pp_sty_sku_tablet_top_margin', 'sh_pp_sty_sku_mobile_top_margin',
		'sh_pp_sty_sku_bottom_margin', 'sh_pp_sty_sku_tablet_bottom_margin', 'sh_pp_sty_sku_mobile_bottom_margin',
		'sh_pp_sty_sku_left_margin', 'sh_pp_sty_sku_tablet_left_margin', 'sh_pp_sty_sku_mobile_left_margin',
		'sh_pp_sty_sku_right_margin', 'sh_pp_sty_sku_tablet_right_margin', 'sh_pp_sty_sku_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product .product_meta > span.sku_wrapper', 'sh_pp_sty_sku', bst_single_product_sku_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_add_cart_margin = [
		'sh_pp_sty_cart_btn_top_margin', 'sh_pp_sty_cart_btn_tablet_top_margin', 'sh_pp_sty_cart_btn_mobile_top_margin',
		'sh_pp_sty_cart_btn_bottom_margin', 'sh_pp_sty_cart_btn_tablet_bottom_margin', 'sh_pp_sty_cart_btn_mobile_bottom_margin',
		'sh_pp_sty_cart_btn_left_margin', 'sh_pp_sty_cart_btn_tablet_left_margin', 'sh_pp_sty_cart_btn_mobile_left_margin',
		'sh_pp_sty_cart_btn_right_margin', 'sh_pp_sty_cart_btn_tablet_right_margin', 'sh_pp_sty_cart_btn_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product #review_form #respond .form-submit input', 'sh_pp_sty_cart_btn', bst_single_product_add_cart_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_add_cart_padding = [
		'sh_pp_sty_cart_btn_top_padding', 'sh_pp_sty_cart_btn_tablet_top_padding', 'sh_pp_sty_cart_btn_mobile_top_padding',
		'sh_pp_sty_cart_btn_bottom_padding', 'sh_pp_sty_cart_btn_tablet_bottom_padding', 'sh_pp_sty_cart_btn_mobile_bottom_padding',
		'sh_pp_sty_cart_btn_left_padding', 'sh_pp_sty_cart_btn_tablet_left_padding', 'sh_pp_sty_cart_btn_mobile_left_padding',
		'sh_pp_sty_cart_btn_right_padding', 'sh_pp_sty_cart_btn_tablet_right_padding', 'sh_pp_sty_cart_btn_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary form .single_add_to_cart_button', 'sh_pp_sty_cart_btn', bst_single_product_add_cart_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_desc_margin = [
		'sh_pp_sty_desc_top_margin', 'sh_pp_sty_desc_tablet_top_margin', 'sh_pp_sty_desc_mobile_top_margin',
		'sh_pp_sty_desc_bottom_margin', 'sh_pp_sty_desc_tablet_bottom_margin', 'sh_pp_sty_desc_mobile_bottom_margin',
		'sh_pp_sty_desc_left_margin', 'sh_pp_sty_desc_tablet_left_margin', 'sh_pp_sty_desc_mobile_left_margin',
		'sh_pp_sty_desc_right_margin', 'sh_pp_sty_desc_tablet_right_margin', 'sh_pp_sty_desc_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce .product .summary .bst-sp-short-description', 'sh_pp_sty_desc', bst_single_product_desc_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_desc_padding = [
		'sh_pp_sty_desc_top_padding', 'sh_pp_sty_desc_tablet_top_padding', 'sh_pp_sty_desc_mobile_top_padding',
		'sh_pp_sty_desc_bottom_padding', 'sh_pp_sty_desc_tablet_bottom_padding', 'sh_pp_sty_desc_mobile_bottom_padding',
		'sh_pp_sty_desc_left_padding', 'sh_pp_sty_desc_tablet_left_padding', 'sh_pp_sty_desc_mobile_left_padding',
		'sh_pp_sty_desc_right_padding', 'sh_pp_sty_desc_tablet_right_padding', 'sh_pp_sty_desc_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce .product .summary .bst-sp-short-description', 'sh_pp_sty_desc', bst_single_product_desc_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_variation_input_margin = [
		'sh_pp_sty_var_top_margin', 'sh_pp_sty_var_tablet_top_margin', 'sh_pp_sty_var_mobile_top_margin',
		'sh_pp_sty_var_bottom_margin', 'sh_pp_sty_var_tablet_bottom_margin', 'sh_pp_sty_var_mobile_bottom_margin',
		'sh_pp_sty_var_left_margin', 'sh_pp_sty_var_tablet_left_margin', 'sh_pp_sty_var_mobile_left_margin',
		'sh_pp_sty_var_right_margin', 'sh_pp_sty_var_tablet_right_margin', 'sh_pp_sty_var_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', 'sh_pp_sty_var', bst_single_product_variation_input_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_qty_margin = [
		'sh_pp_sty_qty_top_margin', 'sh_pp_sty_qty_tablet_top_margin', 'sh_pp_sty_qty_mobile_top_margin',
		'sh_pp_sty_qty_bottom_margin', 'sh_pp_sty_qty_tablet_bottom_margin', 'sh_pp_sty_qty_mobile_bottom_margin',
		'sh_pp_sty_qty_left_margin', 'sh_pp_sty_qty_tablet_left_margin', 'sh_pp_sty_qty_mobile_left_margin',
		'sh_pp_sty_qty_right_margin', 'sh_pp_sty_qty_tablet_right_margin', 'sh_pp_sty_qty_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary .quantity', 'sh_pp_sty_qty', bst_single_product_qty_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_star_rating_margin = [
		'sh_pp_sty_rating_top_margin', 'sh_pp_sty_rating_tablet_top_margin', 'sh_pp_sty_rating_mobile_top_margin',
		'sh_pp_sty_rating_bottom_margin', 'sh_pp_sty_rating_tablet_bottom_margin', 'sh_pp_sty_rating_mobile_bottom_margin',
		'sh_pp_sty_rating_left_margin', 'sh_pp_sty_rating_tablet_left_margin', 'sh_pp_sty_rating_mobile_left_margin',
		'sh_pp_sty_rating_right_margin', 'sh_pp_sty_rating_tablet_right_margin', 'sh_pp_sty_rating_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary .woocommerce-product-rating', 'sh_pp_sty_rating', bst_single_product_star_rating_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_sale_badge_margin = [
		'sh_pp_sty_sale_bdg_top_margin', 'sh_pp_sty_sale_bdg_tablet_top_margin', 'sh_pp_sty_sale_bdg_mobile_top_margin',
		'sh_pp_sty_sale_bdg_bottom_margin', 'sh_pp_sty_sale_bdg_tablet_bottom_margin', 'sh_pp_sty_sale_bdg_mobile_bottom_margin',
		'sh_pp_sty_sale_bdg_left_margin', 'sh_pp_sty_sale_bdg_tablet_left_margin', 'sh_pp_sty_sale_bdg_mobile_left_margin',
		'sh_pp_sty_sale_bdg_right_margin', 'sh_pp_sty_sale_bdg_tablet_right_margin', 'sh_pp_sty_sale_bdg_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product span.onsale', 'sh_pp_sty_sale_bdg', bst_single_product_sale_badge_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_sale_badge_padding = [
		'sh_pp_sty_sale_bdg_top_padding', 'sh_pp_sty_sale_bdg_tablet_top_padding', 'sh_pp_sty_sale_bdg_mobile_top_padding',
		'sh_pp_sty_sale_bdg_bottom_padding', 'sh_pp_sty_sale_bdg_tablet_bottom_padding', 'sh_pp_sty_sale_bdg_mobile_bottom_padding',
		'sh_pp_sty_sale_bdg_left_padding', 'sh_pp_sty_sale_bdg_tablet_left_padding', 'sh_pp_sty_sale_bdg_mobile_left_padding',
		'sh_pp_sty_sale_bdg_right_padding', 'sh_pp_sty_sale_bdg_tablet_right_padding', 'sh_pp_sty_sale_bdg_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product span.onsale', 'sh_pp_sty_sale_bdg', bst_single_product_sale_badge_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_outstockbdg_margin = [
		'sh_pp_sty_out_stok_top_margin', 'sh_pp_sty_out_stok_tablet_top_margin', 'sh_pp_sty_out_stok_mobile_top_margin',
		'sh_pp_sty_out_stok_bottom_margin', 'sh_pp_sty_out_stok_tablet_bottom_margin', 'sh_pp_sty_out_stok_mobile_bottom_margin',
		'sh_pp_sty_out_stok_left_margin', 'sh_pp_sty_out_stok_tablet_left_margin', 'sh_pp_sty_out_stok_mobile_left_margin',
		'sh_pp_sty_out_stok_right_margin', 'sh_pp_sty_out_stok_tablet_right_margin', 'sh_pp_sty_out_stok_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary .out-of-stock', 'sh_pp_sty_out_stok', bst_single_product_outstockbdg_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_outstockbdg_padding = [
		'sh_pp_sty_out_stok_top_padding', 'sh_pp_sty_out_stok_tablet_top_padding', 'sh_pp_sty_out_stok_mobile_top_padding',
		'sh_pp_sty_out_stok_bottom_padding', 'sh_pp_sty_out_stok_tablet_bottom_padding', 'sh_pp_sty_out_stok_mobile_bottom_padding',
		'sh_pp_sty_out_stok_left_padding', 'sh_pp_sty_out_stok_tablet_left_padding', 'sh_pp_sty_out_stok_mobile_left_padding',
		'sh_pp_sty_out_stok_right_padding', 'sh_pp_sty_out_stok_tablet_right_padding', 'sh_pp_sty_out_stok_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page .product .summary .out-of-stock', 'sh_pp_sty_out_stok', bst_single_product_outstockbdg_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_gallery_imgs_margin = [
		'sh_pp_sty_img_top_margin', 'sh_pp_sty_img_tablet_top_margin', 'sh_pp_sty_img_mobile_top_margin',
		'sh_pp_sty_img_bottom_margin', 'sh_pp_sty_img_tablet_bottom_margin', 'sh_pp_sty_img_mobile_bottom_margin',
		'sh_pp_sty_img_left_margin', 'sh_pp_sty_img_tablet_left_margin', 'sh_pp_sty_img_mobile_left_margin',
		'sh_pp_sty_img_right_margin', 'sh_pp_sty_img_tablet_right_margin', 'sh_pp_sty_img_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product div.images, .woocommerce-page div.product div.images', 'sh_pp_sty_img', bst_single_product_gallery_imgs_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_wootablink_padding = [
		'sh_pp_sty_tabs_top_padding', 'sh_pp_sty_tabs_tablet_top_padding', 'sh_pp_sty_tabs_mobile_top_padding',
		'sh_pp_sty_tabs_bottom_padding', 'sh_pp_sty_tabs_tablet_bottom_padding', 'sh_pp_sty_tabs_mobile_bottom_padding',
		'sh_pp_sty_tabs_left_padding', 'sh_pp_sty_tabs_tablet_left_padding', 'sh_pp_sty_tabs_mobile_left_padding',
		'sh_pp_sty_tabs_right_padding', 'sh_pp_sty_tabs_tablet_right_padding', 'sh_pp_sty_tabs_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce div.product .woocommerce-tabs ul.tabs li a', 'sh_pp_sty_tabs', bst_single_product_wootablink_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_wootabcnt_margin = [
		'sh_pp_sty_tabs_top_margin', 'sh_pp_sty_tabs_tablet_top_margin', 'sh_pp_sty_tabs_mobile_top_margin',
		'sh_pp_sty_tabs_bottom_margin', 'sh_pp_sty_tabs_tablet_bottom_margin', 'sh_pp_sty_tabs_mobile_bottom_margin',
		'sh_pp_sty_tabs_left_margin', 'sh_pp_sty_tabs_tablet_left_margin', 'sh_pp_sty_tabs_mobile_left_margin',
		'sh_pp_sty_tabs_right_margin', 'sh_pp_sty_tabs_tablet_right_margin', 'sh_pp_sty_tabs_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #page div.product .woocommerce-tabs, .woocommerce-page #page div.product .woocommerce-tabs', 'sh_pp_sty_tabs', bst_single_product_wootabcnt_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_single_product_upsellrel_margin = [
		'sh_pp_sty_rup_top_margin', 'sh_pp_sty_rup_tablet_top_margin', 'sh_pp_sty_rup_mobile_top_margin',
		'sh_pp_sty_rup_bottom_margin', 'sh_pp_sty_rup_tablet_bottom_margin', 'sh_pp_sty_rup_mobile_bottom_margin',
		'sh_pp_sty_rup_left_margin', 'sh_pp_sty_rup_tablet_left_margin', 'sh_pp_sty_rup_mobile_left_margin',
		'sh_pp_sty_rup_right_margin', 'sh_pp_sty_rup_tablet_right_margin', 'sh_pp_sty_rup_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #primary .upsells.products h2, .woocommerce-page #primary .upsells.products h2, .woocommerce #primary .related.products h2, .woocommerce-page #primary .related.products h2', 'sh_pp_sty_rup', bst_single_product_upsellrel_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_cart_checkout_section_heading_padding = [
		'sh_cc_sty_shead_top_padding', 'sh_cc_sty_shead_tablet_top_padding', 'sh_cc_sty_shead_mobile_top_padding',
		'sh_cc_sty_shead_bottom_padding', 'sh_cc_sty_shead_tablet_bottom_padding', 'sh_cc_sty_shead_mobile_bottom_padding',
		'sh_cc_sty_shead_left_padding', 'sh_cc_sty_shead_tablet_left_padding', 'sh_cc_sty_shead_mobile_left_padding',
		'sh_cc_sty_shead_right_padding', 'sh_cc_sty_shead_tablet_right_padding', 'sh_cc_sty_shead_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce-cart #primary .cross-sells > h2, .woocommerce-cart #primary .cart_totals h2, .woocommerce-checkout #primary .woocommerce-billing-fields h3, .woocommerce-checkout #primary .woocommerce-additional-fields h3, .woocommerce-checkout #primary h3#order_review_heading', 'sh_cc_sty_shead', bst_cart_checkout_section_heading_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_cart_checkout_label_padding = [
		'sh_cc_sty_label_top_padding', 'sh_cc_sty_label_tablet_top_padding', 'sh_cc_sty_label_mobile_top_padding',
		'sh_cc_sty_label_bottom_padding', 'sh_cc_sty_label_tablet_bottom_padding', 'sh_cc_sty_label_mobile_bottom_padding',
		'sh_cc_sty_label_left_padding', 'sh_cc_sty_label_tablet_left_padding', 'sh_cc_sty_label_mobile_left_padding',
		'sh_cc_sty_label_right_padding', 'sh_cc_sty_label_tablet_right_padding', 'sh_cc_sty_label_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body.woocommerce #page form label, body.woocommerce-page #page form label', 'sh_cc_sty_label', bst_cart_checkout_label_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_woo_fomr_fld_chkout_margin = [
		'sh_cc_sty_field_top_margin', 'sh_cc_sty_field_tablet_top_margin', 'sh_cc_sty_field_mobile_top_margin',
		'sh_cc_sty_field_bottom_margin', 'sh_cc_sty_field_tablet_bottom_margin', 'sh_cc_sty_field_mobile_bottom_margin',
		'sh_cc_sty_field_left_margin', 'sh_cc_sty_field_tablet_left_margin', 'sh_cc_sty_field_mobile_left_margin',
		'sh_cc_sty_field_right_margin', 'sh_cc_sty_field_tablet_right_margin', 'sh_cc_sty_field_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, 'body.woocommerce #page form input[type="text"], body.woocommerce #page form input[type="email"], body.woocommerce #page form input[type="tel"], body.woocommerce #page form select, body.woocommerce #page form textarea, body.woocommerce-page #page form input[type="text"], body.woocommerce-page #page form input[type="email"], body.woocommerce-page #page form input[type="tel"], body.woocommerce-page #page form select, body.woocommerce-page #page form textarea, .woocommerce #page .select2-container .select2-selection--single, .woocommerce-page #page .select2-container .select2-selection--single', 'sh_cc_sty_field', bst_woo_fomr_fld_chkout_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_woo_fomr_fld_chkout_padding = [
		'sh_cc_sty_field_top_padding', 'sh_cc_sty_field_tablet_top_padding', 'sh_cc_sty_field_mobile_top_padding',
		'sh_cc_sty_field_bottom_padding', 'sh_cc_sty_field_tablet_bottom_padding', 'sh_cc_sty_field_mobile_bottom_padding',
		'sh_cc_sty_field_left_padding', 'sh_cc_sty_field_tablet_left_padding', 'sh_cc_sty_field_mobile_left_padding',
		'sh_cc_sty_field_right_padding', 'sh_cc_sty_field_tablet_right_padding', 'sh_cc_sty_field_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, 'body.woocommerce #page form input[type="text"], body.woocommerce #page form input[type="email"], body.woocommerce #page form input[type="tel"], body.woocommerce #page form select, body.woocommerce #page form textarea, body.woocommerce-page #page form input[type="text"], body.woocommerce-page #page form input[type="email"], body.woocommerce-page #page form input[type="tel"], body.woocommerce-page #page form select, body.woocommerce-page #page form textarea, .woocommerce #page .select2-container .select2-selection--single, .woocommerce-page #page .select2-container .select2-selection--single', 'sh_cc_sty_field', bst_woo_fomr_fld_chkout_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_checkout_button_margin = [
		'sh_cc_sty_button_top_margin', 'sh_cc_sty_button_tablet_top_margin', 'sh_cc_sty_button_mobile_top_margin',
		'sh_cc_sty_button_bottom_margin', 'sh_cc_sty_button_tablet_bottom_margin', 'sh_cc_sty_button_mobile_bottom_margin',
		'sh_cc_sty_button_left_margin', 'sh_cc_sty_button_tablet_left_margin', 'sh_cc_sty_button_mobile_left_margin',
		'sh_cc_sty_button_right_margin', 'sh_cc_sty_button_tablet_right_margin', 'sh_cc_sty_button_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'sh_cc_sty_button', bst_checkout_button_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_checkout_button_padding = [
		'sh_cc_sty_button_top_padding', 'sh_cc_sty_button_tablet_top_padding', 'sh_cc_sty_button_mobile_top_padding',
		'sh_cc_sty_button_bottom_padding', 'sh_cc_sty_button_tablet_bottom_padding', 'sh_cc_sty_button_mobile_bottom_padding',
		'sh_cc_sty_button_left_padding', 'sh_cc_sty_button_tablet_left_padding', 'sh_cc_sty_button_mobile_left_padding',
		'sh_cc_sty_button_right_padding', 'sh_cc_sty_button_tablet_right_padding', 'sh_cc_sty_button_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward', 'sh_cc_sty_button', bst_checkout_button_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_checkout_update_button_margin = [
		'sh_cc_sty_update_button_top_margin', 'sh_cc_sty_update_button_tablet_top_margin', 'sh_cc_sty_update_button_mobile_top_margin',
		'sh_cc_sty_update_button_bottom_margin', 'sh_cc_sty_update_button_tablet_bottom_margin', 'sh_cc_sty_update_button_mobile_bottom_margin',
		'sh_cc_sty_update_button_left_margin', 'sh_cc_sty_update_button_tablet_left_margin', 'sh_cc_sty_update_button_mobile_left_margin',
		'sh_cc_sty_update_button_right_margin', 'sh_cc_sty_update_button_tablet_right_margin', 'sh_cc_sty_update_button_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'sh_cc_sty_update_button', bst_checkout_update_button_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_checkout_update_button_padding = [
		'sh_cc_sty_update_button_top_padding', 'sh_cc_sty_update_button_tablet_top_padding', 'sh_cc_sty_update_button_mobile_top_padding',
		'sh_cc_sty_update_button_bottom_padding', 'sh_cc_sty_update_button_tablet_bottom_padding', 'sh_cc_sty_update_button_mobile_bottom_padding',
		'sh_cc_sty_update_button_left_padding', 'sh_cc_sty_update_button_tablet_left_padding', 'sh_cc_sty_update_button_mobile_left_padding',
		'sh_cc_sty_update_button_right_padding', 'sh_cc_sty_update_button_tablet_right_padding', 'sh_cc_sty_update_button_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', 'sh_cc_sty_update_button', bst_checkout_update_button_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_order_summry_thumb_margin = [
		'sh_cc_sty_thumb_top_margin', 'sh_cc_sty_thumb_tablet_top_margin', 'sh_cc_sty_thumb_mobile_top_margin',
		'sh_cc_sty_thumb_bottom_margin', 'sh_cc_sty_thumb_tablet_bottom_margin', 'sh_cc_sty_thumb_mobile_bottom_margin',
		'sh_cc_sty_thumb_left_margin', 'sh_cc_sty_thumb_tablet_left_margin', 'sh_cc_sty_thumb_mobile_left_margin',
		'sh_cc_sty_thumb_right_margin', 'sh_cc_sty_thumb_tablet_right_margin', 'sh_cc_sty_thumb_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.woocommerce table.cart img, .woocommerce #content table.cart img, .woocommerce-page table.cart img, .woocommerce-page #content table.cart img', 'sh_cc_sty_thumb', bst_order_summry_thumb_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_mini_cart_view_btn_margin = [
		'sh_mc_sty_view_top_margin', 'sh_mc_sty_view_tablet_top_margin', 'sh_mc_sty_view_mobile_top_margin',
		'sh_mc_sty_view_bottom_margin', 'sh_mc_sty_view_tablet_bottom_margin', 'sh_mc_sty_view_mobile_bottom_margin',
		'sh_mc_sty_view_left_margin', 'sh_mc_sty_view_tablet_left_margin', 'sh_mc_sty_view_mobile_left_margin',
		'sh_mc_sty_view_right_margin', 'sh_mc_sty_view_tablet_right_margin', 'sh_mc_sty_view_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.site-header .bst-site-header-cart-data .button.wc-forward', 'sh_mc_sty_view', bst_mini_cart_view_btn_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_mini_cart_view_btn_padding = [
		'sh_mc_sty_view_top_padding', 'sh_mc_sty_view_tablet_top_padding', 'sh_mc_sty_view_mobile_top_padding',
		'sh_mc_sty_view_bottom_padding', 'sh_mc_sty_view_tablet_bottom_padding', 'sh_mc_sty_view_mobile_bottom_padding',
		'sh_mc_sty_view_left_padding', 'sh_mc_sty_view_tablet_left_padding', 'sh_mc_sty_view_mobile_left_padding',
		'sh_mc_sty_view_right_padding', 'sh_mc_sty_view_tablet_right_padding', 'sh_mc_sty_view_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.site-header .bst-site-header-cart-data .button.wc-forward', 'sh_mc_sty_view', bst_mini_cart_view_btn_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	var bst_mini_cart_checkout_btn_margin = [
		'sh_mc_sty_checkout_top_margin', 'sh_mc_sty_checkout_tablet_top_margin', 'sh_mc_sty_checkout_mobile_top_margin',
		'sh_mc_sty_checkout_bottom_margin', 'sh_mc_sty_checkout_tablet_bottom_margin', 'sh_mc_sty_checkout_mobile_bottom_margin',
		'sh_mc_sty_checkout_left_margin', 'sh_mc_sty_checkout_tablet_left_margin', 'sh_mc_sty_checkout_mobile_left_margin',
		'sh_mc_sty_checkout_right_margin', 'sh_mc_sty_checkout_tablet_right_margin', 'sh_mc_sty_checkout_mobile_right_margin'
	];
	bstone_get_responsive_spacings( api, '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'sh_mc_sty_checkout', bst_mini_cart_checkout_btn_margin, 'margin', '', 'px', ['desktop', 'tablet', 'mobile'] );

	var bst_mini_cart_checkout_btn_padding = [
		'sh_mc_sty_checkout_top_padding', 'sh_mc_sty_checkout_tablet_top_padding', 'sh_mc_sty_checkout_mobile_top_padding',
		'sh_mc_sty_checkout_bottom_padding', 'sh_mc_sty_checkout_tablet_bottom_padding', 'sh_mc_sty_checkout_mobile_bottom_padding',
		'sh_mc_sty_checkout_left_padding', 'sh_mc_sty_checkout_tablet_left_padding', 'sh_mc_sty_checkout_mobile_left_padding',
		'sh_mc_sty_checkout_right_padding', 'sh_mc_sty_checkout_tablet_right_padding', 'sh_mc_sty_checkout_mobile_right_padding'
	];
	bstone_get_responsive_spacings( api, '.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward', 'sh_mc_sty_checkout', bst_mini_cart_checkout_btn_padding, 'padding', '', 'px', ['desktop', 'tablet', 'mobile'] );
	
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_x]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_item_shadow_x',
				'sh_pl_sty_box_item_shadow_y',
				'sh_pl_sty_box_item_shadow_blur',
				'sh_pl_sty_box_item_shadow_spread',
				'sh_pl_sty_box_item_shadow_inset',
				'sh_pl_sty_box_item_shadow_color'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_y]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_item_shadow_x',
				'sh_pl_sty_box_item_shadow_y',
				'sh_pl_sty_box_item_shadow_blur',
				'sh_pl_sty_box_item_shadow_spread',
				'sh_pl_sty_box_item_shadow_inset',
				'sh_pl_sty_box_item_shadow_color'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_blur]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_item_shadow_x',
				'sh_pl_sty_box_item_shadow_y',
				'sh_pl_sty_box_item_shadow_blur',
				'sh_pl_sty_box_item_shadow_spread',
				'sh_pl_sty_box_item_shadow_inset',
				'sh_pl_sty_box_item_shadow_color'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_spread]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_item_shadow_x',
				'sh_pl_sty_box_item_shadow_y',
				'sh_pl_sty_box_item_shadow_blur',
				'sh_pl_sty_box_item_shadow_spread',
				'sh_pl_sty_box_item_shadow_inset',
				'sh_pl_sty_box_item_shadow_color'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_inset]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_item_shadow_x',
				'sh_pl_sty_box_item_shadow_y',
				'sh_pl_sty_box_item_shadow_blur',
				'sh_pl_sty_box_item_shadow_spread',
				'sh_pl_sty_box_item_shadow_inset',
				'sh_pl_sty_box_item_shadow_color'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_color]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_item_shadow_x',
				'sh_pl_sty_box_item_shadow_y',
				'sh_pl_sty_box_item_shadow_blur',
				'sh_pl_sty_box_item_shadow_spread',
				'sh_pl_sty_box_item_shadow_inset',
				'sh_pl_sty_box_item_shadow_color'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_x_hover]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover',
				'sh_pl_sty_box_item_shadow_x_hover',
				'sh_pl_sty_box_item_shadow_y_hover',
				'sh_pl_sty_box_item_shadow_blur_hover',
				'sh_pl_sty_box_item_shadow_spread_hover',
				'sh_pl_sty_box_item_shadow_inset_hover',
				'sh_pl_sty_box_item_shadow_color_hover'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_y_hover]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover',
				'sh_pl_sty_box_item_shadow_x_hover',
				'sh_pl_sty_box_item_shadow_y_hover',
				'sh_pl_sty_box_item_shadow_blur_hover',
				'sh_pl_sty_box_item_shadow_spread_hover',
				'sh_pl_sty_box_item_shadow_inset_hover',
				'sh_pl_sty_box_item_shadow_color_hover'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_blur_hover]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover',
				'sh_pl_sty_box_item_shadow_x_hover',
				'sh_pl_sty_box_item_shadow_y_hover',
				'sh_pl_sty_box_item_shadow_blur_hover',
				'sh_pl_sty_box_item_shadow_spread_hover',
				'sh_pl_sty_box_item_shadow_inset_hover',
				'sh_pl_sty_box_item_shadow_color_hover'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_spread_hover]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover',
				'sh_pl_sty_box_item_shadow_x_hover',
				'sh_pl_sty_box_item_shadow_y_hover',
				'sh_pl_sty_box_item_shadow_blur_hover',
				'sh_pl_sty_box_item_shadow_spread_hover',
				'sh_pl_sty_box_item_shadow_inset_hover',
				'sh_pl_sty_box_item_shadow_color_hover'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_inset_hover]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover',
				'sh_pl_sty_box_item_shadow_x_hover',
				'sh_pl_sty_box_item_shadow_y_hover',
				'sh_pl_sty_box_item_shadow_blur_hover',
				'sh_pl_sty_box_item_shadow_spread_hover',
				'sh_pl_sty_box_item_shadow_inset_hover',
				'sh_pl_sty_box_item_shadow_color_hover'
			);
		} );
	} );
		
	api( 'bstone-settings[sh_pl_sty_box_item_shadow_color_hover]', function( value ) {
		value.bind( function( width ) {			
			bstone_get_shadow(
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover',
				'sh_pl_sty_box_item_shadow_x_hover',
				'sh_pl_sty_box_item_shadow_y_hover',
				'sh_pl_sty_box_item_shadow_blur_hover',
				'sh_pl_sty_box_item_shadow_spread_hover',
				'sh_pl_sty_box_item_shadow_inset_hover',
				'sh_pl_sty_box_item_shadow_color_hover'
			);
		} );
	} );
	
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
	} else if( 'px;' === css2 ) {
		css2 = 'px;';
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

function bstone_get_css( api, control, selector, property, unit, unique_id ) {
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

			bstone_dynamic_css( unique_id+control, dynamicStyle );
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

function bstone_get_responsive_spacings_unique( api, selector, selector_part, controls, property1, cssprop, property2, unit, devices, unique, nag_margin ) {
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
					'bstone-settings['+selector_part, ptag+'_'+property1+']', cssprop+'-'+ptag+property2+':', nag_margin+';', devices
				);
				bstone_dynamic_css( 'bst_'+selector_part+'_'+property1+'_'+ptag+'_'+unique, dynamicStyle );
				
				if( function_recall === 1 && ptag === 'left' && ptag === 'right' ) {
					dynamicStyle += bstone_responsive_css(
						selector,
						'bstone-settings['+selector_part, ptag+'_'+property1+']', cssprop+'-'+ptag+property2+':', nag_margin+';', devices
					);
					bstone_dynamic_css( 'bst_'+selector_part+'_'+property1+'_'+ptag+'_'+unique, dynamicStyle );
				}
			});
		} );
	});
}

function bstone_get_shadow(selector, x, y, blur, spread, inset, color) {

	var x_s 	 = wp.customize.instance('bstone-settings['+x+']').get();
	var y_s 	 = wp.customize.instance('bstone-settings['+y+']').get();
	var blur_s 	 = wp.customize.instance('bstone-settings['+blur+']').get();
	var spread_s = wp.customize.instance('bstone-settings['+spread+']').get();
	var inset_s  = wp.customize.instance('bstone-settings['+inset+']').get();
	var color_s  = wp.customize.instance('bstone-settings['+color+']').get();

	if( true === inset_s ) {
		inset_s = 'inset';
	} else {
		inset_s = '';
	}
	
	var shadow_css = inset_s+' '+x_s+'px '+y_s+'px '+blur_s+'px '+spread_s+'px '+color_s;

	var shadow_css_code = selector+'{'+'-webkit-box-shadow:'+shadow_css+'; -moz-box-shadow:'+shadow_css+'; box-shadow:'+shadow_css+';'+'}';

	var control = 'bstone-settings['+x+']'+'bstone-settings['+y+']';

	control = control.replace( '[', '-' );
	control = control.replace( ']', '' );
	jQuery( 'style#' + control ).remove();

	jQuery( 'head' ).append(
		'<style id="' + control + '">' + shadow_css_code + '</style>'
	);
}

function bstone_get_position_css(selector, position, x, y) {
	var position_val = wp.customize.instance('bstone-settings['+position+']').get();
	var x_val 	 	 = wp.customize.instance('bstone-settings['+x+']').get();
	var y_val 	 	 = wp.customize.instance('bstone-settings['+y+']').get();

	var css_output = '';

	switch(position_val) {
		case "pos-top-right":
			css_output = 'top: '+y_val+'px;';
			css_output += 'bottom: auto;';
			css_output += 'left: auto;';
			css_output += 'right: '+x_val+'px;';
			break;
		case "pos-top-left":
			css_output = 'top: '+y_val+'px;';
			css_output += 'bottom: auto;';
			css_output += 'left: '+x_val+'px;';
			css_output += 'right: auto;';
			break;
		case "pos-top-center":
			css_output = 'top: '+y_val+'px;';
			css_output += 'bottom: auto;';
			css_output += 'left: auto;';
			css_output += 'right: auto;';
			break;
		case "pos-bottom-right":
			css_output = 'top: auto;';
			css_output += 'bottom: '+y_val+'px;';
			css_output += 'left: auto;';
			css_output += 'right: '+x_val+'px;';
			break;
		case "pos-bottom-left":
			css_output = 'top: auto;';
			css_output += 'bottom: '+y_val+'px;';
			css_output += 'left: '+x_val+'px;';
			css_output += 'right: auto;';
			break;
		case "pos-bottom-center":
			css_output = 'top: auto;';
			css_output += 'bottom: '+y_val+'px;';
			css_output += 'left: auto;';
			css_output += 'right: auto;';
			break;
		default:
	}

	var position_css_code = selector+'{'+css_output+'}';

	var control = 'bstone-settings['+x+']'+'bstone-settings['+y+']';

	control = control.replace( '[', '-' );
	control = control.replace( ']', '' );
	jQuery( 'style#' + control ).remove();

	jQuery( 'head' ).append(
		'<style id="' + control + '">' + position_css_code + '</style>'
	);
}