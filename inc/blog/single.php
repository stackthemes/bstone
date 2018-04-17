<?php
/**
 * Blog Single Post Helper Functions
 *
 * @package Bstone
 */

if ( ! function_exists( 'bstone_single_post_footer_tags' ) ) {
	
	function bstone_single_post_footer_tags() {
		
		$output = '';
		
		$tags_list = get_the_tag_list( '', '<span class="bst-tag-sep">, </span>' );
		
		if ( $tags_list ) {			
			$output = '<span class="tags-links meta-cnt">'.$tags_list.'</span>';
		}
		
		return apply_filters( 'bstone_single_post_footer_tags', $output );
	}	
} // End if

/**
 * Bstone entry after - Post Single
 */ 
if ( ! function_exists( 'bstone_post_single_after_post_sections' ) ) {

	/**
	 * Get After Post Sections
	 */
	function bstone_post_single_after_post_sections() {

		if ( is_single() ) {

			// Get Post After Elements
			$elements_after = bstone_options( 'after-single-post-structure' );
			
			foreach ( $elements_after as $element ) {
				
				if( 'post-next-prev' == $element ) {
					echo bstone_get_post_nav();
				}
				
				if( 'post-author' == $element ) {
					echo bstone_get_author_info_box();
				}
				
				if( 'post-comments' == $element ) {
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				}
			}

		}
	}
} // End if
add_action( 'bstone_entry_after', 'bstone_post_single_after_post_sections' );

/**
 * Author Info Box
 */ 
if ( ! function_exists( 'bstone_get_author_info_box' ) ) {
	function bstone_get_author_info_box() {
		global $post;
		
		$author_box_content = $author_details = '';

		// Detect if it is a single post with a post author
		if ( is_single() && isset( $post->post_author ) ) {

			// Get author's display name 
			$display_name = get_the_author_meta( 'display_name', $post->post_author );

			// If display name is not available then use nickname as display name
			if ( empty( $display_name ) ) {
				$display_name = get_the_author_meta( 'nickname', $post->post_author );
			}

			// Get author's biographical information or description
			$user_description = get_the_author_meta( 'user_description', $post->post_author );

			// Get author's website URL 
			$user_website = get_the_author_meta('url', $post->post_author);

			// Get link to the author archive page
			$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
			
			$author_details = '<section class="bst-after-post author_bio_section" itemprop="author" itemscope="" itemtype="http://schema.org/Person">';

			if ( ! empty( $display_name ) && ! empty( $user_description ) ) {		
				$author_details .= '<h3 class="author_name">About the Author</h3>';		
			}

			// Author avatar and bio
			if ( ! empty( $user_description ) ) {

				$author_details .= '<div class="author_details st-flex">
				'.get_avatar( get_the_author_meta('user_email') , 100 ).'
				
				<div><a class="url fn n" href="'. $user_posts .'" itemprop="url" rel="author"> <h4 class="author-title" itemprop="name"> ' . $display_name . ' </h4> </a>
				
				<p>' . nl2br( $user_description ). '</p></div></div>'; 
			}
			
			$author_details .= '</section>';

			// Pass all this info to post content  
			$author_box_content = $author_details;

		}
		
		return apply_filters( 'bstone_get_author_info_box', $author_box_content );
	}
} // End if

/**
 * Post Nav
 */ 
if ( ! function_exists( 'bstone_get_post_nav' ) ) {
	function bstone_get_post_nav() {	
		
		$post_nav_taxonomy = bstone_options( 'nex-prev-liks-taxonomy' );
		
		$post_nav_content = '';
		
		if( 'default' == $post_nav_taxonomy ) {
			
			$post_nav_content = get_the_post_navigation();
			
		} else if( 'category' == $post_nav_taxonomy ) {
			
			$post_nav_content = get_the_post_navigation( array(
				'prev_text'                  => '%title',
				'next_text'                  => '%title',
				'in_same_term'               => true,
				'taxonomy'                   => 'category',
				'screen_reader_text' => __( 'Post Navigation', 'bstone' ),
			) );
			
		} else if( 'tag' == $post_nav_taxonomy ) {
			
			$post_nav_content = get_the_post_navigation( array(
				'prev_text'                  => '%title',
				'next_text'                  => '%title',
				'in_same_term'               => true,
				'taxonomy'                   => 'post_tag',
				'screen_reader_text' => __( 'Post Navigation', 'bstone' ),
			) );
		}		
		
		return apply_filters( 'bstone_get_post_nav', $post_nav_content );
	}
}// End if

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */

function bstone_comment_placeholders( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'bstone' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<label for="author">' . __( "Name", "bstone" ) . $label . '</label>
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name *", "bstone" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<label for="email">' . __( "Email", "bstone" ) . $label . '</label>
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email Address *", "bstone" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['url'] =
		'<p class="comment-form-url">
			<label for="url">' . __( "Website", "bstone" ) . '</label>
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website", "bstone" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'bstone_comment_placeholders' );

/**
 * Add placeholder to comment area.
 */
function bstone_comment_placeholders_textarea( $comment_field ) {

  $comment_field =
    '<p class="comment-form-comment">
            <label for="comment">' . __( "Comment", "bstone" ) . '</label>
            <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Enter Your Comments Here..", "bstone" ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';

  return $comment_field;
}
add_filter( 'comment_form_field_comment', 'bstone_comment_placeholders_textarea' );