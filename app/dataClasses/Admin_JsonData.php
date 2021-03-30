<?php
require_once ROOT . '/app/core/JsonData.php';
class Admin_JsonData extends JsonData
{
    private $maxId;

    public function delete ($id) {
        $goods = $this->takeData();
        unset($goods->$id);
        $this->putData($goods);
    }

    public function add ($title, $description, $image, $price) {
        $goods = $this->takeData();
        $this->maxId = $this->get_maxId() + 1;
        $id = $this->maxId;
        $goods->$id = ['title' => $title,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'friendly_title' => toFriendlyUrl($title)
        ];
        $this->putData($goods);
    }

    public function change ($id, $title, $description, $image, $price) {
        $goods = $this->takeData();
        $goods->$id = ['title' => $title,
            'description' => $description,
            'image' => $image,
            'price' => $price,
            'friendly_title' => toFriendlyUrl($title)
        ];
        $this->putData($goods);
    }

    private function get_maxId () {
        $goods = $this->takeData();
        $index = -100;
        foreach ($goods as $id=>$good) {
            if ($id > $index) $index = $id;
        }
        return $index;
    }
}