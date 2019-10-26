<?php
/**
 * Customizer Control: bstone-heading.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
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
	 * Heading Status.
	 *
	 * @access public
	 * @var string
	 */
	public $status = 'close';

	/**
	 * Customizer items to close or open.
	 *
	 * @access public
	 * @var array
	 */
	public $items = [];

	/**
	 * Heading Collapse Disabled.
	 *
	 * @access public
	 * @var string
	 */
	public $collapse = true;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$assets_uri  = BSTONE_THEME_URI . 'inc/customizer/custom-controls/heading/';
		wp_enqueue_style( 'bstone-heading', $assets_uri . 'heading.css', null );
		wp_enqueue_script( $this->type . '-control', $assets_uri . 'heading.js', array( 'jquery', 'customize-base' ), false, true );
	}

	public function render_content() {

		$array_items = $this->items;

		$icon_class = "";

		if( "close" == $this->status ) {
			$icon_class = "dashicons-arrow-down-alt2";
		} else {
			$icon_class = "dashicons-arrow-up-alt2";
		}
		?>
		<h4 class="bstone-customizer-heading heading-<?php echo esc_html( $this->status ); ?>">
			<?php echo esc_html( $this->label ); ?>
			<?php if( true == $this->collapse ) { ?>
			<button type="button" data-status="<?php echo esc_html( $this->status ); ?>" data-items="<?php echo implode(',', $array_items); ?>">
				<i class="dashicons <?php echo $icon_class; ?>"></i>
			</button>
			<?php } ?>
		</h4>
		<?php
		echo $this->description;
	}
}
