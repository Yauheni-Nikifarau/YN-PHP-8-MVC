<?php
require_once ROOT . '/app/core/ApiJsonData.php';
class Exc_Rates_Data extends ApiJsonData
{
    public function updateData ()
    {
        $data = $this->api->getJsonFromApi();
        $this->putData($data);
    }
}