<?php self::renderView('partials/header', $model) ?>

<main id="main">
    <div class="header">
        <h1>Discussions</h1>
    </div>

    <div class="content">
        <p></p>
        <!-- discussions grid -->
        <section class="discussions">
            <?php self::renderView('partials/discussionOverviewRow', array(
                    'discussions' => $model['discussions'],
                    'cssGridClass' => 'discussion-grid',
                    'cssColumnClass' => 'discussion-row'
            )); ?>
        </section>
    </div>
</main>


<!--<div class="container">-->
<!--    <h1>Home</h1>-->
<!--    <p>--><?php //self::htmlOut($model['message']); ?><!--</p>-->
<!--    --><?php //if(self::$context->isUserLoggedIn()): ?>
<!--        <h1>Logged In!</h1>-->
<!--    --><?php //else: ?>
<!--        <h1>Logged out!</h1>-->
<!--    --><?php //endif; ?>
<!--</div>-->

<?php self::renderView('partials/footer', $model) ?>
