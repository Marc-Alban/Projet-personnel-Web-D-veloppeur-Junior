<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class User
{
    private $id;
    private $name;
    private $lastName;
    private $mail;
    private $password;
    private $token;
    private $active;

    /**
     * Get the value of password
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword(String $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of mail
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail(String $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of lastName
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName(String $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(String $name): self
    {
        $this->name = $name;

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
     * Get the value of active
     */
    public function getActive(): ?string
    {
        // var_dump($this->active);
        // die();
        return $this->active;
    }

    /**
     * Set the value of active
     *
     * @return  self
     */
    public function setActive($active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get the value of token
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Set the value of token
     *
     * @return  self
     */
    public function setToken($token): self
    {
        $this->token = $token;

        return $this;
    }
}