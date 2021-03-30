<?php
require_once ROOT . '/app/core/Controller.php';
Class Admin_Controller extends Controller
{
    public function __construct()
    {
        $this->model = new Admin_Model();
        $this->view = new View();
    }

    public function main()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/admin_main_view.php', $pageData);
    }

    public function logerror()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/admin_logerror_view.php', $pageData);
    }

    public function login ()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/admin_login_view.php', $pageData);
    }

    public function add_form ()
    {
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/admin_add_form_view.php', $pageData);
    }

    public function change_form ($id)
    {
        $pageData = $this->model->get_pageData();
        $pageData['id'] = $id;
        $this->view->generate(ROOT . '/app/views/admin_change_form_view.php', $pageData);
    }
}
