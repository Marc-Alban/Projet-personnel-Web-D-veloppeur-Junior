<?php
declare (strict_types = 1);
namespace App\Model\Repository;

use App\Model\Entity\User;
use App\Tools\Database;

class UserRepository
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
 * Récupère tous les objets user
 *
 * false si l'objet n'a pu être inséré, objet user si une
 * correspondance est trouvé, NULL s'il n'y a aucune correspondance
 *
 * @return Object
 */
    public function readUser(): Object
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM user");
        $user = $this->pdoStatement->fetchObject(User::class);
        return $user;
    }

    /**
     * Methode pour inserer un token dans la bdd lors de la modification de mot de passe
     *
     * @param [type] $token
     * @return void
     */
    public function insertToken($token): void
    {
        $e = [
            ':token' => $token,
        ];
        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET token = :token");
        $this->pdoStatement->execute($e);
    }

    /**
     * Methode qui permet de modifier la valeur active en bdd
     * true = 1
     * false = 0
     *
     * @param string $bool
     * @return void
     */
    public function changeActive(string $bool): void
    {
        $active = null;

        if ($bool === 'false') {
            $active = 0;
        } else if ($bool === 'true') {
            $active = 1;
        }

        $e = [
            ':active' => $active,
        ];
        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET active = :active");
        $this->pdoStatement->execute($e);
    }

    /**
     * Methode qui change de mot de passe
     *
     */
    public function changePass(array $data): void
    {
        $password = password_hash($data['post']['newMdp'], PASSWORD_DEFAULT);
        $data['session']['mdp'] = $password;
        $e = [
            ':pass' => $password,
        ];

        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET password = :pass");
        $this->pdoStatement->execute($e);
    }

}