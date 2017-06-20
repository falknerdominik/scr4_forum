<?php

namespace DataLayer;


final class DataLayerFactory {
    const SERVER = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DATABASE = 'scr_forum';

    private function __construct() { }

    public static function getUserDataLayer() {
        return new DBUserDataLayer(self::SERVER, self::USER, self::PASSWORD, self::DATABASE);
    }

    public static function getDiscussionDataLayer() {
        //TODO switch to another implementation here in the future
        return new MockDiscussionDataLayer();
    }
}