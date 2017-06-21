<div>
    <ul class="pagination">
        <?php foreach ($model['paginationArray'] as $page): ?>
            <!-- generate link for pagination -->
            <li><?php self::actionLink($page, 'Index', 'Discussion', array( 'pnr' => $page), '') ?></li>
        <?php endforeach; ?>
    </ul>
</div>