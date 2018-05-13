<?php
/**
 * Bstone Theme Customizer
 *
 * @package Bstone
 */

// No direct access, please.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function bstone_new_customize_register( $wp_customize ) {	
		
	// Sanitize Callback	
	require BSTONE_THEME_DIR . 'inc/customizer/sections-settings/customizer-sanitize.php';
	
	// Customizer Sections	
	require BSTONE_THEME_DIR . 'inc/customizer/sections-settings/customizer-sections.php';
	
	/**
	 * Override Defaults
	 */
	require BSTONE_THEME_DIR . 'inc/customizer/override-defaults.php';
	
	// Customizer Controls & Settings	
	$settings_path = BSTONE_THEME_DIR . 'inc/customizer/sections-settings/settings/';
	
	// -- Site Identity	
	require $settings_path . 'site-identity/site-identity.php';
	
	// -- Site Layout	
	require $settings_path . 'layout/container.php';
	require $settings_path . 'layout/site-layout.php';
	require $settings_path . 'layout/header.php';
	require $settings_path . 'layout/sidebar.php';
	require $settings_path . 'layout/footer.php';
	require $settings_path . 'layout/buttons.php';
	require $settings_path . 'layout/blog-archive.php';
	require $settings_path . 'layout/single.php';
	require $settings_path . 'layout/post-page-title.php';
	
	// -- Site Colors	
	require $settings_path . 'colors-background/general-colors.php';
	require $settings_path . 'colors-background/header-colors.php';
	require $settings_path . 'colors-background/sidebar-colors.php';
	require $settings_path . 'colors-background/footer-colors.php';
	require $settings_path . 'colors-background/footer-bar-colors.php';
	require $settings_path . 'colors-background/blog-colors.php';
	require $settings_path . 'colors-background/button-colors.php';
	require $settings_path . 'colors-background/title-colors.php';
	
	// -- Site Typography	
	require $settings_path . 'typography/default.php';
	require $settings_path . 'typography/archive.php';
	require $settings_path . 'typography/footer.php';
	require $settings_path . 'typography/footer-bar.php';
	require $settings_path . 'typography/general.php';
	require $settings_path . 'typography/header.php';
	require $settings_path . 'typography/sidebar.php';
	require $settings_path . 'typography/single.php';
	require $settings_path . 'typography/buttons.php';
	
	// -- Site Spacing	
	require $settings_path . 'spacing/content.php';
	require $settings_path . 'spacing/footer.php';
	require $settings_path . 'spacing/footer-bar.php';
	require $settings_path . 'spacing/header.php';
	require $settings_path . 'spacing/sidebar.php';
	require $settings_path . 'spacing/blog-archive.php';
	require $settings_path . 'spacing/title-spacing.php';
	
	// -- Extra Elements	
	require $settings_path . 'extra-elements/general-settings.php';
	require $settings_path . 'extra-elements/pagination.php';
	require $settings_path . 'extra-elements/forms.php';
	require $settings_path . 'extra-elements/scroll-to-top.php';
	
}
add_action('customize_register', 'bstone_new_customize_register');



/**
 * Enqueue script for custom customizer control.
 */
function bstone_custom_customize_enqueue() {
	wp_enqueue_style('bstone-customizer', BSTONE_THEME_URI . 'assets/css/customizer.css', array(), '1.0', 'all');
}
add_action( 'customize_controls_enqueue_scripts', 'bstone_custom_customize_enqueue' );

/**
 * Print Footer Scripts
 */
function bstone_print_footer_scripts() {
	$output = '<script type="text/javascript">';
		$output .= '
		wp.customize.bind(\'ready\', function() {
			wp.customize.control.each(function(ctrl, i) {
				var desc = ctrl.container.find(".customize-control-description");
				if( desc.length) {
					var title = ctrl.container.find(".customize-control-title");
					var tooltip = desc.text().replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
							return \'&#\'+i.charCodeAt(0)+\';\';
						});
					desc.remove();
					title.append(" <i class=\'dashicons dashicons-editor-help\'title=\'" + tooltip +"\'></i>");
				}
			});
		});';
	
	$output .= Bstone_Fonts_Data::js();

	$output .= '</script>';

	echo $output;
}
add_action( 'customize_controls_print_footer_scripts', 'bstone_print_footer_scripts' );

/**
 * Customizer Controls
 *
 * @since 1.0.0
 * @return void
 */
function bstone_print_customizer_scripts() {
	
	wp_enqueue_script( 'bstone-customizer-controls-js', BSTONE_THEME_URI . 'assets/js/customizer-controls.js', array(), BSTONE_THEME_VERSION, true );
	
	wp_enqueue_script( 'bstone-customizer-controls-toggle-js', BSTONE_THEME_URI . 'assets/js/customizer-controls-toggle.js', array(), BSTONE_THEME_VERSION, true );

}
add_action( 'customize_controls_enqueue_scripts', 'bstone_print_customizer_scripts' );


