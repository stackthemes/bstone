<?php
/**
 * Displays post footer
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>


<footer class="entry-footer">

	<?php
		$single_footer_elements = bstone_options( 'single-tags-share-structure' );
	
		if( is_array( $single_footer_elements ) ) :
	
			// Loop through elements
			foreach ( $single_footer_elements as $element ) :
	
				if ( 'single-tags' == $element ) {
					echo bstone_single_post_footer_tags();
				}
			endforeach;	
		endif;
	?>

</footer><!-- .entry-footer -->