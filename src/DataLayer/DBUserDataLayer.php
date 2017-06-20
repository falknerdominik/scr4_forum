<?php
namespace DataLayer;


use Domain\User;

class DBUserDataLayer extends DBDataLayer implements UserDataLayer {

    public function __construct($server, $userName, $password, $database) {
        parent::__construct($server, $userName, $password, $database);
    }

    public function getUser($id) {
        $user = null;
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'SELECT * FROM user WHERE id = ?',
            function($s) use ($id) {
                $s->bind_param('i', $id);
            }
        );

        $id = null; $username = null;
        $stat->bind_result($id, $username, $title, $author, $price);
        while($stat->fetch()) {
            $user= new User($id, $username);
        }

        $stat->close();
        $con->close();
        return $user;
    }

    public function getUserForUsernameAndPassword($username, $password) {
    }

    public function isUsernameTaken($username) {
    }

    public function addUser($username, $password) {
    }
}