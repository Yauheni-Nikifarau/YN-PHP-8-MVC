<?php
require_once ROOT . '/app/core/ApiJsonData.php';
class Goods_Data extends ApiJsonData
{
    public function updateData ()
    {
        $oldData = $this->takeData();
        $oldData = ($oldData !== false) ? $oldData : (object) [];
        $newData = $this->api->getJsonFromApi();
        foreach ($newData as $id => $data) {
            $oldData[$id] = $data;
        }
        $this->putData($oldData);
    }
}