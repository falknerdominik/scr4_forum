<?php

namespace MVC;

final class MVC {
    private function __construct() { }

    const PARAM_CONTROLLER = 'c';
    const PARAM_ACTION = 'a';

    const DEFAULT_CONTROLLER = 'Home';
    const DEFUALT_ACTION = 'Index';

    const CONTROLLER_NAMESPACE = '\\Controllers';

    /**
     * @return string the path to the views
     */
    public static function getViewPath() { return 'views'; }

    /**
     * handles a given request by using the controller and action params. By default it
     * redirects it back to the home page with the index action
     */
    public static function handleRequest() {
        // determine controller class
        $controllerName = isset($_REQUEST[self::PARAM_CONTROLLER]) ? $_REQUEST[self::PARAM_CONTROLLER] : self::DEFAULT_CONTROLLER;
        $controller = self::CONTROLLER_NAMESPACE . "\\$controllerName";

        // determine HTTP method an daction
        $methodName = $_SERVER['REQUEST_METHOD'];
        $action = isset($_REQUEST[self::PARAM_ACTION]) ? $_REQUEST[self::PARAM_ACTION] : self::DEFUALT_ACTION;

        // get method name in instance (always method (get, post) and action
        $m = $methodName . '_' . $action;

        // instantiate controller and call according action method
        (new $controller)->$m();
    }


    /**
     * builds the needed params for a link url encoded
     * @param $action of controller
     * @param $controller to target
     * @param $params to append at the end
     * @return string params of
     */
    public static function buildActionLink($action, $controller, $params) {
        $res = '?' . self::PARAM_CONTROLLER . '=' . rawurlencode($controller) . '&'
                    . self::PARAM_ACTION . '=' . rawurlencode($action);

        if(is_array($params)) {
            foreach ($params as $name => $value) {
                $res .= '&' . rawurlencode($name) . '=' . rawurlencode($value);

            }
        }

        return $res;
    }
}