<?php
/**
 * The plugin bootstrap file
 *
 *
 * @link              http://manojsinghrwt.wordpress.com/
 * @since             1.0.0
 * @package           Simple_Alert
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Alert
 * Plugin URI:        #
 * Description:       This is a just simple alert box to show in posts and pages.
 * Version:           1.0.0
 * Author:            Manoj Singh
 * Author URI:        http://manojsinghrwt.wordpress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-alert
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Currently plugin version.
 */
define( 'SIMPLE_ALERT_VERSION', '1.0.0' );

/**
 * Begins execution of the plugin.
 */
require plugin_dir_path( __FILE__ ) . 'admin/class-simple-alert-admin.php';
require plugin_dir_path( __FILE__ ) . 'public/class-simple-alert-public.php';

$simpleAlertAdmin = new Simple_Alert_Admin();
$simpleAlertPublic = new Simple_Alert_Public();