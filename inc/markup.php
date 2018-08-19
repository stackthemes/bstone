<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

add_action( 'wp_head', 'bstone_pingback_header' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bstone_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}

/**
 * Schema for <body> tag.
 */
if ( ! function_exists( 'bstone_schema_body' ) ) :

	/**
	 * Adds schema tags to the body classes.
	 *
	 * @since 1.0.0
	 */
	function bstone_schema_body() {

		// Check conditions.
		$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

		// Set up default itemtype.
		$itemtype = 'WebPage';

		// Get itemtype for the blog.
		$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

		// Get itemtype for search results.
		$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
		// Get the result.
		$result = apply_filters( 'bstone_schema_body_itemtype', $itemtype );

		// Return our HTML.
		echo apply_filters( 'bstone_schema_body', "itemtype='http://schema.org/" . esc_html( $result ) . "' itemscope='itemscope'" );
	}
endif;

/**
 * Function to get site Header
 */
if ( ! function_exists( 'bstone_header_markup' ) ) {

	/**
	 * Site Header - <header>
	 *
	 * @since 1.0.0
	 */
	function bstone_header_markup() {
		?>

		<header itemtype="http://schema.org/WPHeader" itemscope="itemscope" id="masthead" <?php bstone_header_classes(); ?> role="banner">

			<?php bstone_masthead_top(); ?>

			<?php bstone_masthead(); ?>

			<?php bstone_masthead_bottom(); ?>

		</header><!-- #masthead -->
		<?php
	}
}

add_action( 'bstone_header', 'bstone_header_markup', 10 );

/**
 * Function to get Header Classes
 */
if ( ! function_exists( 'bstone_header_classes' ) ) {

	/**
	 * Function to get Header Classes
	 *
	 * @since 1.0.0
	 */
	function bstone_header_classes() {

		$classes = array( 'site-header' );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

/**
 * Function to get Primary navigation menu
 */
if ( ! function_exists( 'bstone_primary_navigation_markup' ) ) {
	/**
	 * Site Primary Navigation
	 *
	 * @since 1.0.0
	 */
	
	function bstone_primary_navigation_markup() {
		$disable_primary_navigation = bstone_options( 'disable-primary-nav' );
		
		if ( $disable_primary_navigation ) {
			echo '<div class="st-site-nav"></div>';
			
		} else {

			$submenu_class = apply_filters( 'primary_submenu_border_class', ' submenu-with-border' );

			// Primary Menu.
			$primary_menu_args = array(
				'theme_location'  => 'primary',
				'menu_id'         => 'primary-menu',
				'menu_class'      => 'main-header-menu st-flex st-justify-content-flex-end' . $submenu_class,
				'container'       => 'div',
				'container_class' => 'st-main-navigation',
			);

			// Fallback Menu if primary menu not set.
			$fallback_menu_args = array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'st-main-navigation',
				'container'      => 'div',

				'before'         => '<ul class="main-header-menu st-flex st-justify-content-flex-end' . $submenu_class . '">',
				'after'          => '</ul>',
			);
			?>
			<div class="st-site-nav">
				
				<nav itemtype="http://schema.org/SiteNavigationElement" itemscope="itemscope" id="site-navigation" class="st-flex-grow-1" role="navigation" aria-label="<?php esc_attr_e( 'Site Navigation', 'bstone' ); ?>">
					<?php
					if ( has_nav_menu( 'primary' ) ) {
						wp_nav_menu( $primary_menu_args );
					} else {
						wp_page_menu( $fallback_menu_args );
					}
					?>
				</nav>
				
			</div>
			<?php
		}
	}
}

/**
 * Function to get site title/logo
 */
if ( ! function_exists( 'bstone_site_branding_markup' ) ) {
	/**
	 * Site Title / Logo
	 *
	 * @since 1.0.0
	 */
	function bstone_site_branding_markup() {
		?>

		<div class="st-site-branding">
			<div class="st-site-identity" itemscope="itemscope" itemtype="http://schema.org/Organization">
				<?php bstone_logo(); ?>
			</div>
		</div>
		<!-- .site-branding -->
		<?php
	}
}

/**
 * Return or echo site logo markup.
 */
if ( ! function_exists( 'bstone_logo' ) ) {

	/**
	 * Return or echo site logo markup.
	 *
	 * @since 1.0.0
	 * @param  boolean $echo Echo markup.
	 * @return mixed echo or return markup.
	 */
	function bstone_logo( $echo = true ) {

		$site_tagline         = bstone_options( 'display-site-tagline' );
		$display_site_tagline = bstone_options( 'display-site-title' );
		$html                 = '';

		$has_custom_logo = apply_filters( 'bstone_has_custom_logo', has_custom_logo() );

		// Site logo.
		if ( $has_custom_logo ) {

			if ( apply_filters( 'bstone_replace_logo_width', true ) ) {
				add_filter( 'wp_get_attachment_image_src', 'bstone_replace_header_logo', 10, 4 );
				add_filter( 'wp_get_attachment_image_attributes', 'bstone_replace_header_attr', 10, 3 );
			}

			$html .= '<span class="site-logo-img">';
			$html .= get_custom_logo();
			$html .= '</span>';

			if ( apply_filters( 'bstone_replace_logo_width', true ) ) {
				remove_filter( 'wp_get_attachment_image_src', 'bstone_replace_header_logo', 10 );
				remove_filter( 'wp_get_attachment_image_attributes', 'bstone_replace_header_attr', 10 );
			}
		}

		if ( ! apply_filters( 'bstone_disable_site_identity', false ) ) {
			// Site Title.
			if ( $display_site_tagline ) {

				$tag = 'span';
				if ( is_home() || is_front_page() ) {
					$tag = 'h1';
				}
				$html .= '<' . $tag . ' itemprop="name" class="site-title"> <a href="' . esc_url( home_url( '/' ) ) . '" itemprop="url" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a> </' . $tag . '>';
			}

			// Site description.
			if ( $site_tagline ) {
				$html .= '<p class="site-description" itemprop="description">' . esc_html( get_bloginfo( 'description' ) ) . '</p>';
			}
		}
		$html = apply_filters( 'bstone_logo', $html, $display_site_tagline, $site_tagline );

		/**
		 * Echo or Return the Logo Markup
		 */
		if ( $echo ) {
			echo $html;
		} else {
			return $html;
		}
	}
}// End if().

/**
 * Replace heade logo.
 */
if ( ! function_exists( 'bstone_replace_header_logo' ) ) :

	/**
	 * Replace header logo.
	 *
	 * @param array  $image Size.
	 * @param int    $attachment_id Image id.
	 * @param sting  $size Size name.
	 * @param string $icon Icon.
	 *
	 * @return array Size of image
	 */
	function bstone_replace_header_logo( $image, $attachment_id, $size, $icon ) {

		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( ! is_customize_preview() && $custom_logo_id == $attachment_id && 'full' == $size ) {

			$data = wp_get_attachment_image_src( $attachment_id, 'bst-logo-size' );

			if ( false != $data ) {
				$image = $data;
			}
		}

		return $image;
	}
endif; // End if().

/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'bstone_replace_header_attr' ) ) :

	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function bstone_replace_header_attr( $attr, $attachment, $size ) {

		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ) {

			if ( ! is_customize_preview() ) {
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'bst-logo-size' );
				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$retina_logo = bstone_get_option( 'bst-header-retina-logo' );

			$attr['srcset'] = '';

			if ( apply_filters( 'bstone_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if ( bstone_check_is_ie() ) {
					// Replace header logo url to retina logo url.
					$attr['src'] = $retina_logo;
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . $retina_logo . ' 2x';

			}
		}

		return $attr;
	}
