<?php self::renderView('partials/header', $model) ?>
<main id="main">
    <div class="header">
        <h1><?php self::actionLink('Profile', 'Index', 'Discussion', null, 'back-link'); ?> / Your Posts</h1>
    </div>

    <div class="content">
        <p></p>
        <?php if(sizeof($model['posts']) > 0): ?>
            <section>
                <?php self::renderView('partials/postOverviewRow', array(
                    'posts' => $model['posts'],
                    'cssTitleBarClass' => 'post-title-bar',
                    'cssTextClass' => 'post-text'
                )); ?>
            </section>

        <?php else: ?>
            <?php self::renderView('partials/404', array(
                'message' => 'No posts found.'
            )); ?>
        <?php endif; ?>
    </div>
</main>
<?php self::renderView('partials/footer', $model) ?>
