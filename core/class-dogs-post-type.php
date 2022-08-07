<?php // phpcs:ignore

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit; // phpcs:ignore
if ( ! class_exists( 'Dogs_Post_Type' ) ) :

	/**
	 * Main Dogs_Post_Type Class.
	 *
	 * @package     BSD
	 * @subpackage  Classes/Dogs_Post_Type
	 * @since       1.0.0
	 * @author      Alvaro Blanco
	 */
	final class Dogs_Post_Type {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Dogs_Post_Type
		 */
		private static $instance;
		/**
		 * BSD helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Dogs_Post_Type_Helpers
		 */
		public $helpers;
		/**
		 * BSD settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Dogs_Post_Type_Settings
		 */
		public $settings;
		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'dogs-post-type' ), '1.0.0' );
		}
		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'dogs-post-type' ), '1.0.0' );
		}

		/**
		 * Main Dogs_Post_Type Instance.
		 *
		 * Singleton: Only one instance of Dogs_Post_Type exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access    public
		 * @since     1.0.0
		 * @static
		 * @return    object|Dogs_Post_Type The one true Dogs_Post_Type
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Dogs_Post_Type ) ) {
				self::$instance             = new Dogs_Post_Type;
				self::$instance->base_hooks(); // load textdomain
				self::$instance->includes(); 	 // runs helpers, includes and run
				self::$instance->helpers		= new Dogs_Post_Type_Helpers(); // not used so far
				self::$instance->settings		= new Dogs_Post_Type_Settings(); // not used so far
				self::$instance->templates	= new Dogs_Post_Type_Apply_Templates(); // creates single-dog.php template
				self::$instance->blocks			= new Dogs_Post_Type_Gutenberg_Blocks(); // creates single-dog.php template

				//Fire the plugin logic
				new Dogs_Post_Type_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'BSD/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once BSD_PLUGIN_DIR . 'core/includes/classes/class-dogs-post-type-helpers.php';
			require_once BSD_PLUGIN_DIR . 'core/includes/classes/class-dogs-post-type-settings.php';
			require_once BSD_PLUGIN_DIR . 'core/includes/classes/class-dogs-post-type-run.php';
			require_once BSD_PLUGIN_DIR . 'core/includes/classes/class-apply-templates.php';
			require_once BSD_PLUGIN_DIR . 'core/includes/classes/class-gutenberg-blocks.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'dogs-post-type', FALSE, dirname( plugin_basename( BSD_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.