endif; // End if().

/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'bstone_check_is_ie' ) ) :

	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function bstone_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'bstone_check_is_ie', $is_ie );
	}

endif;

/**
 * Function to get Toggle Button Markup
 */
if ( ! function_exists( 'bstone_toggle_buttons_markup' ) ) {

	/**
	 * Toggle Button Markup
	 *
	 * @since 1.0.0
	 */
	function bstone_toggle_buttons_markup() {
		$disable_primary_navigation = bstone_options( 'disable-primary-nav' );
		$custom_header_rt_section   = bstone_options( 'header-main-rt-section' );
		$custom_header_lt_section   = bstone_options( 'header-main-lt-section' );
		$bst_header_type			= bstone_options( 'header-layouts' );
		$menu_bottons               = true;
		
		if( 'header-main-layout-1' == $bst_header_type && $disable_primary_navigation && 'none' == $custom_header_rt_section ) {
			$menu_bottons = false;
		}
		
		if ( 'header-main-layout-2' == $bst_header_type && $disable_primary_navigation && 'none' == $custom_header_rt_section && 'none' == $custom_header_lt_section ) {
			$menu_bottons = false;
		}
		
		if ( apply_filters( 'bstone_enable_mobile_menu_buttons', $menu_bottons ) ) {
		?>
		<div class="bst-mobile-menu-buttons">

			<?php bstone_masthead_toggle_buttons_before(); ?>

			<?php bstone_masthead_toggle_buttons(); ?>

			<?php bstone_masthead_toggle_buttons_after(); ?>

		</div>
		<?php
		}
	}
}// End if().

add_action( 'bstone_masthead_content', 'bstone_toggle_buttons_markup', 9 );

