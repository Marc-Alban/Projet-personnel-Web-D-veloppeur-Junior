<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Repository\UserRepository;

class UserManager
{

    private $userRepository;
    private $password;
    private $token = null;

    /**
     * Fonction constructeur, instanciation du userRepository
     * dans la propriété userRepository
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Créer les tokens
     *
     * @param [type] $session
     * @return void
     */
    public function createSessionToken(array &$data): void
    {
        $this->token = bin2hex(random_bytes(32));
        $data['token'] = $this->token;
    }

    /**
     * Compare les tokens
     *
     * @param [type] $session
     * @param array $data
     * @return string|null
     */
    public function compareTokens(array $data): ?string
    {
        if (!isset($this->token) || !isset($data['post']['token']) || empty($this->token['token']) || empty($data['post']['token']) || $this->token['token'] !== $data['post']['token']) {
            return "Formulaire incorrect";
        }
        return null;
    }

    /**
     * Retourne le nom de l'utilisateur
     *
     * @return string
     */
    public function getUsers()
    {
        $user = $this->userRepository->readUser();
        return $user->getName();
    }

    /**
     * Retourne le mot de passe
     *
     * @return string
     */
    public function getPass()
    {
        $pass = $this->userRepository->readUser();
        return $pass->getPassword();
    }

}