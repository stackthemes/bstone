<?php
/**
 * Site Layout Option for Bstone Theme.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
	/**
	 * Option: Container Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[site-content-width]', array(
			'default'           => bstone_get_option( 'site-content-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'validate_site_width' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-content-width]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-site-layout',
				'priority'    => 10,
				'label'       => __( 'Container Width', 'bstone' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'    => 768,
					'step'   => 1,
					'max'    => 1920,
				),
			)
		)
	);
