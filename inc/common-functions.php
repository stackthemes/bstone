<?php
/**
 * Functions for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'bstone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bstone_setup() {

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'bstone' ),
		) );
	}
endif;
add_action( 'after_setup_theme', 'bstone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bstone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bstone_content_width', 640 );
}
add_action( 'after_setup_theme', 'bstone_content_width', 0 );

/**
 *  Custom Image Sizes
 */
add_image_size( 'bstone-small', 700, 450, true );
add_image_size( 'bstone-medium', 1000, 563, true );
add_image_size( 'bstone-large', 1920, 780, true );

/**
 * Return Theme options.
 */
if ( ! function_exists( 'bstone_get_option' ) ) {

	/**
	 * Return Theme options.
	 *
	 * @param  string $option       Option key.
	 * @param  string $default      Option default value.
	 * @param  string $deprecated   Option default value.
	 * @return Mixed               Return option value.
	 */
	function bstone_get_option( $option, $default = '', $deprecated = '' ) {

		if ( '' != $deprecated ) {
			$default = $deprecated;
		}

		$theme_options = Bstone_Theme_Options::get_options();

		/**
		 * Filter the options array for Bstone Settings.
		 *
		 * @since  1.0.0
		 * @var Array
		 */
		$theme_options = apply_filters( 'bstone_get_option_array', $theme_options, $option, $default );

		$value = ( isset( $theme_options[ $option ] ) && '' !== $theme_options[ $option ] ) ? $theme_options[ $option ] : $default;

		/**
		 * Dynamic filter bstone_get_option_$option.
		 * $option is the name of the Bstone Setting, Refer Bstone_Theme_Options::defaults() for option names from the theme.
		 *
		 * @since  1.0.0
		 * @var Mixed.
		 */
		return apply_filters( "bstone_get_option_{$option}", $value,  $option, $default );
	}
}

/**
 * Display classes for primary div
 */
if ( ! function_exists( 'bstone_primary_class' ) ) {

	/**
	 * Display classes for primary div
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return void        Echo classes.
	 */
	function bstone_primary_class( $class = '' ) {

		// Separates classes with a single space, collates classes for body element.
		echo 'class="' . esc_attr( join( ' ', bstone_get_primary_class( $class ) ) ) . '"';
	}
}

/**
 * Retrieve the classes for the primary element as an array.
 */
if ( ! function_exists( 'bstone_get_primary_class' ) ) {

	/**
	 * Retrieve the classes for the primary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array        Return array of classes.
	 */
	function bstone_get_primary_class( $class = '' ) {

		// array of class names.
		$classes = array();

		// default class for content area.
		array_push($classes, 'content-area');

		// primary base class.
		array_push($classes, 'primary');

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		// Filter primary div class names.
		$classes = apply_filters( 'bstone_primary_class', $classes, $class );

		$classes = array_map( 'sanitize_html_class', $classes );

		return array_unique( $classes );
	}
}// End if().

/**
 * Display classes for secondary div
 */
if ( ! function_exists( 'bstone_secondary_class' ) ) {

	/**
	 * Retrieve the classes for the secondary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return void        echo classes.
	 */
	function bstone_secondary_class( $class = '' ) {

		// Separates classes with a single space, collates classes for body element.
		echo 'class="' . esc_attr( join( ' ', bstone_get_secondary_class( $class ) ) ) . '"';
	}
}

/**
 * Retrieve the classes for the secondary element as an array.
 */
if ( ! function_exists( 'bstone_get_secondary_class' ) ) {

	/**
	 * Retrieve the classes for the secondary element as an array.
	 *
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array        Return array of classes.
	 */
	function bstone_get_secondary_class( $class = '' ) {

		// array of class names.
		$classes = array();

		// default class from widget area.
		array_push($classes, 'widget-area');

		// secondary base class.
		array_push($classes, 'secondary');
		
		// Sidebar Layout
		array_push($classes, "bstone-".bstone_page_layout());

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}
			$classes = array_merge( $classes, $class );
		} else {

			// Ensure that we always coerce class to being an array.
			$class = array();
		}

		// Filter secondary div class names.
		$classes = apply_filters( 'bstone_secondary_class', $classes, $class );

		$classes = array_map( 'sanitize_html_class', $classes );

		return array_unique( $classes );
	}
}// End if().

