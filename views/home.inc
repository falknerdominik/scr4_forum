<?php self::renderView('partials/header', $model) ?>

<div class="container">
    <h1>Home</h1>
    <p><?php self::htmlOut($model['message']); ?></p>
    <?php if(self::$context->isUserLoggedIn()): ?>
        <h1>Logged In!</h1>
    <?php else: ?>
        <h1>Logged out!</h1>
    <?php endif; ?>
</div>

<?php self::renderView('partials/footer', $model) ?>
