<?php
namespace DataLayer;


use Domain\User;

class MockDataLayer implements DataLayer {
    private $__users;

    public function __construct() {
        $this->__users = array(1 => new User(1, "scr4"));
    }

    public function getUser($id) {
        return array_key_exists($id, $this->__users) ? $this->__users[$id] : null;
    }

    public function getUserForUsernameAndPassword($username, $password) {
        foreach ($this->__users as $u) {
            if($u->getUserName() == $username && $username == $password) {
                return $u;
            }
        }
        return null;
    }
}