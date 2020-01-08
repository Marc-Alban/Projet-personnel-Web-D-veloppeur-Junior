<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Article
{
    private $id;
    private $titleArticle;
    private $title;
    private $legende;
    private $description;
    private $image;
    private $date;
    private $posted;
    private $lastArticle;

    /**
     * Get the value of lastArticle
     *
     * @return string
     */
    public function getLastArticle(): string
    {
        return $this->lastArticle;
    }

    /**
     * Set the value of lastArticle
     *
     * @return  self
     */
    public function setLastArticle(String $lastArticle): self
    {
        $this->lastArticle = $lastArticle;

        return $this;
    }

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
     * Get the value of date
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate(String $date): self
    {
        $this->date = $date;

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
     * Get the value of legende
     *
     * @return string
     */
    public function getLegende(): string
    {
        return $this->legende;
    }

    /**
     * Set the value of legende
     *
     * @return  self
     */
    public function setLegende(String $legende): self
    {
        $this->legende = $legende;

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
     * Get the value of titleArticle
     */
    public function getTitleArticle()
    {
        return $this->titleArticle;
    }

    /**
     * Set the value of titleArticle
     *
     * @return  self
     */
    public function setTitleArticle($titleArticle)
    {
        $this->titleArticle = $titleArticle;

        return $this;
    }
}