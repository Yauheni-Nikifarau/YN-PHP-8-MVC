<?php
require_once ROOT . '/app/core/UserExt.php';
class User extends UserExt
{
    private $data = [];

    public function add($data)
    {
        $this->data['name'] = $data['name'];
        $this->data['email'] = $data['email'];
        $this->data['group'] = $data['group'];
        $this->data['phone'] = $data['phone'];
        $this->data['password'] = $data['password'];
    }

    public function edit($data)
    {
        if (isset($data['name'])) {
            $this->data['name'] = $data['name'];
        }
        if (isset($data['group'])) {
            $this->data['group'] = $data['group'];
        }
        if (isset($data['email'])) {
            $this->data['email'] = $data['email'];
        }
        if (isset($data['phone'])) {
            $this->data['phone'] = $data['phone'];
        }
        if (isset($data['password'])) {
            $this->data['password'] = $data['password'];
        }
    }

    public function get ()
    {
        return $this->data;
    }

    public function __construct ($name = '', $group = '', $email = '', $phone = '', $password = '') {
        $this->add([
            "name" => $name,
            "group" => $group,
            "email" => $email,
            "phone" => $phone,
            "password" => $password
        ]);
    }
}