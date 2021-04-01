<?php
require_once ROOT . '/app/core/Controller.php';
class Login_Controller extends Controller
{
    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    public function login_form ()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/login_view.php', $pageData);
    }

    public function logerror ()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/logerror_view.php', $pageData);
    }
}