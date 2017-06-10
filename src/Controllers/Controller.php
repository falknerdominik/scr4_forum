<?php

namespace Controllers;

use BusinessLogic\Context;
use MVC\MVC;
use MVC\ViewRenderer;

class Controller {
    /**
     * @param $id integer of the param
     * @return bool if param is set
     */
    public final function hasParam($id){
        return isset($_REQUEST[$id]);
    }

    /**
     * @param $id
     * @param null $defaultValue
     * @return string value if param not set or param if it is
     */
    public final function getParam($id, $defaultValue = null) {
        return isset($_REQUEST[$id]) ? $_REQUEST[$id] : $defaultValue;
    }

    /**
     * @param $view string path to viewfile
     * @param array $model data array used to fill model
     */
    public final function renderView($view, $model = array()) {
        ViewRenderer::renderView($view, $model);
    }

    /**
     * @param $url string to redirect to
     */
    public final function redirecttoUrl($url) {
        header("Location: $url");
    }

    /**
     * @param $action to execute
     * @param $controller to redirect to
     * @param null $params (GET) to add to link
     * @return string containing the action link
     */
    public final function buildActionLink($action, $controller, $params = null) {
        return MVC::buildActionLink($action, $controller, $params);
    }

    /**
     * redirects to a given action and controller
     * @param $action to execute
     * @param $controller to redirect to
     * @param null $params (GET) to set
     */
    public final function redirect($action, $controller, $params = null) {
        $this->redirecttoUrl($this->buildActionLink($action, $controller, $params));
    }
}