<?php
/**
 * Blog / Archive Layout Option for Bstone Theme.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Customizer Tabs - To navigate to other related sections.
	 */
	$wp_customize->add_control(
		new Bstone_Control_Tabs(
			$wp_customize, BSTONE_THEME_SETTINGS . '[site-blog-layout-tabs]', array(
				'type'          => 'bst-tabs',
				'section'       => 'section-blog',
				'priority'      => 1,
				'settings'      => array(),
				'tabs_data'     => array(
					__('layout', 'bstone'),
					__('typography', 'bstone'),
					__('colors', 'bstone'),
					__('spacing', 'bstone')
				),
				'tabs_sections' => array(
					'section-blog',
					'section-archive-typo-settings',
					'section-color-blog',
					'section-spacing-blog'
				),
				'tabs_active'   => __('layout', 'bstone'),
			)
		)
	);

	/**
	 * Option: Blog Post Content
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-post-content]', array(
			'default'           => bstone_get_option( 'blog-post-content' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-post-content]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Blog Post Content', 'bstone' ),
			'type'     => 'select',
			'priority' => 5,
			'choices'  => array(
				'full-content' => __( 'Full Content', 'bstone' ),
				'excerpt'      => __( 'Excerpt', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Blog Post Content Length
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-post-content-length]', array(
			'default'           => bstone_get_option( 'blog-post-content-length' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-post-content-length]', array(
			'type'        => 'number',
			'section'     => 'section-blog',
			'priority'    => 10,
			'label'       => __( 'Excerpt Length', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 500,
			),
		)
	);

	/**
	 * Option: Blog Post Content More 
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-post-content-more]', array(
			'default'           => bstone_get_option( 'blog-post-content-more' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-post-content-more]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 15,
			'label'       => __( 'Excerpt End With', 'bstone' ),
		)
	);

	/**
	 * Option: Blog Post Read More Text
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-read-more-text]', array(
			'default'           => bstone_get_option( 'blog-read-more-text' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-read-more-text]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 20,
			'label'       => __( 'Read More Button Text', 'bstone' ),
			'description' => __( 'Text at the end of the excerpt.', 'bstone' ),
		)
	);

	/**
	 * Option: Blog Post Read More Icone
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-read-more-icon]', array(
			'default'           => bstone_get_option( 'blog-read-more-icon' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-read-more-icon]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 25,
			'label'       => __( 'Read More Button Icon', 'bstone' ),
			'description' => __( 'Icon to display in Read More button.', 'bstone' ),
		)
	);

	/**
	 * Option: Blog Style
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-style]', array(
			'default'           => bstone_get_option( 'blog-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-style]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Blog Style', 'bstone' ),
			'type'     => 'select',
			'priority' => 30,
			'choices'  => array(
				'full-width' => __( 'Full Width Post', 'bstone' ),
				'list'  	 => __( 'List', 'bstone' ),
				'grid'       => __( 'Grid', 'bstone' ),
				'masonry'    => __( 'Masonry', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Blog Grid Display Style
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-display-style]', array(
			'default'           => bstone_get_option( 'blog-display-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-display-style]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Posts Display Style', 'bstone' ),
			'type'     => 'select',
			'priority' => 35,
			'choices'  => array(
				'normal'     => __( 'Default', 'bstone' ),
				'1-full-1'   => __( 'First post full width on first page', 'bstone' ),
				'1-full-all' => __( 'First post full width on all pages', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Blog Display Style - List Style
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-display-style-list]', array(
			'default'           => bstone_get_option( 'blog-display-style-list' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-display-style-list]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Image Position - List Style', 'bstone' ),
			'type'     => 'select',
			'priority' => 40,
			'choices'  => array(
				'left'       => __( 'Image on left', 'bstone' ),
				'right'      => __( 'Image on right', 'bstone' ),
				'left-right' => __( 'One left, One right', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Blog Grid Display Style - List Style
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-list-text-position]', array(
			'default'           => bstone_get_option( 'blog-list-text-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-list-text-position]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Vertical Position - List Style', 'bstone' ),
			'type'     => 'select',
			'priority' => 40,
			'choices'  => array(
				'flex-start' => __( 'Top', 'bstone' ),
				'center'	 => __( 'Center', 'bstone' ),
				'flex-end'	 => __( 'Bottom', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Display Post Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-post-structure]', array(
			'default'           => bstone_get_option( 'blog-post-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-post-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-blog',
				'priority' => 45,
				'label'    => __( 'Blog Post Structure', 'bstone' ),
				'choices'  => array(
					'image'      	=> __( 'Featured Image', 'bstone' ),
					'post-title' 	=> __( 'Title', 'bstone' ),
					'post-meta'  	=> __( 'Post Meta', 'bstone' ),
					'post-content'  => __( 'Content', 'bstone' ),
					'read-more'  	=> __( 'Read More', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Display Post Meta
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta]', array(
			'default'           => bstone_get_option( 'blog-meta' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-blog',
				'priority' => 50,
				'label'    => __( 'Blog Meta', 'bstone' ),
				'choices'  => array(
					'comments' => __( 'Comments', 'bstone' ),
					'category' => __( 'Category', 'bstone' ),
					'author'   => __( 'Author', 'bstone' ),
					'date'     => __( 'Publish Date', 'bstone' ),
					'tag'      => __( 'Tag', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Blog Post Meta Separator
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-meta-separator]', array(
			'default'           => bstone_get_option( 'blog-meta-separator' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-meta-separator]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 55,
			'label'       => __( 'Post Meta Separator', 'bstone' ),
		)
	);

	/**
	 * Option: Comments Text - Zero
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-comments-txt-zero]', array(
			'default'           => bstone_get_option( 'blog-comments-txt-zero' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-comments-txt-zero]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 60,
			'label'       => __( 'Comments Text: Zero', 'bstone' ),
			'description' => __( 'Text to display when there are no comments. Default: No Comments', 'bstone' ),
		)
	);

	/**
	 * Option: Comments Text - One
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-comments-txt-one]', array(
			'default'           => bstone_get_option( 'blog-comments-txt-one' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-comments-txt-one]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 65,
			'label'       => __( 'Comments Text: One', 'bstone' ),
			'description' => __( 'Text to display when there is one comment. Default: 1 Comment', 'bstone' ),
		)
	);

	/**
	 * Option: Comments Text - More
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-comments-txt-more]', array(
			'default'           => bstone_get_option( 'blog-comments-txt-more' ),
			'type'              => 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-comments-txt-more]', array(
			'type'        => 'text',
			'section'     => 'section-blog',
			'priority'    => 70,
			'label'       => __( 'Comments Text: More', 'bstone' ),
			'description' => __( 'Text to display when there is more than one comment. Default: Comments', 'bstone' ),
		)
	);

	/**
	 * Option: Text with post meta
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[display-meta-text]', array(
			'default'           => bstone_get_option( 'display-meta-text' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[display-meta-text]', array(
			'type'        => 'checkbox',
			'section'     => 'section-blog',
			'label'       => __( 'Display Meta Text', 'bstone' ),
			'priority'    => 75,
		)
	);

	/**
	 * Option: Icons with post meta
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[display-meta-icons]', array(
			'default'           => bstone_get_option( 'display-meta-icons' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[display-meta-icons]', array(
			'type'        => 'checkbox',
			'section'     => 'section-blog',
			'label'       => __( 'Display Meta Icons', 'bstone' ),
			'priority'    => 80,
		)
	);

	/**
	 * Option: Icons Type with post meta
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[meta-icons-type]', array(
			'default'           => bstone_get_option( 'meta-icons-type' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[meta-icons-type]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Meta Icons Type', 'bstone' ),
			'type'     => 'select',
			'priority' => 85,
			'choices'  => array(
				'regular' => __( 'Regular', 'bstone' ),
				'solid'   => __( 'Solid', 'bstone' ),
			),
			'description' => __( 'Selected icons type must be activated in "Extra Elements -> General Settings -> Font Awesome"', 'bstone' ),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-post-type-icon-devider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-blog',
				'priority' => 90,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Display Post Type Icons
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-type-icon]', array(
			'default'           => bstone_get_option( 'post-type-icon' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-type-icon]', array(
			'type'        => 'radio',
			'section'     => 'section-blog',
			'label'       => __( 'Post Type Icon', 'bstone' ),
			'priority'    => 95,
			'choices'     => array(
				'disable' 	   => esc_html__( 'Disable', 'bstone' ),
				'enable' 	   => esc_html__( 'Enable', 'bstone' ),
				'enable-hover' => esc_html__( 'Enable On Mouse Hover', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Post type icons position
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-icon-position]', array(
			'default'           => bstone_get_option( 'post-icon-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-icon-position]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Post Icon Position', 'bstone' ),
			'type'     => 'select',
			'priority' => 100,
			'choices'  => array(
				'center' 		=> __( 'Center', 'bstone' ),
				'top-left' 		=> __( 'Top Left', 'bstone' ),
				'top-right'     => __( 'Top Right', 'bstone' ),
				'bottom-left'   => __( 'Bottom Left', 'bstone' ),
				'bottom-right'  => __( 'Bottom Right', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Post type icons type
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-icon-type]', array(
			'default'           => bstone_get_option( 'post-icon-type' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-icon-type]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Post Icon Type', 'bstone' ),
			'type'     => 'select',
			'priority' => 100,
			'choices'  => array(
				'far' => __( 'Regular', 'bstone' ),
				'fas'   => __( 'Solid', 'bstone' ),
			),
			'description' => __( 'Selected icons type must be activated in "Extra Elements -> General Settings -> Font Awesome"', 'bstone' ),
		)
	);

	/**
	 * Option: Post type icons size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-icon-size]', array(
			'default'           => bstone_get_option( 'post-icon-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-icon-size]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Post Icon Size', 'bstone' ),
			'type'     => 'select',
			'priority' => 100,
			'choices'  => array(
				's'  => __( 'Small', 'bstone' ),
				'm'  => __( 'Medium', 'bstone' ),
				'l'  => __( 'Large', 'bstone' ),
				'xl' => __( 'Extra Large', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-styling-section-blog-width]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-blog',
				'priority' => 105,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Blog Content Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-width]', array(
			'default'           => bstone_get_option( 'blog-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-width]', array(
			'type'     => 'select',
			'section'  => 'section-blog',
			'priority' => 110,
			'label'    => __( 'Blog Content Width', 'bstone' ),
			'choices'  => array(
				'default' => __( 'Default', 'bstone' ),
				'custom'  => __( 'Custom', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Enter Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-max-width]', array(
			'default'           => bstone_get_option( 'blog-max-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-max-width]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-blog',
				'priority'    => 115,
				'label'       => __( 'Enter Width', 'bstone' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 768,
					'step' => 1,
					'max'  => 1920,
				),
			)
		)
	);

	/**
	 * Option: Post Cols Count Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[post-cols-count-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-blog',
				'priority' => 120,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Post Cols Count
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-post-cols-count]', array(
			'default'           => bstone_get_option( 'blog-post-cols-count' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-post-cols-count]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-blog',
				'priority'    => 125,
				'label'       => __( 'Blog Columns', 'bstone' ),
				'input_attrs' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 6,
				),
			)
		)
	);

	/**
	 * Option: Post Images Size Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-img-size-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-blog',
				'priority' => 130,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Icons with post meta
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[overlay-on-img-hover]', array(
			'default'           => bstone_get_option( 'overlay-on-img-hover' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[overlay-on-img-hover]', array(
			'type'        => 'checkbox',
			'section'     => 'section-blog',
			'label'       => __( 'Add overlay on image hover', 'bstone' ),
			'priority'    => 135,
		)
	);

	/**
	 * Option: Blog Image Size
	 */
	$blog_img_size = get_intermediate_image_sizes();
	array_push($blog_img_size,"full");

	$bstone_blog_image_sizes = array();

	foreach ( $blog_img_size as $size ) {
		$size_name = str_replace( "_", " ", $size );
		$size_name = str_replace( "-", " ", $size_name );
		$size_name = str_replace( ".", " ", $size_name );
		$size_name = ucwords( $size_name );
		$bstone_blog_image_sizes[ $size ] = $size_name;
	}

	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-img-size]', array(
			'default'           => bstone_get_option( 'blog-img-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-img-size]', array(
			'type'     => 'select',
			'section'  => 'section-blog',
			'priority' => 140,
			'label'    => __( 'Blog Image Size', 'bstone' ),
			'choices'  => $bstone_blog_image_sizes,
		)
	);

	/**
	 * Option: Blog Image Custom Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-img-custom-width]', array(
			'default'           => bstone_get_option( 'blog-img-custom-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-img-custom-width]', array(
			'type'        => 'number',
			'section'     => 'section-blog',
			'priority'    => 145,
			'label'       => __( 'Blog Image Custom Width', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 1500,
			),
		)
	);

	/**
	 * Option: Blog Image Custom Height
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-img-custom-height]', array(
			'default'           => bstone_get_option( 'blog-img-custom-height' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-img-custom-height]', array(
			'type'        => 'number',
			'section'     => 'section-blog',
			'priority'    => 150,
			'label'       => __( 'Blog Image Custom Height', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 1500,
			),
		)
	);

	/**
	 * Option: Post Styling Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-post-styling-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-blog',
				'priority' => 155,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Post Border Radius
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-post-border-radius]', array(
			'default'           => bstone_get_option( 'blog-post-border-radius' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-post-border-radius]', array(
			'type'        => 'number',
			'section'     => 'section-blog',
			'priority'    => 160,
			'label'       => __( 'Post Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 5000,
			),
		)
	);