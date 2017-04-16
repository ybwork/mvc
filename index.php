<?php

// Config
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Connect files
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/router.php');
require_once(ROOT . '/components/db.php');

// Start router
$router = new Router();
$router->run();