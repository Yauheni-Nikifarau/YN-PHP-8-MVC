<?php
include_once ROOT . '/app/core/Model.php';
class Cart_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->pageData['title'] = "Cart";
        $this->pageData['order'] = [];
        if (isset($_COOKIE['order'])) {
            $this->arrOrder = unserialize($_COOKIE['order']);
        } else {
            $this->arrOrder = [];
        }
        $this->update_Order();
        $this->prepare_pageData();
    }

    private function update_Order () {
        foreach ($this->arrOrder as $id => $quantity) {
            $count = 0;
            if (isset($_POST[$id])) {
                if ($count == 0) {
                    header("location: {$_SERVER['REQUEST_URI']}");
                    $count++;
                }
                $this->arrOrder[$id] = $_POST[$id];
            }
        }
        $this->arrOrder = array_filter($this->arrOrder, function ($value) {
            return $value > 0;
        });
        setcookie('order', serialize($this->arrOrder), time()+3600, '/');
    }

    private function prepare_pageData () {
        $this->pageData['orderQuantity'] = count($this->arrOrder);
        foreach ($this->pageData['goods_data'] as $id => $good) {
            if (isset($this->arrOrder[$id])) {
                $this->pageData['orderAmount'] += $this->arrOrder[$id] * $good['price'];
                $this->pageData['order'][$id] = [
                    'title' => $good['title'],
                    'image' => $good['image'],
                    'sum' => $this->arrOrder[$id] * $good['price'],
                    'quantity' => $this->arrOrder[$id]
                ];
            }
        }
    }
}
