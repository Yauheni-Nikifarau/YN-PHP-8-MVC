<?php foreach ($goods_data as $id => $good) :  //Тут массив с одним элементов, но используется foreach, чтобы получить доступ к ключу?>
<h2 class="product-title"><?= $good['title']; ?></h2>
<img src="<?= $good['image']; ?>" alt="<?= $good['title']; ?>" class="product-image">
<p class="product-description"><?= $good['description']; ?></p>
<p class="product-price">Price: $<?= $good['price']; ?></p>
<form action="/product/<?= $good['friendly_title']; ?>" method="POST">
    <button name="goodId" value="<?= $id; ?>" class="product-buy-button">Add to cart</button>
</form>
<?php endforeach; ?>
