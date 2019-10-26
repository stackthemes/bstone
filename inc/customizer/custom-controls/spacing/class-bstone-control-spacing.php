<?php
/**
 * Customizer Control: spacing
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
 * Sortable control (uses checkboxes).
 */
class Bstone_Control_Spacing extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'bst-spacing';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$css_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/spacing/';
		$js_uri  = BSTONE_THEME_URI . 'inc/customizer/custom-controls/spacing/';

		wp_enqueue_script( 'bstone-spacing', $js_uri . 'spacing.js', array( 'jquery', 'customize-base' ), BSTONE_THEME_VERSION, true );
		wp_enqueue_style( 'bstone-spacing', $css_uri . 'spacing.css', null, BSTONE_THEME_VERSION );

	}

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

		$this->json['value']   = maybe_unserialize( $this->value() );
		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['id']      = $this->id;

		$this->json['inputAttrs'] = '';
		foreach ( $this->input_attrs as $attr => $value ) {
			$this->json['inputAttrs'] .= $attr . '="' . esc_attr( $value ) . '" ';
		}
		$this->json['inputAttrs'] = maybe_serialize( $this->input_attrs() );

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
		<label class='bst-spacing' for="" >
			<span class="customize-control-title">
				{{{ data.label }}}{{{ data.choices }}}
			</span>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>

			<ul class="bst-spacing-wrapper"><# 
				_.each( data.choices, function( choiceLabel, choiceID ) { 
				#><li {{{ data.inputAttrs }}} class='bst-spacing-input-item'>
					<input type='number' class='bst-spacing-input bst-spacing-{{ choiceID }}' data-id='{{ choiceID }}' value='{{ data.value[ choiceID ] }}'>
					<span class="bst-spacing-title">{{{ data.choices[ choiceID ] }}}</span>
				</li><# 
				});
			#><span class="bst-spacing-unit">px</span></ul>
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
