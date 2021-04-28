<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/php/autoloader.php';
if (!check_authorization()) {
    header("location: /login/");
    die();
}
$cartPage = new Cart_Apply_Controller();
$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$address = $_POST['address'] ?? '';
if ($name !== '' && $phone !== '' && $address !== '') {
    $verify = verify_data($name, $phone, $address);
    if ($verify) {
        $pageData = $cartPage->model->get_pageData();
        $fromCookie = unserialize($_COOKIE['order']);
        setcookie('order', 0, time()-100, '/');
        send_mail($name, $phone, $address, $pageData['goods_data'], $fromCookie);
        $cartPage->action_success($pageData);
    } else {
        $cartPage->action_error();
    }
} else {
    $cartPage->action_form();
}