/**
 * Return the selected sections
 */
if ( ! function_exists( 'bstone_get_dynamic_header_content' ) ) {

	/**
	 * Return the selected sections
	 *
	 * @since 1.0.0
	 * @param  string $option Custom content type. E.g. search, text-html etc.
	 * @return array         Array of Custom contents.
	 */
	function bstone_get_dynamic_header_content( $option ) {

		$output  = array();
		$section = bstone_options($option);

		switch ( $section ) {

			case 'search':
					$output[] = bstone_get_search();
				break;

			case 'text-html':
					$output[] = bstone_get_custom_html( $option . '-html' );
				break;

			case 'widget':
					$output[] = bstone_get_custom_widget( $option );
				break;

			default:
					$output[] = apply_filters( 'bstone_get_dynamic_header_content', '', $option, $section );
				break;
		}

		return $output;
	}
}

/**
 * Adding Wrapper for Search Form.
 */

if ( ! function_exists( 'bstone_get_search' ) ) {
	function bstone_get_search() {
		$search_html = '<div class="st-search-header">
						<div class="st-search-menu-icon slide-search" id="st-search-form" >';
		$search_html .= get_search_form( false );
		$search_html .= '</div></div>';
		
		return apply_filters( 'bstone_get_search', $search_html );
	}
}

/**
 * Get custom HTML added by user.
 */

if ( ! function_exists( 'bstone_get_custom_html' ) ) {
	function bstone_get_custom_html( $option_name = '' ) {
		$custom_html         = '';
		$custom_html_content = bstone_options( $option_name );
		if ( ! empty( $custom_html_content ) ) {
			$custom_html = '<div class="st-custom-html">' . do_shortcode( $custom_html_content ) . '</div>';
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			$custom_html = '<a href="' . esc_url( admin_url( 'customize.php?autofocus[control]=' . BSTONE_THEME_SETTINGS . '[' . $option_name . ']' ) ) . '">' . __( 'Add Custom HTML', 'bstone' ) . '</a>';
		}
		return $custom_html;
	}
}

/**
 * Get Widget added by user.
 */

if ( ! function_exists( 'bstone_get_custom_widget' ) ) {
	function bstone_get_custom_widget( $option_name = '' ) {
		ob_start();
		
		if ( 'header-main-rt-section' == $option_name ) {
			$widget_id = 'header-widget-1';
		} else if ( 'header-main-rt-section-2' == $option_name ) {
			$widget_id = 'header-widget-2';
		}
		
		echo '<div class="st-' . esc_attr( $widget_id ) . '-area">';
				bstone_get_sidebar( $widget_id );
		echo '</div>';

		return ob_get_clean();
	}
}

/**
 * Display Sidebars
 */
