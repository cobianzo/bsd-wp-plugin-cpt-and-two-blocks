<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Dogs_Post_Type_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package     BSD
 * @subpackage  Classes/Dogs_Post_Type_Run
 * @author      Alvaro Blanco
 * @since       1.0.0
 */
class Dogs_Post_Type_Run {

	/**
	 * Our Dogs_Post_Type_Run constructor
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WordPress HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access  private
	 * @since   1.0.0
	 * @return  void
	 */
	private function add_hooks() {
		// add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'init', array( $this, 'register_custom_post_type_dogs' ), 20 );
	}

	/**
	 * ######################
	 * ###
	 * #### WordPress HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access  public
	 * @since   1.0.0
	 *
	 * @return  void
	 */
	public function enqueue_backend_scripts_and_styles() {
		// We do this in the gutenberg-blocks.php file.
		// wp_enqueue_script( 'bsd-backend-scripts', BSD_PLUGIN_URL . 'core/includes/assets/js/backend-scripts.js', array(), BSD_VERSION, false );
		// wp_die( BSD_PLUGIN_DIR );
		// $asset_file = include BSD_PLUGIN_DIR . 'core/includes/assets/build/index.asset.php';
		// wp_enqueue_script(
		// 	'bsd-backend-scripts',
		// 	BSD_PLUGIN_URL . 'core/includes/assets/build/index.js',
		// 	$asset_file['dependencies'],
		// 	$asset_file['version'],
		// 	false
		// );

		// // wp_enqueue_script( 'bsd-backend-scripts', BSD_PLUGIN_URL . 'core/includes/assets/build/index.js',  array(), BSD_VERSION, false );
		// wp_localize_script( 'bsd-backend-scripts', 'bsd', array( 'plugin_name' => __( BSD_NAME, 'dogs-post-type' ) ) );
	}


	/**
	 * Register the custom post type for dogs
	 *
	 * @access  public
	 * @since   1.0.0
	 *
	 * @return  void
	 */
	public function register_custom_post_type_dogs() {
		$labels = array(
			'name'               => __( 'Dogs', 'dogs-post-type' ),
			'singular_name'      => __( 'Dog', 'dogs-post-type' ),
			'menu_name'          => __( 'Dogs', 'dogs-post-type' ),
			'name_admin_bar'     => __( 'Dogs', 'dogs-post-type' ),
			'add_new'            => __( 'Add New', 'dogs-post-type' ),
			'add_new_item'       => __( 'Add New Dog', 'dogs-post-type' ),
			'new_item'           => __( 'New Dog', 'dogs-post-type' ),
			'edit_item'          => __( 'Edit Dog', 'dogs-post-type' ),
			'view_item'          => __( 'View Dog', 'dogs-post-type' ),
			'all_items'          => __( 'All Dogs', 'dogs-post-type' ),
			'search_items'       => __( 'Search Dogs', 'dogs-post-type' ),
			'parent_item_colon'  => __( 'Parent Dogs:', 'dogs-post-type' ),
			'not_found'          => __( 'No dogs found.', 'dogs-post-type' ),
			'not_found_in_trash' => __( 'No dogs found in Trash.', 'dogs-post-type' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true, // To use Gutenberg editor.
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'dogs' ),
			'capability_type' 	 => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'thumbnail' ),
			'taxonomies'         => array(), // array( 'category', 'post_tag' ),
		);

		register_post_type( 'dogs', $args );	
	}
}
