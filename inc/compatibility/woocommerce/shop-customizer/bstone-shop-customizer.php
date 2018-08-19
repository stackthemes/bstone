<?php
/**
 * Custom customizer loader
 *
 * @package     Bstone
 * @author      StackThemes
 * @copyright   Copyright (c) 2018, Bstone
 * @link        https://wpbstone.com/
 * @since       1.1.6
 */

class SC_Customizer {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->add_hooks();
	}

	/**
	 * Add actions hooks
	 */
	public function add_hooks() {
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_controls' ) );
		add_action( 'wp_ajax_sc_customizer_reset', array( $this, 'reset' ) );
	}

	/**
	 * Enqueue control related scripts/styles.
	 */
	public function enqueue_controls() {
		
		$sc_cz_ctrl_js_file = '/inc/compatibility/woocommerce/shop-customizer/assets/js/helper.js';

		wp_enqueue_script(
			'sc-cz-controls',
			BSTONE_THEME_URI . $sc_cz_ctrl_js_file,
			array( 'jquery-ui-tabs', 'jquery-ui-dialog', 'jquery', 'customize-controls' ),
			filemtime( BSTONE_THEME_DIR . $sc_cz_ctrl_js_file ),
			true
		);

		wp_localize_script( 'sc-cz-controls', 'sc_cz', array(
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'nonce' => wp_create_nonce( 'sc_cz' ),
		));
	}

	/**
	 * Reset partial data of the customizer.
	 *
	 * @SuppressWarnings(PHPMD.UnusedLocalVariable)
	 */
	public function reset() {
		check_ajax_referer( 'sc_cz', 'nonce' );

		$reset = $_POST['reset'];

		if ( empty( $reset ) ) {
			wp_send_json_error();
		}

		$sc_cz = get_option( 'bstone-settings' );

		if ( $sc_cz ) {
			foreach ( $sc_cz as $key => $value ) {
				if ( strpos( $key, $reset ) === 0 ) {
					unset( $sc_cz[ $key ] );
				}
			}

			update_option( 'bstone-settings', $sc_cz );
			wp_send_json_success();
		}

		wp_send_json_error();
	}

}

new SC_Customizer();

class Sc_Fs {

	/**
	 * @var array
	 */
	private $options = array();

	/**
	 * @var array
	 */
	public $errors = array();

	/**
	 * @var null
	 */
	public $wp_filesystem = null;

	/**
	 * @var array
	 */
	private $creds_data = array();

	/**
	 * @var boolean
	 */
	private $initialized = false;

	/**
	 * Constructor
	 *
	 * @param (array)   $args The arguments for the object options. Default: []
	 * @param (boolean) $init Whether to initialise the object instantly. Default: false.
	 * @param (boolean) $force Whether to force create new instance of $wp_filesystem object. Default: false.
	 */
	public function __construct( $args = array(), $init = false, $force = false ) {
		$this->errors = new WP_Error();

		$args = wp_parse_args(
			(array) $args, array(
				'form_post'                    => '',    // (string)  The URL to post the form to. Default: ''.
			'type'                         => '',    // (string)  Chosen type of filesystem. Default: ''.
			'error'                        => false, // (boolean) Whether the current request has failed to connect. Default: false.
			'context'                      => '',    // (string)  Full path to the directory that is tested for being writable. Default: WP_CONTENT_DIR.
			'extra_fields'                 => null,  // (array)   Extra POST fields in array key value pair format. Default: null.
			'allow_relaxed_file_ownership' => false, // (boolean) Whether to allow Group/World writable. Default: false.
			'override'                     => true,  // (boolean) Whether to override some built-in function with custom function. Default: true.
			)
		);

		foreach ( $args as $key => $value ) {
			$this->setOption( $key, $value );
		}

		if ( $init ) {
			$this->init( $force );
		}
	}