/**
 * Get post format
 */
if ( ! function_exists( 'bstone_get_post_format' ) ) {

	/**
	 * Get post format
	 *
	 * @param  string $post_format_override Override post formate.
	 * @return string                       Return post format.
	 */
	function bstone_get_post_format( $post_format_override = '' ) {
		
		$supported_posts_formats = array('gallery', 'image', 'link', 'quote', 'video', 'audio', 'status', 'aside');
		
		$post_format = get_post_format();

		if ( ( is_home() ) || is_archive() ) {
			if ( !in_array( $post_format, $supported_posts_formats ) ) {
				$post_format = 'blog';
			}
		}

		return apply_filters( 'bstone_get_post_format', $post_format, $post_format_override );
	}
}

/**
 * Get options
 */

if ( ! function_exists( 'bstone_options' ) ) {
	/*
	 * Function to get customizer options
	 */
	
	function bstone_options($option) {
		$bstone_theme_options  = get_option(BSTONE_THEME_SETTINGS);
		
		if( !is_array($bstone_theme_options) ) {
			$bstone_theme_options = array();
		}
		
		if ( array_key_exists( $option, $bstone_theme_options ) ) :
		
			$option_value = $bstone_theme_options[$option];
			
		else:
			$bstone_theme_defaults = Bstone_Theme_Options::defaults();

			if ( array_key_exists( $option, $bstone_theme_defaults ) )
			{
				$option_value = $bstone_theme_defaults[$option];
			} else {
				$option_value = '';
			}
		endif;
		
		return apply_filters( 'bstone_options', $option_value, $option );
	}
}

/**
 * Foreground Color
 */
if ( ! function_exists( 'bstone_get_foreground_color' ) ) {

	/**
	 * Foreground Color
	 *
	 * @param  string $hex Color code in HEX format.
	 * @return string      Return foreground color depend on input HEX color.
	 */
	function bstone_get_foreground_color( $hex ) {

		if ( 'transparent' == $hex || 'false' == $hex || '#' == $hex || empty( $hex ) ) {
			return 'transparent';

		} else {

			// Get clean hex code.
			$hex = str_replace( '#', '', $hex );

			if ( 3 == strlen( $hex ) ) {
				$hex = str_repeat( substr( $hex,0,1 ), 2 ) . str_repeat( substr( $hex,1,1 ), 2 ) . str_repeat( substr( $hex,2,1 ), 2 );
			}

			// Get r, g & b codes from hex code.
			$r   = hexdec( substr( $hex,0,2 ) );
			$g   = hexdec( substr( $hex,2,2 ) );
			$b   = hexdec( substr( $hex,4,2 ) );
			$hex = ( ( $r * 299 ) + ( $g * 587 ) + ( $b * 114 ) ) / 1000;

			return 128 <= $hex ? '#000000' : '#ffffff';
		}
	}
}// End if().

/**
 * Get Font Size value
 */
if ( ! function_exists( 'bstone_get_font_css_value' ) ) {

	/**
	 * Get Font CSS value
	 *
	 * Syntax:
	 *
	 *  bstone_get_font_css_value( VALUE, DEVICE, UNIT );
	 *
	 * E.g.
	 *
	 *  bstone_get_css_value( VALUE, 'desktop', '%' );
	 *  bstone_get_css_value( VALUE, 'tablet' );
	 *  bstone_get_css_value( VALUE, 'mobile' );
	 *
	 * @param  string $value        CSS value.
	 * @param  string $unit         CSS unit.
	 * @param  string $device       CSS device.
	 * @return mixed                CSS value depends on $unit & $device
	 */
	function bstone_get_font_css_value( $value, $unit = 'px', $device = 'desktop' ) {

		// If value is empty or 0 then return blank.
		if ( '' == $value || 0 == $value ) {
			return '';
		}

		$css_val = '';

		switch ( $unit ) {
			case 'em':
			case '%':
						$css_val = esc_attr( $value ) . $unit;
				break;

			case 'px':
				if ( is_numeric( $value ) || strpos( $value, 'px' ) ) {
					$value            = intval( $value );
					$fonts            = array();
					$body_font_size   = bstone_get_option( 'font-size-body' );
					$fonts['desktop'] = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
					$fonts['tablet']  = ( isset( $body_font_size['tablet'] ) && '' != $body_font_size['tablet'] ) ? $body_font_size['tablet'] : $fonts['desktop'];
					$fonts['mobile']  = ( isset( $body_font_size['mobile'] ) && '' != $body_font_size['mobile'] ) ? $body_font_size['mobile'] : $fonts['tablet'];

					if ( $fonts[ $device ] ) {
						$css_val = esc_attr( $value ) . 'px;font-size:' . ( esc_attr( $value ) / esc_attr( $fonts[ $device ] ) ) . 'rem';
					}
				} else {
					$css_val = esc_attr( $value );
				}
		}

		return $css_val;
	}
}// End if().

