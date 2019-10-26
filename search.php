<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
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
		if ( have_posts() ) : ?>

			<div class="st-row bst-posts-cnt">

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content-blog', bstone_get_post_format() );

				endwhile;

				the_posts_navigation();

				?>
			</div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

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