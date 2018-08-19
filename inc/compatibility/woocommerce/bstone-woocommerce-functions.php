<?php
/**
 * Custom functions that used for Woocommerce compatibility.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.1.6
 */

/**
 * Shop Customizer URI
 */
define( 'BSTONE_SC_URI', get_template_directory_uri() . '/inc/compatibility/woocommerce/shop-customizer/' ); 

/**
 * Schop Customizer Scripts
 */
add_action( 'customize_controls_enqueue_scripts', 'my_customize_controls_enqueue_scripts' );

function my_customize_controls_enqueue_scripts() {
	/*
	 * Our Customizer script
	 *
	 * Dependencies: Customizer Controls script (core)
	 */
	wp_enqueue_script( 'wc-bst-shop-customizer', BSTONE_SC_URI . 'assets/js/shop-customizer.js', array( 'customize-controls' ) );
}

/**
 * Shop page - Products Title markup updated
 */
if ( ! function_exists( 'bstone_woo_shop_products_title' ) ) :

	/**
	 * Shop Page product titles with anchor
	 *
	 * @hooked woocommerce_after_shop_loop_item - 10
	 *
	 * @since 1.1.6
	 */
	function bstone_woo_shop_products_title() {
		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">';

		echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';

		echo '</a>';
	}

endif;

/**
 * Shop page - Parent Category
 */
if ( ! function_exists( 'bstone_woo_shop_parent_category' ) ) :
	/**
	 * Add and/or Remove Categories from shop archive page.
	 *
	 * @hooked woocommerce_after_shop_loop_item - 9
	 *
	 * @since 1.1.6
	 */
	function bstone_woo_shop_parent_category() {
		if ( apply_filters( 'bstone_woo_shop_parent_category', true ) ) : ?>
			<span class="bst-woo-product-category">
				<?php
				global $product;
				$product_categories = function_exists( 'wc_get_product_category_list' ) ? wc_get_product_category_list( get_the_ID(), ';', '', '' ) : $product->get_categories( ';', '', '' );

				$product_categories = htmlspecialchars_decode( strip_tags( $product_categories ) );
				if ( $product_categories ) {
					list( $parent_cat ) = explode( ';', $product_categories );
					echo esc_html( $parent_cat );
				}

				?>
			</span> 
			<?php
		endif;
	}
endif;

/**
 * Shop page - Out of Stock
 */
if ( ! function_exists( 'bstone_woo_shop_out_of_stock' ) ) :
	/**
	 * Add Out of Stock to the Shop page
	 *
	 * @hooked woocommerce_shop_loop_item_title - 8
	 *
	 * @since 1.1.6
	 */
	function bstone_woo_shop_out_of_stock() {
		$out_of_stock        = get_post_meta( get_the_ID(), '_stock_status', true );
		$out_of_stock_string = apply_filters( 'bstone_woo_shop_out_of_stock_string', __( 'Out of stock', 'bstone' ) );
		if ( 'outofstock' === $out_of_stock ) {
		?>
			<span class="bst-shop-product-out-of-stock"><?php echo esc_html( $out_of_stock_string ); ?></span>
		<?php
		}
	}

endif;

/**
 * Shop page - Short Description
 */
if ( ! function_exists( 'bstone_woo_shop_product_short_description' ) ) :
	/**
	 * Product short description
	 *
	 * @hooked woocommerce_after_shop_loop_item
	 *
	 * @since 1.1.6
	 */
	function bstone_woo_shop_product_short_description() {
	?>
	<?php if ( has_excerpt() ) { ?>
		<div class="bst-woo-shop-product-description">
			<?php the_excerpt(); ?>
		</div>
	<?php } ?>
	<?php
	}
endif;
/**
 * Product page - Availability: in stock
 */
if ( ! function_exists( 'bstone_woo_product_in_stock' ) ) :
	/**
	 * Availability: in stock string updated
	 *
	 * @param  string $markup  Markup.
	 * @param  object $product Object of Product.
	 *
	 * @since 1.1.6
	 */
	function bstone_woo_product_in_stock( $markup, $product ) {

		if ( is_product() ) {
			$product_avail  = $product->get_availability();
			$stock_quantity = $product->get_stock_quantity();
			$availability   = $product_avail['availability'];
			if ( ! empty( $availability ) && $stock_quantity ) {
				ob_start();
				?>
				<p class="bst-stock-detail">
					<span class="bst-stock-avail"><?php esc_html_e( 'Availability:', 'bstone' ); ?></span>
					<span class="stock in-stock"><?php echo esc_html( $availability ); ?></span>
				</p>
				<?php
				$markup = ob_get_clean();
			}
		}

		return $markup;
	}
