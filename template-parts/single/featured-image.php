<?php
/**
 * Displays the post featured image
 *
 * @package bstone
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if there isn't a thumbnail defined
if ( ! has_post_thumbnail() ) {
	return;
}

$post_thumb = get_the_post_thumbnail();

// Caption
$caption = NULL;
if( isset( get_post( get_post_thumbnail_id() )->post_excerpt ) ) {
	$caption = get_post( get_post_thumbnail_id() )->post_excerpt;
}

// Overlay on mouse hover
$overlay = bstone_options( 'overlay-on-img-hover' );
?>

<div class="thumbnail">
			
		<?php		
			// Images attr
			$img_id 	= get_post_thumbnail_id( get_the_ID(), 'full' );
			$img_url 	= wp_get_attachment_image_src( $img_id, 'full', true );
		?>
		
		<span class="post-thumb-cnt">
			<img src="<?php echo esc_url( $img_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" <?php echo ' '.bstone_schema_markup( 'image' ); ?> />
			<?php
			if( true == $overlay ) {
				echo '<span class="bst-img-overlay"></span>';
			}
			?>
		</span>
	
	<?php
	// Caption
	if ( $caption ) { ?>
		<div class="thumbnail-caption">
			<?php echo esc_html( $caption ); ?>
		</div>
	<?php } ?>
	
</div><!-- .thumbnail -->