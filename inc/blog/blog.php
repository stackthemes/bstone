<?php
/**
 * Blog Helper Functions
 *
 * @package Bstone
 */

/**
 * Move comment field to bottom
 */
if ( ! function_exists( 'bstone_post_styles' ) ) {
	
	function bstone_post_styles( $blog_style, $type = 'class' ) {
		
		global $wp_query;
		
		global $post_count_in_loop;
		
		$post_index = $wp_query->current_post+1;
		
		$post_classes = array();
		
		$post_clear = '';

		if( 'grid' == $blog_style || 'masonry' == $blog_style ) {

			// Blog columns in a row	  
			$blog_post_cols = bstone_options( 'blog-post-cols-count' );

			switch ($blog_post_cols) {
			  case 1:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-12' );
				  break;
			  case 2:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-6' );
				  break;
			  case 3:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-4' );
				  break;
			  case 4:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-3' );
				  break;
			  case 5:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-2-4' );
				  break;
			  case 6:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-2' );
				  break;
			  default:
				  $post_classes = array( 'st-col-sm-12', 'st-col-lg-6' );
			}
			
			// Insert 'clear' div after $blog_post_cols posts
			
			if( $post_count_in_loop == $blog_post_cols && 'clear' == $type ) {
				
				  $post_count_in_loop = 0; // Reset post count

				  $post_clear = '<div class="clear"></div>';
			}

		}
		
		// Post List Style - Classes
		
		if( 'list' == $blog_style ) {
			
			// Image Position			
			$blog_post_img_position = bstone_options( 'blog-display-style-list' );
					
			$elements = bstone_options( 'blog-post-structure' );
			
			switch ($blog_post_img_position) {
			  case 'left':
				  $post_classes = array( 'st-col-sm-12', 'bst-post-list', 'img-left' );
				  break;
			  case 'right':
				  $post_classes = array( 'st-col-sm-12', 'bst-post-list', 'img-right' );
				  break;
			  case 'left-right':
				  if( $post_index % 2 == 0 ) :
					  $post_classes = array( 'st-col-sm-12', 'bst-post-list', 'img-right' );
				  else:
					  $post_classes = array( 'st-col-sm-12', 'bst-post-list', 'img-left' );
				  endif;
				  break;
			  default:
				  $post_classes = array( 'st-col-sm-12', 'bst-post-list', 'img-left' );
			}
			
			if ( in_array( "image", $elements ) ) { array_push($post_classes, 'st-flex-inner'); }
		}
		
		// Full width post style - Classes
		
		if( 'full-width' == $blog_style ) {
			$post_classes = array( 'st-col-sm-12', 'st-col-lg-12' );
		}

		// Full width first post

		if( 'grid' == $blog_style || 'masonry' == $blog_style || 'list' == $blog_style ) {

			$blog_display_style = bstone_options( 'blog-display-style' );

			if( '1-full-1' == $blog_display_style || '1-full-all' == $blog_display_style ) {

				  $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
				
				  // Full width first post on first page
				
				  if( '1-full-1' == $blog_display_style ) {

					  if( 1 == $current_page && 1 == $post_index ) {
						  $post_classes = array( 'st-col-sm-12', 'st-col-lg-12', 'first-full-width-post' );
						  
						  // Reset post count - to insert 'clear' div after x posts
						  $post_count_in_loop = 0;
					  }
				  
				  // Full width first post on all pages
					  
				  } else if( '1-full-all' == $blog_display_style ) {

					  if( 1 == $post_index ) {
						  $post_classes = array( 'st-col-sm-12', 'st-col-lg-12', 'first-full-width-post' );
						  
						  // Reset post count - to insert 'clear' div after x posts
						  $post_count_in_loop = 0;
					  }

				  }
			}
		}	
		
		if( 'class' == $type ) {
			
			return $post_classes;
			
		} else if( 'clear' == $type ) {
			
			return $post_clear;
			
		}
	}
	
}// End if().

/**
 * Masonry Grid Sizer
 */
if ( ! function_exists( 'bstone_get_masonry_grid_sizer' ) ) {
	function bstone_get_masonry_grid_sizer( $echo = true ) {
		$blog_style = bstone_options( 'blog-style' );
		
		$grid_sizer = '';
		
		$blog_post_cols = bstone_options( 'blog-post-cols-count' );
		
		$grid_size_class = 'msgrid-6';
		
		switch ($blog_post_cols) {
		  case 1:
			  $grid_size_class = 'msgrid-12';
			  break;
		  case 2:
			  $grid_size_class = 'msgrid-6';
			  break;
		  case 3:
			  $grid_size_class = 'msgrid-4';
			  break;
		  case 4:
			  $grid_size_class = 'msgrid-3';
			  break;
		  case 5:
			  $grid_size_class = 'msgrid-2-4';
			  break;
		  case 6:
			  $grid_size_class = 'msgrid-2';
			  break;
		  default:
			  $grid_size_class = 'msgrid-6';
		}
		
		if( 'masonry' == $blog_style ) {
			
			$grid_sizer = '<div class="masonry-grid-sizer '.$grid_size_class.'"></div>';
			
		}
		
		$grid_sizer_output = apply_filters( 'bstone_get_masonry_grid_sizer', $grid_sizer );
		
		if( true == $echo ) {
			echo $grid_sizer_output;
		} else {
			return $grid_sizer_output;
		}
	}
}// End if().


/**
 * Get related post classes
 */ 
if ( ! function_exists( 'bstone_related_post_classes' ) ) {
	function bstone_related_post_classes() {
		
		$related_posts_classes = array();
		
		$related_posts_cols    = bstone_options( 'blog-related-columns' );
		
		switch ($related_posts_cols) {
		  case 1:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-12' );
			  break;
		  case 2:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-6' );
			  break;
		  case 3:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-4' );
			  break;
		  case 4:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-3' );
			  break;
		  case 5:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-2-4' );
			  break;
		  case 6:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-2' );
			  break;
		  default:
			  $related_posts_classes = array( 'st-col-sm-12', 'st-col-lg-6' );
		}
		
		return apply_filters( 'bstone_related_post_classes', $related_posts_classes );
	}
} // End if