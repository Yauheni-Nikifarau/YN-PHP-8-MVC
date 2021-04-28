<?php
session_start();
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/php/autoloader.php';

$adminPage = new Admin_Controller();

if ( ! check_authorization() && $_SESSION['group'] == 'admin') {
    header('location: /login/');
    die();
}



if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'delete':
            if (isset($_GET['delete_id'])) {
                GoodsDb::adminDeleteGood($_GET['delete_id']);
                header('location: /admin/');
            }
            break;
        case 'add':
            if (isset($_POST['title']) &&
                isset($_POST['description']) &&
                isset($_POST['image']) &&
                isset($_POST['price'])) {
                GoodsDb::adminAddGood($_POST['title'], $_POST['description'], $_POST['image'], $_POST['price']);
                header('location: /admin/');
            } else {
                $adminPage->add_form();
                die();
            }
            break;
        case 'change':
            if (isset($_GET['change_id']) &&
                isset($_POST['title']) &&
                isset($_POST['description']) &&
                isset($_POST['image']) &&
                isset($_POST['price'])) {
                GoodsDb::adminChangeGood($_GET['change_id'], $_POST['title'], $_POST['description'], $_POST['image'], $_POST['price']);
                header('location: /admin/');
            } elseif (isset($_GET['change_id'])) {
                $adminPage->change_form($_GET['change_id']);
                die();
            }
            break;
        case 'logout':
            logout();
            die();
            break;
    }
}

$adminPage->main();
