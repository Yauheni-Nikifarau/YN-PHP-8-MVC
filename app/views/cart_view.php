<form action="/cart/" method="POST">
    <?php foreach ($order as $id => $position) : ?>
        <div class="cart-position">
            <img src="<?= $position['image']; ?>" alt="<?= $position['title']; ?>" class="cart-position-image">
            <h3 class="cart-position-title"><?= $position['title']; ?></h3>
            <input type="number" min="0" name="<?= $id; ?>" value="<?= $position['quantity']; ?>" class="cart-position-input">
            <p class="cart-position-sum">$<?= $position['sum']; ?></p>
            <button name="<?= $id; ?>" value="0" class="cart-position-delete">Delete</button>
        </div>
    <?php endforeach; ?>
    <button class="cart-update">Применить изменения</button>
    <p class="empty-cart">Ваша корзина пуста</p>
    <p class="cart-warning">Перед началом оформления заказа убедитесь, что вы приняли последние изменения в заказ.</p>
    <a href="/cart/apply/" class="cart-apply">Перейти к оформлению заказа</a>
</form>

