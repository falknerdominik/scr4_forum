<?php
/**
 * Created by PhpStorm.
 * User: Dominik
 * Date: 6/20/2017
 * Time: 5:57 PM
 */

namespace BusinessLogic;


use DataLayer\DataLayerFactory;

class PostManager {
    public static function getLatestPost() {
        return DataLayerFactory::getDiscussionDataLayer()->getLatestPost();
    }

}