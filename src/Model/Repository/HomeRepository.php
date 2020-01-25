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

/************************************Read All Graph************************************************* */
    /**
     * Récupère tous les objets Graph
     *
     * @return bool|Graph|null
     * false si l'objet n'a pu être inséré, objet Graph si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function readAll(): array
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM graph");
        $graphs = [];
        while ($graph = $this->pdoStatement->fetchObject(Graph::class)) {
            $graphs[] = $graph;
        }
        return $graphs;
    }
/************************************Read All Graph************************************************* */
/************************************Read Graph With Id************************************************* */
    /**
     * Récupère un objet Graph
     *
     * @return bool|Graph|null
     * false si l'objet n'a pu être récupéré, objet Graph si une
     * correspondance est trouvé
     */
    public function readWithId(string $id): ?object
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM graph WHERE id = $id");
        if ($this->pdoStatement) {
            $graph = $this->pdoStatement->fetchObject(Graph::class);
            if ($graph === false) {
                return null;
            }
            return $graph;
        } else if (!$this->pdoStatement) {
            return null;
        }
        return null;
    }
/************************************Read Graph Graph With Id************************************************* */
/************************************Add graph in Bdd************************************************* */
    public function updateBddGraph(string $select, string $legende, string $tmpName, string $extention, string $id): void
    {
        $p = [
            ':title' => $select,
            ':description' => $legende,
            ':image' => $id . "." . $extention,
        ];
        $sql = "
    UPDATE `graph` SET `title`=:title,`description`=:description,`image`=:image where id = $id
    ";
        $query = $this->pdo->prepare($sql);
        $query->execute($p);
        move_uploaded_file($tmpName, "img/graphique/" . $id . '.' . $extention);
    }
/************************************End Add partenaire in Bdd************************************************* */

}