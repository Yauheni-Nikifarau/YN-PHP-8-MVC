<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/controllers/Cart_controller.php';
require_once ROOT . '/app/models/Cart_model.php';
require_once ROOT . '/app/core/View.php';
$cartPage = new Cart_Controller();
$cartPage->action();
