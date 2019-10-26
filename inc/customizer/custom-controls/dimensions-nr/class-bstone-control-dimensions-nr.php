<?php
/**
 * Customizer Control: bst-dimensions-nr.   Dimensions Non Responsive
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.1.8
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Buttonset control
 */
if( class_exists( 'WP_Customize_Control' ) ):
	class Bstone_Control_Dimensions_NR extends WP_Customize_Control {
		
		/**
		 * Control type
		 *
		 * @var string $type
		 */
        public $type = 'bst-dimensions-nr';
        

		public $title = '';

		/**
		 * Enqueue control related scripts/styles.
		 */
		public function enqueue() {
			$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/dimensions-nr/';
			wp_enqueue_style( $this->type . '-control', $assets_uri . 'dimensions-nr.css' );
			wp_enqueue_script( $this->type . '-control', $assets_uri . 'dimensions-nr.js', array( 'jquery', 'customize-base' ), false, true );
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
            <div class="bst-control-wrap bst-control-dimensions-nr">

                <?php if ( ! empty( $this->label ) ) { ?> <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span> <?php } ?>

				<?php if ( ! empty( $this->description ) ) { ?> <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span> <?php } ?>
                
                <ul class="bst-dimensions-nr control-wrap">
                <?php

                    foreach ( $this->settings as $setting_key => $setting ) {
                        ?>
                        <li class="dimension-nr-wrap <?php echo $setting_key; ?>">
                            <input <?php echo $attr_markup; ?> type="number" class="dimension-<?php echo $setting_key; ?>" <?php echo $this->get_link( $setting_key ); ?> value="<?php echo esc_attr( $this->value( $setting_key ) ); ?>" />
                            <span class="dimension-label"><?php echo ucfirst( $setting_key ); ?></span>
                        </li>
                        <?php
                    }
                    
                ?>
					<li class="dimension-nr-wrap">
						<div class="link-dimensions linked">
							<span class="dashicons dashicons-admin-links bstone-linked" data-element="<?php echo esc_html( $this->id ); ?>" title="<?php echo esc_html( $this->title ); ?>"></span>
							<span class="dashicons dashicons-editor-unlink bstone-unlinked" data-element="<?php echo esc_html( $this->id ); ?>" title="<?php echo esc_html( $this->title ); ?>"></span>
						</div>
					</li>
					<div style="float: none; clear: both;"></div>
                </ul>
            </div>
		<?php
		}
	}
endif;