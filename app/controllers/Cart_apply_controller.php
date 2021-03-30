<?php
include_once ROOT . '/app/core/Controller.php';
class Cart_Apply_Controller extends Controller
{

    public function __construct() {
        $this->model = new Cart_Apply_Model();
        $this->view = new View();
    }

    public function action_form() {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/cart_form_view.php', $pageData);
    }

    public function action_success() {
        $this->view->generate(ROOT . '/app/views/cart_success_view.php');
    }

    public function action_error() {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/cart_error_view.php', $pageData);
    }
}