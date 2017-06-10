<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 5/5/2017
 * Time: 3:56 PM
 */

namespace DataLayer;


final class DataLayerFactory {
    private function __construct() { }

    public static function getDataLayer() {
        //TODO switch to another implementation here in the future
        return new DBDataLayer('localhost', 'root', '', 'bookshop');
    }
}