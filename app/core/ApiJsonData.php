<?php
require_once ROOT . '/app/core/JsonData.php';
require_once ROOT . '/app/core/Api.php';
class ApiJsonData extends JsonData
{
    public function __construct($file, $apiUrl)
    {
        parent::__construct($file);
        $this->api = new Api ($apiUrl);
    }
}