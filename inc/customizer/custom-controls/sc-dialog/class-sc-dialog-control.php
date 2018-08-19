<?php
/**
 * Customizer Control: SC_Dialog_Control
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
 * Custom class used to create a shop customizer element
 *
 * @since 1.1.6
 *
 * @see SC_Control
 */
class SC_Dialog_Control extends SC_Control {

	/**
	 * Control type data
	 *
	 * @var string $type
	 */
	public $type = 'sc-dialog';

	/**
	 * List of pages.
	 *
	 * @var array $pages
	 */
	public $buttons = array();

	/**
	 * Show only button with the empty dif for dialog.
	 * It's mostly used for tiggering other dialogs.
	 *
	 * @var array $pages
	 */
	public $button_only = false;

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue() {

		$assets_uri = BSTONE_THEME_URI . 'inc/customizer/custom-controls/sc-dialog/';

		wp_enqueue_style( $this->type . '-control', $assets_uri . 'styles.css' );
		wp_enqueue_style( $this->type . '-control-tippy', $assets_uri . 'tippy.min.css' );
		wp_enqueue_script( $this->type . '-control', $assets_uri . 'scripts.js' );
		wp_enqueue_script( $this->type . '-control-tippy', $assets_uri . 'tippy.min.js' );

		$gf_query_args = array(
			'family' => 'Hind:300,400,500',
			'subset' => 'latin',
		);

		wp_enqueue_style( 'google_fonts', add_query_arg( $gf_query_args, "//fonts.googleapis.com/css" ), array(), null );
	}

	/**
	 * Render the control's content.
	 */
	public function render_content() {
		echo '<p>' . esc_html( $this->label ) . '</p>';

		$scfs = new Sc_Fs();

		foreach ( $this->buttons as $key => $value ) {

			$icon_path = BSTONE_SC_URI . '/assets/icons/' . esc_attr( $key ) . '.svg';
			$icon = '<img src="' . $icon_path . '">';

			if ( file_exists( $icon_path ) ) {
				$icon = $scfs->get_contents( $icon_path );

				if ( $scfs->get_error_codes() || ! $icon ) {
					$icon = '<img src="' . $icon_path . '">';
				}
			}

			// @codingStandardsIgnoreLine
			echo '<button type="button" class="button sc-dialog-button" data-dialog="' . esc_attr( $key ) . '">' . $icon . esc_html( $value ) . '</button>';

			if ( ! $this->button_only ) {
				echo '<div id="' . esc_attr( $key ) . '"></div>';
			}
		}

	}
}