/**
 * Get Font family
 */
if ( ! function_exists( 'bstone_get_font_family' ) ) {

	/**
	 * Get Font family
	 *
	 * Syntax:
	 *
	 *  bstone_get_font_family( VALUE, DEFAULT );
	 *
	 * E.g.
	 *  bstone_get_font_family( VALUE, '' );
	 *
	 * @since  1.0.1
	 *
	 * @param  string $value       CSS value.
	 * @return mixed               CSS value depends on $unit
	 */
	function bstone_get_font_family( $value = '' ) {
		$system_fonts = Bstone_Font_Families::get_system_fonts();
		if ( isset( $system_fonts[ $value ] ) && isset( $system_fonts[ $value ]['fallback'] ) ) {
			$value .= ',' . $system_fonts[ $value ]['fallback'];
		}

		return $value;
	}
}


/**
 * Get CSS value
 */
if ( ! function_exists( 'bstone_get_css_value' ) ) {

	/**
	 * Get CSS value
	 *
	 * Syntax:
	 *
	 *  bstone_get_css_value( VALUE, UNIT );
	 *
	 * E.g.
	 *
	 *  bstone_get_css_value( VALUE, 'url' );
	 *  bstone_get_css_value( VALUE, 'px' );
	 *  bstone_get_css_value( VALUE, 'em' );
	 *
	 * @param  string $value        CSS value.
	 * @param  string $unit         CSS unit.
	 * @param  string $default      CSS default font.
	 * @return mixed               CSS value depends on $unit
	 */
	function bstone_get_css_value( $value = '', $unit = 'px', $default = '' ) {

		if ( '' == $value && '' == $default ) {
			return $value;
		}

		$css_val = '';

		switch ( $unit ) {

			case 'font':
				if ( 'inherit' != $value ) {
					$value   = bstone_get_font_family( $value );
					$css_val = esc_attr( $value );
				} elseif ( '' != $default ) {
					$css_val = esc_attr( $default );
				}

				break;

			case 'px':
			case '%':
						$value = ( '' != $value ) ? $value : $default;
						$css_val = esc_attr( $value ) . $unit;
				break;

			case 'url':
						$css_val = $unit . '(' . esc_url( $value ) . ')';
				break;

			case 'rem':
				if ( is_numeric( $value ) || strpos( $value, 'px' ) ) {
					$value          = intval( $value );
					$body_font_size = bstone_get_option( 'font-size-body' );
					if ( is_array( $body_font_size ) ) {
						$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
					} else {
						$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
					}

					if ( $body_font_size_desktop ) {
						$css_val = esc_attr( $value ) . 'px;font-size:' . ( esc_attr( $value ) / esc_attr( $body_font_size_desktop ) ) . $unit;
					}
				} else {
					$css_val = esc_attr( $value );
				}

				break;

			default:
				$value = ( '' != $value ) ? $value : $default;
				if ( '' != $value ) {
					$css_val = esc_attr( $value ) . $unit;
				}
		}// End switch().

		return $css_val;
	}
}// End if().

/**
 * Parse CSS
 */
