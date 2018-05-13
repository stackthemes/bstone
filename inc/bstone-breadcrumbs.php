<?php
/**
 * Get breadcrumbs for all types of pages.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.6
 */

if ( ! function_exists( 'bstone_get_breadcrumbs' ) ) {
	/**
	 * @since  1.0.6
	 */
	function bstone_get_breadcrumbs() {

        // Set variables for later use
        $home_link        = esc_url( home_url('/') );
        $home_text        = bstone_default_strings('string-breadcrumb-home', false);
        $link_before      = '<li typeof="v:Breadcrumb">';
        $link_after       = '</li>';
        $link_attr        = ' rel="v:url" property="v:title"';
        $link             = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
        $delimiter        = '<li class="delimiter"> &raquo; </li>'; // Delimiter between crumbs
        $before           = '<li class="trail-item trail-end" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span class="current" itemprop="name">'; // Tag before the current crumb
        $after            = '</li></span>'; // Tag after the current crumb
        $page_addon       = ''; // Adds the page number if the query is paged
        $breadcrumb_trail = '';
        $category_links   = '';

        // Set our own $wp_the_query variable. Do not use the global variable version due to reliability
        $wp_the_query   = $GLOBALS['wp_the_query'];
        $queried_object = $wp_the_query->get_queried_object();

        // Handle single post requests which includes single pages, posts and attatchments
        if ( is_singular() ) {
            /**
             * Set our own $post variable. Do not use the global variable version due to 
             * reliability. We will set $post_object variable to $GLOBALS['wp_the_query']
             */
            $post_object = sanitize_post( $queried_object );

            // Set variables
            $title          = apply_filters( 'the_title', $post_object->post_title );
            $parent         = $post_object->post_parent;
            $post_type      = $post_object->post_type;
            $post_id        = $post_object->ID;
            $post_link      = $before . $title . $after;
            $parent_string  = '';
            $post_type_link = '';

            if ( 'post' === $post_type ) {

                // Get the post categories
                $categories = get_the_category( $post_id );

                if ( $categories ) {
                    // Lets grab the first category
                    $category  = $categories[0];

                    $category_links = get_category_parents( $category, true, $delimiter );
                    $category_links = str_replace( '<a',   $link_before . '<a' . $link_attr, $category_links );
                    $category_links = str_replace( '</a>', '</a>' . $link_after,             $category_links );
                }
            }

            if ( !in_array( $post_type, array('post', 'page', 'attachment') ) )
            {
                $post_type_object = get_post_type_object( $post_type );
                $archive_link     = esc_url( get_post_type_archive_link( $post_type ) );

                $post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
            }

            // Get post parents if $parent !== 0
            if ( 0 !== $parent ) 
            {
                $parent_links = array();
                while ( $parent ) {
                    $post_parent = get_post( $parent );

                    $parent_links[] = sprintf( $link, get_permalink( $post_parent->ID ) , get_the_title( $post_parent->ID ) );

                    $parent = $post_parent->post_parent;
                }

                $parent_links = array_reverse( $parent_links );

                $parent_string = implode( $delimiter, $parent_links );
            }

            // Lets build the breadcrumb trail
            if ( $parent_string ) {
                $breadcrumb_trail = $parent_string . $delimiter . $post_link;
            } else {
                $breadcrumb_trail = $post_link;
            }

            if ( $post_type_link ) {
                $breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;
            }

            if ( $category_links ) {
                $breadcrumb_trail = $category_links . $breadcrumb_trail;
            }
        }

        // Handle archives which includes category-, tag-, taxonomy-, date-, custom post type archives and author archives
        if( is_archive() ) {
            if (    is_category()
                 || is_tag()
                 || is_tax()
            ) {

                // Set the variables for this section
                $term_object        = get_term( $queried_object );
                $taxonomy           = $term_object->taxonomy;
                $term_id            = $term_object->term_id;
                $term_name          = $term_object->name;
                $term_parent        = $term_object->parent;
                $taxonomy_object    = get_taxonomy( $taxonomy );
                $current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
                $parent_term_string = '';

                if ( 0 !== $term_parent ) {
                    // Get all the current term ancestors
                    $parent_term_links = array();
                    while ( $term_parent ) {
                        $term = get_term( $term_parent, $taxonomy );

                        $parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );

                        $term_parent = $term->parent;
                    }

                    $parent_term_links  = array_reverse( $parent_term_links );
                    $parent_term_string = implode( $delimiter, $parent_term_links );
                }

                if ( $parent_term_string ) {
                    $breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
                } else {
                    $breadcrumb_trail = $current_term_link;
                }

            }  elseif ( is_author() ) {

                $breadcrumb_trail = bstone_default_strings('string-breadcrumb-author-archive', false) .  $before . $queried_object->data->display_name . $after;

            } elseif ( is_date() ) {

                // Set default variables
                $year     = $wp_the_query->query_vars['year'];
                $monthnum = $wp_the_query->query_vars['monthnum'];
                $day      = $wp_the_query->query_vars['day'];

                // Get the month name if $monthnum has a value
                if ( $monthnum ) {
                    $date_time  = DateTime::createFromFormat( '!m', $monthnum );
                    $month_name = $date_time->format( 'F' );
                }

                if ( is_year() ) {

                    $breadcrumb_trail = $before . $year . $after;

                } elseif( is_month() ) {

                    $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );

                    $breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

                } elseif( is_day() ) {

                    $year_link        = sprintf( $link, esc_url( get_year_link( $year ) ),             $year       );
                    $month_link       = sprintf( $link, esc_url( get_month_link( $year, $monthnum ) ), $month_name );

                    $breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
                }

            } elseif ( is_post_type_archive() ) {

                $post_type        = $wp_the_query->query_vars['post_type'];
                $post_type_object = get_post_type_object( $post_type );

                $breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;
            }
        }

        // Handle the search page
        if ( is_search() ) {
            $breadcrumb_trail = bstone_default_strings('string-breadcrumb-search', false) . $before . get_search_query() . $after;
        }

        // Handle 404's
        if ( is_404() ) {
            $breadcrumb_trail = $before . bstone_default_strings('string-breadcrumb-not-found', false) . $after;
        }

        // Handle paged pages
        if ( is_paged() ) {
            $current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
            /* translators: 1: Page. */
            $page_addon   = $before . sprintf( __( ' ( Page %s )', 'bstone' ), number_format_i18n( $current_page ) ) . $after;
        }

        $breadcrumb_output_link  = '';
        $breadcrumb_output_link .= '<nav role="navigation" aria-label="Breadcrumbs" class="site-breadcrumbs clr" itemprop="breadcrumb">';
        $breadcrumb_output_link .= '<ul class="trail-items" itemscope="" itemtype="http://schema.org/BreadcrumbList">';
        if (    is_home()
            || is_front_page()
        ) {
            // Do not show breadcrumbs on page one of home and frontpage
            if ( is_paged() ) {
                $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="home" itemprop="name">' . $home_text . '</a>';
                $breadcrumb_output_link .= $page_addon;
            }
        } else {
            $breadcrumb_output_link .= '<li class="trail-item trail-begin" itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">';
            $breadcrumb_output_link .= '<a href="' . $home_link . '" rel="v:url" property="v:title" rel="home" itemprop="name">' . $home_text . '</a>';
            $breadcrumb_output_link .= '</li>';
            $breadcrumb_output_link .= $delimiter;
            $breadcrumb_output_link .= $breadcrumb_trail;
            $breadcrumb_output_link .= $page_addon;
        }
        $breadcrumb_output_link .= '</ul>';
        $breadcrumb_output_link .= '</nav><!-- .breadcrumbs -->';

        return $breadcrumb_output_link;
	}
}