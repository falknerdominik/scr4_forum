<?php
namespace Domain;

class Context {
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    public function isUserLoggedIn() {
        return ($this->user != null);
    }

    /**
     * @return mixed user if logged in or null
     */
    public function getUser() {
        return $this->user;
    }
}