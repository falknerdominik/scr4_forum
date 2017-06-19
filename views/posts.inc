<?php self::renderView('partials/header', $model) ?>
<main id="main">
    <div class="header">
        <h1><?php self::actionLink('Discussion', 'Index', 'Discussion', null, 'back-link'); ?> / <?php self::htmlOut($model['discussion']->getName()); ?></h1>
    </div>

    <div class="content">
        <p></p>
        <section class="center">
            <?php self::renderView('partials/searchBox', array(
                    'term' => $model['term']
            )); ?>
        </section>
        <section>
            <?php self::renderView('partials/postOverviewRow', array(
                'posts' => $model['posts'],
                'cssTitleBarClass' => 'post-title-bar',
                'cssTextClass' => 'post-text'
            )); ?>
        </section>
    </div>
</main>
<?php self::renderView('partials/footer', $model) ?>
