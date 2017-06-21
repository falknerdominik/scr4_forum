<?php

namespace BusinessLogic;

use DataLayer\DataLayerFactory;

class UserManager {

    static $datalayer = null;

    public static function init() {
        self::$datalayer = DataLayerFactory::getUserDataLayer();
    }

    public static function isUsernameTaken($username) {
        self::$datalayer->isUsernameTaken($username);
    }

    public static function addUser($username, $password) {
        self::$datalayer->addUser($username, $password);
    }

}

UserManager::init();
