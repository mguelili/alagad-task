<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BluePOS Login</title>

    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body class="login-page">

<div class="login-shell">
    <section class="login-brand-panel">
        <div>
            <span class="login-badge">Point-of-Sale System</span>

            <h1>Welcome to<br><strong>BluePOS</strong></h1>

            <p>
                Manage products, customers, staff, inventory,
                and sales from one secure workspace.
            </p>
        </div>

        <small>Fast. Organized. Reliable.</small>
    </section>

    <section class="login-form-panel">
        <form class="login-box" method="post" action="<?= site_url('login') ?>">
            <div class="login-heading">
                <span class="eyebrow">Staff Access</span>
                <h2>Sign in to your account</h2>
                <p>Enter your staff credentials to continue.</p>
            </div>

            <?php if (session('error')): ?>
                <div class="alert">
                    <?= esc(session('error')) ?>
                </div>
            <?php endif ?>

            <label for="username">Username</label>
            <input
                type="text"
                id="username"
                name="username"
                value="<?= old('username') ?>"
                autocomplete="username"
                placeholder="Enter your username"
                required
                autofocus
            >

            <label for="password">Password</label>
            <input
                type="password"
                id="password"
                name="password"
                autocomplete="current-password"
                placeholder="Enter your password"
                required
            >

            <button class="login-button" type="submit">
                Sign In
            </button>

            <p class="login-note">
                Authorized staff members only
            </p>
        </form>
    </section>
</div>

</body>
</html>