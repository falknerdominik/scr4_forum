<?php
namespace BusinessLogic;

use DataLayer\DataLayerFactory;

class PostManager {

    static $datalayer = null;

    public static function init() {
        self::$datalayer = DataLayerFactory::getDiscussionDataLayer();
    }

    public static function deletePost($postId) {
        return self::$datalayer->deletePost($postId);
    }

    public static function getLatestPost() {
        return self::$datalayer->getLatestPost();
    }

    public static function postExists($postId) {
        return self::$datalayer->hasPost($postId);
    }

    public static function createPost($discussionId, $creatorId, $text) {
        return self::$datalayer->createPost($discussionId, $creatorId, date('Y-m-d', time()), $text);
    }

    public static function getPostsForDiscussion($discussionId) {
        return self::$datalayer->getPostsForDiscussion($discussionId);
    }

    public static function getPostsForSearchCriteria($criteria) {
        return self::$datalayer->getPostsForSearchCriteria($criteria);
    }

    public static function getPostsForCreator($userId) {
        return self::$datalayer->getPostsForCreator($userId);
    }

}

PostManager::init();
