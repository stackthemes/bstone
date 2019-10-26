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

	<?php
	if ( is_singular() ) :
		the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' );
	else :
		the_title( sprintf( '<h2 class="entry-title" itemprop="headline"><a href="%s" rel="bookmark">', get_permalink() ), '</a></h2>' );
	endif; ?>

</header><!-- .entry-header -->

<?php do_action( 'bstone_blog_entry_title_after' ); ?>
