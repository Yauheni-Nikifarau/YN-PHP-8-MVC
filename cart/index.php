<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/php/autoloader.php';


if (!check_authorization()) {
    header('location: /login/');
    die();
}


$cartPage = new Cart_Controller();
$cartPage->action();
