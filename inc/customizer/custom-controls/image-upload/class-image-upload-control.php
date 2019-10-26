<?php
/**
 * Customize API: Bst_Img_Upload class
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
class Bst_Img_Upload extends WP_Customize_Control {

	/**
	 * Control type
	 *
	 * @var string $type
	 */
	public $type = 'bst-img-upload';

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {
		$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/image-upload/';
		wp_enqueue_style( $this->type . '-control', $assets_uri . 'bst-image-upload.css' );
		wp_enqueue_script( $this->type . '-control', $assets_uri . 'bst-image-upload.js', array( 'jquery', 'customize-base' ), false, true );
		wp_enqueue_media();
		//wp_enqueue_script( $this->type . '-control', $assets_uri . 'bst-image-upload.js', array( 'jquery','media-upload','thickbox', 'customize-base' ), false, true );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
	?>
		<label>
			<span class="customize-control-title">
				<?php
					echo esc_html( $this->label );
				?>
			</span>
			<div class="bst-upload-image-cnt">
				<input type="text" class="bst-image-upload-ctrl" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
				<button type="button" class="button upload-button"><?php echo __( 'Select Image', 'bstone' ); ?></button>
			</div>
		</label>
	<?php
	}
}
