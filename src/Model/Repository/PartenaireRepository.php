<?php
declare (strict_types = 1);
namespace App\Model\Repository;

use App\Model\Entity\Partenaire;
use App\Tools\Database;

class PartenaireRepository
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

    /************************************Read All Partenaire************************************************* */
    /**
     * Récupère tous les objets Partenaire
     *
     * @return bool|Partenaire|null
     * false si l'objet n'a pu être inséré, objet Partenaire si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function readAll(): array
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM partenaire");
        $partenaire = [];
        while ($partenaires = $this->pdoStatement->fetchObject(Partenaire::class)) {
            $partenaire[] = $partenaires;
            $partenaire++;
        }
        return (array) $partenaire;
    }
/************************************End Read All Partenaire************************************************* */
/************************************Count partenaire************************************************* */
    public function countpartenaire(): ?string
    {
        $this->pdoStatement = $this->pdo->query("SELECT count(*) AS total FROM partenaire ");
        $req = $this->pdoStatement->fetch();
        if ($req) {
            $total = $req['total'];
            return $total;
        }
        return null;
    }
/************************************End Count partenaire************************************************* */
/************************************Add partenaire in Bdd************************************************* */
    public function addBddPartenaire(?string $legende, ?string $link, string $tmpName, string $extention): void
    {
        if (!$tmpName) {
            $id = "default";
            $extention = ".png";
        }
        $this->pdoStatement = $this->pdo->query('SELECT MAX(id) FROM partenaire ORDER BY id');
        $response = $this->pdoStatement->fetch();
        $id = $response['MAX(id)'] + 1;
        $p = [
            ':id' => $id,
            ':legende' => $legende,
            ':image' => $id . "." . $extention,
            ':link' => $link,
        ];
        $sql = "
    INSERT INTO partenaire(id, legende, image, link)
    VALUES(:id, :legende, :image, :link,)
    ";
        $query = $this->pdo->prepare($sql);
        $query->execute($p);
        move_uploaded_file($tmpName, "img/partenaire/" . $id . '.' . $extention);
    }
/************************************End Add partenaire in Bdd************************************************* */

}