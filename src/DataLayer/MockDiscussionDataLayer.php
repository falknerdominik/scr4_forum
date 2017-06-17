<?php

namespace DataLayer;


use Domain\Discussion;
use Domain\Post;

class MockDiscussionDataLayer implements DiscussionDataLayer {
    private $__discussions;
    private $__posts;

    public function __construct() {
        $lorem_ipsum = "Minus reprehenderit enim asperiores iusto illo nam nemo magnam. Nulla maiores aut et voluptates et libero necessitatibus. Quia et cum voluptatibus inventore. In hic repellat facere non voluptatem voluptatem ut et. Quas odit esse est sunt in asperiores.";
        $top_posts = 0;
        $top_discussions = 0;

        $this->__discussions = array(
            new Discussion(++$top_discussions, "Dynamic vs. static typed languages", "2017-06-12", 1, 10, 10),
            new Discussion(++$top_discussions, "Whats your setup for programming PHP", "2017-05-12", 9, 15, 5),
            new Discussion(++$top_discussions, "Anyone using PHPStrom or Atom?", "2017-05-25", 4, 17, 2)
        );

        $this->__posts = array(
            // Discussion 1
            new Post(++$top_posts, 1,1, "2017-06-12", $lorem_ipsum),
            new Post(++$top_posts, 1,2, "2017-06-12", $lorem_ipsum),
            new Post(++$top_posts, 1,3, "2017-06-13", $lorem_ipsum),
            new Post(++$top_posts, 1,3, "2017-06-13", $lorem_ipsum),
            new Post(++$top_posts, 1,8, "2017-06-14", $lorem_ipsum),
            new Post(++$top_posts, 1,1, "2017-06-14", $lorem_ipsum),
            new Post(++$top_posts, 1,1, "2017-06-14", $lorem_ipsum),
            new Post(++$top_posts, 1,7, "2017-06-15", $lorem_ipsum),
            new Post(++$top_posts, 1,3, "2017-06-15", $lorem_ipsum),
            new Post(++$top_posts, 1,2, "2017-06-15", $lorem_ipsum),

            // Discussion 2
            new Post(++$top_posts, 2,9,  "2017-05-12", $lorem_ipsum),
            new Post(++$top_posts, 2,11, "2017-05-18", $lorem_ipsum),
            new Post(++$top_posts, 2,10, "2017-05-18", $lorem_ipsum),
            new Post(++$top_posts, 2,1,  "2017-05-19", $lorem_ipsum),
            new Post(++$top_posts, 2,9,  "2017-05-20", $lorem_ipsum),

            // Discussion 3
            new Post(++$top_posts, 2,4,  "2017-05-25", $lorem_ipsum),
            new Post(++$top_posts, 2,6,  "2017-05-25", $lorem_ipsum)
        );
    }

    public function getDiscussions() {
        return $this->__discussions;
    }

    public function createDiscussion($name, $creation_date, $creator) {
        return rand();
    }

    public function getPostsForDiscussion($discussionId) {
        return array_filter($this->__discussions, function($discussion) use($discussionId){
           return $discussion->getId() == $discussionId;
        });
    }

    public function getPostsForCreator($creatorId) {
        return array_filter($this->__posts, function($post) use($creatorId){
            return $post->getCreator()->getId() == $creatorId;
        });
    }

    public function createPost($discussionId, $creator, $creation_date, $text) {
        return rand();
    }

    public function getPaginationArray($nrOfItemsPerPage, $currentPage, $wantedAdjacentPages) {
        // get all items within the range
        $result = range(1, ceil(sizeof($this->__discussions) / $nrOfItemsPerPage));

        if (isset($currentPage, $wantedAdjacentPages) === true)
        {
            if (($adjacents = floor($wantedAdjacentPages / 2) * 2 + 1) >= 1)
            {
                $result = array_slice($result, max(0, min(count($result) - $adjacents, intval($currentPage) - ceil($adjacents / 2))), $adjacents);
            }
        }

        return $result;
    }

    public function getDiscussionPage($page, $nrOfItemsPerPage) {
        $start = ($page - 1) * $nrOfItemsPerPage;
        return array_slice($this->__discussions, $start, $nrOfItemsPerPage);
    }
}