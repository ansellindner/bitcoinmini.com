<?php

/**
*  BitcoinMini.com basic routing
*  @package Routes
*  @subpackage basic
*  @todo Add routes for other products
*/

// home
$app->get('/', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('home.php');
    $app->render('inc/footer.php');
});
// home alternate
$app->get('/home', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('home.php');
    $app->render('inc/footer.php');
});
// contact page
$app->get('/contact', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('contact.php');
    $app->render('inc/footer.php');
});
// contact page thank you
$app->get('/thanks_contact', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('thanks_contact.php');
    $app->render('inc/footer.php');
});
// terms page
$app->get('/terms', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('terms.php');
    $app->render('inc/footer.php');
});
// blog
$app->get('/blog', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('blog.php');
    $app->render('inc/footer.php');
});
// error page
$app->get('/error', function () use ($app) {
    $app->render('inc/header.php');
    $app->render('error.php');
    $app->render('inc/footer.php');
});

// =============================================================================
// Post route for Contact Email
// =============================================================================

$app->post('/contactForm', function () use ($app) {

    // Get POST data, no real escaping is necessary since its meant to be human readable
    $name    = $_POST['contact_name'];
    $email   = $_POST['contact_email'];
    $msg     = $_POST['contact_msg'];
    $messageDate = date("F j, Y, g:i a");

    // two variables for recipients, one to us and one to customer
    $admin  = 'ansellindner@protonmail.ch, stevej51921@gmail.com, support@bitcoinmini.com'; // note the comma
    $to    = $email;

    // Different subjects
    $subject = 'Thank you contacting BitcoinMini.com';
    $adminSubject = 'Mini Contact Form!';

    // message
    $message = '
        <h3>We have received your message and will be in touch very soon.</h3>
        <p><Another way to contact us is via Twitter @BitcoinMini and on Reddit in the sub r/BitcoinMini.</p>
            <br>
            <p>Date: '. $messageDate .'</p>
            <p>Name: '. $name .'</p>
            <p>Email: '. $email .'</p>
            <br><br>
            <p>Message</p>
            <p>'. $msg .'</p>
    ';
    // AdminMsg
    $adminMsg = '
        <h3>Message from Bitcoin Mini Contact Form</h3>
            <br>
            <p>Date: '. $messageDate .'</p>
            <p>From: '. $name .'</p>
            <p>Email: '. $email .'</p>
            <br><br>
            <p>Message</p>
            <p>'. $msg .'</p>
    ';

    //$headers   = array();
    $headers  = 'MIME-Version: 1.0'. "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1'. "\r\n";
    $headers .= 'From: Bitcoin Mini <support@bitcoinmini.com>'. "\r\n";
    $headers .= 'Reply-To: Bitcoin Mini <support@bitcoinmini.com>'. "\r\n";
    $headers .= 'Subject: '. $subject;

    try {
        // Mail it twice so they don't see our emails
        mail($to, $subject, $message, $headers);
        mail($admin, $adminSubject, $adminMsg, $headers);
    } catch(Exception $e) { error_log($e); }
    
    session_unset();
    $_SESSION['contact'] = true;
    $app->redirect('home');

});
