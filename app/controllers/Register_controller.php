<?php
require_once ROOT . '/app/core/Controller.php';
class Register_Controller extends Controller
{
    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    public function register_form ()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/register_view.php', $pageData);
    }

    public function register_error ()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/register_error_view.php', $pageData);
    }
}