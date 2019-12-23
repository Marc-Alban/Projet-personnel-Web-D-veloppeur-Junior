<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\UserManager;
use App\View\View;

class DashboardController
{

    private $view;
    private $article;
    private $user;

    public function __construct()
    {
        $this->view = new View();
        $this->article = new ArticleManager();
        $this->user = new UserManager();
    }

    /**
     * Renvoie la page dashboard
     *
     * @return void
     */
    public function DashboardAction(array &$data): void
    {
        $action = $data['get']['action'] ?? null;
        $session = $data['session'];
        $errors = $session['errors'] ?? null;
        unset($session['errors']);

        if (isset($data['post']['connexion']) && $action === "connexion") {

            $passwordBdd = $this->user->getPass();
            $pseudo = $data["post"]['pseudo'] ?? null;
            $userBdd = $this->user->getUsers();
            $password = $data["post"]['password'] ?? null;

            if (empty($pseudo)) {
                $errors["pseudoEmpty"] = 'Veuillez mettre un pseudo ';
            } elseif (empty($password)) {
                $errors["passwordEmpty"] = 'Veuillez mettre un mot de passe';
            } elseif (!password_verify($password, $passwordBdd) || $userBdd === null) {
                $errors['identifiants'] = 'Identifiants Incorrect';
            }

            $this->user->createSessionToken($session);
            $errors['token'] = $this->user->compareTokens($data);

            if ($errors['token'] === null || is_null($errors['token'])) {
                unset($errors['token']);
            }

            if (empty($errors)) {
                $session['user'] = $pseudo;
                $session['mdp'] = $password;
            } else if (isset($errors) && !empty($errors)) {
                var_dump($errors);
                die();
                $this->view->renderer('Frontend', 'home', ['errors' => $errors]);
            }
        }

        $nbArticle = count($this->article->listePost());
        $this->view->renderer('Backend', 'dashboard', ['nbArticle' => $nbArticle, 'errors' => $errors]);
    }
}