	/**
	 * Initialize the wp_filesystem object
	 *
	 * @param  (boolean) $force Whether to force create new instance of $wp_filesystem object. Default: false.
	 * @return boolean
	 */
	public function init( $force = false ) {

		global $wp_filesystem;

		$this->initialized = true;

		if ( ! $force && $wp_filesystem && $wp_filesystem instanceof WP_Filesystem_Base ) {

			$this->wp_filesystem = $wp_filesystem;
			return true;

		} else {

			$this->creds_data = request_filesystem_credentials(
				$this->getOption( 'form_post' ),
				$this->getOption( 'type' ),
				$this->getOption( 'error' ),
				$this->getOption( 'context' ),
				$this->getOption( 'extra_fields' ),
				$this->getOption( 'allow_relaxed_file_ownership' )
			);

			if ( ! WP_Filesystem( $this->creds_data, $this->getOption( 'context' ), $this->getOption( 'allow_relaxed_file_ownership' ) ) ) {

				if ( isset( $wp_filesystem->errors ) && is_wp_error( $wp_filesystem->errors ) && $wp_filesystem->errors->get_error_code() ) {
					$this->add_error( $wp_filesystem->errors->get_error_code(), $wp_filesystem->errors->get_error_message(), $wp_filesystem->errors->get_error_data() );
				} else {
					$this->add_error( 'unable_to_connect_to_filesystem', __( 'Unable to connect to the filesystem. Please confirm your credentials.', 'bstone' ), $this->creds_data );
				}

				return false;
			} else {

				$this->wp_filesystem = $wp_filesystem;

				return true;
			}
		}
	}

	/**
	 * Check if file or directory is writable
	 *
	 * @param  (string) $file
	 * @return boolean
	 */
	private function is_writable_override( $file ) {

		if ( $this->is_dir( $file ) ) {
			$temp_file = trailingslashit( $file ) . time() . '-' . uniqid() . '.tmp';

			$this->put_contents( $temp_file, '' );

			$is_writable = $this->wp_filesystem->is_writable( $temp_file );

			$this->delete( $temp_file );

			return $is_writable;
		} else {
			// Create the file if not exists
			if ( ! $this->exists( $file ) ) {
				$this->put_contents( $file, '' );
			}
			return $this->wp_filesystem->is_writable( $file );
		}
	}

	/**
	 * Set options data
	 *
	 * @param  (string) $key
	 * @param  (string) $value
	 * @return void
	 */
	public function setOption( $key, $value ) {
		switch ( $key ) {
			case 'context':
				if ( ! empty( $value ) ) {
					$value = is_dir( $value ) ? $value : dirname( $value );
					$value = untrailingslashit( $value );
				}
				break;
		}
		$this->options[ $key ] = $value;
	}

	/**
	 * Get options data
	 *
	 * @param  (string)      $key
	 * @param  (null|string) $default
	 * @return mixed
	 */
	public function getOption( $key = null, $default = null ) {
		if ( null === $key ) {
			return $this->options;
		} else {
			return isset( $this->options[ $key ] ) ? $this->options[ $key ] : $default;
		}
	}

	/**
	 * Delete options data
	 *
	 * @param  (string) $key
	 * @return void
	 */
	public function deleteOption( $key ) {
		unset( $this->options[ $key ] );
	}

	/**
	 * Set errors data taken from the wp_filesystem errors
	 *
	 * @return void
	 */
	private function setErrors() {
		if ( isset( $this->wp_filesystem->errors ) && is_wp_error( $this->wp_filesystem->errors ) && $this->wp_filesystem->errors->get_error_code() ) {
			$this->add_error( $this->wp_filesystem->errors->get_error_code(), $this->wp_filesystem->errors->get_error_message() );
		}
	}

	/**
	 * Retrieve all error codes
	 *
	 * @return array
	 */
	public function get_error_codes() {
		return $this->errors->get_error_codes();
	}

	/**
	 * Retrieve first error code available
	 *
	 * @return string, int or Empty if there is no error codes
	 */
	public function get_error_code() {
		return $this->errors->get_error_code();
	}

	/**
	 * Retrieve all error messages or error messages matching code
	 *
	 * @param (string) $code
	 * @return array
	 */
	public function get_error_messages( $code = '' ) {
		return $this->errors->get_error_messages( $code );
	}

	/**
	 * Get the first error message available or error message matching code
	 *
	 * @param (string) $code
	 * @return string
	 */
	public function get_error_message( $code = '' ) {
		return $this->errors->get_error_message( $code );
	}

	/**
	 * Append more error messages to list of error messages.
	 *
	 * @param (string) $code
	 * @param (string) $message
	 * @param (array)  $data
	 * @return void
	 */
	public function add_error( $code, $message, $data = '' ) {
		// Log the error
		if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
			error_log( 'Sc_Fs Error Code: ' . $code );
			error_log( 'Sc_Fs Error Message: ' . $message );
			if ( $data && ! is_resource( $data ) ) {
				error_log( 'Sc_Fs Error Data: ' . wp_json_encode( $data ) );
			}
		}
		$this->errors->add( $code, $message, $data );
	}
}