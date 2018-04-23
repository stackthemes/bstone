<?php
/**
 * Override default customizer panels, sections, settings or controls.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

/**
 * Override Sections
 */
$wp_customize->get_section( 'title_tagline' )->priority = 5;

/**
 * Override Settings
 */
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

/**
 * Override Controls
 */
$wp_customize->get_control( 'custom_logo' )->priority      = 5;
$wp_customize->get_control( 'blogname' )->priority         = 6;
$wp_customize->get_control( 'blogdescription' )->priority  = 7;
$wp_customize->get_control( 'header_textcolor' )->priority = 8;