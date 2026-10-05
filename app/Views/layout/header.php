<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= esc($title ?? 'POS System') ?></title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>

<nav class="nav">
    <div class="nav-inner">
        <a class="brand" href="<?= site_url('dashboard') ?>">
            Blue<span>POS</span>
        </a>

        <div class="nav-links">
            <a href="<?= site_url('dashboard') ?>">Dashboard</a>
            <a href="<?= site_url('products') ?>">Products</a>
            <a href="<?= site_url('customers') ?>">Customers</a>
            <a href="<?= site_url('staff') ?>">Staff</a>
            <a href="<?= site_url('sales/new') ?>">Record Sale</a>
            <a href="<?= site_url('sales') ?>">Sales History</a>
            <a class="logout-link" href="<?= site_url('logout') ?>">Logout</a>
        </div>
    </div>
</nav>

<main class="wrap">
    <div class="page-heading">
        <span class="eyebrow">Point of Sale Management</span>
        <h1><?= esc($title ?? 'POS System') ?></h1>
    </div>

    <?php if (session('error')): ?>
        <div class="alert"><?= esc(session('error')) ?></div>
    <?php endif ?>

    <?php if (session('success')): ?>
        <div class="alert ok"><?= esc(session('success')) ?></div>
    <?php endif ?>

    <?php if (session('errors')): ?>
        <div class="alert">
            <?= implode('<br>', array_map('esc', session('errors'))) ?>
        </div>
    <?php endif ?>