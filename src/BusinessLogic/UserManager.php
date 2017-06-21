<?php

namespace BusinessLogic;

use DataLayer\DataLayerFactory;

class UserManager {

    static $datalayer = null;

    public static function init() {
        self::$datalayer = DataLayerFactory::getUserDataLayer();
    }

    public static function isUsernameTaken($username) {
        return self::$datalayer->isUsernameTaken($username);
    }

    public static function addUser($username, $password) {
        return self::$datalayer->addUser($username, $password);
    }

}

UserManager::init();
