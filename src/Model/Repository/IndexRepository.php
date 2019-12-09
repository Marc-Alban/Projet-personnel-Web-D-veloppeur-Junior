<?php

namespace App\Model\Repository;

use App\Model\Database;
use App\Model\Entity\Graph;
use \PDO;

class IndexRepository
{

    private $pdo;
    private $pdoStatement;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    /**
     * Récupère tous les objets Graph
     *
     * @return bool|Graph|null
     * false si l'objet n'a pu être inséré, objet Graph si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function readAll()
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM graph WHERE posted = 1");
        $graphs = [];

        while ($graph = $this->pdoStatement->fetchObject(Graph::class)) {
            $graphs[] = $graph;
        }

        return $graphs;
    }

}