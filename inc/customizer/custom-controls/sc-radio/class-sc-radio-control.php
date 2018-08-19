<?php
/**
 * Customizer Control: SC_Radio_Control
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       1.1.6
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Customize Radio Control class.
 *
 * @since 5.9.4
 *
 * @see SC_Control
 */
class SC_Radio_Control extends SC_Control {

	/**
	 * Control type
	 *
	 * @var string $type
	 */
	public $type = 'sc-radio';

	/**
	 * Input type data
	 *
	 * @var string $input_type
	 */
	public $input_type = 'button';

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/sc-radio/';
		wp_enqueue_style( $this->type . '-control', $assets_uri . 'styles.css' );
		wp_enqueue_script( $this->type . '-control', $assets_uri . 'scripts.js' );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
		$classes = ' sc-radio sc-radio-';
		$classes .= $this->input_type;
	?>
		<label>
			<div class="sc-control-wrap sc-control-radio">
				<?php
				$this->render_label();
				$this->render_description();
				$this->render_radio( array(
					'input_type' => $this->input_type,
					'choices' => $this->choices,
					'selected' => $this->value(),
				) );
				?>
			</div>
		</label>
	<?php
	}
}
