<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bstone
 */
?>

<?php bstone_entry_before(); ?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="bst-article-inner-single">
	
		<?php bstone_entry_top(); ?>

		<?php
			// Get Post Elements
			$elements_post = bstone_options( 'blog-single-post-structure' );
			
			foreach ( $elements_post as $element ) {
				
				if( 'single-image' == $element ) {
					get_template_part( 'template-parts/single/featured-image' );
				}
				
				if( 'single-post-title' == $element ) {
					get_template_part( 'template-parts/single/title' );
				}
				
				if( 'single-post-meta' == $element ) {
					get_template_part( 'template-parts/single/meta' );
				}
				
				if( 'single-post-content' == $element ) {
					get_template_part( 'template-parts/single/content' );
				}
				
				if( 'single-post-footer' == $element ) {
					get_template_part( 'template-parts/single/entry-footer' );
				}				
			}

		?>

		<?php bstone_entry_bottom(); ?>
	
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->

<?php bstone_entry_after(); ?>
