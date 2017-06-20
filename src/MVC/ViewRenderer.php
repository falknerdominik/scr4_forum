<?php
namespace MVC;

use BusinessLogic\Context;

class ViewRenderer {
    public static $context;

    public static function renderView($view, $model) {
        self::$context = Context::getInstance();
        require(MVC::getViewPath() . "/$view.inc");
    }

    // Helper Methods for View

    private static function htmlOut($string) {
        // TODO improve this late
        echo(htmlentities($string));
    }

    private static function actionLink($content, $action, $controller, $params = null, $cssClass = null) {
        $cc = $cssClass != null ? " class=\"$cssClass\"" : "";
        $url = MVC::buildActionLink($action, $controller, $params);
        $link = <<<LINK
        <a href="$url"$cc>
LINK;
        
        echo($link);
        self::htmlOut($content);
        echo('</a>');

    }

    private static function actionLinkWithAnchor($content, $action, $controller, $params = null, $anchor = null, $cssClass = null) {
        $cc = $cssClass != null ? " class=\"$cssClass\"" : "";
        $url = MVC::buildActionLink($action, $controller, $params);

        // add anchor
        if($anchor != null) {
            $url .= '#' . rawurlencode($anchor);
        }
        $link = <<<LINK
        <a href="$url"$cc>
LINK;
        echo($link);
        self::htmlOut($content);
        echo('</a>');
    }

    private static function beginActionForm($action, $controller, $params = null, $method = 'get', $cssClass = null) {
        $cc = $cssClass != null ? " class=\"$cssClass\"" : "";
        $form = <<<FORM
<form method="$method" action="?"$cc>
    <input type="hidden" name="c" value="$controller">
    <input type="hidden" name="a" value="$action">
FORM;

        echo ($form);
        if(is_array($params)) {
            foreach ($params as $name => $value) {
                $form = <<<PARAM
<input type="hidden" name="$name" value="$value">
PARAM;
                echo($form);
            }
        }
    }

    private static function endActionForm() {
        echo('</form>');
    }

}