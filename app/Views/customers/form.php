<?php
$isEdit = ! empty($customer);
$action = $isEdit
    ? site_url('customers/' . $customer['id'])
    : site_url('customers');
?>

<?= $this->include('layout/header') ?>

<form method="post" action="<?= esc($action) ?>">
    <?= csrf_field() ?>

    <label for="full_name">Full name</label>
    <input
        type="text"
        id="full_name"
        name="full_name"
        value="<?= esc(old('full_name', $customer['full_name'] ?? '')) ?>"
        required
    >

    <label for="email">Email</label>
    <input
        type="email"
        id="email"
        name="email"
        value="<?= esc(old('email', $customer['email'] ?? '')) ?>"
        required
    >

    <label for="phone">Phone</label>
    <input
        type="text"
        id="phone"
        name="phone"
        value="<?= esc(old('phone', $customer['phone'] ?? '')) ?>"
    >

    <button class="btn" type="submit">
        <?= $isEdit ? 'Update Customer' : 'Add Customer' ?>
    </button>
</form>

<?= $this->include('layout/footer') ?>