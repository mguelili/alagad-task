<?php
$isEdit = ! empty($product);
$action = $isEdit
    ? site_url('products/' . $product['id'])
    : site_url('products');
?>

<?= $this->include('layout/header') ?>

<form
    method="post"
    action="<?= esc($action) ?>"
    enctype="multipart/form-data"
>
    <?= csrf_field() ?>

    <label for="name">Name</label>
    <input
        type="text"
        id="name"
        name="name"
        value="<?= esc(old('name', $product['name'] ?? '')) ?>"
        required
    >

    <label for="price">Price</label>
    <input
        type="number"
        id="price"
        name="price"
        min="0"
        step="0.01"
        value="<?= esc(old('price', $product['price'] ?? '')) ?>"
        required
    >

    <label for="stock_quantity">Stock quantity</label>
    <input
        type="number"
        id="stock_quantity"
        name="stock_quantity"
        min="0"
        value="<?= esc(old(
            'stock_quantity',
            $product['stock_quantity'] ?? 0
        )) ?>"
        required
    >

    <label for="image">Product image</label>
    <input
        type="file"
        id="image"
        name="image"
        accept="image/png,image/jpeg,image/webp"
    >

    <?php if ($isEdit && ! empty($product['image'])): ?>
        <p>
            <strong>Current image:</strong><br>
            <img
                class="thumb"
                src="<?= base_url(
                    'uploads/products/' . $product['image']
                ) ?>"
                alt="<?= esc($product['name']) ?>"
            >
        </p>
    <?php endif ?>

    <button class="btn" type="submit">
        <?= $isEdit ? 'Update Product' : 'Add Product' ?>
    </button>
</form>

<?= $this->include('layout/footer') ?>