<?php
require_once ROOT . '/app/core/JsonData.php';
class ApiJsonData extends JsonData
{
    public function __construct($file, $apiUrl)
    {
        parent::__construct($file);
        $this->api = new Api ($apiUrl);
    }
}