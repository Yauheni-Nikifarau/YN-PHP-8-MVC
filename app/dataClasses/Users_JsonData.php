<?php
require_once ROOT . '/app/core/JsonData.php';
class Users_JsonData extends JsonData
{
    public function search_user ($email) {
        $data = $this->takeData();
        foreach ($data as $id => $user) {
            //$user = unserialize($user);
            if ($user->email == $email) {

                return $user;
            }
        }
        return false;
    }

    public function edit ($id, $name, $email, $phone, $password) {
        $data = $this->takeData();
        $user = unserialize($data[$id]);
        $user['name'] = $name;
        $user['email'] = $email;
        $user['phone'] = $phone;
        $user['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data[$id] = serialize($user);
        $this->putData($data);
    }

    public function add ($name, $email, $phone, $password) {
        $data = $this->takeData();
        foreach ($data as $user) {
            $user = unserialize($user);
            if ($user['email'] == $email || $user['phone'] == $phone) {
                return false;
            }
        }
        $newUser = [
            "name" => $name,
            "email" => $email,
            "phone" => $phone,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "group" => "user"
        ];
        array_push($data, $newUser);
        $this->putData($data);
        return true;
    }

    public function delete_user ($id) {
        if ($id == 1) {
            return false;
        }
        $data = $this->takeData();
        unset($data[$id]);
        $this->putData($data);
        return true;
    }

    public function make_moderator ($id) {
        $data = $this->takeData();
        $user = unserialize($data[$id]);
        $user['group'] = 'moderator';
        $data[$id] = serialize($user);
        $this->putData($data);
    }

    public function make_admin ($id) {
        $data = $this->takeData();
        $user = unserialize($data[$id]);
        $user['group'] = 'admin';
        $data[$id] = serialize($user);
        $this->putData($data);
    }

    public function get_all_users () {
        $data = $this->takeData();
        $data = array_map(function ($user) {
            return unserialize($user);
        }, $data);
        return $data;
    }

}