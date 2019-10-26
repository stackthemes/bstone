<?php
/**
 * Register customizer Bstone Pro Section.
 *
 * @package   Bstone
 * @author    Stack Themes
 * @copyright Copyright (c) 2017, Bstone
 * @link      https://wpbstone.com/
 * @since     Bstone 1.0.0
 */

// Register custom section types.
$wp_customize->register_section_type( 'Bstone_Pro_Customizer' );

// Register sections.
$wp_customize->add_section(
	new Bstone_Pro_Customizer(
		$wp_customize, 'bstone-pro', array(
			'title'    => esc_html__( 'Need More Options? Get Bstone Pro!', 'bstone' ),
			'pro_url'  => esc_url_raw( 'https://wpbstone.com/?utm_source=customizer&utm_medium=upgrade-link&utm_campaign=upgrade-to-pro' ),
			'priority' => 1,
		)
	)
);