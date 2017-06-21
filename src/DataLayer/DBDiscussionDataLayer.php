<?php

namespace DataLayer;

use Domain\Discussion;
use Domain\Post;

class DBDiscussionDataLayer extends DBDataLayer implements DiscussionDataLayer {

    const DATE_FORMAT = 'Y-m-d';

    public function __construct($server, $userName, $password, $database) {
        parent::__construct($server, $userName, $password, $database);
    }

    public function getDiscussions() {
        $discussions = array();
        $con = $this->getConnection();
        $res = $this->executeQuery($con, 'SELECT * FROM discussion');
        while($cat = $res->fetch_object()) {
            // fetch user
            $user = DataLayerFactory::getUserDataLayer()->getUser($cat->creator_id);

            // fetch last post
            $lastPost = $this->getLatestPostForDiscussion($cat->id);

            // fetch last post
            $nrOfPosts = $this->getNumberOfPostsForDiscussion($cat->id);


            // fetch number of posts
            $discussions[] = new Discussion($cat->id, $cat->name, date(self::DATE_FORMAT, time($cat->creation_date)), $user, $lastPost, $nrOfPosts);
        }

        $res->close();
        $con->close();
        return $discussions;
    }

    public function getDiscussionPage($page, $nrOfItemsPerPage) {
        $start = ($page - 1) * $nrOfItemsPerPage;
        return array_slice($this->getDiscussions(), $start, $nrOfItemsPerPage);
    }

    public function getDiscussionById($id) {
        $discussion = null;
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'SELECT * FROM discussion WHERE id = ?',
            function($i) use ($id) {
                $i->bind_param('i', $id);
            }
        );

        $id = null; $creator_id = null; $name = ''; $creation_date = null;

        $stat->bind_result($id, $creator_id, $name, $creation_date);
        if($stat->fetch()) {
            // fetch user
            $user = DataLayerFactory::getUserDataLayer()->getUser($creator_id);

            // fetch last post
            // TODO: manually otherwise ...
            $lastPost = null;//$this->getLatestPostForDiscussion($id);

            // fetch last post
            $nrOfPosts = $this->getNumberOfPostsForDiscussion($id);


            // fetch number of posts
            $discussion = new Discussion($id, $name, date(self::DATE_FORMAT, time($creation_date)), $user, $lastPost, $nrOfPosts);
        }

