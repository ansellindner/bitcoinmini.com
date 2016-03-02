<?php session_cache_limiter(false);session_start();

/**
 *  Prepayment email - depricated @version 1.1
 *  
 *  @param string $_SESSION
 *  @param string $mini admin emails
 *  @param string $to customer email
 *  @param string $subject
 *  @param string $message
 *  @param string $adminMsg adds admin info to the message
 *  @param string $headers email headers
 *  @return bool
 */

// Set values for short hand
$error         = false;
$_SESSION['errors'] = [];
$purchaseDate   = date("F j, Y, g:i a");
$confirmId      = $_SESSION['order']['confirmId'];
$name           = $_SESSION['order']['name'];
$email          = $_SESSION['order']['email'];
$street         = $_SESSION['order']['street'];
$street2        = $_SESSION['order']['street2'];
$fullStreet     = $street .' / '. $street2;
$city           = $_SESSION['order']['city'];
$state          = $_SESSION['order']['state'];
$zip            = intval($_SESSION['order']['zip']);
$country        = $_SESSION['order']['country'];
$btcaddress     = $_SESSION['order']['btcaddress'];
$btcaddress_id  = $_SESSION['order']['btcaddress_id'];
$quantity_deluxe  = 0;
$quantity_mini  = intval($_SESSION['order']['quantity_mini']);
$quantity_basic = intval($_SESSION['order']['quantity_basic']);
$shipping       = $_SESSION['order']['shipping'];

// two variables for recipients, one to us and one to customer
$mini  = 'ansellindner@protonmail.com, stevej51921@gmail.com, support@bitcoinmini.com'; // note the commas
$to    = $email;

// subject
$subject = 'BitcoinMini.com Prepayment Email';

// message
$message = '
    <h2>Thank you for your interest in BitcoinMini.com.</h2>
    <p>We are waiting for your payment. If you are having trouble with the payment contact us at support@bitcoinmini.com.<br>
    As soon we recieve the payment you\'ll receive another email with order details.</p><br>
    <p>If you are in a country that we don\'t regularly support shipping to, contact us at support@bitcoinmini.com and we will work something out with you.</p>
    <p>Decentralize all the things.</p>'
;

// add the btc address info to our emails
$adminMsg = '<h2>Someone\'s about to checkout</h2><br>
    <p>btc address: '. $btcaddress .'</p>
    <p>address id: '. $btcaddress_id .'</p><br><br>
    <h2>What customer received</h2>'. $message;

//$headers   = array();
$headers = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
$headers .= 'From: Bitcoin Mini <support@bitcoinmini.com>'. "\r\n";
$headers .= 'Reply-To: Bitcoin Mini <support@bitcoinmini.com>'. "\r\n";
$headers .= 'Subject: '. $subject;

// Mail it twice so they don't see our emails
mail( $to, $subject, $message, $headers );
mail( $mini, $subject, $adminMsg, $headers );