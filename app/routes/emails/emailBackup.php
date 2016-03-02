<?php 

/**
 *  Backup Email incase the database doesn't work
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


// Determine the product
if($quantity_mini > 0) {
    $product_1 = '<p>Model: Bitcoin Mini</p>
                  <p>Quantity: '. $quantity_mini .'</p>';
} else {
    $product_1 = '';
}
if($quantity_basic > 0) {
    $product_2 = '<p>Model: Mini Basic</p>
                  <p>Quantity: '. $quantity_basic .'</p>';
} else {
    $product_2 = '';
}
if($quantity_deluxe > 0) {
    $product_3 = '<p>Model: Mini Deluxe</p>
                  <p>Quantity: '. $quantity_deluxe .'</p>';
} else {
    $product_3 = '';
}


// two variables for recipients, one to us and one to customer
$admin    = 'ansellindner@protonmail.com, stevej51921@gmail.com, support@bitcoinmini.com'; // note the commas
$customer = $email;

// subject
$subject  = 'BitcoinMini.com Purchase Details - #'. $confirmId;
$admin_subject = 'Order - DB Failure to insert!!!';

// message
$message  = '
    <h2>Thank You from BitcoinMini.com!</h2>
    <hr>
    <p>Your payment has gone through. You\'ll receive another email when we ship your order.</p><br>
    <p>Please review the below information. If any of it is incorrect, contact us immediately via <a href="mailto:support@bitcoinmini.com">support@bitcoinmini.com</a>.</p><br>
    <h4>ORDER DETAILS</h4>
    <hr>
    <p>Date: '. $purchaseDate .'</p>
    <p><b>Order#: '. $confirmId .'</b> - Keep for your records.</p><br>'
    .$product_1.' '.$product_2.' '.$product_3.
    '<h4>SHIPPING DETAILS</h4>
    <hr>
    <p>Name: '. $name .'</p>
    <p>Email: '. $email .'</p>
    <p>Address: '. $fullStreet .'</p>
    <p>Address2: '. $city .' '. $state .' '. $zip .'</p>
    <p>Country: '. $country .'</p><br>
';

// add the btc address info to our emails
$adminMsg = '<h2>BACKUP email - Not inserted in DB!!!!</h2><br>
    <p>btc address: '. $btcaddress .'</p>
    <p>address id: '. $btcaddress_id .'</p><br><br>
    <h2>What customer received</h2>'. $message;

//$headers   = array();
$headers  = 'MIME-Version: 1.0'. "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
$headers .= 'From: Bitcoin Mini <support@bitcoinmini.com>'. "\r\n";
$headers .= 'Reply-To: Bitcoin Mini <support@bitcoinmini.com>'. "\r\n";
$headers .= 'Subject: '. $subject;

// Mail it twice so they don't see our emails
mail( $customer, $subject, $message, $headers );
mail( $admin, $admin_subject, $adminMsg, $headers );