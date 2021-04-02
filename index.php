<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/controllers/Goods_controller.php';
require_once ROOT . '/app/models/Goods_model.php';
require_once ROOT . '/app/core/View.php';
require_once ROOT . '/app/core/User.php';
require_once ROOT . '/app/php/functions.php';
if (isset($_POST['goodId'])) {
    header("location: {$_SERVER['REQUEST_URI']}");
}
$goodsPage = new Goods_Controller();
$goodsPage->action();