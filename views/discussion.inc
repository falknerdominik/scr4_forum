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
        <section class="pagination">
            <?php self::renderView('partials/pagination', array(
               'currentPage' => $model['currentPage'],
               'paginationArray' => $model['paginationArray']
            )); ?>
        </section>
    </div>
</main>

<?php self::renderView('partials/footer', $model) ?>
