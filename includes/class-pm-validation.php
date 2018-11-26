<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

include_once( plugin_dir_path( __FILE__ ) . 'class-pm-deserializer.php' );

/**
 * Validates and sends form fomr single product page
 *
 * @package Product_Mailer
 */
 

class PM_Validation {

  public function __construct( $deserializer ) {
      $this->deserializer = $deserializer;
  }

  public function init(){
    add_action('wp', array($this, 'customer_email'));
    add_action('wp', array($this, 'employee_email'), 20);
    add_action('get_footer', array($this, 'get_variation_id'), 20);
  }

  
  /**
   * 
   * Validate contents of form
   * 
   */

  public function employee_email() {
    if (is_product()) {

      if (isset($_POST['pm-submit-product']) && isset($_POST['product_variation_id']) ) {

      // Build the message
      $message  = "<h1>Customer: " . $_POST['pm-customer-name'] ."</h1>\n";
      $message .= "<p>Is interested in: </p>\r\n";
      $message .=  '<p>' . $_POST['pm-product-style']  . " " . $_POST['pm-product-finish'] . '</p>';

      //set the form headers
      $headers =  'From: '. $_POST['pm-customer-email']  . "\r\n" .
                  'Reply-To: ' . $_POST['pm-customer-email']  . "\r\n" .
                  'Content-Type: text/html; charset=UTF-8;';

      $subject = 'Customer Inquiry at Your Website';

      $recipient = esc_attr( $this->deserializer->get_value( 'pm-recipient' ) );

      if ( wp_mail( $recipient, $subject, $message, $headers ) ) {
        wp_redirect('/thank-you'); 
        exit;
     }

    }

   }

  }

  public function customer_email() {
    if (is_product()) {

      if (isset($_POST['pm-submit-product']) && isset($_POST['product_variation_id'])) {  

        $attachments = $this->get_image_url();

        // Build the message
        $message = '<div style="text-align:center;">';
        $message .= '<h1>Thank you for contacting us!</h1>';
        $message .= "<p>You have expressed an interest in: </p>";
        $message .= "<p>Product Style: " . $_POST['pm-product-style']  ."</p>";
        $message .= "<p>Product Finish: " . $_POST['pm-product-finish']  . "</p>";
        $message .= "<p>One of sales representatives will be in contact with you soon.</p>";
        $message .= "<p><img src=" . $attachments . "/></p>";
        $message .= $attachments;
        $message .= '</div>';


        //set the form headers
        $headers = array('Content-Type: text/html; charset=UTF-8; From: Contact form <your@contactform.com>');

        $subject = 'Your recent inquiry at your Website';

        $recipient = $_POST['pm-customer-email'];

        wp_mail( $recipient, $subject, $message, $headers, $attachments );

      }
     }

   }

   public function get_variation_id(){

    ?>
        <script>
        jQuery(document).ready(function($) {
             
            $('input.variation_id').change( function(){
                if( '' != $('input.variation_id').val() ) {
                     
                    var var_id = $('input.variation_id').val();
                    $('#product_variation_id').val(var_id);
                     
                }
            });
             
        });
        </script>
        <?php

   }

  public function get_image_url(){
    global $post;
    $product = new WC_Product($post->ID);
    $variableProduct = new WC_Product_Variation($_POST['product_variation_id']);
    $variation_name = $variableProduct->get_slug();

    $trimmed_slug = str_replace('configurable-product', '',  $variation_name);

    $images = get_post_meta($post->ID, 'jckpc_images', true);
    $finishes = $images['jckpc-finishes'];

    foreach ($finishes as $image => $value) {
      if($image === 'jckpc' . $trimmed_slug){
        $final_id = $value;
      }
    }

    $get_attachment = wp_get_attachment_image_src($final_id, 'full');
    $attachments = $get_attachment[0];

    return $attachments;
  }

}



