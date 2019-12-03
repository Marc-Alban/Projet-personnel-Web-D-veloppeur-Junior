<?php

namespace App\Model\Entity;

class Role
{
    private $id;
    private $idUser;
    private $idTypeRole;

    /**
     * Get the value of idTypeRole
     */
    public function getIdTypeRole()
    {
        return $this->idTypeRole;
    }

    /**
     * Set the value of idTypeRole
     *
     * @return  self
     */
    public function setIdTypeRole($idTypeRole)
    {
        $this->idTypeRole = $idTypeRole;

        return $this;
    }

    /**
     * Get the value of idUser
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

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