if ( ! function_exists( 'bstone_parse_css' ) ) {

	/**
	 * Parse CSS
	 *
	 * @param  array  $css_output Array of CSS.
	 * @param  string $min_media  Min Media breakpoint.
	 * @param  string $max_media  Max Media breakpoint.
	 * @return string             Generated CSS.
	 */
	function bstone_parse_css( $css_output = array(), $min_media = '', $max_media = '' ) {

		$parse_css = '';
		if ( is_array( $css_output ) && count( $css_output ) > 0 ) {

			foreach ( $css_output as $selector => $properties ) {

				if ( ! count( $properties ) ) {
					continue; }

				$temp_parse_css   = $selector . '{';
				$properties_added = 0;

				foreach ( $properties as $property => $value ) {

					if ( '' === $value ) {
						continue; }

					$properties_added++;
					$temp_parse_css .= $property . ':' . $value . ';';
				}

				$temp_parse_css .= '}';

				if ( $properties_added > 0 ) {
					$parse_css .= $temp_parse_css;
				}
			}

			if ( '' != $parse_css && ( '' !== $min_media || '' !== $max_media ) ) {

				$media_css       = '@media ';
				$min_media_css   = '';
				$max_media_css   = '';
				$media_separator = '';

				if ( '' !== $min_media ) {
					$min_media_css = '(min-width:' . $min_media . 'px)';
				}
				if ( '' !== $max_media ) {
					$max_media_css = '(max-width:' . $max_media . 'px)';
				}
				if ( '' !== $min_media && '' !== $max_media ) {
					$media_separator = ' and ';
				}

				$media_css .= $min_media_css . $media_separator . $max_media_css . '{' . $parse_css . '}';

				return $media_css;
			}
		}// End if().

		return $parse_css;
	}
}// End if().

/**
 * Get Font Size value
 */
if ( ! function_exists( 'bstone_responsive_font' ) ) {

	/**
	 * Get Font CSS value
	 *
	 * @param  array  $font    CSS value.
	 * @param  string $device  CSS device.
	 * @param  string $default Default value.
	 * @return mixed
	 */
	function bstone_responsive_font( $font, $device = 'desktop', $default = '' ) {

		$css_val = '';

		if ( isset( $font[ $device ] ) && isset( $font[ $device . '-unit' ] ) ) {
			if ( '' != $default ) {
				$font_size = bstone_get_css_value( $font[ $device ], $font[ $device . '-unit' ], $default );
			} else {
				$font_size = bstone_get_font_css_value( $font[ $device ], $font[ $device . '-unit' ] );
			}
		} elseif ( is_numeric( $font ) ) {
			$font_size = bstone_get_css_value( $font );
		} else {
			$font_size = ( ! is_array( $font ) ) ? $font : '';
		}

		return $font_size;
	}
}// End if().

/**
 * Get Font Size CSS
 */
if ( ! function_exists( 'bstone_responsive_font_size_css' ) ) {

	/**
	 * Get Font CSS value
	 *
	 * @param  array  $font_size    CSS value.
	 * @param  string $selector  CSS selector.
	 * @return mixed
	 */
	function bstone_responsive_font_size_css( $selector, $font_size ) {

		$css_output = '';

		if ( is_array( $font_size ) ) {
			
			$desktop_font_css = array(
				$selector => array(
					'font-size' => $font_size['desktop'].$font_size['desktop-unit'],
				),
			);
			
			$css_output .= bstone_parse_css( $desktop_font_css );
			
			if( '' != $font_size['mobile'] ) {
				
				$mobile_font_css = array(
					$selector => array(
						'font-size' => $font_size['mobile'].$font_size['mobile-unit'],
					),
				);
				
				$css_output .= bstone_parse_css( $mobile_font_css, '120', '480' );
				
			}
			
			if( '' != $font_size['tablet'] ) {
				
				$tablet_font_css = array(
					$selector => array(
						'font-size' => $font_size['tablet'].$font_size['tablet-unit'],
					),
				);
				
				$css_output .= bstone_parse_css( $tablet_font_css, '481', '920' );
				
			}
			
		}

		return $css_output;
	}
}// End if().

/**
 * Adjust the HEX color brightness
 */
