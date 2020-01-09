<?php
declare (strict_types = 1);
namespace App\Model\Repository;

use App\Model\Entity\Graph;
use App\Tools\Database;

class HomeRepository
{

    private $pdo;
    private $pdoStatement;

    /**
     * Fonction constructeur, instanciation de la bdd
     * dans la propriété pdo
     */
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
    public function readAll(): array
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM graph WHERE posted = 1");
        $graphs = [];

        while ($graph = $this->pdoStatement->fetchObject(Graph::class)) {
            $graphs[] = $graph;
        }
        // var_dump($graphs);
        // die();
        return $graphs;
    }

}