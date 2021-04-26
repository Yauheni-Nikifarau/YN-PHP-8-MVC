<?php


abstract class GoodsDb
{
    private static $connection;

    private function __construct() {}

    private static function getConnection () {
        if (empty(self::$connection)) {
            self::$connection = new mysqli('localhost', 'root', '', 'shop');
            if (self::$connection->connect_error) {
                die('Ошибка подключения (' . self::$connection->connect_errno . ') '
                    . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }

    public static function getGoodsData () {
        return self::getOptionedGoodsData(['id', 'title', 'description', 'price', 'image', 'friendly_title']);
    }

    public static function getOptionedGoodsData ($arSelect = [], $arFilter = [], $arOrder = [], $arLimit = []) {
        if ( ! empty($arSelect)) {
            $select = 'SELECT ' . implode(', ', $arSelect);
        } else {
            $select = 'SELECT *';
        }

        if ( ! empty($arFilter)) {
            $where = [];
            foreach ($arFilter as $field => $option) {
                $where[] = $field . ' = ' . $option;
            }
            $where = ' WHERE ' . implode('AND ', $where);
        } else {
            $where = '';
        }

        if ( ! empty($arOrder)) {
            $order = [];
            foreach ($arOrder as $field => $order) {
                $order[] = $field . ' ' . $order;
            }
            $order = ' ORDER BY ' . implode(', ', $order);
        } else {
            $order = '';
        }

        $offset = isset($arLimit['offset']) ? ' OFFSET ' . $arLimit['offset'] : '';
        $limit = isset($arLimit['limit']) ? ' LIMIT ' . $arLimit['limit'] : '';

        $sql = $select . ' FROM goods ' . $where . ' ' . $order . ' ' . $limit . ' ' . $offset;
        $db = self::getConnection();
        $res = $db->query($sql);
        $res = $res->fetch_all(MYSQLI_ASSOC);
        return $res;
    }

    public static function updateGoodsData () {
        $db   = self::getConnection();
        $api  = new Api('https://fakestoreapi.com/products/category/electronics');
        $json = $api->getJsonFromApi();
        foreach ($json as $k => $good) {
            $res = $db->query('
                SELECT *
                FROM goods
                WHERE id = ' . $good['id']);
            if ($res->fetch_row()) {
                $id = addslashes($good['id']);
                $title = addslashes($good['title']);
                $description = addslashes(($good['description']));
                $price = addslashes($good['price']);
                $image = addslashes($good['image']);
                $furl = addslashes(toFriendlyUrl($good['title']));
                $db->query("
                    UPDATE goods
                    SET title = '{$title}',
                        description = '{$description}',
                        price = {$price},
                        image = '{$image}',
                        friendly_title = '{$furl}'
                    WHERE id = {$id}");
            } else {
                $id = addslashes($good['id']);
                $title = addslashes($good['title']);
                $description = addslashes(($good['description']));
                $price = addslashes($good['price']);
                $image = addslashes($good['image']);
                $furl = addslashes(toFriendlyUrl($good['title']));
                $db->query("
                    INSERT INTO goods
                    (id, title, description, price, image, friendly_title)
                    VALUES ({$id}, '{$title}', '{$description}', {$price}, '{$image}', '{$furl}')");
            }
        }

    }

    public static function adminDeleteGood ($id) {
        $db   = self::getConnection();
        $db->query("DELETE FROM goods WHERE id = {$id}");
    }

    public static function adminAddGood ($title, $description, $image, $price) {
        $db   = self::getConnection();
        $title = addslashes($title);
        $description = addslashes($description);
        $image = addslashes($image);
        $price = addslashes($price);
        $furl = addslashes(toFriendlyUrl($title));
        $id = $db->query('SELECT MAX(id) FROM goods')->fetch_row();
        $id = (int) $id[0];
        $id += 1;
        $db->query("
                    INSERT INTO goods
                    (id, title, description, price, image, friendly_title)
                    VALUES ({$id}, '{$title}', '{$description}', {$price}, '{$image}', '{$furl}')");
    }

    public static function adminChangeGood ($id, $title, $description, $image, $price) {
        $db   = self::getConnection();
        $title = addslashes($title);
        $description = addslashes($description);
        $image = addslashes($image);
        $price = addslashes($price);
        $furl = addslashes(toFriendlyUrl($title));
        $id = addslashes($id);
        $db->query("
                    UPDATE goods
                    SET title = '{$title}',
                        description = '{$description}',
                        price = {$price},
                        image = '{$image}',
                        friendly_title = '{$furl}'
                    WHERE id = {$id}");
    }


}