<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bstone
 */

$sidebar_1 = apply_filters( 'bstone_get_sidebar', 'sidebar-1' );
$sidebar_2 = apply_filters( 'bstone_get_sidebar', 'sidebar-2' );

$bstone_page_sidebar = bstone_page_layout();

$sidebar_class = "";

if($bstone_page_sidebar=='both-sidebars')  {
	$sidebar_class  = "st-sidebar-both-right";
}

?>

<div itemtype="http://schema.org/WPSideBar" itemscope="itemscope" id="secondary" <?php bstone_secondary_class($sidebar_class); ?> role="complementary">
	<div class="sidebar-main">
		
		<?php bstone_sidebars_before(); ?>
		
		<?php if ( is_active_sidebar( $sidebar_1 ) ) : ?>

			<?php dynamic_sidebar( $sidebar_1 ); ?>

		<?php endif; ?>
		
		<?php bstone_sidebars_after(); ?>
		
	</div>
</div>

<?php if($bstone_page_sidebar=='both-sidebars'): ?>

<div itemtype="http://schema.org/WPSideBar" itemscope="itemscope" id="tertiary" <?php bstone_secondary_class('st-sidebar-both-left'); ?> role="complementary">
	<div class="sidebar-main">
		
		<?php bstone_sidebars_before(); ?>
		
		<?php if ( is_active_sidebar( $sidebar_2 ) ) : ?>

			<?php dynamic_sidebar( $sidebar_2 ); ?>

		<?php endif; ?>
		
		<?php bstone_sidebars_after(); ?>
		
	</div>
</div>

<?php endif; ?>