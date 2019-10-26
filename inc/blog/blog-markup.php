<?php
/**
 * Blog Helper Functions
 *
 * @package Bstone
 */

if ( ! function_exists( 'bstone_entry_meta_comments' ) ) {
	function bstone_entry_meta_comments( $meta_icons, $icon_typ, $icon_status ) {

		$zero = esc_html( bstone_options( 'blog-comments-txt-zero' ) );
		
		$one = esc_html( bstone_options( 'blog-comments-txt-one' ) );
		
		$more = esc_html( bstone_options( 'blog-comments-txt-more' ) );
		
		$comment_count = get_comments_number();
		
		$comment_text = '';
		
		if( 0 == $comment_count ) {
			
			$comment_text = $zero;
			
		} else if( 1 == $comment_count ) {
			
			$comment_text = $one;
			
		} else {
			
			$comment_text = $comment_count.' '.$more;
			
		}
		
		$meta_icons_html = '';
		
		if( true == $meta_icons && true == $icon_status ) {
			$meta_icons_html = '<i class="' . esc_attr( $icon_typ ) . ' fa-comment"></i>';
		}
		
		return apply_filters( 'bstone_entry_meta_comments', '<span class="meta-comments meta-cnt">'.$meta_icons_html.'<a class="url" href="'.get_comments_link().'">'.$comment_text.'</a></span>' );
		
	}
}

if ( ! function_exists( 'bstone_entry_meta_category' ) ) {
	function bstone_entry_meta_category( $meta_icons, $icon_typ, $icon_status ) {
		
		$categories_list = get_the_category_list( esc_html__( ', ', 'bstone' ) );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			
			$meta_icons_html = '';
		
			if( true == $meta_icons && true == $icon_status ) {
				$meta_icons_html = '<i class="' . esc_attr( $icon_typ ) . ' fa-folder"></i>';
			}
			
			$output = '';
			
			if( true == bstone_options('display-meta-text') ) {
				$output_tgs = sprintf(
					/* translators: %1$s: Post Tags */
					esc_html__( 'Posted in %1$s', 'bstone' ),
					$categories_list
				);

				$output = '<span class="cat-links meta-cnt">' . $meta_icons_html . $output_tgs . '</span>';
			} else {
				$output = '<span class="cat-links meta-cnt">' . $meta_icons_html . $categories_list . '</span>';
			}
			
			return apply_filters( 'bstone_entry_meta_category', $output );
		}
		
	}
}

if ( ! function_exists( 'bstone_entry_meta_author' ) ) {
	function bstone_entry_meta_author( $meta_icons, $icon_typ, $icon_status ) {
		
		$meta_icons_html = '';
		
		if( true == $meta_icons && true == $icon_status ) {
			$meta_icons_html = '<i class="' . esc_attr( $icon_typ ) . ' fa-user"></i>';
		}
		
		if( true == bstone_options('display-meta-text') ) {
			
			$byline = '<span class="author vcard meta-cnt">'.$meta_icons_html;
			$byline .= __('by', 'bstone');
			$byline .= ' <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="'.bstone_default_strings('string-post-by-title', false).' '.esc_html( get_the_author() ).'">' . esc_html( get_the_author() ) . '</a>';
			$byline .= '</span>';
			
		} else {
			
			$byline = '<span class="author vcard meta-cnt">'.$meta_icons_html;
			$byline .= ' <a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="'.bstone_default_strings('string-post-by-title', false).' '.esc_html( get_the_author() ).'">' . esc_html( get_the_author() ) . '</a>';
			$byline .= '</span>';
			
		}
		
		return apply_filters( 'bstone_entry_meta_author', $byline );
		
	}
}

if ( ! function_exists( 'bstone_entry_meta_author_by_post_id' ) ) {
	function bstone_entry_meta_author_by_post_id( $meta_icons, $icon_typ, $icon_status, $posd_id ) {
		
		$meta_icons_html = '';
		
		if( true == $meta_icons && true == $icon_status ) {
			$meta_icons_html = '<i class="' . esc_attr( $icon_typ ) . ' fa-user"></i>';
		}
		
		$author_id = get_post_field ( 'post_author', $posd_id );

		if( true == bstone_options('display-meta-text') ) {
			
			$byline = '<span class="author vcard meta-cnt">'.$meta_icons_html;
			$byline .= __('by', 'bstone');
			$byline .= ' <a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '" title="'.bstone_default_strings('string-post-by-title', false).' '.esc_html( get_the_author_meta( 'display_name', $author_id ) ).'">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</a>';
			$byline .= '</span>';
			
		} else {
			
			$byline = '<span class="author vcard meta-cnt">'.$meta_icons_html;
			$byline .= ' <a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '" title="'.bstone_default_strings('string-post-by-title', false).' '.esc_html( get_the_author_meta( 'display_name', $author_id ) ).'">' . esc_html( get_the_author_meta( 'display_name', $author_id ) ) . '</a>';
			$byline .= '</span>';
			
		}
		
		return apply_filters( 'bstone_entry_meta_author', $byline );
		
	}
}

if ( ! function_exists( 'bstone_entry_meta_date' ) ) {
	function bstone_entry_meta_date( $meta_icons, $icon_typ, $icon_status ) {
		
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
		
		$meta_icons_html = '';
		
		if( true == $meta_icons && true == $icon_status ) {
			$meta_icons_html = '<i class="' . esc_attr( $icon_typ ) . ' fa-clock"></i>';
		}
		
		if( true == bstone_options('display-meta-text') ) {
			$posted_on = '<span class="meta-date meta-cnt">'.$meta_icons_html.sprintf(
				/* translators: %s: post date. */
				esc_html_x( 'Posted on %s', 'post date', 'bstone' ), $time_string
			).'</span>';
		} else {
			$posted_on = '<span class="meta-date meta-cnt">'.$meta_icons_html.$time_string.'</span>';
		}		
		
		return apply_filters( 'bstone_entry_meta_date', $posted_on );
		
	}
}

if ( ! function_exists( 'bstone_entry_meta_tag' ) ) {
	function bstone_entry_meta_tag( $meta_icons, $icon_typ, $icon_status ) {
		
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bstone' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			
			$meta_icons_html = '';
		
			if( true == $meta_icons && true == $icon_status ) {
				$meta_icons_html = '<i class="' . esc_attr( $icon_typ ) . ' fa-tag"></i>';
			}
			
			$output = '';
			
			if( true == bstone_options('display-meta-text') ) {

				$output_tgs = sprintf(
					/* translators: %1$s: Post tags */
					esc_html__( 'Tagged %1$s', 'bstone' ),
					$tags_list
				);

				$output = '<span class="tags-links meta-cnt">'.$meta_icons_html . $output_tgs . '</span>';

			} else {
				
				$output = '<span class="tags-links meta-cnt">'.$meta_icons_html.$tags_list.'</span>';
			}
			
			return apply_filters( 'bstone_entry_meta_tag', $output );
		}
		
	}
}