<?php

class Chapter
{

    private $id;
    private $title;
    private $content;
    private $createdAt;
    private $numChapter;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {

        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['title'])) {
            $this->setTitle($data['title']);
        }
        if (isset($data['content'])) {
            $this->setContent($data['content']);
        }
        if (isset($data['created_at'])) {
            $this->setCreatedAt($data['created_at']);
        }
        if (isset($data['num_chapter'])) {
            $this->setNumChapter($data['num_chapter']);
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
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @return  self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of numChapter
     */
    public function getNumChapter()
    {
        return $this->numChapter;
    }

    /**
     * Set the value of numChapter
     *
     * @return  self
     */
    public function setNumChapter($numChapter)
    {
        $this->numChapter = $numChapter;

        return $this;
    }
}
