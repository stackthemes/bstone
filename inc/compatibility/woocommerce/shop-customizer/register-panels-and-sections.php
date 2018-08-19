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

if ( ! class_exists( 'WP_Customize_Section' ) ) {
	return;
}

/**
 * Extend WordPress Customize Section class.
 *
 * @since 1.1.6
 *
 * @see WP_Customize_Section
 */
class SC_Dialog extends WP_Customize_Section {

	/**
	 * Type of this section.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'sc-dialog';

	/**
	 * Belong to which dialog.
	 *
	 * @access public
	 * @var string|boolean
	 */
	public $sc_belong = false;

	/**
	 * Name of the dialog tab.
	 *
	 * @access public
	 * @var string|boolean
	 */
	public $sc_tab = false;

	/**
	 * If it's a child dialog.
	 *
	 * @access public
	 * @var string|boolean
	 */
	public $sc_child = true;

	/**
	 * Unique prefix for resetting part of data.
	 *
	 * @access public
	 * @var string|boolean
	 */
	public $sc_reset = false;

	/**
	 * Gather the parameters passed to client JavaScript via JSON.
	 *
	 * @return array The array to be exported to the client as JSON.
	 */
	public function json() {

		$array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section' ) );
		$array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
		$array['content'] = $this->get_content();
		$array['active'] = $this->active();
		$array['instanceNumber'] = $this->instance_number;
		$array['customizeAction'] = __( 'Customizing', 'bstone' );

		$array['scBelong'] = $this->sc_belong;
		$array['scTab'] = $this->sc_tab;
		$array['scChild'] = $this->sc_child;
		$array['scReset'] = $this->sc_reset;

		return $array;

	}
}

function register_settings( $wp_customize ) {
	$wp_customize->register_section_type( 'SC_Dialog' );
}
add_action( 'customize_register', 'register_settings' );

/**
 * Shop Customizer Sections
 */

$wp_customize->add_section(
    'bstone-shop-customizer', array(
        'priority' => 1,
        'panel'    => 'woocommerce',
        'title'    => __( 'Shop Customizer', 'bstone' ),
    )
);