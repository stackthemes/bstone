<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bstone
 */

$bstone_page_layout = bstone_page_layout();

get_header(); ?>
  <div class="st-container st-flex content-top st-<?php echo esc_attr( $bstone_page_layout ); ?>">
	<div id="primary" <?php bstone_primary_class( 'st-flex-grow-1' ); ?>>
		
		<?php bstone_primary_content_top(); ?>
	
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<?php ;/* Start the Loop */ ?>
			<?php bstone_content_while_before(); ?>

			<div class="st-row bst-posts-cnt">
				
			<?php
			bstone_get_masonry_grid_sizer();// Masonry grid sizer for Masonry layout
			$post_count_in_loop = 0;// Post count to insert 'clear' div after x posts in a row
			while ( have_posts() ) :
				the_post();
				$post_count_in_loop++;
			?>
			
				<?php
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content-blog', bstone_get_post_format() );
				?>
				
			<?php endwhile; ?>
			</div>

			<?php bstone_content_while_after(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
		
		<?php bstone_pagination(); ?>

		<?php bstone_primary_content_bottom(); ?>
		
	</div><!-- #primary -->

<?php
if ( 'right-sidebar' == $bstone_page_layout || 'left-sidebar' == $bstone_page_layout || 'both-sidebars' == $bstone_page_layout ) :
	  get_sidebar();
endif;
?>
  </div><!-- .st-container -->
  
<?php get_footer();
