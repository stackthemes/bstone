<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bstone
 */

$bstone_page_layout = bstone_page_layout();

get_header(); ?>

  <div class="st-container st-flex content-top st-<?php echo esc_attr( $bstone_page_layout ); ?>">
	<div id="primary" <?php bstone_primary_class('st-flex-grow-1'); ?>>
	
		<?php bstone_primary_content_top(); ?>
	
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

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