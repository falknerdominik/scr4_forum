<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 6/10/2017
 * Time: 7:33 PM
 */

namespace BusinessLogic;

// TODO: Better name?
class Context {
    private static $context = null;

    private function __construct() { }

    public static function getInstance() {
        if(self::$context == null) {
            self::init_context();
        }
        return self::$context;
    }

    private static function init_context() {
        // add current user
        // TODO: referer
        self::$context = new \Domain\Context(
            AuthenticationManager::getAuthenticatedUser()
        );
    }
}