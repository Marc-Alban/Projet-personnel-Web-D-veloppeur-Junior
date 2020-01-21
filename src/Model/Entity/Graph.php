<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Graph
{

    private $id;
    private $title;
    private $description;
    private $image;

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

    /**
     * Renvoie tous les propriété sous une seul fonction
     * mais dans un array
     *
     * @return void
     */
    public function getGraph()
    {
        return [
            $this->getId(),
            $this->getTitle(),
            $this->getDescription(),
            $this->getImage(),
        ];
    }
}