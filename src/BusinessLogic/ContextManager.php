<?php

namespace BusinessLogic;

class ContextManager {
    private function __construct() { }

    public static function getInstance() {
        return new \Domain\Context(
            AuthenticationManager::getAuthenticatedUser(),
            PostManager::getLatestPost(),
           isset($_REQUEST['c']) ? $_REQUEST['c'] : null
        );
    }
}