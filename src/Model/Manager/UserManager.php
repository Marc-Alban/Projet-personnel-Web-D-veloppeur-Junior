<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\UserRepository;

class UserManager
{

    private $userRepository;
    private $user;
    private $token = null;

    /**
     * Fonction constructeur, instanciation du userRepository
     * dans la propriété userRepository
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->user = $this->userRepository->readUser();
    }

    /**
     * Retourne le nom de l'utilisateur
     *
     * @return string
     */
    public function getUsers(): string
    {
        return $this->user->getName();
    }

    /**
     * Retourne le mot de passe
     *
     * @return string
     */
    public function getPass(): string
    {
        return $this->user->getPassword();
    }

    /**
     * Verifie si le mail existe bien en bdd
     *
     * @return void
     */
    private function verifMail()
    {
        $mail = $this->user->getMail();
    }

}