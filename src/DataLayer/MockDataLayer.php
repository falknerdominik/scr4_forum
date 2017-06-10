<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 6/10/2017
 * Time: 12:51 PM
 */

namespace DataLayer;


class MockDataLayer implements DataLayer {

    public function getUser($id) {
        return null;
    }

    public function getUserForUsernameAndPassword($username, $password) {
        return null;
    }
}