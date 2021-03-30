<?php
function toFriendlyUrl ($name) {
    $name = trim($name);
    $name = mb_strtolower($name);
    $name = strtr($name, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d',
        'е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l',
        'м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u',
        'ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e',
        'ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'', ' '=>'_', '.'=>'', '/'=>'', '-'=>'', '–'=>''));
    return $name;
}

function verify_data ($name, $phone, $address) {
    $nameRegExp = '/^[а-яА-ЯёЁ]+$/ui';
    $phoneRegExp = '/^(?:\+375)(?:33|44|29|25)\d{7}$/ui';
    $addressRegExp = '/^[-., а-яА-ЯёЁ0-9]{5,250}$/ui';

    if (preg_match($nameRegExp, $name) &&
        preg_match($phoneRegExp, $phone) &&
        preg_match($addressRegExp, $address)) {
        return true;
    } else {
        return false;
    }
}

function send_mail($name, $phone, $address, $goodsData, $arrOrder) {
    $subject = 'Сообщение с сайта';
    $to  = "yauheninikifarau@gmail.com";
    $headers  = "Content-type: text/html; charset=utf-8 \r\n";
    $headers .= "From: Сообщение с сайта <nikeugene@mail.ru>\r\n";
    $headers .= "Reply-To: nikeugene@mail.ru\r\n";
    $message = "Заказчик: {$name}. Телефон: {$phone}. Адрес: {$address}. <br />Заказ:<br />";

    $commonSum = 0;
    foreach ($arrOrder as $id => $quantity) {
        $good = $goodsData->$id;
        $sum = $good->price * $quantity;
        $commonSum += $sum;
        $message .= str_pad($good->title, 50, '-', STR_PAD_RIGHT) . ". Количество: {$quantity}. Цена: \${$good->price}. Сумма: \${$sum}.<br />";
    }
    $message .= "Общая сумма: \${$commonSum}.";

    mail($to, $subject, $message, $headers);
    echo $message;
}

function check_authorization() {
    if (isset($_COOKIE['d688c4ccd7e20183b67f80d8816a2126']) &&
        $_COOKIE['d688c4ccd7e20183b67f80d8816a2126'] == 'b326b5062b2f0e69046810717534cb09') {
        return true;
    }
    return false;
}

function authorization_attempt ($login, $password)
{
    $users = json_decode(file_get_contents(ROOT . '/app/data/users.json'));
    foreach ($users as $user) {
        if ($user->login == md5($login) && password_verify($password, $user->password)) {
            setcookie('d688c4ccd7e20183b67f80d8816a2126', 'b326b5062b2f0e69046810717534cb09', time() + 600, '/');
            setcookie('ee11cbb19052e40b07aac0ca060c23ee', $user->group, time() + 600, '/');
            return true;
        }
    }
    return false;
}

function logout () {
    setcookie('d688c4ccd7e20183b67f80d8816a2126', '0', time()-60, '/');
    setcookie('ee11cbb19052e40b07aac0ca060c23ee', '0', time()-60, '/');
    header('location: /admin/');
}