if ( ! function_exists( 'bstone_adjust_brightness' ) ) {

	/**
	 * Adjust Brightness
	 *
	 * @param  string $hex   Color code in HEX.
	 * @param  number $steps brightness value.
	 * @param  string $type  brightness is reverse or default.
	 * @return string        Color code in HEX.
	 */
	function bstone_adjust_brightness( $hex, $steps, $type ) {

		// Get rgb vars.
		$hex = str_replace( '#','',$hex );

		$shortcode_atts = array(
			'r' => hexdec( substr( $hex,0,2 ) ),
			'g' => hexdec( substr( $hex,2,2 ) ),
			'b' => hexdec( substr( $hex,4,2 ) ),
		);

		// Should we darken the color?
		if ( 'reverse' == $type && $shortcode_atts['r'] + $shortcode_atts['g'] + $shortcode_atts['b'] > 382 ) {
			$steps = -$steps;
		} elseif ( 'darken' == $type ) {
			$steps = -$steps;
		}

		// Build the new color.
		$steps = max( -255, min( 255, $steps ) );

		$shortcode_atts['r']  = max( 0,min( 255,$shortcode_atts['r'] + $steps ) );
		$shortcode_atts['g'] = max( 0,min( 255,$shortcode_atts['g'] + $steps ) );
		$shortcode_atts['b'] = max( 0,min( 255,$shortcode_atts['b'] + $steps ) );

		$r_hex = str_pad( dechex( $shortcode_atts['r'] ), 2, '0', STR_PAD_LEFT );
		$g_hex = str_pad( dechex( $shortcode_atts['g'] ), 2, '0', STR_PAD_LEFT );
		$b_hex = str_pad( dechex( $shortcode_atts['b'] ), 2, '0', STR_PAD_LEFT );

		return '#' . $r_hex . $g_hex . $b_hex;
	}
}// End if().

/**
 * Site Sidebar
 */
if ( ! function_exists( 'bstone_page_layout' ) ) {

	/**
	 * Site Sidebar
	 *
	 * Default 'right sidebar' for overall site.
	 */
	function bstone_page_layout() {

		if ( is_singular() ) {

			// If post meta value is empty,
			// Then get the POST_TYPE sidebar.
			$layout = bstone_get_option_meta( 'site-sidebar-layout', '', true );

			if ( empty( $layout ) ) {

				$layout = bstone_options( 'single-' . get_post_type() . '-sidebar-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = bstone_options( 'site-sidebar-layout' );
				}
			}
		} else {

			if ( is_search() ) {

				// Check only post type archive option value.
				$layout = bstone_options( 'archive-post-sidebar-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = bstone_options( 'site-sidebar-layout' );
				}
			} else {

				$layout = bstone_options( 'archive-' . get_post_type() . '-sidebar-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = bstone_options( 'site-sidebar-layout' );
				}// End if().
			}
		}// End if().

		return apply_filters( 'bstone_page_layout', $layout );
	}
}// End if().

/**
 * Return Theme options from postmeta.
 */
if ( ! function_exists( 'bstone_get_option_meta' ) ) {

	/**
	 * Return Theme options from postmeta.
	 *
	 * @param  string  $option_id Option ID.
	 * @param  string  $default   Option default value.
	 * @param  boolean $only_meta Get only meta value.
	 * @param  string  $extension Is value from extension.
	 * @param  string  $post_id   Get value from specific post by post ID.
	 * @return Mixed             Return option value.
	 */
	function bstone_get_option_meta( $option_id, $default = '', $only_meta = false, $extension = '', $post_id = '' ) {

		$post_id = ( '' != $post_id ) ? $post_id : bstone_get_post_id();

		$value = bstone_get_option( $option_id, $default );

		// Get value from option 'post-meta'.
		if ( is_singular() || ( is_home() && ! is_front_page() ) ) {

			$value = get_post_meta( $post_id, $option_id, true );

			if ( empty( $value ) || 'default' == $value ) {

				if ( true == $only_meta ) {
					return false;
				}

				$value = bstone_get_option( $option_id, $default );
			}
		}

		/**
		 * Dynamic filter bstone_get_option_meta_$option.
		 * $option_id is the name of the Bstone Meta Setting.
		 *
		 * @since  1.0.1
		 * @var Mixed.
		 */
		return apply_filters( "bstone_get_option_meta_{$option_id}", $value,  $default, $default );
	}
}// End if().

/**
 * Helper function to get the current post id.
 */
if ( ! function_exists( 'bstone_get_post_id' ) ) {

	/**
	 * Get post ID.
	 *
	 * @param  string $post_id_override Get override post ID.
	 * @return number                   Post ID.
	 */
	function bstone_get_post_id( $post_id_override = '' ) {

		if ( null == Bstone_Theme_Options::$post_id ) {
			global $post;

			$post_id = 0;

			if ( is_home() ) {
				$post_id = get_option( 'page_for_posts' );
			} elseif ( is_archive() ) {
				global $wp_query;
				$post_id = $wp_query->get_queried_object_id();
			} elseif ( isset( $post->ID ) && ! is_search() && ! is_category() ) {
				$post_id = $post->ID;
			}

			Bstone_Theme_Options::$post_id = $post_id;
		}

		return apply_filters( 'bstone_get_post_id', Bstone_Theme_Options::$post_id, $post_id_override );
	}
}// End if().

