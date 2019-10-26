<?php
/**
 * Loop for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bstone
 */
?>

<?php if ( have_posts() ) : ?>

	<?php while (have_posts()) : the_post(); ?>

	<?php
		/*
		* Include the Post-Format-specific template for the content.
		* If you want to override this in a child theme, then include a file
		* called content-___.php (where ___ is the Post Format name) and that will be used instead.
		*/
		get_template_part( 'template-parts/content-blog', bstone_get_post_format() );
	?>

	<?php endwhile; ?>

<?php else : ?>
	
<?php endif; ?>