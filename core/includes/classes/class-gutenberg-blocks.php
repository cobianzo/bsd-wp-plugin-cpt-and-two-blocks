<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Dogs_Post_Type_Gutenberg_Blocks
 *
 * This class contains repetitive functions that
 * are used globally within the plugin.
 *
 * @package     BSD
 * @subpackage  Classes/Dogs_Post_Type_Gutenberg_Blocks
 * @author      Alvaro Blanco
 * @since       1.0.0
 */
class Dogs_Post_Type_Gutenberg_Blocks {

  /**
	 * Our Dogs_Post_Type_Run constructor
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct() {
		$this->add_hooks();
	}

   /*
  * Define a constant path to our single template folder
  */
  // const SINGLE_PATH = BSD_PLUGIN_DIR . 'core/includes/template-single-dog.php';

  /**
	 * ######################
	 * ###
	 * #### Wordpress HOOKS
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
		
    /**
    * Filter the single_template with our custom function
    */
		
		add_action( 'init', array( $this, 'register_block_type' ), 10, 1 );

		add_action( 'admin_enqueue_scripts', array( $this, 'scripts_for_all_dogs_blocks' ), 20, 1 );
	}

	/**
	 * Registration of block in PHP. HOOK 'init'
	 *
	 * @return void
	 */
	function register_block_type() {
		
		// BSD_PLUGIN_URL
		// BSD_PLUGIN_FILE
		
		// register_block_type_from_metadata( BSD_PLUGIN_URL . '/assets/block1' );

		// wp_register_script( 'dogs-post-type', BSD_PLUGIN_URL . '/assets/block1.jsoon');
 
		// register_block_type('dogs-post-type/dogs-meta', [
		// 	'editor_script' => 'awp-myfirstblock-js',
		// ]);

		// wp_die(BSD_PLUGIN_FILE . '/assets/block1/block.json');
		register_block_type( 'bsd/dog-meta', [
			'render_callback' => array( $this, 'render_block_1_php' ),
			'attributes'      => [
					'some_string' => [
							'default' => 'default string',
							'type'    => 'string'
					],
					'some_array'  => [
							'type'  => 'array',
							'items' => [
									'type' => 'string',
							],
					]
			]
		] );
		
	}


	/**
	 * We need to enqueue manually the scritps, because we are not using block.json
	 */
	function scripts_for_all_dogs_blocks() {
		
		
		// Dependencies created on build block. Block 1
		
    $script_asset_path = BSD_PLUGIN_DIR . "core/includes/assets/build/block1.asset.php";
		
    if ( ! file_exists( $script_asset_path ) ) {
        throw new Error( 'not found: ' . $script_asset_path . ' ' .
            'You need to run `npm start` or `npm run build` for the block1 first.'
        );
    }
    $script_asset = require( $script_asset_path );
		// wp_die(BSD_PLUGIN_URL . 'core/includes/assets/build/block1.js');
    wp_register_script(
        'dogs-post-type-block1',
        BSD_PLUGIN_URL . 'core/includes/assets/build/block1.js',
        $script_asset['dependencies'],
        $script_asset['version']
    );
    //  wp_set_script_translations( 'dogs-post-type-block-editor', 'wholesome-plugin' );
		wp_enqueue_script( 'dogs-post-type-block1' );
		wp_localize_script( 'dogs-post-type-block1', 'bsd', array( 'plugin_name' => __( BSD_NAME, 'dogs-post-type' ) ) );




		// Dependencies created on build block. Block 2
		
    $script_asset_path = BSD_PLUGIN_DIR . "core/includes/assets/build/block2.asset.php";
		
    if ( ! file_exists( $script_asset_path ) ) {
        throw new Error( 'not found: ' . $script_asset_path . ' ' .
            'You need to run `npm start` or `npm run build` for the block2 first.'
        );
    }
    $script_asset = require( $script_asset_path );
		// wp_die(BSD_PLUGIN_URL . 'core/includes/assets/build/block2.js');
    wp_register_script(
        'dogs-post-type-block2',
        BSD_PLUGIN_URL . 'core/includes/assets/build/block2.js',
        $script_asset['dependencies'],
        $script_asset['version']
    );
    //  wp_set_script_translations( 'dogs-post-type-block-editor', 'wholesome-plugin' );
		wp_enqueue_script( 'dogs-post-type-block2' );
		wp_localize_script( 'dogs-post-type-block2', 'bsd', array( 'plugin_name' => __( BSD_NAME, 'dogs-post-type' ) ) );

	}

	// If we use dynamic blocks (frontned is PHP), we need to use render_callback.
	function render_block_1_php() {
		return "Hello World";
	}

	function render_block_2_php() {
		return "Hello World Block 2 frontend";
	}

}
