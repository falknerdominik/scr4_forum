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
            'SELECT id, username FROM user WHERE id = ?',
            function($s) use ($id) {
                $s->bind_param('i', $id);
            }
        );

        $id = null; $username = null;
        $stat->bind_result($id, $username);
        while($stat->fetch()) {
            $user= new User($id, $username);
        }

        $stat->close();
        $con->close();
        return $user;
    }

    public function getUserForUsernameAndPassword($username, $password) {
        $user = null;
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'SELECT * FROM user WHERE `username` LIKE ?',
            function($s) use ($username) { $s->bind_param('s', $username); }
        );

        $id = null; $userName = null; $password_hash = null;
        $stat->bind_result($id, $userName, $password_hash);
        if($stat->fetch() && password_verify($password, $password_hash)) {
            $user = new User($id, $userName);
        }
        if($stat->fetch()) {
        }

        $stat->close();
        $con->close();
        return $user;
    }

    public function isUsernameTaken($username) {
        $user = null;
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'SELECT * FROM user WHERE username LIKE ?',
            function($s) use ($username) { $s->bind_param('s', $username); }
        );

        $stat->store_result();
        $selectedRows = $stat->num_rows;

        $stat->close();
        $con->close();
        return $selectedRows > 0;
    }

    public function addUser($username, $password) {
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'INSERT INTO user(username, password_hash) VALUES(?, ?)',
            function($s) use($username, $password) {
                $s->bind_param('ss', $username, password_hash($password, PASSWORD_DEFAULT));
            }
        );
        $userId = $stat->insert_id;
        return $userId;
    }
}