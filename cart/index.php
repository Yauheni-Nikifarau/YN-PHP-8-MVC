<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/controllers/Cart_controller.php';
require_once ROOT . '/app/models/Cart_model.php';
require_once ROOT . '/app/core/View.php';
require_once ROOT . '/app/core/User.php';
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/dataClasses/GoodsDb.php';


if (!check_authorization()) {
    header('location: /login/');
    die();
}


$cartPage = new Cart_Controller();
$cartPage->action();
