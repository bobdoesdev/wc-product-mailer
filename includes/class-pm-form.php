<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Creates the form for the plugin.
 *
 * @package Product_Mailer
 */
 
/**
 * Creates the form for the single product page
 *
 * Provides the functionality necessary for rendering the page corresponding
 * to the submenu with which this page is associated.
 *
 * @package Product_Mailer
 */
class PM_Form {

  public function init(){
    add_action('woocommerce_before_single_product_summary', array($this, 'render'));
  }

  
  /**
   * 
   * Render contents of form
   * 
   */
  
  public function render() {
    echo 'we go this far!';
    include_once( plugin_dir_path(__DIR__) .'public/form.php' );
  }

}
