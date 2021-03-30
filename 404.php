<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageData['title'] ?? 'Shop'; ?></title>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body>
<div class="site">
    <header class="header">
        <img src="/img/car_logo_PNG1649.png" alt="logo" class="logo">
        <nav class="navigation">
            <ul class="menu">
                <li class="menu-item"><a href="/" class="link <?= $pageData['title'] == 'Goods' ? 'active' : '';?>">Goods</a></li>
                <li class="menu-item"><a href="/cart" class="link <?= $pageData['title'] == 'Cart' ? 'active' : '';?>">Cart</a></li>
            </ul>
        </nav>
        <div class="header-cart">
            <img src="/img/shopping_cart_PNG38.png" alt="cart" class="header-cart-img">
            <p class="header-cart-quantity"><?= $pageData['orderQuantity'] ?? 0; ?></p>
            <p class="header-cart-price">$<?= $pageData['orderAmount'] ?? 0; ?></p>
        </div>
    </header>

    <div class="page404">
        <h2>404</h2>
        <p>Страница не найдена</p>
    </div>

    <footer class="footer">
        <img src="/img/car_logo_PNG1649.png" alt="logo" class="logo">
        <div class="footer-contacts">
            <p class="footer-contact footer-address">street, city, address</p>
            <p class="footer-contact footer-phone">+1234567894654</p>
            <p class="footer-contact footer-email">mail@gmail.com</p>
        </div>
    </footer>
</div>
</body>
</html>
<pre>
<?php print_r($_SERVER); ?></pre>