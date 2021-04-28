<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/php/autoloader.php';
if (isset($_POST['goodId'])) {
    header("location: {$_SERVER['REQUEST_URI']}");
}
$goodsPage = new Goods_Controller();
$goodsPage->action();
