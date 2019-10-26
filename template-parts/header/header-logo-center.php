<?php
/**
 * Bstone Header Template: Logo Center
 *
 * The header layout 2 for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

// Header Items Position Variables

$menu_items_positon = bstone_options('header-2-items-position');
$itm1_pos = array_search('menu-item-1', $menu_items_positon);
$itm2_pos = array_search('menu-item-2', $menu_items_positon);
$logo_pos = array_search('logo', $menu_items_positon);

// Header Classes

$header_classes = '';
if (in_array("logo", $menu_items_positon)) {$header_classes .= ' logo-header';} else {$header_classes .= ' no-logo-header';}
if (in_array("menu-item-1", $menu_items_positon)) {$header_classes .= ' menu-item-1';}
if (in_array("menu-item-2", $menu_items_positon)) {$header_classes .= ' menu-item-2';}

if (!in_array("menu-item-1", $menu_items_positon) && !in_array("menu-item-2", $menu_items_positon)) {
	$header_classes .= ' logo-only-header';
}

if( 'full' == bstone_options( 'header-main-layout-width' ) ) {
	$header_classes .= ' full-width-header';
}

// Header Items Priority

if( $itm1_pos==0 ) {$itm1_priority = 20;} else if( $itm1_pos==1 ) {$itm1_priority = 30;} else {$itm1_priority = 40;}
if( $itm2_pos==0 ) {$itm2_priority = 20;} else if( $itm2_pos==1 ) {$itm2_priority = 30;} else {$itm2_priority = 40;}
if( $logo_pos==0 ) {$logo_priority = 20; $header_classes .= ' logo-side';} else if( $logo_pos==1 ) {$logo_priority = 30;} else {$logo_priority = 40; $header_classes .= ' logo-side';}

// add header CTA or Widget markup - Left
add_action( 'bstone_masthead_content', 'bstone_header_cta_or_widget_left', $itm1_priority );

// add site branding markup
if (in_array("logo", $menu_items_positon)) {
	add_action( 'bstone_masthead_content', 'bstone_site_branding_markup', $logo_priority );
}

// add header CTA or Widget markup - Right
add_action( 'bstone_masthead_content', 'bstone_header_cta_or_widget_right', $itm2_priority );

// Header Menu Position
$header_menu_pos = bstone_options('header-menu-position');

// Header Menu Position Class
if( 'top' == $header_menu_pos ) {
	$header_classes .= ' menu-top';
} else {
	$header_classes .= ' menu-bottom';
}

// add site primary nav markup
if( 'top' == $header_menu_pos ):
	add_action( 'bstone_masthead_content', 'bstone_primary_navigation_markup', 10 );
else:
	add_action( 'bstone_masthead_content', 'bstone_primary_navigation_markup', 50 );
endif;

/*
 * Header call to action markup left
 */

if ( ! function_exists( 'bstone_header_cta_or_widget_left' ) ) {
	function bstone_header_cta_or_widget_left() {
		$menu_items_positon = bstone_options('header-2-items-position');
		$bstone_header_rt = bstone_options('header-main-rt-section');
		if(''!=$bstone_header_rt && 'none'!=$bstone_header_rt && in_array("menu-item-1", $menu_items_positon)):
		?>
		<div class="st-head-cta cta-h-left">
			<?php
				$header_dynamic_content = bstone_get_dynamic_header_content('header-main-rt-section');
				if(is_array($header_dynamic_content)):
					foreach ($header_dynamic_content as $sth_section):
						echo $sth_section;
					endforeach;
				endif;
			?>
		</div>
		<?php
		endif;
	}
}

/*
 * Header call to action markup right
 */

if ( ! function_exists( 'bstone_header_cta_or_widget_right' ) ) {
	function bstone_header_cta_or_widget_right() {
		$menu_items_positon = bstone_options('header-2-items-position');
		$bstone_header_rt = bstone_options('header-main-rt-section-2');
		if(''!=$bstone_header_rt && 'none'!=$bstone_header_rt && in_array("menu-item-2", $menu_items_positon)):
		?>
		<div class="st-head-cta cta-h-right">
			<?php
				$header_dynamic_content = bstone_get_dynamic_header_content('header-main-rt-section-2');
				if(is_array($header_dynamic_content)):
					foreach ($header_dynamic_content as $sth_section):
						echo $sth_section;
					endforeach;
				endif;
			?>
		</div>
		<?php
		endif;
	}
}

?>
<!-- main header wrap -->
<div class="main-header-wrap<?php echo $header_classes; ?>">
	<?php bstone_main_header_bar_top(); ?>
	<div class="main-header-content st-flex full-width-nav <?php echo (bstone_options('header-main-layout-width') == 'content' ? 'st-container' : ''); ?>">
		<?php
		  bstone_masthead_content();
		?>
	</div>
	<?php bstone_main_header_bar_bottom(); ?>
</div><!-- .main-header-wrap -->