<?php self::renderView('partials/header', $model) ?>
<main id="main">
    <div class="header">
        <h1><?php self::actionLink('Profile', 'Index', 'Discussion', null, 'back-link'); ?> / Your Posts</h1>
    </div>

    <div class="content">
        <p></p>
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
