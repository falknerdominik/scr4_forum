<?php
namespace Domain;

class Discussion extends Entity {


    private $name;
    private $creation_date;
    private $creator;
    private $last_post;
    private $nr_of_posts;

    public function __construct($id, $name, $creation_date, $creator, $last_post, $nr_of_posts) {
        parent::__construct($id);
        $this->name = $name;
        $this->creation_date = $creation_date;
        $this->creator = $creator;
        $this->last_post = $last_post;
        $this->nr_of_posts = $nr_of_posts;
    }

    /**
     * @return mixed
     */
    public function getNrOfPosts()
    {
        return $this->nr_of_posts;
    }

    /**
     * @param mixed $nr_of_posts
     */
    public function setNrOfPosts($nr_of_posts)
    {
        $this->nr_of_posts = $nr_of_posts;
    }

    /**
     * @return mixed
     */
    public function getLastPost()
    {
        return $this->last_post;
    }

    /**
     * @param mixed $last_post
     */
    public function setLastPost($last_post)
    {
        $this->last_post = $last_post;
    }

    /**
     * @return mixed
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param mixed $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * @param mixed $creation_date
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}