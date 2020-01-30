<?php
declare (strict_types = 1);
namespace App\Model\Manager;

use App\Model\Manager\UserManager;
use App\Tools\GestionGlobal;
use App\Tools\Token;

class DashboardManager
{
    private $userManager;
    private $token;
    private $maSuperGlobale;
    private $recaptcha;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->maSuperGlobale = new GestionGlobal();
        $this->token = new Token();
        $this->recaptcha = new \ReCaptcha\ReCaptcha('6LcqetMUAAAAAIWWA33d1ZbkfuEEP8MjP4Yf_Avd');

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
            $captcha = $data['post']['g-recaptcha-response'];
            $resp = $this->recaptcha->verify($captcha);

            if (empty($pseudo) && empty($password)) {
                $errors["pseudoPasswordEmpty"] = 'Veuillez mettre un contenu';
            } else if (empty($pseudo)) {
                $errors["pseudoEmpty"] = 'Veuillez mettre un pseudo ';
            } else if (empty($password)) {
                $errors["passwordEmpty"] = 'Veuillez mettre un mot de passe';
            } else if ($userBdd !== $pseudo) {
                $errors['pseudoWrong'] = 'Identifiant Incorrect';
            } else if (!password_verify($password, $passwordBdd)) {
                $errors['passWrong'] = 'Identifiant Incorrect';
            } else if (!$resp->isSuccess()) {
                $errors['erreurCaptcha'] = "Veuillez Cocher la case du captcha.";
            }

            if ($active[0] === "0") {
                $errors['compteWrong'] = "Compte desactivé";
            }
            /************************************Token Session************************************************* */
            if ($this->token->compareTokens($data) !== null) {
                $errors['token'] = "Formulaire incorrect";
            }
            /************************************End Token Session************************************************* */

            if (empty($errors)) {
                $this->maSuperGlobale->setParamSession('user', $userBdd);
                $this->maSuperGlobale->setParamSession('active', $active);
                $succes['succes'] = "Connexion réussie";
                return $succes;
            }
            return $errors;
        }
        return null;
    }
    /************************************End Modal Control************************************************* */

}