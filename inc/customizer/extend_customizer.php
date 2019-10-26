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

	/**
	 * Bstone Pro Upsell Link
	 */	
	if ( ! defined( 'BSTONE_PRO_VER' ) ) {
		require BSTONE_THEME_DIR . 'inc/customizer/bstone-pro/bstone_pro.php';
		require BSTONE_THEME_DIR . 'inc/customizer/bstone-pro/pro-section-register.php';
	}
		
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

	$files = array(
		// -- Site Identity
		array('site-identity/site-identity.php', ''),

		// -- Site Layout
		array('layout/container.php', 		'bst-enable-panel-layout'),
		array('layout/site-layout.php', 	'bst-enable-panel-layout'),
		array('layout/header.php', 			'bst-enable-panel-layout'),
		array('layout/sidebar.php', 		'bst-enable-panel-layout'),
		array('layout/footer.php', 			'bst-enable-panel-layout'),
		array('layout/buttons.php', 		'bst-enable-panel-layout'),
		array('layout/blog-archive.php', 	'bst-enable-panel-layout'),
		array('layout/single.php', 			'bst-enable-panel-layout'),
		array('layout/post-page-title.php', 'bst-enable-panel-layout'),

		// -- Site Colors
		array('colors-background/general-colors.php', 	 'bst-enable-panel-colors'),
		array('colors-background/header-colors.php', 	 'bst-enable-panel-colors'),
		array('colors-background/sidebar-colors.php', 	 'bst-enable-panel-colors'),
		array('colors-background/footer-colors.php', 	 'bst-enable-panel-colors'),
		array('colors-background/footer-bar-colors.php', 'bst-enable-panel-colors'),
		array('colors-background/blog-colors.php', 		 'bst-enable-panel-colors'),
		array('colors-background/button-colors.php', 	 'bst-enable-panel-colors'),
		array('colors-background/title-colors.php', 	 'bst-enable-panel-colors'),

		// -- Site Typography
		array('typography/default.php', 	'bst-enable-panel-typography'),
		array('typography/archive.php', 	'bst-enable-panel-typography'),
		array('typography/footer.php', 		'bst-enable-panel-typography'),
		array('typography/footer-bar.php',  'bst-enable-panel-typography'),
		array('typography/general.php',     'bst-enable-panel-typography'),
		array('typography/header.php', 	    'bst-enable-panel-typography'),
		array('typography/sidebar.php', 	'bst-enable-panel-typography'),
		array('typography/single.php', 		'bst-enable-panel-typography'),
		array('typography/buttons.php', 	'bst-enable-panel-typography'),

		// -- Site Spacing
		array('spacing/content.php', 		'bst-enable-panel-spacing'),
		array('spacing/footer.php', 		'bst-enable-panel-spacing'),
		array('spacing/footer-bar.php', 	'bst-enable-panel-spacing'),
		array('spacing/header.php', 		'bst-enable-panel-spacing'),
		array('spacing/sidebar.php', 	    'bst-enable-panel-spacing'),
		array('spacing/blog-archive.php',   'bst-enable-panel-spacing'),
		array('spacing/title-spacing.php',  'bst-enable-panel-spacing'),
		array('spacing/single-post.php',    'bst-enable-panel-spacing'),

		// -- Extra Elements
		array('extra-elements/general-settings.php', ''),
		array('extra-elements/pagination.php', 		 'bst-enable-section-pagination-settings'),
		array('extra-elements/forms.php', 			 'bst-enable-section-forms-settings'),
		array('extra-elements/scroll-to-top.php', 	 'bst-enable-section-scroll-top-settings'),
		array('extra-elements/posts-slider.php', 	 'bst-enable-section-posts-slider'),
	);

	if ( in_array( 'bstone-pro-addons/bstone-pro-addons.php', apply_filters('active_plugins', get_option('active_plugins')) ) ) {
		
		// Get Bstone Pro Modules List
		$bst_pro_modules_list = bstone_pro_modules_list();

		$bst_pro_header_module_status = get_bstone_pro_modules_setting('addon-header-builder');
		$bst_pro_footer_module_status = get_bstone_pro_modules_setting('addon-footer-builder');

        if( 1 == $bst_pro_header_module_status ) {
            $bst_pro_header_module_status = 'true';
        }

        if( 1 == $bst_pro_footer_module_status ) {
            $bst_pro_footer_module_status = 'true';
		}
		
		if( 'true' === $bst_pro_header_module_status ) {
			unset( $files[3] );
			unset( $files[11] );
			unset( $files[23] );
			unset( $files[30] );
		}
		
		// if( 'true' === $bst_pro_footer_module_status ) {
		// 	unset( $files[5] );
		// 	unset( $files[13] );
		// 	unset( $files[14] );
		// 	unset( $files[20] );
		// 	unset( $files[21] );
		// 	unset( $files[28] );
		// 	unset( $files[29] );
		// }
	}

	if ( in_array( 'bstone-light/bstone-light.php', apply_filters('active_plugins', get_option('active_plugins')) ) ||
		 in_array( 'bstone-pro-addons/bstone-pro-addons.php', apply_filters('active_plugins', get_option('active_plugins')) )
		) {
		foreach ( $files as $file ) {
			
			if( '' != $file[1] ) {
				
				$settings_val = bstone_light_get_option( $file[1] );

				if( null == $settings_val ) {
					require $settings_path . $file[0];
				}

			} else {
				require $settings_path . $file[0];
			}
		}
	} else {
		foreach ( $files as $file ) {
			require $settings_path . $file[0];
		}
	}
	
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


