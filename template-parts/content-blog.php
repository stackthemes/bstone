<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bstone
 */

  // Blog Style
  $blog_style = bstone_options( 'blog-style' );
  
  $post_classes = bstone_post_styles( $blog_style );

?>

<?php bstone_entry_before(); ?>

<article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" id="post-<?php the_ID(); ?>" <?php post_class( $post_classes ); ?>>
	<div class="bst-article-inner<?php if( in_array( 'st-flex-inner', $post_classes ) ) {echo ' st-flex';} ?>">
	
		<?php bstone_entry_top(); ?>

		<?php
			// Get Elements

			$elements = bstone_options( 'blog-post-structure' );

			// If Blog_Style = List -->

			$list_img_cnt_start = $list_img_cnt_end = $list_txt_cnt_start = $list_txt_cnt_end = '';

			if( 'list' == $blog_style ) {
				if ( in_array( "image", $elements ) ) {

					// Remove "image" from array and merge at start of array
					if (($key = array_search( "image", $elements) ) !== false) {
						unset($elements[$key]);
					}				
					$elements = array_merge( array( 'image' ), $elements);

					$list_img_cnt_start = '<div class="bst-thumb-img-cnt">';
					$list_img_cnt_end = '</div>';

					$list_txt_cnt_start = '<div class="bst-thumb-text-cnt">';
					$list_txt_cnt_end = '</div>';
				}
			} // <--

			// Loop through elements
			foreach ( $elements as $index => $element ) {

				// Featured Image
				if ( 'image' == $element ) {

					echo $list_img_cnt_start;

					get_template_part( 'template-parts/blog/media/blog-entry', bstone_get_post_format() );

					echo $list_img_cnt_end;

				}

				if( 1 == $index ) { echo $list_txt_cnt_start; }

				// Title
				if ( 'post-title' == $element ) {

					get_template_part( 'template-parts/blog/header' );

				}

				// Meta
				if ( 'post-meta' == $element ) {

					get_template_part( 'template-parts/blog/meta' );

				}

				// Content
				if ( 'post-content' == $element ) {

					get_template_part( 'template-parts/blog/content' );

				}

				// Read more button
				if ( 'read-more' == $element ) {

					get_template_part( 'template-parts/blog/readmore' );

				}

				if( $element === end($elements) ) { echo $list_txt_cnt_end; }

			}
		?>

		<?php bstone_entry_bottom(); ?>
	</div>
	
</article><!-- #post-<?php the_ID(); ?> -->

<?php
  if( 'grid' == $blog_style ) { echo bstone_post_styles( $blog_style, 'clear' ); }
?>

<?php bstone_entry_after(); ?>
