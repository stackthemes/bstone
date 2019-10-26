<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bstone
 * @since 1.0.0
 */

?>
	<?php bstone_content_bottom(); ?>
	</div><!-- #content -->
	
	<?php bstone_content_after(); ?>
	
	<?php bstone_footer_before(); ?>

	<?php bstone_footer(); ?>

	<?php bstone_footer_after(); ?>
	
</div><!-- #page -->

<?php bstone_body_bottom(); ?>

<?php wp_footer(); ?>

</body>
</html>