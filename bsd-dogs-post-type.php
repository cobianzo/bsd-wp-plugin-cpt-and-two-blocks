<?php
/**
 * Dogs Post Type
 *
 * @package       BSD
 * @author        Alvaro Blanco
 * @license       gplv2
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Dogs Post Type w/ wpscripts
 * Plugin URI:    https://banskostreetdogs.com
 * Description:   Define the post type for dogs, and the block to display a single dog and a list of dogs.
 * Version:       1.0.0
 * Author:        Alvaro Blanco
 * Author URI:    https://cobianzo.com
 * Text Domain:   dogs-post-type
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with Dogs Post Type. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'BSD_NAME',			'Dogs Post Type' );

// Plugin version
define( 'BSD_VERSION',		'1.0.0' );

// Plugin Root File
define( 'BSD_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'BSD_PLUGIN_BASE',	plugin_basename( BSD_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'BSD_PLUGIN_DIR',	plugin_dir_path( BSD_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'BSD_PLUGIN_URL',	plugin_dir_url( BSD_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once BSD_PLUGIN_DIR . 'core/class-dogs-post-type.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Alvaro Blanco
 * @since   1.0.0
 * @return  object|Dogs_Post_Type
 */
function BSD() {
	return Dogs_Post_Type::instance();
}

BSD();
