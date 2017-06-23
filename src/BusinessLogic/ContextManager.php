<?php

namespace BusinessLogic;

class ContextManager {
    private static $context = null;

    private function __construct() { }

    public function getInstance() {
        return new \Domain\Context(
            AuthenticationManager::getAuthenticatedUser(),
            PostManager::getLatestPost(),
           isset($_REQUEST['c']) ? $_REQUEST['c'] : null
        );
    }
}