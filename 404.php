<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bstone
 * @since 1.0.0
 */

	$bstone_page_layout = bstone_page_layout();
	
	get_header();
?>

	<div class="st-container st-flex content-top st-<?php echo esc_attr( $bstone_page_layout ); ?>">
	<div id="primary" <?php bstone_primary_class('st-flex-grow-1'); ?>>
	
		<?php bstone_primary_content_top(); ?>
	
		<main id="main" class="site-main">

			<section class="error-404 not-found">

				<?php bstone_entry_content_404_page(); ?>
				
			</section><!-- .error-404 -->

		</main><!-- #main -->
								
		<?php bstone_primary_content_bottom(); ?>
		
	</div><!-- #primary -->

<?php
if( $bstone_page_layout == 'right-sidebar' || $bstone_page_layout == 'left-sidebar' || $bstone_page_layout == 'both-sidebars' ) :
	  get_sidebar();
endif;
?>
  </div><!-- .st-container -->
  
<?php get_footer();