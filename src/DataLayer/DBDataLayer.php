<?php

namespace DataLayer;

protected class DBDataLayer {

    private $server;
    private $userName;
    private $password;
    private $database;

    protected function __construct($server, $userName, $password, $database) {
        $this->server = $server;
        $this->userName = $userName;
        $this->password = $password;
        $this->database = $database;
    }

    private function getConnection() {
        // \ -> because we want global namespace
        $con = new \mysqli($this->server, $this->userName, $this->password, $this->database);
        if(!$con) {
            die('Unable to connect to database. ERROR: ' . mysqli_connect_errno());
        }
        return $con;
    }

    private function executeQuery($connection, $query) {
        $result = $connection->query($query);
        if(!$result) {
            die("Error in query '$query': " . $connection->error);
        }
        return $result;
    }

    private function executeStatement($connection, $query, $bindFunc) {
        $statement = $connection->prepare($query);
        if(!$statement) {
            die("Error in statement '$query'");
        }

        $bindFunc($statement);
        if(!$statement->execute()) {
            die("Error executing statement '$query': " . $statement->errno);
        }

        return $statement;
    }
}