<?php
/**
 * Displays the post thumbnail
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

// Post Image Size
if ( '' != bstone_options( 'blog-img-size' ) ) {
	$size = bstone_options( 'blog-img-size' );
} else {
	$size = 'full';
}

// Overlay on mouse hover
$overlay = bstone_options( 'overlay-on-img-hover' );

// Post type icon
$post_icon = bstone_options( 'post-type-icon' );

// Caption
$caption = NULL;
if( isset( get_post( get_post_thumbnail_id() )->post_excerpt ) ) {
	$caption = get_post( get_post_thumbnail_id() )->post_excerpt;
}
?>

<div class="thumbnail">
	
	<a href="<?php the_permalink(); ?>" class="thumbnail-link">
		
		<?php
			// Image width
			$img_width  = apply_filters( 'bstone_blog_entry_image_width', absint( bstone_options( 'blog-img-custom-width' ) ) );
			$img_height = apply_filters( 'bstone_blog_entry_image_height', absint( bstone_options( 'blog-img-custom-height' ) ) );
		
			$image_size_html = '';
			if( 0 != $img_width || '' != $img_width ) { $image_size_html = ' width="'.esc_attr( $img_width ).'"'; }
		
			if( 0 != $img_height || '' != $img_height ) { $image_size_html .= ' height="'.esc_attr( $img_height ).'"'; }
		
			// Images attr
			$img_id 	= get_post_thumbnail_id( get_the_ID(), $size );
			$img_url 	= wp_get_attachment_image_src( $img_id, $size, true );
		?>
		
		<span class="post-thumb-cnt">
			<img src="<?php echo esc_url( $img_url[0] ); ?>" alt="<?php the_title_attribute(); ?>" <?php echo $image_size_html; echo ' '.bstone_schema_markup( 'image' ); ?> />
			<?php
			  if( true == $overlay ) {
				  echo '<span class="bst-img-overlay"></span>';
			  }
			  
			  // Post Type Icon Html			
			  if( 'disable' != $post_icon ) {
				  
				  $post_icon_type = bstone_options( 'post-icon-type' );
				  $post_icon_size = bstone_options( 'post-icon-size' );
				  $post_icon_position = bstone_options( 'post-icon-position' );
				  
				  $post_icon_html = apply_filters( 'bstone_post_blog_icon', '<i class="'.esc_html($post_icon_type).' fa-music"></i>' );
				  
				  if( 'enable' == $post_icon ) {
					
					  echo '<span class="bst-post-type-icon '.esc_html($post_icon_position).' '.esc_html($post_icon_size).'">'.$post_icon_html.'</span>';
					  
				  } else {
					  
					  echo '<span class="bst-post-type-icon display-on-hover '.esc_html($post_icon_position).' '.esc_html($post_icon_size).'">'.$post_icon_html.'</span>';
					  
				  }
			  }
			?>
		</span>
	
	</a>
	
	<?php
	// Caption
	if ( $caption ) { ?>
		<div class="thumbnail-caption">
			<?php echo esc_html( $caption ); ?>
		</div>
	<?php } ?>
	
</div><!-- .thumbnail -->