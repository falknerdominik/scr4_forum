<?php
namespace Domain;

class Context {
    private $user;
    private $currentController;

    public function __construct($user, $currentController) {
        $this->user = $user;
        $this->currentController = $currentController;
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

    public function isCurrentController($controller) {
        return $this->currentController === $controller;
    }
}