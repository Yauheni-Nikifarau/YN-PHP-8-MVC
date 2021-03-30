<?php
require_once ROOT . '/app/dataClasses/Exc_rates_data.php';
require_once ROOT . '/app/dataClasses/Goods_data.php';
class Model
{
    protected $pageData;
    private $exc_api;
    private $goods_api;


    public function __construct()
    {
        $this->exc_api = new Exc_Rates_Data(ROOT . '/app/data/rates.json', 'https://www.nbrb.by/api/exrates/rates/145');
        $this->goods_api = new Goods_Data(ROOT . '/app/data/goods.json', 'https://fakestoreapi.herokuapp.com/products/category/electronics');
        $this->pageData = [
          "title" => '',
          "orderQuantity" => 0,
          "orderAmount" => 0,
          "exchange_rates" => $this->get_exchange_rates(),
          "goods_data" => $this->get_goods_data(),
          "user_name" => '',
          "user_group" => '',
        ];
    }

    public function get_pageData () {
        return $this->pageData;
    }

    private function get_exchange_rates () {
        if (!file_exists(ROOT . '/app/data/rates.json') || (time() - filemtime(ROOT . '/app/data/rates.json') > 600)) {
            $this->exc_api->updateData();
        }
        return $this->exc_api->takeData();
    }

    private function get_goods_data () {
        if (!file_exists(ROOT . '/app/data/goods.json') || (time() - filemtime(ROOT . '/app/data/goods.json') > 3600)) {
            $this->goods_api->updateData();
        }
        return $this->goods_api->takeData();
    }
}