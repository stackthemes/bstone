<?php
/**
 * Customizer Control: Responsive Slider
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
 * Responsive Slider control (range).
 */
class Bstone_Control_Responsive_Slider extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'bst-responsive-slider';

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $suffix = '';

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();

		$this->json['default'] = $this->setting->default;
		if ( isset( $this->default ) ) {
			$this->json['default'] = $this->default;
		}

		$val = maybe_unserialize( $this->value() );

		if ( ! is_array( $val ) || is_numeric( $val ) ) {

			$val = array(
				'desktop' => $val,
				'tablet'  => '',
				'mobile'  => '',
			);
		}

		$this->json['value']  = $val;
		$this->json['link']   = $this->get_link();
		$this->json['id']     = $this->id;
		$this->json['label']  = esc_html( $this->label );
		$this->json['suffix'] = $this->suffix;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
	}

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {
		$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/responsive-slider/';

		wp_enqueue_style( 'scbst-responsive-slider', $assets_uri . 'responsive-slider.css', null, BSTONE_THEME_VERSION );
		wp_enqueue_script( 'scbst-responsive-slider', $assets_uri . 'responsive-slider.js', array( 'jquery', 'customize-base' ), BSTONE_THEME_VERSION, true );
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
		<label for="">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
				<ul class="bst-responsive-slider-btns">
					<li class="desktop active">
						<button type="button" class="preview-desktop active" data-device="desktop">
							<i class="dashicons dashicons-desktop"></i>
						</button>
					</li>
					<li class="tablet">
						<button type="button" class="preview-tablet" data-device="tablet">
							<i class="dashicons dashicons-tablet"></i>
						</button>
					</li>
					<li class="mobile">
						<button type="button" class="preview-mobile" data-device="mobile">
							<i class="dashicons dashicons-smartphone"></i>
						</button>
					</li>
				</ul>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } 

			value_desktop = '';
			value_tablet  = '';
			value_mobile  = '';
			default_desktop = '';
			default_tablet  = '';
			default_mobile  = '';

			if ( data.value['desktop'] ) { 
				value_desktop = data.value['desktop'];
			} 

			if ( data.value['tablet'] ) { 
				value_tablet = data.value['tablet'];
			} 

			if ( data.value['mobile'] ) { 
				value_mobile = data.value['mobile'];
			}

			if ( data.default['desktop'] ) { 
				default_desktop = data.default['desktop'];
			} 

			if ( data.default['tablet'] ) { 
				default_tablet = data.default['tablet'];
			} 

			if ( data.default['mobile'] ) { 
				default_mobile = data.default['mobile'];
			} #>
			<div class="wrapper">
				<div class="input-field-wrapper desktop active">
					<input {{{ data.inputAttrs }}} type="range" value="{{ value_desktop }}" data-reset_value="{{ default_desktop }}" />
					<div class="bstone_range_value">
						<input type="number" data-id='desktop' class="bst-responsive-range-value-input" value="{{ value_desktop }}" {{{ data.inputAttrs }}} ><#
						if ( data.suffix ) {
						#><span class="bst-range-unit">{{ data.suffix }}</span><#
						} #>
					</div>
				</div>
				<div class="input-field-wrapper tablet">
					<input {{{ data.inputAttrs }}} type="range" value="{{ value_tablet }}" data-reset_value="{{ default_tablet }}" />
					<div class="bstone_range_value">
						<input type="number" data-id='tablet' class="bst-responsive-range-value-input" value="{{ value_tablet }}" {{{ data.inputAttrs }}} ><#
						if ( data.suffix ) {
						#><span class="bst-range-unit">{{ data.suffix }}</span><#
						} #>
					</div>
				</div>
				<div class="input-field-wrapper mobile">
					<input {{{ data.inputAttrs }}} type="range" value="{{ value_mobile }}" data-reset_value="{{ default_mobile }}" />
					<div class="bstone_range_value">
						<input type="number" data-id='mobile' class="bst-responsive-range-value-input" value="{{ value_mobile }}" {{{ data.inputAttrs }}} ><#
						if ( data.suffix ) {
						#><span class="bst-range-unit">{{ data.suffix }}</span><#
						} #>
					</div>
				</div>
				<div class="bst-responsive-slider-reset">
					<span class="dashicons dashicons-image-rotate"></span>
				</div>
			</div>
		</label>
		<?php
	}

	/**
	 * Render the control's content.
	 *
	 * @see WP_Customize_Control::render_content()
	 */
	protected function render_content() {}
}
