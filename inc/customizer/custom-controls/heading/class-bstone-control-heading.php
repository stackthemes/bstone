<?php
/**
 * Customizer Control: bstone-heading.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Range control
 */
class Bstone_Control_Heading extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'bstone-heading';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$css_uri  = BSTONE_THEME_URI . 'inc/customizer/custom-controls/heading/';
		wp_enqueue_style( 'bstone-heading', $css_uri . 'heading.css', null );
	}

	/**
	 * Content template for a connected control.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function content_template() {
		?>
		<h4 class="bstone-customizer-heading">{{{ data.label }}}</h4>
		<?php
	}
}
