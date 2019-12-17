<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Partenaire
{
    private $id;
    private $legende;
    private $lien;
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
     * Get the value of lien
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }

    /**
     * Set the value of lien
     *
     * @return  self
     */
    public function setLien(String $lien): self
    {
        $this->lien = $lien;

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