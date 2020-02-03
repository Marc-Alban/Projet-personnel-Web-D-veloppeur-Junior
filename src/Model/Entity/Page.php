<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Page
{
    private $id;
    private $titlePage;
    private $title;
    private $description;
    private $image;

    /**
     * Get the value of image
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
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Get the value of description
     * @return string
     */
    public function getDescriptionExtrait(): string
    {
        $string = $this->description;
        $decodeString = strip_tags(html_entity_decode($string));
        return strip_tags(htmlspecialchars_decode($decodeString));
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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of titlePage
     */
    public function getTitlePage(): string
    {
        return $this->titlePage;
    }

    /**
     * Get the value of title Page
     * @return string
     */
    public function getTitlePageExtrait(): string
    {
        $string = $this->titlePage;
        $decodeString = strip_tags(html_entity_decode($string));
        return strip_tags(htmlspecialchars_decode($decodeString));
    }

    /**
     * Set the value of titlePage
     *
     * @return  self
     */
    public function setTitlePage($titlePage): self
    {
        $this->titlePage = $titlePage;
        return $this;
    }
}