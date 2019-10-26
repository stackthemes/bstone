<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bstone
 */

?>
<!DOCTYPE html>
<?php bstone_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php bstone_head_top(); ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php bstone_head_bottom(); ?>
	<?php wp_head(); ?>
</head>

<body <?php bstone_schema_body(); ?> <?php body_class(); ?>>

<?php bstone_body_top(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( bstone_default_strings( 'string-header-skip-link', false ) ); ?></a>
	
	<?php bstone_header_before(); ?>

	<?php bstone_header(); ?>
	
	<?php bstone_header_after(); ?>

	<?php bstone_content_before(); ?>

	<div id="content" class="site-content">
	
		<?php bstone_content_top(); ?>

		<?php bstone_single_header(); ?>