<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\UserManager;
use App\Tools\Token;
use App\View\View;

class DashboardController
{

    private $view;
    private $article;
    private $user;
    private $token;

    public function __construct()
    {
        $this->view = new View();
        $this->article = new ArticleManager();
        $this->user = new UserManager();
        $this->token = new Token();
    }

    /**
     * méthode qui permet de vérifier si l'utilisateur sera renvoyé sur la page home avec
     * une erreur lors de la connection ou alors sur la page dashboard et qu'il soit bien connecté.
     *
     * @return void
     */
    public function DashboardAction(array $data): void
    {
        $action = $data['get']['action'] ?? null;
        $errors = $data['session']['errors'] ?? null;

        if (isset($data['post']['connexion']) && $action === "connexion") {
            $userBdd = $this->user->getUsers();
            $pseudo = $data["post"]['pseudo'] ?? null;
            $passwordBdd = $this->user->getPass();
            $password = $data["post"]['password'] ?? null;
            if (empty($pseudo)) {
                $errors["pseudoEmpty"] = 'Veuillez mettre un pseudo ';
            } else if (empty($password)) {
                $errors["passwordEmpty"] = 'Veuillez mettre un mot de passe';
            } else if (!password_verify($password, $passwordBdd) || $userBdd === null) {
                $errors['identifiants'] = 'Identifiants Incorrect';
            }

            $errors["token"] = $this->token->compareTokens($data);

            if ($data['session']['token'] === null || is_null($data['session']['token'])) {
                unset($data['session']['token']);
            }

            if (empty($errors)) {
                $data['session']['user'] = $pseudo;
                $data['session']['mdp'] = $password;
                $nbArticle = count($this->article->listePost());
                $this->view->renderer('Backend', 'dashboard', ['nbArticle' => $nbArticle]);
            }
        }
        $this->view->renderer('Frontend', '404', ['errors' => $errors]);
    }
}