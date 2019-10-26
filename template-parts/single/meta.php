<?php
/**
 * Displays the post entry meta
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'post' === get_post_type() ) :
?>

<div class="entry-meta">
<?php
	// Get Meta Elements

	$meta_elements = bstone_options( 'blog-single-meta' );
	
	$meta_icons = bstone_options( 'display-meta-icons' );
	
	$meta_icons_type = bstone_options( 'meta-icons-type' );
	
	$meta_icons_status = bstone_options( 'bstone-font-awesome-icons' );
	$meta_icons_type_r = bstone_options( 'bstone-font-awesome-regular' );
	$meta_icons_type_s = bstone_options( 'bstone-font-awesome-solid' );
	
	$bst_meta_icons_typ = '';
	
	if( true == $meta_icons_status ) {
		if( true == $meta_icons_type_r ) { $bst_meta_icons_typ = 'far'; } else 
		if( true == $meta_icons_type_s ) { $bst_meta_icons_typ = 'fas'; }
		
		if( 'regular' == $meta_icons_type && true == $meta_icons_type_r ) {
			$bst_meta_icons_typ = 'far';

		} else if( 'solid' == $meta_icons_type && true == $meta_icons_type_s ) {
			$bst_meta_icons_typ = 'fas';
		}
	}
	
	if( is_array( $meta_elements ) ) :

		// Loop through elements
		foreach ( $meta_elements as $index => $element ) :
	
			if( count(  $meta_elements) > 1 && $index != 0 ) :
				echo '<span class="bst-meta-sep">'.esc_html( bstone_options( 'blog-meta-separator' ) ).'</span>';
			endif;

			// Comments Count
			if ( 'comments' == $element ) {
				echo bstone_entry_meta_comments( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
			}

			// Category
			if ( 'category' == $element ) {
				echo bstone_entry_meta_category( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
			}

			// Author
			if ( 'author' == $element ) {
				echo bstone_entry_meta_author( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
			}

			// Post Date
			if ( 'date' == $element ) {
				echo bstone_entry_meta_date( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
			}

			// Post Tags
			if ( 'tag' == $element ) {
				echo bstone_entry_meta_tag( $meta_icons, $bst_meta_icons_typ, $meta_icons_status );
			}

		endforeach;
	
	endif;
?>
</div><!-- .entry-meta -->
<?php endif; ?>