        $stat->close();
        $con->close();
        return $discussion;
    }

    public function createDiscussion($name, $creation_date, $creator) {
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'INSERT INTO discussion(creator_id, name, creation_date) VALUES(?, ?, ?)',
            function($s) use($name, $creation_date, $creator) {
                $s->bind_param('iss', $creator, $name, $creation_date);
            }
        );
        $discussionId = $stat->insert_id;

        $stat->close();
        $con->close();
        return $discussionId;
    }

    public function createPost($discussionId, $creator_id, $creation_date, $text) {
        $con = $this->getConnection();
        $stat = $this->executeStatement(
            $con,
            'INSERT INTO post(discussion_id, creator_id, creation_date, text) VALUES(?, ?, ?, ?)',
            function($s) use($discussionId, $creator_id, $creation_date, $text) {
                $s->bind_param('iiss', $discussionId, $creator_id, $creation_date, $text);
            }
        );
        $postId = $stat->insert_id;

        $stat->close();
        $con->close();
        return $postId;
    }

    public function getPostsForDiscussion($discussionId) {
        $posts = array();
        $sql = <<<'SQL'
        SELECT * 
            FROM post
        WHERE discussion_id = ?
        ORDER BY creation_date ASC;
SQL;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($discussionId) { $i->bind_param('i', $discussionId); });

        $id = 0; $discussion_id = 0; $creator_id = 0; $creation_date = null; $text = '';
        $stat->bind_result($id, $discussion_id, $creator_id, $creation_date, $text);
        while($stat->fetch()) {
            // get discussion
            $discussion = $discussionId;

            // get creator
            $creator = DataLayerFactory::getUserDataLayer()->getUser($creator_id);

            $posts[] = new Post($id, $discussion, $creator, date(self::DATE_FORMAT, strtotime($creation_date)), $text);
        }

        $stat->close();
        $con->close();
        return $posts;
    }

    public function getPostsForCreator($creatorId)
    {
        $posts = array();
        $sql = <<<'SQL'
        SELECT * 
            FROM post
        WHERE creator_id = ?
        ORDER BY creation_date DESC;
SQL;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($creatorId) { $i->bind_param('i', $creatorId); });

        $id = 0; $discussion_id = 0; $creator_id = 0; $creation_date = null; $text = '';
        $stat->bind_result($id, $discussion_id, $creator_id, $creation_date, $text);
        while($stat->fetch()) {
            // get discussion
            $discussion = $discussion_id;

            // get creator
            $creator = DataLayerFactory::getUserDataLayer()->getUser($creator_id);

            $posts[] = new Post($id, $discussion, $creator, date(self::DATE_FORMAT, strtotime($creation_date)), $text);
        }

        $stat->close();
        $con->close();
        return $posts;
    }

    public function getPostsForSearchCriteria($search) {
        $search = "%$search%";
        $posts = array();
        $sql = <<<'SQL'
        SELECT * 
            FROM post
        WHERE text LIKE ?
        ORDER BY creation_date DESC;
SQL;

        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($search) { $i->bind_param('s', $search); });

        $id = 0; $discussion_id = 0; $creator_id = 0; $creation_date = null; $text = '';
        $stat->bind_result($id, $discussion_id, $creator_id, $creation_date, $text);
        while($stat->fetch()) {
            // get discussion
            $discussion = $discussion_id;

            // get creator
            $creator = DataLayerFactory::getUserDataLayer()->getUser($creator_id);

            $posts[] = new Post($id, $discussion, $creator, date(self::DATE_FORMAT, strtotime($creation_date)), $text);
        }

        $stat->close();
        $con->close();
        return $posts;
    }

    public function getPostById($id) {
        $post = null;
        $sql = <<<'SQL'
        SELECT * 
            FROM post
        WHERE id = ?;
SQL;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($id) { $i->bind_param('i', $id); });

        $id = 0; $discussion_id = 0; $creator_id = 0; $creation_date = null; $text = '';
        $stat->bind_result($id, $discussion_id, $creator_id, $creation_date, $text);
        if($stat->fetch()) {
            // get discussion
            $discussion = $discussion_id;

            // get creator
            $creator = DataLayerFactory::getUserDataLayer()->getUser($creator_id);

            $post = new Post($id, $discussion, $creator, date(self::DATE_FORMAT, strtotime($creation_date)), $text);
        }
        return $post;
    }

    public function hasPost($id) {
       return $this->getPostById($id) != null;
    }

    public function deletePost($id) {
        $sql = 'DELETE FROM post WHERE id = ?';
        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($id) { $i->bind_param('i', $id); });

        $stat->close();
        $con->close();
    }

    public function deleteDiscussion($id) {
        $sql = 'DELETE FROM discussion WHERE id = ?';
        $con = $this->getConnection();

        // delete all posts
        $posts = $this->getPostsForDiscussion($id);
        foreach ($posts as $post) {
            $this->deletePost($post->getId());
        }

        $stat = $this->executeStatement($con, $sql, function($i) use($id) { $i->bind_param('i', $id); });

        $stat->close();
        $con->close();
        return true;
    }

    private function getNumberOfPostsForDiscussion($id) {
        $sql = <<<'SQL'
        SELECT COUNT(*)
	FROM discussion d
	JOIN post p ON(d.id = p.discussion_id)
	WHERE d.id = ?;
SQL;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($id) { $i->bind_param('i', $id); });

        $cnt = 0;
        $stat->bind_result($cnt);
        $stat->fetch();

        $stat->close();
        $con->close();
        return $cnt;
    }

    private function getLatestPostForDiscussion($id) {
        $post = null;
        $sql = <<<'SQL'
        SELECT * 
            FROM post
        WHERE discussion_id = ?
        ORDER BY creation_date DESC
        LIMIT 1;
SQL;
        $con = $this->getConnection();
        $stat = $this->executeStatement($con, $sql, function($i) use($id) { $i->bind_param('i', $id); });

        $id = 0; $discussion_id = 0; $creator_id = 0; $creation_date = null; $text = '';
        $stat->bind_result($id, $discussion_id, $creator_id, $creation_date, $text);
        if($stat->fetch()) {
            // get discussion
            $discussion = $this->getDiscussionById($discussion_id);

            // get creator
            $creator = DataLayerFactory::getUserDataLayer()->getUser($creator_id);

            $post = new Post($id, $discussion, $creator, date(self::DATE_FORMAT, strtotime($creation_date)), $text);
        }

        $stat->close();
        $con->close();
        return $post;
    }

    public function getLatestPost() {
        $post = null;
        $sql = <<<'SQL'
        SELECT * 
            FROM post
        ORDER BY creation_date DESC
        LIMIT 1;
SQL;
        $con = $this->getConnection();
        $res = $this->executeQuery($con, $sql);

        if($cat = $res->fetch_object()) {
            // get discussion
            $discussion = $this->getDiscussionById($cat->discussion_id);

            // get creator
            $creator = DataLayerFactory::getUserDataLayer()->getUser($cat->creator_id);

            $post = new Post($cat->id, $discussion, $creator, date(self::DATE_FORMAT, strtotime($cat->creation_date)), $cat->text);
        }

        $res->close();
        $con->close();
        return $post;
    }
}