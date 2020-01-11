<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Partenaire
{
    private $id;
    private $legende;
    private $image;
    private $posted;

    /**
     * Get the value of posted
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
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of legende
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
     * Get the value of id
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

}