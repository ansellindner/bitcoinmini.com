<?php 

/**
*  Routes from homepage
*  @package Routes
*  @subpackage orders
*/
/**
*  Setting variables from the quantity modal
*  @package Routes
*  @subpackage orders
*  @global array $_SESSION['order']
*/
// This is coming from the homepage modal to shipping
$app->post('/quantity', function () use ($app) {
    // Set some values
    $order = false;
    if( $_POST['number-mini'] == intval($_POST['number-mini'])) {
        $_SESSION['order']['quantity_mini'] = intval($_POST['number-mini']);
        $order = true;
    }
    if( $_POST['number-basic'] == intval($_POST['number-basic'])) {
        $_SESSION['order']['quantity_basic'] = intval($_POST['number-basic']);
        $order = true;
    }
    if($order == true) {
        $app->redirect(HOME_PATH.'/shipping');
    } else {
        $app->redirect(HOME_PATH.'/error');
    }
});
// =============================================================================
// This is basically a redirect from the path /quantity so we can get a prettier url
$app->get('/shipping', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('order_pages/pageShipping.php');
    
});
// =============================================================================