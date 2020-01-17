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

    /************************************Get Active Value************************************************* */
    /**
     * Retourne la valeur active dans le manager
     */
    public function getActiveValue()
    {
        $this->pdoStatement = $this->pdo->query("SELECT active FROM user");
        $req = $this->pdoStatement->fetch();
        return $req;
    }
/************************************End Get Active Value************************************************* */
/************************************Read All Users************************************************* */
/**
 * Récupère tous les objets user
 *
 * false si l'objet n'a pu être inséré, objet user si une
 * correspondance est trouvé, NULL s'il n'y a aucune correspondance
 *
 * @return Object
 */
    public function readAllUser(): Object
    {
        $this->pdoStatement = $this->pdo->query("SELECT * FROM user");
        $user = $this->pdoStatement->fetchObject(User::class);
        return $user;
    }
/************************************End Read All Users************************************************* */
/************************************Insert Token************************************************* */
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
/************************************End Insert Token************************************************* */
/************************************Change Name Bdd************************************************* */
    /**
     * Methode pour mettre à jour le nom dans la bdd
     *
     * @param [type] $token
     * @return void
     */
    public function updateName(array $data): void
    {
        $e = [
            ':name' => $data['post']['name'],
        ];
        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET name = :name");
        $this->pdoStatement->execute($e);
    }
/************************************End Change Name Bdd************************************************* */
/************************************Change lastName Bdd************************************************* */
    /**
     * Methode pour mettre à jour le nom dans la bdd
     *
     * @param [type] $token
     * @return void
     */
    public function updateLastName(array $data): void
    {
        $e = [
            ':lastName' => $data['post']['lastName'],
        ];
        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET lastName = :lastName");
        $this->pdoStatement->execute($e);
    }
/************************************End Change lastName Bdd************************************************* */
/************************************Change mail Bdd************************************************* */
    /**
     * Methode pour mettre à jour le nom dans la bdd
     *
     * @param [type] $token
     * @return void
     */
    public function updateMail(array $data): void
    {
        $e = [
            ':mail' => $data['post']['mail'],
        ];
        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET mail = :mail");
        $this->pdoStatement->execute($e);
    }
/************************************End Change mail Bdd************************************************* */
/************************************Change password Bdd************************************************* */
    /**
     * Methode pour mettre à jour le nom dans la bdd
     *
     * @param [type] $token
     * @return void
     */
    public function updatePassword(array $data): void
    {
        $e = [
            ':password' => $data['post']['newMdp'],
        ];
        $this->pdoStatement = $this->pdo->prepare("UPDATE user SET password = :password");
        $this->pdoStatement->execute($e);
    }
/************************************End Change password Bdd************************************************* */
/************************************Change Active Bdd************************************************* */
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
/************************************End Change Active Bdd************************************************* */
/************************************Change Password************************************************* */
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
/************************************End Change Password************************************************* */
}