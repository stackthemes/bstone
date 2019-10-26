<?php
/**
 * Register customizer panels & sections for WooCommerce.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.1.6
 */

$wp_customize->add_setting( 'sc_shop_pages', array(
	'type' => 'option',
	'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_html' ),
) );

$wp_customize->add_control(
	new SC_Dialog_Control(
		$wp_customize, 
		'sc_shop_pages',
		array(
			'section' => 'bstone-shop-customizer',
			'buttons' => array(
				'sc_s_pl_dialog' => __( 'Product List', 'bstone' ),
				'sc_s_pp_dialog' => __( 'Product Page', 'bstone' ),
				'sc_s_cc_dialog' => __( 'Checkout & Cart', 'bstone' ),
				'sc_s_mc_dialog' => __( 'Mini Cart', 'bstone' ),
			),
			'column'  => '',
		)
	)
);