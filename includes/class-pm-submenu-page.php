<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once( plugin_dir_path( __FILE__ ) . 'class-pm-deserializer.php' );

/**
 * Creates the submenu page for the plugin.
 *
 * @package Product_Mailer
 */
 
/**
 * Creates the submenu page for the plugin.
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Product_Builder_Mailer
 */
class PM_Submenu_Page {

	public function __construct( $deserializer ) {
	    $this->deserializer = $deserializer;
	}
	 
        /**
     * This function renders the contents of the page associated with the Submenu
     * that invokes the render method. In the context of this plugin, this is the
     * Submenu class.
     */
    public function render() {
        include_once( plugin_dir_path(__DIR__) .'admin/settings.php' );
    }
}