<?php
/**
 * Displays the post entry header
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php do_action( 'bstone_blog_entry_title_before' ); ?>

<header class="entry-header">

	<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>

</header><!-- .entry-header -->

<?php do_action( 'bstone_blog_entry_title_after' ); ?>
