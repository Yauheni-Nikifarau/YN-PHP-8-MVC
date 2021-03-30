<?php
include_once ROOT . '/app/core/Controller.php';
class Goods_Controller extends Controller
{
    public function __construct()
    {
        $this->model = new Goods_Model();
        $this->view = new View();
    }

    public function action()
    {   
        $pageData = $this->model->get_pageData();
        $this->view->generate(ROOT . '/app/views/goods_view.php', $pageData);
    }
}