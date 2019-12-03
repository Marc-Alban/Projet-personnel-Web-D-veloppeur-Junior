<?php

namespace App\Model\Manager;

use App\Model\Database;

class PageManager
{

    private $pdo;
    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Récupère les pages
     *
     * @return void
     */
    public function getPage()
    {

    }

    /**
     * Met à jour les pages
     *
     * @return void
     */
    public function updatePage()
    {

    }

}