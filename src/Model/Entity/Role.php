<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class Role
{
    private $id;
    private $idUser;
    private $idTypeRole;

    /**
     * Get the value of idTypeRole
     * @return string
     */
    public function getIdTypeRole(): string
    {
        return $this->idTypeRole;
    }

    /**
     * Set the value of idTypeRole
     *
     * @return  self
     */
    public function setIdTypeRole(String $idTypeRole): self
    {
        $this->idTypeRole = $idTypeRole;

        return $this;
    }

    /**
     * Get the value of idUser
     * @return string
     */
    public function getIdUser(): string
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */
    public function setIdUser(String $idUser): self
    {
        $this->idUser = $idUser;

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