<?php

class Comment
{
    private $id;
    private $chapter_id;
    private $author;
    private $comment;
    private $created_at;
    private $report;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {

        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['chapter_id'])) {
            $this->setChapterId($data['chapter_id']);
        }
        if (isset($data['author'])) {
            $this->setAuthor($data['author']);
        }
        if (isset($data['comment'])) {
            $this->setComment($data['comment']);
        }
        if (isset($data['created_at'])) {
            $this->setCreatedAt($data['created_at']);
        }
        if (isset($data['report'])) {
            $this->setReport($data['report']);
        }
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of chapter_id
     */
    public function getChapterId()
    {
        return $this->chapter_id;
    }

    /**
     * Set the value of chapter_id
     *
     * @return  self
     */
    public function setChapterId($chapter_id)
    {
        $this->chapter_id = $chapter_id;

        return $this;
    }

    /**
     * Get the value of author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @return  self
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of report
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set the value of report
     *
     * @return  self
     */
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }
}
