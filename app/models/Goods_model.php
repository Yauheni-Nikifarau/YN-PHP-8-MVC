<?php
include_once ROOT . '/app/core/Model.php';
class Goods_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
        $this->pageData['title'] = "Goods";
        if (isset($_COOKIE['order'])) {
            $this->arrOrder = unserialize($_COOKIE['order']);
        } else {
            $this->arrOrder = [];
        }
        $this->update_Order();
        $this->prepare_pageData();
    }

    private function update_Order () {
        if (isset($_POST['goodId'])) {
            if (!check_authorization()) {
                header("location: /login/");
                die();
            }
            if (!isset($this->arrOrder[$_POST['goodId']])) {
                $this->arrOrder[$_POST['goodId']] = 1;
            }
        }
        setcookie('order', serialize($this->arrOrder), time()+3600, '/');
    }

    private function prepare_pageData () {
        $this->pageData['orderQuantity'] = count($this->arrOrder);
        foreach ($this->pageData['goods_data'] as $id => $good) {
            if (isset($this->arrOrder[$id])) {
                $this->pageData['orderAmount'] += $this->arrOrder[$id] * $good['price'];
            }
        }
    }
}