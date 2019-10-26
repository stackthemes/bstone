<?php
/**
 * Bstone Post Meta Boxes
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       Bstone 1.0.6
 */

if ( ! class_exists( 'Bstone_Meta_Boxes' ) ) {

    /**
	 * Meta Boxes setup
	 */
    class Bstone_Meta_Boxes {

        /**
		 * Instance
		 *
		 * @var $instance
		 */
		private static $instance;

		/**
		 * Meta Option
		 *
		 * @var $meta_option
		 */
        private static $meta_option;
        
        /**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self;
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_action( 'load-post.php', array( $this, 'init_metabox' ) );
			add_action( 'load-post-new.php', array( $this, 'init_metabox' ) );
        }
        
        /**
		 *  Meta box setup function.
		 */
		public function init_metabox() {

            add_action( 'add_meta_boxes', array( $this, 'setup_meta_box' ) );
            add_action( 'save_post', array( $this, 'save_meta_box' ) );

            /**
			 * Set metabox options
			 *
			 * @see http://php.net/manual/en/filter.filters.sanitize.php
			 */
			self::$meta_option = apply_filters(
				'bstone_meta_box_options', array(
					'site-content-layout' => array(
						'default'  => 'default',
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-sidebar-layout' => array(
						'default'  => 'default',
						'sanitize' => 'FILTER_DEFAULT',
					),
					'bst-main-header-display' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'site-post-title' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'bst-featured-img' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'bst-footer-top-area' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
					'bst-footer-bottom-area' => array(
						'sanitize' => 'FILTER_DEFAULT',
					),
				)
			);
        }

        /**
		 *  Setup Metabox
		 */
		function setup_meta_box() {
            // Get all public posts.
			$post_types = get_post_types(
				array(
					'public' => true,
				)
            );

            $current_theme = wp_get_theme();            
            $metabox_name = esc_html( $current_theme->get( 'Name' ) ) . __( ' Settings', 'bstone' );

            // Enable for all posts.
			foreach ( $post_types as $type ) {

				if ( 'attachment' !== $type ) {
					add_meta_box(
						'bstone_settings_meta_box',             // Id.
						$metabox_name,                          // Title.
						array( $this, 'markup_meta_box' ),      // Callback.
						$type,                                  // Post_type.
						'side',                                 // Context.
						'default'                               // Priority.
					);
				}
			}
        }

		/**
		 * Get metabox options
		 */
		public static function get_meta_option() {
			return self::$meta_option;
        }

		/**
		 * Metabox Markup
		 *
		 * @param  object $post Post object.
		 * @return void
		 */
        function markup_meta_box( $post ) {
            wp_nonce_field( basename( __FILE__ ), 'bstone_settings_meta_box' );
            $stored = get_post_meta( $post->ID );

            // Set stored and override defaults.
			foreach ( $stored as $key => $value ) {
				self::$meta_option[ $key ]['default'] = ( isset( $stored[ $key ][0] ) ) ? $stored[ $key ][0] : '';
            }
            
            // Get defaults.
            $meta = self::get_meta_option();
            
            /**
			 * Get options
			 */
            $site_sidebar        = ( isset( $meta['site-sidebar-layout']['default'] ) )     ? $meta['site-sidebar-layout']['default'] : 'default';
            $site_content_layout = ( isset( $meta['site-content-layout']['default'] ) )     ? $meta['site-content-layout']['default'] : 'default';

			$primary_header      = ( isset( $meta['bst-main-header-display']['default'] ) ) ? $meta['bst-main-header-display']['default'] : '';
			$site_post_title     = ( isset( $meta['site-post-title']['default'] ) )         ? $meta['site-post-title']['default'] : '';
			$bst_featured_img    = ( isset( $meta['bst-featured-img']['default'] ) )        ? $meta['bst-featured-img']['default'] : '';
			$footer_top_area     = ( isset( $meta['bst-footer-top-area']['default'] ) )     ? $meta['bst-footer-top-area']['default'] : '';
			$footer_bottom_area  = ( isset( $meta['bst-footer-bottom-area']['default'] ) )  ? $meta['bst-footer-bottom-area']['default'] : '';

            do_action( 'bstone_meta_box_markup_before', $meta );

			/**
			 * Option: Content Layout
			 */
			?>
			<div class="site-content-layout-meta-wrap">
				<p class="post-attributes-label-wrapper" >
					<strong> <?php esc_html_e( 'Page Layout', 'bstone' ); ?> </strong>
				</p>
				<select name="site-content-layout" id="site-content-layout" style="width: 100%;">
					<option value="default" <?php selected( $site_content_layout, 'default' ); ?> > <?php esc_html_e( 'Customizer Setting', 'bstone' ); ?></option>
					<option value="boxed-container" <?php selected( $site_content_layout, 'boxed-container' ); ?> > <?php esc_html_e( 'Boxed', 'bstone' ); ?></option>
					<option value="separate-container" <?php selected( $site_content_layout, 'separate-container' ); ?> > <?php esc_html_e( 'Separate', 'bstone' ); ?></option>
					<option value="plain-container" <?php selected( $site_content_layout, 'plain-container' ); ?> > <?php esc_html_e( 'Full Width / Contained', 'bstone' ); ?></option>
					<option value="page-builder" <?php selected( $site_content_layout, 'page-builder' ); ?> > <?php esc_html_e( 'Full Width / Stretched', 'bstone' ); ?></option>
				</select>
			</div>

            <?php
            /**
			 * Option: Sidebar
			 */
			?>
			<div class="site-sidebar-layout-meta-wrap">
				<p class="post-attributes-label-wrapper" >
					<strong> <?php esc_html_e( 'Sidebar', 'bstone' ); ?> </strong>
				</p>
				<select name="site-sidebar-layout" id="site-sidebar-layout" style="width: 100%;">
					<option value="default" <?php selected( $site_sidebar, 'default' ); ?> > <?php esc_html_e( 'Customizer Settings', 'bstone' ); ?></option>
					<option value="no-sidebar" <?php selected( $site_sidebar, 'no-sidebar' ); ?> > <?php esc_html_e( 'No Sidebar', 'bstone' ); ?></option>
					<option value="left-sidebar" <?php selected( $site_sidebar, 'left-sidebar' ); ?> > <?php esc_html_e( 'Left Sidebar', 'bstone' ); ?></option>
					<option value="right-sidebar" <?php selected( $site_sidebar, 'right-sidebar' ); ?> > <?php esc_html_e( 'Right Sidebar', 'bstone' ); ?></option>
					<option value="both-sidebars" <?php selected( $site_sidebar, 'both-sidebars' ); ?> > <?php esc_html_e( 'Both Sidebars', 'bstone' ); ?></option>
				</select>
			</div>

            
			<?php
			/**
			 * Option: Disable Sections - Primary Header, Title, Footer Widgets, Footer Bar
			 */
			?>
			<div class="disable-section-meta-wrap">
				<p class="post-attributes-label-wrapper">
					<strong> <?php esc_html_e( 'Page Sections', 'bstone' ); ?> </strong>
				</p>

                <div class="disable-section-meta">

                    <?php do_action( 'bstone_meta_box_markup_disable_sections_before', $meta ); ?>

                    <div class="bst-main-header-display-option-wrap">
						<label for="bst-main-header-display">
							<input type="checkbox" id="bst-main-header-display" name="bst-main-header-display" value="disabled" <?php checked( $primary_header, 'disabled' ); ?> />
							<?php esc_html_e( 'Disable Primary Header', 'bstone' ); ?>
						</label>
					</div>

                    <div class="site-post-title-option-wrap">
                        <label for="site-post-title">
                            <input type="checkbox" id="site-post-title" name="site-post-title" value="disabled" <?php checked( $site_post_title, 'disabled' ); ?> />
                            <?php esc_html_e( 'Disable Title', 'bstone' ); ?>
                        </label>
                    </div>

                    <div class="bst-featured-img-option-wrap">
                        <label for="bst-featured-img">
                            <input type="checkbox" id="bst-featured-img" name="bst-featured-img" value="disabled" <?php checked( $bst_featured_img, 'disabled' ); ?> />
                            <?php esc_html_e( 'Disable Featured Image', 'bstone' ); ?>
                        </label>
                    </div>

                    <div class="footer-top-area-option-wrap">
                        <label for="bst-footer-top-area">
                            <input type="checkbox" id="bst-footer-top-area" name="bst-footer-top-area" value="disabled" <?php checked( $footer_top_area, 'disabled' ); ?> />
                            <?php esc_html_e( 'Disable Footer Top', 'bstone' ); ?>
                        </label>
                    </div>

                    <div class="footer-bottom-area-option-wrap">
                        <label for="bst-footer-bottom-area">
                            <input type="checkbox" id="bst-footer-bottom-area" name="bst-footer-bottom-area" value="disabled" <?php checked( $footer_bottom_area, 'disabled' ); ?> />
                            <?php esc_html_e( 'Disable Footer Bottom', 'bstone' ); ?>
                        </label>
                    </div>

                    <?php do_action( 'bstone_meta_box_markup_disable_sections_after', $meta ); ?>

                </div>
            </div>
            
			<?php

            do_action( 'bstone_meta_box_markup_after', $meta );
        }

		/**
		 * Metabox Save
		 *
		 * @param  number $post_id Post ID.
		 * @return void
		 */
		function save_meta_box( $post_id ) {

            // Checks save status.
            $is_autosave    = wp_is_post_autosave( $post_id );
            $is_revision    = wp_is_post_revision( $post_id );
            $is_valid_nonce = ( isset( $_POST['bstone_settings_meta_box'] ) && wp_verify_nonce( $_POST['bstone_settings_meta_box'], basename( __FILE__ ) ) ) ? true : false;

            // Exits script depending on save status.
			if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
				return;
            }
            
            /**
			 * Get meta options
			 */
            $post_meta = self::get_meta_option();
            
            foreach ( $post_meta as $key => $data ) {

                // Sanitize values.
                $sanitize_filter = ( isset( $data['sanitize'] ) ) ? $data['sanitize'] : 'FILTER_DEFAULT';

                switch ( $sanitize_filter ) {
                    case 'FILTER_SANITIZE_STRING':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_STRING );
						break;

					case 'FILTER_SANITIZE_URL':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_URL );
						break;

					case 'FILTER_SANITIZE_NUMBER_INT':
							$meta_value = filter_input( INPUT_POST, $key, FILTER_SANITIZE_NUMBER_INT );
						break;

					default:
							$meta_value = filter_input( INPUT_POST, $key, FILTER_DEFAULT );
						break;
                }

				// Store values.
				if ( $meta_value ) {
					update_post_meta( $post_id, $key, $meta_value );
				} else {
					delete_post_meta( $post_id, $key );
				}
            }
        }

    }

}

/**
 * Kicking this off by calling 'get_instance()' method
 */
Bstone_Meta_Boxes::get_instance();