<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Controller\BackendController\UserController;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\DashboardManager;
use App\Model\Manager\PartenaireManager;
use App\Tools\Token;
use App\View\View;

class DashboardController
{
    private $view;
    private $DashboardManager;
    private $article;
    private $partenaire;
    private $userController;

    public function __construct()
    {
        $this->view = new View();
        $this->article = new ArticleManager();
        $this->partenaire = new PartenaireManager();
        $this->DashboardManager = new DashboardManager();
        $this->token = new Token();
        $this->userController = new UserController();
    }
/************************************Page Dashboard************************************************* */
    /**
     * méthode qui permet de vérifier si l'utilisateur sera renvoyé sur la page home avec
     * une erreur lors de la connection ou alors sur la page dashboard et qu'il soit bien connecté.
     *
     * @return void
     */
    public function DashboardAction(array $data)
    {
        $action = $data['get']['action'] ?? null;
        $pseudo = $data['post']['pseudo'] ?? null;
        $modalControl = $this->DashboardManager->modalControl($data);
        if (!isset($modalControl['succes']) && $modalControl !== null) {
            return $this->view->renderer('Frontend', '404', ['errors' => $modalControl, 'pseudo' => $pseudo]);
        } else if (!isset($data['session']['user']) && !isset($data['session']['active'][0]) && empty($data['session']['active'][0])) {
            header('Location: /?p=home');
            exit();
        } else if (isset($action) && $action === "logout") {
            $this->userController->logoutUser();
            header('Location: ?p=home');
            exit();
        }
        $countArticle = $this->article->nbPost();
        $countPartenaire = $this->partenaire->nbPartenaire();
        $this->view->renderer('Backend', 'dashboard', ['countArticle' => $countArticle, 'countPartenaire' => $countPartenaire]);

    }
    /************************************End Page Dashboard************************************************* */
}