if ( ! function_exists( 'bstone_get_sidebar' ) ) {
	/**
	 * Get Sidebar
	 *
	 * @since 1.0.0
	 * @param  string $sidebar_id   Sidebar Id.
	 * @return void
	 */
	function bstone_get_sidebar( $sidebar_id ) {
		if ( is_active_sidebar( $sidebar_id ) ) {
			dynamic_sidebar( $sidebar_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
		?>
			<div class="widget st-no-widget-row">
				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Add Widget', 'bstone' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Display Footer Widgets
 */
if ( ! function_exists( 'bstone_get_footer_widget' ) ) {
	/**
	 * Get Footer Widget
	 *
	 * @since 1.0.0
	 * @param  string $widget_area_id   Widget Area Id.
	 * @return void
	 */
	function bstone_get_footer_widget( $widget_area_id ) {
		if ( is_active_sidebar( $widget_area_id ) ) {
			dynamic_sidebar( $widget_area_id );
		} elseif ( current_user_can( 'edit_theme_options' ) ) {
			
			global $wp_registered_sidebars;
			$widget_area_name = '';
			if ( isset( $wp_registered_sidebars[ $widget_area_id ] ) ) {
				$widget_area_name = $wp_registered_sidebars[ $widget_area_id ]['name'];
			}
		?>
			<div class="widget bst-no-widget-row">
				<h2 class='widget-title'><?php echo esc_html( $widget_area_name ); ?></h2>

				<p class='no-widget-text'>
					<a href='<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>'>
						<?php esc_html_e( 'Click here to assign a widget for this area.', 'bstone' ); ?>
					</a>
				</p>
			</div>
			<?php
		}
	}
}

/**
 * Function to get site Footer
 */

if ( ! function_exists( 'bstone_footer_markup' ) ) {
	/**
	 * Site Footer - <footer>
	 *
	 * @since 1.0.0
	 */
	
	function bstone_footer_markup() {
		?>
		<footer itemtype="http://schema.org/WPFooter" itemscope="itemscope" id="colophon" <?php bstone_footer_classes(); ?> role="contentinfo">
			
			<?php bstone_footer_content_top(); ?>
			
			<?php bstone_footer_content(); ?>
			
			<?php bstone_footer_content_bottom(); ?>
			
		</footer><!-- #colophon -->
		<?php
	}
}

add_action( 'bstone_footer', 'bstone_footer_markup' );

/**
 * Function to get Footer Classes
 */
if ( ! function_exists( 'bstone_footer_classes' ) ) {

	/**
	 * Function to get Footer Classes
	 *
	 * @since 1.0.0
	 */
	function bstone_footer_classes() {

		$classes = array_unique( apply_filters( 'bstone_footer_class', array( 'site-footer' ) ) );

		$classes = array_map( 'sanitize_html_class', $classes );

		echo 'class="' . esc_attr( join( ' ', $classes ) ) . '"';
	}
}

/**
 * Get header partials
 */
function bstone_render_header_change() {
	$bstone_header_layout = bstone_options('header-layouts');

	if($bstone_header_layout=='header-main-layout-1'):
		get_template_part( 'template-parts/header/header-default' );
	elseif($bstone_header_layout=='header-main-layout-2'):
		get_template_part( 'template-parts/header/header-logo-center' );
	endif;
}

/**
 * Get footer partials
 */
function bstone_render_footer_change() {
	get_template_part( 'template-parts/footer/footer-default' );
}

/**
 * Function to get Header Breakpoint
 */
if ( ! function_exists( 'bstone_header_break_point' ) ) {

	/**
	 * Function to get Header Breakpoint
	 *
	 * @since 1.0.0
	 * @return number
	 */
	function bstone_header_break_point() {
		$break_point = apply_filters( 'bstone_header_break_point', 921 );
		return absint( $break_point );
	}
}

/**
 * Function to get Body Font Family
 */
if ( ! function_exists( 'bstone_body_font_family' ) ) {

	/**
	 * Function to get Body Font Family
	 *
	 * @since 1.0.0
	 * @return string
	 */
	function bstone_body_font_family() {

		$font_family = bstone_options( 'body-font-family' );

		// Body Font Family.
		if ( 'inherit' == $font_family ) {
			$default_font_family = bstone_options( 'default-body-font-family' );
			
			if( 'inherit' == $default_font_family ) {
				$font_family = '-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif';
			} else {
				$font_family = $default_font_family;
			}
		}

		return $font_family;
	}
}

/**
 * Bstone Pagination
 */
if ( ! function_exists( 'bstone_number_pagination' ) ) {

	/**
	 * Bstone Pagination
	 *
	 * @since 1.0.0
	 * @return void            Generate & echo pagination markup.
	 */
	function bstone_number_pagination() {
		global $numpages;
		$enabled = apply_filters( 'bstone_pagination_enabled', true );

		if ( isset( $numpages ) && $enabled ) {
			ob_start();
			echo "<div class='st-pagination'>";
			the_posts_pagination(
				array(
					'prev_text' => bstone_get_option( 'pagination-text-prev' ),
					'next_text' => bstone_get_option( 'pagination-text-next' ),
				)
			);
			echo '</div>';
			$output = ob_get_clean();
			echo apply_filters( 'bstone_pagination_markup', $output );
		}
	}
}// End if().

add_action( 'bstone_pagination', 'bstone_number_pagination' );

/**
 * Bstone entry header class.
 */
if ( ! function_exists( 'bstone_entry_header_class' ) ) {

	/**
	 * Bstone entry header class
	 *
	 * @since 1.0.0
	 */
	function bstone_entry_header_class() {

		$post_id          = bstone_get_post_id();
		$classes          = array();
		$title_markup     = bstone_the_title( '', '', $post_id, false );
		$thumb_markup     = bstone_get_post_thumbnail( '', '', false );
		$post_meta_markup = bstone_single_get_post_meta( '', '', false );

		if ( empty( $title_markup ) && empty( $thumb_markup ) && ( is_page() || empty( $post_meta_markup ) ) ) {
			$classes[] = 'bst-header-without-markup';
		} else {

			if ( empty( $title_markup ) ) {
				$classes[] = 'bst-no-title';
			}

			if ( empty( $thumb_markup ) ) {
				$classes[] = 'bst-no-thumbnail';
			}

			if ( is_page() || empty( $post_meta_markup ) ) {
				$classes[] = 'bst-no-meta';
			}
		}

		$classes = array_unique( apply_filters( 'bstone_entry_header_class', $classes ) );
		$classes = array_map( 'sanitize_html_class', $classes );

		echo esc_attr( join( ' ', $classes ) );
	}
}// End if().

/**
 * Return schema markup
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'bstone_schema_markup' ) ) {

	function bstone_schema_markup( $location ) {

		// Return if disable
		if ( false == bstone_options( 'bstone-schema-markup' ) ) {
			return '';
		}

		// Default
		$schema = $itemprop = $itemtype = '';

		// HTML
		if ( 'html' == $location ) {
			if ( is_singular() ) {
				$schema = 'itemscope itemtype="http://schema.org/WebPage"';
			} else {
				$schema = 'itemscope itemtype="http://schema.org/Article"';
			}
		}

		// Header
		elseif ( 'header' == $location ) {
			$schema = 'itemscope="itemscope" itemtype="http://schema.org/WPHeader"';
		}

		// Logo
		elseif ( 'logo' == $location ) {
			$schema = 'itemscope itemtype="http://schema.org/Brand"';
		}

		// Navigation
		elseif ( 'site_navigation' == $location ) {
			$schema = 'itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement"';
		}

		// Main
		elseif ( 'main' == $location ) {
			$itemtype = 'http://schema.org/WebPageElement';
			$itemprop = 'mainContentOfPage';
			if ( is_singular( 'post' ) ) {
				$itemprop = '';
				$itemtype = 'http://schema.org/Blog';
			}
		}

		// Breadcrumb
		elseif ( 'breadcrumb' == $location ) {
			$schema = 'itemscope itemtype="http://schema.org/BreadcrumbList"';
		}

		// Breadcrumb list
		elseif ( 'breadcrumb_list' == $location ) {
			$schema = 'itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"';
		}

		// Breadcrumb itemprop
		elseif ( 'breadcrumb_itemprop' == $location ) {
			$schema = 'itemprop="breadcrumb"';
		}

		// Sidebar
		elseif ( 'sidebar' == $location ) {
			$schema = 'itemscope="itemscope" itemtype="http://schema.org/WPSideBar"';
		}

		// Footer widgets
		elseif ( 'footer' == $location ) {
			$schema = 'itemscope="itemscope" itemtype="http://schema.org/WPFooter"';
		}

		// Headings
		elseif ( 'headline' == $location ) {
			$schema = 'itemprop="headline"';
		}

		// Posts
		elseif ( 'entry_content' == $location ) {
			$schema = 'itemprop="text"';
		}

		// Publish date
		elseif ( 'publish_date' == $location ) {
			$schema = 'itemprop="datePublished" pubdate';
		}

		// Author name
		elseif ( 'author_name' == $location ) {
			$schema = 'itemprop="name"';
		}

		// Author link
		elseif ( 'author_link' == $location ) {
			$schema = 'itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"';
		}

		// Url
		elseif ( 'url' == $location ) {
			$schema = 'itemprop="url"';
		}

		// Position
		elseif ( 'position' == $location ) {
			$schema = 'itemprop="position"';
		}

		// Image
		elseif ( 'image' == $location ) {
			$schema = 'itemprop="image"';
		}

		return ' ' . apply_filters( 'bstone_schema_markup', $schema );

	}
}// End if().

/**
 * Get single post/page title
 */
if ( ! function_exists( 'bstone_single_title' ) ) {

	/**
	 * Function to get post/page title
	 *
	 * @since 1.0.0
	 */
	function bstone_single_title() {

		// Default title is null
		$title = NULL;

		// Get post ID
		$post_id = bstone_get_post_id();

		// Homepage - display blog description if not a static page
		if ( is_front_page() && ! is_singular( 'page' ) ) {
			if ( get_bloginfo( 'description' ) ) {
				$title = get_bloginfo( 'description' );
			} else {
				return esc_html__( 'Recent Posts', 'bstone' );
			}
		
		// Homepage posts page
		} elseif ( is_home() && ! is_singular( 'page' ) ) {

			$title = get_the_title( get_option( 'page_for_posts', true ) );

		}

		// Search needs to go before archives
		elseif ( is_search() ) {
			global $wp_query;
			$title = '<span id="search-results-count">'. $wp_query->found_posts .'</span> '. esc_html__( 'Search Results Found', 'bstone' );
		}
			
		// Archives
		elseif ( is_archive() ) {

			// Author
			if ( is_author() ) {
				$title = get_the_archive_title();
			}

			// Post Type archive title
			elseif ( is_post_type_archive() ) {
				$title = post_type_archive_title( '', false );
			}

			// Daily archive title
			elseif ( is_day() ) {
				$title = sprintf( esc_html__( 'Daily Archives: %s', 'bstone' ), get_the_date() );
			}

			// Monthly archive title
			elseif ( is_month() ) {
				$title = sprintf( esc_html__( 'Monthly Archives: %s', 'bstone' ), get_the_date( esc_html_x( 'F Y', 'Page title monthly archives date format', 'bstone' ) ) );
			}

			// Yearly archive title
			elseif ( is_year() ) {
				$title = sprintf( esc_html__( 'Yearly Archives: %s', 'bstone' ), get_the_date( esc_html_x( 'Y', 'Page title yearly archives date format', 'bstone' ) ) );
			}

			// Categories/Tags/Other
			else {

				// Get term title
				$title = single_term_title( '', false );

				// Fix for plugins that are archives but use pages
				if ( ! $title ) {
					global $post;
					$title = get_the_title( $post_id );
				}

			}

		} // End is archive check

		// 404 Page
		elseif ( is_404() ) {

			$title = esc_html__( '404: Page Not Found', 'bstone' );

		}
		
		// Anything else with a post_id defined
		elseif ( $post_id ) {

			// Single Pages
			if ( is_singular( 'page' ) || is_singular( 'attachment' ) ) {
				$title = get_the_title( $post_id );
			}

			// Single blog posts
			elseif ( is_singular( 'post' ) ) {

				if ( true == bstone_options( 'post-title-display-option' ) ) {
					$title = get_the_title();
				} else {
					$title = esc_html__( 'Blog', 'bstone' );
				}

			}

			// Other posts
			else {

				$title = get_the_title( $post_id );
				
			}

		}

		// Last check if title is empty
		$title = $title ? $title : get_the_title();

		// Apply filters and return title
		return apply_filters( 'bstone_single_title', $title );
	}
}

/**
 * Function to get scroll to top button
 */
if ( ! function_exists( 'bstone_scroll_to_top_markup' ) ) {
	/**
	 * Scroll to top button
	 *
	 * @since 1.1.2
	 */
	
	function bstone_scroll_to_top_markup() {
		if( true == bstone_options( 'bstone-enable-scroll-top' ) ):
		?>
		<a id="bstone-scroll-top"><span class="<?php echo esc_attr( bstone_options( 'sctop-icon-class' ) ); ?>"></span></a>
		<?php
		endif;
	}
}
add_action('bstone_footer', 'bstone_scroll_to_top_markup', 30);

/**
 * Function to get posts banner / slider markup
 */
if ( ! function_exists( 'bstone_posts_banner_markup' ) ) {
	/**
	 * Posts banner / slider
	 *
	 * @since 1.1.2
	 */
	
	function bstone_posts_banner_markup() {

		$banner_content = '';

		$display_bp_banner = false;

		if( is_home() ) {
			$display_bp_banner = true;
		}

		if( true == $display_bp_banner ) {

			$bpb_shadow = '';

			$banner_type	  = bstone_options( 'bp-banner-type' );
			$banner_width 	  = bstone_options( 'bp-banner-width' );
			$data_source	  = bstone_options( 'bp-banner-data-source' );
			$posts_num		  = bstone_options( 'bp-banner-posts-num' );
			$banner_structure = bstone_options( 'bp-banner-structure' );
			$bpb_head_shadow  = bstone_options( 'bp-banner-title-shadow' );

			if( true == $bpb_head_shadow ) {
				$bpb_shadow = 'shadow';
			}

			$classes_container = $banner_type;

			if( 'content' == $banner_width ) {
				$classes_container .= ' st-container';
			}

			/**
			 * If banner type is 'posts-grid' get only 3 posts
			 */
			if( 'posts-grid' == $banner_type ) {
				$posts_num = 3;
			}

			if( true == bstone_options( 'bp-banner-enable' ) ):

				/**
				 * Get Banner Posts
				 *
				 * @var array
				 */
				$posts_args = array(
					'posts_per_page'   => $posts_num,
					'post_type'        => 'post',
					'post_status'      => 'publish',
				);

				if( 'category' == $data_source ) {

					$posts_args['category'] = esc_html( bstone_options( 'bp-banner-data-category' ) );

				} else if( 'posts' == $data_source ) {
					$bp_posts_ids = esc_html( bstone_options( 'bp-banner-data-postid' ) );

					$posts_args['post__in'] = explode( ",", $bp_posts_ids );

				}

				$bp_posts_args = apply_filters( 'bstone_posts_banner_qry_args', $posts_args );

				$posts_array = get_posts( $bp_posts_args );

				/**
				 * Banner Html Markup
				 */

				if( $posts_array ) {

					$banner_content .= '<section id="bp-banner-container" class="'.$classes_container.'">';

						$banner_content .= '<div class="bp-banner-inner">';

							/**
							 * Get Posts Grid Banner
							 */
							if( 'posts-grid' == $banner_type ) {
								
								$banner_content .= '<div class="bp-grid-banner st-flex content-top">';

								$bp_grid_item_count = 0;

								foreach ($posts_array as $post) :

									if (has_post_thumbnail( $post->ID ) ):

										$bp_grid_item_count++;

										$bp_grid_size_class = '';									

										if( 1 == $bp_grid_item_count ) {
											$banner_content .= '<div class="bp-banner-grid-item bpg-large" style="background-image: url('.esc_url(get_the_post_thumbnail_url( $post->ID, bstone_options( 'bp-banner-imgsize' ) )).');">';
										}

										if( 2 == $bp_grid_item_count ) {
											$banner_content .= '<div class="bp-banner-grid-item bpg-small">';
										}

											if( 2 == $bp_grid_item_count || 3 == $bp_grid_item_count ) {
												$banner_content .= '<div class="bpg-small-item">';
												$banner_content .= '<div class="bpg-small-bg-cnt" style="background-image: url('.esc_url(get_the_post_thumbnail_url( $post->ID, bstone_options( 'bp-banner-imgsize' ) )).');">';
											}

												$banner_content .='<div class="bp-banner-grid-content bp-banner-content '. esc_attr( bstone_options( 'bp-banner-align' ) ) .'">';

													if( $banner_structure ) {
														$element_count = 0;
														foreach ($banner_structure as $element) :
															$element_count++;
															switch ( $element ) {
																case 'title':
																	$banner_content .= '<h2 class="bst-banner-heading '.$bpb_shadow.'"><a href="'. get_permalink( $post->ID ) .'">' . get_the_title( $post->ID ) . '</a></h2>';
																	break;
																case 'category':
																	$banner_content .= bstone_posts_banner_category_markup( $post );
																	break;
																case 'meta':
																	$banner_content .= bstone_posts_banner_meta_markup( $post );
																	break;
															}
															if( $element_count != count( $banner_structure ) ) {
																$banner_content .= '<span style="height:'. esc_attr( bstone_options( 'bp-banner-content-gap' ) ) .'px; display: block;"></span>';
															}
														endforeach;
													}

												$banner_content .= '</div>';

												$banner_content .= get_the_post_thumbnail( $post->ID, bstone_options( 'bp-banner-imgsize' ) );

											if( 2 == $bp_grid_item_count || 3 == $bp_grid_item_count ) {
												$banner_content .= '</div></div>';
											}

										if( 1 == $bp_grid_item_count ) {
											$banner_content .= '</div>';
										}

										if( 3 == $bp_grid_item_count ) {
											$banner_content .= '</div>';
										}

									endif;
								endforeach;

								$banner_content .= '</div>';

							}
							/**
							 * Get Posts Slider Banner
							 */
							else {

								$banner_content .= '<div class="owl-carousel bp-slider">';

								foreach ($posts_array as $post) :

									if (has_post_thumbnail( $post->ID ) ):

										$banner_content .= '<div class="bp-slider-item">';

											if( 'full' == $banner_width ) { $banner_content .= '<div class="bp-slider-content-outer st-container">'; }

											$banner_content .='<div class="bp-slider-content bp-banner-content '. esc_attr( bstone_options( 'bp-banner-align' ) ) .'">';								

												if( $banner_structure ) {
													$element_count = 0;
													foreach ($banner_structure as $element) :
														$element_count++;
														switch ( $element ) {
															case 'title':
																$banner_content .= '<h2 class="bst-banner-heading '.$bpb_shadow.'"><a href="'. get_permalink( $post->ID ) .'">' . get_the_title( $post->ID ) . '</a></h2>';
																break;
															case 'category':
																$banner_content .= bstone_posts_banner_category_markup( $post );
																break;
															case 'meta':
																$banner_content .= bstone_posts_banner_meta_markup( $post );
																break;
														}
														if( $element_count != count( $banner_structure ) ) {
															$banner_content .= '<span style="height:'. esc_attr( bstone_options( 'bp-banner-content-gap' ) ) .'px; display: block;"></span>';
														}
													endforeach;
												}
											$banner_content .='</div>';

											if( 'full' == $banner_width ) { $banner_content .='</div>'; }

											$banner_content .= get_the_post_thumbnail( $post->ID, bstone_options( 'bp-banner-imgsize' ) );

										$banner_content .= '</div>';

									endif; // end have post thumbnail

								endforeach;

								wp_reset_postdata();

								$banner_content .= '</div>';

							}

						$banner_content .= '</div>';

					$banner_content .= '</section>';
				}

			endif;
		}

		// Apply filters
		$banner_markup = apply_filters( 'bstone_posts_banner_markup', $banner_content );

		echo $banner_markup;
	}
}
add_action('bstone_single_header', 'bstone_posts_banner_markup', 20);

/**
 * Function to get posts banner / slider categories markup
 */
if ( ! function_exists( 'bstone_posts_banner_category_markup' ) ) {
	/**
	 * Posts banner / slider Categories
	 *
	 * @since 1.1.2
	 */	
	function bstone_posts_banner_category_markup( $post ) {
		$category_content = '';

		$categories = get_the_category( $post->ID );

		if( $categories ) {

			$bpb_cat_shadow = '';

			if( true == bstone_options( 'bp-banner-cat-shadow' ) ) {
				$bpb_cat_shadow = 'shadow';
			}

			$category_content .= '<div class="bp-banner-category '.$bpb_cat_shadow.'">';

			$bpb_cat_count = 0;

			foreach ( $categories as $category ) {

				$bpb_cat_count++;

				if( $bpb_cat_count > 1 ) {
					$category_content .= '<span class="spacer"></span>';
				}

				$category_content .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . $category->name . '</a>';

			}

			$category_content .= '</div>';

		}

		return apply_filters( 'bstone_posts_banner_category_markup', $category_content );
	}
}

/**
 * Function to get posts banner / slider meta markup
 */
if ( ! function_exists( 'bstone_posts_banner_meta_markup' ) ) {
	/**
	 * Posts banner / slider Meta
	 *
	 * @since 1.1.2
	 */	
	function bstone_posts_banner_meta_markup( $post ) {

		$banner_mata_structure = bstone_options( 'bp-banner-meta-structure' );

		$meta_icons 	   = bstone_options( 'display-meta-icons' );		
		$meta_icons_type   = bstone_options( 'meta-icons-type' );

		$meta_icons_status = bstone_options( 'bstone-font-awesome-icons' );
		$meta_icons_type_r = bstone_options( 'bstone-font-awesome-regular' );
		$meta_icons_type_s = bstone_options( 'bstone-font-awesome-solid' );
		
		$bst_meta_icons_typ = '';
		
		if( true == $meta_icons_status ) {
			if( true == $meta_icons_type_r ) { $bst_meta_icons_typ = 'far'; } else 
			if( true == $meta_icons_type_s ) { $bst_meta_icons_typ = 'fas'; }
			
			if( 'regular' == $meta_icons_type && true == $meta_icons_type_r ) {
				$bst_meta_icons_typ = 'far';

			} else if( 'solid' == $meta_icons_type && true == $meta_icons_type_s ) {
				$bst_meta_icons_typ = 'fas';
			}
		}

		$meta_content = '';

		if( $banner_mata_structure ) {

			$bpb_meta_shadow = '';

			if( true == bstone_options( 'bp-banner-meta-shadow' ) ) {
				$bpb_meta_shadow = 'shadow';
			}

			$meta_content .= '<div class="entry-meta bp-banner-meta '.$bpb_meta_shadow.'">';

			foreach( $banner_mata_structure as $index => $element ):

				if( count(  $banner_mata_structure) > 1 && $index != 0 ) :
					$meta_content .= '<span class="bst-meta-sep">'.esc_html( bstone_options( 'blog-meta-separator' ) ).'</span>';
				endif;

				switch ( $element ) {
					case 'comments':
						$meta_content .= bstone_entry_meta_comments( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
						break;
					case 'date':
						$meta_content .= bstone_entry_meta_date( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
						break;
					case 'author':
						$meta_content .= bstone_entry_meta_author_by_post_id( $meta_icons, $bst_meta_icons_typ, $meta_icons_status, $post->ID );
						break;
					case 'category':
						$meta_content .= bstone_entry_meta_category( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
						break;
					case 'tag':
						$meta_content .= bstone_entry_meta_tag( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
						break;
				}

			endforeach;

			$meta_content .= '</div>';
		}

		return apply_filters( 'bstone_posts_banner_meta_markup', $meta_content );
	}
}

/**
 * Comments and pingbacks
 *
 * @since 1.1.4
 */
if ( ! function_exists( 'bst_comment_list_markup' ) ) {
	function bst_comment_list_markup( $comment, $args, $depth ) { ?>
	
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			<div class="the-comment">
				<div class="comment-header">
					<div class="avatar">
						<?php echo get_avatar( $comment, $size='78' ); ?>
					</div>
					<div class="author-meta">
						<h5>
							<?php printf(__('%s ', 'bstone'), get_comment_author_link()) ?>
							<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</h5>
						<span class="comment-date">
							<a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s ', 'bstone'), get_comment_date(), get_comment_time()) ?></a> 
							<?php edit_comment_link( __('(Edit)', 'bstone'),'  ', '') ?>
						</span>
					</div>
				</div>
				
				<div class="comment-body">
					<?php if ($comment->comment_approved == '0') : ?>
						<em class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'bstone') ?></em><br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
			</div><!-- #comment-## -->
<?php 
	}
}