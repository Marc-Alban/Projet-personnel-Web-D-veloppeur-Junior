<?php

namespace App\Model\Entity;

class Partenaire
{
    private $id;
    private $legende;
    private $lien;
    private $posted;

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
     * Get the value of lien
     */
    public function getLien()
    {
        return $this->lien;
    }

    /**
     * Set the value of lien
     *
     * @return  self
     */
    public function setLien($lien)
    {
        $this->lien = $lien;

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
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

}