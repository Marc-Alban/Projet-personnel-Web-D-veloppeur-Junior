<?php

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
     */
    public function getGraph()
    {
        return $this->graph;
    }

    /**
     * Set the value of graph
     *
     * @return  self
     */
    public function setGraph($graph)
    {
        $this->graph = $graph;

        return $this;
    }

    /**
     * Get the value of article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set the value of article
     *
     * @return  self
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get the value of partenaire
     */
    public function getPartenaire()
    {
        return $this->partenaire;
    }

    /**
     * Set the value of partenaire
     *
     * @return  self
     */
    public function setPartenaire($partenaire)
    {
        $this->partenaire = $partenaire;

        return $this;
    }

    /**
     * Get the value of admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set the value of admin
     *
     * @return  self
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;

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