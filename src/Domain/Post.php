<?php
namespace Domain;

class Post extends Entity {
    private $creator;
    private $creation_date;
    private $text;
    private $discussionId;

    public function __construct($id, $discussionId, $creator, $creation_date, $text) {
        parent::__construct($id);
        $this->creator = $creator;
        $this->creation_date = $creation_date;
        $this->text = $text;
        $this->discussionId = $discussionId;
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
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getDiscussionId()
    {
        return $this->discussionId;
    }

    /**
     * @param mixed $discussionId
     */
    public function setDiscussionId($discussionId)
    {
        $this->discussionId = $discussionId;
    }

}