/**
 * Default color picker palettes
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'bstone_default_color_palettes' ) ) {
	function bstone_default_color_palettes() {

		$palettes = array(
			'#000000',
			'#ffffff',
			'#dd3333',
			'#dd9933',
			'#eeee22',
			'#81d742',
			'#1e73be',
			'#8224e3',
		);

		// Apply filters and return
		return apply_filters( 'bstone_default_color_palettes', $palettes );

	}
}// End if().

/**
 * Responsive Spacing CSS
 *
 * Since 1.0.0
 **/
if ( ! function_exists( 'bstone_get_responsive_spacings' ) ) {
	/*
	 * $selector 	  => CSS selector
	 * $control1 	  => Customizer control name before spacing position (if control name is 'h1_top_margin' $control1 will be 'h1')
	 					 and 'top' is spacing position
	 * $control2 	  => Customizer control name after spacing position (if control name is 'h1_top_margin' $control2 will be 'margin')
	 					 and 'top' is spacing position
	 * $property 	  => CSS Property ('padding' or 'margin')
	 * $value 		  => CSS Value (number)
	 * $types 		  => Spacing position ['top', 'right', 'bottom', 'left']
	 * $media_queries => CSS media queries - Break Points ['desktop:921', tablet:481', mobile:120']
	 */
	
	function bstone_get_responsive_spacings( $selector, $control1, $control2, $property1, $property2, $value, $types, $media_queries ) {		
		$css_output = '';
		
		if ( '' != $property2 && '-' != $property2 ) {
			$property2 = '-'.$property2;
		}
		
		$nagative_value = '';
		
		if ( '-' == $property2 ) {
			$property2 = '';
			$nagative_value = '-';
		}
		
		foreach( $types as $position ) {

			$css_pos = $position;

			if ( is_rtl() ) {
				if( "right" == $position ) {
					$css_pos = "left";
				}
				else if( "left" == $position ) {
					$css_pos = "right";
				}
			}
		
			$ctrl_val_desktop = bstone_options( $control1.'_'.$position.'_'.$control2 );
			if( $ctrl_val_desktop == '' ) { $ctrl_val_desktop = 0; }
			
			$ctrl_val_tablet = bstone_options( $control1.'_tablet_'.$position.'_'.$control2 );
			if( $ctrl_val_tablet == '' ) { $ctrl_val_tablet = $ctrl_val_desktop; }

			/* Mobile */
			if ( in_array("mobile", $media_queries) ) {
				$ctrl_val_mobile  = bstone_options( $control1.'_mobile_'.$position.'_'.$control2 );
				if( '' == $ctrl_val_mobile ) {
					if( '' !== $ctrl_val_tablet ) {
						$ctrl_val_mobile = $ctrl_val_tablet;
					} else {
						$ctrl_val_mobile = $ctrl_val_desktop;
					}
				}

				$mobile_css = array(
					$selector => array(
						$property1.'-'.$css_pos.$property2 => $nagative_value.$ctrl_val_mobile.$value,
					),
				);
				$css_output .= bstone_parse_css( $mobile_css, '120' );
			}

			/* Tablet */
			if ( in_array("tablet", $media_queries) ) {
				$ctrl_val_tablet  = bstone_options( $control1.'_tablet_'.$position.'_'.$control2 );
				if( '' == $ctrl_val_tablet ) { $ctrl_val_tablet = $ctrl_val_desktop; }

				$tablet_css = array(
					$selector => array(
						$property1.'-'.$css_pos.$property2 => $nagative_value.$ctrl_val_tablet.$value,
					),
				);
				$css_output .= bstone_parse_css( $tablet_css, '481' );
			}

			/* Desktop */
			if ( in_array("desktop", $media_queries) ) {
				$desktop_css = array(
					$selector => array(
						$property1.'-'.$css_pos.$property2 => $nagative_value.$ctrl_val_desktop.$value,
					),
				);
				$css_output .= bstone_parse_css( $desktop_css, '921' );
			}
		
		}// End foreach
		
		// Apply filters and return
		return apply_filters( 'bstone_get_responsive_spacings', $css_output, $selector, $control1, $control2, $property1, $property2,  $value, $media_queries );
	}
}// End if().

