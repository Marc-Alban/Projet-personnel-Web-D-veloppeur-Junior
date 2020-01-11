<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\DashboardManager;
use App\View\View;

class DashboardController
{
    private $view;
    private $DashboardManager;
    private $article;

    public function __construct()
    {
        $this->view = new View();
        $this->article = new ArticleManager();
        $this->DashboardManager = new DashboardManager();
    }

    /**
     * méthode qui permet de vérifier si l'utilisateur sera renvoyé sur la page home avec
     * une erreur lors de la connection ou alors sur la page dashboard et qu'il soit bien connecté.
     *
     * @return void
     */
    public function DashboardAction(array $data): void
    {
        $DashboardManager = $this->DashboardManager->dashboardControl($data);

        if ($DashboardManager === null || !isset($DashboardManager['succes'])) {
            $this->view->renderer('Frontend', '404', ['errors' => $DashboardManager]);
            exit();
        }

        $countArticle = $this->article->nbPost();
        $this->view->renderer('Backend', 'dashboard', ['countArticle' => $countArticle]);
    }
}