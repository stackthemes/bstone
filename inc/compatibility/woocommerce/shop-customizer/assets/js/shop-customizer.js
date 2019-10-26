/**
 * Shop Customizer controls toggle
 *
 * @package Bstone
 */

( function( $ ) {

    /* Internal shorthand */
    var api = wp.customize;
    
    /**
	 * Helper class that contains data for showing and hiding controls.
	 *
	 * @since 1.1.6
	 * @class BstoneShopCustomizerToggles
	 */
	BstoneShopCustomizerToggles = {

        // WooCommerce Shop Content Width
		'bstone-settings[sh_pl_sty_cnt_content_width]' :
		[
			{
				controls: [
					'bstone-settings[sh_pl_sty_cnt_content_width_custom]',
				],
				callback: function( value ) {					
					if ( 'custom' === value ) {
						return true;
					}
					return false;
				}
			},
        ],

        // WooCommerce Single Product Content Width
		'bstone-settings[sh_pp_sty_playout_content_width]' :
		[
			{
				controls: [
					'bstone-settings[sh_pp_sty_playout_content_width_custom]',
				],
				callback: function( value ) {					
					if ( 'custom' === value ) {
						return true;
					}
					return false;
				}
			},
		],

        // WooCommerce Single Product Thumbnails
		'bstone-settings[sh_pp_sty_img_orientation]' :
		[
			{
				controls: [
					'bstone-settings[sh_pp_sty_img_thumb_alignment]',
				],
				callback: function( value ) {					
					if ( 'horizontal' === value ) {
						return true;
					}
					return false;
				}
			},
		],

        // WooCommerce Single Product Custom Image Size
		'bstone-settings[sh_pp_sty_img_custom_size_toggle]' :
		[
			{
				controls: [
					'bstone-settings[sh_pp_sty_img_custom_size]',
				],
				callback: function( value ) {					
					if ( 'true' === value || true === value ) {
						return true;
					}
					return false;
				}
			},
		],

        // WooCommerce Cart Page Cross Sells
		'bstone-settings[sh_cc_set_enable_cart_cross_sells]' :
		[
			{
				controls: [
					'bstone-settings[sh_cc_set_cross_sells_num]',
					'bstone-settings[sh_cc_set_cross_sells_full_width]',
				],
				callback: function( value ) {					
					if ( 'true' === value || true === value ) {
						return true;
					}
					return false;
				}
			},
		],
		
		
		
		// Product Single Meta
		'bstone-settings[sh_pp_set_product_main_structure]' :
		[
			{
				controls: [
					'bstone-settings[sh_pp_set_single_product_category]',
					'bstone-settings[sh_pp_set_single_product_tags]',
					'bstone-settings[sh_pp_set_single_product_sku]',
					'bstone-settings[sh_pp_set_product_single_meta_devider]',
				],
				callback: function( value ) {
					if ( true === value.includes('meta') ) {
						return true;
					}
					return false;
				}
			},
		],
        
    };


} )( wp, jQuery );