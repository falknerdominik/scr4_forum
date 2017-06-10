<?php self::renderView('partials/header', $model) ?>

<div class="container">
    <h1>Home</h1>
    <p><?php self::htmlOut($model['message']); ?></p>
</div>

<?php self::renderView('partials/footer', $model) ?>
