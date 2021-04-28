<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/php/autoloader.php';
$registerForm = new Register_Controller();
if (isset($_POST['login']) &&
    isset($_POST['email']) &&
    isset($_POST['password'])) {
    Authorization::registration([
        'name' => $_POST['login'],
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);
    header('location: /login/');
    die();
} else {
    $registerForm->register_form();
}