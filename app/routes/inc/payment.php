<?php

/**
*  Payment completed insert and update data
*  @package Routes
*  @subpackage orders
*  @global array $_SESSION['order']
*/

// Complete order and add order to db
$app->get('/complete', function () use ($app) {
    //Set values for short hand
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
    $processed      = 0;

    // try to insert and update, else throw errors
    try {
        // Send the Insert of the new order
        if( $insert = $app->db->exec("
                INSERT INTO bitcoin 
                    (quantity_deluxe, quantity_basic, quantity_mini, 
                        name, street, city, state, zip, email, btcAdd, confirmID, processed, timestamp) 
                VALUES('".$quantity_deluxe."', '".$quantity_basic."', '".$quantity_mini."', '".$name."', '".$fullStreet."', 
                        '".$city."', '".$state."', '".$zip."', '".$email."', '".$btcaddress_id."', '".$confirmId."', '0', CURRENT_TIMESTAMP);
            ")) 
        { 

            // If that was successful, send the update
            if( $update = $app->db->exec("
                    UPDATE btckeys 
                       SET paid = '1' 
                     WHERE id = '".$btcaddress_id."';
                ")) 
            {
                
                // when both queries are successful send some emails
                require_once $_SERVER['DOCUMENT_ROOT'].'/app/routes/emails/emailPaid.php';

            } else {

                // if update failed throw exception
                throw new Exception('There was a problem with the update.'); 
            }
        // if insert failed send backup email and throw exception    
        } else {
            require_once $_SERVER['DOCUMENT_ROOT'].'/app/routes/emails/emailBackup.php';
            throw new Exception('There was a problem with the insert.'); 
        }
    // catch the exceptions and print to error_log
    } catch(Exception $e) { $output = json_encode(array('error'=>$e->getMessage())); error_log($output); } // log the exception

    // if everything goes well, redirect. SESSION is unset and destroyed in the view
    if($error == false) {
        $app->render('inc/header.php');
        $app->render('order_pages/complete.php');
        $app->render('inc/footer.php');
    } else {
        $app->redirect(HOME_PATH.'/error');
    }
});