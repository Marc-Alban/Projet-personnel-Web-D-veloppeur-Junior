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
    /************************************Read Partenaire************************************************* */
    /**
     * Récupère
     *
     * @return bool|Partenaire|null
     * false si l'objet n'a pu être inséré, objet Partenaire si une
     * correspondance est trouvé, NULL s'il n'y a aucune correspondance
     */
    public function readPartenaire(int $id): ?object
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM partenaire WHERE id = $id");
        $partenaire = $this->pdoStatement->fetchObject(Partenaire::class);
        if ($partenaire !== false) {
            return $partenaire;
        } else if ($partenaire === false) {
            return null;
        }

    }
/************************************End Read Partenaire************************************************* */
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
    public function addBddPartenaire(string $legende, string $tmpName, string $link, string $extention, ?string $id): void
    {
        if ($id === null) {
            $this->pdoStatement = $this->pdo->query('SELECT MAX(id) FROM partenaire ORDER BY id');
            $response = $this->pdoStatement->fetch();
            $id = $response['MAX(id)'] + 1;
            $p = [
                ':legende' => $legende,
                ':image' => $id . "." . $extention,
                ':link' => $link,
            ];
            $sql = "
            INSERT INTO `partenaire`(`legende`, `image`, `link`) VALUES (:legende,:image,:link)
            ";
        } else if ($id !== null) {
            $p = [
                ':legende' => $legende,
                ':image' => $id . "." . $extention,
                ':link' => $link,
            ];
            $sql = "
        UPDATE `partenaire` SET `legende`=:legende,`image`=:image,`link`=:link where id = $id
        ";
        }

        $query = $this->pdo->prepare($sql);
        $query->execute($p);
        move_uploaded_file($tmpName, "img/partenaire/" . $id . '.' . $extention);
    }
/************************************End Add partenaire in Bdd************************************************* */
/************************************Del Liste Partenaire************************************************* */
    public function deletePartenaire(int $id): void
    {

        $this->pdoStatement = $this->pdo->query("SELECT id, image FROM partenaire WHERE id = $id");
        $image = $this->pdoStatement->fetch();
        $extention = explode('.', $image['image']);

        if ($this->countpartenaire() > "2" || $this->countpartenaire() > 2 || $id === $image["id"]) {
            $sql = "
            DELETE FROM `partenaire` WHERE id = $id
            ";
            $query = $this->pdo->prepare($sql);
            $query->execute();
            unlink("img/partenaire/" . $image['id'] . "." . $extention[1]);
        }

        header("Location: http://3bigbangbourse.fr/?p=table&liste=listePartenaires");
        exit();

    }
/************************************End Del Liste Partenaire************************************************* */
}