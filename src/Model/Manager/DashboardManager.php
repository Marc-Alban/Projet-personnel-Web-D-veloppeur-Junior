<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Manager\UserManager;
use App\Tools\Token;

class DashboardManager
{
    private $userManager;
    private $token;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->token = new Token();
        $this->token->createSessionToken();
    }

    /************************************Modal Control************************************************* */
    /**
     * Méthode pour verifié le formulaire de la modal
     *
     * @param array $data
     * @return array|null
     */
    public function modalControl(array $data): ?array
    {
        $action = $data['get']['action'] ?? null;

        $errors = $data["session"]["errors"] ?? null;
        unset($data["session"]["errors"]);

        $succes = $data["session"]["succes"] ?? null;
        unset($data["session"]["succes"]);

        if (isset($data['post']['connexion']) && $action === "connexion") {

            $active = $this->userManager->getActiveUser();
            $userBdd = $this->userManager->getUsers();
            $pseudo = $data["post"]['pseudo'] ?? null;
            $passwordBdd = $this->userManager->getPass();
            $password = $data["post"]['password'] ?? null;

            if (empty($pseudo) && empty($password)) {
                $errors["pseudoPasswordEmpty"] = 'Veuillez mettre un contenu';
            } else if (empty($pseudo)) {
                $errors["pseudoEmpty"] = 'Veuillez mettre un pseudo ';
            } else if (empty($password)) {
                $errors["passwordEmpty"] = 'Veuillez mettre un mot de passe';
            } else if ($userBdd !== $pseudo) {
                $errors['pseudoWrong'] = 'Identifiant Incorrect-';
            } else if (!password_verify($password, $passwordBdd)) {
                $errors['passWrong'] = 'Identifiant Incorrect--';
            }

            if ($active[0] === "0") {
                $errors['compteWrong'] = "Compte desactivé";
            }

            // $errors['token'] = $this->token->compareTokens($data);

            if (empty($errors)) {
                $succes['succes'] = "Connexion réussie";
                return $succes;
            }
            return $errors;
        }
        return null;
    }
    /************************************End Modal Control************************************************* */

}