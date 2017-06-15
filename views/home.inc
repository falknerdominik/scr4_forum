<?php self::renderView('partials/header', $model) ?>

<main id="main">
    <div class="header">
        <h1>Home</h1>
    </div>

    <div class="content">
        <h2 class="content-subhead">Welcome to <b>the Forum</b></h2>
        <p>
            This is a forum site for everyone. You can read all the discussions and if you register you can even create new ones.
        </p>

        <h2 class="content-subhead">FH HAGENBERG</h2>
        <img class="pure-img-responsive" src="img/hagenberg.jpg" alt="FH Hagenberg Logo">
        <p>
            This forum was mainly created as an exercise for our SCR4 lecture. It is a simle forum for any discussion. Everyone can read the discussions but only somone who is logged in can create a new one.
        </p>
    </div>
</main>

<?php self::renderView('partials/footer', $model) ?>
