<?php

namespace DataLayer;

class DBDiscussionDataLayer extends DBDataLayer implements DiscussionDataLayer {

    public function __construct($server, $userName, $password, $database) {
        parent::__construct($server, $userName, $password, $database);
    }

    public function getDiscussions()
    {
        // TODO: Implement getDiscussions() method.
    }

    public function getDiscussionPage($page, $nrOfItemsPerPage)
    {
        // TODO: Implement getDiscussionPage() method.
    }

    public function getDiscussionById($id)
    {
        // TODO: Implement getDiscussionById() method.
    }

    public function createDiscussion($name, $creation_date, $creator)
    {
        // TODO: Implement createDiscussion() method.
    }

    public function createPost($discussionId, $creator_id, $creation_date, $text)
    {
        // TODO: Implement createPost() method.
    }

    public function getPostsForDiscussion($discussionId)
    {
        // TODO: Implement getPostsForDiscussion() method.
    }

    public function getPostsForCreator($creatorId)
    {
        // TODO: Implement getPostsForCreator() method.
    }

    public function getPostsForSearchCriteria($search)
    {
        // TODO: Implement getPostsForSearchCriteria() method.
    }

    public function getPostById($id)
    {
        // TODO: Implement getPostById() method.
    }

    public function hasPost($id)
    {
        // TODO: Implement hasPost() method.
    }

    public function deletePost($getId)
    {
        // TODO: Implement deletePost() method.
    }

    public function deleteDiscussion($getId)
    {
        // TODO: Implement deleteDiscussion() method.
    }

    public function getPaginationArray($nrOfItemsPerPage, $currentPage, $wantedAdjacentPages)
    {
        // TODO: Implement getPaginationArray() method.
    }
}