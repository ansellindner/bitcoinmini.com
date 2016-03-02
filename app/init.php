<?php session_cache_limiter(false);session_start();

/**
*  Bootstraping file for bitcoinmini.com
*
*  @package Skeleton
*/

require 'config.php';

// Require Autoload for slim
require 'vendor/autoload.php';
\Slim\Slim::registerAutoloader();

// Instantiate Slim
$app = new \Slim\Slim([
	'templates.path' => 'app/views'
]);

// Database connection for logging orders
$app->container->singleton('db', function() {
    return new PDO('mysql:host='._HOST.';dbname='._DBNAME.'', ''._USERNAME.'', ''._PASSWORD.'');
});

// Bring in the routes for the model A
require_once 'routes/basic.php';
// Email support for submitting forms
require_once 'routes/orders.php';
// CURL to set $_SESSION['index_price']
require_once 'index_price.php';
