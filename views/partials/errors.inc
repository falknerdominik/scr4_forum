<div class="error">
    <b>Please correct the following errors: </b>
    <ul>
       <?php foreach($model as $error): ?>
           <li><?php self::htmlOut($error); ?></li>
       <?php endforeach; ?>
    </ul>
</div>