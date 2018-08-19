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
						echo '<section class="bst-single-post-section">';
						comments_template();
						echo '</section>';
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
			
			$author_details = '<section class="bst-after-post author_bio_section bst-single-post-section" itemprop="author" itemscope="" itemtype="http://schema.org/Person">';

			// Author avatar and bio
			if ( ! empty( $user_description ) ) {

				$author_details .= '<div class="author_details st-flex">
				'.get_avatar( get_the_author_meta('user_email') , 100 ).'
				
				<div><a class="url fn n" href="'. $user_posts .'" itemprop="url" rel="author"> <h3 class="author-title" itemprop="name"> ' . ucwords( $display_name ) . ' </h3> </a>
				
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
 * Post Nav Classes
 */
if ( ! function_exists( 'bstone_get_post_nav_classes' ) ) {
	function bstone_get_post_nav_classes() {
		$post_nav_cntclass = '';
		$post_nav_style    = bstone_options( 'nex-prev-liks-style' );
		$post_nav_position = bstone_options( 'nex-prev-liks-position' );

		switch ($post_nav_position) {
			case 'center':
				$post_nav_cntclass = 'bst-post-nav center-fixed';
				break;
			default:
				$post_nav_cntclass = 'bst-post-nav default';
		}

		switch ($post_nav_style) {
			case 'title-arrow-top':
				$post_nav_cntclass .= ' bst-nav-arrow-top';
				break;
			case 'title-arrow-bottom':
				$post_nav_cntclass .= ' bst-nav-arrow-bottom';
				break;
			case 'title-arrow-side':
				$post_nav_cntclass .= ' bst-nav-arrow-side';
				break;
			case 'arrow-image-round':
				$post_nav_cntclass .= ' bst-nav-img-round';
				break;
			case 'only-arrows':
				$post_nav_cntclass .= ' bst-nav-arrows-only';
				break;
			default:
				$post_nav_cntclass .= ' bst-nav-arrow-top';
		}

		return $post_nav_cntclass;
	}
}

/**
 * Post Nav
 */ 
if ( ! function_exists( 'bstone_get_post_nav' ) ) {
	function bstone_get_post_nav() {

		$next_post = get_next_post();
		$prev_post = get_previous_post();
		
		$post_nav_style    = bstone_options( 'nex-prev-liks-style' );

		$post_nav_taxonomy = bstone_options( 'nex-prev-liks-taxonomy' );

		$post_nav_classes = bstone_get_post_nav_classes();

		$post_nav_before = '<div class="'.$post_nav_classes.' bst-single-post-section">';

		$post_nav_after = '</div>';
		
		$post_nav_content = '';

		$markup_prev_before = '';
		$markup_prev_after  = '';
		$markup_next_before = '';
		$markup_next_after  = '';

		switch ($post_nav_style) {
			case 'title-arrow-top':
				$markup_prev_before = '<i class="bst-icon-arrow-left" title="'.get_the_title( $prev_post ).'"></i>';
				$markup_prev_after  = '';
				$markup_next_before = '<i class="bst-icon-arrow-right" title="'.get_the_title( $next_post ).'"></i>';
				$markup_next_after  = '';
				break;
			case 'title-arrow-bottom':
				$markup_prev_before = '';
				$markup_prev_after  = '<i class="bst-icon-arrow-left" title="'.get_the_title( $prev_post ).'"></i>';
				$markup_next_before = '';
				$markup_next_after  = '<i class="bst-icon-arrow-right" title="'.get_the_title( $next_post ).'"></i>';
				break;
			case 'title-arrow-side':
				$markup_prev_before = '<i class="bst-icon-left-arrow" title="'.get_the_title( $prev_post ).'"></i>';
				$markup_prev_after  = '';
				$markup_next_before = '';
				$markup_next_after  = '<i class="bst-icon-right-arrow" title="'.get_the_title( $next_post ).'"></i>';
				break;
			case 'arrow-image-round':
				if (!empty( $prev_post )) {
					$markup_prev_before = '<span class="bst-post-nav-img bst-icon-left-arrow" title="'.get_the_title( $prev_post ).'">'.get_the_post_thumbnail( $prev_post->ID, array( 100, 100) ).'</span>';
				} else { $markup_prev_before = ''; }
				$markup_prev_after  = '';
				$markup_next_before = '';
				if (!empty( $next_post )) {
					$markup_next_after  = '<span class="bst-post-nav-img bst-icon-right-arrow" title="'.get_the_title( $next_post ).'">'.get_the_post_thumbnail( $next_post->ID, array( 100, 100) ).'</span>';
				} else { $markup_next_after = ''; }
				break;
			case 'only-arrows':
				$markup_prev_before = '<i class="bst-icon-bst-arrow-left" title="'.get_the_title( $prev_post ).'"></i>';
				$markup_prev_after  = '';
				$markup_next_before = '';
				$markup_next_after  = '<i class="bst-icon-bst-arrow-right" title="'.get_the_title( $next_post ).'"></i>';
				break;
			default:
				$markup_prev_before = '';
				$markup_prev_after  = '';
				$markup_next_before = '';
				$markup_next_after  = '';
		}
		
		if( 'default' == $post_nav_taxonomy ) {
			
			$post_nav_content = get_the_post_navigation( array(
				'prev_text'                  => $markup_prev_before.'<span class="bst-post-nav-title"><h5>'.'%title'.'</h5></span>'.$markup_prev_after,
				'next_text'                  => $markup_next_before.'<span class="bst-post-nav-title"><h5>'.'%title'.'</h5></span>'.$markup_next_after,
			) );
			
		} else if( 'category' == $post_nav_taxonomy ) {
			
			$post_nav_content = get_the_post_navigation( array(
				'prev_text'                  => $markup_prev_before.'<span class="bst-post-nav-title"><h5>'.'%title'.'</h5></span>'.$markup_prev_after,
				'next_text'                  => $markup_next_before.'<span class="bst-post-nav-title"><h5>'.'%title'.'</h5></span>'.$markup_next_after,
				'in_same_term'               => true,
				'taxonomy'                   => 'category',
				'screen_reader_text' => __( 'Post Navigation', 'bstone' ),
			) );
			
		} else if( 'tag' == $post_nav_taxonomy ) {
			
			$post_nav_content = get_the_post_navigation( array(
				'prev_text'                  => $markup_prev_before.'<span class="bst-post-nav-title"><h5>'.'%title'.'</h5></span>'.$markup_prev_after,
				'next_text'                  => $markup_next_before.'<span class="bst-post-nav-title"><h5>'.'%title'.'</h5></span>'.$markup_next_after,
				'in_same_term'               => true,
				'taxonomy'                   => 'post_tag',
				'screen_reader_text' => __( 'Post Navigation', 'bstone' ),
			) );
		}		
		
		return apply_filters( 'bstone_get_post_nav', $post_nav_before.$post_nav_content.$post_nav_after );
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
function bstone_comment_placeholders_textarea( $fields ) {

    $fields['comment_field'] =
    '<p class="comment-form-comment">
            <label for="comment">' . esc_html( bstone_default_strings( 'string-comment-field-label', false ) ) . '</label>
            <textarea required id="comment" name="comment" placeholder="' . esc_attr( bstone_default_strings( 'string-comment-field-placeholder', false ) ) . '" cols="45" rows="8" aria-required="true"></textarea>
        </p>';
    
    return $fields;
 }
add_filter( 'comment_form_defaults', 'bstone_comment_placeholders_textarea' );