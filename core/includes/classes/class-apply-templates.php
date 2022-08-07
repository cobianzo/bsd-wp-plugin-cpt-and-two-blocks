<?php
// TODELETE: I think I wont create a new template, but just new blocks AND Gutenberg template.

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Dogs_Post_Type_Apply_Templates
 *
 * This class contains repetitive functions that
 * are used globally within the plugin.
 *
 * @package     BSD
 * @subpackage  Classes/Dogs_Post_Type_Apply_Templates
 * @author      Alvaro Blanco
 * @since       1.0.0
 */
class Dogs_Post_Type_Apply_Templates {

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
  const SINGLE_PATH = BSD_PLUGIN_DIR . 'core/includes/template-single-dog.php';

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
		// add_action( 'single_template', array( $this, 'apply_single_dog_template_hook' ), 20, 1 );
	}


  /**
  * Single template function which will choose our template
  */
  function apply_single_dog_template_hook($single) {

    global $wp_query, $post;
    if (!is_singular('dogs')) {
      return $single;
    }
    
    $template_path = self::SINGLE_PATH;
    // wp_die($template_path);
    include_once $template_path; 
  }


}
