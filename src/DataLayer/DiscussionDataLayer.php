<?php

namespace DataLayer;


interface DiscussionDataLayer {
    public function getDiscussions();
    public function getDiscussionPage($page, $nrOfItemsPerPage);

    public function createDiscussion($name, $creation_date, $creator);

    public function getPostsForDiscussion($discussionId);
    public function getPostsForCreator($creatorId);
    public function createPost($discussionId, $creator_id_id, $creation_date, $text);

    public function getPaginationArray($nrOfItemsPerPage, $currentPage, $wantedAdjacentPages);
}