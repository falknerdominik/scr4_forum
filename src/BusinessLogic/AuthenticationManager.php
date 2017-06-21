<?php

namespace BusinessLogic;

use \DataLayer\DataLayerFactory;

final class AuthenticationManager {
    private function __construct() { }

    const SESSION_USER_ID = 'userId';

    public static function authenticate($username, $password) {
        $user = DataLayerFactory::getUserDataLayer()->getUserForUsernameAndPassword($username, $password);
        if($user != null) {
            Session::storeValue(self::SESSION_USER_ID, $user->getId());
            return true;
        }
        self::signOut();
        return false;
    }

    public static function isCurrentlyLoggedIn($userId) {
        if(!self::isAuthenticated()) {
            return false;
        }
        return self::getAuthenticatedUser()->getId() === $userId;
    }

    public static function signOut() {
        Session::deleteValue(self::SESSION_USER_ID);
    }

    public static function isAuthenticated() {
        return Session::hasValue(self::SESSION_USER_ID);
    }

    public static function getAuthenticatedUser() {
        return self::isAuthenticated() ? DataLayerFactory::getUserDataLayer()->getUser(Session::getValue(self::SESSION_USER_ID)) : null;
    }
}