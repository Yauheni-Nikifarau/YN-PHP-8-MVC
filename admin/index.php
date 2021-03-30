<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
require_once ROOT . '/app/php/functions.php';
require_once ROOT . '/app/controllers/Admin_controller.php';
require_once ROOT . '/app/models/Admin_model.php';
require_once ROOT . '/app/core/View.php';
require_once ROOT . '/app/dataClasses/Admin_JsonData.php';
$adminPage = new Admin_Controller();

if (!check_authorization()) {
    if (isset($_POST['login']) && isset($_POST['password'])) {
        if (!authorization_attempt ($_POST['login'], $_POST['password'])) {
            $adminPage->logerror();
            die();
        }
    } else {
        $adminPage->login();
        die();
    }
}



if (isset($_GET['action'])) {
    $adminDatabase = new Admin_JsonData(ROOT . '/app/data/goods.json');
    switch ($_GET['action']) {
        case 'delete':
            if (isset($_GET['delete_id'])) {
                $adminDatabase->delete($_GET['delete_id']);
                header('location: /admin/');
            }
            break;
        case 'add':
            if (isset($_POST['title']) &&
                isset($_POST['description']) &&
                isset($_POST['image']) &&
                isset($_POST['price'])) {
                $adminDatabase->add($_POST['title'], $_POST['description'], $_POST['image'], $_POST['price']);
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
                $adminDatabase->change($_GET['change_id'], $_POST['title'], $_POST['description'], $_POST['image'], $_POST['price']);
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