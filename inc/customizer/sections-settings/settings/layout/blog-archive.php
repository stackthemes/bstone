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
				'priority'      => 5,
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
	 * Blog / Archive Layout - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-layout-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-layout-title-heading]', array(
				'label'    	=> esc_html__( 'Layout', 'bstone' ),
				'section'       => 'section-blog',
				'priority' 	=> 10,
				'status' 	=> 'open',
				'items'     => apply_filters( 'blog_layout_title_heading', array(
					"customize-control-bstone-settings-blog-style",
					"customize-control-bstone-settings-blog-display-style",
					"customize-control-bstone-settings-blog-article-alignment",
					"customize-control-bstone-settings-blog-display-style-list",
					"customize-control-bstone-settings-blog-list-text-position",
					"customize-control-bstone-settings-blog-post-cols-count"
				)),
			)
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
		new Bstone_Control_Radio_Image(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-style]', array(
				'type'    => 'bst-radio-image',
				'label'   => __( 'Layout Type', 'bstone' ),
                'section'  => 'section-blog',
                'priority' => 15,
				'choices' => array(
					'full-width'    => array(
						'label' => __( 'Full Width Post', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/blog-full-width.png',
					),
					'list'  => array(
						'label' => __( 'List', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/blog-list.png',
					),
					'grid'  => array(
						'label' => __( 'Grid', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/blog-grid.png',
					),
					'masonry'  => array(
						'label' => __( 'Masonry', 'bstone' ),
						'path'  => BSTONE_THEME_URI . '/assets/images/blog-masonry.png',
					),
				),
			)
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
			'label'    => __( 'Display Style', 'bstone' ),
			'type'     => 'select',
			'priority' => 20,
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
		BSTONE_THEME_SETTINGS . '[blog-article-alignment]', array(
			'default'           => bstone_get_option( 'blog-article-alignment' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-article-alignment]', array(
			'section'  => 'section-blog',
			'label'    => __( 'Content Alignment', 'bstone' ),
			'type'     => 'select',
			'priority' => 25,
			'choices'  => array(
				'left'       => __( 'Left', 'bstone' ),
				'right'      => __( 'Right', 'bstone' ),
				'center' => __( 'Center', 'bstone' ),
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
			'priority' => 30,
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
			'priority' => 35,
			'choices'  => array(
				'flex-start' => __( 'Top', 'bstone' ),
				'center'	 => __( 'Center', 'bstone' ),
				'flex-end'	 => __( 'Bottom', 'bstone' ),
			),
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
				'priority'    => 40,
				'label'       => __( 'Columns', 'bstone' ),
				'input_attrs' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 6,
				),
			)
		)
	);

	/**
	 * Blog / Archive Content - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-content-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-content-title-heading]', array(
				'label'    	=> esc_html__( 'Content', 'bstone' ),
				'section'       => 'section-blog',
				'priority' 	=> 45,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-blog-post-content",
					"customize-control-bstone-settings-blog-post-content-length",
					"customize-control-bstone-settings-blog-post-content-more",
					"customize-control-bstone-settings-blog-read-more-text",
					"customize-control-bstone-settings-blog-read-more-icon"
				),
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
			'priority' => 50,
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
			'priority'    => 55,
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
			'priority'    => 60,
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
			'priority'    => 65,
			'label'       => __( 'Read More Button Text', 'bstone' ),
			'description' => __( 'Read more button text string.', 'bstone' ),
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
			'priority'    => 70,
			'label'       => __( 'Read More Button Icon', 'bstone' ),
			'description' => __( 'Icon to display in Read More button.', 'bstone' ),
		)
	);

	/**
	 * Blog / Archive Content - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-meta-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-meta-title-heading]', array(
				'label'    	=> esc_html__( 'Post Elements', 'bstone' ),
				'section'       => 'section-blog',
				'priority' 	=> 75,
				'status' 	=> 'close',
				'items'     => array(
					"customize-control-bstone-settings-blog-post-structure",
					"customize-control-bstone-settings-blog-meta",
					"customize-control-bstone-settings-blog-meta-separator",
					"customize-control-bstone-settings-blog-comments-txt-zero",
					"customize-control-bstone-settings-blog-comments-txt-one",
					"customize-control-bstone-settings-blog-comments-txt-more",
					"customize-control-bstone-settings-display-meta-text",
					"customize-control-bstone-settings-display-meta-icons",
					"customize-control-bstone-settings-meta-icons-type",
					"customize-control-bstone-settings-bst-post-type-icon-devider",
					"customize-control-bstone-settings-post-type-icon",
					"customize-control-bstone-settings-post-icon-position",
					"customize-control-bstone-settings-post-icon-type",
					"customize-control-bstone-settings-post-icon-size"
				),
			)
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
				'priority' => 80,
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
				'priority' => 85,
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
			'priority'    => 90,
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
			'priority'    => 95,
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
			'priority'    => 100,
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
			'priority'    => 105,
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
			'priority'    => 110,
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
			'priority'    => 115,
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
			'priority' => 120,
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
				'priority' => 125,
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
			'priority'    => 130,
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
			'priority' => 135,
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
			'priority' => 140,
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
			'priority' => 145,
			'choices'  => array(
				's'  => __( 'Small', 'bstone' ),
				'm'  => __( 'Medium', 'bstone' ),
				'l'  => __( 'Large', 'bstone' ),
				'xl' => __( 'Extra Large', 'bstone' ),
			),
		)
	);	

	/**
	 * Blog / Archive Content - Title: Heading
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[blog-style-title-heading]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-style-title-heading]', array(
				'label'    	=> esc_html__( 'Post Container', 'bstone' ),
				'section'       => 'section-blog',
				'priority' 	=> 150,
				'status' 	=> 'close',
				'items'     => apply_filters( 'blog_content_title_heading', array(
					"customize-control-bstone-settings-blog-width",
					"customize-control-bstone-settings-blog-max-width",
					"customize-control-bstone-settings-blog-img-size-divider",
					"customize-control-bstone-settings-overlay-on-img-hover",
					"customize-control-bstone-settings-blog-img-size",
					"customize-control-bstone-settings-blog-img-custom-width",
					"customize-control-bstone-settings-blog-img-custom-height",
					"customize-control-bstone-settings-blog-post-styling-divider",
					"customize-control-bstone-settings-blog-article-outer-border",
					"customize-control-bstone-settings-blog-post-border-radius"
				) ),
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
			'priority' => 155,
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
				'priority'    => 160,
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
	 * Option: Post Images Size Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-img-size-divider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-blog',
				'priority' => 165,
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
			'priority'    => 170,
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
			'priority' => 175,
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
			'priority'    => 180,
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
			'priority'    => 185,
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
				'priority' => 190,
				'settings' => array(),
			)
		)
	);

	/**
	 * Post Margin
	 */

	$article_outer_border = array(
		'baouter_top_border:'.bstone_get_option( 'baouter_top_border' ),'baouter_bottom_border:'.bstone_get_option( 'baouter_bottom_border' ),'baouter_left_border:'.bstone_get_option( 'baouter_left_border' ), 'baouter_right_border:'.bstone_get_option( 'baouter_right_border' ),
		'baouter_tablet_top_border:', 'baouter_tablet_bottom_border:','baouter_tablet_left_border:', 'baouter_tablet_right_border:',
		'baouter_mobile_top_border:', 'baouter_mobile_bottom_border:','baouter_mobile_left_border:', 'baouter_mobile_right_border:',
	);	
	foreach($article_outer_border as $dimension) {
		$dval = explode(":",$dimension);
		$wp_customize->add_setting(
			BSTONE_THEME_SETTINGS . '['.$dval[0].']', array(
				'default'           => $dval[1],
				'type'              => 'option',
				'capability' 		=> 'manage_options',
				'transport'         => 'postMessage',
				'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number_n_blank' ),
			)
		);
	}
	$wp_customize->add_control(
		new Bstone_Control_Dimensions(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-article-outer-border]', array(
				'section'  => 'section-blog',
				'priority' => 195,
				'label'    => __( 'Post Border Size (px)', 'bstone' ),
				'settings'   => array(
		            'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[baouter_top_border]',
		            'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[baouter_right_border]',
		            'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[baouter_bottom_border]',
		            'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[baouter_left_border]',
		            'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_top_border]',
		            'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_right_border]',
		            'tablet_bottom'		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_bottom_border]',
		            'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[baouter_tablet_left_border]',
		            'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_top_border]',
		            'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_right_border]',
		            'mobile_bottom'		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_bottom_border]',
		            'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[baouter_mobile_left_border]',
				),
			    'input_attrs' 			=> array(
			        'min'   => 0,
			        'max'   => 15,
			        'step'  => 1,
			    ),
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
			'priority'    => 200,
			'label'       => __( 'Post Border Radius', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 5000,
			),
		)
	);

	/**
	 * Option: Divider
	 */
	// Learn More link if Bstone Pro is not activated.
	if ( ! defined( 'BSTONE_PRO_VER' ) ) {
		$wp_customize->add_control(
			new Bstone_Control_Divider(
				$wp_customize, BSTONE_THEME_SETTINGS . '[blog-pro-divider]', array(
					'type'        => 'bst-divider',
					'section'     => 'section-blog',
					'priority'    => 205,
					'settings'    => array(),
					'dividerline' => true,
					'link' 		  => 'https://wpbstone.com/pro/?utm_source=customizer&utm_medium=upgrade-link&utm_campaign=upgrade-to-pro',
					'html'     	  => __( 'More Options Available in Bstone Pro!', 'bstone' ),
				)
			)
		);
	}