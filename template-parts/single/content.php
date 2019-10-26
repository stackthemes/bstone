<?php
/**
 * Displays the single post content
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="entry-content clear" itemprop="text">

	<?php bstone_entry_content_before(); ?>

	<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. */
					__( 'Continue reading %s', 'bstone' ) . ' <span class="meta-nav">&rarr;</span>', array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			)
		);
	?>

	<?php bstone_entry_content_after(); ?>
	
	<?php
		wp_link_pages(
			array(
				'before'      => '<div class="page-links">' . esc_html( bstone_default_strings( 'string-single-page-links-before', false ) ),
				'after'       => '</div>',
				'link_before' => '<span class="page-link">',
				'link_after'  => '</span>',
			)
		);
	?>
	
</div><!-- .entry-content -->