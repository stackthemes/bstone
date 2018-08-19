<?php
/**
 * Bstone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bstone
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'BSTONE_THEME_VERSION', '1.1.6' );
define( 'BSTONE_THEME_SETTINGS', 'bstone-settings' );
define( 'BSTONE_THEME_DIR', get_template_directory() . '/' );
define( 'BSTONE_THEME_URI', get_template_directory_uri() . '/' );

/**
 * Bstone Common Functions
 */
require_once BSTONE_THEME_DIR . 'inc/common-functions.php';
require_once BSTONE_THEME_DIR . 'inc/bstone-enqueue-scripts.php';
if ( is_rtl() ) {
	require_once BSTONE_THEME_DIR . 'inc/bstone-custom-css-rtl.php';
} else {
	require_once BSTONE_THEME_DIR . 'inc/bstone-custom-css.php';
}
require_once BSTONE_THEME_DIR . 'inc/bstone-meta-boxes.php';
require_once BSTONE_THEME_DIR . 'inc/bstone-meta-boxes-functions.php';
require_once BSTONE_THEME_DIR . 'inc/bstone-breadcrumbs.php';

/**
 * Implement the Custom Header feature.
 */
require BSTONE_THEME_DIR . 'inc/custom-header.php';

/**
 * Fonts Files & Recomended Plugins
 */
require_once BSTONE_THEME_DIR . 'inc/bstone-fonts.php';
if ( is_admin() ) {
	require_once BSTONE_THEME_DIR . 'inc/customizer/bstone-fonts-data.php';
	require_once BSTONE_THEME_DIR . 'inc/plugins/class-tgm-plugin-activation.php';
	require_once BSTONE_THEME_DIR . 'inc/plugins/tgm-plugin-activation.php';
}

/**
 * Custom template tags for this theme.
 */
require BSTONE_THEME_DIR . 'inc/template-tags.php';

/**
 * Widgets
 */
require_once BSTONE_THEME_DIR . 'inc/widgets.php';

/**
 * After Theme Setup
 */
require_once BSTONE_THEME_DIR . 'inc/core/class-after-setup-theme.php';

/**
 * Theme Hooks
 */
require_once BSTONE_THEME_DIR . 'inc/core/bstone-hooks.php';
require_once BSTONE_THEME_DIR . 'inc/core/class-bstone-options.php';
require_once BSTONE_THEME_DIR . 'inc/core/class-bstone-strings.php';

/**
 * Markup Functions
 */
require_once BSTONE_THEME_DIR . 'inc/markup.php';
require_once BSTONE_THEME_DIR . 'inc/template-parts.php';
require_once BSTONE_THEME_DIR . 'inc/blog/blog.php';
require_once BSTONE_THEME_DIR . 'inc/blog/single.php';
require_once BSTONE_THEME_DIR . 'inc/blog/blog-markup.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require BSTONE_THEME_DIR . 'inc/template-functions.php';

/**
 * Customizer additions.
 */
require BSTONE_THEME_DIR . 'inc/customizer/bstone-customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require_once BSTONE_THEME_DIR . 'inc/compatibility/woocommerce/class-bstone-woocommerce.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require BSTONE_THEME_DIR . 'inc/compatibility/jetpack.php';
}