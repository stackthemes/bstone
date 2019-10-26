<?php
/**
 * Displays the post content
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$blog_post_content_lenght = bstone_options( 'blog-post-content' );	
?>

<div class="entry-content clear" itemprop="text">

	<?php bstone_entry_content_before(); ?>

	<?php
    // Display excerpt
    if( 'excerpt' == $blog_post_content_lenght ) : ?>

        <?php the_excerpt(); ?>

    <?php
    // If excerpts are disabled, display full content
    else :

        the_content( '', '&hellip;' );

    endif; ?>

	<?php bstone_entry_content_after(); ?>
	
</div><!-- .entry-content -->