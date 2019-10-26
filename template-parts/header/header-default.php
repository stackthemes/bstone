<?php
/**
 * Template for Primary Header
 *
 * The header layout 1 for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

// add site branding markup
add_action( 'bstone_masthead_content', 'bstone_site_branding_markup', 1 );

// add site primary nav markup
add_action( 'bstone_masthead_content', 'bstone_primary_navigation_markup', 2 );

// add header CTA or Widget markup
add_action( 'bstone_masthead_content', 'bstone_header_cta_or_widget', 3 );

/*
 * Header call to action markup
 */

if ( ! function_exists( 'bstone_header_cta_or_widget' ) ) {
	function bstone_header_cta_or_widget() {
		$bstone_header_rt = bstone_options('header-main-rt-section');
		if(''!=$bstone_header_rt && 'none'!=$bstone_header_rt):
		?>
		<div class="st-head-cta">
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

?>
<!-- main header wrap -->
<div class="main-header-wrap">
	<?php bstone_main_header_bar_top(); ?>
	<div class="main-header-content st-flex <?php echo (bstone_options('header-main-layout-width') == 'content' ? 'st-container' : ''); ?>">
		<?php
		  bstone_masthead_content();
		?>
	</div>
	<?php bstone_main_header_bar_bottom(); ?>
</div><!-- .main-header-wrap -->
