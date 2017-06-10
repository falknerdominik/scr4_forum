<?php
spl_autoload_register(function($class) {
    // A\B\C\D --> C:/xampp/htdocs/bookshop/src/A/B/C/D.php
    $file = __DIR__ . "/src/" . str_replace("\\", '/', $class) . ".php";

    if(file_exists($file)) {
        /** @noinspection PhpIncludeInspection */
        require_once($file);
    }
});

// handle request (routing)
\MVC\MVC::handleRequest();
