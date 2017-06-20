<?php if(self::$context->getUser() !== null): ?>
    <?php self::beginActionForm('Create', 'Post', array('did' => $model['discussion']->getId()), 'post', 'pure-form post-create-form') ?>
    <fieldset class="pure-group">
        <textarea placeholder="Please type your post here"  class="pure-input-1" name="text" required></textarea>
        <button type="submit" class="pure-input-1 pure-button pure-button-primary">Send</button>
    </fieldset>
    <?php self::endActionForm(); ?>
<?php endif; ?>
