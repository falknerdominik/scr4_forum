<?php
namespace Domain;

class User extends Entity {
    private $username_;

    /**
     * User constructor.
     * @param $id of the user
     * @param $username for the user
     */
    public function __construct($id, $username) {
        parent::__construct($id);
        $this->username_ = $username;
    }

    public function getUsername() {
        return $this->username_;
    }

    public function setUsername($username) {
        $this->username_ = $username;
    }
}