<?php foreach ($order as $id => $position) : ?>
    <div class="cart-position">
        <img src="<?= $position['image']; ?>" alt="<?= $position['title']; ?>" class="cart-position-image">
        <h3 class="cart-position-title"><?= $position['title']; ?></h3>
        <p>Количество: <?= $position['quantity']; ?></p>
        <p class="cart-position-sum">$<?= $position['sum']; ?></p>
    </div>
<?php endforeach; ?>
<form action="/cart/apply/" method="POST">
    <div class="applyOrder">
        <input type="text" name="name" placeholder="Name" class="applyOrder-name">
        <input type="text" name="phone" placeholder="Phone" class="applyOrder-phone">
        <textarea name="address" cols="30" rows="10" placeholder="Address" class="applyOrder-address"></textarea>
        <button name="cart-order" value="yes" class="applyOrder-button">Buy!</button>
    </div>
</form>