/**
 * Responsive CSS
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'bstone_responsive_css' ) ) {
	function bstone_responsive_css( $selector, $control1, $control2, $css1, $css2, $media_queries ) {
		
		$css_output = '';
		$ctrl_val_desktop = bstone_options( $control1.'_'.$control2 );
		if( $ctrl_val_desktop == '' ) { $ctrl_val_desktop = 0; }
		
		/* Mobile */
		if ( in_array("mobile", $media_queries) ) {
			$ctrl_val_mobile  = bstone_options( $control1.'_mobile_'.$control2 );
			if( '' == $ctrl_val_mobile ) { $ctrl_val_mobile = $ctrl_val_desktop; }
			
			$mobile_css = array(
				$selector => array(
					$css1 => $ctrl_val_mobile.$css2,
				),
			);
			$css_output .= bstone_parse_css( $mobile_css, '120' );
		}
		
		/* Tablet */
		if ( in_array("tablet", $media_queries) ) {
			$ctrl_val_tablet  = bstone_options( $control1.'_tablet_'.$control2 );
			if( '' == $ctrl_val_tablet ) { $ctrl_val_tablet = $ctrl_val_desktop; }
			
			$tablet_css = array(
				$selector => array(
					$css1 => $ctrl_val_tablet.$css2,
				),
			);
			$css_output .= bstone_parse_css( $tablet_css, '481' );
		}
		
		/* Desktop */
		if ( in_array("desktop", $media_queries) ) {
			$desktop_css = array(
				$selector => array(
					$css1 => $ctrl_val_desktop.$css2,
				),
			);
			$css_output .= bstone_parse_css( $desktop_css, '921' );
		}
		
		// Apply filters and return
		return apply_filters( 'bstone_responsive_css', $css_output, $selector, $control1, $control2, $css1, $css2, $media_queries );

	}
}// End if().

/**
 * Bstone Custom Excerpt Length
 */
if ( ! function_exists( 'bstone_custom_excerpt_length' ) ) {
	function bstone_custom_excerpt_length( $length ) {
		
		$excerpt_length = bstone_options( 'blog-post-content-length' );
		
		if( '' == $excerpt_length ) {
			$excerpt_length = 30;
		}
		
		return esc_html( $excerpt_length );
	}
	add_filter( 'excerpt_length', 'bstone_custom_excerpt_length', 999 );
}// End if().

/**
 * Bstone Custom Excerpt More
 */
if ( ! function_exists( 'bstone_excerpt_more' ) ) {
	function bstone_excerpt_more( $more ) {
		return esc_html( bstone_options( 'blog-post-content-more' ) );
	}
	add_filter( 'excerpt_more', 'bstone_excerpt_more' );
}// End if().

/**
 * Move comment field to bottom
 */
if ( ! function_exists( 'bstone_move_comment_field_to_bottom' ) ) {
	function bstone_move_comment_field_to_bottom( $fields ) {
		$comment_field = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_field;
		return $fields;
	}
	add_filter( 'comment_form_fields', 'bstone_move_comment_field_to_bottom' );
}// End if().

/**
 * Retrieve attachment IDs
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'bstone_get_gallery_ids' ) ) {

	function bstone_get_gallery_ids( $post_id = '' ) {

		global $post;
		
		$post_content = $post->post_content;
		preg_match('/\[gallery.*ids=.(.*).\]/', $post_content, $ids);
		$images_id = explode(",", $ids[1]);
		
		return $images_id;
	}
}// End if().

/**
 * Archive Page Title
 */
