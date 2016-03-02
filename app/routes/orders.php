<?php

/**
*  BitcoinMini.com order routing
*  @package Routes
*  @subpackage orders
*  @todo Add routes for other products
*/

// testing routes
require_once 'inc/testRoutes.php';
// =============================================================================


// Routes from the homepage
require_once 'inc/homepage.php';
// Sends user to /shipping
// =============================================================================


// Routes from the /shipping
require_once 'inc/shipping.php';
// Sends user to /checkout
// =============================================================================


// Route after payment
require_once 'inc/payment.php';
// =============================================================================


// Cancel/Unset/Home link
// =============================================================================
$app->get('/cancel', function () use ($app) {
    session_unset();
    session_destroy();
    $app->redirect(HOME_PATH.'/');
});
