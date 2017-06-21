</section>
<footer>
    <?php if(self::$context->getLatestPost() != null): ?>
        <p>
        <?php self::htmlOut(self::$context->getLatestPost()->getCreator()->getUsername()); ?> posted at <?php self::htmlOut(self::$context->getLatestPost()->getCreationDate()); ?>
        </p>
    <?php endif; ?>
</footer>
<!-- custom js -->
<script src="js/sidebar.js"></script>
<script src="js/forum.js"></script>
</body>
</html>
