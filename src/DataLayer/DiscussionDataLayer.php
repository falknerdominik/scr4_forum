<?php

namespace DataLayer;


interface DiscussionDataLayer {
    public function getDiscussions();
    public function getDiscussionPage($page, $nrOfItemsPerPage);
    public function getDiscussionById($id);

    public function createDiscussion($name, $creation_date, $creator);
    public function createPost($discussionId, $creator_id, $creation_date, $text);

    public function getPostsForDiscussion($discussionId);
    public function getPostsForCreator($creatorId);

    public function getPostsForSearchCriteria($search);

    public function getPostById($id) ;
    public function hasPost($id);

    public function deletePost($getId);
    public function deleteDiscussion($getId);

    public function getPaginationArray($nrOfItemsPerPage, $currentPage, $wantedAdjacentPages);
}