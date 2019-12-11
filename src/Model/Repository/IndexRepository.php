<?php

namespace App\Model\Repository;

use App\Model\Entity\Graph;
use App\Tools\Database;
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

    /**
     * Récupère un objet Graph à partir de son identifiant
     *
     * @param int $id identifiant d'un Graph
     * @return bool|Graph|null
     * false si l'objet n'a pu être inséré, objet Graph si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function read($id)
    {
        $this->pdoStatement = $this->pdo->prepare('SELECT * FROM graph WHERE id=:id');

        //liason des paramètres
        $this->pdoStatement->bindValue(':id', $id, PDO::PARAM_INT);

        //execution de la requête
        $executeIsOk = $this->pdoStatement->execute();

        if ($executeIsOk) {
            //$graph = $this->pdoStatement->fetchObject('App\Model\Entity\Graph');
            $graph = $this->pdoStatement->fetchObject(Graph::class);
            return $graph;
            if ($graph === false) {
                return null;
            }
        }

        if (!$executeIsOk) {
            return false;
        }

    }

}