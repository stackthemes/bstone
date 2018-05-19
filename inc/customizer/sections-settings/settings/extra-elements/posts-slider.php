<?php
/**
 * Posts banner/slider for Bstone Theme.
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2017, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	/**
	 * Option: Enable Posts Banner
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-enable]', array(
			'default'           => bstone_get_option( 'bp-banner-enable' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-enable]', array(
			'type'        => 'checkbox',
			'section'     => 'section-posts-slider',
			'label'       => __( 'Enable Posts Banner / Slider', 'bstone' ),
			'priority'    => 5,
		)
	);

    /**
	 * Heading: Banner Layout
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[bp-banner-layout]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-layout]', array(
				'label'    	=> esc_html__( 'Layout', 'bstone' ),
				'section'  	=> 'section-posts-slider',
				'priority' 	=> 10,
			)
		)
    );
    
    /**
	 * Option: Posts Banner With
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-width]', array(
			'default'           => bstone_get_option( 'bp-banner-width' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-width]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 15,
			'label'    => __( 'Banner Width', 'bstone' ),
			'choices'  => array(
				'full'      => __( 'Full Width', 'bstone' ),
				'content'   => __( 'Content Width', 'bstone' ),
			),
		)
	);
    
    /**
	 * Option: Posts Banner Type
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-type]', array(
			'default'           => bstone_get_option( 'bp-banner-type' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-type]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 20,
			'label'    => __( 'Banner Type', 'bstone' ),
			'choices'  => array(
				'posts-grid'  => __( 'Posts Grid', 'bstone' ),
				'slider'      => __( 'Slider', 'bstone' ),
			),
		)
	);
    
    /**
	 * Option: Posts Banner Display On
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-display]', array(
			'default'           => bstone_get_option( 'bp-banner-display' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-display]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 25,
			'label'    => __( 'Display Banner On', 'bstone' ),
			'choices'  => array(
				'archive'   => __( 'On all archive pages', 'bstone' ),
				'blog'      => __( 'Only on blog page', 'bstone' ),
			),
		)
	);
    
    /**
	 * Option: Posts Banner Data Source
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-data-source]', array(
			'default'           => bstone_get_option( 'bp-banner-data-source' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-data-source]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 30,
			'label'    => __( 'Data Source', 'bstone' ),
			'choices'  => array(
				'category'   => __( 'Category', 'bstone' ),
				'posts'      => __( 'Posts ID', 'bstone' ),
			),
		)
	);
    
    /**
	 * Option: Posts Banner Data Source - Category
	 */
    $bp_banner_category_array = array( '' => __( 'Select Category', 'bstone' ) );
    $bp_banner_categories = get_categories( array(
        'orderby' => 'name'
    ) );

    if( count( $bp_banner_categories ) > 0 ) {
        foreach ( $bp_banner_categories as $category ) {
            $bp_banner_category_array[ $category->term_id ] = $category->name;
        }
    } else {
        $bp_banner_category_array[ 0 ] = __( 'No Category Exist', 'bstone' );
    }

	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-data-category]', array(
			'default'           => bstone_get_option( 'bp-banner-data-category' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-data-category]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 35,
			'label'    => __( 'Posts Category', 'bstone' ),
			'choices'  => $bp_banner_category_array,
		)
    );
    
    /**
	 * Option: Posts Banner Data Source - Posts ID
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-data-postid]', array(
			'default'   		=> bstone_get_option( 'bp-banner-data-postid' ),
			'type'      		=> 'option',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-data-postid]', array(
			'section'     => 'section-posts-slider',
			'priority'    => 40,
			'label'       => __( 'Posts ID', 'bstone' ),
            'type'        => 'text',
            'description' => __( 'Enter posts IDs, separated by comma', 'bstone' ),
		)
	);
    
    /**
     * Option: Number of posts in slider
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-posts-num]', array(
			'default'           => bstone_get_option( 'bp-banner-posts-num' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-posts-num]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 45,
			'label'       => __( 'Number of Posts in Slider', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 10,
			),
		)
	);

    /**
	 * Option: Display Banner Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-structure]', array(
			'default'           => bstone_get_option( 'bp-banner-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-posts-slider',
				'priority' => 50,
				'label'    => __( 'Banner Structure', 'bstone' ),
				'choices'  => array(
					'category'  => __( 'Post Category', 'bstone' ),
					'title' 	=> __( 'Title', 'bstone' ),
					'meta'  	=> __( 'Post Meta', 'bstone' ),
				),
			)
		)
	);

	/**
	 * Option: Meta Structure
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-meta-structure]', array(
			'default'           => bstone_get_option( 'bp-banner-meta-structure' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_multi_choices' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Sortable(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-meta-structure]', array(
				'type'     => 'bst-sortable',
				'section'  => 'section-posts-slider',
				'priority' => 55,
				'label'    => __( 'Meta Structure', 'bstone' ),
				'choices'  => array(
					'comments' => __( 'Comments', 'bstone' ),
					'date' 	   => __( 'Date', 'bstone' ),
					'author'   => __( 'Author', 'bstone' ),
					'category' => __( 'Category', 'bstone' ),
					'tag'  	   => __( 'Tag', 'bstone' ),
				),
			)
		)
	);
    
    /**
	 * Option: Posts Banner Alignment
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-align]', array(
			'default'           => bstone_get_option( 'bp-banner-align' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-align]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 60,
			'label'    => __( 'Text Align', 'bstone' ),
			'choices'  => array(
				'center-center'  => __( 'Center Center', 'bstone' ),
				'center-top'     => __( 'Center Top', 'bstone' ),
				'center-bottom'  => __( 'Center Bottom', 'bstone' ),
				'left-center'  	 => __( 'Left Center', 'bstone' ),
				'left-top'     	 => __( 'Left Top', 'bstone' ),
				'left-bottom'  	 => __( 'Left Bottom', 'bstone' ),
				'right-center'   => __( 'Right Center', 'bstone' ),
				'right-top'      => __( 'Right Top', 'bstone' ),
				'right-bottom'   => __( 'Right Bottom', 'bstone' ),
			),
		)
	);

	/**
	 * Get Image Sizes
	 */
	$bp_banner_img_size = get_intermediate_image_sizes();
	array_push($bp_banner_img_size,"full");

	$bstone_banner_image_sizes = array();

	foreach ( $bp_banner_img_size as $size ) {
		$size_name = str_replace( "_", " ", $size );
		$size_name = str_replace( "-", " ", $size_name );
		$size_name = str_replace( ".", " ", $size_name );
		$size_name = ucwords( $size_name );
		$bstone_banner_image_sizes[ $size ] = $size_name;
	}
	/**
	 * Option: Banner Image Size
	 */	
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-imgsize]', array(
			'default'           => bstone_get_option( 'bp-banner-imgsize' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_choices' ),
		)
	);

	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-imgsize]', array(
			'type'     => 'select',
			'section'  => 'section-posts-slider',
			'priority' => 65,
			'label'    => __( 'Image Size', 'bstone' ),
			'choices'  => $bstone_banner_image_sizes,
		)
	);

    /**
	 * Heading: Banner Spacing
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[bp-banner-heading-spacing]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-heading-spacing]', array(
				'label'    	=> esc_html__( 'Spacing', 'bstone' ),
				'section'  	=> 'section-posts-slider',
				'priority' 	=> 70,
			)
		)
    );
    
	/**
	* Option: Banner Container Margin
	*/
	 $bpbnr_margin = array(
		 'bpbnr_top_margin:'.bstone_get_option( 'bpbnr_top_margin' ), 'bpbnr_right_margin:'.bstone_get_option( 'bpbnr_right_margin' ), 'bpbnr_bottom_margin:'.bstone_get_option( 'bpbnr_bottom_margin' ), 'bpbnr_left_margin:'.bstone_get_option( 'bpbnr_left_margin' ),
		 'bpbnr_tablet_top_margin:', 'bpbnr_tablet_right_margin:', 'bpbnr_tablet_bottom_margin:', 'bpbnr_tablet_left_margin:', 
		 'bpbnr_mobile_top_margin:', 'bpbnr_mobile_right_margin:', 'bpbnr_mobile_bottom_margin:', 'bpbnr_mobile_left_margin:'
	 );	
	 foreach($bpbnr_margin as $dimension) {
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
			 $wp_customize, BSTONE_THEME_SETTINGS . '[bpbnr-margin]', array(
				 'section'  => 'section-posts-slider',
				 'priority' => 75,
				 'label'    => __( 'Container Margin', 'bstone' ),
				 'settings'   => array(
					 'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_top_margin]',
					 'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_right_margin]',
					 'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_bottom_margin]',
					 'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_left_margin]',
					 'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_top_margin]',
					 'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_right_margin]',
					 'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_bottom_margin]',
					 'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_left_margin]',
					 'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_top_margin]',
					 'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_right_margin]',
					 'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_bottom_margin]',
					 'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_left_margin]',
				 ),
				 'input_attrs' 			=> array(
					 'min'   => 0,
					 'max'   => 500,
					 'step'  => 1,
				 ),
			 )
		 )
	 );
    
    /**
    * Option: Banner Container Padding
    */
    $bpbnr_padding = array(
        'bpbnr_top_padding:'.bstone_get_option( 'bpbnr_top_padding' ), 'bpbnr_right_padding:'.bstone_get_option( 'bpbnr_right_padding' ), 'bpbnr_bottom_padding:'.bstone_get_option( 'bpbnr_bottom_padding' ), 'bpbnr_left_padding:'.bstone_get_option( 'bpbnr_left_padding' ),
        'bpbnr_tablet_top_padding:', 'bpbnr_tablet_right_padding:', 'bpbnr_tablet_bottom_padding:', 'bpbnr_tablet_left_padding:', 
        'bpbnr_mobile_top_padding:', 'bpbnr_mobile_right_padding:', 'bpbnr_mobile_bottom_padding:', 'bpbnr_mobile_left_padding:'
    );	
    foreach($bpbnr_padding as $dimension) {
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
            $wp_customize, BSTONE_THEME_SETTINGS . '[bpbnr-padding]', array(
                'section'  => 'section-posts-slider',
                'priority' => 80,
                'label'    => __( 'Content Padding', 'bstone' ),				
                'settings'   => array(
                    'desktop_top' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_top_padding]',
                    'desktop_right' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_right_padding]',
                    'desktop_bottom' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_bottom_padding]',
                    'desktop_left' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_left_padding]',
                    'tablet_top' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_top_padding]',
                    'tablet_right' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_right_padding]',
                    'tablet_bottom' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_bottom_padding]',
                    'tablet_left' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_tablet_left_padding]',
                    'mobile_top' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_top_padding]',
                    'mobile_right' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_right_padding]',
                    'mobile_bottom' 	=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_bottom_padding]',
                    'mobile_left' 		=> BSTONE_THEME_SETTINGS.'[bpbnr_mobile_left_padding]',
                ),
                'input_attrs' 			=> array(
                    'min'   => 0,
                    'max'   => 500,
                    'step'  => 1,
                ),
            )
        )
    );
    
    /**
     * Option: Content Gap
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-content-gap]', array(
			'default'           => bstone_get_option( 'bp-banner-content-gap' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-content-gap]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 85,
			'label'       => __( 'Content Spacing', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);
    
    /**
     * Option: Title Padding Top Bottom
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-top-padding]', array(
			'default'           => bstone_get_option( 'bp-banner-title-top-padding' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-top-padding]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 90,
			'label'       => __( 'Title Padding Top/Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);
    
    /**
     * Option: Title Padding Left Right
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-left-padding]', array(
			'default'           => bstone_get_option( 'bp-banner-title-left-padding' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-left-padding]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 95,
			'label'       => __( 'Title Padding Left/Right', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
     * Option: Category Padding Top Bottom
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-cat-top-padding]', array(
			'default'           => bstone_get_option( 'bp-banner-cat-top-padding' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-cat-top-padding]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 100,
			'label'       => __( 'Category Padding Top/Bottom', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

	/**
     * Option: Category Padding Left Right
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-cat-left-padding]', array(
			'default'           => bstone_get_option( 'bp-banner-cat-left-padding' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-cat-left-padding]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 105,
			'label'       => __( 'Category Padding Left/Right', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);
    
    /**
     * Option: Banner Grid Gap
    */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-grid-gap]', array(
			'default'           => bstone_get_option( 'bp-banner-grid-gap' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_number' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-grid-gap]', array(
			'type'        => 'number',
			'section'     => 'section-posts-slider',
			'priority'    => 110,
			'label'       => __( 'Grid Gap', 'bstone' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 50,
			),
		)
	);

    /**
	 * Heading: Banner Typography
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[bp-banner-heading-typography]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-heading-typography]', array(
				'label'    	=> esc_html__( 'Typography', 'bstone' ),
				'section'  	=> 'section-posts-slider',
				'priority' 	=> 115,
			)
		) 
	);
	
	/**
	 * Option: Banner Title Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-font-size]', array(
			'default'           => bstone_get_option( 'bp-banner-title-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-title-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-posts-slider',
				'priority'    => 120,
				'label'       => __( 'Title Font Size', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);
	
	/**
	 * Option: Banner Category Font Size
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-category-font-size]', array(
			'default'           => bstone_get_option( 'bp-banner-category-font-size' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-category-font-size]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-posts-slider',
				'priority'    => 125,
				'label'       => __( 'Category Font Size', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);
	
	/**
	 * Option: Banner Title Font Size - Small Box
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-font-size-smlgrid]', array(
			'default'           => bstone_get_option( 'bp-banner-title-font-size-smlgrid' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-title-font-size-smlgrid]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-posts-slider',
				'priority'    => 130,
				'label'       => __( 'Title Font Size - Grid Small Box', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);
	
	/**
	 * Option: Banner Category Font Size - Small Box
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-category-font-size-smlgrid]', array(
			'default'           => bstone_get_option( 'bp-banner-category-font-size-smlgrid' ),
			'type'              => 'option',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_responsive_typo' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Responsive(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-category-font-size-smlgrid]', array(
				'type'        => 'bst-responsive',
				'section'     => 'section-posts-slider',
				'priority'    => 135,
				'label'       => __( 'Category Font Size - Grid Small Box', 'bstone' ),
				'input_attrs' => array(
					'min' => 0,
				),
				'units'       => array(
					'px' => 'px',
				),
			)
		)
	);

    /**
	 * Heading: Banner Colors
	 */
	$wp_customize->add_setting( BSTONE_THEME_SETTINGS . '[bp-banner-heading-colors]', array(
		'sanitize_callback'	=> 'wp_kses',
	) );

	$wp_customize->add_control (
		new Bstone_Control_Heading (
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-heading-colors]', array(
				'label'    	=> esc_html__( 'Colors', 'bstone' ),
				'section'  	=> 'section-posts-slider',
				'priority' 	=> 140,
			)
		)
    );

	/**
	 * Option: Banner Image Overlay Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-overlay-color]', array(
			'default'           => bstone_get_option( 'bp-banner-overlay-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-overlay-color]', array(
				'section'  => 'section-posts-slider',
				'priority' => 145,
				'label'    => __( 'Image Overlay Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Title Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-text-color]', array(
			'default'           => bstone_get_option( 'bp-banner-title-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-title-text-color]', array(
				'section'  => 'section-posts-slider',
				'priority' => 150,
				'label'    => __( 'Title Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Category Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-category-text-color]', array(
			'default'           => bstone_get_option( 'bp-banner-category-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-category-text-color]', array(
				'section'  => 'section-posts-slider',
				'priority' => 155,
				'label'    => __( 'Category Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Meta Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-meta-text-color]', array(
			'default'           => bstone_get_option( 'bp-banner-meta-text-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-meta-text-color]', array(
				'section'  => 'section-posts-slider',
				'priority' => 160,
				'label'    => __( 'Meta Color', 'bstone' ),
			)
		)
	);	

	/**
	 * Option: Banner Title Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-text-color-hover]', array(
			'default'           => bstone_get_option( 'bp-banner-title-text-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-title-text-color-hover]', array(
				'section'  => 'section-posts-slider',
				'priority' => 165,
				'label'    => __( 'Title Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Category Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-category-text-color-hover]', array(
			'default'           => bstone_get_option( 'bp-banner-category-text-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-category-text-color-hover]', array(
				'section'  => 'section-posts-slider',
				'priority' => 170,
				'label'    => __( 'Category Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Title Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-bg-color]', array(
			'default'           => bstone_get_option( 'bp-banner-title-bg-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-title-bg-color]', array(
				'section'  => 'section-posts-slider',
				'priority' => 175,
				'label'    => __( 'Title Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Category Background Color
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-category-bg-color]', array(
			'default'           => bstone_get_option( 'bp-banner-category-bg-color' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-category-bg-color]', array(
				'section'  => 'section-posts-slider',
				'priority' => 180,
				'label'    => __( 'Category Background Color', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Title Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-bg-color-hover]', array(
			'default'           => bstone_get_option( 'bp-banner-title-bg-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-title-bg-color-hover]', array(
				'section'  => 'section-posts-slider',
				'priority' => 185,
				'label'    => __( 'Title Background Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Banner Category Background Color Hover
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-category-bg-color-hover]', array(
			'default'           => bstone_get_option( 'bp-banner-category-bg-color-hover' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_alpha_color' ),
		)
	);
	$wp_customize->add_control(
		new Bstone_Control_Color(
			$wp_customize, BSTONE_THEME_SETTINGS . '[bp-banner-category-bg-color-hover]', array(
				'section'  => 'section-posts-slider',
				'priority' => 190,
				'label'    => __( 'Category Background Color Hover', 'bstone' ),
			)
		)
	);

	/**
	 * Option: Enable Title Text Shadow
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-shadow]', array(
			'default'           => bstone_get_option( 'bp-banner-title-shadow' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-title-shadow]', array(
			'type'        => 'checkbox',
			'section'     => 'section-posts-slider',
			'label'       => __( 'Title Text Shadow', 'bstone' ),
			'priority'    => 195,
		)
	);

	/**
	 * Option: Enable Category Text Shadow
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-cat-shadow]', array(
			'default'           => bstone_get_option( 'bp-banner-cat-shadow' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-cat-shadow]', array(
			'type'        => 'checkbox',
			'section'     => 'section-posts-slider',
			'label'       => __( 'Category Text Shadow', 'bstone' ),
			'priority'    => 200,
		)
	);

	/**
	 * Option: Enable Meta Text Shadow
	 */
	$wp_customize->add_setting(
		BSTONE_THEME_SETTINGS . '[bp-banner-meta-shadow]', array(
			'default'           => bstone_get_option( 'bp-banner-meta-shadow' ),
			'type'              => 'option',
			'capability' 		=> 'manage_options',
			'sanitize_callback' => array( 'Bstone_Customizer_Sanitizes', 'sanitize_checkbox' ),
		)
	);
	$wp_customize->add_control(
		BSTONE_THEME_SETTINGS . '[bp-banner-meta-shadow]', array(
			'type'        => 'checkbox',
			'section'     => 'section-posts-slider',
			'label'       => __( 'Meta Text Shadow', 'bstone' ),
			'priority'    => 200,
		)
	);