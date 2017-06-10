<?php

namespace DataLayer;


final class DataLayerFactory {
    private function __construct() { }

    public static function getUserDataLayer() {
        //TODO switch to another implementation here in the future
        return new MockUserDataLayer();
    }

    public static function getDiscussionDataLayer() {
        //TODO switch to another implementation here in the future
        return new MockDiscussionDataLayer();
    }
}