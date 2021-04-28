<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/php/autoloader.php';
$productPage = new Product_Controller();
$productPage->action();