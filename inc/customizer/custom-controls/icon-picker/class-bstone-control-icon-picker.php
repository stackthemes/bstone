<?php
/**
 * Customizer Control: bstone-heading.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 2.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) ) {

	class Bstone_Control_Iconpicker extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'bst-iconpicker';

		/**
		 * Enqueue required scripts and styles.
		 */
		public function enqueue() {			
			$assets_uri  = BSTONE_THEME_URI . 'inc/customizer/custom-controls/icon-picker/assets/';
			wp_enqueue_script( 'bstone-fontawesome-iconpicker', $assets_uri . 'js/fontawesome-iconpicker.min.js', array( 'jquery' ), BSTONE_THEME_VERSION, true );
			wp_enqueue_script( 'bstone-iconpicker-control', $assets_uri . 'js/iconpicker-control.js', array( 'jquery' ), BSTONE_THEME_VERSION, true );
			wp_enqueue_style( 'bstone-fontawesome-iconpicker', $assets_uri . 'css/fontawesome-iconpicker.min.css' );
			wp_enqueue_style( 'bstone-fontawesome', $assets_uri . 'css/fontawesome.min.css' );
		}

		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<label>
				<span class="customize-control-title">
					<?php echo esc_html( $this->label ); ?>
				</span>
				<div class="input-group icp-container">
					<span class="input-group-addon"><i class="iconpicker-component <?php echo esc_attr( $this->value() ); ?>"></i></span>
					<input data-placement="bottomRight" class="icp icp-auto bst_icon_picker" <?php $this->link(); ?> value="<?php echo esc_attr( $this->value() ); ?>" type="text">
					<span class="input-group-addon" style="display: none;"></span>
				</div>
			</label>
			<?php
		}

	}

}