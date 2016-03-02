<?php

/**
*  Routes from shipping and to confirm
*  @package Routes
*  @subpackage orders
*  @global array $_SESSION['order']
*/

// Get info from the shipping form
$app->post('/shipping_details', function () use ($app) {

    // Set some values
    $error = false;
    $_SESSION['errors'] = [];
    $confirmId = uniqid(); 
    $_SESSION['order']['confirmId'] = $confirmId; // This is used as a unique order #
    $_SESSION['order']['shipping'] = ''; // have to reset, for edits that change country.

    try {
        if(!empty($_POST)) {
            // Check name
            $_SESSION['order']['name'] = htmlentities($_POST['name']);
            // Check street
            $_SESSION['order']['street'] = htmlentities($_POST['street']);
            if(!empty($_POST['street2'])) {
                $_SESSION['order']['street2'] = htmlentities($_POST['street2']);
            } else {$_SESSION['order']['street2'] = '';}
            // Check city
            $_SESSION['order']['city'] = htmlentities($_POST['city']);
            // Check state
            $_SESSION['order']['state'] = htmlentities($_POST['state']);
            // Check zip
            $_SESSION['order']['zip'] = htmlentities(intval($_POST['zip']));
            // Check country and set shipping if international
            if ($_POST['country'] !== 'USA') {
                $_SESSION['order']['country'] = htmlentities($_POST['country']);
                $_SESSION['order']['shipping'] = '25';
            } else {
                $_SESSION['order']['country'] = htmlentities($_POST['country']);
                $_SESSION['order']['shipping'] = '';

            }
            
            // Check email
            $_SESSION['order']['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        } else { 
            throw new Exception('Formating of information error');
            $error = true;
        }

        if($error == false) {
            $app->redirect(HOME_PATH.'/checkout_details');
        } else {
            $app->redirect(HOME_PATH.'/error');
        }

    } catch (Exception $e) {
        error_log($e); var_dump($e);
    }

}); // passes route to checkout_details to get database info
// =============================================================================
// Get address and address id from db
$app->get('/checkout_details', function () use ($app) {

    $errormsg = false;
    // get an address from db
    try {
        $address = $app->db->query("
            SELECT id,pub 
              FROM btckeys 
             WHERE used = 0 
             LIMIT 1;
            ")->fetchAll(PDO::FETCH_ASSOC);
        
        // if not empty create session variables to carry to view and email
        if(!empty($address)) {
            $_SESSION['order']['btcaddress'] = $address[0]['pub'];
            $_SESSION['order']['btcaddress_id'] = $address[0]['id'];


        } else { $errormsg = true; throw new Exception('DB response empty.'); }


        // Set the address as used
        if( isset($_SESSION['order']['btcaddress_id'])) {
            $address = $app->db->query("
                UPDATE btckeys 
                   SET used = '1' 
                 WHERE id = ". $_SESSION['order']['btcaddress_id'] .";
                ");
        } else { $errormsg = true; throw new Exception('Could not change value to used.'); }

    // print error to error_log
    } catch(Exception $e) { $output = json_encode(array('error'=>$e->getMessage())); error_log($output); }

    // Redirect to a pretty url
    if( $errormsg == false) {
        $app->redirect(HOME_PATH.'/checkout');
    } else {
        print_r($output);
        //$app->redirect(HOME_PATH.'/error');
    } 
}); // Sends to /checkout
// =============================================================================
// This is basically a redirect from the path /checkout_details so we can get a prettier url
$app->get('/checkout', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('order_pages/pageConfirm.php');
    
});
// =============================================================================