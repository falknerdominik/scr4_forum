<?php

namespace DataLayer;


interface DiscussionDataLayer {
    public function getDiscussions();
    public function createDiscussion($name, $creation_date, $creator);

    public function getPostsForDiscussion($discussionId);
    public function getPostsForCreator($creatorId);
    public function createPost($discussionId, $creator, $creation_date, $text);
}