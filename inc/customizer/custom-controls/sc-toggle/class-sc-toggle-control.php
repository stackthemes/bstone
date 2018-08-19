<?php
/**
 * Customize API: SC_Toggle_Control class
 * 
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       1.1.6
 */

/**
 * Customize Toggle Control class.
 *
 * @since 1.1.6
 *
 * @see SC_Control
 */
class SC_Toggle_Control extends SC_Control {

	/**
	 * Control type
	 *
	 * @var string $type
	 */
	public $type = 'sc-toggle';

	/**
	 * Sub Label
	 *
	 * @var string $sublabel Label for toggle
	 */
	public $sublabel = '';

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/sc-toggle/';
		wp_enqueue_style( $this->type . '-control', $assets_uri . 'styles.css' );
		wp_enqueue_script( $this->type . '-control', $assets_uri . 'scripts.js', array( 'jquery', 'customize-base' ), false, true );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
	?>
		<label>
			<?php
				$this->render_label();
				$this->render_description();
			?>
			<?php $this->render_toggle( $this->sublabel ); ?>
		</label>
	<?php
	}
}
