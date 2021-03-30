<?php
include_once ROOT . '/app/core/Model.php';
class Cart_Apply_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->pageData['title'] = "Apply";
        $this->pageData['order'] = [];
        if (isset($_COOKIE['order'])) {
            $this->arrOrder = unserialize($_COOKIE['order']);
        } else {
            $this->arrOrder = [];
        }
        $this->prepare_pageData();
    }

    private function prepare_pageData () {
        $this->pageData['orderQuantity'] = count($this->arrOrder);
        foreach ($this->pageData['goods_data'] as $id => $good) {
            if (isset($this->arrOrder[$id])) {
                $this->pageData['orderAmount'] += $this->arrOrder[$id] * $good->price;
                $this->pageData['order'][$id] = [
                    'title' => $good->title,
                    'image' => $good->image,
                    'sum' => $this->arrOrder[$id] * $good->price,
                    'quantity' => $this->arrOrder[$id],
                    'price' => $good->price
                ];
            }
        }
    }
}