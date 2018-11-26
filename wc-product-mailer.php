<?php 
/**
 * Plugin Name: WooCommerce Product Mailer
 * Description: Adds a form to WooCommerce Single Product Page that allows for sending details of product to potential customer and sales team members.
 * Version: 1.0
 * Author: Bob, O'Brien, Digital Eel Inc.
 * Author URI:http://digitaleel.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option('active_plugins') ) ) ){

	require_once plugin_dir_path(__FILE__) . 'includes/class-pm-submenu.php';
	require_once plugin_dir_path(__FILE__) . 'includes/class-pm-submenu-page.php';
	require_once plugin_dir_path(__FILE__) . 'includes/class-pm-serializer.php';
	require_once plugin_dir_path(__FILE__) . 'includes/class-pm-deserializer.php';
	require_once plugin_dir_path(__FILE__) . 'includes/class-pm-form.php';
	require_once plugin_dir_path(__FILE__) . 'includes/class-pm-validation.php';


	add_action( 'plugins_loaded', 'pm_plugin_startup_settings' );
	/**
	 * Starts the plugin.
	 *
	 * @since 1.0.0
	 */
	function pm_plugin_startup_settings() {

	    $serializer = new PM_Serializer();
	    $serializer->init();

	    $deserializer = new PM_Deserializer();
	 
	    $plugin = new PM_Submenu( new PM_Submenu_Page($deserializer) );
	    $plugin->init();
	 
	 	$form = new PM_Form();
	    $form->init();

	    $validation = new PM_Validation( $deserializer );
	    $validation->init();
	}

}