endif;

if ( ! function_exists( 'bstone_woo_woocommerce_template_loop_product_title' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function bstone_woo_woocommerce_template_loop_product_title() {

		echo '<a href="' . esc_url( get_the_permalink() ) . '" class="bst-loop-product__link">';
			woocommerce_template_loop_product_title();
		echo '</a>';
	}
}

if( ! function_exists( 'bstone_woocommerce_template_loop_add_to_cart' ) ) {

	/**
	 * Show add to cart button in product loop on shop page.
	 */
	function bstone_woocommerce_template_loop_add_to_cart(){
		echo '<div class="bst-add-to-cart-btn-shop">';
		woocommerce_template_loop_add_to_cart();
		echo '</div>';
	}
}

if ( ! function_exists( 'bstone_woo_woocommerce_shop_product_content' ) ) {

	/**
	 * Show the product title in the product loop. By default this is an H2.
	 */
	function bstone_woo_woocommerce_shop_product_content() {

		$shop_structure = apply_filters( 'bstone_woo_shop_product_structure', bstone_options( 'sh_pl_set_shop_item_structure' ) );

		if ( is_array( $shop_structure ) && ! empty( $shop_structure ) ) {

			do_action( 'bstone_woo_shop_before_summary_wrap' );
			echo '<div class="bstone-shop-summary-wrap">';
			do_action( 'bstone_woo_shop_summary_wrap_top' );

			foreach ( $shop_structure as $value ) {

				switch ( $value ) {
					case 'title':
						/**
						 * Add Product Title on shop page for all products.
						 */
						do_action( 'bstone_woo_shop_title_before' );
						bstone_woo_woocommerce_template_loop_product_title();
						do_action( 'bstone_woo_shop_title_after' );
						break;
					case 'price':
						/**
						 * Add Product Price on shop page for all products.
						 */
						do_action( 'bstone_woo_shop_price_before' );
						woocommerce_template_loop_price();
						do_action( 'bstone_woo_shop_price_after' );
						break;
					case 'ratings':
						/**
						 * Add rating on shop page for all products.
						 */
						do_action( 'bstone_woo_shop_rating_before' );
						woocommerce_template_loop_rating();
						do_action( 'bstone_woo_shop_rating_after' );
						break;
					case 'short_desc':
						do_action( 'bstone_woo_shop_short_description_before' );
						bstone_woo_shop_product_short_description();
						do_action( 'bstone_woo_shop_short_description_after' );
						break;
					case 'add_cart':
						do_action( 'bstone_woo_shop_add_to_cart_before' );
						bstone_woocommerce_template_loop_add_to_cart();
						do_action( 'bstone_woo_shop_add_to_cart_after' );
						break;
					case 'category':
						/**
						 * Add and/or Remove Categories from shop archive page.
						 */
						do_action( 'bstone_woo_shop_category_before' );
						bstone_woo_shop_parent_category();
						do_action( 'bstone_woo_shop_category_after' );
						break;
					default:
						break;
				}
			}

			do_action( 'bstone_woo_shop_summary_wrap_bottom' );
			echo '</div>';
			do_action( 'bstone_woo_shop_after_summary_wrap' );
		}
	}
}

if( ! function_exists( 'bstone_woocommerce_template_single_excerpt' ) ) {

	/**
	 * Single Product Short Description
	 */
	function bstone_woocommerce_template_single_excerpt() {
		echo '<div class="bst-sp-short-description">';
		woocommerce_template_single_excerpt();
		echo '</div>';
	}
}

if ( ! function_exists( 'bstone_woo_woocommerce_single_product_content' ) ) {
	/**
	 * Single Product Content Structure
	 */
	function bstone_woo_woocommerce_single_product_content() {

		$single_product_structure = apply_filters( 'bstone_woo_single_product_structure', bstone_options( 'sh_pp_set_product_main_structure' ) );

		if ( is_array( $single_product_structure ) && ! empty( $single_product_structure ) ) {

			do_action( 'bstone_woo_single_product_before_summary_wrap' );
			echo '<div class="bstone-single-product-summary-wrap">';
			do_action( 'bstone_woo_single_product_summary_wrap_top' );

			foreach ( $single_product_structure as $value ) {

				switch ( $value ) {
					case 'title':
						/**
						 * Add Product Title on single product page
						 */
						do_action( 'bstone_woo_single_product_title_before' );
						woocommerce_template_single_title();
						do_action( 'bstone_woo_single_product_title_after' );
						break;
					case 'ratings':
						/**
						 * Add rating on single product page
						 */
						do_action( 'bstone_woo_single_product_rating_before' );
						woocommerce_template_single_rating();
						do_action( 'bstone_woo_single_product_rating_after' );
						break;
					case 'price':
						/**
						 * Add Product Price on single product page
						 */
						do_action( 'bstone_woo_single_product_price_before' );
						woocommerce_template_single_price();
						do_action( 'bstone_woo_single_product_price_after' );
						break;
					case 'short_desc':						
						/**
						 * Add short description on single product page
						 */
						do_action( 'bstone_woo_single_product_short_description_before' );
						bstone_woocommerce_template_single_excerpt();
						do_action( 'bstone_woo_single_product_short_description_after' );
						break;
					case 'add_cart':						
						/**
						 * Add cart button on single product page
						 */
						do_action( 'bstone_woo_single_product_addto_cart_btn_before' );
						woocommerce_template_single_add_to_cart();
						do_action( 'bstone_woo_single_product_addto_cart_btn_after' );
						break;
					case 'meta':
						/**
						 * Add product meta single product page
						 */
						do_action( 'bstone_woo_single_product_meta_before' );
						woocommerce_template_single_meta();
						do_action( 'bstone_woo_single_product_meta_after' );
						break;
					default:
						break;
				}
			}

			do_action( 'bstone_woo_single_product_summary_wrap_bottom' );
			echo '</div>';
			do_action( 'bstone_woo_single_product_after_summary_wrap' );
		}
	}
}

if ( ! function_exists( 'bstone_woo_shop_thumbnail_wrap_start' ) ) {

	/**
	 * Thumbnail wrap start.
	 */
	function bstone_woo_shop_thumbnail_wrap_start() {

		echo '<div class="bstone-shop-thumbnail-wrap">';
	}
}

if ( ! function_exists( 'bstone_woo_shop_thumbnail_wrap_end' ) ) {

	/**
	 * Thumbnail wrap end.
	 */
	function bstone_woo_shop_thumbnail_wrap_end() {

		echo '</div>';
	}
}


/**
 * Woocommerce filter - Widget Products Tags
 */
if ( ! function_exists( 'bstone_widget_product_tag_cloud_args' ) ) {

	/**
	 * Woocommerce filter - Widget Products Tags
	 *
	 * @param  array $args Tag arguments.
	 * @return array       Modified tag arguments.
	 */
	function bstone_widget_product_tag_cloud_args( $args = array() ) {

		$sidebar_link_font_size            = bstone_options( 'font-size-body' );
		$sidebar_link_font_size['desktop'] = ( '' != $sidebar_link_font_size['desktop'] ) ? $sidebar_link_font_size['desktop'] : 15;

		$args['smallest'] = intval( $sidebar_link_font_size['desktop'] ) - 2;
		$args['largest']  = intval( $sidebar_link_font_size['desktop'] ) + 3;
		$args['unit']     = 'px';

		return apply_filters( 'bstone_widget_product_tag_cloud_args', $args );
	}
	add_filter( 'woocommerce_product_tag_cloud_widget_args', 'bstone_widget_product_tag_cloud_args', 90 );

}

/**
 * Woocommerce shop/product div close tag.
 */
if ( ! function_exists( 'bstone_woocommerce_div_wrapper_close' ) ) :

	/**
	 * Woocommerce shop/product div close tag.
	 *
	 * @return void
	 */
	function bstone_woocommerce_div_wrapper_close() {

		echo '</div>';

	}

endif;

/**
 * Get Shop Container Type
 */
function bst_get_woo_shop_container_type( $site_content_layout ) {
	
	$shop_cnt_layout = bstone_get_option_meta( 'site-content-layout', '', true );

	if ( empty( $shop_cnt_layout ) || 'default' == $shop_cnt_layout ) {

		if ( is_shop() || is_product_taxonomy() || is_checkout() || is_cart() || is_account_page() ) {

			$shop_cnt_layout = bstone_options( 'sh_pl_set_woo_shop_layout' );

		} elseif ( is_product() ) {

			$shop_cnt_layout = bstone_options( 'sh_pp_set_woo_single_layout' );
		}
	}

	if( 'default' != $shop_cnt_layout && ! empty( $shop_cnt_layout ) ) {
		$site_content_layout = $shop_cnt_layout;
	}

	return $site_content_layout;
}
add_filter( 'bstone_page_container_type', 'bst_get_woo_shop_container_type' );

/**
 * Get Responsive Spacing
 */
if ( ! function_exists( 'bstone_sc_responsive_css' ) ) {

	/**
	 * Get Spacing CSS value
	 *
	 * @param  array  $spacing    CSS value.
	 * @param  array  $properties	CSS properties.
	 * @param  string $selector  CSS selector.
	 * @return mixed
	 */
	function bstone_sc_responsive_css( $selector, $properties, $value ) {

		$css_output = '';

		foreach ( $properties as $property) {
			
			if ( is_array( $value ) ) {

				$desktop_get_css = array(
					$selector => array(
						$property => $value['desktop'].$value['desktop-unit'],
					),
				);

				$css_output .= bstone_parse_css( $desktop_get_css );

				if( isset( $value['mobile'] ) && '' != $value['mobile'] ) {
					$mobile_bet_css = array(
						$selector => array(
							$property => $value['mobile'].$value['mobile-unit'],
						),
					);

					$css_output .= bstone_parse_css( $mobile_bet_css, '120', '480' );
				}

				if( isset( $value['tablet'] ) && '' != $value['tablet'] ) {
					$tablet_get_css = array(
						$selector => array(
							$property => $value['tablet'].$value['tablet-unit'],
						),
					);
					$css_output .= bstone_parse_css( $tablet_get_css, '481', '920' );
				}
			}			
		}

		return $css_output;
	}
}// End if().

/**
 * Get Responsive Spacing
 */
if ( ! function_exists( 'bstone_sc_get_cols_width' ) ) {

	/**
	 * Get columns width
	 *
	 * @param  string  $col_num    Number of columns.
	 * @return string
	 */
	function bstone_sc_get_cols_width( $col_num ) {
		$shop_sp_col_width = '25%';
		
		switch ( $col_num ) {
			case "1":
				$shop_sp_col_width = '100%';
				break;
			case "2":
				$shop_sp_col_width = '50%';
				break;
			case "3":
				$shop_sp_col_width = '33.3333333333%';
				break;
			case "4":
				$shop_sp_col_width = '25%';
				break;
			case "5":
				$shop_sp_col_width = '20%';
				break;
			case "6":
				$shop_sp_col_width = '16.6666666667%';
				break;
			default:
				$shop_sp_col_width = '25%';
		}

		return $shop_sp_col_width;
	}
}// End if().

/**
 * Generate CSS
 */
if ( ! function_exists( 'bstone_get_shop_customizer_css' ) ) {
	/**
	 * @param  string   $selector    		css selector
	 * @param  array    $data    	 		css property and customzier control
	 * @param  string   $data_font_size 	font size control
	 * @param  array    $data_spacing 		spacing control, type (margin, padding or both) and unit etc
	 * @return mix		CSS Code
	 */
	function bstone_get_shop_customizer_css( $selector, $data, $data_font_size, $data_spacing ) {
		$css_output = array(
			$selector => array(),
		);

		$default_font_family = bstone_options( 'default-body-font-family' );
		$default_font_waight = bstone_options( 'default-body-font-weight' );

		if( is_array( $data ) ) {
			foreach ( $data as $key => $value) {
				
				switch ( $key ) {
	
					case "font-family":
						$font_family   = bstone_options( 'default-body-font-family' );
						if( 'inherit' != bstone_options( $value ) ) {
							$font_family   = bstone_options( $value );
						}
						$css_output[$selector][$key] = "'".bstone_get_css_value( $font_family, 'font' )."'";
						break;
	
					case "font-weight":
						$font_weight   = bstone_options( 'default-body-font-weight' );
						if( 'inherit' != bstone_options( $value ) ) {
							$font_weight   = bstone_options( $value );
						}
						$css_output[$selector][$key] = esc_attr( $font_weight );
						break;
					
					case "color":
					case "background-color":
					case "text-transform":
					case "font-style":
					case "text-align":
						$css_output[$selector][$key] = esc_attr( bstone_options( $value ) );
						break;
	
					case "line-height":
						$css_output[$selector][$key] = bstone_get_css_value( bstone_options( $value ), 'em' );
						break;
	
					case "font-size":
					case "border-width":
					case "border-top-width":
					case "border-bottom-width":
					case "border-left-width":
					case "border-right-width":
					case "border-radius":
					case "width":
					case "height":
					case "max-height":
					case "max-width":
					case "padding-top":
					case "padding-bottom":
					case "padding-left":
					case "padding-right":
					case "margin-top":
					case "margin-bottom":
					case "margin-left":
					case "margin-right":
						$css_output[$selector][$key] = bstone_get_css_value( bstone_options( $value ), 'px' );
						break;
	
					case "border-color":
					case "border-top-color":
					case "border-bottom-color":
					case "border-left-color":
					case "border-right-color":
						$css_output[$selector][$key] = esc_attr( bstone_options( $value ) );
						break;
	
					case "position-x-y":
						$pos_val = bstone_options( $value );

						if( is_rtl() ) {
							if( "pos-top-right" == $pos_val ) {
								$css_output[$selector]['top']  	 = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								$css_output[$selector]['left']  = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['right'] 	 = 'auto';
								$css_output[$selector]['bottom'] = 'auto';
		
							} else if( "pos-top-left" == $pos_val ) {
								$css_output[$selector]['top']  	 = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								$css_output[$selector]['left']  = 'auto';
								$css_output[$selector]['right'] 	 = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['bottom'] = 'auto';
								
							} else if( "pos-bottom-right" == $pos_val ) {
								$css_output[$selector]['top']  	 = 'auto';
								$css_output[$selector]['left']  = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['right'] 	 = 'auto';
								$css_output[$selector]['bottom'] = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								
							} else if( "pos-bottom-left" == $pos_val ) {
								$css_output[$selector]['top']  	 = 'auto';
								$css_output[$selector]['left']  = 'auto';
								$css_output[$selector]['right'] 	 = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['bottom'] = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								
							} else if( "pos-top-center" == $pos_val ) {
								$css_output[$selector]['top']  	 = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								$css_output[$selector]['left']  = 'auto';
								$css_output[$selector]['right'] 	 = 'auto';
								$css_output[$selector]['bottom'] = 'auto';
								
							} else if( "pos-bottom-center" == $pos_val ) {
								$css_output[$selector]['top']  	 = 'auto';
								$css_output[$selector]['left']  = 'auto';
								$css_output[$selector]['right'] 	 = 'auto';
								$css_output[$selector]['bottom'] = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
							}
						} else {
							if( "pos-top-right" == $pos_val ) {
								$css_output[$selector]['top']  	 = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								$css_output[$selector]['right']  = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['left'] 	 = 'auto';
								$css_output[$selector]['bottom'] = 'auto';
		
							} else if( "pos-top-left" == $pos_val ) {
								$css_output[$selector]['top']  	 = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								$css_output[$selector]['right']  = 'auto';
								$css_output[$selector]['left'] 	 = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['bottom'] = 'auto';
								
							} else if( "pos-bottom-right" == $pos_val ) {
								$css_output[$selector]['top']  	 = 'auto';
								$css_output[$selector]['right']  = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['left'] 	 = 'auto';
								$css_output[$selector]['bottom'] = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								
							} else if( "pos-bottom-left" == $pos_val ) {
								$css_output[$selector]['top']  	 = 'auto';
								$css_output[$selector]['right']  = 'auto';
								$css_output[$selector]['left'] 	 = bstone_get_css_value( bstone_options( $value.'_x' ), 'px' );
								$css_output[$selector]['bottom'] = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								
							} else if( "pos-top-center" == $pos_val ) {
								$css_output[$selector]['top']  	 = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
								$css_output[$selector]['right']  = 'auto';
								$css_output[$selector]['left'] 	 = 'auto';
								$css_output[$selector]['bottom'] = 'auto';
								
							} else if( "pos-bottom-center" == $pos_val ) {
								$css_output[$selector]['top']  	 = 'auto';
								$css_output[$selector]['right']  = 'auto';
								$css_output[$selector]['left'] 	 = 'auto';
								$css_output[$selector]['bottom'] = bstone_get_css_value( bstone_options( $value.'_y' ), 'px' );
							}
						}
						break;
	
					default:
				}
	
			}
		}

		$final_css_output = bstone_parse_css( $css_output );

		if( isset( $data_font_size ) ) {
			$final_css_output .= bstone_responsive_font_size_css( $selector, bstone_options( $data_font_size ) );
		}

		if( is_array( $data_spacing ) ) {
			if( 'both' == $data_spacing[0] ) {

				$final_css_output .= bstone_get_responsive_spacings (
					$selector,
					$data_spacing[1], 'margin',
					'margin', $data_spacing[2],
					$data_spacing[3],
					$data_spacing[4],
					$data_spacing[5]
				);

				$final_css_output .= bstone_get_responsive_spacings (
					$selector,
					$data_spacing[1],'padding',
					'padding', $data_spacing[2],
					$data_spacing[3],
					$data_spacing[4],
					$data_spacing[5]
				);

			} else if( 'padding' == $data_spacing[0] || 'margin' == $data_spacing[0] ) {

				$final_css_output .= bstone_get_responsive_spacings (
					$selector,
					$data_spacing[1], $data_spacing[0],
					$data_spacing[0], $data_spacing[2],
					$data_spacing[3],
					$data_spacing[4],
					$data_spacing[5]
				);

			}
		}

		return $final_css_output;
	}
}
