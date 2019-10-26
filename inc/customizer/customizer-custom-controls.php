<?php
/**
 * Bstone Theme Customizer Controls.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

$control_dir = BSTONE_THEME_DIR . 'inc/customizer/custom-controls/';

require $control_dir . 'sortable/class-bstone-control-sortable.php';
require $control_dir . 'radio-image/class-bstone-control-radio-image.php';
require $control_dir . 'slider/class-bstone-control-slider.php';
require $control_dir . 'responsive/class-bstone-control-responsive.php';
require $control_dir . 'typography/class-bstone-control-typography.php';
require $control_dir . 'spacing/class-bstone-control-spacing.php';
require $control_dir . 'divider/class-bstone-control-divider.php';
require $control_dir . 'color/class-bstone-control-color.php';
require $control_dir . 'dimensions/class-bstone-control-dimensions.php';
require $control_dir . 'tabs/class-bstone-control-tabs.php';
require $control_dir . 'responsive-slider/class-bstone-control-responsive-slider.php';
require $control_dir . 'icon-picker/class-bstone-control-icon-picker.php';

/**
 * Shop Customizer Contorls
 */
require $control_dir . 'sc-main/class-sc-control.php';
require $control_dir . 'sc-dialog/class-sc-dialog-control.php';
require $control_dir . 'sc-radio/class-sc-radio-control.php';
require $control_dir . 'sc-toggle/class-sc-toggle-control.php';
require $control_dir . 'shadow/class-bstone-control-shadow.php';
require $control_dir . 'dimensions-nr/class-bstone-control-dimensions-nr.php';
require $control_dir . 'heading/class-bstone-control-heading.php';
require $control_dir . 'image-upload/class-image-upload-control.php';