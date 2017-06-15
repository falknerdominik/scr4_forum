<div>
    <ul>
        <?php foreach ($model['paginationArray'] as $page): ?>
            <!-- generate link for pagination -->
            <li><?php self::htmlOut($page); ?></li>
        <?php endforeach; ?>
    </ul>
</div>