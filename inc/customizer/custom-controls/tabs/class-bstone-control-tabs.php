<?php
/**
 * Customizer Control: tabs
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
class Bstone_Control_Tabs extends WP_Customize_Control {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'bst-tabs';
	
	public $tabs_data     = array();
	public $tabs_active   = '';
	public $tabs_sections = array();

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $caption = '';

	/**
	 * Enqueue control related scripts/styles.
	 *
	 * @access public
	 */
	public function enqueue() {

		$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/tabs/';
		wp_enqueue_script( 'bstone-tabs-js', $assets_uri . 'tabs.js', array( 'jquery', 'customize-base' ), BSTONE_THEME_VERSION, true );
		wp_enqueue_style( 'bstone-tabs-css', $assets_uri . 'tabs.css', null, BSTONE_THEME_VERSION );
	}

	/**
	 * Get customizer section status
	 */
	public function get_sections_status() {
		$sec_status = array();

		if ( in_array( 'bstone-light/bstone-light.php', apply_filters('active_plugins', get_option('active_plugins')) ) ) {

			if( null == bstone_light_get_option( 'bst-enable-panel-layout' ) ) {
				$sec_status[ 'layout' ] = true;
			}

			if( null == bstone_light_get_option( 'bst-enable-panel-colors' ) ) {
				$sec_status[ 'colors' ] = true;
			}

			if( null == bstone_light_get_option( 'bst-enable-panel-typography' ) ) {
				$sec_status[ 'typography' ] = true;
			}

			if( null == bstone_light_get_option( 'bst-enable-panel-spacing' ) ) {
				$sec_status[ 'spacing' ] = true;
			}

		} else {
			$sec_status[ 'layout' ] 	= true;
			$sec_status[ 'typography' ] = true;
			$sec_status[ 'colors' ] 	= true;
			$sec_status[ 'spacing' ] 	= true;
		}

		return $sec_status;
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @see WP_Customize_Control::to_json()
	 */
	public function to_json() {
		parent::to_json();
		$this->json['label']       	 = esc_html( $this->label );
		$this->json['caption']     	 = $this->caption;
		$this->json['description'] 	 = $this->description;
		$this->json['tabs_data']   	 = $this->tabs_data;
		$this->json['tabs_active']   = $this->tabs_active;
		$this->json['tabs_sections'] = $this->tabs_sections;
		$this->json['tabs_settings'] = $this->get_sections_status();
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
			<span class="customize-control-caption">{{{ data.caption }}}</span>
		<# } #>
		
		<# if ( data.tabs_data ) { #>
		
			<ul class="bstone-customizer-tabs">
		
			<# _.each( data.tabs_data, function( tab, tab_index ) { #>

				<# if ( tab in data.tabs_settings ) { #>
				
					<# if ( data.tabs_active === data.tabs_data[tab_index] ) { #>
						<li class="active" data-section="{{ data.tabs_sections[tab_index] }}">{{ tab }}</li>
					<# } else { #>
						<li data-section="{{ data.tabs_sections[tab_index] }}">{{ tab }}</li>
					<# } #>

				<# } #>
				
			<# }); #>
			
			</ul>
			
		<# } #>

		<label class="customizer-text">
			<# if ( data.label ) { #>
				<span class="customize-control-title">{{{ data.label }}}</span>
			<# } #>
			<# if ( data.description ) { #>
				<span class="description customize-control-description">{{{ data.description }}}</span>
			<# } #>
		</label>
		<?php
	}
}
