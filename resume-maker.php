<?php
ob_start();
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.fiverr.com/junaidzx90
 * @since             1.0.0
 * @package           Resume_Maker
 *
 * @wordpress-plugin
 * Plugin Name:       Resume Maker
 * Plugin URI:        https://www.fiverr.com
 * Description:       [resume_maker]
 * Version:           1.0.7
 * Author:            Developer Junayed
 * Author URI:        https://www.fiverr.com/junaidzx90
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       resume-maker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
header("Cache-Control: no-cache");
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'RESUME_MAKER_VERSION', '1.0.7' );
define( 'RESUME_MAKER_URL', plugin_dir_url(__FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-resume-maker-activator.php
 */
function activate_resume_maker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-resume-maker-activator.php';
	Resume_Maker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-resume-maker-deactivator.php
 */
function deactivate_resume_maker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-resume-maker-deactivator.php';
	Resume_Maker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_resume_maker' );
register_deactivation_hook( __FILE__, 'deactivate_resume_maker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-resume-maker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_resume_maker() {

	$plugin = new Resume_Maker();
	$plugin->run();

}
run_resume_maker();
