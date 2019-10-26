<?php

/**
 * Bstone_Pro_Customizer
 *
 * @since 1.0
 */
if ( ! class_exists( 'Bstone_Pro_Customizer' ) ) {

	/**
	 * Bstone_Pro_Customizer Initial setup
	 */
	class Bstone_Pro_Customizer extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 *
		 * @since  1.0
		 * @access public
		 * @var    string
		 */
		public $type     = 'bstone-pro';

		/**
		 * Custom pro button URL.
		 *
		 * @since  1.0.10
		 * @access public
		 * @var    string
		 */
		public $pro_url  = '';

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 *
		 * @since  1.0.10
		 * @access public
		 * @return string
		 */
		public function json() {
			$json            = parent::json();
			$json['pro_url'] = esc_url_raw( $this->pro_url );
			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 *
		 * @since  1.0
		 * @access public
		 * @return void
		 */
		protected function render_template() {
		?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand control-section-default" style="display: bloack;">
			<h3 class="wp-ui-highlight">
				<# if ( data.title && data.pro_url ) { #>
				<a href="{{ data.pro_url }}" class="wp-ui-text-highlight" target="_blank" rel="noopener">{{ data.title }}</a>
				<# } #>
			</h3>
		</li>
		<?php
		}
	}

} // End if().