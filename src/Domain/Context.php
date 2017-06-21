<?php
namespace Domain;

class Context {
    private $user;
    private $currentController;
    private $lastPost;

    public function __construct($user, $lastPost, $currentController) {
        $this->user = $user;
        $this->currentController = $currentController;
        $this->lastPost = $lastPost;
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

    public function getLatestPost() {
        return $this->lastPost;
    }

    public function isCurrentController($controller) {
        return $this->currentController === $controller;
    }
}