<?php
/**
 * Customizer Control: bst-box-shadow.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.1.6
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Buttonset control
 */
if( class_exists( 'WP_Customize_Control' ) ):
	class Bstone_Control_Shadow extends WP_Customize_Control {
		
		/**
		 * Control type
		 *
		 * @var string $type
		 */
		public $type = 'bst-box-shadow';

		/**
		 * Add support for palettes to be passed in.
		 *
		 * Supported palette values are true, false, or an array of RGBa and Hex colors.
		 */
		public $palette;

		/**
		 * Add support for showing the opacity value on the slider handle.
		 */
		public $show_opacity;

		/**
		 * Enqueue control related scripts/styles.
		 */
		public function enqueue() {
			$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/shadow/';
			wp_enqueue_style( $this->type . '-control', $assets_uri . 'shadow.css' );
			wp_enqueue_script( $this->type . '-control', $assets_uri . 'shadow.js', array( 'jquery', 'customize-base' ), false, true );
		}

		/**
		 * Render the control's content.
		 */
		public function render_content( $args = array() ) {

			$attr_markup = '';

			foreach ( $this->input_attrs as $attr => $value ) {
				$attr_markup .= $attr . '="' . esc_attr( $value ) . '" ';
			}
		?>
			<label>
				<div class="bst-box-shadow-wrap bst-sc-control">

					<span class="customize-control-title">
						<?php echo esc_html( $this->label ); ?>
					</span>

					<div class="sc-shadow-color" style="margin-bottom:15px;">
						<?php
							foreach ( $this->settings as $setting_key => $setting ) {
								if( 'color' == $setting_key ) {
						?>

						<input class="alpha-color-control" type="text"  value="<?php echo esc_attr( $this->value( $setting_key ) ); ?>" data-show-opacity="true" data-default-color="rgba(0,0,0,0)" <?php echo $this->get_link( $setting_key ); ?> />
						
						<?php } else if( 'inset' == $setting_key ) { ?>
							<div class="inset_check" style=" width: 30px; text-align: center; position: absolute; right: 20px; ">
								<input type="checkbox" name="<?php echo esc_attr( $setting->id ); ?>" value="<?php echo esc_attr( $this->value( $setting_key ) ); ?>" <?php checked( $this->value( $setting_key ) ); ?> <?php echo $this->get_link( $setting_key ); ?>  />
								<span style="padding-top:3px;"><?php echo ucfirst( $setting_key ); ?></span>
							</div>
						<?php } } ?>
					</div>

					<ul class="sc-shadow-offset">
						<?php
							foreach ( $this->settings as $setting_key => $setting ) {
								if( 'x' == $setting_key || 'y' == $setting_key || 'blur' == $setting_key || 'spread' == $setting_key ) {
						?>
						<li>
							<input <?php echo $attr_markup; ?> type="number" id="<?php echo esc_attr( $setting->id ); ?>" name="<?php echo esc_attr( $setting->id ); ?>" value="<?php echo esc_attr( $this->value( $setting_key ) ); ?>" class="customize-control-shadow-x" <?php echo $this->get_link( $setting_key ); ?> />
							<span><?php echo ucfirst( $setting_key ); ?></span>
						</li>
						<?php
							} }
						?>
					</ul>

				</div>
			</label>
		<?php
		}
	}
endif;