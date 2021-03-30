<?php
include_once ROOT . '/app/core/Model.php';
class Admin_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->pageData['title'] = "Admin";
    }
}
