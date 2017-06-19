<?php self::renderView('partials/header', $model) ?>

<main id="main">
    <div class="header">
        <h1>Discussions</h1>
    </div>

    <div class="content">
        <p></p>
        <!-- discussions grid -->
        <section class="pure-g discussion-top-bar">
            <div class="pure-u-1 pure-u-md-1-2 discussion-top-bar-create">
                <?php self::renderView('partials/createDiscussionForm', null); ?>
            </div>
            <div class="pure-u-1 pure-u-md-1-2 discussion-top-bar-search">
                <?php self::renderView('partials/searchBox', null); ?>
            </div>
        </section>
        <?php if(sizeof($model['discussions']) > 0): ?>
        <section class="discussions">
            <?php self::renderView('partials/discussionOverviewRow', array(
                    'discussions' => $model['discussions'],
                    'cssGridClass' => 'discussion-grid',
                    'cssColumnClass' => 'discussion-row'
            )); ?>
        </section>
        <section class="center">
            <?php self::renderView('partials/pagination', array(
               'currentPage' => $model['currentPage'],
               'paginationArray' => $model['paginationArray']
            )); ?>
        </section>
        <?php else: ?>
        <section class="center">
            <?php self::renderView('partials/404', array(
                'message' => 'Sadly no discussion was found'
            )); ?>
        </section>
        <?php endif; ?>
    </div>
</main>

<?php self::renderView('partials/footer', $model) ?>
