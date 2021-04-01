<?php
extract($pageData);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?: 'Shop'; ?></title>
<link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<div class="site">
    <header class="header">
        <img src="/img/car_logo_PNG1649.png" alt="logo" class="logo">
        <nav class="navigation">
            <ul class="menu">
                <li class="menu-item"><a href="/" class="link <?= $title == 'Goods' ? 'active' : '';?>">Goods</a></li>
                <li class="menu-item"><a href="/cart" class="link <?= $title == 'Cart' ? 'active' : '';?>">Cart</a></li>
            </ul>
        </nav>
        <div class="header-cart">
            <img src="/img/shopping_cart_PNG38.png" alt="cart" class="header-cart-img">
            <p class="header-cart-quantity"><?= $orderQuantity; ?></p>
            <p class="header-cart-price">$<?= $orderAmount; ?></p>
        </div>
    </header>

<?php include_once $content_view; ?>

    <footer class="footer">
        <img src="/img/car_logo_PNG1649.png" alt="logo" class="logo">
        <div class="footer-contacts">
            <p class="footer-contact footer-address">street, city, address</p>
            <p class="footer-contact footer-phone">+1234567894654</p>
            <p class="footer-contact footer-email">mail@gmail.com</p>
        </div>
        <div class="footer-contacts">
            <p class="footer-contact">Курс доллара:</p>
            <p class="footer-contact"><?= "{$exchange_rates->Cur_Scale} {$exchange_rates->Cur_Abbreviation}: {$exchange_rates->Cur_OfficialRate} бел.руб";?></p>
            <a href="/login/">Войти</a>
        </div>
    </footer>
</div>
</body>
</html>
<?= $user_name . " group: " . $user_group;?>
<pre>
    <?php var_dump($_SESSION); ?>
</pre>
