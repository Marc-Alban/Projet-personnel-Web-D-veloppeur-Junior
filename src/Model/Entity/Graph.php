<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Graph
{

    private $id;
    private $title;
    private $description;
    private $image;
    private $posted;

    /**
     * Get the value of posted
     *
     * @return string
     */
    public function getPosted(): string
    {
        return $this->posted;
    }

    /**
     * Set the value of posted
     *
     * @return  self
     */
    public function setPosted(String $posted): self
    {
        $this->posted = $posted;

        return $this;
    }

    /**
     * Get the value of image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */
    public function setImage(String $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription(String $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle(String $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

}