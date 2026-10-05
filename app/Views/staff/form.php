<?php
$isEdit = ! empty($staffMember);
$action = $isEdit
    ? site_url('staff/' . $staffMember['id'])
    : site_url('staff');
?>

<?= $this->include('layout/header') ?>

<form
    method="post"
    action="<?= esc($action) ?>"
    enctype="multipart/form-data"
>
    <?= csrf_field() ?>

    <label for="username">Username</label>
    <input
        type="text"
        id="username"
        name="username"
        value="<?= esc(old(
            'username',
            $staffMember['username'] ?? ''
        )) ?>"
        required
    >

    <label for="full_name">Full name</label>
    <input
        type="text"
        id="full_name"
        name="full_name"
        value="<?= esc(old(
            'full_name',
            $staffMember['full_name'] ?? ''
        )) ?>"
        required
    >

    <label for="password">
        Password
        <?= $isEdit ? '(leave blank to keep current)' : '' ?>
    </label>
    <input
        type="password"
        id="password"
        name="password"
        <?= $isEdit ? '' : 'required' ?>
    >

    <label for="avatar">Avatar</label>
    <input
        type="file"
        id="avatar"
        name="avatar"
        accept="image/png,image/jpeg,image/webp"
    >

    <?php if ($isEdit && ! empty($staffMember['avatar'])): ?>
        <p>
            <strong>Current avatar:</strong><br>
            <img
                class="thumb"
                src="<?= base_url(
                    'uploads/avatars/' . $staffMember['avatar']
                ) ?>"
                alt="<?= esc($staffMember['full_name']) ?>"
            >
        </p>
    <?php endif ?>

    <button class="btn" type="submit">
        <?= $isEdit ? 'Update Staff' : 'Add Staff' ?>
    </button>
</form>

<?= $this->include('layout/footer') ?>