if ( ! function_exists( 'bstone_archive_page_info' ) ) {

	/**
	 * Wrapper function for the_title()
	 *
	 * Displays title only if the page title bar is disabled.
	 */
	function bstone_archive_page_info() {

		if ( apply_filters( 'bstone_the_title_enabled', true ) ) {

			// Author.
			if ( is_author() ) { ?>

				<section class="bst-author-box bst-archive-description">
					<div class="bst-author-bio">
						<h1 class='page-title bst-archive-title'><?php echo get_the_author(); ?></h1>
						<p><?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?></p>
					</div>
					<div class="bst-author-avatar">
						<?php echo get_avatar( get_the_author_meta( 'email' ), 120 ); ?>
					</div>
				</section>

			<?php

			// Category.
			} elseif ( is_category() ) {
			?>

				<section class="bst-archive-description">
					<h1 class="page-title bst-archive-title"><?php echo single_cat_title(); ?></h1>
					<?php the_archive_description(); ?>
				</section>

			<?php

			// Tag.
			} elseif ( is_tag() ) {
			?>

				<section class="bst-archive-description">
					<h1 class="page-title bst-archive-title"><?php echo single_tag_title(); ?></h1>
					<?php the_archive_description(); ?>
				</section>

			<?php

			// Search.
			} elseif ( is_search() ) {
			?>

				<section class="bst-archive-description">
					<?php
						/* translators: 1: search string */
						$title = apply_filters( 'bstone_the_search_page_title', sprintf( __( 'Search Results for: %s', 'bstone' ), '<span>' . get_search_query() . '</span>' ) );
					?>
					<h1 class="page-title bst-archive-title"> <?php echo esc_html($title); ?> </h1>
				</section>

			<?php

			// Other.
			} else {
			?>

				<section class="bst-archive-description">
					<?php the_archive_title( '<h1 class="page-title bst-archive-title">', '</h1>' ); ?>
					<?php the_archive_description(); ?>
				</section>

		<?php
			}// End if().
		}// End if().
	}

	add_action( 'bstone_archive_header', 'bstone_archive_page_info' );
}// End if().


/**
 * Header toggle buttons
 */
add_action( 'bstone_masthead_toggle_buttons', 'bstone_masthead_toggle_buttons_primary' );

if ( ! function_exists( 'bstone_masthead_toggle_buttons_primary' ) ) {

	/**
	 * Header toggle buttons
	 *
	 * => Used in files:
	 *
	 * /header.php
	 *
	 * @since 1.0.0
	 */
	function bstone_masthead_toggle_buttons_primary() {

		$disable_primary_navigation = bstone_options( 'disable-primary-nav' );
		$custom_header_section      = bstone_options( 'header-main-rt-section' );
		$display_outside_menu       = bstone_options( 'header-display-outside-menu' );

		if ( ! $disable_primary_navigation || ( 'none' != $custom_header_section && ! $display_outside_menu ) ) {
			$menu_title          = trim( apply_filters( 'bstone_main_menu_toggle_label', bstone_options( 'header-main-menu-label' ) ) );
			$menu_icon           = apply_filters( 'bstone_main_menu_toggle_icon', 'menu-toggle-icon' );
			$menu_label_class    = '';
			$screen_reader_title = __( 'Main Menu', 'bstone' );
			if ( '' !== $menu_title ) {
				$menu_label_class    = 'bst-menu-label';
				$screen_reader_title = $menu_title;
			}
		?>
		<div class="bst-button-wrap">
			<button type="button" class="menu-toggle main-header-menu-toggle <?php echo esc_attr( $menu_label_class ); ?>" rel="main-menu" aria-controls='primary-menu' aria-expanded='false'>
				<span class="screen-reader-text"><?php echo esc_html( $screen_reader_title ); ?></span>
				<i class="<?php echo esc_attr( $menu_icon ); ?>"></i>
				<?php if ( '' != $menu_title ) { ?>

					<span class="mobile-menu-wrap">
						<span class="mobile-menu"><?php echo esc_html( $menu_title ); ?></span>
					</span>

				<?php } ?>
			</button>
		</div>
	<?php
		}
	}
}// End if().

/**
 * Single Post/Page Header
 */
add_action( 'bstone_single_header', 'bstone_single_post_page_header' );

if ( ! function_exists( 'bstone_single_post_page_header' ) ) {
	/**
	 * Single post & inner page header
	 *
	 * @since 1.0.3
	 */
	function bstone_single_post_page_header() {
		
		get_template_part( 'template-parts/single-header' );

	}
}

/**
 * Get RTL directions
 */
if ( ! function_exists( 'bstone_get_rtl_directions' ) ) {
	function bstone_get_rtl_directions( $dir ) {
		if ( is_rtl() ) {
			
			if( "left" == $dir ) {

				return "right";

			} else if( "right" == $dir ) {

				return "left";

			} else {

				return $dir;
				
			}

		} else {
			return $dir;
		}
	}
}