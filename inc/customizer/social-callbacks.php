<?php
/**
 * Social Icons Callback Functions for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Header Icons Callback Functions ----------------------------------------------

	// Twitter
	function bstone_check_icons_twitter_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-twitter-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Facebook
	function bstone_check_icons_facebook_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-facebook-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Google Plus
	function bstone_check_icons_google_plus_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-google_plus-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Pinterest
	function bstone_check_icons_pinterest_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-pinterest-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Dribbble
	function bstone_check_icons_dribbble_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-dribbble-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Behance
	function bstone_check_icons_behance_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-behance-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// VK
	function bstone_check_icons_vk_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-vk-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Instagram
	function bstone_check_icons_instagram_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-instagram-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// LinkedIn
	function bstone_check_icons_linkedin_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-linkedin-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Tumblr
	function bstone_check_icons_tumblr_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-tumblr-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Github
	function bstone_check_icons_github_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-github-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Flickr
	function bstone_check_icons_flickr_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-flickr-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Skype
	function bstone_check_icons_skype_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-skype-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Youtube
	function bstone_check_icons_youtube_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-youtube-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Vimeo
	function bstone_check_icons_vimeo_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-vimeo-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Vine
	function bstone_check_icons_vine_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-vine-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Xing
	function bstone_check_icons_xing_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-xing-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Yelp
	function bstone_check_icons_yelp_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-yelp-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// 500px
	function bstone_check_icons_500px_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-500px-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Tripadvisor
	function bstone_check_icons_tripadvisor_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-tripadvisor-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// RSS
	function bstone_check_icons_rss_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-rss-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Email
	function bstone_check_icons_email_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-email-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 1
	function bstone_check_icons_extra1_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-extra1-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 2
	function bstone_check_icons_extra2_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-extra2-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 3
	function bstone_check_icons_extra3_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-extra3-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 4
	function bstone_check_icons_extra4_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-extra4-header') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 5
	function bstone_check_icons_extra5_diff_colors_header() {
		if( 'header' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-header') ) {
				if( true == bstone_options('enable-extra5-header') ) {
					return true;
				} return false; } return false; } return false;
	}

// Footer Icons Callback Functions ----------------------------------------------

	// Twitter
	function bstone_check_icons_twitter_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-twitter-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Facebook
	function bstone_check_icons_facebook_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-facebook-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Google Plus
	function bstone_check_icons_google_plus_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-google_plus-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Pinterest
	function bstone_check_icons_pinterest_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-pinterest-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Dribbble
	function bstone_check_icons_dribbble_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-dribbble-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Behance
	function bstone_check_icons_behance_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-behance-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// VK
	function bstone_check_icons_vk_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-vk-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Instagram
	function bstone_check_icons_instagram_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-instagram-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// LinkedIn
	function bstone_check_icons_linkedin_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-linkedin-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Tumblr
	function bstone_check_icons_tumblr_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-tumblr-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Github
	function bstone_check_icons_github_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-github-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Flickr
	function bstone_check_icons_flickr_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-flickr-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Skype
	function bstone_check_icons_skype_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-skype-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Youtube
	function bstone_check_icons_youtube_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-youtube-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Vimeo
	function bstone_check_icons_vimeo_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-vimeo-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Vine
	function bstone_check_icons_vine_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-vine-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Xing
	function bstone_check_icons_xing_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-xing-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Yelp
	function bstone_check_icons_yelp_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-yelp-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// 500px
	function bstone_check_icons_500px_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-500px-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Tripadvisor
	function bstone_check_icons_tripadvisor_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-tripadvisor-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// RSS
	function bstone_check_icons_rss_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-rss-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Email
	function bstone_check_icons_email_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-email-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 1
	function bstone_check_icons_extra1_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-extra1-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 2
	function bstone_check_icons_extra2_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-extra2-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 3
	function bstone_check_icons_extra3_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-extra3-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 4
	function bstone_check_icons_extra4_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-extra4-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 5
	function bstone_check_icons_extra5_diff_colors_footer() {
		if( 'footer' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-footer') ) {
				if( true == bstone_options('enable-extra5-footer') ) {
					return true;
				} return false; } return false; } return false;
	}

// Sidebar Icons Callback Functions ----------------------------------------------

	// Twitter
	function bstone_check_icons_twitter_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-twitter-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Facebook
	function bstone_check_icons_facebook_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-facebook-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Google Plus
	function bstone_check_icons_google_plus_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-google_plus-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Pinterest
	function bstone_check_icons_pinterest_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-pinterest-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Dribbble
	function bstone_check_icons_dribbble_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-dribbble-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Behance
	function bstone_check_icons_behance_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-behance-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// VK
	function bstone_check_icons_vk_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-vk-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Instagram
	function bstone_check_icons_instagram_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-instagram-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// LinkedIn
	function bstone_check_icons_linkedin_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-linkedin-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Tumblr
	function bstone_check_icons_tumblr_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-tumblr-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Github
	function bstone_check_icons_github_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-github-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Flickr
	function bstone_check_icons_flickr_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-flickr-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Skype
	function bstone_check_icons_skype_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-skype-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Youtube
	function bstone_check_icons_youtube_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-youtube-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Vimeo
	function bstone_check_icons_vimeo_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-vimeo-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Vine
	function bstone_check_icons_vine_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-vine-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Xing
	function bstone_check_icons_xing_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-xing-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Yelp
	function bstone_check_icons_yelp_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-yelp-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// 500px
	function bstone_check_icons_500px_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-500px-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Tripadvisor
	function bstone_check_icons_tripadvisor_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-tripadvisor-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// RSS
	function bstone_check_icons_rss_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-rss-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Email
	function bstone_check_icons_email_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-email-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 1
	function bstone_check_icons_extra1_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-extra1-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 2
	function bstone_check_icons_extra2_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-extra2-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 3
	function bstone_check_icons_extra3_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-extra3-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 4
	function bstone_check_icons_extra4_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-extra4-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}

	// Extra 5
	function bstone_check_icons_extra5_diff_colors_sidebar() {
		if( 'sidebar' == bstone_options('social-icons-position-select') ) {
			if( true == bstone_options('enable-different-icon-colors-sidebar') ) {
				if( true == bstone_options('enable-extra5-sidebar') ) {
					return true;
				} return false; } return false; } return false;
	}