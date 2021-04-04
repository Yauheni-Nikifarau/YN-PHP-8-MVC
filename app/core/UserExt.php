<?php
require_once ROOT . '/app/interfaces/UserI.php';
abstract class UserExt implements UserI
{
    abstract public function add ($data);

    abstract public function edit ($data);
}