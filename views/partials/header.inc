<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- META viewport for mobile devices -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCR4 Book Shop</title>

    <!--  base CSS for purecss.io -->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
    <!--  base responsive gird system CSS for purecss.io -->
    <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css">

    <!-- custom css -->
    <link rel="stylesheet" href="css/forum.css">
    <link rel="stylesheet" href="css/side-menu.css">
    <link rel="stylesheet" href="css/notification.css">

</head>
<body>
<section id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <nav id="menu">
        <div class="pure-menu">
            <!--            <a class="pure-menu-heading" href="#">Forum</a>-->
            <?php self::actionLink('Forum', 'Index', 'Home', null, 'pure-menu-heading'); ?>

            <ul class="pure-menu-list">
                <li
                    class='pure-menu-item <?php self::$context->isCurrentController("Discussion") ? self::htmlOut('selected') : self::htmlOut(''); ?> '
                >
                    <?php self::actionLink('Discussions', 'Index', 'Discussion', null, 'pure-menu-link') ?>
                </li>

                <!-- check if user is logged in and generate Login / Profile link -->
                <?php if(self::$context->isUserLoggedIn()): ?>
                <li
                    class='pure-menu-item <?php self::$context->isCurrentController("Profile") ? self::htmlOut('selected') : self::htmlOut(''); ?> '
                >
                    <?php self::actionLink('Your Profile', 'Profile', 'User', null, 'pure-menu-link') ?>
                </li>
                <li>
                    <?php self::beginActionForm('LogOut', 'User', null, 'post', 'pure-form navbar-form'); ?>
                    <button class="pure-button">Log out</button>
                    <?php self::endactionForm(); ?>
                </li>
                <?php else: ?>
                <li
                    class='pure-menu-item <?php self::$context->isCurrentController("User") ? self::htmlOut('selected') : self::htmlOut(''); ?> '
                >
                    <?php self::actionLink('Login', 'LogIn', 'User', null, 'pure-menu-link') ?>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>


    <?php if(isset($model['errors'])) {
        self::renderView('partials/errors', $model['errors']);
    } ?>
