<?php
/**
 * WooCommerce Compatibility File.
 *
 * @link https://woocommerce.com/
 *
 * @package Bstone
 */

// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ) {
	return;
}

/**
 * Bstone WooCommerce Compatibility
 */
if ( ! class_exists( 'Bstone_Woocommerce' ) ) :
    /**
	 * Bstone WooCommerce Compatibility
	 *
	 * @since 1.1.6
	 */
	class Bstone_Woocommerce {

        /**
		 * Member Variable
		 *
		 * @var object instance
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
            require_once BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/bstone-shop-customizer.php';
            require_once BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/bstone-woocommerce-functions.php';

            add_filter( 'woocommerce_enqueue_styles', array( $this, 'woo_filter_style' ) );

            add_filter( 'bstone_theme_defaults', array( $this, 'theme_defaults' ) );

			add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );

			// Register Store Sidebars.
			add_action( 'widgets_init', array( $this, 'store_widgets_init' ), 15 );
			// Replace Store Sidebars.
			add_filter( 'bstone_get_sidebar', array( $this, 'replace_store_sidebar' ) );
			// Store Sidebar Layout.
			add_filter( 'bstone_page_layout', array( $this, 'store_sidebar_layout' ) );
			// Store Content Layout.
			add_filter( 'bstone_get_content_layout', array( $this, 'store_content_layout' ) );

			add_action( 'woocommerce_before_main_content', array( $this, 'before_main_content_start' ) );
			add_action( 'woocommerce_after_main_content', array( $this, 'before_main_content_end' ) );
			add_filter( 'wp_enqueue_scripts', array( $this, 'add_styles' ) );
			add_action( 'wp', array( $this, 'shop_customization' ), 5 );
			add_action( 'wp_head', array( $this, 'single_product_customization' ), 5 );
			add_action( 'wp', array( $this, 'woocommerce_init' ), 1 );
			add_action( 'init', array( $this, 'woocommerce_checkout' ) );
			add_action( 'wp', array( $this, 'shop_meta_option' ), 1 );
			add_action( 'wp', array( $this, 'output_related_products' ), 1 );
			add_action( 'wp', array( $this, 'output_upsells_products' ), 1 );
			add_action( 'wp', array( $this, 'cart_page_upselles' ) );

			add_filter( 'woocommerce_show_page_title' , array( $this, 'woo_hide_page_title' ) );
			add_action( 'wp', array( $this, 'bst_woo_shop_customizations' ) );

			add_filter( 'loop_shop_columns', array( $this, 'shop_columns' ) );
			add_filter( 'loop_shop_per_page', array( $this, 'shop_no_of_products' ) );
			add_filter( 'body_class', array( $this, 'shop_page_products_item_class' ) );
			add_filter( 'post_class', array( $this, 'single_product_class' ) );
			add_filter( 'woocommerce_product_get_rating_html', array( $this, 'rating_markup' ), 10, 3 );
			add_filter( 'woocommerce_output_related_products_args', array( $this, 'related_products_args' ) );

			add_filter( 'woocommerce_product_tabs', array( $this, 'bstone_sc_product_tabs' ) );

			add_filter( 'post_class', array( $this, 'single_product_page_class' ) );

			// Add Cart icon in Menu.
			add_filter( 'bstone_get_dynamic_header_content', array( $this, 'bstone_header_cart' ), 10, 3 );

			// Add Cart option in dropdown.
			add_filter( 'bstone_header_section_elements', array( $this, 'header_section_elements' ) );

			// Cart fragment.
			if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '2.3', '>=' ) ) {
				add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'cart_link_fragment' ) );
			} else {
				add_filter( 'add_to_cart_fragments', array( $this, 'cart_link_fragment' ) );
			}

			add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'product_flip_image' ), 10 );
			add_filter( 'woocommerce_subcategory_count_html', array( $this, 'subcategory_count_markup' ), 10, 2 );

			add_action( 'customize_register', array( $this, 'customize_register' ), 11 );

			add_filter( 'woocommerce_get_stock_html', 'bstone_woo_product_in_stock', 10, 2 );
			
		}

		/**
		 * Updates timestamp for global assets.
		 */
		public static function update_global_assets_timestamp() {

			$timestamp = time();

			if ( get_option( 'bst_global_assets_timestamp' ) !== false ) {
				
				update_option( 'bst_global_assets_timestamp', $timestamp );

			} else {

				add_option( 'bst_global_assets_timestamp', $timestamp );
			}
		}

		/**
		 * Takes the timestamp of the global assets. Creates if it's not yet created.
		 */
		public static function global_assets_timestamp() {

			$timestamp = time();

			if ( get_option( 'bst_global_assets_timestamp' ) !== false ) {

				$timestamp = get_option( 'bst_global_assets_timestamp' );

			} else {

				add_option( 'bst_global_assets_timestamp', $timestamp );
			}

			return $timestamp;
		}
		
		function demo_filter_woocommerce_get_image_size( array $size = array() ){
			$size = array(
				'width'  => '500',
				'height' => '400',
				'crop'   => 1
			);
			return $size;
		}

		/**
		 * Rating Markup
		 *
		 * @since 1.1.6
		 * @param  string $html  Rating Markup.
		 * @param  float  $rating Rating being shown.
		 * @param  int    $count  Total number of ratings.
		 * @return string
		 */
		function rating_markup( $html, $rating, $count ) {

			if ( 0 == $rating ) {
				$html  = '<div class="star-rating">';
				$html .= wc_get_star_rating_html( $rating, $count );
				$html .= '</div>';
			}
			return $html;
		}

		/**
		 * Cart Page Upselles products.
		 *
		 * @return void
		 */
		function cart_page_upselles() {

			$cross_sells_enabled = bstone_options( 'sh_cc_set_enable_cart_cross_sells' );
			if ( ! $cross_sells_enabled ) {
				remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			}
		}

        /**
		 * Load Woocommerce CSS Files
		 *
		 * @param  array $styles  Css files.
		 *
		 * @return array
		 */
		function woo_filter_style( $styles ) {

			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$css_uri = BSTONE_THEME_URI . 'assets/css/' . $dir_name . '/compatibility/woocommerce/';
			$key     = 'bstone-woocommerce';

			// Register & Enqueue Styles.
			// Generate CSS URL.
            $css_file = $css_uri . '' . $file_prefix . '.css';

			$styles = array(
				'woocommerce-layout'      => array(
					'src'     => $css_uri . 'woocommerce-layout' . $file_prefix . '.css',
					'deps'    => '',
					'version' => BSTONE_THEME_VERSION,
					'media'   => 'all',
					'has_rtl' => true,
				),
				'woocommerce-smallscreen' => array(
					'src'     => $css_uri . 'woocommerce-smallscreen' . $file_prefix . '.css',
					'deps'    => 'woocommerce-layout',
					'version' => BSTONE_THEME_VERSION,
					'media'   => 'only screen and (max-width: ' . apply_filters( 'woocommerce_style_smallscreen_breakpoint', '768px' ) . ')',
					'has_rtl' => true,
				),
				'woocommerce-general'     => array(
					'src'     => $css_uri . 'woocommerce' . $file_prefix . '.css',
					'deps'    => '',
					'version' => BSTONE_THEME_VERSION,
					'media'   => 'all',
					'has_rtl' => true,
				),
			);

			return $styles;
        }
        
        /**
		 * Subcategory Count Markup
		 *
		 * @param  mixed  $content  Count Markup.
		 * @param  object $category Object of Category.
		 * @return mixed
		 */
		function subcategory_count_markup( $content, $category ) {

			$content = sprintf( // WPCS: XSS OK.
					/* translators: 1: number of products */
					_nx( '<mark class="count">%1$s Product</mark>', '<mark class="count">%1$s Products</mark>', $category->count, 'product categories', 'bstone' ),
				number_format_i18n( $category->count )
			);

			return $content;
		}

		/**
		 * Product Flip Image
		 */
		function product_flip_image() {

			global $product;

			$hover_style = bstone_options( 'sh_pl_set_shop_hover_style' );

			if ( 'alternate' === $hover_style ) {

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {

					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo apply_filters( 'bstone_woocommerce_product_flip_image', wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-hover' ) ) );
				}
			}
		}

		/**
		 * Theme Defaults.
		 *
		 * @param array $defaults Array of options value.
		 * @return array
		 */
		function theme_defaults( $defaults ) {

			/**
			 * WooCommerce Shop Page Default Settings
			 */

			// Container.
			$defaults['sh_pl_set_woo_shop_layout'] 	 = 'plain-container';
			$defaults['sh_pp_set_woo_single_layout'] = 'default';

			// Sidebar.
			$defaults['sh_pl_set_woo_sidebar_layout']    	 = 'no-sidebar';
			$defaults['sh_pp_set_woo_single_sidebar_layout'] = 'default';

			/* Shop */
			$defaults['sh_pl_set_shop_grids']             = array(
				'desktop' => 4,
				'tablet'  => 3,
				'mobile'  => 2,
			);
			$defaults['sh_pl_set_num_of_products']     = '12';
			$defaults['sh_pl_set_shop_item_structure'] = array(
				'category',
				'title',
				'ratings',
				'price',
				'add_cart',
			);
			$defaults['sh_pl_set_shop_hover_style'] 	 = 'zoom';
			$defaults['sh_pl_set_shop_horizontal_space'] 	  = array(
				'desktop'      => 30,
				'tablet'       => 30,
				'mobile'       => 30,
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);			
			$defaults['sh_pl_set_shop_vertical_space'] 	  = array(
				'desktop'      => 30,
				'tablet'       => 30,
				'mobile'       => 30,
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_set_shop_content_align']    = 'center';
			
			$defaults['sh_pl_set_shop_title_section']     = true;
			$defaults['sh_pl_set_taxonomy_title_section'] = true;
			$defaults['sh_pl_set_shop_filter']     		  = true;

			/**
			 * Shop Styles
			 */
			$defaults['sh_pl_sty_cnt_content_width']        = 'default';
			$defaults['sh_pl_sty_cnt_content_width_custom'] = 1200;

			$defaults['sh_pl_sty_box_item_bg_color'] 	  = '#ffffff';
			$defaults['sh_pl_sty_box_item_border_color']  = 'rgba(0,0,0,0.05)';
			$defaults['sh_pl_sty_box_item_border_width']  = 1;
			$defaults['sh_pl_sty_box_item_border_radius'] = 0;
			
			$defaults['sh_pl_sty_box_itm_cnt_top_padding'] 	  = 0;
			$defaults['sh_pl_sty_box_itm_cnt_bottom_padding'] = 0;
			$defaults['sh_pl_sty_box_itm_cnt_left_padding']   = 0;
			$defaults['sh_pl_sty_box_itm_cnt_right_padding']  = 0;

			// Shop Filter
			$defaults['sh_pl_sty_filter_margin_bottom']    = 30;
			$defaults['sh_pl_sty_filter_item_count_color'] = '#797979';
			$defaults['sh_pl_sty_filter_text_color']	   = '#3a3a3a';
			$defaults['sh_pl_sty_filter_bg_color']		   = '#fafafa';
			$defaults['sh_pl_sty_filter_border_color']	   = '#e9e9e9';
			$defaults['sh_pl_sty_filter_font_family']	   = 'inherit';
			$defaults['sh_pl_sty_filter_font_weight']	   = 'inherit';
			$defaults['sh_pl_sty_filter_text_transform']   = '';
			$defaults['sh_pl_sty_filter_text_style'] 	   = 'normal';
			$defaults['sh_pl_sty_filter_font_size'] 	   = array(
				'desktop'      => 15,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);

			/* Product Title */
			$defaults['sh_pl_sty_title_color']  		= '#000000';
			$defaults['sh_pl_sty_title_font_family']    = 'inherit';
			$defaults['sh_pl_sty_title_font_weight']    = 'inherit';
			$defaults['sh_pl_sty_title_text_transform'] = '';
			$defaults['sh_pl_sty_title_text_style'] 	= 'normal';
			$defaults['sh_pl_sty_title_font_size'] 		= array(
				'desktop'      => 16,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_title_top_margin']    = 5;
			$defaults['sh_pl_sty_title_bottom_margin'] = 0;
			$defaults['sh_pl_sty_title_left_margin']   = 0;
			$defaults['sh_pl_sty_title_right_margin']  = 0;

			/* Product Description */
			$defaults['sh_pl_sty_desc_color']  		   = '#333333';
			$defaults['sh_pl_sty_desc_font_family']    = 'inherit';
			$defaults['sh_pl_sty_desc_font_weight']    = 'inherit';
			$defaults['sh_pl_sty_desc_text_transform'] = '';
			$defaults['sh_pl_sty_desc_text_style'] 	   = 'normal';
			$defaults['sh_pl_sty_desc_font_size'] 	   = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_desc_line_height']   = '';
			$defaults['sh_pl_sty_desc_top_margin']    = 0;
			$defaults['sh_pl_sty_desc_bottom_margin'] = 0;
			$defaults['sh_pl_sty_desc_left_margin']   = 0;
			$defaults['sh_pl_sty_desc_right_margin']  = 0;

			/* Product Category */
			$defaults['sh_pl_sty_cat_color']  		  = '#999999';
			$defaults['sh_pl_sty_cat_font_family']    = 'inherit';
			$defaults['sh_pl_sty_cat_font_weight']    = 'inherit';
			$defaults['sh_pl_sty_cat_text_transform'] = '';
			$defaults['sh_pl_sty_cat_text_style'] 	  = 'normal';
			$defaults['sh_pl_sty_cat_font_size'] 	  = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_cat_top_margin']    = 15;
			$defaults['sh_pl_sty_cat_bottom_margin'] = 0;
			$defaults['sh_pl_sty_cat_left_margin']   = 0;
			$defaults['sh_pl_sty_cat_right_margin']  = 0;

			/* Product Price */
			$defaults['sh_pl_sty_price_color']  		= '#333333';
			$defaults['sh_pl_sty_price_font_family']    = 'inherit';
			$defaults['sh_pl_sty_price_font_weight']    = 'inherit';
			$defaults['sh_pl_sty_price_text_transform'] = '';
			$defaults['sh_pl_sty_price_text_style'] 	= 'normal';
			$defaults['sh_pl_sty_price_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_price_top_margin']    = 0;
			$defaults['sh_pl_sty_price_bottom_margin'] = 0;
			$defaults['sh_pl_sty_price_left_margin']   = 0;
			$defaults['sh_pl_sty_price_right_margin']  = 0;

			/* Product Sale Price */
			$defaults['sh_pl_sty_sale_price_color']  		 = '#999999';
			$defaults['sh_pl_sty_sale_price_font_family']    = 'inherit';
			$defaults['sh_pl_sty_sale_price_font_weight']    = 'inherit';
			$defaults['sh_pl_sty_sale_price_text_transform'] = '';
			$defaults['sh_pl_sty_sale_price_text_style'] 	 = 'normal';
			$defaults['sh_pl_sty_sale_price_font_size'] 	 = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_sale_price_top_margin']    = 0;
			$defaults['sh_pl_sty_sale_price_bottom_margin'] = 0;
			$defaults['sh_pl_sty_sale_price_left_margin']   = 0;
			$defaults['sh_pl_sty_sale_price_right_margin']  = 0;

			/* Product Rating */
			$defaults['sh_pl_sty_rating_star_size']    		= 15;
			$defaults['sh_pl_sty_rating_star_color'] 		= '#FFC400';
			$defaults['sh_pl_sty_rating_active_star_color'] = '#FFC400';
			$defaults['sh_pl_sty_rating_top_margin']    	= 0;
			$defaults['sh_pl_sty_rating_bottom_margin'] 	= 0;
			$defaults['sh_pl_sty_rating_left_margin']   	= 0;
			$defaults['sh_pl_sty_rating_right_margin']  	= 0;

			/* Add to Cart Button Shop Page */
			$defaults['sh_pl_sty_cart_btn_txt_color']  	    = '#ffffff';
			$defaults['sh_pl_sty_cart_btn_bg_color']  	    = '#199EDA';
			$defaults['sh_pl_sty_cart_btn_brdr_color']      = '#199EDA';
			$defaults['sh_pl_sty_cart_btn_txt_color_hovr'] 	= '#ffffff';
			$defaults['sh_pl_sty_cart_btn_bg_color_hovr'] 	= '#1A3663';
			$defaults['sh_pl_sty_cart_btn_brdr_color_hovr'] = '#1A3663';
			$defaults['sh_pl_sty_cart_btn_font_family']     = 'inherit';
			$defaults['sh_pl_sty_cart_btn_font_weight']     = 'inherit';
			$defaults['sh_pl_sty_cart_btn_text_transform']  = '';
			$defaults['sh_pl_sty_cart_btn_text_style'] 	    = 'normal';
			$defaults['sh_pl_sty_cart_btn_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_cart_btn_brdr_width']     = 0;
			$defaults['sh_pl_sty_cart_btn_brdr_radius']    = 0;
			$defaults['sh_pl_sty_cart_btn_top_margin']     = 10;
			$defaults['sh_pl_sty_cart_btn_bottom_margin']  = 30;
			$defaults['sh_pl_sty_cart_btn_left_margin']    = 0;
			$defaults['sh_pl_sty_cart_btn_right_margin']   = 0;
			$defaults['sh_pl_sty_cart_btn_top_padding']    = 10;
			$defaults['sh_pl_sty_cart_btn_bottom_padding'] = 10;
			$defaults['sh_pl_sty_cart_btn_left_padding']   = 30;
			$defaults['sh_pl_sty_cart_btn_right_padding']  = 30;

			/* Sale Badge - Shop Page */
			$defaults['sh_pl_sty_sale_bdg_txt_color']  	    = '#ffffff';
			$defaults['sh_pl_sty_sale_bdg_bg_color']  	    = '#199EDA';
			$defaults['sh_pl_sty_sale_bdg_brdr_color']      = '#199EDA';			
			$defaults['sh_pl_sty_sale_bdg_font_family']     = 'inherit';
			$defaults['sh_pl_sty_sale_bdg_font_weight']     = 'inherit';
			$defaults['sh_pl_sty_sale_bdg_text_transform']  = '';
			$defaults['sh_pl_sty_sale_bdg_text_style'] 	    = 'normal';
			$defaults['sh_pl_sty_sale_bdg_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_sale_bdg_brdr_width']     = 0;
			$defaults['sh_pl_sty_sale_bdg_brdr_radius']    = 50;
			$defaults['sh_pl_sty_sale_bdg_top_margin']     = -8;
			$defaults['sh_pl_sty_sale_bdg_bottom_margin']  = 0;
			$defaults['sh_pl_sty_sale_bdg_left_margin']    = 0;
			$defaults['sh_pl_sty_sale_bdg_right_margin']   = -8;
			$defaults['sh_pl_sty_sale_bdg_top_padding']    = 2;
			$defaults['sh_pl_sty_sale_bdg_bottom_padding'] = 2;
			$defaults['sh_pl_sty_sale_bdg_left_padding']   = 8;
			$defaults['sh_pl_sty_sale_bdg_right_padding']  = 7;

			$defaults['sh_pl_sty_sale_bdg_position']	   = 'pos-top-right';
			$defaults['sh_pl_sty_sale_bdg_position_x']	   = 0;
			$defaults['sh_pl_sty_sale_bdg_position_y']	   = 0;

			/* Out of Stock Badge - Shop Page */
			$defaults['sh_pl_sty_out_stok_txt_color']  	    = '#aaaaaa';
			$defaults['sh_pl_sty_out_stok_bg_color']  	    = '';
			$defaults['sh_pl_sty_out_stok_brdr_color']      = '#aaaaaa';			
			$defaults['sh_pl_sty_out_stok_font_family']     = 'inherit';
			$defaults['sh_pl_sty_out_stok_font_weight']     = 'inherit';
			$defaults['sh_pl_sty_out_stok_text_transform']  = '';
			$defaults['sh_pl_sty_out_stok_text_style'] 	    = 'normal';
			$defaults['sh_pl_sty_out_stok_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pl_sty_out_stok_brdr_width']     = 0;
			$defaults['sh_pl_sty_out_stok_brdr_radius']    = 0;
			$defaults['sh_pl_sty_out_stok_top_margin']     = 0;
			$defaults['sh_pl_sty_out_stok_bottom_margin']  = 0;
			$defaults['sh_pl_sty_out_stok_left_margin']    = -65;
			$defaults['sh_pl_sty_out_stok_right_margin']   = 0;
			$defaults['sh_pl_sty_out_stok_top_padding']    = 5;
			$defaults['sh_pl_sty_out_stok_bottom_padding'] = 5;
			$defaults['sh_pl_sty_out_stok_left_padding']   = 20;
			$defaults['sh_pl_sty_out_stok_right_padding']  = 20;

			$defaults['sh_pl_sty_out_stok_position']	   = 'pos-bottom-center';
			$defaults['sh_pl_sty_out_stok_position_x']	   = 0;
			$defaults['sh_pl_sty_out_stok_position_y']	   = 10;

			 /* Item Shadow */
			$defaults['sh_pl_sty_box_item_shadow_x'] 	  = '';
			$defaults['sh_pl_sty_box_item_shadow_y'] 	  = '';
			$defaults['sh_pl_sty_box_item_shadow_blur']   = '';
			$defaults['sh_pl_sty_box_item_shadow_spread'] = '';
			$defaults['sh_pl_sty_box_item_shadow_inset']  = '';
			$defaults['sh_pl_sty_box_item_shadow_color']  = '';

			$defaults['sh_pl_sty_box_item_shadow_x_hover'] 	    = '';
			$defaults['sh_pl_sty_box_item_shadow_y_hover'] 	    = '';
			$defaults['sh_pl_sty_box_item_shadow_blur_hover']   = '';
			$defaults['sh_pl_sty_box_item_shadow_spread_hover'] = '';
			$defaults['sh_pl_sty_box_item_shadow_inset_hover']  = '';
			$defaults['sh_pl_sty_box_item_shadow_color_hover']  = '';

			/* Single Settings */
			$defaults['sh_pp_set_woo_product_layout']	   = 1;
			$defaults['sh_pp_set_product_main_structure']  = array(
				'title',
				'ratings',
				'price',
				'short_desc',
				'quantity',
				'add_cart',
				'meta',
			);
			$defaults['sh_pp_set_single_product_category']	 = true;
			$defaults['sh_pp_set_single_product_tags']	 	 = true;
			$defaults['sh_pp_set_single_product_sku']	 	 = true;

			$defaults['sh_pp_set_single_product_breadcrumb'] = true;
			$defaults['sh_pp_set_single_product_titlearea']  = true;
			$defaults['sh_pp_set_product_desc'] 			 = true;
			$defaults['sh_pp_set_product_review'] 			 = true;
			$defaults['sh_pp_set_product_additional_info'] 	 = true;
			$defaults['sh_pp_set_product_lightbox'] 		 = true;
			$defaults['sh_pp_set_product_zoom'] 		 	 = true;
			$defaults['sh_pp_set_related_products'] 		 = true;
			$defaults['sh_pp_set_upsells_products'] 		 = true;

			/**
			 * Single Styles
			 **/			
			$defaults['sh_pp_sty_playout_content_width'] 		= 'default';
			$defaults['sh_pp_sty_playout_content_width_custom'] = 1200;
			$defaults['sh_pp_sty_playout_top_padding'] 			= 50;
			$defaults['sh_pp_sty_playout_bottom_padding'] 		= 0;
			$defaults['sh_pp_sty_playout_left_padding'] 		= 0;
			$defaults['sh_pp_sty_playout_right_padding'] 		= 0;
			
			// Single Product Image Styles
			$defaults['sh_pp_sty_img_bg_color'] 	 	 = '';
			$defaults['sh_pp_sty_img_border_color'] 	 = '#ffffff';
			$defaults['sh_pp_sty_img_border_width'] 	 = 0;
			$defaults['sh_pp_sty_img_custom_size_toggle']= false;
			$defaults['sh_pp_sty_img_custom_size']		 = 'full';
			$defaults['sh_pp_sty_img_gallery_nav']		 = true;
			$defaults['sh_pp_sty_img_gnav_top']			 = 50;
			$defaults['sh_pp_sty_img_orientation'] 	 	 = 'horizontal';
			$defaults['sh_pp_sty_img_thumb_alignment'] 	 = 'left';
			$defaults['sh_pp_sty_img_top_margin']     	 = 0;
			$defaults['sh_pp_sty_img_bottom_margin']  	 = 30;
			$defaults['sh_pp_sty_img_left_margin']    	 = 0;
			$defaults['sh_pp_sty_img_right_margin']    	 = 0;

			$defaults['sh_pp_sty_gthumbs_img_width'] 	 = 25;
			$defaults['sh_pp_sty_gthumbs_img_spacing'] 	 = 0.5;

			// Single Product Title Styles
			$defaults['sh_pp_sty_title_color']  		= '#242424';
			$defaults['sh_pp_sty_title_font_family']    = 'Poppins';
			$defaults['sh_pp_sty_title_font_weight']    = '600';
			$defaults['sh_pp_sty_title_text_transform'] = '';
			$defaults['sh_pp_sty_title_text_style'] 	= 'normal';
			$defaults['sh_pp_sty_title_line_height']	= 1.3;
			$defaults['sh_pp_sty_title_font_size'] 		= array(
				'desktop'      => 34,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_title_top_margin']    = 0;
			$defaults['sh_pp_sty_title_bottom_margin'] = 10;
			$defaults['sh_pp_sty_title_left_margin']   = 0;
			$defaults['sh_pp_sty_title_right_margin']  = 0;

			// Single Product Regular Price Styles
			$defaults['sh_pp_sty_price_color']  		= '#2a2a2a';
			$defaults['sh_pp_sty_price_font_family']    = 'inherit';
			$defaults['sh_pp_sty_price_font_weight']    = 'inherit';
			$defaults['sh_pp_sty_price_text_transform'] = '';
			$defaults['sh_pp_sty_price_text_style'] 	= 'normal';
			$defaults['sh_pp_sty_price_font_size'] 		= array(
				'desktop'      => 22,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_price_top_margin']    = 0;
			$defaults['sh_pp_sty_price_bottom_margin'] = 0;
			$defaults['sh_pp_sty_price_left_margin']   = 0;
			$defaults['sh_pp_sty_price_right_margin']  = 0;

			// Single Product Sale Price Styles
			$defaults['sh_pp_sty_sale_price_color']  		 = 'rgba(0,0,0,0.3)';
			$defaults['sh_pp_sty_sale_price_font_family']    = 'inherit';
			$defaults['sh_pp_sty_sale_price_font_weight']    = 'inherit';
			$defaults['sh_pp_sty_sale_price_text_transform'] = '';
			$defaults['sh_pp_sty_sale_price_text_style'] 	 = 'normal';
			$defaults['sh_pp_sty_sale_price_font_size'] 	 = array(
				'desktop'      => 22,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_sale_price_top_margin']    = 0;
			$defaults['sh_pp_sty_sale_price_bottom_margin'] = 0;
			$defaults['sh_pp_sty_sale_price_left_margin']   = 0;
			$defaults['sh_pp_sty_sale_price_right_margin']  = 0;

			// Single Product Category Styles
			$defaults['sh_pp_sty_cat_title_color']	  = '#797979';
			$defaults['sh_pp_sty_cat_color']  		  = '#000000';
			$defaults['sh_pp_sty_cat_font_family']    = 'inherit';
			$defaults['sh_pp_sty_cat_font_weight']    = 'inherit';
			$defaults['sh_pp_sty_cat_text_transform'] = '';
			$defaults['sh_pp_sty_cat_text_style'] 	  = 'normal';
			$defaults['sh_pp_sty_cat_font_size'] 	  = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_cat_top_margin']     = 0;
			$defaults['sh_pp_sty_cat_bottom_margin']  = 0;
			$defaults['sh_pp_sty_cat_left_margin']    = 0;
			$defaults['sh_pp_sty_cat_right_margin']   = 0;

			// Single Product Tag Styles
			$defaults['sh_pp_sty_tags_title_color']	   = '#797979';
			$defaults['sh_pp_sty_tags_color']  		   = '#000000';
			$defaults['sh_pp_sty_tags_font_family']    = 'inherit';
			$defaults['sh_pp_sty_tags_font_weight']    = 'inherit';
			$defaults['sh_pp_sty_tags_text_transform'] = '';
			$defaults['sh_pp_sty_tags_text_style'] 	   = 'normal';
			$defaults['sh_pp_sty_tags_font_size'] 	   = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_tags_top_margin']     = 0;
			$defaults['sh_pp_sty_tags_bottom_margin']  = 0;
			$defaults['sh_pp_sty_tags_left_margin']    = 0;
			$defaults['sh_pp_sty_tags_right_margin']   = 0;

			/* Add to Cart Button Single Product Page */
			$defaults['sh_pp_sty_cart_btn_full_width']  	= false;
			$defaults['sh_pp_sty_cart_btn_txt_color']  	    = '#ffffff';
			$defaults['sh_pp_sty_cart_btn_bg_color']  	    = '#199EDA';
			$defaults['sh_pp_sty_cart_btn_brdr_color']      = '#199EDA';
			$defaults['sh_pp_sty_cart_btn_txt_color_hovr'] 	= '#ffffff';
			$defaults['sh_pp_sty_cart_btn_bg_color_hovr'] 	= '#1A3663';
			$defaults['sh_pp_sty_cart_btn_brdr_color_hovr'] = '#1A3663';
			$defaults['sh_pp_sty_cart_btn_font_family']     = 'inherit';
			$defaults['sh_pp_sty_cart_btn_font_weight']     = 'inherit';
			$defaults['sh_pp_sty_cart_btn_text_transform']  = '';
			$defaults['sh_pp_sty_cart_btn_text_style'] 	    = 'normal';
			$defaults['sh_pp_sty_cart_btn_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_cart_btn_brdr_width']     = 0;
			$defaults['sh_pp_sty_cart_btn_brdr_radius']    = 0;
			$defaults['sh_pp_sty_cart_btn_top_margin']     = 0;
			$defaults['sh_pp_sty_cart_btn_bottom_margin']  = 0;
			$defaults['sh_pp_sty_cart_btn_left_margin']    = 0;
			$defaults['sh_pp_sty_cart_btn_right_margin']   = 0;
			$defaults['sh_pp_sty_cart_btn_top_padding']    = 18;
			$defaults['sh_pp_sty_cart_btn_bottom_padding'] = 18;
			$defaults['sh_pp_sty_cart_btn_left_padding']   = 30;
			$defaults['sh_pp_sty_cart_btn_right_padding']  = 30;

			// Single Product SKU 
			$defaults['sh_pp_sty_sku_title_color']     = '#797979';
			$defaults['sh_pp_sty_sku_color']  		   = '#000000';
			$defaults['sh_pp_sty_sku_font_family']     = 'inherit';
			$defaults['sh_pp_sty_sku_font_weight']     = 'inherit';
			$defaults['sh_pp_sty_sku_text_transform']  = '';
			$defaults['sh_pp_sty_sku_text_style'] 	   = 'normal';
			$defaults['sh_pp_sty_sku_font_size'] 	   = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_sku_top_margin']     = 0;
			$defaults['sh_pp_sty_sku_bottom_margin']  = 0;
			$defaults['sh_pp_sty_sku_left_margin']    = 0;
			$defaults['sh_pp_sty_sku_right_margin']   = 0;

			// Single Product Short Description Styles
			$defaults['sh_pp_sty_desc_color']  		   = '#000000';
			$defaults['sh_pp_sty_desc_bg_color']  	   = '';
			$defaults['sh_pp_sty_desc_font_family']    = 'inherit';
			$defaults['sh_pp_sty_desc_font_weight']    = 'inherit';
			$defaults['sh_pp_sty_desc_text_transform'] = '';
			$defaults['sh_pp_sty_desc_text_style'] 	   = 'normal';
			$defaults['sh_pp_sty_desc_font_size'] 	   = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_desc_top_padding']    = 0;
			$defaults['sh_pp_sty_desc_bottom_padding'] = 0;
			$defaults['sh_pp_sty_desc_left_padding']   = 0;
			$defaults['sh_pp_sty_desc_right_padding']  = 0;
			$defaults['sh_pp_sty_desc_top_margin']     = 10;
			$defaults['sh_pp_sty_desc_bottom_margin']  = 20;
			$defaults['sh_pp_sty_desc_left_margin']    = 0;
			$defaults['sh_pp_sty_desc_right_margin']   = 0;

			// Single Product Variations Styles
			$defaults['sh_pp_sty_var_label_color']     = '#222222';
			$defaults['sh_pp_sty_var_txt_color']  	   = '#222222';
			$defaults['sh_pp_sty_var_clear_color']     = '#797979';
			$defaults['sh_pp_sty_var_bg_color']  	   = '#ffffff';
			$defaults['sh_pp_sty_var_brdr_color']      = '#e3e3e3';
			$defaults['sh_pp_sty_var_brdr_width']      = 1;
			$defaults['sh_pp_sty_var_seprator_color']  = '#e3e3e3';
			$defaults['sh_pp_sty_var_seprator_width']  = 1;
			$defaults['sh_pp_sty_var_fields_height']   = 40;
			$defaults['sh_pp_sty_var_font_family']     = 'inherit';
			$defaults['sh_pp_sty_var_font_weight']     = 'inherit';
			$defaults['sh_pp_sty_var_label_transform'] = '';
			$defaults['sh_pp_sty_var_text_transform']  = '';
			$defaults['sh_pp_sty_var_clear_transform'] = '';
			$defaults['sh_pp_sty_var_text_style'] 	   = 'normal';
			$defaults['sh_pp_sty_var_font_size'] 	   = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_var_top_margin']     = 0;
			$defaults['sh_pp_sty_var_bottom_margin']  = 15;
			$defaults['sh_pp_sty_var_left_margin']    = 0;
			$defaults['sh_pp_sty_var_right_margin']   = 0;

			// Single Product Quantity Styles
			$defaults['sh_pp_sty_qty_color']  		  = '#222222';
			$defaults['sh_pp_sty_qty_bg_color']  	  = '#ffffff';
			$defaults['sh_pp_sty_qty_border_color']   = '#e3e3e3';
			$defaults['sh_pp_sty_qty_brdr_width']     = 1;
			$defaults['sh_pp_sty_qty_field_width']    = 80;
			$defaults['sh_pp_sty_qty_field_height']   = 50;
			$defaults['sh_pp_sty_qty_font_family']    = 'inherit';
			$defaults['sh_pp_sty_qty_font_weight']    = 'inherit';
			$defaults['sh_pp_sty_qty_text_transform'] = '';
			$defaults['sh_pp_sty_qty_text_style'] 	  = 'normal';
			$defaults['sh_pp_sty_qty_font_size'] 	  = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_qty_top_margin']     = 0;
			$defaults['sh_pp_sty_qty_bottom_margin']  = 0;
			$defaults['sh_pp_sty_qty_left_margin']    = 0;
			$defaults['sh_pp_sty_qty_right_margin']   = 15;

			/* Single Product Sale Badge */
			$defaults['sh_pp_sty_sale_bdg_txt_color']  	    = '#ffffff';
			$defaults['sh_pp_sty_sale_bdg_bg_color']  	    = '#199EDA';
			$defaults['sh_pp_sty_sale_bdg_brdr_color']      = '#199EDA';			
			$defaults['sh_pp_sty_sale_bdg_font_family']     = 'inherit';
			$defaults['sh_pp_sty_sale_bdg_font_weight']     = 'inherit';
			$defaults['sh_pp_sty_sale_bdg_text_transform']  = '';
			$defaults['sh_pp_sty_sale_bdg_text_style'] 	    = 'normal';
			$defaults['sh_pp_sty_sale_bdg_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_sale_bdg_brdr_width']     = 0;
			$defaults['sh_pp_sty_sale_bdg_brdr_radius']    = 50;
			$defaults['sh_pp_sty_sale_bdg_top_margin']     = 10;
			$defaults['sh_pp_sty_sale_bdg_bottom_margin']  = 0;
			$defaults['sh_pp_sty_sale_bdg_left_margin']    = 15;
			$defaults['sh_pp_sty_sale_bdg_right_margin']   = 0;
			$defaults['sh_pp_sty_sale_bdg_top_padding']    = 6;
			$defaults['sh_pp_sty_sale_bdg_bottom_padding'] = 6;
			$defaults['sh_pp_sty_sale_bdg_left_padding']   = 12;
			$defaults['sh_pp_sty_sale_bdg_right_padding']  = 12;

			/* Single Product Out of Stock Badge */
			$defaults['sh_pp_sty_out_stok_txt_color']  	    = '#aaaaaa';
			$defaults['sh_pp_sty_out_stok_bg_color']  	    = '';
			$defaults['sh_pp_sty_out_stok_brdr_color']      = '#aaaaaa';			
			$defaults['sh_pp_sty_out_stok_font_family']     = 'inherit';
			$defaults['sh_pp_sty_out_stok_font_weight']     = 'inherit';
			$defaults['sh_pp_sty_out_stok_text_transform']  = '';
			$defaults['sh_pp_sty_out_stok_text_style'] 	    = 'normal';
			$defaults['sh_pp_sty_out_stok_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_out_stok_brdr_width']     = 2;
			$defaults['sh_pp_sty_out_stok_brdr_radius']    = 0;
			$defaults['sh_pp_sty_out_stok_top_margin']     = 10;
			$defaults['sh_pp_sty_out_stok_bottom_margin']  = 10;
			$defaults['sh_pp_sty_out_stok_left_margin']    = 0;
			$defaults['sh_pp_sty_out_stok_right_margin']   = 0;
			$defaults['sh_pp_sty_out_stok_top_padding']    = 10;
			$defaults['sh_pp_sty_out_stok_bottom_padding'] = 10;
			$defaults['sh_pp_sty_out_stok_left_padding']   = 25;
			$defaults['sh_pp_sty_out_stok_right_padding']  = 25;

			/* Product Rating */
			$defaults['sh_pp_sty_rating_star_size']    		= 15;
			$defaults['sh_pp_sty_rating_star_color'] 		= '#FFC400';
			$defaults['sh_pp_sty_rating_active_star_color'] = '#FFC400';			
			$defaults['sh_pp_sty_rating_txt_color']  	    = '#aaaaaa';
			$defaults['sh_pp_sty_rating_text_line_height'] 	= 1.80;
			$defaults['sh_pp_sty_rating_font_family']       = 'inherit';
			$defaults['sh_pp_sty_rating_font_weight']       = 'inherit';
			$defaults['sh_pp_sty_rating_text_transform']    = '';
			$defaults['sh_pp_sty_rating_text_style'] 	    = 'normal';
			$defaults['sh_pp_sty_rating_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_pp_sty_rating_top_margin']    	= 0;
			$defaults['sh_pp_sty_rating_bottom_margin'] 	= 0;
			$defaults['sh_pp_sty_rating_left_margin']   	= 0;
			$defaults['sh_pp_sty_rating_right_margin']  	= 0;
			
			// Single Product Tabs			
			$defaults['sh_pp_sty_tabs_acbrdr_color']     = '#3A3A3A';
			$defaults['sh_pp_sty_tabs_divider_color']    = '#ebebeb';
			$defaults['sh_pp_sty_tabs_bg_color']         = '#ffffff';
			$defaults['sh_pp_sty_tabs_active_bg_color']  = '#ffffff';
			$defaults['sh_pp_sty_tabs_txt_color']		 = '#515151';
			$defaults['sh_pp_sty_tabs_active_txt_color'] = '#79798F';
			$defaults['sh_pp_sty_tabs_font_family']      = 'inherit';
			$defaults['sh_pp_sty_tabs_font_weight']    	 = 700;
			$defaults['sh_pp_sty_tabs_text_transform']   = '';
			$defaults['sh_pp_sty_tabs_text_style']    	 = 'normal';
			$defaults['sh_pp_sty_tabs_font_size']    	 = array(
				'desktop'      => 16,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			
			$defaults['sh_pp_sty_tabs_top_padding']    = 10;
			$defaults['sh_pp_sty_tabs_bottom_padding'] = 10;
			$defaults['sh_pp_sty_tabs_left_padding']   = 0;
			$defaults['sh_pp_sty_tabs_right_padding']  = 0;
			
			$defaults['sh_pp_sty_tabs_top_margin']    = 50;
			$defaults['sh_pp_sty_tabs_bottom_margin'] = 0;
			$defaults['sh_pp_sty_tabs_left_margin']   = 0;
			$defaults['sh_pp_sty_tabs_right_margin']  = 0;

			// Single Product Upsells and Related Products Heading
			$defaults['sh_pp_sty_rup_heading_color']  = '#242424';
			$defaults['sh_pp_sty_rup_font_family']    = 'inherit';
			$defaults['sh_pp_sty_rup_font_weight']    = 'bold';
			$defaults['sh_pp_sty_rup_text_transform'] = '';
			$defaults['sh_pp_sty_rup_text_style']     = 'normal';
			$defaults['sh_pp_sty_rup_font_size']      = array(
				'desktop'      => 24,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			
			$defaults['sh_pp_sty_rup_top_margin']    = 0;
			$defaults['sh_pp_sty_rup_bottom_margin'] = 10;
			$defaults['sh_pp_sty_rup_left_margin']   = 0;
			$defaults['sh_pp_sty_rup_right_margin']  = 0;

			/**
			 * Cart & Checkout
			 **/
			$defaults['sh_cc_set_enable_cart_cross_sells'] = true;
			$defaults['sh_cc_set_cart_title_section']     = true;
			$defaults['sh_cc_set_checkout_title_section'] = true;
			$defaults['sh_cc_set_account_title_section']  = true;
			$defaults['sh_cc_set_cross_sells_full_width']  = false;
			$defaults['sh_cc_set_cross_sells_num']		   = 2;

			// CC Section Heading
			$defaults['sh_cc_sty_shead_text_color']		= '#383838';
			$defaults['sh_cc_sty_shead_font_family']	= 'inherit';
			$defaults['sh_cc_sty_shead_font_weight']	= 'bold';
			$defaults['sh_cc_sty_shead_text_transform'] = '';
			$defaults['sh_cc_sty_shead_text_style']		= 'normal';
			$defaults['sh_cc_sty_shead_font_size'] 	    = array(
				'desktop'      => 18,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_cc_sty_shead_top_padding']  	= 10;
			$defaults['sh_cc_sty_shead_bottom_padding'] = 10;
			$defaults['sh_cc_sty_shead_left_padding']   = 10;
			$defaults['sh_cc_sty_shead_right_padding']  = 0;

			// CC Field Label
			$defaults['sh_cc_sty_label_text_color']		= '#383838';
			$defaults['sh_cc_sty_label_font_family']	= 'inherit';
			$defaults['sh_cc_sty_label_font_weight']	= 'inherit';
			$defaults['sh_cc_sty_label_text_transform'] = '';
			$defaults['sh_cc_sty_label_text_style']		= 'normal';
			$defaults['sh_cc_sty_label_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_cc_sty_label_top_padding']  	= 0;
			$defaults['sh_cc_sty_label_bottom_padding'] = 5;
			$defaults['sh_cc_sty_label_left_padding']   = 0;
			$defaults['sh_cc_sty_label_right_padding']  = 0;

			// CC Field
			$defaults['sh_cc_sty_field_text_color']		= '#383838';
			$defaults['sh_cc_sty_field_bg_color']		= '#ffffff';
			$defaults['sh_cc_sty_field_brdr_color']		= '#d5d8de';
			$defaults['sh_cc_sty_field_text_color_fcs'] = '#888888';
			$defaults['sh_cc_sty_field_bg_color_fcs']   = '#ffffff';
			$defaults['sh_cc_sty_field_brdr_color_fcs'] = '#babcc1';
			$defaults['sh_cc_sty_field_brdr_width']     = 1;
			$defaults['sh_cc_sty_field_brdr_radius']    = 0;
			$defaults['sh_cc_sty_field_font_family']	= 'inherit';
			$defaults['sh_cc_sty_field_font_weight']	= 'inherit';
			$defaults['sh_cc_sty_field_text_transform'] = '';
			$defaults['sh_cc_sty_field_text_style']		= 'normal';
			$defaults['sh_cc_sty_field_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_cc_sty_field_top_padding']  	= 8;
			$defaults['sh_cc_sty_field_bottom_padding'] = 7;
			$defaults['sh_cc_sty_field_left_padding']   = 12;
			$defaults['sh_cc_sty_field_right_padding']  = 12;
			$defaults['sh_cc_sty_field_top_margin']  	= 0;
			$defaults['sh_cc_sty_field_bottom_margin']  = 0;
			$defaults['sh_cc_sty_field_left_margin']    = 0;
			$defaults['sh_cc_sty_field_right_margin']   = 0;

			// CC Button Styles
			$defaults['sh_cc_sty_button_txt_color']  	  = '#ffffff';
			$defaults['sh_cc_sty_button_bg_color']  	  = '#199EDA';
			$defaults['sh_cc_sty_button_brdr_color']      = '#199EDA';
			$defaults['sh_cc_sty_button_txt_color_hovr']  = '#ffffff';
			$defaults['sh_cc_sty_button_bg_color_hovr']   = '#1A3663';
			$defaults['sh_cc_sty_button_brdr_color_hovr'] = '#1A3663';
			$defaults['sh_cc_sty_button_font_family']     = 'inherit';
			$defaults['sh_cc_sty_button_font_weight']     = 'inherit';
			$defaults['sh_cc_sty_button_text_transform']  = '';
			$defaults['sh_cc_sty_button_text_style'] 	  = 'normal';
			$defaults['sh_cc_sty_button_font_size'] 	  = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_cc_sty_button_brdr_width']     = 0;
			$defaults['sh_cc_sty_button_brdr_radius']    = 0;
			$defaults['sh_cc_sty_button_top_margin']     = 0;
			$defaults['sh_cc_sty_button_bottom_margin']  = 0;
			$defaults['sh_cc_sty_button_left_margin']    = 0;
			$defaults['sh_cc_sty_button_right_margin']   = 0;
			$defaults['sh_cc_sty_button_top_padding']    = 10;
			$defaults['sh_cc_sty_button_bottom_padding'] = 10;
			$defaults['sh_cc_sty_button_left_padding']   = 30;
			$defaults['sh_cc_sty_button_right_padding']  = 30;

			// CC Update Button Styles
			$defaults['sh_cc_sty_update_button_txt_color']  	 = '#ffffff';
			$defaults['sh_cc_sty_update_button_bg_color']  	   	 = '#02AD88';
			$defaults['sh_cc_sty_update_button_brdr_color']      = '#02AD88';
			$defaults['sh_cc_sty_update_button_txt_color_hovr']  = '#9b9eae';
			$defaults['sh_cc_sty_update_button_bg_color_hovr']   = 'rgba(0,0,0,0)';
			$defaults['sh_cc_sty_update_button_brdr_color_hovr'] = '#c8cad9';
			$defaults['sh_cc_sty_update_button_font_family']     = 'inherit';
			$defaults['sh_cc_sty_update_button_font_weight']     = 'inherit';
			$defaults['sh_cc_sty_update_button_text_transform']  = '';
			$defaults['sh_cc_sty_update_button_text_style'] 	 = 'normal';
			$defaults['sh_cc_sty_update_button_font_size'] 	   	 = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_cc_sty_update_button_brdr_width']     = 1;
			$defaults['sh_cc_sty_update_button_brdr_radius']    = 0;
			$defaults['sh_cc_sty_update_button_top_margin']     = 0;
			$defaults['sh_cc_sty_update_button_bottom_margin']  = 0;
			$defaults['sh_cc_sty_update_button_left_margin']    = 0;
			$defaults['sh_cc_sty_update_button_right_margin']   = 27;
			$defaults['sh_cc_sty_update_button_top_padding']    = 13;
			$defaults['sh_cc_sty_update_button_bottom_padding'] = 13;
			$defaults['sh_cc_sty_update_button_left_padding']   = 30;
			$defaults['sh_cc_sty_update_button_right_padding']  = 30;

			// CC Thumbnail Styles
			$defaults['sh_cc_sty_thumb_show_thumb']    = true;
			$defaults['sh_cc_sty_thumb_brdr_color']    = '#cfd1d5';
			$defaults['sh_cc_sty_thumb_brdr_width']    = 1;
			$defaults['sh_cc_sty_thumb_brdr_radius']   = 0;
			$defaults['sh_cc_sty_thumb_top_margin']    = 0;
			$defaults['sh_cc_sty_thumb_bottom_margin'] = 0;
			$defaults['sh_cc_sty_thumb_left_margin']   = 0;
			$defaults['sh_cc_sty_thumb_right_margin']  = 0;

			// Order Summry
			$defaults['sh_cc_sty_osmry_remove_btn_color'] 		= '#cccccc';
			$defaults['sh_cc_sty_osmry_remove_btn_color_hover'] = '#3a3a3a';
			$defaults['sh_cc_sty_osmry_table_head_bg_color'] 	= '#fbfbfb';
			$defaults['sh_cc_sty_osmry_table_head_text_color'] 	= '#797979';
			$defaults['sh_cc_sty_osmry_table_text_color'] 		= '#797979';
			$defaults['sh_cc_sty_osmry_ptitle_color']     		= '#3a3a3a';
			$defaults['sh_cc_sty_osmry_ptitle_hover_color']     = '#199EDA';

			// Others
			$defaults['sh_cc_sty_others_border_color']   = '#ebebeb';
			$defaults['sh_cc_sty_others_divider_color']  = '#ebebeb';
			$defaults['sh_cc_sty_others_divider_height'] = 1;
			$defaults['sh_cc_sty_others_chk_order_brdr_width']    = 2;
			$defaults['sh_cc_sty_others_payment_box_bg_color']    = '#efefef';
			$defaults['sh_cc_sty_others_payment_box_text_color']  = '#515151';
			$defaults['sh_cc_sty_others_payment_box_line_height'] = 1.5;

			/**
			 * Mini Cart
			 */
			$defaults['sh_mc_sty_icon_color']       = '#199EDA';
			$defaults['sh_mc_sty_icon_color_hover'] = '#199EDA';
			$defaults['sh_mc_sty_icon_color_text']  = '#ffffff';

			$defaults['sh_mc_sty_icon_margin_left']  = 0;
			$defaults['sh_mc_sty_icon_margin_right'] = 0;

			$defaults['sh_mc_sty_container_bg_color'] 	   = '#ffffff';
			$defaults['sh_mc_sty_container_border_color']  = '#e6e6e6';
			$defaults['sh_mc_sty_container_border_width']  = 2;
			$defaults['sh_mc_sty_container_border_radius'] = 0;
			$defaults['sh_mc_sty_container_position'] 	   = 'right';

			// View Cart Button
			$defaults['sh_mc_sty_view_txt_color']       = '#ffffff';
			$defaults['sh_mc_sty_view_txt_color_hovr']  = '#ffffff';
			$defaults['sh_mc_sty_view_bg_color']  	    = '#199eda';
			$defaults['sh_mc_sty_view_bg_color_hovr']   = '#393A3B';
			$defaults['sh_mc_sty_view_brdr_color']      = '#199eda';
			$defaults['sh_mc_sty_view_brdr_color_hovr'] = '#393A3B';
			$defaults['sh_mc_sty_view_font_family']     = 'inherit';
			$defaults['sh_mc_sty_view_font_weight']     = 'inherit';
			$defaults['sh_mc_sty_view_text_transform']  = '';
			$defaults['sh_mc_sty_view_text_style'] 	    = 'normal';
			$defaults['sh_mc_sty_view_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_mc_sty_view_brdr_width'] 		= 0;
			$defaults['sh_mc_sty_view_brdr_radius'] 	= 0;
			$defaults['sh_mc_sty_view_top_margin']      = 0;
			$defaults['sh_mc_sty_view_bottom_margin']   = 10;
			$defaults['sh_mc_sty_view_left_margin']     = 0;
			$defaults['sh_mc_sty_view_right_margin']    = 0;
			$defaults['sh_mc_sty_view_top_padding']     = 10;
			$defaults['sh_mc_sty_view_bottom_padding']  = 10;
			$defaults['sh_mc_sty_view_left_padding']    = 30;
			$defaults['sh_mc_sty_view_right_padding']   = 30;

			// Checkout Button
			$defaults['sh_mc_sty_checkout_txt_color']       = '#ffffff';
			$defaults['sh_mc_sty_checkout_txt_color_hovr']  = '#ffffff';
			$defaults['sh_mc_sty_checkout_bg_color']  	    = '#393A3B';
			$defaults['sh_mc_sty_checkout_bg_color_hovr']   = '#000000';
			$defaults['sh_mc_sty_checkout_brdr_color']      = '#393A3B';
			$defaults['sh_mc_sty_checkout_brdr_color_hovr'] = '#000000';
			$defaults['sh_mc_sty_checkout_font_family']     = 'inherit';
			$defaults['sh_mc_sty_checkout_font_weight']     = 'inherit';
			$defaults['sh_mc_sty_checkout_text_transform']  = '';
			$defaults['sh_mc_sty_checkout_text_style'] 	    = 'normal';
			$defaults['sh_mc_sty_checkout_font_size'] 	    = array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);
			$defaults['sh_mc_sty_checkout_brdr_width'] 		= 0;
			$defaults['sh_mc_sty_checkout_brdr_radius'] 	= 0;
			$defaults['sh_mc_sty_checkout_top_margin']      = 0;
			$defaults['sh_mc_sty_checkout_bottom_margin']   = 0;
			$defaults['sh_mc_sty_checkout_left_margin']     = 0;
			$defaults['sh_mc_sty_checkout_right_margin']    = 0;
			$defaults['sh_mc_sty_checkout_top_padding']     = 10;
			$defaults['sh_mc_sty_checkout_bottom_padding']  = 10;
			$defaults['sh_mc_sty_checkout_left_padding']    = 30;
			$defaults['sh_mc_sty_checkout_right_padding']   = 30;

			// Remove Button
			$defaults['sh_mc_sty_remove_btn_color']       = '#cccccc';
			$defaults['sh_mc_sty_remove_btn_color_hover'] = '#199eda';
			$defaults['sh_mc_sty_remove_btn_font_size']	  = 18;
			$defaults['sh_mc_sty_remove_btn_line_height'] = 1.3;

			// Mini Cart Content
			$defaults['sh_mc_sty_content_ptitle_line_height'] 	 	= 1.3;
			$defaults['sh_mc_sty_content_ptitle_margin_bottom']  	= 0;
			$defaults['sh_mc_sty_content_ptitle_margin_top']  	 	= 0;
			$defaults['sh_mc_sty_content_cart_item_padding_bottom'] = 0;
			$defaults['sh_mc_sty_content_text_color']       	 	= '#3a3a3a';
			$defaults['sh_mc_sty_content_subtotal_color'] 		 	= '#199EDA';
			$defaults['sh_mc_sty_content_subtotal_border_color'] 	= '#e2e2e2';
			$defaults['sh_mc_sty_content_ptitle_color'] 	     	= '#3a3a3a';
			$defaults['sh_mc_sty_content_ptitle_color_hover'] 	 	= '#199EDA';
			$defaults['sh_mc_sty_content_divider_color'] 	  	 	= '#eaeaea';
			$defaults['sh_mc_sty_content_font_family']     		 	= 'inherit';
			$defaults['sh_mc_sty_content_font_weight']     		 	= 'inherit';
			$defaults['sh_mc_sty_content_text_transform']  		 	= '';
			$defaults['sh_mc_sty_content_text_style'] 	    	 	= 'normal';
			$defaults['sh_mc_sty_content_font_size'] 	    	 	= array(
				'desktop'      => 14,
				'tablet'       => '',
				'mobile'       => '',
				'desktop-unit' => 'px',
				'tablet-unit'  => 'px',
				'mobile-unit'  => 'px',
			);

			return $defaults;
		}

		/**
		 * Update Shop page grid
		 *
		 * @param  int $col Shop Column.
		 * @return int
		 */
		function shop_columns( $col ) {

			$col = bstone_options( 'sh_pl_set_shop_grids' );
			return $col['desktop'];
		}

		/**
		 * Update Shop page grid
		 *
		 * @return int
		 */
		function shop_no_of_products() {
			$products = bstone_options( 'sh_pl_set_num_of_products' );
			return $products;
		}

		/**
		 * Add products item class on shop page
		 *
		 * @param Array $classes product classes.
		 *
		 * @return array.
		 */
		function shop_page_products_item_class( $classes = '' ) {

			if ( is_shop() || is_product_taxonomy() ) {
				$shop_grid = bstone_options( 'sh_pl_set_shop_grids' );
				$classes[] = 'columns-' . $shop_grid['desktop'];
				$classes[] = 'tablet-columns-' . $shop_grid['tablet'];
				$classes[] = 'mobile-columns-' . $shop_grid['mobile'];

				$classes[] = 'bst-woo-shop-archive';
			}
			// Cart menu is emabled.
			$rt_section   = bstone_options( 'header-main-rt-section' );
			$rt_section_2 = bstone_options( 'header-main-rt-section-2' );

			if ( 'woocommerce' === $rt_section || 'woocommerce' === $rt_section_2 ) {
				$classes[] = 'bst-woocommerce-cart-menu';
			}

			if ( is_product() ) {				
				$classes[] = 'bst-woo-single-layout-'.bstone_options( 'sh_pp_set_woo_product_layout' );
			}

			return $classes;
		}

		/**
		 * Add class on single product page
		 */
		function single_product_page_class( $classes ) {

			if ( is_product() ) {
				$classes[] = 'bst-product-orientation-' . bstone_options( 'sh_pp_sty_img_orientation' );
			}

			return $classes;
		}

		/**
		 * Add class on single product page
		 *
		 * @param Array $classes product classes.
		 *
		 * @return array.
		 */
		function single_product_class( $classes ) {

			if ( is_product() && 0 == get_post_meta( get_the_ID(), '_wc_review_count', true ) ) {
				$classes[] = 'bst-woo-product-no-review';
			}

			if ( is_shop() || is_product_taxonomy() || is_page() ) {
				$hover_style = bstone_options( 'sh_pl_set_shop_hover_style' );

				if ( '' !== $hover_style ) {
					$classes[] = 'bstone-woo-hover-' . $hover_style;
				}
			}

			return $classes;
		}

		/**
		 * Update woocommerce related product numbers
		 *
		 * @param  array $args Related products array.
		 * @return array
		 */
		function related_products_args( $args ) {

			$col                    = bstone_options( 'sh_pl_set_shop_grids' );
			$args['posts_per_page'] = $col['desktop'];
			return $args;
		}

		/**
		 * Setup theme
		 *
		 * @since 1.1.6
		 */
		function setup_theme() {

			// WooCommerce.

			if ( true === bstone_options( 'sh_pp_set_product_zoom' ) ) {
				add_theme_support( 'wc-product-gallery-zoom' );
			}

			if ( true === bstone_options( 'sh_pp_set_product_lightbox' ) ) {
				add_theme_support( 'wc-product-gallery-lightbox' );
			}
			
			add_theme_support( 'wc-product-gallery-slider' );
		}

		/**
		 * Store widgets init.
		 */
		function store_widgets_init() {
			register_sidebar(
				array(
					'name'          => esc_html__( 'WooCommerce Sidebar', 'bstone' ),
					'id'            => 'bstone-woo-shop-sidebar',
					'description'   => __( 'This sidebar will be used on Product archive, Cart, Checkout and My Account pages.', 'bstone' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
			register_sidebar(
				array(
					'name'          => esc_html__( 'Product Sidebar', 'bstone' ),
					'id'            => 'bstone-woo-single-sidebar',
					'description'   => __( 'This sidebar will be used on Single Product page.', 'bstone' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s">',
					'after_widget'  => '</div>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}

		/**
		 * Bst Woo Shop Customizer Customizations
		 */
		function bst_woo_shop_customizations() {
			if ( is_shop() ) {
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
				
				if( false === bstone_options( 'sh_pl_set_shop_title_section' ) ) {
					remove_action( 'bstone_single_header', 'bstone_single_post_page_header', 10 );
				}

				if( false === bstone_options( 'sh_pl_set_shop_filter' ) ) {
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
				}
				
			} else if( is_product_taxonomy() ) {
				remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
				
				if( false === bstone_options( 'sh_pl_set_taxonomy_title_section' ) ) {
					remove_action( 'bstone_single_header', 'bstone_single_post_page_header', 10 );
				}

				if( false === bstone_options( 'sh_pl_set_shop_filter' ) ) {
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
					remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
				}

			} else if( is_cart() ) {
				
				if( false === bstone_options( 'sh_cc_set_cart_title_section' ) ) {
					remove_action( 'bstone_single_header', 'bstone_single_post_page_header', 10 );
				}

				if( true === bstone_options( 'sh_cc_set_cross_sells_full_width' ) && true === bstone_options( 'sh_cc_set_enable_cart_cross_sells' ) ) {
					remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
					add_action( 'woocommerce_after_cart_table', 'woocommerce_cross_sell_display' );
				}

				if( false === bstone_options( 'sh_cc_sty_thumb_show_thumb' ) ) {
					add_filter( 'woocommerce_cart_item_thumbnail', '__return_false' );
				}

				add_filter( 'woocommerce_cross_sells_columns', array( $this, 'change_cross_sells_columns' ) );

			} else if( is_checkout() ) {
				
				if( false === bstone_options( 'sh_cc_set_checkout_title_section' ) ) {
					remove_action( 'bstone_single_header', 'bstone_single_post_page_header', 10 );
				}
				
			} else if( is_account_page() ) {
				
				if( false === bstone_options( 'sh_cc_set_account_title_section' ) ) {
					remove_action( 'bstone_single_header', 'bstone_single_post_page_header', 10 );
				}
				
			}
		}
		
		/**
		 * Remove default shop title
		 */
		function woo_hide_page_title() {
			return false;
		}

		/**
		 * Change number of cross sells output on cart page
		 */
		function change_cross_sells_columns( $columns ) {
			
			return bstone_options( 'sh_cc_set_cross_sells_num' );
		}

		/**
		 * Assign shop sidebar for store page.
		 *
		 * @param String $sidebar Sidebar.
		 *
		 * @return String $sidebar Sidebar.
		 */
		function replace_store_sidebar( $sidebar ) {

			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ) {
				$sidebar = 'bstone-woo-shop-sidebar';
			} elseif ( is_product() ) {
				$sidebar = 'bstone-woo-single-sidebar';
			}

			return $sidebar;
		}

		/**
		 * WooCommerce Container
		 *
		 * @param String $sidebar_layout Layout type.
		 *
		 * @return String $sidebar_layout Layout type.
		 */
		function store_sidebar_layout( $sidebar_layout ) {

			if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ) {

				$woo_sidebar = bstone_options( 'sh_pl_set_woo_sidebar_layout' );

				if ( 'default' !== $woo_sidebar ) {

					$sidebar_layout = $woo_sidebar;
				}

				if ( is_shop() ) {
					$shop_page_id = get_option( 'woocommerce_shop_page_id' );
					$shop_sidebar = get_post_meta( $shop_page_id, 'site-sidebar-layout', true );
				} elseif ( is_product_taxonomy() ) {
					$shop_sidebar = 'default';
				} else {
					$shop_sidebar = bstone_get_option_meta( 'site-sidebar-layout', '', true );
				}

				if ( 'default' !== $shop_sidebar && ! empty( $shop_sidebar ) ) {
					$sidebar_layout = $shop_sidebar;
				}
			} else if( is_product() ) {

				$woo_sidebar = bstone_options( 'sh_pp_set_woo_single_sidebar_layout' );

				if ( 'default' !== $woo_sidebar ) {

					$sidebar_layout = $woo_sidebar;
				}

				$product_single_id = get_the_id();

				$product_single_sidebar = get_post_meta( $product_single_id, 'site-sidebar-layout', true );

				if ( 'default' !== $product_single_sidebar && ! empty( $product_single_sidebar ) ) {
					$sidebar_layout = $product_single_sidebar;
				}
			}

			return $sidebar_layout;
		}
		/**
		 * WooCommerce Container
		 *
		 * @param String $layout Layout type.
		 *
		 * @return String $layout Layout type.
		 */
		function store_content_layout( $layout ) {

			if ( is_woocommerce() || is_checkout() || is_cart() || is_account_page() ) {

				$woo_layout = bstone_options( 'sh_pl_set_woo_shop_layout' );

				if ( 'default' !== $woo_layout ) {

					$layout = $woo_layout;
				}

				if ( is_shop() ) {
					$shop_page_id = get_option( 'woocommerce_shop_page_id' );
					$shop_layout  = get_post_meta( $shop_page_id, 'site-default-layout', true );
				} elseif ( is_product_taxonomy() ) {
					$shop_layout = 'default';
				} else {
					$shop_layout = bstone_get_option_meta( 'site-default-layout', '', true );
				}

				if ( 'default' !== $shop_layout && ! empty( $shop_layout ) ) {
					$layout = $shop_layout;
				}
			}

			return $layout;
		}

		/**
		 * Shop Page Meta
		 *
		 * @return void
		 */
		function shop_meta_option() {

			// Page Title.
			if ( is_shop() ) {

				$shop_page_id        = get_option( 'woocommerce_shop_page_id' );
				$shop_title          = get_post_meta( $shop_page_id, 'site-post-title', true );
				$main_header_display = get_post_meta( $shop_page_id, 'bst-main-header-display', true );
				$footer_layout       = get_post_meta( $shop_page_id, 'footer-sml-layout', true );

				if ( 'disabled' === $shop_title ) {
					add_filter( 'woocommerce_show_page_title', '__return_false' );
				}

				if ( 'disabled' === $main_header_display ) {
					remove_action( 'bstone_masthead', 'bstone_masthead_primary_template' );
				}

				if ( 'disabled' === $footer_layout ) {
					remove_action( 'bstone_footer_content', 'bstone_footer_small_footer_template', 5 );
				}
			}
		}


		/**
		 * Shop customization.
		 *
		 * @return void
		 */
		function shop_customization() {

			if ( ! apply_filters( 'bstone_woo_shop_product_structure_override', false ) ) {

				add_action( 'woocommerce_before_shop_loop_item', 'bstone_woo_shop_thumbnail_wrap_start', 6 );
				/**
				 * Add sale flash before shop loop.
				 */
				add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_show_product_loop_sale_flash', 9 );

				add_action( 'woocommerce_after_shop_loop_item', 'bstone_woo_shop_thumbnail_wrap_end', 8 );
				/**
				 * Add Out of Stock to the Shop page
				 */
				add_action( 'woocommerce_shop_loop_item_title', 'bstone_woo_shop_out_of_stock', 8 );

				remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

				/**
				 * Shop Page Product Content Sorting
				 */
				add_action( 'woocommerce_after_shop_loop_item', 'bstone_woo_woocommerce_shop_product_content' );
			}
		}

		/**
		 * Checkout customization.
		 *
		 * @return void
		 */
		function woocommerce_checkout() {

			if ( ! apply_filters( 'bstone_woo_shop_product_structure_override', false ) ) {

				/**
				 * Checkout Page
				 */
				add_action( 'woocommerce_checkout_billing', array( WC()->checkout(), 'checkout_form_shipping' ) );
			}

			// Checkout Page.
			remove_action( 'woocommerce_checkout_shipping', array( WC()->checkout(), 'checkout_form_shipping' ) );
		}

		/**
		 * Single product customization.
		 *
		 * @return void
		 */
		function single_product_customization() {

			if ( ! is_product() ) {
				return;
			}

			add_filter( 'woocommerce_product_description_heading', '__return_false' );
			add_filter( 'woocommerce_product_additional_information_heading', '__return_false' );

			// Breadcrumb.
			remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
			if ( bstone_options( 'sh_pp_set_single_product_breadcrumb' ) ) {
				add_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 2 );
			}

			if ( ! apply_filters( 'bstone_woo_single_product_structure_override', false ) ) {
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );				
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
				remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

				$product_single_content_structure = bstone_options( 'sh_pp_set_product_main_structure' );

				if( is_array( $product_single_content_structure ) && ! in_array( "quantity", $product_single_content_structure ) ) {
					add_filter( 'woocommerce_is_sold_individually', '__return_true', 10, 2 );
				}

				/**
				 * Single Product Page Content Sorting
				 */
				add_action( 'woocommerce_single_product_summary', 'bstone_woo_woocommerce_single_product_content' );
			}

			global $_wp_additional_image_sizes;

			if( true === bstone_options( 'sh_pp_sty_img_custom_size_toggle' ) && array_key_exists( bstone_options( 'sh_pp_sty_img_custom_size' ), $_wp_additional_image_sizes ) && array( $this, 'bst_sc_single_custom_img_size' ) ) {
				add_filter( 'woocommerce_get_image_size_single', array( $this, 'bst_sc_single_custom_img_size' ) );
				add_filter( 'woocommerce_get_image_size_shop_single', array( $this, 'bst_sc_single_custom_img_size' ) );
				add_filter( 'woocommerce_get_image_size_woocommerce_single', array( $this, 'bst_sc_single_custom_img_size' ) );
			}

			// Turn on directionNav for single product flexslider.
			if( true === bstone_options( 'sh_pp_sty_img_gallery_nav' ) ) {
				add_filter( 'woocommerce_single_product_carousel_options', array( $this, 'bst_woo_carousel_customize' ) );
			}

			// Default title section for single product
			if( false === bstone_options( 'sh_pp_set_single_product_titlearea' ) ) {
				remove_action( 'bstone_single_header', 'bstone_single_post_page_header', 10 );
			}
			
		}

		function bst_woo_carousel_customize( $options ) {
			$options['directionNav'] = true;

			return $options;
		}

		function bst_sc_single_custom_img_size() {

			global $_wp_additional_image_sizes;

			if( isset( $_wp_additional_image_sizes[bstone_options( 'sh_pp_sty_img_custom_size' )]['width'] ) && '' != $_wp_additional_image_sizes[bstone_options( 'sh_pp_sty_img_custom_size' )]['width'] ) {
				$img_width  = $_wp_additional_image_sizes[bstone_options( 'sh_pp_sty_img_custom_size' )]['width'];
				$img_height = $_wp_additional_image_sizes[bstone_options( 'sh_pp_sty_img_custom_size' )]['height'];

				$size = array( 'width' => $img_width, 'height' => $img_height, 'crop' => 1, );
				return $size;
			} else {
				return null;
			}
		}

		/**
		 * Single Product Tabs
		 */
		function bstone_sc_product_tabs( $tabs ) {

			// Remove Description tab
			if ( false === bstone_options( 'sh_pp_set_product_desc' ) ) {
				unset($tabs['description']);
			}

			// Remove Additional Information tab
			if ( false === bstone_options( 'sh_pp_set_product_additional_info' ) ) {
				unset($tabs['additional_information']);
			}

			// Remove Reviews tab
			if ( false === bstone_options( 'sh_pp_set_product_review' ) ) {
				unset($tabs['reviews']);
			}

			return $tabs;
		}

		/**
		 * Related Products Output
		 */
		function output_related_products() {
			if ( false === bstone_options( 'sh_pp_set_related_products' ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			}
		}

		/**
		 * Upsells Products Output
		 */
		function output_upsells_products() {
			if ( false === bstone_options( 'sh_pp_set_upsells_products' ) && is_singular( 'product' ) ) {

				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
			}
		}

		/**
		 * Remove Woo-Commerce Default actions
		 */
		function woocommerce_init() {
			remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
			remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
			remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
			remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
			remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
			remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
		}

		/**
		 * Add start of wrapper
		 */
		function before_main_content_start() {
			
			$bstone_page_layout = bstone_page_layout();
            ?>
            
            <div class="st-container st-flex content-top st-<?php echo esc_attr( $bstone_page_layout ); ?>">

                <div id="primary" class="content-area primary">

                    <?php bstone_primary_content_top(); ?>

                    <main id="main" class="site-main" role="main">
                        <div class="bst-woocommerce-container">
			<?php
		}

		/**
		 * Add end of wrapper
		 */
		function before_main_content_end() {
			?>
                        </div> <!-- .bst-woocommerce-container -->
                    </main> <!-- #main -->

                    <?php bstone_primary_content_bottom(); ?>

				</div> <!-- #primary -->
				
				<?php
					$bstone_page_layout = bstone_page_layout();

					if( $bstone_page_layout == 'right-sidebar' || $bstone_page_layout == 'left-sidebar' || $bstone_page_layout == 'both-sidebars' ) :
						get_sidebar();
				  	endif;
				?>
            
            </div> <!-- .st-container -->

			<?php
		}
		
		/**
		 * Get shop font family
		 */
		public static function get_sc_font_family( $default, $element ) {
			
			$element_font = bstone_options( $element );
			
			if( $element_font == 'inherit' ) {
				return $default;
			} else {
				return $element_font;
			}
		}
		
		/**
		 * Get shop font waight
		 */
		public static function get_sc_font_waight( $default, $element ) {
			
			$element_font_waight = bstone_options( $element );
			
			if( $element_font_waight == 'inherit' ) {
				return $default;
			} else {
				return $element_font_waight;
			}
		}

		/**
		 * Enqueue styles
		 *
		 * @since 1.1.6
		 */
		function add_styles() {

			/* Directory and Extension */
			$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
			$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';

			$css_uri = BSTONE_THEME_URI . 'assets/css/' . $dir_name . '/';

			$new_style = 'compatibility/woocommerce-new';
			$new_key   = 'bstone-woocommerce-new';

			// Register & Enqueue Styles.
			// Generate CSS URL.
			$new_css_file = $css_uri . $new_style . $file_prefix . '.css';

			/**
			 * - Variable Declaration
			 */
			$theme_color  = bstone_options( 'link-color' );
			$link_color   = bstone_options( 'link-color', $theme_color );
			$text_color   = bstone_options( 'base-text-color' );
			$link_h_color = bstone_options( 'link-h-color' );

			$btn_color = bstone_options( 'button-color' );
			if ( empty( $btn_color ) ) {
				$btn_color = bstone_get_foreground_color( $theme_color );
			}

			$btn_h_color = bstone_options( 'button-h-color' );
			if ( empty( $btn_h_color ) ) {
				$btn_h_color = bstone_get_foreground_color( $link_h_color );
			}
			$btn_bg_color   = bstone_options( 'button-bg-color', '', $theme_color );
			$btn_bg_h_color = bstone_options( 'button-bg-h-color', '', $link_h_color );

			$btn_border_radius      = bstone_options( 'button-radius' );
			$btn_vertical_padding   = bstone_options( 'button-v-padding' );
			$btn_horizontal_padding = bstone_options( 'button-h-padding' );

			$cart_h_color = bstone_get_foreground_color( $link_h_color );

			$site_content_width         = bstone_options( 'site-content-width', 1200 );
			$woo_shop_archive_width     = bstone_options( 'sh_pl_sty_cnt_content_width' );
			$woo_shop_archive_max_width = bstone_options( 'sh_pl_sty_cnt_content_width_custom' );
			
			$woo_single_product_width     = bstone_options( 'sh_pp_sty_playout_content_width' );
			$woo_single_product_max_width = bstone_options( 'sh_pp_sty_playout_content_width_custom' );
			
			// Shop Customizer - Variable Declaration
			$default_font_family 		  = bstone_options( 'default-body-font-family' );
			$default_font_waight 		  = bstone_options( 'default-body-font-weight' );

			$shop_item_content_alignment  = bstone_options( 'sh_pl_set_shop_content_align' );
			$shop_item_vertical_spacing   = bstone_options( 'sh_pl_set_shop_vertical_space' );
			$shop_item_horizontal_spacing = bstone_options( 'sh_pl_set_shop_horizontal_space' );
			$shop_grid_sp_num			  = bstone_options( 'sh_pl_set_shop_grids' );
			
			$shop_item_bg_color			  = bstone_options( 'sh_pl_sty_box_item_bg_color' );
			$shop_item_border_width		  = bstone_options( 'sh_pl_sty_box_item_border_width' );
			$shop_item_border_radius	  = bstone_options( 'sh_pl_sty_box_item_border_radius' );
			$shop_item_border_color		  = bstone_options( 'sh_pl_sty_box_item_border_color' );
			
			$shop_item_box_shadow_x    	  = bstone_options( 'sh_pl_sty_box_item_shadow_x' );
			$shop_item_box_shadow_y    	  = bstone_options( 'sh_pl_sty_box_item_shadow_y' );
			$shop_item_box_shadow_blur    = bstone_options( 'sh_pl_sty_box_item_shadow_blur' );
			$shop_item_box_shadow_spread  = bstone_options( 'sh_pl_sty_box_item_shadow_spread' );
			$shop_item_box_shadow_inset	  = bstone_options( 'sh_pl_sty_box_item_shadow_inset' );
			$shop_item_box_shadow_color	  = bstone_options( 'sh_pl_sty_box_item_shadow_color' );

			$shop_item_box_shadow_x_h      = bstone_options( 'sh_pl_sty_box_item_shadow_x_hover' );
			$shop_item_box_shadow_y_h      = bstone_options( 'sh_pl_sty_box_item_shadow_y_hover' );
			$shop_item_box_shadow_blur_h   = bstone_options( 'sh_pl_sty_box_item_shadow_blur_hover' );
			$shop_item_box_shadow_spread_h = bstone_options( 'sh_pl_sty_box_item_shadow_spread_hover' );
			$shop_item_box_shadow_inset_h  = bstone_options( 'sh_pl_sty_box_item_shadow_inset_hover' );
			$shop_item_box_shadow_color_h  = bstone_options( 'sh_pl_sty_box_item_shadow_color_hover' );

			$shop_item_title_color			= bstone_options( 'sh_pl_sty_title_color' );
			$shop_item_title_font_family	= self::get_sc_font_family($default_font_family, 'sh_pl_sty_title_font_family');
			$shop_item_title_font_waight	= self::get_sc_font_waight($default_font_waight, 'sh_pl_sty_title_font_weight');
			$shop_item_title_font_transform = bstone_options( 'sh_pl_sty_title_text_transform' );
			$shop_item_title_font_style		= bstone_options( 'sh_pl_sty_title_text_style' );
			$shop_item_title_font_size		= bstone_options( 'sh_pl_sty_title_font_size' );

			$shop_item_cat_color			= bstone_options( 'sh_pl_sty_cat_color' );
			$shop_item_cat_font_family		= self::get_sc_font_family($default_font_family, 'sh_pl_sty_cat_font_family');
			$shop_item_cat_font_waight		= self::get_sc_font_waight($default_font_waight, 'sh_pl_sty_cat_font_weight');
			$shop_item_cat_font_transform 	= bstone_options( 'sh_pl_sty_cat_text_transform' );
			$shop_item_cat_font_style		= bstone_options( 'sh_pl_sty_cat_text_style' );
			$shop_item_cat_font_size		= bstone_options( 'sh_pl_sty_cat_font_size' );

			if( is_rtl() ) {
				if( 'left' === $shop_item_content_alignment ) {
					$shop_item_content_alignment = 'right';
				} else if( 'right' === $shop_item_content_alignment ) {
					$shop_item_content_alignment = 'left';
				}
			}

			if( $shop_item_box_shadow_inset ) {
				$shop_item_box_shadow_inset = 'inset';
			}

			if( $shop_item_box_shadow_inset_h ) {
				$shop_item_box_shadow_inset_h = 'inset';
			}

			$css_output = array(
				'.woocommerce span.onsale'                => array(
					'background-color' => $theme_color,
					'color'            => bstone_get_foreground_color( $theme_color ),
				),
				'.woocommerce a.button, .woocommerce button.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled], .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit, .woocommerce button.button.alt.disabled' => array(
					'color'            => $btn_color,
					'border-color'     => $btn_bg_color,
					'background-color' => $btn_bg_color,
				),
				'.woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce .woocommerce-message a.button:hover,.woocommerce #respond input#submit:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce input.button:hover, .woocommerce button.button.alt.disabled:hover' => array(
					'color'            => $btn_h_color,
					'border-color'     => $btn_bg_h_color,
					'background-color' => $btn_bg_h_color,
				),
				'.woocommerce-message, .woocommerce-info' => array(
					'border-top-color' => $link_color,
				),
				'.woocommerce-message::before,.woocommerce-info::before' => array(
					'color' => $link_color,
				),
				'.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .widget_layered_nav_filters ul li.chosen a, .woocommerce-page ul.products li.product .bst-woo-product-category, .wc-layered-nav-rating a' => array(
					'color' => $text_color,
				),
				// Form Fields, Pagination border Color.
				'.woocommerce nav.woocommerce-pagination ul,.woocommerce nav.woocommerce-pagination ul li' => array(
					'border-color' => $link_color,
				),
				'.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current' => array(
					'background' => $link_color,
					'color'      => $btn_color,
				),
				'.woocommerce-MyAccount-navigation-link.is-active a' => array(
					'color' => $link_h_color,
				),
				'.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle' => array(
					'background-color' => $link_color,
				),
				// Button Typography.
				'.woocommerce a.button, .woocommerce button.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce-cart table.cart td.actions .button, .woocommerce form.checkout_coupon .button, .woocommerce #respond input#submit' => array(
					'border-radius' => bstone_get_css_value( $btn_border_radius, 'px' ),
					'padding'       => bstone_get_css_value( $btn_vertical_padding, 'px' ) . ' ' . bstone_get_css_value( $btn_horizontal_padding, 'px' ),
				),
				'.woocommerce .star-rating, .woocommerce .comment-form-rating .stars a, .woocommerce .star-rating::before' => array(
					'color' => $link_color,
				),
				'.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before' => array(
					'background' => $link_color,
				),

				/**
				 * Cart in menu
				 */
				'.bst-site-header-cart a'                 => array(
					'color' => esc_attr( $text_color ),
				),

				'.bst-site-header-cart a:focus, .bst-site-header-cart a:hover, .bst-site-header-cart .current-menu-item a' => array(
					'color' => esc_attr( $link_color ),
				),

				'.bst-site-header-cart .widget_shopping_cart .total .woocommerce-Price-amount' => array(
					'color' => esc_attr( $link_color ),
				),

				'.woocommerce a.remove:hover, .bst-woocommerce-cart-menu .main-header-menu .woocommerce-custom-menu-item li:hover > a.remove:hover' => array(
					'color'            => esc_attr( $link_color ),
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( '#ffffff' ),
				),

				/**
				 * Checkout button color for widget
				 */
				'.bst-site-header-cart .widget_shopping_cart .buttons .button.checkout, .woocommerce .widget_shopping_cart .woocommerce-mini-cart__buttons .checkout.wc-forward' => array(
					'color'            => $btn_h_color,
					'border-color'     => $btn_bg_h_color,
					'background-color' => $btn_bg_h_color,
				),
				'.site-header .bst-site-header-cart-data .button.wc-forward, .site-header .bst-site-header-cart-data .button.wc-forward:hover' => array(
					'color' => $btn_color,
				),
				'.below-header-user-select .bst-site-header-cart .widget, .bst-above-header-section .bst-site-header-cart .widget a, .below-header-user-select .bst-site-header-cart .widget_shopping_cart a' => array(
					'color' => $text_color,
				),
				'.below-header-user-select .bst-site-header-cart .widget_shopping_cart a:hover, .bst-above-header-section .bst-site-header-cart .widget_shopping_cart a:hover, .below-header-user-select .bst-site-header-cart .widget_shopping_cart a.remove:hover, .bst-above-header-section .bst-site-header-cart .widget_shopping_cart a.remove:hover' => array(
					'color' => esc_attr( $link_color ),
				),

				/**
				 * Shop Product Listing
				 */
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product .bstone-shop-summary-wrap' => array(
					'text-align' => esc_attr( $shop_item_content_alignment ),
				),
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product' => array(
					'background-color' => esc_attr( $shop_item_bg_color ),
					'border-width' 	   => bstone_get_css_value( $shop_item_border_width, 'px' ),
					'border-radius'    => bstone_get_css_value( $shop_item_border_radius, 'px' ),
					'border-color' 	   => esc_attr( $shop_item_border_color ),
					'border-style' 	   => 'solid',					
					'-webkit-box-shadow'  => $shop_item_box_shadow_inset .' '. bstone_get_css_value( $shop_item_box_shadow_x, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_y, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_blur, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_spread, 'px' ) .' '. esc_attr( $shop_item_box_shadow_color ),				
					'-moz-box-shadow'  => $shop_item_box_shadow_inset .' '. bstone_get_css_value( $shop_item_box_shadow_x, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_y, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_blur, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_spread, 'px' ) .' '. esc_attr( $shop_item_box_shadow_color ),
					'box-shadow'  => $shop_item_box_shadow_inset .' '. bstone_get_css_value( $shop_item_box_shadow_x, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_y, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_blur, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_spread, 'px' ) .' '. esc_attr( $shop_item_box_shadow_color ),
				),
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product img.wp-post-image' => array(
					'border-top-left-radius'  => bstone_get_css_value( $shop_item_border_radius, 'px' ),
					'border-top-right-radius' => bstone_get_css_value( $shop_item_border_radius, 'px' ),
				),
				'.woocommerce ul.products li.product:hover, .woocommerce-page ul.products li.product:hover' => array(					
					'-webkit-box-shadow'  => $shop_item_box_shadow_inset_h .' '. bstone_get_css_value( $shop_item_box_shadow_x_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_y_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_blur_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_spread_h, 'px' ) .' '. esc_attr( $shop_item_box_shadow_color_h ),				
					'-moz-box-shadow'  => $shop_item_box_shadow_inset_h .' '. bstone_get_css_value( $shop_item_box_shadow_x_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_y_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_blur_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_spread_h, 'px' ) .' '. esc_attr( $shop_item_box_shadow_color_h ),
					'box-shadow'  => $shop_item_box_shadow_inset_h .' '. bstone_get_css_value( $shop_item_box_shadow_x_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_y_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_blur_h, 'px' ) .' '. bstone_get_css_value( $shop_item_box_shadow_spread_h, 'px' ) .' '. esc_attr( $shop_item_box_shadow_color_h ),
				),
				'.woocommerce #primary ul.products li.product .woocommerce-loop-product__title' => array(
					'color'			 => esc_attr( $shop_item_title_color ),
					'font-family'	 => "'".bstone_get_css_value( $shop_item_title_font_family, 'font' )."'",
					'font-weight'	 => esc_attr( $shop_item_title_font_waight ),
					'text-transform' => esc_attr( $shop_item_title_font_transform ),
					'font-style'	 => esc_attr( $shop_item_title_font_style ),
				),
				'.woocommerce ul.products li.product .bst-woo-product-category' => array(
					'color'			 => esc_attr( $shop_item_cat_color ),
					'font-family'	 => "'".bstone_get_css_value( $shop_item_cat_font_family, 'font' )."'",
					'font-weight'	 => esc_attr( $shop_item_cat_font_waight ),
					'text-transform' => esc_attr( $shop_item_cat_font_transform ),
					'font-style'	 => esc_attr( $shop_item_cat_font_style ),
				),
				'.woocommerce .comment-reply-title' => array(
					'color'			 => esc_attr( $shop_item_title_color ),
				),
			);

			/* Parse CSS from array() */
			$css_output = bstone_parse_css( $css_output );

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .bst-woo-shop-product-description', array(
				'color' 		 => 'sh_pl_sty_desc_color',
				'font-family'	 => 'sh_pl_sty_desc_font_family',
				'font-weight'	 => 'sh_pl_sty_desc_font_weight',
				'text-transform' => 'sh_pl_sty_desc_text_transform',
				'font-style'	 => 'sh_pl_sty_desc_text_style',
				'line-height'	 => 'sh_pl_sty_desc_line_height',
			), 'sh_pl_sty_desc_font_size', array(
				'margin', 'sh_pl_sty_desc', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .price, .woocommerce ul.products li.product .price ins', array(
				'color' 		 => 'sh_pl_sty_price_color',
				'font-family'	 => 'sh_pl_sty_price_font_family',
				'font-weight'	 => 'sh_pl_sty_price_font_weight',
				'text-transform' => 'sh_pl_sty_price_text_transform',
				'font-style'	 => 'sh_pl_sty_price_text_style',
			), 'sh_pl_sty_price_font_size', array(
				'margin', 'sh_pl_sty_price', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .price del', array(
				'color' 		 => 'sh_pl_sty_sale_price_color',
				'font-family'	 => 'sh_pl_sty_sale_price_font_family',
				'font-weight'	 => 'sh_pl_sty_sale_price_font_weight',
				'text-transform' => 'sh_pl_sty_sale_price_text_transform',
				'font-style'	 => 'sh_pl_sty_sale_price_text_style',
			), 'sh_pl_sty_sale_price_font_size', array(
				'margin', 'sh_pl_sty_sale_price', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating, .woocommerce #reviews .star-rating, .woocommerce .comment-form-rating .stars a', array(
				'color' 	=> 'sh_pl_sty_rating_active_star_color',
				'font-size' => 'sh_pl_sty_rating_star_size',
			), '', array(
				'margin', 'sh_pl_sty_rating', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .bstone-shop-summary-wrap .star-rating::before', array(
				'color' 	=> 'sh_pl_sty_rating_star_color',
				'font-size' => 'sh_pl_sty_rating_star_size',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #reviews .star-rating::before', array(
				'color' 	=> 'sh_pl_sty_rating_star_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .button', array(
				'color' 		   => 'sh_pl_sty_cart_btn_txt_color',
				'background-color' => 'sh_pl_sty_cart_btn_bg_color',
				'border-color' 	   => 'sh_pl_sty_cart_btn_brdr_color',
				'border-width' 	   => 'sh_pl_sty_cart_btn_brdr_width',
				'border-radius'    => 'sh_pl_sty_cart_btn_brdr_radius',
				'font-family'	   => 'sh_pl_sty_cart_btn_font_family',
				'font-weight'	   => 'sh_pl_sty_cart_btn_font_weight',
				'text-transform'   => 'sh_pl_sty_cart_btn_text_transform',
				'font-style'	   => 'sh_pl_sty_cart_btn_text_style',
			), 'sh_pl_sty_cart_btn_font_size', array(
				'both', 'sh_pl_sty_cart_btn', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .button:hover, .woocommerce a.button.wc-forward:hover', array(
				'color' 		   => 'sh_pl_sty_cart_btn_txt_color_hovr',
				'background-color' => 'sh_pl_sty_cart_btn_bg_color_hovr',
				'border-color' 	   => 'sh_pl_sty_cart_btn_brdr_color_hovr',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce a.button.wc-forward', array(
				'color' 		   => 'sh_pl_sty_cart_btn_txt_color',
				'background-color' => 'sh_pl_sty_cart_btn_bg_color',
				'border-color' 	   => 'sh_pl_sty_cart_btn_brdr_color',
				'border-width' 	   => 'sh_pl_sty_cart_btn_brdr_width',
				'border-radius'    => 'sh_pl_sty_cart_btn_brdr_radius',
				'font-family'	   => 'sh_pl_sty_cart_btn_font_family',
				'font-weight'	   => 'sh_pl_sty_cart_btn_font_weight',
				'text-transform'   => 'sh_pl_sty_cart_btn_text_transform',
				'font-style'	   => 'sh_pl_sty_cart_btn_text_style',
			), 'sh_pl_sty_cart_btn_font_size', array(
				'padding', 'sh_pl_sty_cart_btn', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .onsale', array(
				'color' 		   => 'sh_pl_sty_sale_bdg_txt_color',
				'background-color' => 'sh_pl_sty_sale_bdg_bg_color',
				'border-color' 	   => 'sh_pl_sty_sale_bdg_brdr_color',
				'border-width' 	   => 'sh_pl_sty_sale_bdg_brdr_width',
				'border-radius'    => 'sh_pl_sty_sale_bdg_brdr_radius',
				'font-family'	   => 'sh_pl_sty_sale_bdg_font_family',
				'font-weight'	   => 'sh_pl_sty_sale_bdg_font_weight',
				'text-transform'   => 'sh_pl_sty_sale_bdg_text_transform',
				'font-style'	   => 'sh_pl_sty_sale_bdg_text_style',
				'position-x-y'	   => 'sh_pl_sty_sale_bdg_position',
			), 'sh_pl_sty_sale_bdg_font_size', array(
				'both', 'sh_pl_sty_sale_bdg', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce ul.products li.product .bst-shop-product-out-of-stock, .woocommerce ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock, .woocommerce-page ul.products li.product .woocommerce-loop-product__link:hover .bst-shop-product-out-of-stock', array(
				'color' 		   => 'sh_pl_sty_out_stok_txt_color',
				'background-color' => 'sh_pl_sty_out_stok_bg_color',
				'border-color' 	   => 'sh_pl_sty_out_stok_brdr_color',
				'border-width' 	   => 'sh_pl_sty_out_stok_brdr_width',
				'border-radius'    => 'sh_pl_sty_out_stok_brdr_radius',
				'font-family'	   => 'sh_pl_sty_out_stok_font_family',
				'font-weight'	   => 'sh_pl_sty_out_stok_font_weight',
				'text-transform'   => 'sh_pl_sty_out_stok_text_transform',
				'font-style'	   => 'sh_pl_sty_out_stok_text_style',
				'position-x-y'	   => 'sh_pl_sty_out_stok_position',
			), 'sh_pl_sty_out_stok_font_size', array(
				'both', 'sh_pl_sty_out_stok', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .images .woocommerce-product-gallery__image, .woocommerce-page .images .woocommerce-product-gallery__image', array(
				'background-color' => 'sh_pp_sty_img_bg_color',
				'border-color' 	   => 'sh_pp_sty_img_border_color',
				'border-width' 	   => 'sh_pp_sty_img_border_width',
				'border-radius'    => 'sh_pp_sty_img_border_radius',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product div.images .flex-control-thumbs', array(
				'text-align' => 'sh_pp_sty_img_thumb_alignment',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product div.images, .woocommerce-page div.product div.images', array(), '', array(
				'margin', 'sh_pp_sty_img', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #primary .summary .product_title, .woocommerce-page  #primary .summary .product_title', array(
				'color' 		   => 'sh_pp_sty_title_color',
				'font-family'	   => 'sh_pp_sty_title_font_family',
				'font-weight'	   => 'sh_pp_sty_title_font_weight',
				'text-transform'   => 'sh_pp_sty_title_text_transform',
				'font-style'	   => 'sh_pp_sty_title_text_style',
				'line-height'	   => 'sh_pp_sty_title_line_height',
			), 'sh_pp_sty_title_font_size', array(
				'margin', 'sh_pp_sty_title', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .summary .price, .woocommerce-page #page .summary .price, .woocommerce .summary .woocommerce-Price-amount, .woocommerce-page .summary .woocommerce-Price-amount,  .woocommerce .summary ins .woocommerce-Price-amount, .woocommerce-page .summary ins .woocommerce-Price-amount', array(
				'color' 		   => 'sh_pp_sty_price_color',
				'font-family'	   => 'sh_pp_sty_price_font_family',
				'font-weight'	   => 'sh_pp_sty_price_font_weight',
				'text-transform'   => 'sh_pp_sty_price_text_transform',
				'font-style'	   => 'sh_pp_sty_price_text_style',
			), 'sh_pp_sty_price_font_size', array(
				'margin', 'sh_pp_sty_price', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .summary del, .woocommerce-page #page .summary del, .woocommerce #page .summary del .woocommerce-Price-amount, .woocommerce-page #page .summary del .woocommerce-Price-amount', array(
				'color' 		   => 'sh_pp_sty_sale_price_color',
				'font-family'	   => 'sh_pp_sty_sale_price_font_family',
				'font-weight'	   => 'sh_pp_sty_sale_price_font_weight',
				'text-transform'   => 'sh_pp_sty_sale_price_text_transform',
				'font-style'	   => 'sh_pp_sty_sale_price_text_style',
			), 'sh_pp_sty_sale_price_font_size', array(
				'margin', 'sh_pp_sty_sale_price', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .product_meta > span.posted_in', array(
				'color' 		   => 'sh_pp_sty_cat_title_color',
				'font-family'	   => 'sh_pp_sty_cat_font_family',
				'font-weight'	   => 'sh_pp_sty_cat_font_weight',
				'text-transform'   => 'sh_pp_sty_cat_text_transform',
				'font-style'	   => 'sh_pp_sty_cat_text_style',
			), 'sh_pp_sty_cat_font_size', array(
				'margin', 'sh_pp_sty_cat', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .product_meta > span.posted_in a', array(
				'color' 		   => 'sh_pp_sty_cat_color',
				'font-family'	   => 'sh_pp_sty_cat_font_family',
				'font-weight'	   => 'sh_pp_sty_cat_font_weight',
				'text-transform'   => 'sh_pp_sty_cat_text_transform',
				'font-style'	   => 'sh_pp_sty_cat_text_style',
			), 'sh_pp_sty_cat_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .product_meta > span.tagged_as', array(
				'color' 		   => 'sh_pp_sty_tags_title_color',
				'font-family'	   => 'sh_pp_sty_tags_font_family',
				'font-weight'	   => 'sh_pp_sty_tags_font_weight',
				'text-transform'   => 'sh_pp_sty_tags_text_transform',
				'font-style'	   => 'sh_pp_sty_tags_text_style',
			), 'sh_pp_sty_tags_font_size', array(
				'margin', 'sh_pp_sty_tags', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .product_meta > span.tagged_as a', array(
				'color' 		   => 'sh_pp_sty_tags_color',
				'font-family'	   => 'sh_pp_sty_tags_font_family',
				'font-weight'	   => 'sh_pp_sty_tags_font_weight',
				'text-transform'   => 'sh_pp_sty_tags_text_transform',
				'font-style'	   => 'sh_pp_sty_tags_text_style',
			), 'sh_pp_sty_tags_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .product_meta > span.sku_wrapper', array(
				'color' 		   => 'sh_pp_sty_sku_title_color',
				'font-family'	   => 'sh_pp_sty_sku_font_family',
				'font-weight'	   => 'sh_pp_sty_sku_font_weight',
				'text-transform'   => 'sh_pp_sty_sku_text_transform',
				'font-style'	   => 'sh_pp_sty_sku_text_style',
			), 'sh_pp_sty_sku_font_size', array(
				'margin', 'sh_pp_sty_sku', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .product_meta > span.sku_wrapper span', array(
				'color' 		   => 'sh_pp_sty_sku_color',
				'font-family'	   => 'sh_pp_sty_sku_font_family',
				'font-weight'	   => 'sh_pp_sty_sku_font_weight',
				'text-transform'   => 'sh_pp_sty_sku_text_transform',
				'font-style'	   => 'sh_pp_sty_sku_text_style',
			), 'sh_pp_sty_sku_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary form .single_add_to_cart_button', array(
				'color' 		   => 'sh_pp_sty_cart_btn_txt_color',
				'background-color' => 'sh_pp_sty_cart_btn_bg_color',
				'border-color' 	   => 'sh_pp_sty_cart_btn_brdr_color',
				'border-width' 	   => 'sh_pp_sty_cart_btn_brdr_width',
				'border-radius'    => 'sh_pp_sty_cart_btn_brdr_radius',
				'font-family'	   => 'sh_pp_sty_cart_btn_font_family',
				'font-weight'	   => 'sh_pp_sty_cart_btn_font_weight',
				'text-transform'   => 'sh_pp_sty_cart_btn_text_transform',
				'font-style'	   => 'sh_pp_sty_cart_btn_text_style',
			), 'sh_pp_sty_cart_btn_font_size', array(
				'both', 'sh_pp_sty_cart_btn', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product #review_form #respond .form-submit input', array(
				'color' 		   => 'sh_pp_sty_cart_btn_txt_color',
				'background-color' => 'sh_pp_sty_cart_btn_bg_color',
				'border-color' 	   => 'sh_pp_sty_cart_btn_brdr_color',
				'border-width' 	   => 'sh_pp_sty_cart_btn_brdr_width',
				'border-radius'    => 'sh_pp_sty_cart_btn_brdr_radius',
				'font-family'	   => 'sh_pp_sty_cart_btn_font_family',
				'font-weight'	   => 'sh_pp_sty_cart_btn_font_weight',
				'text-transform'   => 'sh_pp_sty_cart_btn_text_transform',
				'font-style'	   => 'sh_pp_sty_cart_btn_text_style',
			), 'sh_pp_sty_cart_btn_font_size', array(
				'padding', 'sh_pp_sty_cart_btn', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));
			
			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary form .single_add_to_cart_button:hover, .woocommerce #page .product #review_form #respond .form-submit input:hover', array(
				'color' 		   => 'sh_pp_sty_cart_btn_txt_color_hovr',
				'background-color' => 'sh_pp_sty_cart_btn_bg_color_hovr',
				'border-color' 	   => 'sh_pp_sty_cart_btn_brdr_color_hovr',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .product .summary .bst-sp-short-description', array(
				'color' 		   => 'sh_pp_sty_desc_color',
				'background-color' => 'sh_pp_sty_desc_bg_color',
				'font-family'	   => 'sh_pp_sty_desc_font_family',
				'font-weight'	   => 'sh_pp_sty_desc_font_weight',
				'text-transform'   => 'sh_pp_sty_desc_text_transform',
				'font-style'	   => 'sh_pp_sty_desc_text_style',
			), 'sh_pp_sty_desc_font_size', array(
				'both', 'sh_pp_sty_desc', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .variations input, .woocommerce #page .product .summary .variations select', array(
				'color' 		   => 'sh_pp_sty_var_txt_color',
				'background-color' => 'sh_pp_sty_var_bg_color',
				'border-color' 	   => 'sh_pp_sty_var_brdr_color',
				'border-width' 	   => 'sh_pp_sty_var_brdr_width',
				'height' 		   => 'sh_pp_sty_var_fields_height',
				'font-family'	   => 'sh_pp_sty_var_font_family',
				'font-weight'	   => 'sh_pp_sty_var_font_weight',
				'text-transform'   => 'sh_pp_sty_var_text_transform',
				'font-style'	   => 'sh_pp_sty_var_text_style',
			), 'sh_pp_sty_var_font_size', array(
				'margin', 'sh_pp_sty_var', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .product .summary .variations label', array(
				'color' 		   => 'sh_pp_sty_var_label_color',
				'font-family'	   => 'sh_pp_sty_var_font_family',
				'font-weight'	   => 'sh_pp_sty_var_font_weight',
				'text-transform'   => 'sh_pp_sty_var_label_transform',
				'font-style'	   => 'sh_pp_sty_var_text_style',
			), 'sh_pp_sty_var_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .product .summary .variations .reset_variations', array(
				'color' 		   => 'sh_pp_sty_var_clear_color',
				'font-family'	   => 'sh_pp_sty_var_font_family',
				'font-weight'	   => 'sh_pp_sty_var_font_weight',
				'text-transform'   => 'sh_pp_sty_var_clear_transform',
				'font-style'	   => 'sh_pp_sty_var_text_style',
			), 'sh_pp_sty_var_font_size', '');	

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product form.cart .variations', array(
				'border-bottom-color' => 'sh_pp_sty_var_seprator_color',
				'border-bottom-width' => 'sh_pp_sty_var_seprator_width',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .quantity', array(
				'color' 		   => 'sh_pp_sty_qty_color',
				'max-width' 	   => 'sh_pp_sty_qty_field_width',
				'font-family'	   => 'sh_pp_sty_qty_font_family',
				'font-weight'	   => 'sh_pp_sty_qty_font_weight',
				'text-transform'   => 'sh_pp_sty_qty_text_transform',
				'font-style'	   => 'sh_pp_sty_qty_text_style',
			), 'sh_pp_sty_qty_font_size', array(
				'margin', 'sh_pp_sty_qty', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page #primary .product .summary form .quantity input.qty', array(
				'color' 		   => 'sh_pp_sty_qty_color',
				'height' 	   	   => 'sh_pp_sty_qty_field_height',
				'background-color' => 'sh_pp_sty_qty_bg_color',
				'border-color' 	   => 'sh_pp_sty_qty_border_color',
				'border-width' 	   => 'sh_pp_sty_qty_brdr_width',
				'font-family'	   => 'sh_pp_sty_qty_font_family',
				'font-weight'	   => 'sh_pp_sty_qty_font_weight',
				'text-transform'   => 'sh_pp_sty_qty_text_transform',
				'font-style'	   => 'sh_pp_sty_qty_text_style',
			), 'sh_pp_sty_qty_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .woocommerce-product-rating a', array(
				'color' 		   => 'sh_pp_sty_rating_txt_color',
				'font-family'	   => 'sh_pp_sty_rating_font_family',
				'font-weight'	   => 'sh_pp_sty_rating_font_weight',
				'text-transform'   => 'sh_pp_sty_rating_text_transform',
				'font-style'	   => 'sh_pp_sty_rating_text_style',
			), 'sh_pp_sty_rating_font_size', array(
				'margin', 'sh_pp_sty_rating', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .woocommerce-product-rating', array(
				'line-height' => 'sh_pp_sty_rating_text_line_height',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .woocommerce-product-rating .star-rating:before', array(
				'color' 	=> 'sh_pp_sty_rating_star_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .woocommerce-product-rating .star-rating span', array(
				'color' 	=> 'sh_pp_sty_rating_active_star_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css( '.woocommerce #page .product .summary .woocommerce-product-rating .star-rating, .woocommerce #page .product .summary .woocommerce-product-rating .star-rating:before', array(
				'font-size' => 'sh_pp_sty_rating_star_size',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product span.onsale', array(
				'color' 		   => 'sh_pp_sty_sale_bdg_txt_color',
				'background-color' => 'sh_pp_sty_sale_bdg_bg_color',
				'border-color' 	   => 'sh_pp_sty_sale_bdg_brdr_color',
				'border-width' 	   => 'sh_pp_sty_sale_bdg_brdr_width',
				'border-radius'    => 'sh_pp_sty_sale_bdg_brdr_radius',
				'font-family'	   => 'sh_pp_sty_sale_bdg_font_family',
				'font-weight'	   => 'sh_pp_sty_sale_bdg_font_weight',
				'text-transform'   => 'sh_pp_sty_sale_bdg_text_transform',
				'font-style'	   => 'sh_pp_sty_sale_bdg_text_style',
			), 'sh_pp_sty_sale_bdg_font_size', array(
				'both', 'sh_pp_sty_sale_bdg', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page .product .summary .out-of-stock', array(
				'color' 		   => 'sh_pp_sty_out_stok_txt_color',
				'background-color' => 'sh_pp_sty_out_stok_bg_color',
				'border-color' 	   => 'sh_pp_sty_out_stok_brdr_color',
				'border-width' 	   => 'sh_pp_sty_out_stok_brdr_width',
				'border-radius'    => 'sh_pp_sty_out_stok_brdr_radius',
				'font-family'	   => 'sh_pp_sty_out_stok_font_family',
				'font-weight'	   => 'sh_pp_sty_out_stok_font_weight',
				'text-transform'   => 'sh_pp_sty_out_stok_text_transform',
				'font-style'	   => 'sh_pp_sty_out_stok_text_style',
			), 'sh_pp_sty_out_stok_font_size', array(
				'both', 'sh_pp_sty_out_stok', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce.single-product #page #main.site-main, .woocommerce-page.single-product #page #main.site-main', array(), '', array(
				'padding', 'sh_pp_sty_playout', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .woocommerce-tabs ul.tabs li a', array(
				'background-color' => 'sh_pp_sty_tabs_bg_color',
				'color' 		   => 'sh_pp_sty_tabs_txt_color',
				'font-family'	   => 'sh_pp_sty_tabs_font_family',
				'font-weight'	   => 'sh_pp_sty_tabs_font_weight',
				'text-transform'   => 'sh_pp_sty_tabs_text_transform',
				'font-style'	   => 'sh_pp_sty_tabs_text_style',
			), 'sh_pp_sty_tabs_font_size', array(
				'padding', 'sh_pp_sty_tabs', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover', array(
				'background-color' => 'sh_pp_sty_tabs_active_bg_color',
				'color' 		   => 'sh_pp_sty_tabs_active_txt_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .woocommerce-tabs ul.tabs li.active:before', array(
				'background-color' => 'sh_pp_sty_tabs_acbrdr_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce div.product .woocommerce-tabs ul.tabs', array(
				'border-top-color' => 'sh_pp_sty_tabs_divider_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #page div.product .woocommerce-tabs, .woocommerce-page #page div.product .woocommerce-tabs', array(), '', array(
				'margin', 'sh_pp_sty_tabs', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #primary .upsells.products h2, .woocommerce-page #primary .upsells.products h2, .woocommerce #primary .related.products h2, .woocommerce-page #primary .related.products h2', array(
				'color' 		   => 'sh_pp_sty_rup_heading_color',
				'font-family'	   => 'sh_pp_sty_rup_font_family',
				'font-weight'	   => 'sh_pp_sty_rup_font_weight',
				'text-transform'   => 'sh_pp_sty_rup_text_transform',
				'font-style'	   => 'sh_pp_sty_rup_text_style',
			), 'sh_pp_sty_rup_font_size', array(
				'margin', 'sh_pp_sty_rup', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce-cart #primary .cross-sells > h2, .woocommerce-cart #primary .cart_totals h2, .woocommerce-checkout #primary .woocommerce-billing-fields h3, .woocommerce-checkout #primary .woocommerce-additional-fields h3, .woocommerce-checkout #primary h3#order_review_heading', array(
				'color' 		   => 'sh_cc_sty_shead_text_color',
				'font-family'	   => 'sh_cc_sty_shead_font_family',
				'font-weight'	   => 'sh_cc_sty_shead_font_weight',
				'text-transform'   => 'sh_cc_sty_shead_text_transform',
				'font-style'	   => 'sh_cc_sty_shead_text_style',
			), 'sh_cc_sty_shead_font_size', array(
				'padding', 'sh_cc_sty_shead', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce #page form label, body.woocommerce-page #page form label', array(
				'color' 		   => 'sh_cc_sty_label_text_color',
				'font-family'	   => 'sh_cc_sty_label_font_family',
				'font-weight'	   => 'sh_cc_sty_label_font_weight',
				'text-transform'   => 'sh_cc_sty_label_text_transform',
				'font-style'	   => 'sh_cc_sty_label_text_style',
			), 'sh_cc_sty_label_font_size', array(
				'padding', 'sh_cc_sty_label', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce #page form input[type="text"], body.woocommerce #page form input[type="number"], body.woocommerce #page form input[type="email"], body.woocommerce #page form input[type="tel"], body.woocommerce #page form select, body.woocommerce #page form textarea, body.woocommerce-page #page form input[type="text"], body.woocommerce-page #page form input[type="number"], body.woocommerce-page #page form input[type="email"], body.woocommerce-page #page form input[type="tel"], body.woocommerce-page #page form select, body.woocommerce-page #page form textarea, .woocommerce #page .select2-container .select2-selection--single, .woocommerce-page #page .select2-container .select2-selection--single', array(
				'color' 		   => 'sh_cc_sty_field_text_color',
				'background-color' => 'sh_cc_sty_field_bg_color',
				'border-color' 	   => 'sh_cc_sty_field_brdr_color',
				'border-width' 	   => 'sh_cc_sty_field_brdr_width',
				'border-radius'    => 'sh_cc_sty_field_brdr_radius',
				'font-family'	   => 'sh_cc_sty_field_font_family',
				'font-weight'	   => 'sh_cc_sty_field_font_weight',
				'text-transform'   => 'sh_cc_sty_field_text_transform',
				'font-style'	   => 'sh_cc_sty_field_text_style',
			), 'sh_cc_sty_field_font_size', array(
				'both', 'sh_cc_sty_field', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce #page form input[type="text"]:focus, body.woocommerce #page form input[type="number"]:focus, body.woocommerce #page form input[type="email"]:focus, body.woocommerce #page form input[type="tel"]:focus, body.woocommerce #page form select:focus, body.woocommerce #page form textarea:focus, body.woocommerce-page #page form input[type="text"]:focus, body.woocommerce-page #page form input[type="number"]:focus, body.woocommerce-page #page form input[type="email"]:focus, body.woocommerce-page #page form input[type="tel"]:focus, body.woocommerce-page #page form select:focus, body.woocommerce-page #page form textarea:focus', array(
				'color' 		   => 'sh_cc_sty_field_text_color_fcs',
				'background-color' => 'sh_cc_sty_field_bg_color_fcs',
				'border-color' 	   => 'sh_cc_sty_field_brdr_color_fcs',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .cart-collaterals a.button.wc-forward, .woocommerce-page .cart-collaterals a.button.wc-forward, .woocommerce.woocommerce-checkout #payment #place_order, .woocommerce-page.woocommerce-checkout #payment #place_order, .woocommerce a.button.wc-backward, .woocommerce-page a.button.wc-backward', array(
				'color' 		   => 'sh_cc_sty_button_txt_color',
				'background-color' => 'sh_cc_sty_button_bg_color',
				'border-color' 	   => 'sh_cc_sty_button_brdr_color',
				'border-width' 	   => 'sh_cc_sty_button_brdr_width',
				'border-radius'    => 'sh_cc_sty_button_brdr_radius',
				'font-family'	   => 'sh_cc_sty_button_font_family',
				'font-weight'	   => 'sh_cc_sty_button_font_weight',
				'text-transform'   => 'sh_cc_sty_button_text_transform',
				'font-style'	   => 'sh_cc_sty_button_text_style',
			), 'sh_cc_sty_button_font_size', array(
				'both', 'sh_cc_sty_button', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .cart-collaterals a.button.wc-forward:hover, .woocommerce-page .cart-collaterals a.button.wc-forward:hover, .woocommerce.woocommerce-checkout #payment #place_order:hover, .woocommerce-page.woocommerce-checkout #payment #place_order:hover, .woocommerce a.button.wc-backward:hover, .woocommerce-page a.button.wc-backward:hover', array(
				'color' 		   => 'sh_cc_sty_button_txt_color_hovr',
				'background-color' => 'sh_cc_sty_button_bg_color_hovr',
				'border-color' 	   => 'sh_cc_sty_button_brdr_color_hovr',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #content table.cart td.actions .button, .woocommerce-page #content table.cart td.actions .button', array(
				'color' 		   => 'sh_cc_sty_update_button_txt_color',
				'background-color' => 'sh_cc_sty_update_button_bg_color',
				'border-color' 	   => 'sh_cc_sty_update_button_brdr_color',
				'border-width' 	   => 'sh_cc_sty_update_button_brdr_width',
				'border-radius'    => 'sh_cc_sty_update_button_brdr_radius',
				'font-family'	   => 'sh_cc_sty_update_button_font_family',
				'font-weight'	   => 'sh_cc_sty_update_button_font_weight',
				'text-transform'   => 'sh_cc_sty_update_button_text_transform',
				'font-style'	   => 'sh_cc_sty_update_button_text_style',
			), 'sh_cc_sty_update_button_font_size', array(
				'both', 'sh_cc_sty_update_button', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce #content table.cart td.actions .button:hover, .woocommerce-page #content table.cart td.actions .button:hover', array(
				'color' 		   => 'sh_cc_sty_update_button_txt_color_hovr',
				'background-color' => 'sh_cc_sty_update_button_bg_color_hovr',
				'border-color' 	   => 'sh_cc_sty_update_button_brdr_color_hovr',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce table.cart img, .woocommerce #content table.cart img, .woocommerce-page table.cart img, .woocommerce-page #content table.cart img', array(
				'border-color' 	   => 'sh_cc_sty_thumb_brdr_color',
				'border-width' 	   => 'sh_cc_sty_thumb_brdr_width',
				'border-radius'    => 'sh_cc_sty_thumb_brdr_radius',
			), '', array(
				'margin', 'sh_cc_sty_thumb', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.woocommerce td.product-remove a.remove, .woocommerce-page td.product-remove a.remove', array(
				'color' => 'sh_cc_sty_osmry_remove_btn_color',
				'border-color' => 'sh_cc_sty_osmry_remove_btn_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce td.product-remove a.remove:hover, .woocommerce-page td.product-remove a.remove:hover', array(
				'color' => 'sh_cc_sty_osmry_remove_btn_color_hover',
				'border-color' => 'sh_cc_sty_osmry_remove_btn_color_hover',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce table.shop_table thead, .woocommerce-page table.shop_table thead, .woocommerce-cart .cart-collaterals .cart_totals > h2, .woocommerce-cart .cart-collaterals .cross-sells > h2', array(
				'background-color' => 'sh_cc_sty_osmry_table_head_bg_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce table.shop_table thead, .woocommerce-page table.shop_table thead, .woocommerce-checkout form #order_review th, .woocommerce-cart .cart-collaterals .cart_totals table th', array(
				'color' => 'sh_cc_sty_osmry_table_head_text_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce table.shop_table tbody td, .woocommerce-page table.shop_table tbody td, .woocommerce-checkout form #order_review td', array(
				'color' => 'sh_cc_sty_osmry_table_text_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce td.product-name a, .woocommerce-page td.product-name a', array(
				'color' => 'sh_cc_sty_osmry_ptitle_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce td.product-name a:hover, .woocommerce-page td.product-name a:hover', array(
				'color' => 'sh_cc_sty_osmry_ptitle_hover_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce table.shop_table, .woocommerce-page table.shop_table, .woocommerce table.shop_table td, .woocommerce-page table.shop_table td, .woocommerce-cart .cart-collaterals .cart_totals, .woocommerce-cart .cart-collaterals .cross-sells, .woocommerce-cart #primary .cart_totals h2, .woocommerce-cart .cart-collaterals .cart_totals tr th, .woocommerce-cart .cart-collaterals .cart_totals tr td, .woocommerce-cart ul.products li.product, body.woocommerce-checkout #page form #order_review_heading, body.woocommerce-checkout #page form #order_review, .woocommerce-cart .cart-collaterals .cross-sells > h2', array(
				'border-color' => 'sh_cc_sty_others_border_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce-checkout #page form #order_review_heading, body.woocommerce-checkout #page form #order_review', array(
				'border-left-width' => 'sh_cc_sty_others_chk_order_brdr_width',
				'border-right-width' => 'sh_cc_sty_others_chk_order_brdr_width',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce-checkout #page form #order_review_heading', array(
				'border-top-width' => 'sh_cc_sty_others_chk_order_brdr_width',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce-checkout #page form #order_review', array(
				'border-bottom-width' => 'sh_cc_sty_others_chk_order_brdr_width',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body.woocommerce-checkout #page #customer_details h3', array(
				'border-color' => 'sh_cc_sty_others_divider_color',
				'border-bottom-width' => 'sh_cc_sty_others_divider_height',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce.woocommerce-checkout #payment div.payment_box, .woocommerce-page.woocommerce-checkout #payment div.payment_box', array(
				'color' 		   => 'sh_cc_sty_others_payment_box_text_color',
				'background-color' => 'sh_cc_sty_others_payment_box_bg_color',
				'line-height' 	   => 'sh_cc_sty_others_payment_box_line_height',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce.woocommerce-checkout #payment div.payment_box:before, .woocommerce-page.woocommerce-checkout #payment div.payment_box:before', array(
				'border-bottom-color' => 'sh_cc_sty_others_payment_box_bg_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body .bst-cart-menu-wrap .count, body .bst-cart-menu-wrap .count:after', array(
				'color' 	   => 'sh_mc_sty_icon_color',
				'border-color' => 'sh_mc_sty_icon_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body .bst-cart-menu-wrap:hover .count, body .bst-cart-menu-wrap:hover .count:after', array(
				'color' 	   => 'sh_mc_sty_icon_color_hover',
				'border-color' => 'sh_mc_sty_icon_color_hover',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('body .bst-cart-menu-wrap:hover .count', array(
				'color' 	   	   => 'sh_mc_sty_icon_color_text',
				'background-color' => 'sh_mc_sty_icon_color_hover',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('header.site-header .st-head-cta a.cart-container', array(
				'margin-left'  => 'sh_mc_sty_icon_margin_left',
				'margin-right' => 'sh_mc_sty_icon_margin_right',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.bst-site-header-cart .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart, .woocommerce .bst-site-header-cart .widget_shopping_cart, #bst-pro-woo-cart-sidebar', array(
				'background-color' => 'sh_mc_sty_container_bg_color',
				'border-color' 	   => 'sh_mc_sty_container_border_color',
				'border-width' 	   => 'sh_mc_sty_container_border_width',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .bst-site-header-cart .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart, #bst-pro-woo-cart-sidebar', array(
				'border-radius' => 'sh_mc_sty_container_border_radius',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .bst-site-header-cart .widget_shopping_cart:before, .bst-site-header-cart .widget_shopping_cart:before', array(
				'border-bottom-color' => 'sh_mc_sty_container_border_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.woocommerce .bst-site-header-cart .widget_shopping_cart:after, .bst-site-header-cart .widget_shopping_cart:after', array(
				'border-bottom-color' => 'sh_mc_sty_container_bg_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .button.wc-forward, .site-header .widget_shopping_cart .button.wc-forward, #bst-pro-woo-cart-sidebar .shopping-cart-element .button.wc-forward, #bst-pro-woo-cart-sidebar .widget_shopping_cart .button.wc-forward', array(
				'color' 		   => 'sh_mc_sty_view_txt_color',
				'background-color' => 'sh_mc_sty_view_bg_color',
				'border-color' 	   => 'sh_mc_sty_view_brdr_color',
				'border-width' 	   => 'sh_mc_sty_view_brdr_width',
				'border-radius'    => 'sh_mc_sty_view_brdr_radius',
				'font-family'	   => 'sh_mc_sty_view_font_family',
				'font-weight'	   => 'sh_mc_sty_view_font_weight',
				'text-transform'   => 'sh_mc_sty_view_text_transform',
				'font-style'	   => 'sh_mc_sty_view_text_style',
			), 'sh_mc_sty_view_font_size', array(
				'both', 'sh_mc_sty_view', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .button.wc-forward:hover, .site-header .widget_shopping_cart .button.wc-forward:hover, #bst-pro-woo-cart-sidebar .shopping-cart-element .button.wc-forward:hover, #bst-pro-woo-cart-sidebar .widget_shopping_cart .button.wc-forward:hover', array(
				'color' 		   => 'sh_mc_sty_view_txt_color_hovr',
				'background-color' => 'sh_mc_sty_view_bg_color_hovr',
				'border-color' 	   => 'sh_mc_sty_view_brdr_color_hovr',
			), '', '');
			
			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .buttons .button.checkout, .site-header .widget_shopping_cart .buttons .button.checkout, #bst-pro-woo-cart-sidebar .shopping-cart-element .buttons .button.checkout, #bst-pro-woo-cart-sidebar .widget_shopping_cart .buttons .button.checkout', array(
				'color' 		   => 'sh_mc_sty_checkout_txt_color',
				'background-color' => 'sh_mc_sty_checkout_bg_color',
				'border-color' 	   => 'sh_mc_sty_checkout_brdr_color',
				'border-width' 	   => 'sh_mc_sty_checkout_brdr_width',
				'border-radius'    => 'sh_mc_sty_checkout_brdr_radius',
				'font-family'	   => 'sh_mc_sty_checkout_font_family',
				'font-weight'	   => 'sh_mc_sty_checkout_font_weight',
				'text-transform'   => 'sh_mc_sty_checkout_text_transform',
				'font-style'	   => 'sh_mc_sty_checkout_text_style',
			), 'sh_mc_sty_checkout_font_size', array(
				'both', 'sh_mc_sty_checkout', '', 'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			));

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .buttons .button.checkout:hover, .site-header .widget_shopping_cart .buttons .button.checkout:hover, #bst-pro-woo-cart-sidebar .shopping-cart-element .buttons .button.checkout:hover, #bst-pro-woo-cart-sidebar .widget_shopping_cart .buttons .button.checkout:hover', array(
				'color' 		   => 'sh_mc_sty_checkout_txt_color_hovr',
				'background-color' => 'sh_mc_sty_checkout_bg_color_hovr',
				'border-color' 	   => 'sh_mc_sty_checkout_brdr_color_hovr',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .total, .site-header .woocommerce.widget_shopping_cart .total, #bst-pro-woo-cart-sidebar .shopping-cart-element .total, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart .total', array(
				'border-top-color' 	  => 'sh_mc_sty_content_subtotal_border_color',
				'border-bottom-color' => 'sh_mc_sty_content_subtotal_border_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('header.site-header .shopping-cart-element .bst-site-header-cart .cart_list a.remove, header.site-header .widget_shopping_cart .cart_list a.remove, body #bst-pro-woo-cart-sidebar .shopping-cart-element .cart_list a.remove, body #bst-pro-woo-cart-sidebar .widget_shopping_cart .cart_list a.remove', array(
				'color' 	   => 'sh_mc_sty_remove_btn_color',
				'border-color' => 'sh_mc_sty_remove_btn_color',
				'font-size'    => 'sh_mc_sty_remove_btn_font_size',
				'line-height'  => 'sh_mc_sty_remove_btn_line_height',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .cart_list a.remove:hover, .site-header .widget_shopping_cart .cart_list a.remove:hover, #bst-pro-woo-cart-sidebar .shopping-cart-element .cart_list a.remove:hover, #bst-pro-woo-cart-sidebar .widget_shopping_cart .cart_list a.remove:hover', array(
				'color' 	   => 'sh_mc_sty_remove_btn_color_hover',
				'border-color' => 'sh_mc_sty_remove_btn_color_hover',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .total .woocommerce-Price-amount, .site-header .widget_shopping_cart .total .woocommerce-Price-amount, #bst-pro-woo-cart-sidebar .shopping-cart-element .total .woocommerce-Price-amount, #bst-pro-woo-cart-sidebar .widget_shopping_cart .total .woocommerce-Price-amount', array(
				'color' => 'sh_mc_sty_content_subtotal_color',
			), '', '');	

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .cart_list a, .site-header .woocommerce.widget_shopping_cart .cart_list a, #bst-pro-woo-cart-sidebar .shopping-cart-element .cart_list a, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart .cart_list a', array(
				'color' 		=> 'sh_mc_sty_content_ptitle_color',
				'line-height'   => 'sh_mc_sty_content_ptitle_line_height',
				'margin-bottom' => 'sh_mc_sty_content_ptitle_margin_bottom',
				'margin-top' 	=> 'sh_mc_sty_content_ptitle_margin_top',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart, .site-header .woocommerce.widget_shopping_cart, #bst-pro-woo-cart-sidebar .shopping-cart-element, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart, .site-header .shopping-cart-element .bst-site-header-cart p, .site-header .woocommerce.widget_shopping_cart p, #bst-pro-woo-cart-sidebar .shopping-cart-element p, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart p, .site-header .shopping-cart-element .bst-site-header-cart a, .site-header .woocommerce.widget_shopping_cart a, #bst-pro-woo-cart-sidebar .shopping-cart-element a, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart a, .site-header .shopping-cart-element .bst-site-header-cart li, .site-header .woocommerce.widget_shopping_cart li, #bst-pro-woo-cart-sidebar .shopping-cart-element li, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart li', array(
				'font-family'	   => 'sh_mc_sty_content_font_family',
				'font-weight'	   => 'sh_mc_sty_content_font_weight',
				'text-transform'   => 'sh_mc_sty_content_text_transform',
				'font-style'	   => 'sh_mc_sty_content_text_style',
			), 'sh_mc_sty_content_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('.site-header .shopping-cart-element .bst-site-header-cart .cart_list a:hover, .site-header .woocommerce.widget_shopping_cart .cart_list a:hover, #bst-pro-woo-cart-sidebar .shopping-cart-element .cart_list a:hover, #bst-pro-woo-cart-sidebar .woocommerce.widget_shopping_cart .cart_list a:hover', array(
				'color' => 'sh_mc_sty_content_ptitle_color_hover',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('header.site-header .shopping-cart-element .bst-site-header-cart .product_list_widget li, header.site-header .widget_shopping_cart .product_list_widget li, #bst-pro-woo-cart-sidebar .shopping-cart-element .product_list_widget li, #bst-pro-woo-cart-sidebar .widget_shopping_cart .product_list_widget li', array(
				'border-bottom-color' => 'sh_mc_sty_content_divider_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('header.site-header .shopping-cart-element .bst-site-header-cart, header.site-header .widget_shopping_cart, header.site-header .shopping-cart-element .bst-site-header-cart p, header.site-header .widget_shopping_cart p, header.site-header .shopping-cart-element .bst-site-header-cart li, header.site-header .widget_shopping_cart li, #bst-pro-woo-cart-sidebar .shopping-cart-element, #bst-pro-woo-cart-sidebar .widget_shopping_cart, #bst-pro-woo-cart-sidebar .shopping-cart-element p, #bst-pro-woo-cart-sidebar .widget_shopping_cart p, #bst-pro-woo-cart-sidebar .shopping-cart-element li, #bst-pro-woo-cart-sidebar .widget_shopping_cart li', array(
				'color' => 'sh_mc_sty_content_text_color',
			), '', '');

			$css_output .= bstone_get_shop_customizer_css('header.site-header .shopping-cart-element .bst-site-header-cart .product_list_widget li, header.site-header .widget_shopping_cart .product_list_widget li, #bst-pro-woo-cart-sidebar .shopping-cart-element .product_list_widget li, #bst-pro-woo-cart-sidebar .widget_shopping_cart .product_list_widget li', array(
				'padding-bottom' => 'sh_mc_sty_content_cart_item_padding_bottom',
			), '', '');
			
			/**
			 * Spacing
			 */ 
			$css_output .= bstone_get_responsive_spacings (
				'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product',
				'sh_pl_sty_box_itm_cnt', 'padding',
				'padding', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			$css_output .= bstone_get_responsive_spacings (
				'.woocommerce #primary ul.products li.product .woocommerce-loop-product__title',
				'sh_pl_sty_title', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);
			$css_output .= bstone_get_responsive_spacings (
				'.woocommerce ul.products li.product .bst-woo-product-category',
				'sh_pl_sty_cat', 'margin',
				'margin', '',
				'px',
				array('top', 'bottom', 'right', 'left'),
				array('desktop', 'tablet', 'mobile')
			);

			$css_output .= bstone_sc_responsive_css( '.woocommerce ul.products li.product, .woocommerce-page ul.products li.product', array('margin-bottom'), $shop_item_vertical_spacing, 'px' );

			$css_output .= bstone_get_shop_customizer_css('body #page form.woocommerce-ordering select.orderby', array(
				'color' 		   => 'sh_pl_sty_filter_text_color',
				'background-color' => 'sh_pl_sty_filter_bg_color',
				'border-color' 	   => 'sh_pl_sty_filter_border_color',
				'margin-bottom'    => 'sh_pl_sty_filter_margin_bottom',
				'font-family'	   => 'sh_pl_sty_filter_font_family',
				'font-weight'	   => 'sh_pl_sty_filter_font_weight',
				'text-transform'   => 'sh_pl_sty_filter_text_transform',
				'font-style'	   => 'sh_pl_sty_filter_text_style',
			), 'sh_pl_sty_filter_font_size', '');

			$css_output .= bstone_get_shop_customizer_css('body #primary p.woocommerce-result-count', array(
				'color' 		   => 'sh_pl_sty_filter_item_count_color',
				'margin-bottom'    => 'sh_pl_sty_filter_margin_bottom',
				'font-family'	   => 'sh_pl_sty_filter_font_family',
				'font-weight'	   => 'sh_pl_sty_filter_font_weight',
				'text-transform'   => 'sh_pl_sty_filter_text_transform',
				'font-style'	   => 'sh_pl_sty_filter_text_style',
			), 'sh_pl_sty_filter_font_size', '');

			/**
			 * Font Size
			 */
			$css_output .= bstone_responsive_font_size_css( '.woocommerce-page #primary ul.products li.product .woocommerce-loop-product__title, .woocommerce #primary ul.products li.product .woocommerce-loop-product__title', $shop_item_title_font_size );
			$css_output .= bstone_responsive_font_size_css( '.woocommerce ul.products li.product .bst-woo-product-category', $shop_item_cat_font_size );

			// Spacing in shop archive items
			if ( is_array( $shop_item_horizontal_spacing ) ) {

				$sc_shop_colnum_desktop = 4;
				$sc_shop_colnum_mobile  = 2;
				$sc_shop_colnum_tablet  = 3;

				if( isset( $shop_grid_sp_num['desktop'] ) && '' != $shop_grid_sp_num['desktop'] ) {
					$sc_shop_colnum_desktop = $shop_grid_sp_num['desktop'];
				}

				if( isset( $shop_grid_sp_num['mobile'] ) && '' != $shop_grid_sp_num['mobile'] ) {
					$sc_shop_colnum_mobile = $shop_grid_sp_num['mobile'];
				}

				if( isset( $shop_grid_sp_num['tablet'] ) && '' != $shop_grid_sp_num['tablet'] ) {
					$sc_shop_colnum_tablet = $shop_grid_sp_num['tablet'];
				}

				// Cross sells columns
				$cross_sells_num = bstone_options( 'sh_cc_set_cross_sells_num' );

				switch ( $cross_sells_num ) {
					case 1:
						$cross_sell_width = '100%';
						break;
					case 2:
						$cross_sell_width = '50%';
						break;
					case 3:
						$cross_sell_width = '33.333%';
						break;
					case 4:
						$cross_sell_width = '25%';
						break;
					case 5:
						$cross_sell_width = '20%';
						break;
					case 6:
						$cross_sell_width = '16.66666%';
						break;
					default:
						$cross_sell_width = '48%';
				}

				$bst_shop_hsp_desktop_css = array(
					'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product' => array(
						'margin-left' => ( $shop_item_horizontal_spacing['desktop']/2 ).$shop_item_horizontal_spacing['desktop-unit'],
						'margin-right' => ( $shop_item_horizontal_spacing['desktop']/2 ).$shop_item_horizontal_spacing['desktop-unit'],
						'width'  => 'calc('.bstone_sc_get_cols_width( $sc_shop_colnum_desktop ).' - '.$shop_item_horizontal_spacing['desktop'].$shop_item_horizontal_spacing['desktop-unit'].') !important',
					),
					'.woocommerce ul.products, .woocommerce-page ul.products' => array(
						'margin-left' => '-'.( $shop_item_horizontal_spacing['desktop']/2 ).$shop_item_horizontal_spacing['desktop-unit'],
						'margin-right' => '-'.( $shop_item_horizontal_spacing['desktop']/2 ).$shop_item_horizontal_spacing['desktop-unit'],
					),
					'.woocommerce-cart .cross-sells ul.products.columns-'.$cross_sells_num.' li' => array(
						'margin-left'   => '10px',
						'margin-right'  => '10px',
						'margin-bottom' => '20px',						
					),
					'.woocommerce.woocommerce-cart .cross-sells ul.products, .woocommerce-page.woocommerce-cart .cross-sells ul.products' => array(
						'margin-left'  => '-10px',
						'margin-right' => '-10px',
					),
				);
				$css_output .= bstone_parse_css( $bst_shop_hsp_desktop_css );

				/* Cross-Sell Column Width */
				$bst_shop_cross_col_width_mobile = array(
					'.woocommerce-cart .cross-sells ul.products.columns-'.$cross_sells_num.' li' => array(
						'width' => 'calc(100% - 20px) !important',
					),
				);
				$css_output .= bstone_parse_css( $bst_shop_cross_col_width_mobile, '20' );

				$bst_shop_cross_col_width_tablet = array(
					'.woocommerce-cart .cross-sells ul.products.columns-'.$cross_sells_num.' li' => array(
						'margin-left'   => '10px !important',
						'margin-right'  => '10px !important',
						'width' => 'calc(50% - 20px) !important',
					),
				);
				$css_output .= bstone_parse_css( $bst_shop_cross_col_width_tablet, '481' );

				$bst_shop_cross_col_width_desktop = array(
					'.woocommerce-cart .cross-sells ul.products.columns-'.$cross_sells_num.' li' => array(
						'width' => 'calc('.$cross_sell_width.' - 20px) !important',
					),
				);
				$css_output .= bstone_parse_css( $bst_shop_cross_col_width_desktop, '921' );

				if( isset( $shop_item_horizontal_spacing['mobile'] ) && '' != $shop_item_horizontal_spacing['mobile'] ) {
					$bst_shop_hsp_mobile_css = array(
						'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product' => array(
							'margin-left' => ( $shop_item_horizontal_spacing['mobile']/2 ).$shop_item_horizontal_spacing['mobile-unit'] .' !important',
							'margin-right' => ( $shop_item_horizontal_spacing['mobile']/2 ).$shop_item_horizontal_spacing['mobile-unit'] .' !important',
							'width'  => 'calc('.bstone_sc_get_cols_width( $sc_shop_colnum_mobile ).' - '.$shop_item_horizontal_spacing['mobile'].$shop_item_horizontal_spacing['mobile-unit'].') !important',
						),
						'.woocommerce ul.products, .woocommerce-page ul.products' => array(
							'margin-left' => '-'.( $shop_item_horizontal_spacing['mobile']/2 ).$shop_item_horizontal_spacing['mobile-unit'],
							'margin-right' => '-'.( $shop_item_horizontal_spacing['mobile']/2 ).$shop_item_horizontal_spacing['mobile-unit'],
						),
					);
					$css_output .= bstone_parse_css( $bst_shop_hsp_mobile_css, '120', '480' );
				}

				if( isset( $shop_item_horizontal_spacing['tablet'] ) && '' != $shop_item_horizontal_spacing['tablet'] ) {
					$bst_shop_hsp_tablet_css = array(
						'.woocommerce ul.products li.product, .woocommerce-page ul.products li.product' => array(
							'margin-left' => ( $shop_item_horizontal_spacing['tablet']/2 ).$shop_item_horizontal_spacing['tablet-unit'] .' !important',
							'margin-right' => ( $shop_item_horizontal_spacing['tablet']/2 ).$shop_item_horizontal_spacing['tablet-unit'] .' !important',
							'width'  => 'calc('.bstone_sc_get_cols_width( $sc_shop_colnum_tablet ).' - '.$shop_item_horizontal_spacing['tablet'].$shop_item_horizontal_spacing['tablet-unit'].') !important',
						),
						'.woocommerce ul.products, .woocommerce-page ul.products' => array(
							'margin-left' => '-'.( $shop_item_horizontal_spacing['tablet']/2 ).$shop_item_horizontal_spacing['tablet-unit'],
							'margin-right' => '-'.( $shop_item_horizontal_spacing['tablet']/2 ).$shop_item_horizontal_spacing['tablet-unit'],
						),
					);
					$css_output .= bstone_parse_css( $bst_shop_hsp_tablet_css, '481', '920' );
				}
			}

			if( 'pos-bottom-center' == bstone_options( 'sh_pl_sty_out_stok_position' ) || 'pos-top-center' == bstone_options( 'sh_pl_sty_out_stok_position' ) ) {
				$woo_out_stock_img_align  = array(
					'.woocommerce ul.products li.product .bstone-shop-thumbnail-wrap a' => array(
						'text-align' => 'center',
					),
				);
				$css_output .= bstone_parse_css( $woo_out_stock_img_align );
			}

			if( false === bstone_options( 'sh_pp_set_single_product_sku' ) ) {
				$bst_single_product_sku = array(
					'.woocommerce div.product .product_meta > span.sku_wrapper' => array(
						'display' => 'none',
					),
				);
				$css_output .= bstone_parse_css( $bst_single_product_sku );
			}

			if( false === bstone_options( 'sh_pp_set_single_product_category' ) ) {
				$bst_single_product_category = array(
					'.woocommerce div.product .product_meta > span.posted_in' => array(
						'display' => 'none',
					),
				);
				$css_output .= bstone_parse_css( $bst_single_product_category );
			}

			if( false === bstone_options( 'sh_pp_set_single_product_tags' ) ) {
				$bst_single_product_tags = array(
					'.woocommerce div.product .product_meta > span.tagged_as' => array(
						'display' => 'none',
					),
				);
				$css_output .= bstone_parse_css( $bst_single_product_tags );
			}

			if( true === bstone_options( 'sh_pp_sty_cart_btn_full_width' ) ) {
				$bst_single_product_full_width_cart_button = array(
					'.woocommerce #page .product .summary form .single_add_to_cart_button, .woocommerce #page .product .summary form .woocommerce-variation-add-to-cart' => array(
						'width' => '100%',
					),
				);
				$css_output .= bstone_parse_css( $bst_single_product_full_width_cart_button );
			}

			if ( is_cart() ) {

				$bst_cross_sells = array_filter( array_map( 'wc_get_product', WC()->cart->get_cross_sells() ), 'wc_products_array_filter_visible' );

				if( true === bstone_options( 'sh_cc_set_cross_sells_full_width' ) || false === bstone_options( 'sh_cc_set_enable_cart_cross_sells' ) || 0 === count( $bst_cross_sells ) ) {

					$woo_cross_sells_css_output  = array(
						'.woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals' => array(
							'width' => '100%',
						),
						'.woocommerce .cart-collaterals a.button.wc-forward' => array(
							'display' => 'inline-block',
						),
					);
					$css_output .= bstone_parse_css( $woo_cross_sells_css_output );
				}

			}

			$woo_pgallery_thumb_css  = array(
				'.woocommerce #page div.product div.woocommerce-product-gallery .flex-control-thumbs li' => array(
					'width' => 'calc( '.bstone_options( 'sh_pp_sty_gthumbs_img_width' ).'% - '.(bstone_options( 'sh_pp_sty_gthumbs_img_spacing' )*2).'em)',
					'margin-left' => bstone_get_css_value(  bstone_options( 'sh_pp_sty_gthumbs_img_spacing' ), 'em' ),
					'margin-right' => bstone_get_css_value(  bstone_options( 'sh_pp_sty_gthumbs_img_spacing' ), 'em' ),
					'margin-bottom' => bstone_get_css_value(  (bstone_options( 'sh_pp_sty_gthumbs_img_spacing' )*2), 'em' ),
				),
				'.woocommerce #page div.product div.images.woocommerce-product-gallery .flex-viewport' => array(
					'margin-bottom' => bstone_get_css_value(  (bstone_options( 'sh_pp_sty_gthumbs_img_spacing' )*2), 'em' ),
				),
				'.woocommerce #page div.product div.woocommerce-product-gallery .flex-control-thumbs' => array(
					'margin-left' => '-'.bstone_get_css_value(  bstone_options( 'sh_pp_sty_gthumbs_img_spacing' ), 'em' ),
					'margin-right' => '-'.bstone_get_css_value(  bstone_options( 'sh_pp_sty_gthumbs_img_spacing' ), 'em' ),
				),
			);
			$css_output .= bstone_parse_css( $woo_pgallery_thumb_css );

			$bst_woo_gallery_nav_space  = array(
				'.woocommerce div.product .images.woocommerce-product-gallery--with-images .flex-direction-nav, .woocommerce-page div.product .images.woocommerce-product-gallery--with-images .flex-direction-nav' => array(
					'top' => bstone_get_css_value(  bstone_options( 'sh_pp_sty_img_gnav_top' ), '%' ),
				),
			);
			$css_output .= bstone_parse_css( $bst_woo_gallery_nav_space );

			/** Mini Cart Position */
			$bst_woo_cart_position = bstone_options( 'sh_mc_sty_container_position' );

			if ( is_rtl() ) {
				if( 'left' === $bst_woo_cart_position ) {
					$bst_woo_cart_position = 'right';
				} else if( 'right' === $bst_woo_cart_position ) {
					$bst_woo_cart_position = 'left';

					$bst_woo_mini_cart_rtl_css = array(
						'.woocommerce .bst-site-header-cart .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart' => array(
							'right' => 'auto',
							'left'  =>  '0px',
						),
					);
					$css_output .= bstone_parse_css( $bst_woo_mini_cart_rtl_css );
				}
			}

			if( 'left' === $bst_woo_cart_position ) {

				$bst_woo_mini_cart_position  = array(
					'.woocommerce .bst-site-header-cart:focus .widget_shopping_cart, .woocommerce .bst-site-header-cart:hover .widget_shopping_cart, .bst-site-header-cart:focus .widget_shopping_cart, .bst-site-header-cart:hover .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart' => array(
						'right' => 'auto',
						'left'  =>  bstone_get_css_value(  bstone_options( 'sh_mc_sty_icon_margin_left' ), 'px' ),
					),
					'.woocommerce .bst-site-header-cart .widget_shopping_cart:before, .bst-site-header-cart .widget_shopping_cart:before' => array(
						'right' => 'auto',
						'left'  => '5px',
					),
					'.woocommerce .bst-site-header-cart .widget_shopping_cart:after, .bst-site-header-cart .widget_shopping_cart:after' => array(
						'right' => 'auto',
						'left'  => '9px',
					),
				);
				$css_output .= bstone_parse_css( $bst_woo_mini_cart_position );

				$woo_mini_cart_brdr = bstone_options( 'sh_mc_sty_container_border_width' );

				$bst_woo_mini_cart_position_arrow  = array(
					'.woocommerce .bst-site-header-cart .widget_shopping_cart:before, .bst-site-header-cart .widget_shopping_cart:before' => array(
						'border-width' => bstone_get_css_value(  5+$woo_mini_cart_brdr+$woo_mini_cart_brdr, 'px' ),
						'left'  	   =>  bstone_get_css_value(  9-($woo_mini_cart_brdr+$woo_mini_cart_brdr), 'px' ),
					),
				);
				$css_output .= bstone_parse_css( $bst_woo_mini_cart_position_arrow );

			} else if( 'right' === $bst_woo_cart_position ) {

				$bst_woo_mini_cart_position  = array(
					'.woocommerce .bst-site-header-cart:focus .widget_shopping_cart, .woocommerce .bst-site-header-cart:hover .widget_shopping_cart, .bst-site-header-cart:focus .widget_shopping_cart, .bst-site-header-cart:hover .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart, .bst-site-header-cart .widget_shopping_cart' => array(
						'left'  => 'auto',
						'right' =>  bstone_get_css_value(  bstone_options( 'sh_mc_sty_icon_margin_right' ), 'px' ),
					),
				);
				$css_output .= bstone_parse_css( $bst_woo_mini_cart_position );

				$woo_mini_cart_brdr = bstone_options( 'sh_mc_sty_container_border_width' );

				$bst_woo_mini_cart_position_arrow  = array(
					'.woocommerce .bst-site-header-cart .widget_shopping_cart:before, .bst-site-header-cart .widget_shopping_cart:before' => array(
						'border-width' => bstone_get_css_value(  5+$woo_mini_cart_brdr+$woo_mini_cart_brdr, 'px' ),
						'right'  	   =>  bstone_get_css_value(  9-($woo_mini_cart_brdr+$woo_mini_cart_brdr), 'px' ),
					),
				);
				$css_output .= bstone_parse_css( $bst_woo_mini_cart_position_arrow );
			}

			/* Cart Thumnbail Column Width */
			if( false === bstone_options( 'sh_cc_sty_thumb_show_thumb' ) ) {
				$bst_woo_cart_thumb_col_width  = array(
					'.woocommerce .shop_table_responsive .product-thumbnail, .woocommerce-page .shop_table_responsive .product-thumbnail' => array(
						'width'    => '1px',
						'min-width' => '1px !important',
						'padding'  => '0px',
					),
				);
				$css_output .= bstone_parse_css( $bst_woo_cart_thumb_col_width );
			}

			/* Woocommerce Shop Archive width */
			if ( 'custom' === $woo_shop_archive_width ) :
				// Woocommerce shop archive custom width.
				$site_width  = array(
					'.bst-woo-shop-archive .site-content > .st-container' => array(
						'max-width' => bstone_get_css_value( $woo_shop_archive_max_width, 'px' ),
					),
				);
				$css_output .= bstone_parse_css( $site_width, '769' );

			else :
				// Woocommerce shop archive default width.
				$site_width = array(
					'.bst-woo-shop-archive .site-content > .st-container' => array(
						'max-width' => bstone_get_css_value( $site_content_width + 40, 'px' ),
					),
				);

				/* Parse CSS from array()*/
				$css_output .= bstone_parse_css( $site_width, '769' );
			endif;

			/* Woocommerce Single Product width */
			if ( 'custom' === $woo_single_product_width ) :
				// Woocommerce single product custom width.
				$site_width  = array(
					'.woocommerce.single.single-product .site-content > .st-container' => array(
						'max-width' => bstone_get_css_value( $woo_single_product_max_width, 'px' ),
					),
				);
				$css_output .= bstone_parse_css( $site_width, '769' );

			else :
				// Woocommerce single product default width.
				$site_width = array(
					'.woocommerce.single.single-product .site-content > .st-container' => array(
						'max-width' => bstone_get_css_value( $site_content_width + 40, 'px' ),
					),
				);

				/* Parse CSS from array()*/
				$css_output .= bstone_parse_css( $site_width, '769' );
			endif;

			// wp_add_inline_style( 'woocommerce-general', apply_filters( 'bstone_theme_woocommerce_dynamic_css', $css_output ) );

			/**
			 * Customizer CSS Output
			 */
			if( 'file' == bstone_options( 'bstone-css-location' ) ) {
				global $wp_filesystem;
				
				$upload_dir = wp_upload_dir();
				
				$dir = trailingslashit( $upload_dir['basedir'] ) . 'bstone-woo'. DIRECTORY_SEPARATOR; // Set storage directory path
				
				if ( empty( $wp_filesystem ) ) {
					require_once( ABSPATH .'/wp-admin/includes/file.php' );
					WP_Filesystem();
				}
				
				if ( $wp_filesystem ) {

					$wp_filesystem->mkdir( $dir ); // Make a new folder 'bstone' for storing our file if not created already.
					
					$existing_file = $dir . 'woo-styles.min.css';
					
					$existing_css = $wp_filesystem->get_contents( $existing_file );
					
					$bstone_custom_css_output = apply_filters( 'bstone_theme_woocommerce_dynamic_css', $css_output );
					
					if ( $existing_css !== $bstone_custom_css_output ) {
						$wp_filesystem->put_contents( $existing_file, $bstone_custom_css_output, FS_CHMOD_FILE );

						self::update_global_assets_timestamp();
					}
					
					wp_enqueue_style( 'bstone-woocommerce-styles', $upload_dir['baseurl'].'/bstone-woo/' . 'woo-styles.min.css', array(), self::global_assets_timestamp() );

				} else {
					wp_add_inline_style( 'woocommerce-general', apply_filters( 'bstone_theme_woocommerce_dynamic_css', $css_output ) );
				}
			} else {
				wp_add_inline_style( 'woocommerce-general', apply_filters( 'bstone_theme_woocommerce_dynamic_css', $css_output ) );
			}

			/**
			 * YITH WooCommerce Wishlist Style
			 */
			$yith_wcwl_main_style = array(
				'.yes-js.js_active .bst-plain-container.bst-single-post #primary' => array(
					'margin' => esc_attr( '4em 0' ),
				),
				'.js_active .bst-plain-container.bst-single-post .entry-header' => array(
					'margin-top' => esc_attr( '0' ),
				),
				'.woocommerce table.wishlist_table' => array(
					'font-size' => esc_attr( '100%' ),
				),
				'.woocommerce table.wishlist_table tbody td.product-name' => array(
					'font-weight' => esc_attr( '700' ),
				),
				'.woocommerce table.wishlist_table thead th' => array(
					'border-top' => esc_attr( '0' ),
				),
				'.woocommerce table.wishlist_table tr td.product-remove' => array(
					'padding' => esc_attr( '.7em 1em' ),
				),
				'.woocommerce table.wishlist_table tbody td' => array(
					'border-right' => esc_attr( '0' ),
				),
				'.woocommerce .wishlist_table td.product-add-to-cart a' => array(
					'display' => esc_attr( 'inherit !important' ),
				),
				'.wishlist_table tr td, .wishlist_table tr th.wishlist-delete, .wishlist_table tr th.product-checkbox' => array(
					'text-align' => esc_attr( 'left' ),
				),
				'.woocommerce #content table.wishlist_table.cart a.remove' => array(
					'display'        => esc_attr( 'inline-block' ),
					'vertical-align' => esc_attr( 'middle' ),
					'font-size'      => esc_attr( '18px' ),
					'font-weight'    => esc_attr( 'normal' ),
					'width'          => esc_attr( '24px' ),
					'height'         => esc_attr( '24px' ),
					'line-height'    => esc_attr( '21px' ),
					'color'          => esc_attr( '#ccc !important' ),
					'text-align'     => esc_attr( 'center' ),
					'border'         => esc_attr( '1px solid #ccc' ),
				),
				'.woocommerce #content table.wishlist_table.cart a.remove:hover' => array(
					'color'            => esc_attr( $link_color . '!important' ),
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( '#ffffff' ),
				),
			);
			/* Parse CSS from array() */
			$yith_wcwl_main_style = bstone_parse_css( $yith_wcwl_main_style );

			$yith_wcwl_main_style_small = array(
				'.yes-js.js_active .bst-plain-container.bst-single-post #primary' => array(
					'padding' => esc_attr( '1.5em 0' ),
					'margin'  => esc_attr( '0' ),
				),
			);
			/* Parse CSS from array()*/
			$yith_wcwl_main_style .= bstone_parse_css( $yith_wcwl_main_style_small, '', '768' );

			wp_add_inline_style( 'yith-wcwl-main', $yith_wcwl_main_style );
		}

		/**
		 * Register Customizer sections and panel for woocommerce
		 *
		 * @since 1.1.6
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 */
		function customize_register( $wp_customize ) {

			/**
			 * Register Sections & Panels
			 */
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/register-panels-and-sections.php';

			/**
			 * Sections
			 */
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-pl-settings.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-pl-styles.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-pp-settings.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-pp-styles.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-cc-settings.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-cc-styles.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/sc-mc-styles.php';
			require BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/shop-customizer/sections/section-setting-buttons.php';

		}

		/**
		 * Add Cart icon markup
		 *
		 * @param String $output Markup.
		 * @param String $section Section name.
		 * @param String $section_type Section selected option.
		 * @return Markup String.
		 *
		 * @since 1.1.6
		 */
		function bstone_header_cart( $output, $section, $section_type ) {

			if ( 'woocommerce' === $section_type && apply_filters( 'bstone_woo_header_cart_icon', true ) ) {

				$output = $this->woo_mini_cart_markup();
			}

			return $output;
		}

		/**
		 * Woocommerce mini cart markup markup
		 *
		 * @since 1.1.6
		 * @return html
		 */
		function woo_mini_cart_markup() {

			if ( is_cart() ) {
				$class = 'current-menu-item';
			} else {
				$class = '';
			}

			$cart_menu_classes = apply_filters( 'bstone_cart_in_menu_class', array( 'bst-menu-cart-with-border' ) );

			ob_start();
			?>
			<div id="bst-site-header-cart" class="bst-site-header-cart <?php echo esc_html( implode( ' ', $cart_menu_classes ) ); ?>">
				<div class="bst-site-header-cart-li <?php echo esc_attr( $class ); ?>">
					<?php $this->bstone_get_cart_link(); ?>
				</div>
				<div class="bst-site-header-cart-data">
					<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
				</div>
			</div>
			<?php
			return ob_get_clean();
		}

		/**
		 * Add Cart icon markup
		 *
		 * @param Array $options header options array.
		 *
		 * @return Array header options array.
		 * @since 1.1.6
		 */
		function header_section_elements( $options ) {

			$options['woocommerce'] = 'WooCommerce';

			return $options;
		}

		/**
		 * Cart Link
		 * Displayed a link to the cart including the number of items present and the cart total
		 *
		 * @return void
		 * @since  1.1.6
		 */
		function bstone_get_cart_link() {

			$view_shopping_cart  = apply_filters( 'bstone_woo_view_shopping_cart_title', __( 'View your shopping cart', 'bstone' ) );

			?>
			<a class="cart-container" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( $view_shopping_cart ); ?>">

				<?php
				do_action( 'bstone_woo_header_cart_icons_before' );

				if ( apply_filters( 'bstone_woo_default_header_cart_icon', true ) ) {
				?>
					<div class="bst-cart-menu-wrap">
					
						<span class="count"> 
							<?php
							if ( apply_filters( 'bstone_woo_header_cart_total', true ) && null != WC()->cart ) {
								echo WC()->cart->get_cart_contents_count();
							}
							?>
						</span>
					</div>
				<?php
				}

				do_action( 'bstone_woo_header_cart_icons_after' );

				?>
			</a>
		<?php
		}

		/**
		 * Cart Link
		 * Displayed a link to the cart including the number of items present and the cart total
		 *
		 * @return void
		 * @since  1.1.6
		 */
		function bstone_get_cart_link_with_extra_details() {

			$view_shopping_cart  = apply_filters( 'bstone_woo_view_shopping_cart_title', __( 'View your shopping cart', 'bstone' ) );
			$shopping_cart_item  = apply_filters( 'bstone_woo_shopping_cart_item', __( 'Item', 'bstone' ) );
			$shopping_cart_items = apply_filters( 'bstone_woo_shopping_cart_items', __( 'Items', 'bstone' ) );
			
			$shopping_cart_label = apply_filters( 'bstone_woo_shopping_cart_label', __( 'My Cart', 'bstone' ) );

			$my_cart_markup = '<span class="mycart">'.$shopping_cart_label.'</span>';
			$cart_items_markup = '';

			if( 1 === WC()->cart->get_cart_contents_count() ) {
				$cart_items_markup = ' '.$shopping_cart_item;
			} else {
				$cart_items_markup = ' '.$shopping_cart_items;
			}

			?>
			<a class="cart-container" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr( $view_shopping_cart ); ?>">

				<?php
				do_action( 'bstone_woo_header_cart_icons_before' );

				if ( apply_filters( 'bstone_woo_default_header_cart_icon', true ) ) {
				?>
					<div class="bst-cart-menu-wrap">
						<?php echo $my_cart_markup; ?>
						<span class="count"> 
							<?php
							if ( apply_filters( 'bstone_woo_header_cart_total', true ) && null != WC()->cart ) {
								echo WC()->cart->get_cart_contents_count().$cart_items_markup;
							}
							?>
						</span>
					</div>
				<?php
				}

				do_action( 'bstone_woo_header_cart_icons_after' );

				?>
			</a>
		<?php
		}

		/**
		 * Cart Fragments
		 * Ensure cart contents update when products are added to the cart via AJAX
		 *
		 * @param  array $fragments Fragments to refresh via AJAX.
		 * @return array            Fragments to refresh via AJAX
		 */
		function cart_link_fragment( $fragments ) {

			ob_start();
			$this->bstone_get_cart_link();
			$cart_update_normal = ob_get_clean();			

			ob_start();
			$this->bstone_get_cart_link_with_extra_details();
			$cart_update_w_details = ob_get_clean();

			$fragments['.bst-site-header-cart a.cart-container'] = $cart_update_normal;
			$fragments['.bst-outer-cart-container a.cart-container'] = $cart_update_normal;
			$fragments['.bst-outer-cart-container-details a.cart-container'] = $cart_update_w_details;

			return $fragments;
		}
    }
endif;

if ( apply_filters( 'bstone_enable_woocommerce_integration', true ) ) {
	Bstone_Woocommerce::get_instance();
}