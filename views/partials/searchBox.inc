<?php self::beginActionForm('Search', 'Discussion', null, 'get', 'pure-form') ?>
<fieldset>
    <input placeholder="Searchterm" name="term" required value="<?php self::htmlOut($model['term']); ?>">
    <button type="submit" class="pure-button pure-button-primary">Search</button>
</fieldset>
<?php self::endActionForm(); ?>
