<?php
declare (strict_types = 1);
namespace App\Controller\BackendController;

use App\Model\Manager\ArticleManager;
use App\Model\Manager\HomeManager;
use App\Model\Manager\PageManager;
use App\Model\Manager\PartenaireManager;
use App\View\View;

class TableController
{
    private $view;
    private $partenaireManager;
    private $articleManager;
    private $graph;
    private $pageManager;

    public function __construct()
    {
        $this->view = new View();
        $this->partenaireManager = new PartenaireManager();
        $this->articleManager = new ArticleManager();
        $this->graph = new HomeManager();
        $this->pageManager = new PageManager();
    }
/************************************Page table************************************************* */

    /**
     * Rendu des listes sous form de tableau
     *
     * @return void
     */
    public function TableAction(array $data): void
    {
        $liste = $data['get']['liste'] ?? null;
        $pp = $data['get']['perpage'] ?? null;
        $partenaire = null;
        $article = null;
        $graphique = null;
        $page = null;

        if ($liste === "listePartenaires") {
            $partenaire = $this->partenaireManager->listePartenaire();
        } else if ($liste === "listeArticlesBack" && isset($pp)) {
            $article = $this->articleManager->pagination($data);
        } else if ($liste === "listeGraphiques") {
            $graphique = $this->graph->listeGraph();
        } else if ($liste === "listePages") {
            $page = $this->pageManager->readPage(null);
        } else if (!isset($liste) || empty($liste)) {
            header("Location: http://3bigbangbourse.fr/?p=dashboard&action=connexion");
        } else if ($liste === "listeArticlesBack" && !isset($pp) && empty($pp)) {
            header("Location: http://3bigbangbourse.fr/?p=table&liste=listeArticlesBack&perpage=1");
        }

        $this->view->renderer('Backend', 'table', ['partenaire' => $partenaire, "article" => $article, "graphique" => $graphique, "page" => $page]);
    }
/************************************End Page Table************************************************* */

}