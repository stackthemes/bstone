<?php
/**
 * Single Post Layout Option for Bstone Theme.
 *
 * @package     Bstone
 * @author      Bstone
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Display Post Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-post-structure]', array(
			'default'           => bstone_get_option( 'blog-single-post-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-single-post-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-single',
				'priority' => 5,
				'label'    => __( 'Single Post Structure', 'bstone' ),
				'choices'  => array(
					'single-image'      	=> __( 'Featured Image', 'bstone' ),
					'single-post-title' 	=> __( 'Title', 'bstone' ),
					'single-post-meta'  	=> __( 'Meta', 'bstone' ),
					'single-post-content'   => __( 'Content', 'bstone' ),
					'single-post-footer'    => __( 'Entry Footer', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Single Post Meta
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-meta]', array(
			'default'           => bstone_get_option( 'blog-single-meta' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-single-meta]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-single',
				'priority' => 10,
				'label'    => __( 'Single Post Meta', 'bstone' ),
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
	 * Option: Display Single Post Title In Title Area
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[post-title-display-option]', array(
			'default'           => bstone_get_option( 'post-title-display-option' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[post-title-display-option]', array(
			'type'        => 'checkbox',
			'section'     => 'section-single',
			'label'       => __( 'Replace Blog Title With Post Title', 'bstone' ),
			'priority'    => 15,
		)
	);

	/**
	 * Option: Social Share & Tags Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-tags-share-structure]', array(
			'default'           => bstone_get_option( 'single-tags-share-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-tags-share-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-single',
				'priority' => 20,
				'label'    => __( 'Entry Footer', 'bstone' ),
				'choices'  => array(
					'single-tags' 	=> __( 'Tags', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: After Post Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[after-single-post-structure]', array(
			'default'           => bstone_get_option( 'after-single-post-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[after-single-post-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-single',
				'priority' => 25,
				'label'    => __( 'After Post Structure', 'bstone' ),
				'choices'  => array(
					'post-next-prev'      => __( 'Next/Prev Links', 'bstone' ),
					'post-author' 		  => __( 'Author Box', 'bstone' ),
					'post-comments'  	  => __( 'Comments', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[next-prev-section-single-blog-devider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-single',
				'priority' => 30,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Single Post Next Prev Links Layout
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nex-prev-liks-position]', array(
			'default'           => bstone_get_option( 'nex-prev-liks-position' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[nex-prev-liks-position]', array(
			'type'     => 'select',
			'section'  => 'section-single',
			'priority' => 35,
			'label'    => __( 'Next Prev Links Position', 'bstone' ),
			'choices'  => array(
				'default' => __( 'Default', 'bstone' ),
				'bottom'  => __( 'Bottom', 'bstone' ),
				'center'  => __( 'Center', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Single Post Next Prev Links Style
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nex-prev-liks-style]', array(
			'default'           => bstone_get_option( 'nex-prev-liks-style' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[nex-prev-liks-style]', array(
			'type'     => 'select',
			'section'  => 'section-single',
			'priority' => 40,
			'label'    => __( 'Next Prev Links Style', 'bstone' ),
			'choices'  => array(
				'title-arrow-top' 	 => __( 'Title & Arrows Top', 'bstone' ),
				'title-arrow-bottom' => __( 'Title & Arrows Bottom', 'bstone' ),
				'title-arrow-side'   => __( 'Title & Arrows Side', 'bstone' ),
				'arrow-image-round'  => __( 'Arrows With Featured Image', 'bstone' ),
				'only-arrows' 		 => __( 'Only Arrows', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Single Post Next/Prev Taxonomy
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[nex-prev-liks-taxonomy]', array(
			'default'           => bstone_get_option( 'nex-prev-liks-taxonomy' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[nex-prev-liks-taxonomy]', array(
			'type'     => 'select',
			'section'  => 'section-single',
			'priority' => 45,
			'label'    => __( 'Next/Prev Taxonomy', 'bstone' ),
			'choices'  => array(
				'default' 	 => __( 'Default', 'bstone' ),
				'category' 	 => __( 'Category', 'bstone' ),
				'tag' => __( 'Tag', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Divider Related Posts
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-related-posts-devider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-single',
				'priority' => 50,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Related Posts Count
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-related-count]', array(
			'default'           => bstone_get_option( 'blog-related-count' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-related-count]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-single',
				'priority'    => 55,
				'label'       => __( 'Related Posts Count', 'bstone' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 12,
				),
			)
		)
	);

	/**
	 * Option: Related Posts Columns
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-related-columns]', array(
			'default'           => bstone_get_option( 'blog-related-columns' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-related-columns]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-single',
				'priority'    => 60,
				'label'       => __( 'Related Posts Columns', 'bstone' ),
				'suffix'      => '',
				'input_attrs' => array(
					'min'  => 1,
					'step' => 1,
					'max'  => 6,
				),
			)
		)
	);

	/**
	 * Option: Related Posts Taxonomy
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-related-taxonomy]', array(
			'default'           => bstone_get_option( 'blog-related-taxonomy' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-related-taxonomy]', array(
			'type'     => 'select',
			'section'  => 'section-single',
			'priority' => 65,
			'label'    => __( 'Related Posts Taxonomy', 'bstone' ),
			'choices'  => array(
				'category' 	 => __( 'Category', 'bstone' ),
				'tag' => __( 'Tag', 'bstone' ),
			),
		)
	);

	/**
	 * Option: Related Posts Image Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-related-img-width]', array(
			'default'           => bstone_get_option( 'blog-related-img-width' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-related-img-width]', array(
			'type'        => 'number',
			'section'     => 'section-single',
			'priority'    => 70,
			'label'       => __( 'Related Posts Image Width', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 1500,
			),
		)
	);

	/**
	 * Option: Related Posts Image Height
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-related-img-height]', array(
			'default'           => bstone_get_option( 'blog-related-img-height' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-related-img-height]', array(
			'type'        => 'number',
			'section'     => 'section-single',
			'priority'    => 75,
			'label'       => __( 'Related Posts Image Height', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 1500,
			),
		)
	);

	/**
	 * Option: Divider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bst-styling-section-single-blog-layouts]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-single',
				'priority' => 80,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Single Post Content Width
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[blog-single-width]', array(
			'default'           => bstone_get_option( 'blog-single-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[blog-single-width]', array(
			'type'     => 'select',
			'section'  => 'section-single',
			'priority' => 85,
			'label'    => __( 'Single Post Content Width', 'bstone' ),
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
		BSTONE_THEME_SETTINGS . '[blog-single-max-width]', array(
			'default'           => bstone_get_option( 'blog-single-max-width' ),
			'type'              => 'option',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Slider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[blog-single-max-width]', array(
				'type'        => 'bst-slider',
				'section'     => 'section-single',
				'priority'    => 90,
				'label'       => __( 'Enter Width', 'bstone' ),
				'suffix'      => 'px',
				'input_attrs' => array(
					'min'  => 768,
					'step' => 1,
					'max'  => 1920,
				),
			)
		)
	);

	/**
	 * Option: Section Devider Border - Devider
	 */
	$wp_customize->add_control(
		new Bstone_Control_Divider(
			$wp_customize, BSTONE_THEME_SETTINGS . '[single-post-border-devider]', array(
				'type'     => 'bst-divider',
				'section'  => 'section-single',
				'priority' => 95,
				'settings' => array(),
			)
		)
	);

	/**
	 * Option: Section Devider Border Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[single-sec-border-size]', array(
			'default'           => bstone_get_option( 'single-sec-border-size' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[single-sec-border-size]', array(
			'type'        => 'number',
			'section'     => 'section-single',
			'priority'    => 100,
			'label'       => __( 'Section Devider Border Size', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);