<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/controllers/Product_controller.php';
require_once ROOT . '/app/models/Product_model.php';
require_once ROOT . '/app/core/View.php';
require_once ROOT . '/app/core/User.php';
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/dataClasses/GoodsDb.php';
$productPage = new Product_Controller();
$productPage->action();