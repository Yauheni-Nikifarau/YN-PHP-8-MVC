<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/controllers/Login_controller.php';
require_once ROOT . '/app/core/Model.php';
require_once ROOT . '/app/core/View.php';
require_once ROOT . '/app/core/Authorization.php';
require_once ROOT . '/app/core/User.php';
require_once ROOT . '/app/dataClasses/Users_JsonData.php';
$loginPage = new Login_Controller();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    Authorization::logout();
}

if (check_authorization()) {
    header('location: /');
    die();
} elseif (isset($_POST['login']) && isset($_POST['password'])) {
    if (Authorization::login($_POST['login'], $_POST['password'])) {
        header('location: /');
    } else {
        echo "111";
        $loginPage->logerror();
    }
} else {
    $loginPage->login_form();
}




