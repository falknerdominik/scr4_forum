<?php self::renderView('partials/header', $model) ?>
<main id="main">
    <div class="header">
        <h1><?php self::actionLink('Discussion', 'Index', 'Discussion', null, 'back-link'); ?> / <?php self::htmlOut($model['discussion']->getName()); ?></h1>
    </div>

    <div class="content">
        <p></p>
        <section class="pure-g discussion-top-bar">
            <div class="pure-u-1 pure-u-md-1-2 discussion-top-bar-left">
                <?php if(self::$context->isUserLoggedIn() && $model['discussion']->getCreator()->getId() == self::$context->getUser()->getId()): ?>
                    <?php self::beginActionForm('Delete', 'Discussion', array( 'did' => $model['discussion']->getId() ), 'post', 'pure-form'); ?>
                        <fieldset>
                            <button type="submit" class="pure-button button-warning">Delete Discussion</button>
                        </fieldset>
                    <?php self::endActionForm(); ?>
                <?php endif; ?>
            </div>

            <div class="pure-u-1 pure-u-md-1-2 discussion-top-bar-right">
                <?php self::renderView('partials/searchBox', array(
                        'term' => $model['term']
                )); ?>
            </div>
        </section>
        <section>
            <?php self::renderView('partials/postOverviewRow', array(
                'posts' => $model['posts'],
                'cssTitleBarClass' => 'post-title-bar',
                'cssTextClass' => 'post-text'
            )); ?>
        </section>
        <section>
            <?php self::renderView('partials/createPostForm', array(
                    'discussion' => $model['discussion']
            )); ?>
        </section>
    </div>
</main>
<?php self::renderView('partials/footer', $model) ?>
