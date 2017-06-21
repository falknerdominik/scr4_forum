<?php self::renderView('partials/header', $model) ?>

<main id="main">
    <div class="header">
        <h1>Login / Register</h1>
    </div>
    <div class="content">
        <?php self::renderView('partials/loginRegisterForm', $model) ?>
    </div>
</main>

<?php self::renderView('partials/footer', $model) ?>
