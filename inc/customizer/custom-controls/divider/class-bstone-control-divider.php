<?php
/**
 * Customizer Control: divider
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * A text control with validation for CSS units.
 */
class Bstone_Control_Divider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'bst-divider';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $caption = '';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $dividerline = true;

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $html = '';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $link = '#';

	/**
	 * Divider Status.
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
	public $collapse = false;

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$css_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/divider/';
		wp_enqueue_style( 'bstone-divider-css', $css_uri . 'divider.css', null, BSTONE_THEME_VERSION );
		wp_enqueue_script( 'bstone-divider-js', $css_uri . 'divider.js', array( 'jquery', 'customize-base' ), false, true );
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['label']       = esc_html( $this->label );
		$this->json['caption']     = $this->caption;
		$this->json['dividerline'] = $this->dividerline;
		$this->json['html']        = $this->html;
		$this->json['link']        = $this->link;
		$this->json['description'] = $this->description;
		$this->json['status']      = $this->status;
		$this->json['items']       = implode(',', $this->items);
		$this->json['collapse']    = $this->collapse;
		if( "close" == $this->status ) {
			$this->json['icon'] = "dashicons-arrow-down-alt2";
		} else {
			$this->json['icon'] = "dashicons-arrow-up-alt2";
		}
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 *
	 * Class variables for this control class are available in the `data` JS object;
	 * export custom variables by overriding {@see WP_Customize_Control::to_json()}.
	 *
	 * @see WP_Customize_Control::print_template()
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>

		<# if ( data.caption ) { #>
			<span class="customize-control-caption divider-{{{ data.status }}}">
				{{{ data.caption }}}

				<# if ( data.collapse === true ) { #>
					<button type="button" data-status="{{{ data.status }}}" data-items="{{{ data.items }}}">
						<i class="dashicons {{{ data.icon }}}"></i>
					</button>
				<# } #>
			</span>
		<# } #>

		<# if ( data.dividerline ) { #>
		<hr />
		<# } #>

		<label class="customizer-text">
			<# if ( data.label ) { #>
				<span class="customize-control-title">
					{{{ data.label }}}
				</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</label>

		<# if ( data.html ) { #>
			<span class="customize-control-html divider-{{{ data.status }}}">
				<p>{{{ data.html }}}</p>
				<# if ( data.link ) { #>
				<a href="{{{ data.link }}}" class="button button-primary" target="_blank" rel="noopener">Learn More</a>
				<# } #>
			</span>
		<# } #>
		<?php
	}
}
