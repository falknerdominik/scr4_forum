<?php foreach($model['discussions'] as $discussion): ?>
<div class="pure-g <?php self::htmlOut($model['cssGridClass']); ?>">
    <div class='pure-u-1 pure-u-md-2-3 '>
        <?php self::actionLink($discussion->getName(), 'Index', 'Discussion', array(
                'did' => $discussion->getId()
            ))
        ?>
    </div>
    <div class='pure-u-1  pure-u-md-1-3 '>
        <i>(created @ <?php self::htmlOut($discussion->getCreationDate()); ?>) - <?php self::htmlOut($discussion->getNrOfPosts()); ?> Posts</i>
    </div>
</div>
<?php endforeach; ?>
