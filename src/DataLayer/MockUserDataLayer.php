<?php
namespace DataLayer;


use Domain\User;

class MockUserDataLayer implements UserDataLayer {
    private $__users;

    public function __construct() {
        $this->__users = array(
            1 => new User(1, "edwardelric"),
            2 => new User(2, 'theoneandonlyVegeta'),
            3 => new User(3, 'L'),
            4 => new User(4, 'lyssop'),
            5 => new User(5, 'kira'),
            6 => new User(6, '<script type="application/javascript">alert(":)");</script>'),
            7 => new User(7, 'anonymous'),
            8 => new User(8, 'onepunchman'),
            9 => new User(9, 'luffy'),
            10 => new User(10, 'goku'),
            11 => new User(11, '<narutoguy>')
        );
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

    public function isUsernameTaken($username) {
        $candidates = array_filter($this->__users, function($user) use($username) {
           return $user->getUsername() === $username;
        });

        return sizeof($candidates) !== 0;
    }

    public function addUser($username, $password) {
        // nothing to do
    }
}