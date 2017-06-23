<?php

namespace BusinessLogic;

use DataLayer\DataLayerFactory;

class UserManager {

    public static function isUsernameTaken($username) {
        return DataLayerFactory::getUserDataLayer()->isUsernameTaken($username);
    }

    public static function addUser($username, $password) {
        return DataLayerFactory::getUserDataLayer()->addUser($username, $password);
    }

}
