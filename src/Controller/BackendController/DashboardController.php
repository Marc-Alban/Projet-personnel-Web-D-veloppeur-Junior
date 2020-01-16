<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\DashboardManager;
use App\Model\Manager\PartenaireManager;
use App\View\View;

class DashboardController
{
    private $view;
    private $DashboardManager;
    private $article;
    private $partenaire;

    public function __construct()
    {
        $this->view = new View();
        $this->article = new ArticleManager();
        $this->partenaire = new PartenaireManager();
        $this->DashboardManager = new DashboardManager();
    }
/************************************Page Dashboard************************************************* */
    /**
     * méthode qui permet de vérifier si l'utilisateur sera renvoyé sur la page home avec
     * une erreur lors de la connection ou alors sur la page dashboard et qu'il soit bien connecté.
     *
     * @return void
     */
    public function DashboardAction(array $data): void
    {
        $modalControl = $this->DashboardManager->modalControl($data);

        if ($modalControl === null || !isset($modalControl['succes'])) {
            $this->view->renderer('Frontend', '404', ['errors' => $modalControl]);
            exit();
        }

        $countArticle = $this->article->nbPost();
        $countPartenaire = $this->partenaire->nbPartenaire();
        $this->view->renderer('Backend', 'dashboard', ['countArticle' => $countArticle, 'countPartenaire' => $countPartenaire]);
    }
    /************************************End Page Dashboard************************************************* */
}