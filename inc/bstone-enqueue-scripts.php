<?php
/**
 * Theme Enqueue Scripts
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

if ( ! class_exists( 'Bstone_Enqueue_Scripts' ) ) {
	class Bstone_Enqueue_Scripts {
		/**
		 * Class styles.
		 *
		 * @access public
		 * @var $styles Enqueued styles.
		 */
		public static $styles;

		/**
		 * Class scripts.
		 *
		 * @access public
		 * @var $scripts Enqueued scripts.
		 */
		public static $scripts;

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'bstone_get_fonts',          array( $this, 'add_fonts' ), 1 );
			add_action( 'wp_enqueue_scripts',       array( $this, 'enqueue_scripts' ), 1 );

		}

		/**
		 * List of all assets.
		 *
		 * @return array assets array.
		 */
		public static function theme_assets() {
			
			if( 'masonry' == bstone_options( 'blog-style' ) ) {

				$default_assets = array(

					// handle => location ( in /assets/js/ ) ( without .js ext).
					'js' => array(
						'bstone-flexibility' => 'flexibility',
						'bstone-masonry-js'  => 'masonry.pkgd',
						'bstone-theme-js'    => 'bstone',
					),

					// handle => location ( in /assets/css/ ) ( without .css ext).
					'css' => array(
						'bstone-theme-style' => 'style',
					),
				);
				
			} else {
				
				$default_assets = array(

					// handle => location ( in /assets/js/ ) ( without .js ext).
					'js' => array(
						'bstone-theme-js' => 'bstone',
						'bstone-flexibility' => 'flexibility',
					),

					// handle => location ( in /assets/css/ ) ( without .css ext).
					'css' => array(
						'bstone-theme-style' => 'style',
					),
				);
				
			}

			return apply_filters( 'bstone_theme_assets', $default_assets );
		}

		/**
		 * Add Fonts
		 */
		public function add_fonts() {

			$font_family = bstone_options( 'default-body-font-family' );
			$font_weight = bstone_options( 'default-body-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );

			// Render body font.
			$font_family = bstone_options( 'body-font-family' );
			$font_weight = bstone_options( 'body-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render h1 font.
			$font_family = bstone_options( 'h1-font-family' );
			$font_weight = bstone_options( 'h1-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render h2 font.
			$font_family = bstone_options( 'h2-font-family' );
			$font_weight = bstone_options( 'h2-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render h3 font.
			$font_family = bstone_options( 'h3-font-family' );
			$font_weight = bstone_options( 'h3-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render h4 font.
			$font_family = bstone_options( 'h4-font-family' );
			$font_weight = bstone_options( 'h4-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render h5 font.
			$font_family = bstone_options( 'h5-font-family' );
			$font_weight = bstone_options( 'h5-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render h6 font.
			$font_family = bstone_options( 'h6-font-family' );
			$font_weight = bstone_options( 'h6-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render header font.
			$font_family = bstone_options( 'header-typo-text-font-family' );
			$font_weight = bstone_options( 'header-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render header logo font.
			$font_family = bstone_options( 'logo-typo-text-font-family' );
			$font_weight = bstone_options( 'logo-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render header logo tagline font.
			$font_family = bstone_options( 'tagline-typo-text-font-family' );
			$font_weight = bstone_options( 'tagline-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render primary nav font.
			$font_family = bstone_options( 'nav-typo-text-font-family' );
			$font_weight = bstone_options( 'nav-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render sidebar widget title font.
			$font_family = bstone_options( 'sidebar-typo-title-font-family' );
			$font_weight = bstone_options( 'sidebar-typo-title-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render sidebar widget text font.
			$font_family = bstone_options( 'sidebar-typo-text-font-family' );
			$font_weight = bstone_options( 'sidebar-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render footer widget title font.
			$font_family = bstone_options( 'footer-typo-title-font-family' );
			$font_weight = bstone_options( 'footer-typo-title-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render footer widget text font.
			$font_family = bstone_options( 'footer-typo-text-font-family' );
			$font_weight = bstone_options( 'footer-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render footer bar widget title font.
			$font_family = bstone_options( 'footer-bar-typo-title-font-family' );
			$font_weight = bstone_options( 'footer-bar-typo-title-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render footer bar widget text font.
			$font_family = bstone_options( 'footer-bar-typo-text-font-family' );
			$font_weight = bstone_options( 'footer-bar-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render blog post title font.
			$font_family = bstone_options( 'blog-typo-title-font-family' );
			$font_weight = bstone_options( 'blog-typo-title-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render blog post text font.
			$font_family = bstone_options( 'blog-typo-entry-font-family' );
			$font_weight = bstone_options( 'blog-typo-entry-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render blog single post title font.
			$font_family = bstone_options( 'single-typo-title-font-family' );
			$font_weight = bstone_options( 'single-typo-title-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render buttons font.
			$font_family = bstone_options( 'btn-typo-text-font-family' );
			$font_weight = bstone_options( 'btn-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render read more buttons font.
			$font_family = bstone_options( 'readbtn-typo-text-font-family' );
			$font_weight = bstone_options( 'readbtn-typo-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render read more buttons font.
			$font_family = bstone_options( 'pagination-text-font-family' );
			$font_weight = bstone_options( 'pagination-text-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render from field's font.
			$font_family = bstone_options( 'bffield-font-family' );
			$font_weight = bstone_options( 'bffield-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
			
			// Render from buttons font.
			$font_family = bstone_options( 'bfbuttons-font-family' );
			$font_weight = bstone_options( 'bfbuttons-font-weight' );

			Bstone_Fonts::add_font( $font_family, $font_weight );
		}

		/**
		 * Enqueue Scripts
		 */
		public function enqueue_scripts() {

			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$js_uri  = BSTONE_THEME_URI . 'assets/js/' . $dir_name . '/';
			$css_uri = BSTONE_THEME_URI . 'assets/css/' . $dir_name . '/';

			// All assets.
			$all_assets = self::theme_assets();
			$styles     = $all_assets['css'];
			$scripts    = $all_assets['js'];

			// Register & Enqueue Styles.
			foreach ( $styles as $key => $style ) {

				// Generate CSS URL.
				$css_file = $css_uri . $style . $file_prefix . '.css';

				// Register.
				wp_register_style( $key, $css_file, array(), BSTONE_THEME_VERSION, 'all' );

				// Enqueue.
				wp_enqueue_style( $key );

				// RTL support.
				wp_style_add_data( $key, 'rtl', 'replace' );

			}

			// Register & Enqueue Scripts.
			foreach ( $scripts as $key => $script ) {

				// Register.
				wp_register_script( $key, $js_uri . $script . $file_prefix . '.js', array(), BSTONE_THEME_VERSION, true );

				// Enqueue.
				wp_enqueue_script( $key );

			}

			// Fonts - Render Fonts.
			Bstone_Fonts::render_fonts();

			/**
			 * Customizer CSS Output
			 */
			if( 'file' == bstone_options( 'bstone-css-location' ) ) {
				
				global $wp_filesystem;
				
				$upload_dir = wp_upload_dir();
				
				$dir = trailingslashit( $upload_dir['basedir'] ) . 'bstone'. DIRECTORY_SEPARATOR; // Set storage directory path
				
				if ( empty( $wp_filesystem ) ) {
					require_once( ABSPATH .'/wp-admin/includes/file.php' );
					WP_Filesystem();
				}
				
				if ( $wp_filesystem ) {
					
					$wp_filesystem->mkdir( $dir ); // Make a new folder 'bstone' for storing our file if not created already.
					
					$existing_file = $dir . 'custom-style.min.css';
					
					$existing_css = $wp_filesystem->get_contents( $existing_file );
					
					$bstone_custom_css_output = Bstone_Dynamic_CSS::return_output();
					
					$bstone_custom_css_output .= Bstone_Dynamic_CSS::return_meta_output( true );
					
					if ( $existing_css !== $bstone_custom_css_output ) {
						$wp_filesystem->put_contents( $existing_file, $bstone_custom_css_output, FS_CHMOD_FILE );
					}
					
					wp_enqueue_style( 'bstone-custom-styles', $upload_dir['baseurl'].'/bstone/' . 'custom-style.min.css' );
					
				} else {
					wp_add_inline_style( 'bstone-theme-style', Bstone_Dynamic_CSS::return_output() );
					wp_add_inline_style( 'bstone-theme-style', Bstone_Dynamic_CSS::return_meta_output( true ) );
				}
				
			} else {
				wp_add_inline_style( 'bstone-theme-style', Bstone_Dynamic_CSS::return_output() );
				wp_add_inline_style( 'bstone-theme-style', Bstone_Dynamic_CSS::return_meta_output( true ) );
			} 

			$bstone_localize = array(
				'break_point' => bstone_header_break_point(),    // Header Break Point.
			);

			wp_localize_script( 'bstone-theme-js', 'bstone', apply_filters( 'bstone_theme_js_localize', $bstone_localize ) );

			// Comment assets.
			if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
			}
		}

		/**
		 * Trim CSS
		 *
		 * @since 1.0.0
		 * @param string $css CSS content to trim.
		 * @return string
		 */
		static public function trim_css( $css = '' ) {

			// Trim white space for faster page loading.
			if ( ! empty( $css ) ) {
				$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
				$css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
				$css = str_replace( ', ', ',', $css );
			}

			return $css;
		}
	}
	
	new Bstone_Enqueue_Scripts();
}
