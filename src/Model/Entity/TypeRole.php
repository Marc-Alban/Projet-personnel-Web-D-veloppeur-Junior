<?php
declare (strict_types = 1);
namespace App\Model\Entity;

class TypeRole
{
    private $id;
    private $admin;
    private $partenaire;
    private $article;
    private $graph;

    /**
     * Get the value of graph
     * @return string
     */
    public function getGraph(): string
    {
        return $this->graph;
    }

    /**
     * Set the value of graph
     *
     * @return  self
     */
    public function setGraph(String $graph): self
    {
        $this->graph = $graph;

        return $this;
    }

    /**
     * Get the value of article
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }

    /**
     * Set the value of article
     *
     * @return  self
     */
    public function setArticle(String $article): self
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get the value of partenaire
     * @return string
     */
    public function getPartenaire(): string
    {
        return $this->partenaire;
    }

    /**
     * Set the value of partenaire
     *
     * @return  self
     */
    public function setPartenaire(String $partenaire): self
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * Get the value of admin
     * @return string
     */
    public function getAdmin(): string
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */
    public function setAdmin(String $admin): self
    {
        $this->admin = $admin;

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