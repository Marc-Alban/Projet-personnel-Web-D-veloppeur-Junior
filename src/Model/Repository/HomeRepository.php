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
/************************************Add graph in Bdd************************************************* */
    public function addBddGraph(string $title, string $legende, string $tmpName, string $extention): void
    {
        $this->pdoStatement = $this->pdo->query('SELECT MAX(id) FROM graph ORDER BY id');
        $response = $this->pdoStatement->fetch();
        $id = $response['MAX(id)'] + 1;
        $p = [
            ':title' => $title,
            ':legende' => $legende,
            ':image' => $id . "." . $extention,
        ];
        $sql = "
    INSERT INTO `graph`(`title`, `legende`, `image`) VALUES (:title,:legende,:image)
    ";
        $query = $this->pdo->prepare($sql);
        $query->execute($p);
        move_uploaded_file($tmpName, "img/graphique/" . $id . '.' . $extention);
    }
/************************************End Add partenaire in Bdd************************************************* */

}