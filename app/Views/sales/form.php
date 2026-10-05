<?= $this->include('layout/header') ?>

<form method="post" action="<?= site_url('sales') ?>">
    <?= csrf_field() ?>

    <label for="product_id">Product</label>
    <select id="product_id" name="product_id" required>
        <option value="">Select product</option>

        <?php foreach ($products as $product): ?>
            <option
                value="<?= esc($product['id']) ?>"
                <?= old('product_id') == $product['id'] ? 'selected' : '' ?>
            >
                <?= esc($product['name']) ?>
                — ₱<?= number_format($product['price'], 2) ?>
                (stock: <?= esc($product['stock_quantity']) ?>)
            </option>
        <?php endforeach ?>
    </select>

    <label for="customer_id">Customer (optional)</label>
    <select id="customer_id" name="customer_id">
        <option value="">Walk-in customer</option>

        <?php foreach ($customers as $customer): ?>
            <option
                value="<?= esc($customer['id']) ?>"
                <?= old('customer_id') == $customer['id'] ? 'selected' : '' ?>
            >
                <?= esc($customer['full_name']) ?>
            </option>
        <?php endforeach ?>
    </select>

    <label for="quantity">Quantity</label>
    <input
        type="number"
        id="quantity"
        name="quantity"
        min="1"
        value="<?= old('quantity', 1) ?>"
        required
    >

    <button class="btn" type="submit">Record Sale</button>
</form>

<?= $this->include('layout/footer') ?>