<?php

namespace DataLayer;

class DBDiscussionDataLayer implements DiscussionDataLayer {

    public function getDiscussions() {
        // TODO: Implement getDiscussions() method.
    }

    public function createDiscussion($name, $creation_date, $creator) {
        // TODO: Implement createDiscussion() method.
    }

    public function getPostsForDiscussion($discussionId) {
        // TODO: Implement getPostsForDiscussion() method.
    }

    public function getPostsForCreator($creatorId) {
        // TODO: Implement getPostsForCreator() method.
    }

    public function createPost($discussionId, $creator_id, $creation_date, $text) {
        // TODO: Implement createPost() method.
    }
}