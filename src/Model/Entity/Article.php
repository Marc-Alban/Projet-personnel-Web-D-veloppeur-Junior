<?php

namespace App\Model\Entity;

class Article
{
    private $id;
    private $title;
    private $legende;
    private $description;
    private $image;
    private $date;
    private $posted;
    private $lastArticle;

    /**
     * Get the value of lastArticle
     */
    public function getLastArticle()
    {
        return $this->lastArticle;
    }

    /**
     * Set the value of lastArticle
     *
     * @return  self
     */
    public function setLastArticle($lastArticle)
    {
        $this->lastArticle = $lastArticle;

        return $this;
    }

    /**
     * Get the value of posted
     */
    public function getPosted()
    {
        return $this->posted;
    }

    /**
     * Set the value of posted
     *
     * @return  self
     */
    public function setPosted($posted)
    {
        $this->posted = $posted;

        return $this;
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of legende
     */
    public function getLegende()
    {
        return $this->legende;
    }

    /**
     * Set the value of legende
     *
     * @return  self
     */
    public function setLegende($legende)
    {
        $this->legende = $legende;

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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

}