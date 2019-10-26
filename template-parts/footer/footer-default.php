<?php
/**
 * Template for Default Footer
 *
 * The footer layout 1 for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( apply_filters( 'bstone_footer_top_enabled', true ) ) {
	if ( defined('BSTONE_PRO_VER') && 'true' == bstProGetModuleStatus( 'addon-footer-builder' ) ) {
		add_action('bstone_footer_content_markup', 'bstone_pro_footer_top_markup', 1);
	} else {
		add_action('bstone_footer_content_markup', 'bstone_footer_top_markup', 1);
	}
}

if ( apply_filters( 'bstone_footer_bottom_enabled', true ) ) {
	if ( defined('BSTONE_PRO_VER') && 'true' == bstProGetModuleStatus( 'addon-footer-builder' ) ) {
		add_action('bstone_footer_content_markup', 'bstone_pro_footer_bar_markup', 2);
	} else {
		add_action('bstone_footer_content_markup', 'bstone_footer_bar_markup', 2);
	}
}

/*
 * Footer top markup
 */

if ( ! function_exists( 'bstone_footer_top_markup' ) ) {
	function bstone_footer_top_markup() {
		if('disabled'!=bstone_options('footer-adv')):
		?>
		<div class="footer_top_markup">
			<div class="footer_top_markup_inner <?php echo (bstone_options('footer-top-area-width') == 'content' ? 'st-container' : 'full-width'); ?>">
				<div class="st-row">
					<div class="st-col-md-3 st-col-sm-6 st-col-xs-12">
						<?php bstone_get_footer_widget( 'advanced-footer-widget-1' ); ?>
					</div>
					<div class="st-col-md-3 st-col-sm-6 st-col-xs-12">
						<?php bstone_get_footer_widget( 'advanced-footer-widget-2' ); ?>
					</div>
					<div class="st-col-md-3 st-col-sm-6 st-col-xs-12">
						<?php bstone_get_footer_widget( 'advanced-footer-widget-3' ); ?>
					</div>
					<div class="st-col-md-3 st-col-sm-6 st-col-xs-12">
						<?php bstone_get_footer_widget( 'advanced-footer-widget-4' ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;
	}
}

/*
 * Footer bar markup
 */

if ( ! function_exists( 'bstone_footer_bar_markup' ) ) {
	function bstone_footer_bar_markup() {
		if('footer-sml-layout-1'==bstone_options('footer-sml-layout')):
		?>
		<div class="footer_bar_markup">
			<div class="footer_bar_markup_inner  <?php echo (bstone_options('footer-bar-width') == 'content' ? 'st-container' : 'full-width'); ?>">
				<div class="st-row">
					<div class="st-col-md-12">
						<?php bstone_get_footer_widget( 'footer-widget-1' ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		elseif('footer-sml-layout-2'==bstone_options('footer-sml-layout')):
		?>
		<div class="footer_bar_markup">
			<div class="footer_bar_markup_inner  <?php echo (bstone_options('footer-bar-width') == 'content' ? 'st-container' : 'full-width'); ?>">
				<div class="st-row">
					<div class="st-col-md-6 st-col-xs-12">
						<?php bstone_get_footer_widget( 'footer-widget-1' ); ?>
					</div>
					<div class="st-col-md-6 st-col-xs-12">
						<?php bstone_get_footer_widget( 'footer-widget-2' ); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		endif;
	}
}

?>


<div class="main_footer_markup">
	<?php bstone_footer_content_markup(); ?>
</div>