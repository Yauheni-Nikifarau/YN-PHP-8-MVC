<form action="/admin/?action=change&change_id=<?= $id; ?>" method="POST" class="change-add-form">
    <input type="text" name="title" placeholder="title" value="<?= $goods_data[$index]['title']; ?>" class="change-add-form-input">
    <input type="text" name="image" placeholder="image" value="<?= $goods_data[$index]['image']; ?>" class="change-add-form-input">
    <textarea type="text" name="description" placeholder="description" class="change-add-form-area"><?= $goods_data[$index]['description']; ?></textarea>
    <input type="text" name="price" placeholder="price" value="<?= $goods_data[$index]['price']; ?>" class="change-add-form-input">
    <button class="change-add-form-button">OK</button>
</form>
