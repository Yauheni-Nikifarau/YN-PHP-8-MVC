<div class="admin-control-panel">
    <a href="/admin/?action=add">добавить</a>
    <a href="/admin/?action=logout">Выйти</a>
</div>
<?php foreach ($goods_data as $id => $good) : ?>
<div class="admin-list-item">
    <h3 class="admin-list-title"><?= $good->title; ?></h3>
    <img src="<?= $good->image; ?>" alt="<?= $good->title; ?>" class="admin-list-image">
    <p class="admin-list-description"><?= $good->description; ?></p>
    <p class="admin-list-price">$<?= $good->price; ?></p>
    <a href="/admin/?action=change&change_id=<?= $id; ?>" class="admin-list-change">изменить</a>
    <a href="/admin/?action=delete&delete_id=<?= $id; ?>" class="admin-list-delete">удалить</a>
</div>
<?php endforeach; ?>


