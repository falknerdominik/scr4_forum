<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 5/5/2017
 * Time: 3:37 PM
 */

namespace DataLayer;


interface UserDataLayer {
    public function getUser($id);
    public function getUserForUsernameAndPassword($username, $password);
}