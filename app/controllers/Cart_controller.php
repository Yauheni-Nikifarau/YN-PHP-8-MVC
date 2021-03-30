<?php
include_once ROOT . '/app/core/Controller.php';
class Cart_Controller extends Controller
{
    public function __construct() {
        $this->model = new Cart_Model();
        $this->view = new View();
    }

    public function action() {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/cart_view.php', $pageData);
    }
}