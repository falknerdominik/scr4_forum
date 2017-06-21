<h2></h2>
<p>If you are already register please enter your data here. Otherwise please check the register box and fill in your new account information.</p>
<?php self::beginActionForm('Submit', 'User', null, 'post', 'pure-form pure-form-aligned') ?>
<fieldset>
    <div class="pure-control-group">
        <label for="login" class="pure-radio">Login</label>
        <input id="login" name="type" type="radio" value="login" checked>
        <label for="register" class="pure-radio">Register</label>
        <input id="register" name="type" type="radio" value="register">
    </div>
    <div class="pure-control-group">
        <label for="username">User Name</label>
        <input placeholder="Username" id="username" name="un" value="<?php self::htmlOut($model['username']); ?>" required>
    </div>
    <div class="pure-control-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="pwd" value="" required>
    </div>
    <div class="pure-controls">
        <button type="submit" class="pure-button pure-button-primary">Submit</button>
    </div>
</fieldset>
<?php self::endActionForm(); ?>
