<?php
require_once ROOT . '/app/core/Controller.php';
class Product_Controller extends Controller
{
    public function __construct()
    {
        $this->model = new Product_Model();
        $this->view = new View();
    }

    public function action()
    {
        $pageData = $this->model->get_pageData();
        $template = ROOT . '/app/views/404_view.php';
        if (isset($_GET['friendly_url'])) {
            foreach ($pageData['goods_data'] as $id => $good) {
                if ($good['friendly_title'] == $_GET['friendly_url']) {
                    $template = ROOT . '/app/views/product_view.php';
                    $pageData['goods_data'] = [$id => $pageData['goods_data'][$id]];
                    $pageData['title'] = $pageData['goods_data'][$id]['title'];
                    break;
                }
            }
        }
        $this->view->generate($template, $pageData);
    }
}
