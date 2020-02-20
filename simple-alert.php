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
 * Version:           1.0.1
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
define( 'SIMPLE_ALERT_VERSION', '1.0.1' );

/**
 * Begins execution of the plugin.
 */
require plugin_dir_path( __FILE__ ) . 'admin/class-simple-alert-admin.php';
require plugin_dir_path( __FILE__ ) . 'public/class-simple-alert-public.php';
/**
 * Register the Style for the admin area.
 *
 * @since    1.0.0
 */
function simple_alert_admin_styles() {
	wp_register_style( 'simple_alert_admin_css', plugin_dir_url( __FILE__ ).'assets/css/simple-alert-admin.css', false, '1.0' );
	wp_enqueue_style( 'simple_alert_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'simple_alert_admin_styles' );
/**
 * Register the JavaScript for the admin area.
 *
 * @since    1.0.0
 */
function simple_alert_admin_scripts() {
	wp_register_script( 'simple_alert_admin_js', plugin_dir_url( __FILE__ ).'assets/js/simple-alert-admin.js', false, '1.0', false );
	wp_enqueue_script( 'simple_alert_admin_js' );
}
add_action( 'admin_enqueue_scripts', 'simple_alert_admin_scripts' );
$simpleAlertAdmin = new Simple_Alert_Admin();
$simpleAlertPublic = new Simple_Alert_Public();
