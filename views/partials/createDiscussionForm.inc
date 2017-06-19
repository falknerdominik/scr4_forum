<?php if(self::$context->getUser() !== null): ?>
<?php self::beginActionForm('Create', 'Discussion', null, 'post', 'pure-form') ?>
<fieldset>
        <input placeholder="Discussion Name" id="discussionName" name="name" required>
        <button type="submit" class="pure-button pure-button-primary">Create</button>
</fieldset>
<?php self::endActionForm(); ?>
<?php endif; ?>
