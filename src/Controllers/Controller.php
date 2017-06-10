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

    public final function redirecttoUrl($url) {
        header("Location: $url");
    }

    public final function buildActionLink($action, $controller, $params = null) {
        return MVC::buildActionLink($action, $controller, $params);
    }

    public final function redirect($action, $controller, $params = null) {
        $this->redirecttoUrl($this->buildActionLink($action, $controller, $params));
    }

    // TODO more helper functions here later
}