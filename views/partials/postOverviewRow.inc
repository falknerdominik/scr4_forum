<?php foreach($model['posts'] as $post): ?>

<div id="post_<?php self::htmlOut($post->getId()); ?>" class="pure-g <?php self::htmlOut($model['cssTitleBarClass']); ?>">
    <div class='pure-u-1 pure-u-md-4-5 '>
        <b>created by <?php self::htmlOut($post->getCreator()->getUsername()); ?> @ <?php self::htmlOut($post->getCreationDate()); ?> <?php
            self::actionLinkWithAnchor('(link)', 'Detail', 'Post', array(
                'did' => $post->getDiscussionId()
            ), 'post_' . $post->getId()); ?></b>
    </div>
    <div class='pure-u-md-1-5 '>
        <?php if(self::$context->isUserLoggedIn() && $post->getCreator()->getId() === self::$context->getUser()->getId()) {
            self::beginActionForm('Delete', 'Post', null, 'post');
        ?>
            <input type="hidden" name="pid" value="<?php self::htmlOut($post->getId()); ?>">
            <input class="pure-button button-xsmall button-warning" type="submit" value="delete">
        <?php
            self::endActionForm('Delete', 'Discussion', null, 'post');
        } ?>
    </div>
</div>
<!-- text -->
<div class="pure-g <?php self::htmlOut($model['cssTextClass']); ?>">
    <div class='pure-u-1 pure-u-md-2-3 '>
        <?php self::htmlOut($post->getText()); ?>
    </div>
</div>
<?php endforeach; ?>
